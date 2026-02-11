<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\CartItems;
use App\Models\Product;

class CartController extends Controller
{
    public function index()
    {
        $cart = auth()->user()->cart()->with('items.product')->first();
        return view('cart.index', compact('cart'));
    }

    public function addItem(Product $product)
    {
        $cart = auth()->user()->cart()->firstOrCreate([]);

        $cartItem = $cart->items()->where('product_id', $product->id)->first();

        if ($cartItem) {
            $cartItem->increment('quantity');
        } else {
            $cart->items()->create([
                'product_id' => $product->id,
                'quantity' => 1,
            ]);
        }

        return redirect()->back()->with('success', 'Produit ajouté au panier');
    }

    public function removeItem(Product $product)
    {
        $cart = auth()->user()->cart()->first();
        if (!$cart) return redirect()->back();

        $cartItem = $cart->items()->where('product_id', $product->id)->first();
        if ($cartItem) {
            if ($cartItem->quantity > 1) {
                $cartItem->decrement('quantity');
            } else {
                $cartItem->delete();
            }
        }

        return redirect()->back();
    }
}
