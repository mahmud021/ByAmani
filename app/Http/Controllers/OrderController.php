<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class OrderController extends Controller
{

    public static function generateTrackingCode(): string
    {
        return 'AMN-' . strtoupper(Str::random(6));
    }

    public function placeOrder(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'nullable|email',
            'phone' => 'required|string|max:15',
            'address' => 'required|string|max:255',
            'locality' => 'required|string|max:100',
            'notes' => 'nullable|string|max:500',
        ]);

        $cart = session('cart', []);
        if (empty($cart)) {
            return redirect()->back()->with('error', 'Your cart is empty.');
        }

        $total = collect($cart)->sum(fn($item) => $item['price'] * $item['quantity']);

        $order = Order::create([
            'tracking_code' => Order::generateTrackingCode(),
            'customer_name' => $validated['name'],
            'customer_email' => $validated['email'] ?? null,
            'customer_phone' => $validated['phone'],
            'customer_address' => $validated['address'],
            'total_amount' => $total,
            'status' => 'pending',
        ]);

        foreach ($cart as $item) {
            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $item['product_id'],
                'size_id' => $item['size_id'],
                'quantity' => $item['quantity'],
                'price' => $item['price'], // ✅ from pivot at add-to-cart time
            ]);
        }

        session()->forget('cart');

        return redirect()->route('orders.show', $order->id);
    }

    public function show($id)
    {
        $order = Order::with('items.product', 'items.size')->findOrFail($id);
        return view('orders.show', compact('order'));
    }

}
