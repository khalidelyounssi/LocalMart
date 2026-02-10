<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

use function Symfony\Component\Clock\now;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $query = User::latest();
        if ($request->filled('search')) {
            $query->where('name', 'like', "%{$request->search}%")
                ->orWhere('email', 'like', "%{$request->search}%");
        }
        if ($request->filled('role') && $request->role !== 'all') {
            $query->role($request->role);
        }
        $users = $query->paginate(10);

        if ($request->ajax()) {
            return view('admin.users.partials._users_table', compact('users'))->render();
        }

        $totalUsers = User::count();
        $newUsersThisMonth = User::whereMonth('created_at', now()->format('m'))
            ->whereYear('created_at', now()->format('Y'))
            ->count();
        $suspendedUsers = User::where('status', 'suspended')->count();
        $totalUsersRoleClient = User::role('client')->count();
        $totalUsersRoleSeller = User::role('seller')->count();
        $totalUsersRoleModerator = User::role('moderator')->count();


        return view(
            'admin.users.index',
            compact('users', 'totalUsers', 'newUsersThisMonth', 'suspendedUsers', 'totalUsersRoleClient', 'totalUsersRoleSeller', 'totalUsersRoleModerator')
        );
    }

    public function toggleStatus(User $user)
    {

        try {
            $user->status = ($user->status === 'active') ? 'suspended' : 'active';
            $user->save();

            return response()->json([
                'success' => true,
                'message' => 'status de ' . $user->name . ' changé avec succès.',
                'new_status' => $user->status,
                'user_id' => $user->id,
                'updated_at' => $user->updated_at->format('d M Y'),
                'status' => [
                    'total_users' => User::count(),
                    'total_users_this_month' => User::whereMonth('created_at', now()->format('m'))->whereYear('created_at', now()->format('Y'))->count(),
                    'suspended_users' => User::where('status', 'suspended')->count(),
                ]
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'une erreur est survenue lors du changement de status de ' . $user->name . '.',
            ], 500);
        }
    }

    public function updateRole(Request $request, User $user)
    {
        try {
            $user->syncRoles([$request->role]);

            return response()->json([
                'success' => true,
                'message' => 'Role de ' . $user->name . ' changé avec succès.',
                'new_role' => $request->role,
                'user_id' => $user->id,
                'role_counts' => [
                    'total_clients' => User::role('client')->count(),
                    'total_sellers' => User::role('seller')->count(),
                    'total_moderators' => User::role('moderator')->count(),
                ]
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Une erreur est survenue lors du changement de rôle de ' . $user->name . '.',
            ], 500);
        }
    }

    public function create() {}   // فورم الإضافة
    public function store() {}    // حفظ البيانات
    public function show($id) {}  // عرض عنصر واحد
    public function edit($id) {}  // فورم التعديل
    public function update($id) {} // تحديث البيانات
    public function destroy(User $user)
    {
        try {
            $userName = $user->name;
            $user->delete();

            return response()->json([
                'success' => true,
                'message' => 'utilisateur ' . $userName . ' supprimé avec succès.',
                'status' => [
                    'total_users' => User::count(),
                    'total_users_this_month' => User::whereMonth('created_at', now()->format('m'))->whereYear('created_at', now()->format('Y'))->count(),
                    'suspended_users' => User::where('status', 'suspended')->count(),
                    'total_clients' => User::role('client')->count(),
                    'total_sellers' => User::role('seller')->count(),
                    'total_moderators' => User::role('moderator')->count(),

                ]
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'une erreur est survenue lors de la suppression de ' . $user->name . '.',
            ], 500);
        }
    }
}
