<?php

namespace Database\Factories;

use App\Models\Order;
use App\Models\Product;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\OrderItem>
 */
class OrderItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'order_id' => Order::inRandomOrder()->first()->id ?? Order::factory(),
            'product_id' => Product::inRandomOrder()->first()->id ?? Product::factory(),
            'quantity' => $this->faker->numberBetween(1 , 3),
            'price_at_purchase' => $this->faker->numberBetween(10, 100),
            'created_at' => $this->faker->dateTimeBetween('-3 months', 'now'),
            'updated_at' => now(),
        ];
    }
}
