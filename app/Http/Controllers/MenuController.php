<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function index()
    {
        $categories = Category::with('products')->get();
        $allProducts = Product::all();

        return view('menu', compact('categories', 'allProducts'));
    }
}
