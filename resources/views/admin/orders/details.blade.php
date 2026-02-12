@extends('layouts.admin')

@section('content')
<div class="max-w-4xl mx-auto p-6 text-left">
    <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-8 border-b pb-6">
        <div class="flex justify-center items-center gap-3">
        <a href="{{ route('admin.orders.index') }}" class="w-10 h-10 bg-white border border-gray-200 rounded-lg flex items-center justify-center text-gray-500 hover:text-blue-600 hover:border-blue-200 transition shadow-sm">
            <i class="fa-solid fa-arrow-left"></i>
        </a>
        <div>
            <h1 class="text-3xl font-bold text-gray-800">Détails de la commande <span class="text-blue-600">#{{ $order->id }}</span></h1>
            <p class="text-gray-500 mt-1">Passée le {{ $order->created_at }}</p>
        </div>
        </div>
        <div class="mt-4 md:mt-0">
            @php
            $statusClasses = [
            'pending' => 'bg-amber-100 text-amber-600',
            'shipped' => 'bg-blue-100 text-blue-600',
            'delivered' => 'bg-emerald-100 text-emerald-600'
            ];
            @endphp
            <span class="px-4 py-1.5 rounded-xl text-[10px] font-black uppercase {{ $statusClasses[$order->status] ?? 'bg-gray-100 text-gray-600' }}">
                {{ $order->status == 'pending' ? 'En attente' : ($order->status == 'shipped' ? 'Expédié' : 'Livré') }}
            </span>
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">

        <div class="md:col-span-2 space-y-6">

            <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100">
                <h2 class="text-xl font-bold text-gray-800 mb-4 border-b pb-2">Informations Client</h2>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 text-sm">
                    <div>
                        <p class="text-gray-500 font-medium">Nom complet</p>
                        <p class="font-semibold text-gray-800 uppercase">{{ $order->user->name }}</p>
                    </div>
                    <div>
                        <p class="text-gray-500 font-medium">Email</p>
                        <p class="font-semibold text-gray-800">{{ $order->user->email }}</p>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
                <div class="p-6 border-b border-gray-100">
                    <h2 class="text-xl font-bold text-gray-800">Articles commandés</h2>
                </div>
                <ul class="divide-y divide-gray-100">
                    @foreach($order->items as $item)
                    <li class="p-6 flex items-center justify-between">
                        <div class="flex items-center space-x-4">
                            <div class="h-16 w-16 bg-gray-100 rounded-lg flex-shrink-0 flex items-center justify-center">
                                @if($item->product->image)
                                <img src="{{ asset('storage/' . $item->product->image) }}" class="h-full w-full object-cover rounded-xl">
                                @else
                                <i class="fa-solid fa-image text-gray-400"></i>
                                @endif
                            </div>
                            <div>
                                <h3 class="text-lg font-semibold text-gray-800">{{ $item->product->title }}</h3>
                                <p class="text-sm text-gray-500">Quantité: {{ $item->quantity }}</p>
                            </div>
                        </div>
                        <div class="text-right">
                            <p class="text-lg font-bold text-gray-900">{{ $item->price_at_purchase }} DH</p>
                        </div>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>

        <div class="md:col-span-1">
            <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100 sticky top-6">
                <h2 class="text-xl font-bold text-gray-800 mb-6">Résumé de la commande</h2>

                <div class="space-y-4">
                    <div class="flex justify-between text-gray-600">
                        <span>Frais de livraison</span>
                        <span class="text-green-600 font-medium">Gratuit</span>
                    </div>
                    <hr class="border-gray-100">
                    <div class="flex justify-between text-xl font-bold text-gray-900 pt-2">
                        <span>Total</span>
                        <span>{{ $order->total_amount }} DH</span>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection