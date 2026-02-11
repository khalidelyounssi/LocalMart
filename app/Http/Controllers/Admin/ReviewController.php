<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class ReviewController extends Controller
{
public function index() {
    return view('admin.comments.index');
}    // عرض القائمة
public function create() {}   // فورم الإضافة
public function store() {}    // حفظ البيانات
public function show($id) {
    $product = Product::where('id' , $id)->with('user')->with('review')->with('category')->first();
    $countReview = $product->review->count();
    $averageRating = $product->review->avg('rating');
    $rating = round($averageRating * 2) / 2;
    return view('admin.comments.product' , compact('product' , 'countReview' , 'rating'));
}  // عرض عنصر واحد
public function edit($id) {}  // فورم التعديل
public function update($id) {} // تحديث البيانات
public function destroy($id) {} // الحذف
}
