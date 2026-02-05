<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;

class OrderController extends Controller
{
     public function index()
{
    $orders = Order::whereHas('items.product', function($q) {
        $q->where('user_id', auth()->id());
    })->with(['user', 'items.product'])->latest()->get();

    return view('seller.orders.index', compact('orders'));
}

public function updateStatus(Request $request, Order $order)
{
    $order->update(['status' => $request->status]);

    return back()->with('success', 'Statut mis à jour !');
}
}
