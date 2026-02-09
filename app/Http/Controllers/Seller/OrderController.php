<?php

namespace App\Http\Controllers\Seller;

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

        return view('seller.orders.index', compact('orders'));
    }

    /**
     * تحديث حالة "قطعة" من الطلب وإرسال إيميل للكليان
     */
    public function updateStatus(Request $request, OrderItem $item)
    {
        // 1. التأكد أن البائع هو صاحب المنتج
        if ($item->product->user_id !== auth()->id()) {
            return back()->with('error', 'Action non autorisée.');
        }

        // 2. التحقق من صحة الحالة المرسلة
        $request->validate([
            'status' => 'required|in:pending,shipped,delivered',
        ]);

        // 3. تحديث الحالة في قاعدة البيانات
        $item->update([
            'status' => $request->status
        ]);

        try {
            // 4. الحصول على إيميل الكليان من الطلب (Order) المرتبط بالقطعة (Item)
            $clientEmail = $item->order->user->email;

            // 5. إرسال الإيميل
            Mail::to($clientEmail)->send(new OrderStatusUpdated($item));
            
            return back()->with('success', 'Le statut a été mis à jour et l\'e-mail a été envoyé au client !');
        } catch (\Exception $e) {
            // إذا وقع مشكل فـ الإيميل (مثلا الكونفيك ديال SMTP غلط)، الحالة غتبدل ولكن غيعطيك تنبيه
            return back()->with('success', 'Statut mis à jour, mais l\'e-mail n\'a pas pu être envoyé.');
        }
    }
}