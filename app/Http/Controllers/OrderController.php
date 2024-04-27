<?php

namespace App\Http\Controllers;

use App\Models\CartItem;
use App\Models\Order;
use App\Models\Address;
use App\Models\OrderItem;
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
        return view('order.payment', compact('cartItems'), compact('addresses'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());

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
        $orderData = $request->only(['status', 'payment_method', 'total_amount']);
        $orderData['user_id'] = Auth::id();
        $orderData['address_id'] = $address_id;
        $order = Order::create($orderData);
        $order_id = $order->id;

        //for order_items
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
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        dump('this is show page of ordercontroller');
        dd($id);
        $cartItems = CartItem::find($id);
        return view('order.payment', compact('cartItems'));
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

        // Order::destroy($id);
        $order = Order::find($id);
        $order->delete();
        return redirect('order');
    }
}
