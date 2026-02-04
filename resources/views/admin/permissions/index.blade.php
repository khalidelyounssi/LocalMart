<x-admin-layout>
    <div class="flex justify-between items-center mb-8">
        <div>
            <h1 class="text-2xl font-bold text-gray-900">Roles & Permissions</h1>
            <p class="text-gray-500 text-sm">Manage user roles and access control</p>
        </div>
        <button class="bg-[#2563eb] text-white px-4 py-2 rounded-lg flex items-center gap-2 hover:bg-blue-700 transition font-medium shadow-sm">
            <i class="fa-solid fa-plus text-xs"></i> Create Role
        </button>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
        <div class="bg-white p-6 rounded-2xl border border-gray-100 shadow-sm">
            <p class="text-xs font-semibold text-gray-400 uppercase tracking-wider mb-2">Total Roles</p>
            <h3 class="text-3xl font-bold text-gray-900">4</h3>
        </div>
        <div class="bg-white p-6 rounded-2xl border border-gray-100 shadow-sm">
            <p class="text-xs font-semibold text-gray-400 uppercase tracking-wider mb-2">Total Users</p>
            <h3 class="text-3xl font-bold text-gray-900">8907</h3>
        </div>
        <div class="bg-white p-6 rounded-2xl border border-gray-100 shadow-sm">
            <p class="text-xs font-semibold text-gray-400 uppercase tracking-wider mb-2">Custom Roles</p>
            <h3 class="text-3xl font-bold text-gray-900">0</h3>
        </div>
        <div class="bg-white p-6 rounded-2xl border border-gray-100 shadow-sm">
            <p class="text-xs font-semibold text-gray-400 uppercase tracking-wider mb-2">Permissions</p>
            <h3 class="text-3xl font-bold text-gray-900">26</h3>
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
        <div class="bg-white p-6 rounded-2xl border border-gray-200 shadow-sm">
            <div class="flex justify-between items-start mb-4">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 bg-blue-50 rounded-lg flex items-center justify-center text-blue-600">
                        <i class="fa-solid fa-shield-halved"></i>
                    </div>
                    <div>
                        <h4 class="font-bold text-gray-900">Admin</h4>
                        <p class="text-xs text-gray-500">Full system access with all permissions</p>
                    </div>
                </div>
                <button class="text-gray-400 hover:text-gray-600"><i class="fa-solid fa-pen text-sm"></i></button>
            </div>
            <div class="flex items-center gap-2 mb-4 text-sm text-gray-500">
                <i class="fa-solid fa-users text-xs"></i> <span>5 users</span>
            </div>
            <div class="mb-4">
                <p class="text-xs font-bold text-gray-400 mb-3 uppercase">Permissions (17)</p>
                <div class="flex flex-wrap gap-2">
                    <span class="px-2 py-1 bg-gray-100 text-gray-600 rounded text-[10px] font-bold">users.view</span>
                    <span class="px-2 py-1 bg-gray-100 text-gray-600 rounded text-[10px] font-bold">users.create</span>
                    <span class="px-2 py-1 bg-gray-100 text-gray-600 rounded text-[10px] font-bold">users.edit</span>
                    <span class="px-2 py-1 bg-gray-100 text-gray-600 rounded text-[10px] font-bold">users.delete</span>
                    <span class="text-[10px] text-gray-400 font-bold self-center">+11 more</span>
                </div>
            </div>
            <button class="w-full py-2 bg-white border border-gray-200 rounded-lg text-sm font-bold text-gray-700 hover:bg-gray-50 transition">View Details</button>
        </div>

        <div class="bg-white p-6 rounded-2xl border border-gray-200 shadow-sm">
            <div class="flex justify-between items-start mb-4">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 bg-blue-50 rounded-lg flex items-center justify-center text-blue-600">
                        <i class="fa-solid fa-shield-halved"></i>
                    </div>
                    <div>
                        <h4 class="font-bold text-gray-900">Seller</h4>
                        <p class="text-xs text-gray-500">Can manage their own products and orders</p>
                    </div>
                </div>
                <div class="flex gap-2">
                    <button class="text-gray-400 hover:text-gray-600"><i class="fa-solid fa-pen text-sm"></i></button>
                </div>
            </div>
            <div class="flex items-center gap-2 mb-4 text-sm text-gray-500">
                <i class="fa-solid fa-users text-xs"></i> <span>156 users</span>
            </div>
            <div class="mb-4">
                <p class="text-xs font-bold text-gray-400 mb-3 uppercase">Permissions (6)</p>
                <div class="flex flex-wrap gap-2">
                    <span class="px-2 py-1 bg-gray-100 text-gray-600 rounded text-[10px] font-bold">products.view</span>
                    <span class="px-2 py-1 bg-gray-100 text-gray-600 rounded text-[10px] font-bold">products.create</span>
                    <span class="px-2 py-1 bg-gray-100 text-gray-600 rounded text-[10px] font-bold">orders.view</span>
                </div>
            </div>
            <button class="w-full py-2 bg-white border border-gray-200 rounded-lg text-sm font-bold text-gray-700 hover:bg-gray-50 transition">View Details</button>
        </div>
    </div>

    <div class="bg-white rounded-2xl shadow-sm border border-gray-200 overflow-hidden">
        <div class="p-6 border-b border-gray-100">
            <h3 class="font-bold text-gray-800">Permission Matrix</h3>
            <p class="text-xs text-gray-500 mt-1">Overview of permissions across all roles</p>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead class="bg-gray-50 text-gray-400 text-[10px] uppercase tracking-wider font-bold">
                    <tr>
                        <th class="px-6 py-4">Permission</th>
                        <th class="px-6 py-4 text-center">Admin</th>
                        <th class="px-6 py-4 text-center">Seller</th>
                        <th class="px-6 py-4 text-center">Moderator</th>
                        <th class="px-6 py-4 text-center">Client</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100 text-sm">
                    <tr>
                        <td class="px-6 py-4 font-medium text-gray-700">Users - view</td>
                        <td class="px-6 py-4 text-center"><span class="w-5 h-5 bg-green-100 text-green-600 rounded flex items-center justify-center mx-auto text-[10px]"><i class="fa-solid fa-check"></i></span></td>
                        <td class="px-6 py-4 text-center text-gray-300">-</td>
                        <td class="px-6 py-4 text-center text-gray-300">-</td>
                        <td class="px-6 py-4 text-center text-gray-300">-</td>
                    </tr>
                    <tr>
                        <td class="px-6 py-4 font-medium text-gray-700">Products - view</td>
                        <td class="px-6 py-4 text-center"><span class="w-5 h-5 bg-green-100 text-green-600 rounded flex items-center justify-center mx-auto text-[10px]"><i class="fa-solid fa-check"></i></span></td>
                        <td class="px-6 py-4 text-center"><span class="w-5 h-5 bg-green-100 text-green-600 rounded flex items-center justify-center mx-auto text-[10px]"><i class="fa-solid fa-check"></i></span></td>
                        <td class="px-6 py-4 text-center"><span class="w-5 h-5 bg-green-100 text-green-600 rounded flex items-center justify-center mx-auto text-[10px]"><i class="fa-solid fa-check"></i></span></td>
                        <td class="px-6 py-4 text-center"><span class="w-5 h-5 bg-green-100 text-green-600 rounded flex items-center justify-center mx-auto text-[10px]"><i class="fa-solid fa-check"></i></span></td>
                    </tr>
                    <tr>
                        <td class="px-6 py-4 font-medium text-gray-700">Orders - edit</td>
                        <td class="px-6 py-4 text-center"><span class="w-5 h-5 bg-green-100 text-green-600 rounded flex items-center justify-center mx-auto text-[10px]"><i class="fa-solid fa-check"></i></span></td>
                        <td class="px-6 py-4 text-center"><span class="w-5 h-5 bg-green-100 text-green-600 rounded flex items-center justify-center mx-auto text-[10px]"><i class="fa-solid fa-check"></i></span></td>
                        <td class="px-6 py-4 text-center text-gray-300">-</td>
                        <td class="px-6 py-4 text-center text-gray-300">-</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</x-admin-layout>