@extends('layouts.seller')

@section('content')
<div class="container mx-auto">
    <h2 class="text-3xl font-black text-gray-800 mb-6">Gestion des Commandes</h2>

    <div class="bg-white shadow-xl rounded-3xl overflow-hidden border border-gray-100">
        <table class="w-full text-left">
            <thead class="bg-gray-50 uppercase text-xs font-black text-gray-400">
                <tr>
                    <th class="px-8 py-5">Commande ID</th>
                    <th class="px-8 py-5">Client</th>
                    <th class="px-8 py-5">Total (DH)</th>
                    <th class="px-8 py-5">Statut</th>
                    <th class="px-8 py-5 text-right">Action</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-50">
                @foreach($orders as $order)
                <tr class="hover:bg-gray-50 transition">
                    <td class="px-8 py-6 font-bold">#{{ $order->id }}</td>
                    <td class="px-8 py-6 text-gray-600">{{ $order->user->name }}</td>
                    <td class="px-8 py-6 font-black text-indigo-600">{{ $order->total_price }} DH</td>
                    <td class="px-8 py-6">
                        <span class="px-3 py-1 rounded-full text-xs font-bold 
                            {{ $order->status == 'delivered' ? 'bg-green-100 text-green-600' : 'bg-yellow-100 text-yellow-600' }}">
                            {{ strtoupper($order->status) }}
                        </span>
                    </td>
                    <td class="px-8 py-6 text-right">
                        <form action="{{ route('seller.orders.updateStatus', $order->id) }}" method="POST" class="flex items-center justify-end gap-2">
                            @csrf
                            @method('PATCH')
                            <select name="status" class="text-sm border-gray-200 rounded-lg p-1">
                                <option value="pending" {{ $order->status == 'pending' ? 'selected' : '' }}>En attente</option>
                                <option value="shipped" {{ $order->status == 'shipped' ? 'selected' : '' }}>Expédié</option>
                                <option value="delivered" {{ $order->status == 'delivered' ? 'selected' : '' }}>Livré</option>
                            </select>
                            <button type="submit" class="bg-indigo-600 text-white p-2 rounded-lg hover:bg-indigo-700">
                                <i class="fa-solid fa-check"></i>
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection