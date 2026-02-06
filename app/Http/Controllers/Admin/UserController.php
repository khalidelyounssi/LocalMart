<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

use function Symfony\Component\Clock\now;

class UserController extends Controller
{
    public function index()
    {
        $users = User::latest()->paginate(10);

        $totalUsers = User::count();
        $newUsersThisMonth = User::whereMonth('created_at', now()->format('m'))
            ->whereYear('created_at', now()->format('Y'))
            ->count();
        $suspendedUsers = User::where('status', 'suspended')->count();

        return view('admin.users.index', compact('users', 'totalUsers', 'newUsersThisMonth', 'suspendedUsers'));
    }   

    public function toggleStatus (User $user) 
    {
        $user->status = ($user->status === 'active') ? 'suspended' : 'active';
        $user->save();

        return back()->with('success', 'Le statut de l`utilisateur a été modifié avec succès.');
    }
    public function create() {}   // فورم الإضافة
    public function store() {}    // حفظ البيانات
    public function show($id) {}  // عرض عنصر واحد
    public function edit($id) {}  // فورم التعديل
    public function update($id) {} // تحديث البيانات
    public function destroy($id) {} // الحذف
}
