<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\Size;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $sizes = Size::all();

        Product::factory()
            ->count(10)
            ->create()
            ->each(function (Product $product) use ($sizes) {
                if ($sizes->count()) {
                    $attach = $sizes->random(rand(1, $sizes->count()));
                    foreach ($attach as $size) {
                        $product->sizes()->attach($size->id, [
                            'price' => fake()->randomFloat(2, 5, 100),
                        ]);
                    }
                }
            });
    }
}
