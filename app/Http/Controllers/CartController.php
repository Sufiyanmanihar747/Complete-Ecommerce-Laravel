<?php

namespace App\Http\Controllers;

use App\Models\CartItem;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = User::find(Auth::id());
        $cartItems = $user->cartItems()->with('product')->get();

        // dd($cartItems);
        return view('products.cart', compact('cartItems'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
        ]);

        $data = $request->only(['product_id', 'quantity']);
        $data['user_id'] = Auth::id();
        $existingCartItem = CartItem::where('user_id', Auth::id())->where('product_id', $data['product_id'])->first();

        if ($existingCartItem) {
            $existingCartItem->quantity += $request->quantity;
            $existingCartItem->save();
        } else {
            CartItem::create($data);
            return redirect('cart');
        }
        // CartItem::create($data);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $product = Product::find($id);
        return view('products.cart', compact('product'));
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
        // dd($request->quantity);
        $request->validate([
            'quantity' => 'required|integer|min:1',
        ]);
        $cartItem = CartItem::find($id);
        if (!$cartItem) {
            return response()->json(['error' => 'Cart item not found'], 404);
        }
        $cartItem->quantity = $request->quantity;
        $cartItem->save();

        return response()->json(['message' => 'Quantity updated successfully'], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        CartItem::destroy($id);
        return redirect('cart');
    }

    public function total()
    {
        $user = User::find(Auth::id());
        $cartItems = $user->cartItems()->with('product')->get();

        $totalItems = $cartItems->sum('quantity');
        $totalAmount = $cartItems->sum(function ($item) {
            return $item->quantity * $item->product->price;
        });

        return response()->json([
            'totalItems' => $totalItems,
            'totalAmount' => $totalAmount,
        ]);
    }
}
