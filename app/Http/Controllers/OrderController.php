<?php

namespace App\Http\Controllers;

use App\Models\Locality;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class OrderController extends Controller
{


    public function uploadReceipt(Request $request, $id)
    {
        $request->validate([
            'receipt' => 'required|file|mimes:jpeg,jpg,png,pdf|max:2048',
        ]);

        $order = Order::findOrFail($id);


        // Optional: delete old receipt
        if ($order->receipt) {
            Storage::disk('private_docs')->delete($order->receipt);
        }


        // Store file on the private_docs disk
        $path = $request->file('receipt')->store('receipts', 'private_docs');

        $order->update([
            'receipt' => $path,
            'status' => 'receipt_uploaded',
            'receipt_uploaded_at' => now(),
        ]);

        return back()->with('success', 'Receipt uploaded successfully!');
    }


    public function placeOrder(Request $request)
    {
        /* -----------------------------------------------------------------
         | 1. Validate exactly what the form sends
         |-----------------------------------------------------------------*/
        $validated = $request->validate([
            'name'        => 'required|string|max:100',
            'email'       => 'nullable|email',
            'phone'       => 'required|string|max:15',
            'address'     => 'required|string|max:255',
            'locality_id' => 'required|exists:localities,id',   // ⬅️ FK check
            'notes'       => 'nullable|string|max:500',
        ]);

        /* -----------------------------------------------------------------
         | 2. Make sure there’s something in the cart
         |-----------------------------------------------------------------*/
        $cart = session('cart', []);
        if (empty($cart)) {
            return back()->with('error', 'Your cart is empty.');
        }

        /* -----------------------------------------------------------------
         | 3. Compute totals
         |-----------------------------------------------------------------*/
        $itemsTotal  = collect($cart)->sum(fn ($i) => $i['price'] * $i['quantity']);
        $locality    = Locality::find($validated['locality_id']);
        $deliveryFee = $locality->delivery_fee;
        $grandTotal  = $itemsTotal + $deliveryFee;

        /* -----------------------------------------------------------------
         | 4. Create the order
         |-----------------------------------------------------------------*/
        $order = Order::create([
            'tracking_code'    => Order::generateTrackingCode(),
            'customer_name'    => $validated['name'],
            'customer_email'   => $validated['email'] ?? null,
            'customer_phone'   => $validated['phone'],
            'customer_address' => $validated['address'],
            'locality_id'      => $locality->id,
            'delivery_fee'     => $deliveryFee,
            'total_amount'     => $grandTotal,
            'status'           => 'pending',
            'notes'            => $validated['notes'] ?? null,
        ]);

        /* -----------------------------------------------------------------
         | 5. Save each cart item
         |-----------------------------------------------------------------*/
        foreach ($cart as $item) {
            OrderItem::create([
                'order_id'   => $order->id,
                'product_id' => $item['product_id'],
                'size_id'    => $item['size_id'],
                'quantity'   => $item['quantity'],
                'price'      => $item['price'],
            ]);
        }

        /* -----------------------------------------------------------------
         | 6. Clear cart & redirect
         |-----------------------------------------------------------------*/
        session()->forget('cart');

        return redirect()->route('orders.show', $order);
    }

    // OrdersController.php (or wherever your show action lives)
    public function show($id)
    {
        $order = Order::with([
            'items.product',
            'items.size',
            'locality'          // 👈🏽  new line
        ])->findOrFail($id);

        return view('orders.show', compact('order'));
    }


}
