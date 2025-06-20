<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function index()
    {
        // ✅ Fetch only 6 featured & active products
        $featuredProducts = Product::where('is_featured', true)
            ->where('status', 'active')
            ->latest()
            ->take(4)
            ->get();
        $categories = Category::inRandomOrder()->take(6)->get();

        return view('welcome', [
            'featuredProducts' => $featuredProducts,
            'categories' => $categories

        ]);
    }
}
