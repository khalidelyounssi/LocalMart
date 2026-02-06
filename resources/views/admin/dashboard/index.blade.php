@extends('layouts.admin')

@section('content')
<div class="mb-8">
    <h1 class="text-2xl font-bold text-gray-900">Admin Dashboard</h1>
    <p class="text-gray-500 text-sm">fast access to all statistique of your platform</p>
</div>

<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
    <div class="bg-white p-6 rounded-xl border border-gray-200 shadow-sm">
        <div class="flex items-center justify-between mb-3">
            <p class="text-sm text-gray-500 font-medium">Monthly Amount</p>
            <div class="w-10 h-10 bg-green-100 rounded-lg flex items-center justify-center">
                <i class="fa-solid fa-dollar-sign text-green-600"></i>
            </div>
        </div>
        <h2 class="text-2xl font-bold text-gray-800 mb-1">{{ $currentVal }} MAD</h2>
        @if( round($growthAmount) > 0)
        <div class="flex items-center gap-1 text-sm text-green-600">
            <i class="fa-solid fa-arrow-up text-xs"></i>
            <span>{{ round($growthAmount) }}% from last month</span>
        </div>
        @else
        <div class="flex items-center gap-1 text-sm text-red-600">
            <i class="fa-solid fa-arrow-down text-xs"></i>
            <span>{{ round($growthAmount) }}% from last month</span>
        </div>
        @endif
    </div>

    <div class="bg-white p-6 rounded-xl border border-gray-200 shadow-sm">
        <div class="flex items-center justify-between mb-3">
            <p class="text-sm text-gray-500 font-medium">Total Orders</p>
            <div class="w-10 h-10 bg-blue-100 rounded-lg flex items-center justify-center">
                <i class="fa-solid fa-cart-shopping text-blue-600"></i>
            </div>
        </div>
        <h2 class="text-2xl font-bold text-gray-800 mb-1">{{ $totalOrders }}</h2>
        @if( round($growthOrder) > 0)
        <div class="flex items-center gap-1 text-sm text-green-600">
            <i class="fa-solid fa-arrow-up text-xs"></i>
            <span>{{ round($growthOrder) }}% from last month</span>
        </div>
        @else
        <div class="flex items-center gap-1 text-sm text-red-600">
            <i class="fa-solid fa-arrow-down text-xs"></i>
            <span>{{ round($growthOrder) }}% from last month</span>
        </div>
        @endif
    </div>

    <div class="bg-white p-6 rounded-xl border border-gray-200 shadow-sm">
        <div class="flex items-center justify-between mb-3">
            <p class="text-sm text-gray-500 font-medium">Total Products</p>
            <div class="w-10 h-10 bg-purple-100 rounded-lg flex items-center justify-center">
                <i class="fa-solid fa-box-open text-purple-600"></i>
            </div>
        </div>
        <h2 class="text-2xl font-bold text-gray-800 mb-1">{{ $totalProduct }}</h2>
        @if( round($growthProduct) > 0)
        <div class="flex items-center gap-1 text-sm text-green-600">
            <i class="fa-solid fa-arrow-up text-xs"></i>
            <span>{{ round($growthProduct) }}% from last month</span>
        </div>
        @else
        <div class="flex items-center gap-1 text-sm text-red-600">
            <i class="fa-solid fa-arrow-down text-xs"></i>
            <span>{{ round($growthProduct) }}% from last month</span>
        </div>
        @endif
    </div>

    <div class="bg-white p-6 rounded-xl border border-gray-200 shadow-sm">
        <div class="flex items-center justify-between mb-3">
            <p class="text-sm text-gray-500 font-medium">Total Users</p>
            <div class="w-10 h-10 bg-red-100 rounded-lg flex items-center justify-center">
                <i class="fa-solid fa-users text-red-600"></i>
            </div>
        </div>
        <h2 class="text-2xl font-bold text-gray-800 mb-1">{{ $totalUser }}</h2>
        @if( round($growthUser) > 0)
        <div class="flex items-center gap-1 text-sm text-green-600">
            <i class="fa-solid fa-arrow-up text-xs"></i>
            <span>{{ round($growthUser) }}% from last month</span>
        </div>
        @else
        <div class="flex items-center gap-1 text-sm text-red-600">
            <i class="fa-solid fa-arrow-down text-xs"></i>
            <span>{{ round($growthUser) }}% from last month</span>
        </div>
        @endif
    </div>

</div>

<div class="grid lg:grid-cols-2 gap-8 mb-8">
    <div class="bg-white p-6 rounded-lg shadow-md w-full">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-xl font-bold text-gray-800">Top Products</h2>
            <button class="px-4 py-1.5 text-sm font-medium text-gray-700 bg-white border border-gray-200 rounded-lg hover:bg-gray-50 transition">
                Manage
            </button>
        </div>

        <div class="space-y-5">
            @foreach($topProduct as $product)
            <div class="flex items-center gap-4">
                <div class="h-12 w-12 flex-shrink-0 rounded-xl bg-yellow-100 flex items-center justify-center text-yellow-600">
                    @if($product->image)
                    <img src="{{ asset('storage/' . $product->image) }}" class="w-16 h-16 object-cover rounded-xl border border-gray-200">
                    @else
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19V6l12-3v13M9 19c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zm12-3c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zM9 10l12-3"></path>
                    </svg>
                    @endif
                </div>
                <div class="flex-1">
                    <h3 class="text-sm font-bold text-gray-900">{{ $product->title }}</h3>
                    <p class="text-xs text-gray-500">Stock: {{ $product->stock }}  • {{ $product->price }} MAD</p>
                </div>
                <div class="flex-1 flex direction-column items-center gap-2">
                    <i class="fa-solid fa-arrow-up text-xs text-green-500"></i>
                    <h3 class="text-sm text-green-500">{{ $product->revenue }} MAD</h3>
                </div>
                <span class="px-2.5 py-1 rounded-md text-xs font-semibold bg-gray-100 text-gray-600">
                    {{ $product->category }}
                </span>
            </div>
            @endforeach
        </div>
    </div>

    <div class="bg-white p-6 rounded-lg shadow-md w-full">
        <h2 class="text-xl font-bold mb-6 text-gray-800">Monthly Revenue</h2>

        <div class="flex h-64">

            <div class="flex flex-col justify-between text-gray-400 text-sm pr-4 border-r border-dashed border-gray-200">
                <span>{{ $maxValue }}</span>
                <span>{{ $maxValue*3/4 }}</span>
                <span>{{ $maxValue/2 }}</span>
                <span>{{ $maxValue/4 }}</span>
                <span>0</span>
            </div>

            <div class="flex flex-1 items-end justify-between pl-4 relative">

                <div class="absolute inset-0 flex flex-col justify-between pointer-events-none z-0">
                    <div class="w-full h-px bg-gray-100 border-t border-dashed border-gray-200"></div>
                    <div class="w-full h-px bg-gray-100 border-t border-dashed border-gray-200"></div>
                    <div class="w-full h-px bg-gray-100 border-t border-dashed border-gray-200"></div>
                    <div class="w-full h-px bg-gray-100 border-t border-dashed border-gray-200"></div>
                    <div class="w-full h-px bg-gray-100 border-t border-dashed border-gray-200"></div>
                </div>
                @foreach($data as $month)
                <div class="flex flex-col items-center justify-end h-full w-1/6 z-10 group">
                    <span class="mb-1 text-xs font-bold text-gray-700 opacity-0 group-hover:opacity-100 transition-opacity">
                        {{ $month['sum_order'] }}
                    </span>
                    @if($maxValue == 0)
                    <div class="w-10 bg-black rounded-t-sm hover:bg-gray-800 transition-all duration-300" style="height: {{ $month['sum_order']/1*100 }}%"></div>
                    @else
                    <div class="w-10 bg-black rounded-t-sm hover:bg-gray-800 transition-all duration-300" style="height: {{ $month['sum_order']/$maxValue*100 }}%"></div>
                    @endif
                    <span class="mt-2 text-sm text-gray-500">{{ $month['month'] }}</span>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

<div class="bg-white rounded-xl border border-gray-200 shadow-sm overflow-hidden">
    <div class="p-6 border-b border-gray-100 flex justify-between items-center">
        <h3 class="font-bold text-gray-800">Recent Users</h3>
        <span class="px-3 py-1 bg-gray-100 text-gray-600 rounded-full text-xs font-bold">{{ count($recentUsers) }} new users</span>
    </div>
    <div class="p-6 space-y-4">
        @foreach( $recentUsers as $user)
        <div class="flex items-center justify-between p-4 border border-gray-50 rounded-xl hover:bg-gray-50 transition">
            <div class="flex items-center gap-4">
                <div class="w-10 h-10 bg-blue-50 rounded-full flex items-center justify-center text-blue-600 font-bold">
                    {{ $user->name[0]}}
                </div>
                <div>
                    <p class="font-semibold text-gray-800">{{ $user->name }}</p>
                    <p class="text-sm text-gray-500">{{ $user->email }}</p>
                </div>
            </div>
            <div class="flex items-center gap-3">
                <span class="px-3 py-1 bg-gray-100 text-gray-600 rounded-full text-xs font-medium">{{ $user->role }}</span>
                <span class="text-sm text-gray-400">{{ $user->created_at }}</span>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection