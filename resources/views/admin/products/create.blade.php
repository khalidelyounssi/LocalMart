@extends('layouts.admin')

@section('content')
<div class="max-w-4xl mx-auto">
    <div class="bg-white shadow-2xl rounded-3xl overflow-hidden border border-gray-100">
        <div class="p-8 border-b border-gray-100 bg-gray-50/50">
            <h2 class="text-2xl font-black text-gray-800">Ajouter un nouveau produit</h2>
            <p class="text-gray-500 text-sm">Remplissez les informations ci-dessous pour mettre en vente votre article.</p>
        </div>

        <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data" class="p-8 space-y-6">
            @csrf

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="space-y-2">
                    <label class="text-sm font-bold text-gray-700 uppercase tracking-wider">Titre du produit</label>
                    <input type="text" name="title" value="{{ old('title') }}" 
                           class="w-full px-4 py-3 rounded-xl border {{ $errors->has('title') ? 'border-red-500 bg-red-50' : 'border-gray-200 focus:border-indigo-500' }} transition outline-none" 
                           placeholder="Ex: Smartphone Samsung S23">
                    @error('title')
                        <p class="text-red-500 text-xs font-bold mt-1"><i class="fa-solid fa-circle-exclamation mr-1"></i> {{ $message }}</p>
                    @enderror
                </div>

                <div class="space-y-2">
                    <label class="text-sm font-bold text-gray-700 uppercase tracking-wider">Catégorie</label>
                    <select name="category_id" 
                            class="w-full px-4 py-3 rounded-xl border {{ $errors->has('category_id') ? 'border-red-500 bg-red-50' : 'border-gray-200 focus:border-indigo-500' }} transition outline-none appearance-none">
                        <option value="">Choisir une catégorie</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('category_id')
                        <p class="text-red-500 text-xs font-bold mt-1"><i class="fa-solid fa-circle-exclamation mr-1"></i> {{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="space-y-2">
                    <label class="text-sm font-bold text-gray-700 uppercase tracking-wider">Prix (DH)</label>
                    <div class="relative">
                        <input type="number" name="price" value="{{ old('price') }}" 
                               class="w-full px-4 py-3 rounded-xl border {{ $errors->has('price') ? 'border-red-500 bg-red-50' : 'border-gray-200 focus:border-indigo-500' }} transition outline-none" 
                               placeholder="0.00">
                        <span class="absolute right-4 top-3.5 text-gray-400 font-bold">DH</span>
                    </div>
                    @error('price')
                        <p class="text-red-500 text-xs font-bold mt-1"><i class="fa-solid fa-circle-exclamation mr-1"></i> {{ $message }}</p>
                    @enderror
                </div>

                <div class="space-y-2">
                    <label class="text-sm font-bold text-gray-700 uppercase tracking-wider">Quantité en stock</label>
                    <input type="number" name="stock" value="{{ old('stock') }}" 
                           class="w-full px-4 py-3 rounded-xl border {{ $errors->has('stock') ? 'border-red-500 bg-red-50' : 'border-gray-200 focus:border-indigo-500' }} transition outline-none" 
                           placeholder="Ex: 10">
                    @error('stock')
                        <p class="text-red-500 text-xs font-bold mt-1"><i class="fa-solid fa-circle-exclamation mr-1"></i> {{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="space-y-2">
                <label class="text-sm font-bold text-gray-700 uppercase tracking-wider">Description détaillée</label>
                <textarea name="description" rows="4" 
                          class="w-full px-4 py-3 rounded-xl border {{ $errors->has('description') ? 'border-red-500 bg-red-50' : 'border-gray-200 focus:border-indigo-500' }} transition outline-none" 
                          placeholder="Décrivez les caractéristiques de votre produit...">{{ old('description') }}</textarea>
                @error('description')
                    <p class="text-red-500 text-xs font-bold mt-1"><i class="fa-solid fa-circle-exclamation mr-1"></i> {{ $message }}</p>
                @enderror
            </div>

            <div class="space-y-2">
                <label class="text-sm font-bold text-gray-700 uppercase tracking-wider">Image du produit</label>
                <div class="flex items-center justify-center w-full">
                    <label class="flex flex-col items-center justify-center w-full h-32 border-2 border-dashed rounded-2xl cursor-pointer {{ $errors->has('image') ? 'border-red-300 bg-red-50' : 'border-gray-300 bg-gray-50' }} hover:bg-gray-100 transition">
                        <div class="flex flex-col items-center justify-center pt-5 pb-6">
                            <i class="fa-solid fa-cloud-arrow-up text-2xl text-gray-400 mb-2"></i>
                            <p class="text-sm text-gray-500">Cliquez pour télécharger une image</p>
                        </div>
                        <input type="file" name="image" class="hidden" />
                    </label>
                </div>
                @error('image')
                    <p class="text-red-500 text-xs font-bold mt-1"><i class="fa-solid fa-circle-exclamation mr-1"></i> {{ $message }}</p>
                @enderror
            </div>

            <div class="pt-4">
                <button type="submit" class="w-full bg-green-600 hover:bg-green-700 text-white font-black py-4 rounded-2xl shadow-xl shadow-indigo-100 transition-all transform hover:-translate-y-1 active:scale-95">
                    <i class="fa-solid fa-plus-circle mr-2"></i> Créer le produit
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
