<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Product;
use App\Models\User;
use App\Models\Category;

class productFactory extends Factory
{     protected $model = Product::class;
    
    public function definition(): array
    {
        return [
            'title' => fake()->words(3, true),
            'description' => fake()->sentence(20),
            'price' => fake()->randomFloat(2, 20, 300),
            'stock' => fake()->numberBetween(1, 50),
            'image' => null,
            'user_id' => User::inRandomOrder()->first()->id,
            'category_id' => Category::inRandomOrder()->first()->id,
        ];
    }
}
