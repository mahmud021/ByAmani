<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');

Artisan::command('seed:static', function () {
    $this->info('Seeding static data...');

    // Categories
    $categories = [
        ['name' => 'T-Shirts', 'slug' => 't-shirts'],
        ['name' => 'Hoodies', 'slug' => 'hoodies'],
        ['name' => 'Accessories', 'slug' => 'accessories'],
    ];

    foreach ($categories as $data) {
        \App\Models\Category::firstOrCreate(['slug' => $data['slug']], $data);
    }

    // Nigerian Localities (with fees)
    $localities = [
        ['name' => 'Asokoro', 'delivery_fee' => 1500],
        ['name' => 'Guzape', 'delivery_fee' => 2000],
        ['name' => 'Garki', 'delivery_fee' => 2500],
        ['name' => 'Jabi', 'delivery_fee' => 3000],
        ['name' => 'Citec', 'delivery_fee' => 3500],
        ['name' => 'Kubwa', 'delivery_fee' => 6000],
    ];

    foreach ($localities as $data) {
        \App\Models\Locality::firstOrCreate(['name' => $data['name']], $data);
    }

    // Sizes
    $sizes = [
        ['label' => 'Small'],
        ['label' => 'Medium'],
        ['label' => 'Large'],
    ];

    foreach ($sizes as $data) {
        \App\Models\Size::firstOrCreate(['label' => $data['label']]);
    }

    // Products
    $products = [
        ['name' => 'Classic Tee', 'slug' => 'classic-tee', 'description' => 'Comfortable everyday t-shirt.', 'category' => 't-shirts', 'stock' => 10, 'image' => 'products/classic-tee.jpg'],
        ['name' => 'Premium Tee', 'slug' => 'premium-tee', 'description' => 'Premium cotton t-shirt.', 'category' => 't-shirts', 'stock' => 15, 'image' => 'products/premium-tee.jpg'],
        ['name' => 'Graphic Tee', 'slug' => 'graphic-tee', 'description' => 'T-shirt with graphic design.', 'category' => 't-shirts', 'stock' => 12, 'image' => 'products/graphic-tee.jpg'],
        ['name' => 'Zip Hoodie', 'slug' => 'zip-hoodie', 'description' => 'Warm hoodie with zipper.', 'category' => 'hoodies', 'stock' => 5, 'image' => 'products/zip-hoodie.jpg'],
        ['name' => 'Pullover Hoodie', 'slug' => 'pullover-hoodie', 'description' => 'Cozy pullover hoodie.', 'category' => 'hoodies', 'stock' => 7, 'image' => 'products/pullover-hoodie.jpg'],
        ['name' => 'Sport Hoodie', 'slug' => 'sport-hoodie', 'description' => 'Breathable hoodie for sports.', 'category' => 'hoodies', 'stock' => 6, 'image' => 'products/sport-hoodie.jpg'],
        ['name' => 'Baseball Cap', 'slug' => 'baseball-cap', 'description' => 'Classic cap for sunny days.', 'category' => 'accessories', 'stock' => 8, 'image' => 'products/baseball-cap.jpg'],
        ['name' => 'Tote Bag', 'slug' => 'tote-bag', 'description' => 'Durable fabric tote bag.', 'category' => 'accessories', 'stock' => 20, 'image' => 'products/tote-bag.jpg'],
        ['name' => 'Face Mask', 'slug' => 'face-mask', 'description' => 'Washable cloth face mask.', 'category' => 'accessories', 'stock' => 30, 'image' => 'products/face-mask.jpg'],
        ['name' => 'Wristband', 'slug' => 'wristband', 'description' => 'Elastic branded wristband.', 'category' => 'accessories', 'stock' => 25, 'image' => 'products/wristband.jpg'],
    ];

    foreach ($products as $data) {
        $category = \App\Models\Category::where('slug', $data['category'])->first();
        if (!$category) {
            $this->warn("Category {$data['category']} not found.");
            continue;
        }

        $product = \App\Models\Product::firstOrCreate(
            ['slug' => $data['slug']],
            [
                'name' => $data['name'],
                'description' => $data['description'],
                'category_id' => $category->id,
                'stock' => $data['stock'],
                'is_featured' => false,
                'status' => true,
                'image' => $data['image'],
            ]
        );

        $product->sizes()->syncWithoutDetaching([
            \App\Models\Size::where('label', 'Small')->first()->id => ['price' => 4000],
            \App\Models\Size::where('label', 'Medium')->first()->id => ['price' => 5000],
            \App\Models\Size::where('label', 'Large')->first()->id => ['price' => 6000],
        ]);
    }

    $this->info('Static data seeded successfully.');
})->purpose('Seed minimal static data with categories, localities, sizes, and 10 products.');
