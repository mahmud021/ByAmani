<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends Factory<Product>
 */
class ProductFactory extends Factory
{
    protected $model = Product::class;

    public function definition(): array
    {
        $name = $this->faker->unique()->words(3, true);
        return [
            'name' => ucfirst($name),
            'slug' => Str::slug($name) . '-' . $this->faker->unique()->randomNumber(5),
            'description' => $this->faker->paragraph(),
            'category_id' => Category::factory(),
            'stock' => $this->faker->numberBetween(0, 100),
            'is_featured' => $this->faker->boolean(20),
            'status' => $this->faker->randomElement(['active', 'inactive']),
            'image' => null,
        ];
    }
}
