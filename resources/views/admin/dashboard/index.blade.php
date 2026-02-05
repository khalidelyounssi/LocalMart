@extends('layouts.admin')

@section('content')
    <div class="mb-8">
        <h1 class="text-2xl font-bold text-gray-900">Admin Dashboard</h1>
        <p class="text-gray-500 text-sm">fast access to all statistique of your platform</p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
        <div class="bg-white p-6 rounded-xl border border-gray-200 shadow-sm">
            <div class="flex items-center justify-between mb-3">
                <p class="text-sm text-gray-500 font-medium">Total Revenue</p>
                <div class="w-10 h-10 bg-green-100 rounded-lg flex items-center justify-center">
                    <i class="fa-solid fa-dollar-sign text-green-600"></i>
                </div>
            </div>
            <h2 class="text-2xl font-bold text-gray-800 mb-1">2</h2>
            <div class="flex items-center gap-1 text-sm text-green-600">
                <i class="fa-solid fa-arrow-up text-xs"></i>
                <span>8% from last month</span>
            </div>
        </div>

        <div class="bg-white p-6 rounded-xl border border-gray-200 shadow-sm">
            <div class="flex items-center justify-between mb-3">
                <p class="text-sm text-gray-500 font-medium">Total Orders</p>
                <div class="w-10 h-10 bg-blue-100 rounded-lg flex items-center justify-center">
                    <i class="fa-solid fa-cart-shopping text-blue-600"></i>
                </div>
            </div>
            <h2 class="text-2xl font-bold text-gray-800 mb-1">2</h2>
            <div class="flex items-center gap-1 text-sm text-green-600">
                <i class="fa-solid fa-arrow-up text-xs"></i>
                <span>8% from last month</span>
            </div>
        </div>
    
        <div class="bg-white p-6 rounded-xl border border-gray-200 shadow-sm">
            <div class="flex items-center justify-between mb-3">
                <p class="text-sm text-gray-500 font-medium">Total Products</p>
                <div class="w-10 h-10 bg-purple-100 rounded-lg flex items-center justify-center">
                    <i class="fa-solid fa-box-open text-purple-600"></i>
                </div>
            </div>
            <h2 class="text-2xl font-bold text-gray-800 mb-1">2</h2>
            <div class="flex items-center gap-1 text-sm text-green-600">
                <i class="fa-solid fa-arrow-up text-xs"></i>
                <span>8% from last month</span>
            </div>
        </div>

        <div class="bg-white p-6 rounded-xl border border-gray-200 shadow-sm">
            <div class="flex items-center justify-between mb-3">
                <p class="text-sm text-gray-500 font-medium">Total Users</p>
                <div class="w-10 h-10 bg-red-100 rounded-lg flex items-center justify-center">
                    <i class="fa-solid fa-users text-red-600"></i>
                </div>
            </div>
            <h2 class="text-2xl font-bold text-gray-800 mb-1">2</h2>
            <div class="flex items-center gap-1 text-sm text-green-600">
                <i class="fa-solid fa-arrow-up text-xs"></i>
                <span>8% from last month</span>
            </div>
        </div>

    </div>

    <div class="grid lg:grid-cols-2 gap-8 mb-8">
        <div class="bg-white p-6 rounded-xl border border-gray-200 shadow-sm">
            <h3 class="font-bold text-gray-700 mb-4">Revenue Trend</h3>
            <canvas id="revenueChart" height="200"></canvas>
        </div>
        
        <div class="bg-white p-6 rounded-xl border border-gray-200 shadow-sm">
            <h3 class="font-bold text-gray-700 mb-4">Monthly Status</h3>
            <canvas id="barChart" height="200"></canvas>
        </div>
    </div>

    <div class="bg-white rounded-xl border border-gray-200 shadow-sm overflow-hidden">
        <div class="p-6 border-b border-gray-100 flex justify-between items-center">
            <h3 class="font-bold text-gray-800">Recent Users</h3>
            <span class="px-3 py-1 bg-gray-100 text-gray-600 rounded-full text-xs font-bold">3 new users</span>
        </div>
        <div class="p-6 space-y-4">
            <div class="flex items-center justify-between p-4 border border-gray-50 rounded-xl hover:bg-gray-50 transition">
                <div class="flex items-center gap-4">
                    <div class="w-10 h-10 bg-blue-50 rounded-full flex items-center justify-center text-blue-600 font-bold">
                        L
                    </div>
                    <div>
                        <p class="font-semibold text-gray-800">lhandouz</p>
                        <p class="text-sm text-gray-500">lhandouz@gmail.com</p>
                    </div>
                </div>
                <div class="flex items-center gap-3">
                    <span class="px-3 py-1 bg-gray-100 text-gray-600 rounded-full text-xs font-medium">Client</span>
                    <span class="px-3 py-1bg-green-100 text-green-700 rounded-full text-xs font-bold">
                        pending
                    </span>
                    <span class="text-sm text-gray-400">22-11-2023</span>
                </div>
            </div>
        </div>
    </div>
@endsection