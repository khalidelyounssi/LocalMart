@extends('layouts.admin')

@section('content')
    <div class="flex justify-between items-center mb-8">
        <div>
            <h1 class="text-2xl font-bold text-gray-900">Users Management</h1>
            <p class="text-gray-500 text-sm">Manage user accounts and permissions</p>
        </div>
        <button class="bg-[#2563eb] text-white px-4 py-2 rounded-lg flex items-center gap-2 hover:bg-blue-700 transition font-medium">
            <i class="fa-solid fa-user-plus text-sm"></i>
            Add User
        </button>
    </div>

    <div class="bg-white rounded-2xl shadow-sm border border-gray-200 overflow-hidden">
        <div class="p-4 border-b border-gray-100 flex gap-4 bg-white">
            <div class="relative flex-1">
                <i class="fa-solid fa-magnifying-glass absolute left-3 top-1/2 -translate-y-1/2 text-gray-400"></i>
                <input type="text" placeholder="Search users..." 
                       class="w-full pl-10 pr-4 py-2 bg-gray-50 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 text-sm">
            </div>
            <div class="relative">
                <select class="appearance-none border border-gray-200 rounded-lg px-8 py-2 bg-gray-50 text-sm outline-none cursor-pointer">
                    <option>All Roles</option>
                    <option>Client</option>
                    <option>Seller</option>
                    <option>Moderator</option>
                </select>
                <i class="fa-solid fa-chevron-down absolute right-3 top-1/2 -translate-y-1/2 text-gray-400 text-[10px] pointer-events-none"></i>
            </div>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead class="bg-gray-50 text-gray-500 text-xs uppercase tracking-wider">
                    <tr>
                        <th class="px-6 py-4 font-semibold">User</th>
                        <th class="px-6 py-4 font-semibold text-center">Role</th>
                        <th class="px-6 py-4 font-semibold text-center">Status</th>
                        <th class="px-6 py-4 font-semibold">Join Date</th>
                        <th class="px-6 py-4 font-semibold">Activity</th>
                        <th class="px-6 py-4 font-semibold text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100 bg-white">
                    <tr class="hover:bg-gray-50/50 transition">
                        <td class="px-6 py-4 flex items-center gap-4">
                            <div class="w-10 h-10 bg-blue-50 text-[#1e40af] rounded-full flex items-center justify-center font-bold text-sm">AJ</div>
                            <div>
                                <div class="font-bold text-gray-900 text-sm">Alice Johnson</div>
                                <div class="text-xs text-gray-500">alice@example.com</div>
                            </div>
                        </td>
                        <td class="px-6 py-4 text-center">
                            <span class="px-3 py-1 bg-gray-100 text-gray-600 rounded-full text-[11px] font-bold">client</span>
                        </td>
                        <td class="px-6 py-4 text-center">
                            <span class="px-3 py-1 bg-green-50 text-green-600 rounded-full text-[11px] font-bold">active</span>
                        </td>
                        <td class="px-6 py-4 text-sm text-gray-600">2025-11-15</td>
                        <td class="px-6 py-4 text-sm text-gray-600">12 orders</td>
                        <td class="px-6 py-4 text-right">
                            <button class="text-gray-400 hover:text-gray-600 transition p-2"><i class="fa-solid fa-ellipsis-vertical"></i></button>
                        </td>
                    </tr>

                    <tr class="hover:bg-gray-50/50 transition">
                        <td class="px-6 py-4 flex items-center gap-4">
                            <div class="w-10 h-10 bg-blue-50 text-[#1e40af] rounded-full flex items-center justify-center font-bold text-sm">BS</div>
                            <div>
                                <div class="font-bold text-gray-900 text-sm">Bob Smith</div>
                                <div class="text-xs text-gray-500">bob@example.com</div>
                            </div>
                        </td>
                        <td class="px-6 py-4 text-center">
                            <span class="px-3 py-1 bg-blue-50 text-blue-600 rounded-full text-[11px] font-bold">seller</span>
                        </td>
                        <td class="px-6 py-4 text-center">
                            <span class="px-3 py-1 bg-green-50 text-green-600 rounded-full text-[11px] font-bold">active</span>
                        </td>
                        <td class="px-6 py-4 text-sm text-gray-600">2025-10-22</td>
                        <td class="px-6 py-4 text-sm text-gray-600">34 products</td>
                        <td class="px-6 py-4 text-right">
                            <button class="text-gray-400 hover:text-gray-600 transition p-2"><i class="fa-solid fa-ellipsis-vertical"></i></button>
                        </td>
                    </tr>

                    <tr class="hover:bg-gray-50/50 transition">
                        <td class="px-6 py-4 flex items-center gap-4">
                            <div class="w-10 h-10 bg-orange-50 text-orange-600 rounded-full flex items-center justify-center font-bold text-sm">CW</div>
                            <div>
                                <div class="font-bold text-gray-900 text-sm">Carol White</div>
                                <div class="text-xs text-gray-500">carol@example.com</div>
                            </div>
                        </td>
                        <td class="px-6 py-4 text-center">
                            <span class="px-3 py-1 bg-orange-50 text-orange-600 rounded-full text-[11px] font-bold">moderator</span>
                        </td>
                        <td class="px-6 py-4 text-center">
                            <span class="px-3 py-1 bg-green-50 text-green-600 rounded-full text-[11px] font-bold">active</span>
                        </td>
                        <td class="px-6 py-4 text-sm text-gray-600">2025-09-10</td>
                        <td class="px-6 py-4 text-sm text-gray-600">-</td>
                        <td class="px-6 py-4 text-right">
                            <button class="text-gray-400 hover:text-gray-600 transition p-2"><i class="fa-solid fa-ellipsis-vertical"></i></button>
                        </td>
                    </tr>

                    <tr class="hover:bg-gray-50/50 transition">
                        <td class="px-6 py-4 flex items-center gap-4">
                            <div class="w-10 h-10 bg-gray-100 text-gray-600 rounded-full flex items-center justify-center font-bold text-sm">DB</div>
                            <div>
                                <div class="font-bold text-gray-900 text-sm">David Brown</div>
                                <div class="text-xs text-gray-500">david@example.com</div>
                            </div>
                        </td>
                        <td class="px-6 py-4 text-center">
                            <span class="px-3 py-1 bg-gray-100 text-gray-600 rounded-full text-[11px] font-bold">client</span>
                        </td>
                        <td class="px-6 py-4 text-center">
                            <span class="px-3 py-1 bg-red-50 text-red-600 rounded-full text-[11px] font-bold">suspended</span>
                        </td>
                        <td class="px-6 py-4 text-sm text-gray-600">2025-12-05</td>
                        <td class="px-6 py-4 text-sm text-gray-600">3 orders</td>
                        <td class="px-6 py-4 text-right">
                            <button class="text-gray-400 hover:text-gray-600 transition p-2"><i class="fa-solid fa-ellipsis-vertical"></i></button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection