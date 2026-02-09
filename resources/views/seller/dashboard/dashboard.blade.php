@extends('layouts.seller')

@section('content')
<div class="mb-8">
    <h1 class="text-2xl font-bold text-gray-900">Seller Dashboard</h1>
    <p class="text-gray-500 text-sm">Accès rapide aux statistiques de votre boutique</p>
</div>

<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">
    
    <div class="bg-white p-6 rounded-xl border border-gray-200 shadow-sm">
        <div class="flex items-center justify-between mb-3">
            <p class="text-sm text-gray-500 font-medium">Mes Revenus</p>
            <div class="w-10 h-10 bg-green-100 rounded-lg flex items-center justify-center">
                <i class="fa-solid fa-wallet text-green-600"></i>
            </div>
        </div>
        <h2 class="text-2xl font-bold text-gray-800 mb-1">{{ number_format($totalEarnings, 2) }} MAD</h2>
        <div class="flex items-center gap-1 text-sm text-green-600">
            <i class="fa-solid fa-arrow-up text-xs"></i>
            <span>Statistiques en temps réel</span>
        </div>
    </div>

    <div class="bg-white p-6 rounded-xl border border-gray-200 shadow-sm">
        <div class="flex items-center justify-between mb-3">
            <p class="text-sm text-gray-500 font-medium">Mes Produits</p>
            <div class="w-10 h-10 bg-purple-100 rounded-lg flex items-center justify-center">
                <i class="fa-solid fa-box-open text-purple-600"></i>
            </div>
        </div>
        <h2 class="text-2xl font-bold text-gray-800 mb-1">{{ $productsCount }}</h2>
        <p class="text-xs text-gray-400">Total des articles en ligne</p>
    </div>

    <div class="bg-white p-6 rounded-xl border border-gray-200 shadow-sm">
        <div class="flex items-center justify-between mb-3">
            <p class="text-sm text-gray-500 font-medium">En Attente</p>
            <div class="w-10 h-10 bg-amber-100 rounded-lg flex items-center justify-center">
                <i class="fa-solid fa-clock text-amber-600"></i>
            </div>
        </div>
        <h2 class="text-2xl font-bold text-gray-800 mb-1">{{ $pendingOrdersCount }}</h2>
        <p class="text-xs text-gray-400">Commandes à traiter</p>
    </div>
</div>

<div class="grid lg:grid-cols-2 gap-8 mb-8">
    <div class="bg-white p-6 rounded-lg shadow-md w-full border border-gray-200">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-xl font-bold text-gray-800">Mes Tops Ventes</h2>
            <a href="{{ route('seller.products.index') }}" class="px-4 py-1.5 text-sm font-medium text-gray-700 bg-white border border-gray-200 rounded-lg hover:bg-gray-50 transition">
                Gérer
            </a>
        </div>

        <div class="space-y-5">
            {{-- هنا استعملت المتغيرات اللي ديجا عندك --}}
            @foreach($topProducts ?? [] as $product)
            <div class="flex items-center gap-4 border-b border-gray-50 pb-4">
                <div class="h-12 w-12 flex-shrink-0 rounded-xl bg-gray-100 overflow-hidden">
                    <img src="{{ asset('storage/' . $product->image) }}" class="w-full h-full object-cover">
                </div>
                <div class="flex-1">
                    <h3 class="text-sm font-bold text-gray-900">{{ $product->title }}</h3>
                    <p class="text-xs text-gray-500">Stock: {{ $product->stock }}</p>
                </div>
                <div class="text-right">
                    <h3 class="text-sm font-bold text-green-500">{{ $product->price }} MAD</h3>
                </div>
            </div>
            @endforeach
            @if(empty($topProducts))
                <p class="text-center text-gray-400 text-sm py-10">Aucune donnée disponible</p>
            @endif
        </div>
    </div>

    <div class="bg-white p-6 rounded-lg shadow-md w-full border border-gray-200">
        <h2 class="text-xl font-bold mb-6 text-gray-800">Évolution des Ventes</h2>
        <div class="flex h-64 items-center justify-center border-t border-gray-50">
             <p class="text-gray-400 italic">Graphique de performance (Bientôt disponible)</p>
        </div>
    </div>
</div>

<div class="bg-white rounded-xl border border-gray-200 shadow-sm overflow-hidden">
    <div class="p-6 border-b border-gray-100 flex justify-between items-center">
        <h3 class="font-bold text-gray-800">Dernières Commandes</h3>
        <a href="{{ route('seller.orders.index') }}" class="text-indigo-600 text-sm font-bold hover:underline">Voir tout</a>
    </div>
    <div class="p-6 space-y-4">
        {{-- افترضنا أن عندك متغير recentOrders صيفطتيه من الـ Controller --}}
        @foreach($recentOrders ?? [] as $order)
        <div class="flex items-center justify-between p-4 border border-gray-50 rounded-xl hover:bg-gray-50 transition">
            <div class="flex items-center gap-4">
                <div class="w-10 h-10 bg-indigo-50 rounded-full flex items-center justify-center text-indigo-600 font-bold">
                    {{ substr($order->user->name, 0, 1) }}
                </div>
                <div>
                    <p class="font-semibold text-gray-800">{{ $order->user->name }}</p>
                    <p class="text-sm text-gray-500">Total: {{ $order->total_price }} MAD</p>
                </div>
            </div>
            <div class="flex items-center gap-3">
                <span class="px-3 py-1 bg-amber-100 text-amber-700 rounded-full text-xs font-medium">{{ $order->status }}</span>
                <span class="text-sm text-gray-400">{{ $order->created_at->diffForHumans() }}</span>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection