<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class CartDrawer extends Component
{
    public $cart;
    public $subtotal;
    public $totalQuantity; // Add this property


    public function __construct()
    {
        $this->cart = session('cart', []);
        $this->subtotal = collect($this->cart)->sum(function ($item) {
            return isset($item['price']) && isset($item['quantity'])
                ? $item['price'] * $item['quantity']
                : 0;
        });
        $this->totalQuantity = collect($this->cart)->sum('quantity');

    }

    public function render()
    {
        return view('components.cart-drawer');
    }
}
