<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;


use App\Models\OrderItem;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Mail\NewOrderSellerMail;
use Stripe\LineItem;

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

        $paymentMethod = request('payment_method', 'cod'); //'sripe' ou 'paypal' 'cod' par défaut

        $order = null;

        try {
            DB::transaction(function () use ($cart, $user, &$order, $paymentMethod) {
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
                    'payment_method' => $paymentMethod,
                    'is_paid' => false,
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
                if ($paymentMethod === 'cod') {
                    $cart->items()->delete();
                }
            });

            if ($paymentMethod === 'stripe') {
                return redirect()->route('checkout.stripe', $order->id);
            } elseif ($paymentMethod === 'paypal') {
                return redirect()->route('checkout.paypal', $order->id);
            }

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

    public function stripeIndex(Order $order)
    {
        \Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

        try {

            $lineItems = [];

            $order->load('items.product');

            foreach ($order->items as $item) {
                $lineItems[] = [
                    'price_data' => [
                        'currency' => 'mad',
                        'product_data' => [
                            'name' => $item->product->title
                        ],
                        'unit_amount' => $item->price_at_purchase * 100,
                    ],
                    'quantity' => $item->quantity,
                ];
            }
            $session = \Stripe\Checkout\Session::create([
                'payment_method_types' => ['card'],
                'line_items' =>$lineItems,
                'mode' => 'payment',
                'success_url' => route('checkout.success', $order->id) . '?session_id={CHECKOUT_SESSION_ID}',
                'cancel_url' => route('checkout.cancel', $order->id),
            ]);

            return redirect($session->url);
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Erreur Stripe : ' . $e->getMessage());
        }
    }

    public function stripeSuccess(Request $request, Order $order)
    {
        $sessionId = $request->query('session_id');

        if (!$sessionId) {
            return redirect()->route('checkout')->with('error', 'Session Stripe manquante.');
        }

        \Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

        try {
            $session = \Stripe\Checkout\Session::retrieve($sessionId);

            if ($session->payment_status === 'paid') {
                $order->update([
                    'is_paid' => true,
                    'status' => 'pending',
                    'payment_id' => $session->payment_intent,
                ]);

                $order->load('items.product');

                foreach ($order->items as $orderItem) {
                    $seller = \App\Models\User::find($orderItem->seller_id);

                    if ($seller && $seller->email) {
                        Mail::to($seller->email)->send(new NewOrderSellerMail($orderItem));
                    }
                }

                return redirect()
                    ->route('OrderShow', $order->id)
                    ->with('success', 'Paiement réussi et commande confirmée.');
            } else {
                return redirect()->route('checkout')->with('error', 'Paiement non réussi.');
            }
        } catch (\Exception $e) {
            return redirect()->route('checkout')->with('error', 'Erreur Stripe : ' . $e->getMessage());
        }
    }

    public function stripeCancel(Order $order)
    {
        return redirect()->route('checkout')->with('error', 'Paiement annulé.');
    }
}
