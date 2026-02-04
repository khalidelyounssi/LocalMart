<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
    public function index() {
        return view('admin.permissions.index');
    }
    public function create() {}   // فورم الإضافة
    public function store() {}    // حفظ البيانات
    public function show($id) {}  // عرض عنصر واحد
    public function edit($id) {}  // فورم التعديل
    public function update($id) {} // تحديث البيانات
    public function destroy($id) {} // الحذف
}
