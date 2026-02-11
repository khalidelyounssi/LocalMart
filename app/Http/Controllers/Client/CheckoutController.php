<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail; 
use App\Mail\NewOrderSellerMail;    

class CheckoutController extends Controller
{
    public function index()
    {
        $cart = auth()->user()->cart()->with('items.product')->first();
        return view('checkout', compact('cart'));
    }

    public function confirm()
    {
        $user = auth()->user();
        $cart = $user->cart()->with('items.product')->first();

        if (!$cart || $cart->items->isEmpty()) {
            return redirect()->back()->with('error', 'Votre panier est vide.');
        }

        $order = null;

        try {
            DB::transaction(function () use ($cart, $user, &$order) {
                $total = 0;

                foreach ($cart->items as $item) {
                    $product = $item->product;
                    if ($item->quantity > $product->stock) {
                        throw new \Exception("Le produit {$product->title} n'a pas assez de stock.");
                    }
                    $total += $product->price * $item->quantity;
                }

                $order = Order::create([
                    'user_id'      => $user->id,
                    'total_amount' => $total,
                    'status'       => 'pending',
                ]);

                foreach ($cart->items as $item) {
                    $product = $item->product;

                    OrderItem::create([
                        'order_id'          => $order->id,
                        'product_id'        => $product->id,
                        'seller_id'         => $product->user_id,
                        'quantity'          => $item->quantity,
                        'price_at_purchase' => $product->price,
                        'status'            => 'pending',
                    ]);

                    $product->decrement('stock', $item->quantity);
                }

                $cart->items()->delete();
            });

            $order->load('items.product');

            foreach ($order->items as $orderItem) {
                $seller = \App\Models\User::find($orderItem->seller_id);
                
                if ($seller && $seller->email) {
                    Mail::to($seller->email)->send(new NewOrderSellerMail($orderItem));
                }
            }

            return redirect()
                ->route('OrderShow', $order->id)
                ->with('success', 'Commande confirmée avec succès.');

        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Erreur : ' . $e->getMessage());
        }
    }
}