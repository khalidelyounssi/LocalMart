<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
   public function show(Product $product)
    {
        $product->load(['seller', 'category']);

        return view('productDeatails', compact('product'));
    }
}
