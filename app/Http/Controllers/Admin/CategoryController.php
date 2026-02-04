<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index() {
        return view('admin.categories.index');
    }
    public function create() {
        return view('admin.categories.create');
    }
    public function store(Request $request) {
        $request->validate([

        ]);
    }
    public function show($id) {}
    public function edit($id) {}
    public function update($id) {}
    public function destroy($id) {}
}
