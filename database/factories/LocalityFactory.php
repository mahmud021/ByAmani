<?php

namespace Database\Factories;

use App\Models\Locality;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Locality>
 */
class LocalityFactory extends Factory
{
    protected $model = Locality::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->unique()->city(),
            'delivery_fee' => $this->faker->randomFloat(2, 0, 10),
        ];
    }
}
