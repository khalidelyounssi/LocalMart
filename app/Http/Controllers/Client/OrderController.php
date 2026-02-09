<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class OrderController extends Controller
{
     public function addItem(Product $product)
    {
        $user = auth()->user();

        $order = $user->orders()->where('status', 'pending')->first();
        if (!$order) {
            $order = $user->orders()->create([
                'total_amount' => 0,
            ]);
        }

   
        $orderItem = $order->items()->where('product_id', $product->id)->first();
        if ($orderItem) {
            $orderItem->increment('quantity');
        } else {
            $order->items()->create([
                'product_id' => $product->id,
                'quantity' => 1,
                'price_at_purchase' => $product->price,
            ]);
        }

      
        // $order->total_amount = $order->items()->sum(fn($i) => $i->quantity * $i->price_at_purchase);
        // $order->save();

        return back();
    }
}
