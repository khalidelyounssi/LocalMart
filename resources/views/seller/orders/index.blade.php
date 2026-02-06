@extends('layouts.seller')

@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
<script src="https://cdn.tailwindcss.com"></script>

<div class="container mx-auto px-4 py-8">
    <div class="mb-8 flex justify-between items-center">
        <div>
            <h2 class="text-3xl font-black text-gray-800 tracking-tight text-indigo-600">Tableau des Commandes</h2>
            <p class="text-gray-500 font-medium mt-1">Gérez vos transactions et l'état des livraisons.</p>
        </div>
        <div class="bg-indigo-600 p-4 rounded-2xl shadow-xl shadow-indigo-100 animate-pulse">
            <i class="fa-solid fa-truck-fast text-white text-xl"></i>
        </div>
    </div>

    <div class="bg-white shadow-2xl rounded-[2.5rem] overflow-hidden border border-gray-100">
        <table class="w-full text-left border-collapse">
            <thead class="bg-gray-50/80 border-b border-gray-100">
                <tr>
                    <th class="px-8 py-5 text-xs font-black uppercase tracking-widest text-gray-400">Réf</th>
                    <th class="px-8 py-5 text-xs font-black uppercase tracking-widest text-gray-400">Client</th>
                    <th class="px-8 py-5 text-xs font-black uppercase tracking-widest text-gray-400">Total</th>
                    <th class="px-8 py-5 text-xs font-black uppercase tracking-widest text-gray-400">Produits</th>
                    <th class="px-8 py-5 text-xs font-black uppercase tracking-widest text-gray-400">Statut</th>
                    <th class="px-8 py-5 text-xs font-black uppercase tracking-widest text-gray-400 text-right">Action</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-50">
                @forelse($orders as $order)
                <tr class="group hover:bg-indigo-50/50 transition-all duration-300">
                    <td class="px-8 py-6 font-black text-gray-400 text-sm">#{{ $order->id }}</td>

                    <td class="px-8 py-6 text-gray-700 font-bold">{{ $order->user->name }}</td>
                    
                    <td class="px-8 py-6">
                        <span class="px-4 py-2 bg-indigo-600 text-white rounded-xl font-black text-sm">
                            {{ number_format($order->total_amount, 2) }} DH
                        </span>
                    </td>

                    <td class="px-8 py-6">
                        <div class="flex flex-wrap gap-2">
                            @foreach($order->items as $item)
                                @if($item->product?->user_id == auth()->id())
                                    <div class="bg-white border border-gray-200 px-3 py-1.5 rounded-xl shadow-sm flex items-center gap-2">
                                        <span class="text-xs font-black text-indigo-600">{{ $item->quantity }}x</span>
                                        <span class="text-xs font-medium text-gray-500 italic">{{ Str::limit($item->product?->title ?? 'Produit Inconnu', 12) }}</span>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </td>

                    <td class="px-8 py-6">
                        @php
                            $colors = [
                                'pending' => 'bg-amber-100 text-amber-600',
                                'shipped' => 'bg-blue-100 text-blue-600',
                                'delivered' => 'bg-emerald-100 text-emerald-600'
                            ];
                            $statusLabel = [
                                'pending' => 'En attente',
                                'shipped' => 'Expédié',
                                'delivered' => 'Livré'
                            ];
                        @endphp
                        <span class="px-4 py-1.5 rounded-full text-[10px] font-black uppercase {{ $colors[$order->status] ?? 'bg-gray-100 text-gray-600' }}">
                            {{ $statusLabel[$order->status] ?? $order->status }}
                        </span>
                    </td>
                    
                    <td class="px-8 py-6 text-right">
                        <form action="{{ route('seller.orders.updateStatus', $order->id) }}" method="POST" class="inline-flex items-center gap-2">
                            @csrf
                            @method('PATCH')
                            <select name="status" class="text-xs font-bold border-gray-200 rounded-xl p-2 bg-gray-50 outline-none focus:ring-2 focus:ring-indigo-500">
                                <option value="pending" {{ $order->status == 'pending' ? 'selected' : '' }}>En attente</option>
                                <option value="shipped" {{ $order->status == 'shipped' ? 'selected' : '' }}>Expédié</option>
                                <option value="delivered" {{ $order->status == 'delivered' ? 'selected' : '' }}>Livré</option>
                            </select>
                            <button type="submit" class="p-2.5 bg-gray-900 text-white rounded-xl hover:bg-indigo-600 transition shadow-lg active:scale-95">
                                <i class="fa-solid fa-check"></i>
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="px-8 py-20 text-center text-gray-400 font-bold italic">
                        <i class="fa-solid fa-folder-open text-4xl mb-3 block opacity-20"></i>
                        Aucune commande enregistrée.
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection