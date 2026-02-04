<x-admin-layout>
    <div class="flex justify-between items-center mb-8">
        <div>
            <h1 class="text-2xl font-bold text-gray-900">Products Management</h1>
            <p class="text-gray-500 text-sm">Manage all products across the platform</p>
        </div>
        <div class="flex gap-3">
            <button class="bg-white text-gray-700 border border-gray-200 px-4 py-2 rounded-lg flex items-center gap-2 hover:bg-gray-50 transition font-medium shadow-sm text-sm">
                <i class="fa-solid fa-download text-xs"></i> Export
            </button>
            <button class="bg-[#2563eb] text-white px-4 py-2 rounded-lg flex items-center gap-2 hover:bg-blue-700 transition font-medium shadow-sm text-sm">
                <i class="fa-solid fa-plus text-xs"></i> Add Product
            </button>
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
        <div class="bg-white p-6 rounded-2xl border border-gray-100 shadow-sm">
            <p class="text-xs font-semibold text-gray-400 uppercase tracking-wider mb-2">Total Products</p>
            <h3 class="text-3xl font-bold text-gray-900">6</h3>
        </div>
        <div class="bg-white p-6 rounded-2xl border border-gray-100 shadow-sm">
            <p class="text-xs font-semibold text-gray-400 uppercase tracking-wider mb-2">Active</p>
            <h3 class="text-3xl font-bold text-green-600">6</h3>
        </div>
        <div class="bg-white p-6 rounded-2xl border border-gray-100 shadow-sm">
            <p class="text-xs font-semibold text-gray-400 uppercase tracking-wider mb-2">Low Stock</p>
            <h3 class="text-3xl font-bold text-orange-500">0</h3>
        </div>
        <div class="bg-white p-6 rounded-2xl border border-gray-100 shadow-sm">
            <p class="text-xs font-semibold text-gray-400 uppercase tracking-wider mb-2">Out of Stock</p>
            <h3 class="text-3xl font-bold text-red-600">0</h3>
        </div>
    </div>

    <div class="bg-white rounded-2xl shadow-sm border border-gray-200 overflow-hidden">
        <div class="p-4 border-b border-gray-100 flex gap-4 bg-white">
            <div class="relative flex-1">
                <i class="fa-solid fa-magnifying-glass absolute left-3 top-1/2 -translate-y-1/2 text-gray-400"></i>
                <input type="text" placeholder="Search products..." 
                       class="w-full pl-10 pr-4 py-2 bg-gray-50 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 text-sm">
            </div>
            <div class="relative">
                <select class="appearance-none border border-gray-200 rounded-lg px-8 py-2 bg-gray-50 text-sm outline-none cursor-pointer">
                    <option>All Categories</option>
                    <option>Electronics</option>
                    <option>Sports</option>
                    <option>Home & Garden</option>
                </select>
                <i class="fa-solid fa-chevron-down absolute right-3 top-1/2 -translate-y-1/2 text-gray-400 text-[10px] pointer-events-none"></i>
            </div>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead class="bg-gray-50 text-gray-500 text-xs uppercase tracking-wider">
                    <tr>
                        <th class="px-6 py-4 font-semibold">Product</th>
                        <th class="px-6 py-4 font-semibold text-center">Category</th>
                        <th class="px-6 py-4 font-semibold">Seller</th>
                        <th class="px-6 py-4 font-semibold">Price</th>
                        <th class="px-6 py-4 font-semibold text-center">Stock</th>
                        <th class="px-6 py-4 font-semibold">Rating</th>
                        <th class="px-6 py-4 font-semibold text-center">Status</th>
                        <th class="px-6 py-4 font-semibold text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100 bg-white">
                    <tr class="hover:bg-gray-50/50 transition">
                        <td class="px-6 py-4 flex items-center gap-4">
                            <div class="w-12 h-12 bg-yellow-100 rounded-lg overflow-hidden flex items-center justify-center">
                                <i class="fa-solid fa-headphones text-yellow-600"></i> </div>
                            <div>
                                <div class="font-bold text-gray-900 text-sm">Wireless Headphones</div>
                                <div class="text-xs text-gray-400 font-mono">ID: 1</div>
                            </div>
                        </td>
                        <td class="px-6 py-4 text-center">
                            <span class="px-3 py-1 bg-blue-50 text-blue-600 rounded-full text-[11px] font-bold">Electronics</span>
                        </td>
                        <td class="px-6 py-4 text-sm text-gray-600 font-medium">TechStore</td>
                        <td class="px-6 py-4 text-sm font-bold text-gray-900">$89.99</td>
                        <td class="px-6 py-4 text-center">
                            <span class="px-3 py-1 bg-gray-100 text-gray-700 rounded-lg text-xs font-bold">45</span>
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-1">
                                <span class="text-sm font-bold text-gray-800">4.5</span>
                                <span class="text-xs text-gray-400">(128)</span>
                            </div>
                        </td>
                        <td class="px-6 py-4 text-center">
                            <span class="px-3 py-1 bg-green-50 text-green-600 rounded-full text-[11px] font-bold">Active</span>
                        </td>
                        <td class="px-6 py-4 text-right">
                            <button class="text-gray-400 hover:text-gray-600 transition p-2"><i class="fa-solid fa-ellipsis-vertical"></i></button>
                        </td>
                    </tr>

                    <tr class="hover:bg-gray-50/50 transition">
                        <td class="px-6 py-4 flex items-center gap-4">
                            <div class="w-12 h-12 bg-gray-100 rounded-lg flex items-center justify-center">
                                <i class="fa-solid fa-seedling text-gray-400"></i>
                            </div>
                            <div>
                                <div class="font-bold text-gray-900 text-sm">Organic Coffee Beans</div>
                                <div class="text-xs text-gray-400 font-mono">ID: 2</div>
                            </div>
                        </td>
                        <td class="px-6 py-4 text-center">
                            <span class="px-3 py-1 bg-gray-50 text-gray-500 rounded-full text-[11px] font-bold">Food & Beverage</span>
                        </td>
                        <td class="px-6 py-4 text-sm text-gray-600 font-medium">Local Roasters</td>
                        <td class="px-6 py-4 text-sm font-bold text-gray-900">$24.99</td>
                        <td class="px-6 py-4 text-center">
                            <span class="px-3 py-1 bg-gray-100 text-gray-700 rounded-lg text-xs font-bold">120</span>
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-1">
                                <span class="text-sm font-bold text-gray-800">4.8</span>
                                <span class="text-xs text-gray-400">(89)</span>
                            </div>
                        </td>
                        <td class="px-6 py-4 text-center">
                            <span class="px-3 py-1 bg-green-50 text-green-600 rounded-full text-[11px] font-bold">Active</span>
                        </td>
                        <td class="px-6 py-4 text-right">
                            <button class="text-gray-400 hover:text-gray-600 transition p-2"><i class="fa-solid fa-ellipsis-vertical"></i></button>
                        </td>
                    </tr>

                    <tr class="hover:bg-gray-50/50 transition">
                        <td class="px-6 py-4 flex items-center gap-4">
                            <div class="w-12 h-12 bg-teal-50 rounded-lg flex items-center justify-center">
                                <i class="fa-solid fa-mattress-pillow text-teal-600"></i>
                            </div>
                            <div>
                                <div class="font-bold text-gray-900 text-sm">Yoga Mat</div>
                                <div class="text-xs text-gray-400 font-mono">ID: 3</div>
                            </div>
                        </td>
                        <td class="px-6 py-4 text-center">
                            <span class="px-3 py-1 bg-gray-50 text-gray-500 rounded-full text-[11px] font-bold">Sports</span>
                        </td>
                        <td class="px-6 py-4 text-sm text-gray-600 font-medium">FitLife</td>
                        <td class="px-6 py-4 text-sm font-bold text-gray-900">$39.99</td>
                        <td class="px-6 py-4 text-center">
                            <span class="px-3 py-1 bg-gray-100 text-gray-700 rounded-lg text-xs font-bold">67</span>
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-1">
                                <span class="text-sm font-bold text-gray-800">4.6</span>
                                <span class="text-xs text-gray-400">(52)</span>
                            </div>
                        </td>
                        <td class="px-6 py-4 text-center">
                            <span class="px-3 py-1 bg-green-50 text-green-600 rounded-full text-[11px] font-bold">Active</span>
                        </td>
                        <td class="px-6 py-4 text-right">
                            <button class="text-gray-400 hover:text-gray-600 transition p-2"><i class="fa-solid fa-ellipsis-vertical"></i></button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</x-admin-layout>