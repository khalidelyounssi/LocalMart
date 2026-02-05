@extends('layouts.admin')

@section('content')
    <div class="flex justify-between items-center mb-8">
        <div>
            <h1 class="text-2xl font-bold text-gray-900">Reported Reviews</h1>
            <p class="text-gray-500 text-sm">Monitor and moderate flagged user comments</p>
        </div>
        <div class="flex gap-2">
            <button class="bg-white border border-gray-200 text-gray-700 px-4 py-2 rounded-lg flex items-center gap-2 hover:bg-gray-50 transition font-medium shadow-sm text-sm">
                <i class="fa-solid fa-filter text-xs"></i> Filter Settings
            </button>
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
        <div class="bg-white p-6 rounded-2xl border border-red-100 shadow-sm flex items-center justify-between relative overflow-hidden">
            <div class="absolute right-0 top-0 w-16 h-full bg-gradient-to-l from-red-50 to-transparent"></div>
            <div>
                <p class="text-xs font-bold text-red-400 uppercase tracking-wider mb-1">Pending Reports</p>
                <h3 class="text-3xl font-bold text-gray-900">15</h3>
            </div>
            <div class="w-12 h-12 bg-red-50 rounded-xl flex items-center justify-center text-red-500 z-10">
                <i class="fa-solid fa-bell"></i>
            </div>
        </div>
        <div class="bg-white p-6 rounded-2xl border border-gray-100 shadow-sm flex items-center justify-between">
            <div>
                <p class="text-xs font-bold text-gray-400 uppercase tracking-wider mb-1">Processed Today</p>
                <h3 class="text-3xl font-bold text-gray-900">42</h3>
            </div>
            <div class="w-12 h-12 bg-green-50 rounded-xl flex items-center justify-center text-green-500">
                <i class="fa-solid fa-check-double"></i>
            </div>
        </div>
        <div class="bg-white p-6 rounded-2xl border border-gray-100 shadow-sm flex items-center justify-between">
            <div>
                <p class="text-xs font-bold text-gray-400 uppercase tracking-wider mb-1">Spam Accounts Banned</p>
                <h3 class="text-3xl font-bold text-gray-900">8</h3>
            </div>
            <div class="w-12 h-12 bg-gray-50 rounded-xl flex items-center justify-center text-gray-400">
                <i class="fa-solid fa-user-slash"></i>
            </div>
        </div>
    </div>

    <div class="bg-white rounded-2xl shadow-sm border border-gray-200 overflow-hidden">
        <div class="p-5 border-b border-gray-100 bg-white flex flex-col md:flex-row gap-4">
            <div class="relative flex-1">
                <i class="fa-solid fa-magnifying-glass absolute left-3 top-1/2 -translate-y-1/2 text-gray-400"></i>
                <input type="text" placeholder="Search by Product Name, SKU, or Seller..." 
                       class="w-full pl-10 pr-4 py-2.5 bg-gray-50 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 text-sm">
            </div>
            <div class="relative w-full md:w-64">
                <select class="w-full appearance-none border border-gray-200 rounded-lg px-4 py-2.5 bg-gray-50 text-sm outline-none cursor-pointer text-gray-600">
                    <option>Sort by: Highest Reports</option>
                    <option>Sort by: Newest First</option>
                    <option>Sort by: Oldest First</option>
                </select>
                <i class="fa-solid fa-chevron-down absolute right-3 top-1/2 -translate-y-1/2 text-gray-400 text-[10px] pointer-events-none"></i>
            </div>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead class="bg-gray-50 text-gray-500 text-[11px] uppercase tracking-wider font-bold">
                    <tr>
                        <th class="px-6 py-4">Product Details</th>
                        <th class="px-6 py-4">Seller</th>
                        <th class="px-6 py-4 text-center">Report Count</th>
                        <th class="px-6 py-4">Latest Flag Reason</th>
                        <th class="px-6 py-4 text-center">Severity</th>
                        <th class="px-6 py-4 text-right">Action</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100 bg-white">
                    
                    <tr class="hover:bg-red-50/10 transition group">
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-4">
                                <div class="w-12 h-12 bg-yellow-100 rounded-lg flex items-center justify-center shrink-0">
                                    <i class="fa-solid fa-headphones text-yellow-600"></i>
                                </div>
                                <div>
                                    <div class="font-bold text-gray-900 text-sm group-hover:text-blue-600 transition">Wireless Headphones</div>
                                    <div class="text-xs text-gray-400">ID: #4829</div>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-2">
                                <div class="w-6 h-6 rounded-full bg-blue-100 text-blue-600 flex items-center justify-center text-[10px] font-bold">TS</div>
                                <span class="text-sm text-gray-700 font-medium">TechStore</span>
                            </div>
                        </td>
                        <td class="px-6 py-4 text-center">
                            <div class="inline-flex items-center gap-2 px-3 py-1 bg-red-100 text-red-700 rounded-full text-xs font-bold border border-red-200">
                                <i class="fa-solid fa-flag"></i> 2
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <span class="text-sm text-gray-600">Scam / Fake Product</span>
                            <div class="text-xs text-gray-400 mt-0.5">2 hours ago</div>
                        </td>
                        <td class="px-6 py-4 text-center">
                            <span class="px-2 py-1 bg-red-50 text-red-600 rounded text-[10px] font-bold uppercase tracking-wide">High</span>
                        </td>
                        <td class="px-6 py-4 text-right">
                            <a href="{{ route('admin.comments.product' , 1) }}" class="inline-flex items-center gap-2 bg-white border border-gray-200 text-gray-700 hover:bg-blue-600 hover:text-white hover:border-blue-600 px-3 py-1.5 rounded-lg text-xs font-bold transition shadow-sm">
                                Manage Reviews <i class="fa-solid fa-arrow-right"></i>
                            </a>
                        </td>
                    </tr>

                    <tr class="hover:bg-gray-50/50 transition">
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-4">
                                <div class="w-12 h-12 bg-gray-100 rounded-lg flex items-center justify-center shrink-0">
                                    <i class="fa-solid fa-shirt text-gray-400"></i>
                                </div>
                                <div>
                                    <div class="font-bold text-gray-900 text-sm">Cotton T-Shirt</div>
                                    <div class="text-xs text-gray-400">ID: #1024</div>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-2">
                                <div class="w-6 h-6 rounded-full bg-purple-100 text-purple-600 flex items-center justify-center text-[10px] font-bold">FH</div>
                                <span class="text-sm text-gray-700 font-medium">Fashion Hub</span>
                            </div>
                        </td>
                        <td class="px-6 py-4 text-center">
                            <div class="inline-flex items-center gap-2 px-3 py-1 bg-orange-50 text-orange-700 rounded-full text-xs font-bold border border-orange-100">
                                <i class="fa-solid fa-flag"></i> 5
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <span class="text-sm text-gray-600">Inappropriate Language</span>
                            <div class="text-xs text-gray-400 mt-0.5">1 day ago</div>
                        </td>
                        <td class="px-6 py-4 text-center">
                            <span class="px-2 py-1 bg-orange-50 text-orange-600 rounded text-[10px] font-bold uppercase tracking-wide">Medium</span>
                        </td>
                        <td class="px-6 py-4 text-right">
                            <button class="inline-flex items-center gap-2 bg-white border border-gray-200 text-gray-700 hover:bg-blue-600 hover:text-white hover:border-blue-600 px-3 py-1.5 rounded-lg text-xs font-bold transition shadow-sm">
                                Manage Reviews <i class="fa-solid fa-arrow-right"></i>
                            </button>
                        </td>
                    </tr>

                    <tr class="hover:bg-gray-50/50 transition">
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-4">
                                <div class="w-12 h-12 bg-green-50 rounded-lg flex items-center justify-center shrink-0">
                                    <i class="fa-solid fa-carrot text-green-500"></i>
                                </div>
                                <div>
                                    <div class="font-bold text-gray-900 text-sm">Organic Carrots</div>
                                    <div class="text-xs text-gray-400">ID: #9921</div>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-2">
                                <div class="w-6 h-6 rounded-full bg-green-100 text-green-600 flex items-center justify-center text-[10px] font-bold">F</div>
                                <span class="text-sm text-gray-700 font-medium">FreshFarm</span>
                            </div>
                        </td>
                        <td class="px-6 py-4 text-center">
                            <div class="inline-flex items-center gap-2 px-3 py-1 bg-gray-100 text-gray-600 rounded-full text-xs font-bold">
                                <i class="fa-solid fa-flag"></i> 1
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <span class="text-sm text-gray-600">Spam Link</span>
                            <div class="text-xs text-gray-400 mt-0.5">3 days ago</div>
                        </td>
                        <td class="px-6 py-4 text-center">
                            <span class="px-2 py-1 bg-gray-100 text-gray-500 rounded text-[10px] font-bold uppercase tracking-wide">Low</span>
                        </td>
                        <td class="px-6 py-4 text-right">
                            <button class="inline-flex items-center gap-2 bg-white border border-gray-200 text-gray-700 hover:bg-blue-600 hover:text-white hover:border-blue-600 px-3 py-1.5 rounded-lg text-xs font-bold transition shadow-sm">
                                Manage Reviews <i class="fa-solid fa-arrow-right"></i>
                            </button>
                        </td>
                    </tr>

                </tbody>
            </table>
        </div>
        
        <div class="p-4 border-t border-gray-100 bg-gray-50 flex justify-between items-center">
            <span class="text-xs text-gray-500">Showing 3 of 15 flagged products</span>
            <div class="flex gap-1">
                <button class="w-8 h-8 flex items-center justify-center rounded border border-gray-200 bg-white text-gray-500 text-xs hover:bg-gray-50 disabled:opacity-50"><i class="fa-solid fa-chevron-left"></i></button>
                <button class="w-8 h-8 flex items-center justify-center rounded border border-gray-200 bg-white text-gray-500 text-xs hover:bg-gray-50"><i class="fa-solid fa-chevron-right"></i></button>
            </div>
        </div>
    </div>
@endsection