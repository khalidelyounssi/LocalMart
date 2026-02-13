<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class OrderFactory extends Factory
{
    protected $model = \App\Models\Order::class;

    public function definition()
    {
        return [
            'user_id' => 1,
            'status' => $this->faker->randomElement([
                'pending', 'shipped', 'delivered'
            ]),
            'total_amount' => $this->faker->numberBetween(50, 500),
            'created_at' => $this->faker->dateTimeBetween('-3 months', 'now'),
            'updated_at' => now(),
        ];
    }
}

