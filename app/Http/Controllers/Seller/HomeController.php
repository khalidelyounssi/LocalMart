<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
{
    $userId = auth()->id();

    // 1. حساب إجمالي الأرباح (فقط من المنتجات ديال هاد البائع)
    $totalEarnings = \App\Models\OrderItem::whereHas('product', function($q) use ($userId) {
        $q->where('user_id', $userId);
    })->sum(\DB::raw('price_at_purchase * quantity'));

    // 2. عدد المنتجات اللي حاط البائع
    $productsCount = \App\Models\Product::where('user_id', $userId)->count();

    // 3. عدد الطلبات اللي مازال ما صيفطهاش (Pending)
    $pendingOrdersCount = \App\Models\Order::whereHas('items.product', function($q) use ($userId) {
        $q->where('user_id', $userId);
    })->where('status', 'pending')->count();

    return view('seller.dashboard.dashboard', compact('totalEarnings', 'productsCount', 'pendingOrdersCount'));
}
}
