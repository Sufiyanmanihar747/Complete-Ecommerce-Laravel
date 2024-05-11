<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use GlobalFunctionFile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Razorpay\Api\Api;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $admin = Auth::user();;
        $products = $admin->products;
        return view('admin.products', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::pluck('name', 'id')->toArray();
        return view('admin.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->only(['title', 'price', 'company', 'category', 'description', 'images']);
        $data['user_id'] = Auth::id();
        if ($request->hasFile('images')) {
            $imageArray = $request->file('images');
            $final = [];
            foreach ($imageArray as  $image) {
                $originalName = $image->getClientOriginalName();
                $image->storeAs('public/images', $originalName);
                $final[] = $originalName;
            }
            $imgstring = implode(',', $final);
            $data['images'] = $imgstring;
        }
        Product::create($data);
        return redirect('admin');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $product = Product::find($id);
        return view('admin.show', compact('product'));
        // dump('this is show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $product = Product::find($id);
        $categories = Category::pluck('name', 'id')->toArray();
        return view('admin.create', compact('product', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // dd($request);
        $product = Product::find($id);
        $data = $request->only(['title', 'price', 'company', 'category', 'description', 'images', 'category_id']);
        $currentImages = $product->images;
        if ($request->hasFile('images')) {

            // deleting old images
            $oldImages = explode(',', $product->images);
            foreach ($oldImages as $filename) {
                $path = public_path('storage/images/' . $filename);
                if (File::exists($path)) {
                    File::delete($path);
                }
            }

            //storing new images
            $newImages = [];
            foreach ($request->file('images') as $image) {
                $originalName = $image->getClientOriginalName();
                $image->storeAs('public/images', $originalName);
                $newImages[] = $originalName;
            }
            $imgString = implode(',', $newImages);
            $data['images'] = $imgString;
        } else {
            $data['images'] = $currentImages;
        }
        $product->update($data);
        return redirect('admin');
    }

    public function destroy(string $id)
    {
        $product = Product::find($id);

        if ($product->images) {
            $imageFilenames = explode(',', $product->images);
            foreach ($imageFilenames as $filename) {
                $path = public_path('storage/images/' . $filename);
                if (File::exists($path)) {
                    File::delete($path);
                }
            }
            $product->delete();
        } else {
            Product::destroy($id);
        }
        return redirect('admin');
    }

    public function dashboard()
    {
        return view('admin.dashboard');
    }

    public function orders()
    {
        $admin = Auth::id();
        $orderedProductIds = DB::table('order_items')
            ->select('order_items.*', 'orders.payment_id', 'products.title')
            ->join('products', 'order_items.product_id', '=', 'products.id')
            ->join('orders', 'order_items.order_id', '=', 'orders.id')
            ->where('products.user_id', $admin)
            ->get();

        $paymentIds = $orderedProductIds->pluck('payment_id')->toArray();
        // dd($paymentIds);
        foreach ($paymentIds as $paymentId) {
            $response = $this->getOrderDetail($paymentId);
            $responses[] = json_decode($response, true);
        }
        // dd($responses);
        return view('admin.orders', compact('orderedProductIds', 'responses'));
    }

    public function getOrderDetail($paymentIdParam)
    {
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://api.razorpay.com/v1/payments/' . $paymentIdParam,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
            CURLOPT_HTTPHEADER => array(
                'Authorization: Basic cnpwX3Rlc3Rfa2hpMUU1NDN4UVBvOUM6dGtXUHRhRG1jZFdXcXpxeXBjQ1VnMjlz'
            ),
        ));

        $response = curl_exec($curl);
        // dd($response);
        curl_close($curl);
        return $response;
    }
}
