<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $products = [
            [
                'title' => 'Minimalist Linen Shirt',
                'description' => 'Crafted from 100% organic linen.',
                'price' => 59.00,
                'stock' => 20,
                'user_id' => 1,      // Assurez-vous que l'utilisateur existe
                'category_id' => 1,  // Shirts
            ],
            [
                'title' => 'Organic Cotton Hoodie',
                'description' => 'Soft, eco-friendly hoodie.',
                'price' => 79.00,
                'stock' => 15,
                'user_id' => 1,
                'category_id' => 2,  // Hoodies
            ],
            [
                'title' => 'Eco-friendly Canvas Tote',
                'description' => 'Durable tote bag.',
                'price' => 25.00,
                'stock' => 50,
                'user_id' => 1,
                'category_id' => 3,  // Totes
            ],
            [
                'title' => 'Sustainable Bamboo Socks',
                'description' => 'Soft bamboo socks.',
                'price' => 12.00,
                'stock' => 30,
                'user_id' => 1,
                'category_id' => 4,  // Socks
            ],
            [
                'title' => 'Recycled Glass Water Bottle',
                'description' => 'Glass water bottle.',
                'price' => 30.00,
                'stock' => 10,
                'user_id' => 1,
                'category_id' => 5,  // Water Bottles
            ],
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}
