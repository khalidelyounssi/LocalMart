<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
    public function index()
{
    $roles = Role::with('permissions')->get();
    $permissions = Permission::all();
    $usersCount = User::count();
    
    // إحصائيات بسيطة
    $totalRoles = $roles->count();
    $totalPermissions = $permissions->count();

    return view('admin.permissions.index', compact('roles', 'permissions', 'usersCount', 'totalRoles', 'totalPermissions'));
}
public function toggle(Request $request)

{
    $request->validate([
        'role_id' => 'required|exists:roles,id',
        'permission' => 'required',
        'status' => 'required|boolean'
    ]);

    $role = Role::findById($request->role_id);
    
    if ($request->status) {
        $role->givePermissionTo($request->permission);
    } else {
        $role->revokePermissionTo($request->permission);
    }

    return response()->json(['success' => true]);
}
    public function create() {}
    public function store() {}  
    public function show($id) {}  
    public function edit($id) {}  
    public function update($id) {} 
    public function destroy($id) {} 
}
