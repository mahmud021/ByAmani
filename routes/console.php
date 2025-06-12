<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');

Artisan::command('seed:static', function () {
    $this->info('Seeding static data...');

    $categories = [
        ['name' => 'T-Shirts', 'slug' => 't-shirts'],
        ['name' => 'Hoodies', 'slug' => 'hoodies'],
        ['name' => 'Accessories', 'slug' => 'accessories'],
    ];
    foreach ($categories as $data) {
        \App\Models\Category::firstOrCreate(['slug' => $data['slug']], $data);
    }

    $localities = [
        ['name' => 'Nairobi', 'delivery_fee' => 2.00],
        ['name' => 'Mombasa', 'delivery_fee' => 3.00],
        ['name' => 'Kisumu', 'delivery_fee' => 2.50],
    ];
    foreach ($localities as $data) {
        \App\Models\Locality::firstOrCreate(['name' => $data['name']], $data);
    }

    $products = [
        [
            'name' => 'Classic Tee',
            'slug' => 'classic-tee',
            'description' => 'Comfortable everyday t-shirt.',
            'category' => 't-shirts',
            'stock' => 10,
        ],
        [
            'name' => 'Zip Hoodie',
            'slug' => 'zip-hoodie',
            'description' => 'Warm hoodie with zipper.',
            'category' => 'hoodies',
            'stock' => 5,
        ],
        [
            'name' => 'Baseball Cap',
            'slug' => 'baseball-cap',
            'description' => 'Classic cap for sunny days.',
            'category' => 'accessories',
            'stock' => 8,
        ],
    ];

    foreach ($products as $data) {
        $category = \App\Models\Category::where('slug', $data['category'])->first();
        if (!$category) {
            continue;
        }
        \App\Models\Product::firstOrCreate(
            ['slug' => $data['slug']],
            [
                'name' => $data['name'],
                'description' => $data['description'],
                'category_id' => $category->id,
                'stock' => $data['stock'],
                'is_featured' => false,
                'status' => true, // or false as needed
            ]
        );
    }

    $this->info('Static data seeded.');
})->purpose('Seed minimal static data without Faker');
