@extends('layouts.admin')

@section('content')
<div class="max-w-4xl mx-auto">
    <div class="mb-8">
        <h2 class="text-2xl font-black text-gray-800">Modifier : {{ $product->title }}</h2>
        <p class="text-gray-500">Mettez à jour les informations de votre produit.</p>
    </div>

    <form action="{{ route('admin.products.update', $product->id) }}" method="POST" enctype="multipart/form-data" class="bg-white p-8 rounded-[2rem] shadow-sm border border-gray-100">
        @csrf
        @method('PUT')

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div class="space-y-2">
                <label class="text-sm font-bold text-gray-700 font-mono uppercase tracking-wider">Titre du produit</label>
                <input type="text" name="title" value="{{ old('title', $product->title) }}" required
                       class="w-full p-4 bg-gray-50 border-none rounded-2xl focus:ring-2 focus:ring-indigo-500 outline-none transition">
            </div>

            <div class="space-y-2">
                <label class="text-sm font-bold text-gray-700 font-mono uppercase tracking-wider">Catégorie</label>
                <select name="category_id" required class="w-full p-4 bg-gray-50 border-none rounded-2xl focus:ring-2 focus:ring-indigo-500 outline-none">
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ $product->category_id == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="space-y-2">
                <label class="text-sm font-bold text-gray-700 font-mono uppercase tracking-wider">Prix (DH)</label>
                <input type="number" name="price" value="{{ old('price', $product->price) }}" required
                       class="w-full p-4 bg-gray-50 border-none rounded-2xl focus:ring-2 focus:ring-indigo-500 outline-none">
            </div>

            <div class="space-y-2">
                <label class="text-sm font-bold text-gray-700 font-mono uppercase tracking-wider">Stock disponible</label>
                <input type="number" name="stock" value="{{ old('stock', $product->stock) }}" required
                       class="w-full p-4 bg-gray-50 border-none rounded-2xl focus:ring-2 focus:ring-indigo-500 outline-none">
            </div>

            <div class="md:col-span-2 space-y-2">
                <label class="text-sm font-bold text-gray-700 font-mono uppercase tracking-wider">Description</label>
                <textarea name="description" rows="5" required
                          class="w-full p-4 bg-gray-50 border-none rounded-2xl focus:ring-2 focus:ring-indigo-500 outline-none">{{ old('description', $product->description) }}</textarea>
            </div>

            <div class="md:col-span-2 space-y-4">
                <label class="text-sm font-bold text-gray-700 font-mono uppercase tracking-wider">Image du produit</label>
                @if($product->image)
                    <div class="mb-2">
                        <img src="{{ asset('storage/' . $product->image) }}" class="w-32 h-32 object-cover rounded-2xl border">
                        <p class="text-xs text-gray-400 mt-1">Image actuelle</p>
                    </div>
                @endif
                <input type="file" name="image" class="w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100">
            </div>
        </div>

        <div class="mt-10">
            <button type="submit" class="w-full bg-green-600 text-white font-black py-5 rounded-2xl shadow-xl shadow-indigo-100 hover:bg-green-700 transition-all active:scale-[0.98]">
                MODIFIER LE PRODUIT
            </button>
        </div>
    </form>
</div>
@endsection