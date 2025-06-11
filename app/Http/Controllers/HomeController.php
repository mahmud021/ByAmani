<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function index()
    {
        $categories = Category::all();

        // Predefined image list
        $images = [
            'images/polaroid1.jpg',
            'images/polaroid2.jpg',
            'images/polaroid3.jpg',
            'images/polaroid4.jpg',
        ];

        // Assign a random image to each category
        $categoriesWithImages = $categories->map(function ($category) use ($images) {
            $category->image = asset($images[array_rand($images)]);
            return $category;
        });

        return view('welcome', [
            'categories' => $categoriesWithImages
        ]);
    }
}
