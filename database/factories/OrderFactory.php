<?php

namespace Database\Factories;

use App\Models\Locality;
use App\Models\Order;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends Factory<Order>
 */
class OrderFactory extends Factory
{
    protected $model = Order::class;

    public function definition(): array
    {
        return [
            'tracking_code' => Order::generateTrackingCode(),
            'customer_name' => $this->faker->name(),
            'customer_email' => $this->faker->safeEmail(),
            'customer_phone' => $this->faker->phoneNumber(),
            'customer_address' => $this->faker->address(),
            'locality_id' => Locality::factory(),
            'delivery_fee' => $this->faker->randomFloat(2, 0, 10),
            'total_amount' => 0,
            'status' => 'pending',
            'receipt' => null,
            'receipt_uploaded_at' => null,
        ];
    }
}
