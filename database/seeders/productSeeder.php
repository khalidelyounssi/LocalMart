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
                'description' => 'Crafted from 100% organic linen. This piece offers a breathable, relaxed fit for everyday comfort.',
                'price' => 59.00,
                'stock' => 20,
                'image' => null,
                'user_id' => 1,      // seller id
                'category_id' => 1,  // category id
            ],
            [
                'title' => 'Organic Cotton Hoodie',
                'description' => 'Soft, eco-friendly hoodie made from premium organic cotton.',
                'price' => 79.00,
                'stock' => 15,
                'image' => null,
                'user_id' => 1,
                'category_id' => 2,
            ],
            [
                'title' => 'Eco-friendly Canvas Tote',
                'description' => 'Durable tote bag made from recycled canvas. Perfect for daily errands.',
                'price' => 25.00,
                'stock' => 50,
                'image' => null,
                'user_id' => 1,
                'category_id' => 3,
            ],
            [
                'title' => 'Sustainable Bamboo Socks',
                'description' => 'Soft and breathable socks made from sustainable bamboo fibers.',
                'price' => 12.00,
                'stock' => 30,
                'image' => null,
                'user_id' => 1,
                'category_id' => 4,
            ],
            [
                'title' => 'Recycled Glass Water Bottle',
                'description' => 'Stylish water bottle made from 100% recycled glass with leak-proof cap.',
                'price' => 30.00,
                'stock' => 10,
                'image' => null,
                'user_id' => 1,
                'category_id' => 5,
            ],
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}

