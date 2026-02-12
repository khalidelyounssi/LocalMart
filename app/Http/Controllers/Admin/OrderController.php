<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\OrderStatusUpdated;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Support\Facades\Mail; 

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

        return view('admin.orders.index', compact('orders'));
    }

    
    public function updateStatus(Request $request, OrderItem $item)
    {
        if ($item->product->user_id !== auth()->id()) {
            return back()->with('error', 'Action non autorisée.');
        }

        $request->validate([
            'status' => 'required|in:pending,shipped,delivered',
        ]);

        $item->update([
            'status' => $request->status
        ]);

        try {
            $clientEmail = $item->order->user->email;

            Mail::to($clientEmail)->send(new OrderStatusUpdated($item));
            
            return back()->with('success', 'Le statut a été mis à jour et l\'e-mail a été envoyé au client !');
        } catch (\Exception $e) {
            return back()->with('success', 'Statut mis à jour, mais l\'e-mail n\'a pas pu être envoyé.');
        }
    }
}