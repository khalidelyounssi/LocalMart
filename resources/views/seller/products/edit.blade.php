@extends('layouts.seller')

@section('content')
<div class="max-w-4xl mx-auto">
    <div class="bg-white shadow-2xl rounded-3xl overflow-hidden border border-gray-100">
        <div class="p-8 border-b border-gray-100 bg-gray-50">
            <h2 class="text-2xl font-black text-gray-800">Modifier : {{ $product->title }}</h2>
        </div>

        <form action="{{ route('seller.products.update', $product->id) }}" method="POST" enctype="multipart/form-data" class="p-8 space-y-6">
            @csrf
            @method('PUT') <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="space-y-2">
                    <label class="text-sm font-bold text-gray-700">Titre</label>
                    <input type="text" name="title" value="{{ $product->title }}" class="w-full px-4 py-3 rounded-xl border-gray-200">
                </div>

                <div class="space-y-2">
                    <label class="text-sm font-bold text-gray-700">Prix (DH)</label>
                    <input type="number" name="price" value="{{ $product->price }}" class="w-full px-4 py-3 rounded-xl border-gray-200">
                </div>
            </div>

            <div class="space-y-2">
                <label class="text-sm font-bold text-gray-700">Description</label>
                <textarea name="description" rows="4" class="w-full px-4 py-3 rounded-xl border-gray-200">{{ $product->description }}</textarea>
            </div>

            <div class="pt-4">
                <button type="submit" class="w-full bg-indigo-600 hover:bg-indigo-700 text-white font-black py-4 rounded-2xl shadow-xl transition">
                    Enregistrer les modifications
                </button>
            </div>
        </form>
    </div>
</div>
@endsection