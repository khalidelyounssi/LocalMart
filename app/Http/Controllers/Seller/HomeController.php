<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
{
    $userId = auth()->id();

    $totalEarnings = \App\Models\OrderItem::whereHas('product', function($q) use ($userId) {
        $q->where('user_id', $userId);
    })->sum(\DB::raw('price_at_purchase * quantity'));

    $productsCount = \App\Models\Product::where('user_id', $userId)->count();

    $pendingOrdersCount = \App\Models\Order::whereHas('items.product', function($q) use ($userId) {
        $q->where('user_id', $userId);
    })->where('status', 'pending')->count();

    return view('seller.dashboard.dashboard', compact('totalEarnings', 'productsCount', 'pendingOrdersCount'));
}
}
