@extends('layouts.admin')

@section('content')
<div class="flex justify-between items-center mb-8">
    <div>
        <h1 class="text-2xl font-bold text-gray-900">Reports Management</h1>
        <p class="text-gray-500 text-sm">Monitor and moderate flagged user comments</p>
    </div>
    <div class="flex gap-2">
    </div>
</div>

<div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
    <div class="bg-white p-6 rounded-2xl border border-red-100 shadow-sm flex items-center justify-between relative overflow-hidden">
        <div class="absolute right-0 top-0 w-16 h-full bg-gradient-to-l from-red-50 to-transparent"></div>
        <div>
            <p class="text-xs font-bold text-red-400 uppercase tracking-wider mb-1">Pending Reports</p>
            <h3 class="text-3xl font-bold text-gray-900">{{ $countReport }}</h3>
        </div>
        <div class="w-12 h-12 bg-red-50 rounded-xl flex items-center justify-center text-red-500 z-10">
            <i class="fa-solid fa-bell"></i>
        </div>
    </div>
    <div class="bg-white p-6 rounded-2xl border border-yellow-100 shadow-sm flex items-center justify-between relative overflow-hidden">
        <div class="absolute right-0 top-0 w-16 h-full bg-gradient-to-l from-yellow-50 to-transparent"></div>
        <div>
            <p class="text-xs font-bold text-yellow-400 uppercase tracking-wider mb-1">Product Suspended</p>
            <h3 class="text-3xl font-bold text-yellow-900">{{ $countProductSuspended }}</h3>
        </div>
        <div class="w-12 h-12 bg-orange-50 rounded-xl flex items-center justify-center text-orange-500">
            <i class="fa-solid fa-ban"></i>
        </div>
    </div>
    <div class="bg-white p-6 rounded-2xl border border-gray-100 shadow-sm flex items-center justify-between relative overflow-hidden">
        <div class="absolute right-0 top-0 w-16 h-full bg-gradient-to-l from-gray-50 to-transparent"></div>
        <div>
            <p class="text-xs font-bold text-gray-400 uppercase tracking-wider mb-1">Spam Accounts Banned</p>
            <h3 class="text-3xl font-bold text-gray-900">{{ $countSuspendAccounts }}</h3>
        </div>
        <div class="w-12 h-12 bg-gray-50 rounded-xl flex items-center justify-center text-gray-400">
            <i class="fa-solid fa-user-slash"></i>
        </div>
    </div>
</div>
<div>
    <h1 class="text-2xl font-semibold text-gray-900 mt-4">Reported Reviews</h1>
    <p class="text-gray-500 text-sm mb-4">Monitor and moderate flagged user comments</p>
</div>
<livewire:product-search />
<div>
    <h1 class="text-2xl font-semibold text-gray-900 mt-4">Reported Product</h1>
    <p class="text-gray-500 text-sm mb-4">Monitor and moderate flagged seller product</p>
</div>
<livewire:reported-product-search />

@endsection