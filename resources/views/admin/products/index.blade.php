@extends('layouts.admin')

@section('content')
<div class="container mx-auto px-4 py-6">
    {{-- En-tête de page --}}
    <div class="flex flex-col md:flex-row justify-between items-center mb-8 gap-4">
        <div>
            <h1 class="text-2xl font-bold text-gray-900">Mes articles en vente</h1>
            <p class="text-gray-500 text-sm">Gérez votre inventaire et vos produits</p>
        </div>
          @canany(['create products' , 'edit products'])
        <div class="flex gap-3">
            <a href="{{ route('admin.products.create') }}" class="bg-green-600 text-white px-4 py-2 rounded-lg flex items-center gap-2 hover:bg-green-700 transition font-medium shadow-sm text-sm">
                <i class="fa-solid fa-plus text-xs"></i> Ajouter un produit
            </a>
        </div>
        @endcanany
    </div>

    {{-- Cartes de statistiques --}}
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
        <div class="bg-white p-6 rounded-2xl border border-gray-100 shadow-sm flex items-center justify-between">
            <div>
                <p class="text-xs font-semibold text-gray-400 uppercase tracking-wider mb-2">Total Produits</p>
                <h3 class="text-3xl font-bold text-gray-900">{{ count($products) }}</h3>
            </div>
            <div class="w-12 h-12 bg-green-50 rounded-full flex items-center justify-center text-green-600">
                <i class="fa-solid fa-box-open text-xl"></i>
            </div>
        </div>

        <div class="bg-white p-6 rounded-2xl border border-gray-100 shadow-sm flex items-center justify-between">
            <div>
                <p class="text-xs font-semibold text-gray-400 uppercase tracking-wider mb-2">Rupture de Stock</p>
                <h3 class="text-3xl font-bold text-red-600">{{ $products->where('stock', 0)->count() }}</h3>
            </div>
            <div class="w-12 h-12 bg-red-50 rounded-full flex items-center justify-center text-red-600">
                <i class="fa-solid fa-triangle-exclamation text-xl"></i>
            </div>
        </div>
    </div>

    {{-- Tableau des produits --}}
    <div class="bg-white rounded-2xl shadow-sm border border-gray-200 overflow-hidden">
        {{-- Barre de recherche (Visuelle uniquement pour correspondre au style, ou fonctionnelle si vous ajoutez le JS) --}}
        <div class="p-4 border-b border-gray-100 flex gap-4 bg-white">
            <div class="relative flex-1">
                <i class="fa-solid fa-magnifying-glass absolute left-3 top-1/2 -translate-y-1/2 text-gray-400"></i>
                <input type="text" placeholder="Rechercher un produit..." 
                       class="w-full pl-10 pr-4 py-2 bg-gray-50 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 text-sm">
            </div>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead class="bg-gray-50 text-gray-500 text-xs uppercase tracking-wider">
                    <tr>
                        <th class="px-6 py-4 font-semibold">Produit</th>
                        <th class="px-6 py-4 font-semibold text-center">Prix</th>
                        <th class="px-6 py-4 font-semibold text-center">Stock</th>
                        <th class="px-6 py-4 font-semibold text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100 bg-white">
                    @foreach($products as $product)
                    <tr class="hover:bg-gray-50/50 transition">
                        <td class="px-6 py-4 flex items-center gap-4">
                            <div class="w-12 h-12 bg-gray-100 rounded-lg overflow-hidden flex items-center justify-center border border-gray-200">
                                @if($product->image)
                                    <img src="{{ asset('storage/' . $product->image) }}" class="h-full w-full object-cover">
                                @else
                                    <i class="fa-solid fa-image text-gray-400"></i>
                                @endif
                            </div>
                            <div>
                                <div class="font-bold text-gray-900 text-sm">{{ $product->title }}</div>
                                <div class="text-xs text-gray-400 font-mono">ID: {{ $product->id }}</div>
                            </div>
                        </td>
                        
                        <td class="px-6 py-4 text-center">
                             <span class="text-sm font-bold text-gray-900">{{ $product->price }} DH</span>
                        </td>

                        <td class="px-6 py-4 text-center">
                            @if($product->stock > 0)
                                <span class="px-3 py-1 bg-green-50 text-green-600 rounded-full text-[11px] font-bold">
                                    {{ $product->stock }} Unités
                                </span>
                            @else
                                <span class="px-3 py-1 bg-red-50 text-red-600 rounded-full text-[11px] font-bold">
                                    Épuisé
                                </span>
                            @endif
                        </td>
                        @if( $product->is_active == 1 )
                        <td class="px-6 py-4 text-right">
                            <div class="flex items-center justify-end gap-2">
                                 @canany(['edit products' ])
                                <a href="{{ route('admin.products.edit', $product->id) }}" 
                                   class="p-2 text-gray-400 hover:text-blue-600 transition rounded-lg hover:bg-blue-50" title="Modifier">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </a>
                                  @endcanany
                                
                                <form action="{{ route('admin.products.destroy', $product->id) }}" method="POST" class="inline" onsubmit="return confirm('Voulez-vous vraiment supprimer ce produit ?')">
                                    @csrf @method('DELETE')
                                    <button class="p-2 text-gray-400 hover:text-red-600 transition rounded-lg hover:bg-red-50" title="Supprimer">
                                        <i class="fa-solid fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                        @else
                        <td class="px-6 py-4 text-right">
                            <span class="px-3 py-1 bg-red-50 text-red-600 rounded-full text-[11px] font-bold">
                                    suspend
                            </span>
                        </td>
                        @endif
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection