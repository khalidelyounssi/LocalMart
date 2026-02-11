<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\User;
use App\Models\Report;
use App\Models\Review;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {

        $userId = auth()->id();


        $data = [];

        for ($i = 5; $i >= 0; $i--) {
            $start = now()->subMonths($i)->startOfMonth();
            $end   = now()->subMonths($i)->endOfMonth();

            $data[] = [
                'month' => $start->format('Y-m'),
                'sum_order' => Order::where('status', 'delivered')->whereBetween('created_at', [$start, $end])->sum('total_amount'),

                'sum_order_seller' => OrderItem::where('status', 'delivered')->whereBetween('created_at', [$start, $end])->where('seller_id' , $userId)->sum('price_at_purchase'),
                
                'count_order' => Order::where('status', 'delivered')->whereBetween('created_at', [$start, $end])->count(),
                'count_product' => Product::whereBetween('created_at', [$start, $end])->count(),
                'count_user' => User::whereBetween('created_at', [$start, $end])
                    ->whereHas('roles', function($query) {
                        $query->where('name', ['client' ,'seller']); 
                    })
                    ->count(),


            ];
        }


        $totalAmount = 0;
        $totalProduct = 0;
        $totalUser = 0;

        foreach ($data as $key => $value) {
            $totalAmount += $value['sum_order'];
            $totalProduct += $value['count_product'];
            $totalUser += $value['count_user'];
        }

        $maxValue = 0;

        foreach ($data as $key => $value) {
            if($maxValue < $value['sum_order']){
                $maxValue = $value['sum_order'];
            }
        }

        $maxValueSeller = 0;


        foreach ($data as $key => $value) {
            if($maxValueSeller < $value['sum_order_seller']){
                $maxValueSeller = $value['sum_order_seller'];
            }
        }

        $currentVal  = $data[5]['sum_order'] ?? 0;
        $previousVal = $data[4]['sum_order'] ?? 0;

        $currentOrder  = $data[5]['count_order'] ?? 0;
        $previousOrder = $data[4]['count_order'] ?? 0;

        $currentProduct  = $data[5]['count_product'] ?? 0;
        $previousProduct = $data[4]['count_product'] ?? 0;

        $currentUser  = $data[5]['count_user'] ?? 0;
        $previousUser = $data[4]['count_user'] ?? 0;

        if ($previousVal > 0) {
            $growthAmount = (($currentVal - $previousVal) / $previousVal) * 100;
        } else {
            $growthAmount = $currentVal > 0 ? 100 : 0;
        }

        if ($previousOrder > 0) {
            $growthOrder = (($currentOrder - $previousOrder) / $previousOrder) * 100;
        } else {
            $growthOrder = $currentOrder > 0 ? 100 : 0;
        }

        if ($previousProduct > 0) {
            $growthProduct = (($currentProduct - $previousProduct) / $previousProduct) * 100;
        } else {
            $growthProduct = $currentOrder > 0 ? 100 : 0;
        }

        if ($previousUser > 0) {
            $growthUser = (($currentUser - $previousUser) / $previousUser) * 100;
        } else {
            $growthUser = $currentUser > 0 ? 100 : 0;
        }


        $totalOrders = Order::all()->count();

        $recentUsers = DB::table('users as u')
        ->join('model_has_roles as m' , 'm.model_id' , '=' , 'u.id')
        ->join('roles as r' , 'r.id' , '=' , 'm.role_id')
        -> selectRaw('u.name , u.email , u.created_at , r.name as role')
        ->whereIn('r.name', ['client', 'seller'])
        ->whereDate('u.created_at', Carbon::today())
        ->orderBy('u.created_at' , 'desc')
        ->get();

        $topProduct = DB::table('products as p')
            ->join('categories as c', 'p.category_id', '=', 'c.id')
            ->join('order_items as o', 'o.product_id', '=', 'p.id')
            ->selectRaw('p.title, p.stock , p.price , p.image , c.name as category, COUNT(o.id) as count, SUM(o.quantity * o.price_at_purchase) as revenue')
            ->groupBy('p.title', 'c.name' , 'p.stock' , 'p.price' , 'p.image')
            ->get();




        $topSellerProducts = DB::table('products as p')
            ->join('categories as c', 'p.category_id', '=', 'c.id')
            ->join('order_items as o', 'o.product_id', '=', 'p.id')
            ->where('o.seller_id', $userId)
            ->selectRaw('p.title, p.stock , p.price , p.image , c.name as category, COUNT(o.id) as count, SUM(o.quantity * o.price_at_purchase) as revenue')
            ->groupBy('p.title', 'c.name' , 'p.stock' , 'p.price' , 'p.image')
            ->get();
        

        

    $totalEarnings = \App\Models\OrderItem::whereHas('product', function($q) use ($userId) {
        $q->where('user_id', $userId);
    })->sum(\DB::raw('price_at_purchase * quantity'));

    $productsCount = \App\Models\Product::where('user_id', $userId)->count();

    $pendingOrdersCount = \App\Models\Order::whereHas('items.product', function($q) use ($userId) {
        $q->where('user_id', $userId);
    })->where('status', 'pending')->count();

    $recentOrders = OrderItem::where('seller_id', $userId)->with('order.user')->get();


    $reviewsReports = Report::where('reportable_type', Review::class)->where('status' , 'pending')->count();
    $productsReports = Report::where('reportable_type', Product::class)->where('status' , 'pending')->count();

        return view('admin.dashboard.index',  compact('data', 'totalAmount', 'growthAmount' , 'currentVal' , 'maxValue' , 'totalOrders' , 'growthOrder' , 'totalProduct' , 'growthProduct' , 'totalUser' , 'growthUser' , 'topProduct' , 'recentUsers'
                                                        ,'totalEarnings', 'productsCount', 'pendingOrdersCount' , 'topSellerProducts' , 'maxValueSeller' , 'recentOrders' ,'reviewsReports' ,'productsReports'));
    }
    public function create() {}   // فورم الإضافة
    public function store() {}    // حفظ البيانات
    public function show($id) {}  // عرض عنصر واحد
    public function edit($id) {}  // فورم التعديل
    public function update($id) {} // تحديث البيانات
    public function destroy($id) {} // الحذف
}
