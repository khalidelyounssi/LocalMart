<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;

class OrderController extends Controller
{
     public function index()
    {
        $orders = Order::whereHas('items.product', function ($query) {
            $query->where('user_id', auth()->id());
        })
        ->with(['user', 'items.product' => function ($query) {
            $query->where('user_id', auth()->id());
        }])
        ->latest()
        ->get();

        return view('seller.orders.index', compact('orders'));
    }

   
    public function updateStatus(Request $request, Order $order)
    {
        $hasProduct = $order->items()->whereHas('product', function ($query) {
            $query->where('user_id', auth()->id());
        })->exists();

        if (!$hasProduct) {
            return back()->with('error', 'Action non autorisée.');
        }

        $request->validate([
            'status' => 'required|in:pending,shipped,delivered',
        ]);

        $order->update([
            'status' => $request->status
        ]);

        return back()->with('success', 'Le statut de la commande a été mis à jour avec succès !');
    }
}
