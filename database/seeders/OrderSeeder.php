<?php

namespace Database\Seeders;

use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Order::factory()
            ->count(5)
            ->create()
            ->each(function (Order $order) {
                OrderItem::factory()->count(rand(1, 3))->create([
                    'order_id' => $order->id,
                ]);

                $total = $order->items->sum(function ($item) {
                    return $item->price * $item->quantity;
                }) + $order->delivery_fee;

                $order->update(['total_amount' => $total]);
            });
    }
}
