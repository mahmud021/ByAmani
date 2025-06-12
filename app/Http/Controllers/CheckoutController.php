<?php

namespace App\Http\Controllers;

use App\Models\Locality;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    // ── Show checkout page ───────────────────────────
    public function index()
    {
        $cart      = session('cart', []);
        $subtotal  = collect($cart)->sum(fn ($i) => $i['price'] * $i['quantity']);
        $localities = Locality::orderBy('name')->get();     // ⬅️

        return view('checkout.index', compact('cart', 'subtotal', 'localities'));
    }

    // ── Place order ──────────────────────────────────
    public function placeOrder(Request $request)
    {
        $validated = $request->validate([
            // Match the form **exactly**
            'name'         => 'required|string|max:255',
            'phone'        => 'required|string|max:255',
            'email'        => 'nullable|email',
            'address'      => 'required|string',
            'locality_id'  => 'required|exists:localities,id',
            'notes'        => 'nullable|string|max:500',
        ]);

        $cart = session('cart', []);
        if (empty($cart)) {
            return redirect()->route('menu')->with('error', 'Cart is empty.');
        }

        $itemsTotal  = collect($cart)->sum(fn ($i) => $i['price'] * $i['quantity']);
        $locality    = Locality::find($validated['locality_id']);
        $deliveryFee = $locality->delivery_fee;
        $grandTotal  = $itemsTotal + $deliveryFee;

        $order = Order::create([
            'customer_name'    => $validated['name'],
            'customer_phone'   => $validated['phone'],
            'customer_email'   => $validated['email'] ?? null,
            'customer_address' => $validated['address'],
            'locality_id'      => $locality->id,
            'delivery_fee'     => $deliveryFee,
            'total_amount'     => $grandTotal,
            'status'           => 'pending',
            'tracking_code'    => Order::generateTrackingCode(),
        ]);

        foreach ($cart as $item) {
            OrderItem::create([
                'order_id'   => $order->id,
                'product_id' => $item['product_id'],
                'size_id'    => $item['size_id'],
                'quantity'   => $item['quantity'],
                'price'      => $item['price'],
            ]);
        }

        session()->forget('cart');

        return redirect()->route('checkout.success', $order);
    }
}
