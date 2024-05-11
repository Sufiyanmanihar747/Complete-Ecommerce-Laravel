<?php

namespace App\Http\Controllers;

use App\Models\CartItem;
use Razorpay\Api\Api;
use Exception;
use Illuminate\Support\Facades\Session as FacadesSession;
use App\Models\Order;
use App\Models\Address;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = User::find(Auth::id());
        $allOrders = $user->orders()->with('orderItems.product')->with('address')->get();
        return view('order.orders', compact('allOrders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = User::find(Auth::id());
        $cartItems = $user->cartItems()->with('product')->get();
        $addresses = $user->addresses()->get();
        // dd($addresses);
        // var_dump($cartItems);
        return view('order.payment', compact('cartItems'), compact('addresses'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $input = $request->all();

        if (!isset($input['razorpay_payment_id'])) {
            FacadesSession::put('error', 'Invalid payment ID');
            return redirect()->back()->withInput();
        }
        $api = new Api("rzp_test_khi1E543xQPo9C", "tkWPtaDmcdWWqzqypcCUg29s");

        try {
            $payment = $api->payment->fetch($input['razorpay_payment_id']);
            if ($payment && isset($payment['amount'])) {
                $api->payment->fetch($input['razorpay_payment_id'])->capture(array('amount' => $payment['amount']));
            }
        } catch (Exception $e) {
            FacadesSession::put('error', $e->getMessage());
            // return redirect()->back();
        }
        // dd($input['razorpay_payment_id']);
        // DATABASE THINGS

        //for addresses table
        $address = null;
        if ($request['new_address'] != null) {
            $address['user_id'] = Auth::id();
            $address['address'] = $request['new_address'];
            $address = Address::create($address);
        } else {
            $address = Address::find($request['old_address']);
        }
        $address_id = $address->id;

        //for order table
        $orderData = $request->only(['status', 'total_amount']);
        $orderData['payment_id'] = $input['razorpay_payment_id'];
        $orderData['user_id'] = Auth::id();
        $orderData['address_id'] = $address_id;
        $order = Order::create($orderData);
        $order_id = $order->id;


        //for order_items
        if ($request->input('cart')) {
            $cartItems = json_decode($request->input('cart'), true);
            foreach ($cartItems as $item) {
                $product = $item['product'];
                $orderItemData = [
                    'order_id' => $order_id,
                    'product_id' => $product['id'],
                    'quantity' => $item['quantity'],
                    'price' => $product['price'],
                ];
                OrderItem::create($orderItemData);
            }
        } else {
            $orderItemData = [
                'order_id' => $order_id,
                'product_id' => $request['id'],
                'quantity' => 1,
                'price' => $request['total_amount'],
            ];
            OrderItem::create($orderItemData);
        }
        return redirect('order');
    }

    /**
     * Display the specified items order.
     */
    public function show(string $id)
    {
        // dd($id);
        $user = User::find(Auth::id());
        $addresses = $user->addresses()->get();
        $product  = Product::find($id);
        $product['quantity'] = 1;
        return view('order.specificpayment', compact('product', 'addresses'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Restores the soft-deleted order
        // $order = Order::withTrashed()->find($orderId);
        // $order->restore();

        // Get all orders (including soft-deleted)
        // $allOrders = Order::withTrashed()->get();

        // Get all soft-deleted orders
        // $softDeletedOrders = Order::onlyTrashed()->get();

        // $order->delete();
        Order::destroy($id);
        $order = Order::onlyTrashed()->find($id);
        $order->forceDelete();
        return redirect('order');
    }
}
