@extends('layouts.seller')

@section('content')
<div class="max-w-4xl mx-auto">
    <div class="mb-6">
        <a href="{{ route('seller.products.index') }}" class="text-indigo-600 hover:text-indigo-800 font-bold flex items-center">
            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
            Retour à la liste
        </a>
    </div>

    <div class="bg-white shadow-2xl rounded-3xl overflow-hidden border border-gray-100">
        <div class="p-8 border-b border-gray-100 bg-gray-50">
            <h2 class="text-2xl font-black text-gray-800">Ajouter un nouveau produit</h2>
            <p class="text-gray-500">Remplissez les informations ci-dessous pour mettre votre article en vente.</p>
        </div>

        <form action="{{ route('seller.products.store') }}" method="POST" enctype="multipart/form-data" class="p-8 space-y-6">
            @csrf

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="space-y-2">
                    <label class="text-sm font-bold text-gray-700 uppercase">Titre du produit</label>
                    <input type="text" name="title" required class="w-full px-4 py-3 rounded-xl border-gray-200 focus:border-indigo-500 focus:ring-indigo-500 shadow-sm" placeholder="Ex: Panier de légumes bio">
                </div>

                <div class="space-y-2">
                    <label class="text-sm font-bold text-gray-700 uppercase">Catégorie</label>
                    <select name="category_id" required class="w-full px-4 py-3 rounded-xl border-gray-200 focus:border-indigo-500 focus:ring-indigo-500 shadow-sm">
                        <option value="">Choisir une catégorie</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="space-y-2">
                    <label class="text-sm font-bold text-gray-700 uppercase">Prix (DH)</label>
                    <input type="number" name="price" step="0.01" required class="w-full px-4 py-3 rounded-xl border-gray-200 focus:border-indigo-500 focus:ring-indigo-500 shadow-sm" placeholder="0.00">
                </div>

                <div class="space-y-2">
                    <label class="text-sm font-bold text-gray-700 uppercase">Quantité en stock</label>
                    <input type="number" name="stock" required class="w-full px-4 py-3 rounded-xl border-gray-200 focus:border-indigo-500 focus:ring-indigo-500 shadow-sm" placeholder="Ex: 10">
                </div>
            </div>

            <div class="space-y-2">
                <label class="text-sm font-bold text-gray-700 uppercase">Description</label>
                <textarea name="description" rows="4" required class="w-full px-4 py-3 rounded-xl border-gray-200 focus:border-indigo-500 focus:ring-indigo-500 shadow-sm" placeholder="Décrivez votre produit en quelques mots..."></textarea>
            </div>

            <div class="space-y-2">
                <label class="text-sm font-bold text-gray-700 uppercase">Image du produit</label>
                <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-xl hover:border-indigo-400 transition">
                    <div class="space-y-1 text-center">
                        <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
                            <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                        <div class="flex text-sm text-gray-600">
                            <label for="file-upload" class="relative cursor-pointer bg-white rounded-md font-medium text-indigo-600 hover:text-indigo-500 focus-within:outline-none">
                                <span>Télécharger un fichier</span>
                                <input id="file-upload" name="image" type="file" class="sr-only">
                            </label>
                        </div>
                        <p class="text-xs text-gray-500">PNG, JPG up to 2MB</p>
                    </div>
                </div>
            </div>

            <div class="pt-4">
                <button type="submit" class="w-full bg-indigo-600 hover:bg-indigo-700 text-white font-black py-4 rounded-2xl shadow-xl transform transition hover:scale-[1.02] active:scale-95">
                    Mettre en vente le produit
                </button>
            </div>
        </form>
    </div>
</div>
@endsection