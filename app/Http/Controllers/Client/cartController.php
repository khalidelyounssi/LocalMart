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

    
   public function addItem(Request $request, Product $product)
{
    $request->validate([
        'quantity' => 'required|integer|min:1'
    ]);

    $quantityRequested = $request->input('quantity');

    $cart = auth()->user()->cart()->firstOrCreate([]);

    $cartItem = $cart->items()
        ->where('product_id', $product->id)
        ->first();

    $currentQuantity = $cartItem ? $cartItem->quantity : 0;

    $newTotalQuantity = $currentQuantity + $quantityRequested;

    if ($newTotalQuantity > $product->stock) {
        return redirect()->back()->with(
            'error',
            "Désolé, seulement {$product->stock} article(s) disponible(s) en stock."
        );
    }

    if ($cartItem) {
        $cartItem->update([
            'quantity' => $newTotalQuantity
        ]);
    } else {
        $cart->items()->create([
            'product_id' => $product->id,
            'quantity' => $quantityRequested,
        ]);
    }

    return redirect()->back()->with('success', 'Produit ajouté au panier');
}


   public function deleteItem(Product $product)
{
    $cart = auth()->user()->cart()->first();
    if (!$cart) return redirect()->back();

    $cartItem = $cart->items()->where('product_id', $product->id)->first();
    if ($cartItem) {
        $cartItem->delete(); 
    }

    return redirect()->back()->with('success', 'Produit supprimé du panier');
}

}
