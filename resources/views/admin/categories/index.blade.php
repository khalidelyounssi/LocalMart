<x-admin-layout>
    <div class="flex justify-between items-center mb-8">
        <div>
            <h1 class="text-2xl font-bold text-gray-900">Categories Management</h1>
            <p class="text-gray-500 text-sm">Organize products into categories</p>
        </div>
        <button class="bg-[#2563eb] text-white px-4 py-2 rounded-lg flex items-center gap-2 hover:bg-blue-700 transition font-medium shadow-sm text-sm">
            <i class="fa-solid fa-plus text-xs"></i> Add Category
        </button>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
        <div class="bg-white p-6 rounded-2xl border border-gray-100 shadow-sm flex items-center justify-between">
            <div>
                <p class="text-xs font-semibold text-gray-400 uppercase tracking-wider mb-1">Total Categories</p>
                <h3 class="text-3xl font-bold text-gray-900">6</h3>
            </div>
            <div class="w-12 h-12 bg-blue-50 rounded-xl flex items-center justify-center text-blue-500">
                <i class="fa-solid fa-folder-open text-xl"></i>
            </div>
        </div>

        <div class="bg-white p-6 rounded-2xl border border-gray-100 shadow-sm flex items-center justify-between">
            <div>
                <p class="text-xs font-semibold text-gray-400 uppercase tracking-wider mb-1">Active</p>
                <h3 class="text-3xl font-bold text-green-600">6</h3>
            </div>
            <div class="w-12 h-12 bg-green-50 rounded-xl flex items-center justify-center text-green-500">
                <i class="fa-solid fa-arrow-trend-up text-xl"></i>
            </div>
        </div>

        <div class="bg-white p-6 rounded-2xl border border-gray-100 shadow-sm flex items-center justify-between">
            <div>
                <p class="text-xs font-semibold text-gray-400 uppercase tracking-wider mb-1">Inactive</p>
                <h3 class="text-3xl font-bold text-gray-900">0</h3>
            </div>
            <div class="w-12 h-12 bg-gray-50 rounded-xl flex items-center justify-center text-gray-400">
                <i class="fa-solid fa-folder text-xl"></i>
            </div>
        </div>

        <div class="bg-white p-6 rounded-2xl border border-gray-100 shadow-sm flex items-center justify-between">
            <div>
                <p class="text-xs font-semibold text-gray-400 uppercase tracking-wider mb-1">Total Products</p>
                <h3 class="text-3xl font-bold text-gray-900">6</h3>
            </div>
            <div class="w-12 h-12 bg-purple-50 rounded-xl flex items-center justify-center text-purple-500">
                <i class="fa-solid fa-box-archive text-xl"></i>
            </div>
        </div>
    </div>

    <div class="bg-white rounded-2xl shadow-sm border border-gray-200 overflow-hidden">
        <div class="p-4 border-b border-gray-100 bg-white">
            <div class="relative w-full md:w-1/3">
                <i class="fa-solid fa-magnifying-glass absolute left-3 top-1/2 -translate-y-1/2 text-gray-400"></i>
                <input type="text" placeholder="Search categories..." 
                       class="w-full pl-10 pr-4 py-2 bg-gray-50 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 text-sm">
            </div>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead class="bg-gray-50 text-gray-500 text-[11px] uppercase tracking-wider font-bold">
                    <tr>
                        <th class="px-6 py-4 w-16">Icon</th>
                        <th class="px-6 py-4">Name</th>
                        <th class="px-6 py-4">Slug</th>
                        <th class="px-6 py-4 text-center">Products</th>
                        <th class="px-6 py-4 text-center">Status</th>
                        <th class="px-6 py-4">Created</th>
                        <th class="px-6 py-4 text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100 bg-white">
                    <tr class="hover:bg-gray-50/50 transition">
                        <td class="px-6 py-4 text-center">
                            <div class="w-10 h-10 bg-blue-50 rounded-lg flex items-center justify-center text-blue-500">
                                <i class="fa-solid fa-folder"></i>
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <div class="font-bold text-gray-900 text-sm">Electronics</div>
                            <div class="text-xs text-gray-400">Browse our collection of electronics products</div>
                        </td>
                        <td class="px-6 py-4">
                            <span class="px-2 py-1 bg-gray-100 text-gray-600 rounded text-xs font-mono lowercase tracking-tight">electronics</span>
                        </td>
                        <td class="px-6 py-4 text-center">
                            <span class="px-3 py-1 border border-gray-200 text-gray-700 rounded-lg text-xs font-bold whitespace-nowrap">1 products</span>
                        </td>
                        <td class="px-6 py-4 text-center">
                            <span class="px-3 py-1 bg-green-50 text-green-600 rounded-full text-[11px] font-bold">active</span>
                        </td>
                        <td class="px-6 py-4 text-sm text-gray-600 font-medium">2026-01-15</td>
                        <td class="px-6 py-4 text-right">
                            <div class="flex justify-end gap-3 text-sm">
                                <button class="text-gray-600 hover:text-blue-600 transition"><i class="fa-solid fa-chart-line"></i></button>
                                <button class="text-gray-600 hover:text-gray-900 transition"><i class="fa-solid fa-pen"></i></button>
                                <button class="text-red-500 hover:text-red-700 transition"><i class="fa-solid fa-trash-can"></i></button>
                            </div>
                        </td>
                    </tr>

                    <tr class="hover:bg-gray-50/50 transition">
                        <td class="px-6 py-4 text-center">
                            <div class="w-10 h-10 bg-blue-50 rounded-lg flex items-center justify-center text-blue-500">
                                <i class="fa-solid fa-folder"></i>
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <div class="font-bold text-gray-900 text-sm">Clothing</div>
                            <div class="text-xs text-gray-400">Browse our collection of clothing products</div>
                        </td>
                        <td class="px-6 py-4">
                            <span class="px-2 py-1 bg-gray-100 text-gray-600 rounded text-xs font-mono lowercase tracking-tight">clothing</span>
                        </td>
                        <td class="px-6 py-4 text-center">
                            <span class="px-3 py-1 border border-gray-200 text-gray-700 rounded-lg text-xs font-bold whitespace-nowrap">1 products</span>
                        </td>
                        <td class="px-6 py-4 text-center">
                            <span class="px-3 py-1 bg-green-50 text-green-600 rounded-full text-[11px] font-bold">active</span>
                        </td>
                        <td class="px-6 py-4 text-sm text-gray-600 font-medium">2026-01-15</td>
                        <td class="px-6 py-4 text-right">
                            <div class="flex justify-end gap-3 text-sm">
                                <button class="text-gray-600 hover:text-blue-600 transition"><i class="fa-solid fa-chart-line"></i></button>
                                <button class="text-gray-600 hover:text-gray-900 transition"><i class="fa-solid fa-pen"></i></button>
                                <button class="text-red-500 hover:text-red-700 transition"><i class="fa-solid fa-trash-can"></i></button>
                            </div>
                        </td>
                    </tr>

                    </tbody>
            </table>
        </div>
    </div>
</x-admin-layout>