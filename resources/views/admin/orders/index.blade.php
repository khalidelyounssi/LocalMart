@extends('layouts.admin')

@section('content')
<div class="container mx-auto">
    <div class="mb-10 flex justify-between items-center">
        <div>
            <h1 class="text-3xl font-black text-gray-800 tracking-tight">Gestion des Commandes</h1>
            <p class="text-gray-500 font-medium mt-1">Suivez vos ventes et mettez à jour l'état de livraison de vos produits.</p>
        </div>

    </div>

    <div class="bg-white rounded-[2.5rem] border border-gray-100 shadow-xl shadow-gray-100/50 overflow-hidden">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="bg-gray-50/50">
                    <th class="px-8 py-6 text-[10px] font-black uppercase tracking-[0.2em] text-gray-400">Détails Produit</th>
                    <th class="px-8 py-6 text-[10px] font-black uppercase tracking-[0.2em] text-gray-400">Client</th>
                    <th class="px-8 py-6 text-[10px] font-black uppercase tracking-[0.2em] text-gray-400">Prix Total</th>
                    <th class="px-8 py-6 text-[10px] font-black uppercase tracking-[0.2em] text-gray-400">Statut Actuel</th>
                    <th class="px-8 py-6 text-[10px] font-black uppercase tracking-[0.2em] text-gray-400 text-right">Mise à jour</th>
                </tr>
            </thead>
            @role('seller')
                <tbody class="divide-y divide-gray-50">
                @forelse($orders as $order)
                        <tr class="group hover:bg-indigo-50/30 transition-all duration-300">
                            <td class="px-8 py-6">
                                <div class="flex items-center gap-4">
                                    <div class="w-12 h-12 bg-gray-100 rounded-2xl overflow-hidden border border-gray-50">
                                        <i class="w-full h-full object-cover fa-solid fa-box flex justify-center items-center"></i>
                                    </div>
                                    <form action="" method="get">
                                        <button type="submit" class="flex justify-center items-center gap-2 hover:text-green-600">
                                            <p class="pb-1">Details</p>
                                            <i class="fa-solid fa-arrow-right"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>

                            <td class="px-8 py-6">
                                <p class="text-sm font-bold text-gray-700">{{ $order->user->name }}</p>
                                <p class="text-xs text-gray-400">{{ $order->created_at->format('d M, H:i') }}</p>
                            </td>

                            <td class="px-8 py-6">
                                <span class="text-sm font-black text-gray-800">
                                    {{ $order->total_amount }} DH
                                </span>
                            </td>

                            <td class="px-8 py-6">
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
                            </td>

                            <td class="px-8 py-6 text-right">
                                <form action="{{ route('admin.orders.updateStatus', $order->id) }}" method="POST" class="flex items-center justify-end gap-2">
                                    @csrf
                                    @method('PATCH')
                                    <select name="status" class="text-xs font-bold border-none bg-gray-100 rounded-xl p-2.5 focus:ring-2 focus:ring-indigo-500 outline-none transition-all">
                                        <option value="pending" {{ $order->status == 'pending' ? 'selected' : '' }}>En attente</option>
                                        <option value="shipped" {{ $order->status == 'shipped' ? 'selected' : '' }}>Expédié</option>
                                        <option value="delivered" {{ $order->status == 'delivered' ? 'selected' : '' }}>Livré</option>
                                    </select>
                                    <button type="submit" class="bg-gray-900 text-white p-2.5 rounded-xl hover:bg-green-600 transition shadow-lg active:scale-95">
                                        <i class="fa-solid fa-check"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                @empty
                <tr>
                    <td colspan="5" class="px-8 py-20 text-center">
                        <div class="flex flex-col items-center opacity-20">
                            <i class="fa-solid fa-box-open text-6xl mb-4"></i>
                            <p class="text-xl font-black italic text-gray-400">Aucune commande pour le moment</p>
                        </div>
                    </td>
                </tr>
                @endforelse
            </tbody>
            @endrole
            @role('admin')
                <tbody class="divide-y divide-gray-50">
                @forelse($allOrders as $order)
                        <tr class="group hover:bg-indigo-50/30 transition-all duration-300">
                            <td class="px-8 py-6">
                                <div class="flex items-center gap-4">
                                    <div class="w-12 h-12 bg-gray-100 rounded-2xl overflow-hidden border border-gray-50">
                                        <i class="w-full h-full object-cover fa-solid fa-box flex justify-center items-center"></i>
                                    </div>
                                    <form action="" method="get">
                                        <button type="submit" class="flex justify-center items-center gap-2 hover:text-green-600">
                                            <p class="pb-1">Details</p>
                                            <i class="fa-solid fa-arrow-right"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>

                            <td class="px-8 py-6">
                                <p class="text-sm font-bold text-gray-700">{{ $order->user->name }}</p>
                                <p class="text-xs text-gray-400">{{ $order->created_at->format('d M, H:i') }}</p>
                            </td>

                            <td class="px-8 py-6">
                                <span class="text-sm font-black text-gray-800">
                                    {{ $order->total_amount }} DH
                                </span>
                            </td>

                            <td class="px-8 py-6">
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
                            </td>

                            <td class="px-8 py-6 text-right">
                                <form action="{{ route('admin.orders.updateStatus', $order->id) }}" method="POST" class="flex items-center justify-end gap-2">
                                    @csrf
                                    @method('PATCH')
                                    <select name="status" class="text-xs font-bold border-none bg-gray-100 rounded-xl p-2.5 focus:ring-2 focus:ring-indigo-500 outline-none transition-all">
                                        <option value="pending" {{ $order->status == 'pending' ? 'selected' : '' }}>En attente</option>
                                        <option value="shipped" {{ $order->status == 'shipped' ? 'selected' : '' }}>Expédié</option>
                                        <option value="delivered" {{ $order->status == 'delivered' ? 'selected' : '' }}>Livré</option>
                                    </select>
                                    <button type="submit" class="bg-gray-900 text-white p-2.5 rounded-xl hover:bg-green-600 transition shadow-lg active:scale-95">
                                        <i class="fa-solid fa-check"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                @empty
                <tr>
                    <td colspan="5" class="px-8 py-20 text-center">
                        <div class="flex flex-col items-center opacity-20">
                            <i class="fa-solid fa-box-open text-6xl mb-4"></i>
                            <p class="text-xl font-black italic text-gray-400">Aucune commande pour le moment</p>
                        </div>
                    </td>
                </tr>
                @endforelse
            </tbody>
            @endrole
        </table>
    </div>
</div>
@endsection