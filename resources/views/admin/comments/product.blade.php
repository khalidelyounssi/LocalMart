@extends('layouts.admin')

@section('content')
<div class="mb-6">
    <a href="{{ route('admin.comments.index') }}" class="inline-flex items-center gap-2 text-sm text-gray-500 hover:text-blue-600 transition mb-3">
        <i class="fa-solid fa-arrow-left"></i> Back to Products
    </a>
    <div class="flex justify-between items-start">
        <div>
            <h1 class="text-2xl font-bold text-gray-900">Comments Management</h1>
            <p class="text-gray-500 text-sm">Moderating reviews for <span class="font-bold text-gray-800">"{{ $product->title }}"</span></p>
        </div>
        <div class="flex gap-2">
            <span class="px-3 py-1 bg-red-50 text-red-600 rounded-lg text-xs font-bold border border-red-100 flex items-center gap-2">
                <i class="fa-solid fa-triangle-exclamation"></i> 2 Reported Comments
            </span>
        </div>
    </div>
</div>

<div class="bg-white p-6 rounded-2xl border border-gray-200 shadow-sm mb-8 flex flex-col md:flex-row gap-6 items-center md:items-start">
    <div class="w-24 h-24 bg-yellow-100 rounded-xl flex items-center justify-center shrink-0">
        @if($product->image)
        <img src="{{ asset('storage/' . $product->image) }}" class="w-16 h-16 object-cover rounded-xl border border-gray-200 w-full h-full">
        @else
        <i class="fa-solid fa-headphones text-3xl text-yellow-600"></i>
        @endif
    </div>
    
    <div class="flex-1">
        <h2 class="text-xl font-bold text-gray-900 mb-1">{{ $product->title }}</h2>
        <div class="flex items-center gap-4 text-sm text-gray-500 mb-4">
            <span>ID: {{ $product->id }}</span>
            <span>•</span>
            <span>Category: {{ $product->category->name }}</span>
            <span>•</span>
            <span class="text-green-600 font-bold">Active</span>
        </div>
        <div class="flex gap-6 border-t border-gray-100 pt-4">
            <div>
                <p class="text-xs text-gray-400 uppercase font-bold">Total Reviews</p>
                <p class="text-lg font-bold text-gray-900">{{ $countReview }}</p>
            </div>
            <div>
                <p class="text-xs text-gray-400 uppercase font-bold">Average Rating</p>
                <div class="flex items-center gap-1">
                    <span class="text-lg font-bold text-gray-900">{{ $rating }}</span>
                    <div class=" text-xs">
                        @foreach(range(1, 5) as $i)
                        @if($rating >= $i)
                        <i class="fa-solid fa-star text-yellow-400"></i>
                        @elseif($rating >= $i - 0.5)
                        <i class="fa-solid fa-star-half-stroke text-yellow-400"></i>
                        @else
                        <i class="fa-regular fa-star text-gray-300"></i>
                        @endif

                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<livewire:comment-search />
@endsection