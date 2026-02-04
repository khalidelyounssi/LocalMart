@extends('layouts.seller')

@section('content')
<div class="container mx-auto">
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-10">
        <div class="bg-white p-8 rounded-3xl shadow-sm border border-gray-100 flex items-center">
            <div class="p-4 bg-indigo-50 rounded-2xl mr-5">
                <svg class="w-8 h-8 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path></svg>
            </div>
            <div>
                <p class="text-xs font-black text-gray-400 uppercase tracking-widest">Total Produits</p>
                <p class="text-4xl font-black text-gray-900">{{ count($products) }}</p>
            </div>
        </div>
        <div class="bg-white p-8 rounded-3xl shadow-sm border border-gray-100 flex items-center">
            <div class="p-4 bg-red-50 rounded-2xl mr-5">
                <svg class="w-8 h-8 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path></svg>
            </div>
            <div>
                <p class="text-xs font-black text-gray-400 uppercase tracking-widest">Rupture de Stock</p>
                <p class="text-4xl font-black text-red-500">{{ $products->where('stock', 0)->count() }}</p>
            </div>
        </div>
    </div>

    <div class="bg-white shadow-2xl rounded-3xl overflow-hidden border border-gray-100">
        <div class="p-8 border-b border-gray-100 flex justify-between items-center bg-gray-50/50">
            <h3 class="font-black text-xl text-gray-800">Mes articles en vente</h3>
            <a href="{{ route('seller.create') }}" class="bg-indigo-600 text-white px-6 py-3 rounded-2xl font-bold shadow-indigo-200 shadow-lg hover:bg-indigo-700 transition">+ Ajouter un produit</a>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead class="bg-gray-50">
                    <tr class="text-left text-xs font-black text-gray-400 uppercase tracking-tighter">
                        <th class="px-8 py-5">Produit</th>
                        <th class="px-8 py-5 text-center">Prix</th>
                        <th class="px-8 py-5 text-center">Stock</th>
                        <th class="px-8 py-5 text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-50">
                    @foreach($products as $product)
                    <tr class="hover:bg-gray-50/50 transition">
                        <td class="px-8 py-6 flex items-center font-bold text-gray-800">
                            <div class="h-14 w-14 rounded-2xl bg-gray-100 mr-4 overflow-hidden border border-gray-100">
                                @if($product->image)
                                    <img src="{{ asset('storage/' . $product->image) }}" class="h-full w-full object-cover">
                                @else
                                    <div class="h-full w-full flex items-center justify-center text-[10px] text-gray-400">IMG</div>
                                @endif
                            </div>
                            {{ $product->title }}
                        </td>
                        <td class="px-8 py-6 text-center text-indigo-600 font-black">{{ $product->price }} DH</td>
                        <td class="px-8 py-6 text-center">
                            <span class="px-4 py-1.5 rounded-xl text-[11px] font-black {{ $product->stock > 0 ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-700' }}">
                                {{ $product->stock }} unités
                            </span>
                        </td>
                        <td class="px-8 py-6 text-right space-x-4">
                            <a href="{{ route('seller.edit', $product->id) }}" class="text-indigo-600 font-black hover:underline">Modifier</a>
                            <form action="{{ route('seller.destroy', $product->id) }}" method="POST" class="inline" onsubmit="return confirm('Supprimer?')">
                                @csrf @method('DELETE')
                                <button class="text-red-400 font-black hover:text-red-600">Supprimer</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection