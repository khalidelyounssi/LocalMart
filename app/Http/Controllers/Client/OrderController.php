<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;


class OrderController extends Controller
{
      
    public function show(Order $order)
    {
      
        abort_if($order->user_id !== auth()->id(), 403);

        $order->load('items.product');

        return view('OrderShow', compact('order'));
    }  
    public function myOrders()
{
    $orders = auth()->user()->orders()->with('items.product')->latest()->get();
    return view('my-orders', compact('orders'));
}
 
}
