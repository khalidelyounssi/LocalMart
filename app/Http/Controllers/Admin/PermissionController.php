<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
    public function index() {
        return view('admin.permissions.index');
    }
    public function create() {}
    public function store() {}  
    public function show($id) {}  
    public function edit($id) {}  
    public function update($id) {} 
    public function destroy($id) {} 
}
