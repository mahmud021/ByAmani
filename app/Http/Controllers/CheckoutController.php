<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function index()
    {
        $cart = session('cart', []);
        $subtotal = collect($cart)->sum(fn($item) => $item['price'] * $item['quantity']);

        return view('checkout.index', compact('cart', 'subtotal'));
    }

    public function placeOrder(Request $request)
    {
        $request->validate([
            'customer_name' => 'required|string|max:255',
            'customer_phone' => 'required|string|max:255',
            'customer_address' => 'required|string',
        ]);

        $cart = session('cart', []);
        if (empty($cart)) return redirect()->route('menu')->with('error', 'Cart is empty.');

        $total = collect($cart)->sum(fn($item) => $item['price'] * $item['quantity']);

        $order = Order::create([
            'customer_name' => $request->customer_name,
            'customer_phone' => $request->customer_phone,
            'customer_address' => $request->customer_address,
            'total_amount' => $total,
        ]);

        foreach ($cart as $item) {
            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $item['product_id'],
                'size_id' => $item['size_id'],
                'quantity' => $item['quantity'],
                'price' => $item['price'],
            ]);
        }

        session()->forget('cart');

        return redirect()->route('checkout.success', ['order' => $order->id]);
    }
}
