<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class CartController extends Controller
{
    public function index()
    {
        $cart = session()->get('cart', []);
        $total = collect($cart)->sum(fn($item) => $item['price'] * $item['quantity']);
        return view('cart.index', compact('cart', 'total'));
    }

    public function add(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'size_id' => 'required|exists:product_size,size_id',
            'quantity' => 'required|integer|min:1',
        ]);

        $product = Product::with(['sizes' => function ($q) use ($request) {
            $q->where('size_id', $request->size_id);
        }])->findOrFail($request->product_id);

        $size = $product->sizes->first(); // only one size since we filtered

        if (!$size) {
            return back()->with('error', 'Invalid size selected.');
        }

        $cart = session()->get('cart', []);

        $key = $product->id . '_' . $size->id;

        if (isset($cart[$key])) {
            $cart[$key]['quantity'] += $request->quantity;
        } else {
            $cart[$key] = [
                'product_id' => $product->id,
                'size_id' => $size->id,
                'quantity' => $request->quantity,
                'image' => $product->image,
                'product_name' => $product->name, // Changed from 'name'
                'size_label' => $size->label,
                'price' => $size->pivot->price,
            ];
        }

        session()->put('cart', $cart);

        return back()->with('success', 'Item added to cart!');
    }


    public function update(Request $request)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$request->product_id])) {
            $cart[$request->product_id]['quantity'] = $request->quantity;
            session()->put('cart', $cart);
        }

        return redirect()->back()->with('success', 'Cart updated.');
    }

    public function remove(Request $request)
    {
        $cart = session()->get('cart', []);
        // Fix: Use underscore instead of hyphen
        $key = $request->product_id . '_' . $request->size_id;

        if (isset($cart[$key])) {
            unset($cart[$key]);
            session()->put('cart', $cart);
            return redirect()->back()->with('success', 'Item removed.');
        }

        return redirect()->back()->with('error', 'Item not found in cart.');
    }

}
