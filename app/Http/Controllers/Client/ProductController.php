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

    public function toggleLike(Product $product)
{
    $user = auth()->user();

    $like = $product->wishlists()->where('user_id', $user->id)->first();

    if ($like) {
        // Unlike
        $like->delete();
        $status = 'removed';
    } else {
        // Like
        $product->wishlists()->create([
            'user_id' => $user->id,
        ]);
        $status = 'added';
    }

    // Return JSON for AJAX
    return response()->json([
        'status' => $status,
        'likes_count' => $product->wishlists()->count(),
    ]);
}
}
