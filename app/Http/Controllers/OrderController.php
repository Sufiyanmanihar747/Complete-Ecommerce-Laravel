<?php

namespace App\Http\Controllers;

use App\Models\CartItem;
use App\Models\Order;
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
        $allOrders = $user->orders()->with('orderItems.product')->get();
        return view('order.orders', compact('allOrders'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = User::find(Auth::id());
        $cartItems = $user->cartItems()->with('product')->get();
        return view('order.payment', compact('cartItems'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        dump('this is store');
        $orderData = $request->only(['status', 'delivery_address', 'payment_method', 'total_amount']);
        $orderData['user_id'] = Auth::id();
        $order = Order::create($orderData);

        $order_id = $order->id;
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
        // return view('order.orderSuccess')->with('order_id', $order_id);
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
        Order::destroy($id);
        return redirect('order');
    }
}
