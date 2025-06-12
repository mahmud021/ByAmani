<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Locality;
use App\Models\Product;
use App\Models\Size;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function manage()
    {
        return view('dashboard.manage-products', [
            'categories' => Category::all(),
            'sizes' => Size::all(),
            'products' => Product::with('sizes')->where('status', 'active')->get(),
            'localities' => Locality::all(),
        ]);
    }





    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */

    public function store(Request $request)
    {
        $validated = $request->validateWithBag('productCreation', [
            'name' => 'required|string|max:255|unique:products,name',
            'description' => 'nullable|string',
            'stock' => 'required|integer|min:0',
            'category_id' => 'required|exists:categories,id',
            'status' => 'required|in:active,inactive',
            'is_featured' => 'nullable|boolean',
            'sizes' => 'nullable|array',
            'image' => 'nullable|image|max:2048',
        ]);

        // Handle image upload if present
        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('products', 'public_assets');
        }

        // Generate base slug
        $baseSlug = Str::slug($validated['name']);
        $slug = $baseSlug;
        $counter = 1;

        // Ensure slug is unique
        while (Product::where('slug', $slug)->exists()) {
            $slug = $baseSlug . '-' . $counter++;
        }

        // Create the product
        $product = Product::create([
            'name' => $validated['name'],
            'slug' => $slug,
            'description' => $validated['description'] ?? null,
            'stock' => $validated['stock'],
            'category_id' => $validated['category_id'],
            'status' => $validated['status'],
            'is_featured' => $request->boolean('is_featured'),
            'image' => $imagePath,
        ]);

        // Attach sizes if provided
        foreach ($request->input('sizes', []) as $sizeId => $data) {
            if (isset($data['selected']) && is_numeric($data['price'])) {
                if (Size::where('id', $sizeId)->exists()) {
                    $product->sizes()->attach($sizeId, [
                        'price' => $data['price'],
                    ]);
                }
            }
        }

        return redirect()->back()->with('success', 'Product created successfully.');
    }


    /**
     * Display the specified resource.
     */
    public function show($slug)
    {
        $product = Product::with(['category', 'sizes'])->where('slug', $slug)->firstOrFail();

        return view('products.show', compact('product'));
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
    public function update(Request $request, Product $product)
    {

    }


    /**
     * Remove the specified resource from storage.
     */
    public function deactivate(Product $product)
    {
        $product->update(['status' => 'inactive']);

        return redirect()->back()->with('success', 'Product deactivated successfully.');
    }


}
