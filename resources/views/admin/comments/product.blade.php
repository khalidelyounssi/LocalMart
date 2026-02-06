@extends('layouts.admin')

@section('content')
    <div class="mb-6">
        <a href="{{ route('admin.comments.index') }}" class="inline-flex items-center gap-2 text-sm text-gray-500 hover:text-blue-600 transition mb-3">
            <i class="fa-solid fa-arrow-left"></i> Back to Products
        </a>
        <div class="flex justify-between items-start">
            <div>
                <h1 class="text-2xl font-bold text-gray-900">Comments Management</h1>
                <p class="text-gray-500 text-sm">Moderating reviews for <span class="font-bold text-gray-800">"Wireless Headphones"</span></p>
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
            <i class="fa-solid fa-headphones text-3xl text-yellow-600"></i>
        </div>
        <div class="flex-1">
            <h2 class="text-xl font-bold text-gray-900 mb-1">Wireless Noise Cancelling Headphones</h2>
            <div class="flex items-center gap-4 text-sm text-gray-500 mb-4">
                <span>ID: #4829</span>
                <span>•</span>
                <span>Category: Electronics</span>
                <span>•</span>
                <span class="text-green-600 font-bold">Active</span>
            </div>
            <div class="flex gap-6 border-t border-gray-100 pt-4">
                <div>
                    <p class="text-xs text-gray-400 uppercase font-bold">Total Reviews</p>
                    <p class="text-lg font-bold text-gray-900">128</p>
                </div>
                <div>
                    <p class="text-xs text-gray-400 uppercase font-bold">Average Rating</p>
                    <div class="flex items-center gap-1">
                        <span class="text-lg font-bold text-gray-900">4.5</span>
                        <div class="text-yellow-400 text-xs">
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star-half-stroke"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="bg-white rounded-2xl shadow-sm border border-gray-200 overflow-hidden">
        
        <div class="p-4 border-b border-gray-100 bg-gray-50 flex flex-col md:flex-row gap-4 justify-between items-center">
            <div class="relative w-full md:w-96">
                <i class="fa-solid fa-magnifying-glass absolute left-3 top-1/2 -translate-y-1/2 text-gray-400"></i>
                <input type="text" placeholder="Search comments content or user..." 
                       class="w-full pl-10 pr-4 py-2 bg-white border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 text-sm">
            </div>
            <div class="flex gap-3 w-full md:w-auto">
                <select class="px-4 py-2 bg-white border border-gray-200 rounded-lg text-sm text-gray-600 focus:outline-none cursor-pointer">
                    <option>All Ratings</option>
                    <option>5 Stars</option>
                    <option>1 Star</option>
                </select>
                <select class="px-4 py-2 bg-white border border-gray-200 rounded-lg text-sm text-gray-600 focus:outline-none cursor-pointer">
                    <option>All Status</option>
                    <option>Published</option>
                    <option>Flagged/Reported</option>
                    <option>Hidden</option>
                </select>
            </div>
        </div>

        <div class="divide-y divide-gray-100">
            
            <div class="p-6 hover:bg-gray-50 transition group">
                <div class="flex justify-between items-start mb-3">
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 bg-blue-100 text-blue-600 rounded-full flex items-center justify-center font-bold text-sm">JD</div>
                        <div>
                            <h4 class="font-bold text-gray-900 text-sm">John Doe</h4>
                            <p class="text-xs text-gray-500">Verified Buyer • 2 hours ago</p>
                        </div>
                    </div>
                    <div class="flex items-center gap-2">
                        <span class="px-2 py-1 bg-green-50 text-green-600 text-[10px] font-bold rounded uppercase">Published</span>
                        <div class="text-yellow-400 text-xs">
                            <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i>
                        </div>
                    </div>
                </div>
                <p class="text-gray-600 text-sm leading-relaxed mb-4">
                    Absolutely love these headphones! The noise cancellation is top-notch, and the battery life lasts me specifically through my entire international flight. Highly recommended.
                </p>
                <div class="flex justify-end gap-2 opacity-0 group-hover:opacity-100 transition-opacity">
                    <button class="px-3 py-1.5 border border-gray-200 text-gray-500 hover:text-orange-500 hover:border-orange-200 rounded-lg text-xs font-bold flex items-center gap-2 transition">
                        <i class="fa-solid fa-ban"></i> Ban/Hide
                    </button>
                    <button class="px-3 py-1.5 bg-red-50 text-red-600 hover:bg-red-600 hover:text-white rounded-lg text-xs font-bold flex items-center gap-2 transition">
                        <i class="fa-solid fa-trash-can"></i> Delete
                    </button>
                </div>
            </div>

            <div class="p-6 bg-red-50/30 hover:bg-red-50/50 transition group border-l-4 border-red-500">
                <div class="flex justify-between items-start mb-3">
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 bg-gray-200 text-gray-500 rounded-full flex items-center justify-center font-bold text-sm">SP</div>
                        <div>
                            <h4 class="font-bold text-gray-900 text-sm">Spam Bot 3000</h4>
                            <p class="text-xs text-gray-500">New User • 5 hours ago</p>
                        </div>
                    </div>
                    <div class="flex items-center gap-2">
                        <span class="px-2 py-1 bg-red-100 text-red-600 text-[10px] font-bold rounded uppercase flex items-center gap-1">
                            <i class="fa-solid fa-flag"></i> Reported
                        </span>
                        <div class="text-gray-300 text-xs">
                            <i class="fa-solid fa-star text-yellow-400"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i>
                        </div>
                    </div>
                </div>
                <p class="text-gray-800 text-sm leading-relaxed mb-4 font-medium">
                    CLICK HERE FOR FREE IPHONE!! DO NOT BUY THIS PRODUCT IT IS FAKE. VISIT WWW.SCAM-LINK.COM NOW!!!
                </p>
                <div class="flex justify-end gap-2">
                    <button class="px-3 py-1.5 bg-white border border-gray-200 text-gray-500 hover:text-green-600 hover:border-green-200 rounded-lg text-xs font-bold flex items-center gap-2 transition">
                        <i class="fa-solid fa-check"></i> Approve (False Alarm)
                    </button>
                    <button class="px-3 py-1.5 bg-orange-100 text-orange-700 hover:bg-orange-600 hover:text-white rounded-lg text-xs font-bold flex items-center gap-2 transition shadow-sm">
                        <i class="fa-solid fa-ban"></i> Ban User
                    </button>
                    <button class="px-3 py-1.5 bg-red-600 text-white hover:bg-red-700 rounded-lg text-xs font-bold flex items-center gap-2 transition shadow-sm">
                        <i class="fa-solid fa-trash-can"></i> Delete Comment
                    </button>
                </div>
            </div>

            <div class="p-6 hover:bg-gray-50 transition group">
                <div class="flex justify-between items-start mb-3">
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 bg-purple-100 text-purple-600 rounded-full flex items-center justify-center font-bold text-sm">MK</div>
                        <div>
                            <h4 class="font-bold text-gray-900 text-sm">Mike K.</h4>
                            <p class="text-xs text-gray-500">Verified Buyer • 1 day ago</p>
                        </div>
                    </div>
                    <div class="flex items-center gap-2">
                        <span class="px-2 py-1 bg-green-50 text-green-600 text-[10px] font-bold rounded uppercase">Published</span>
                        <div class="text-yellow-400 text-xs">
                            <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star text-gray-300"></i><i class="fa-solid fa-star text-gray-300"></i>
                        </div>
                    </div>
                </div>
                <p class="text-gray-600 text-sm leading-relaxed mb-4">
                    The sound quality is good, but the ear cups are a bit small for my ears. After 2 hours it gets uncomfortable. Good for short commutes though.
                </p>
                <div class="flex justify-end gap-2 opacity-0 group-hover:opacity-100 transition-opacity">
                    <button class="px-3 py-1.5 border border-gray-200 text-gray-500 hover:text-orange-500 hover:border-orange-200 rounded-lg text-xs font-bold flex items-center gap-2 transition">
                        <i class="fa-solid fa-eye-slash"></i> Hide
                    </button>
                    <button class="px-3 py-1.5 bg-red-50 text-red-600 hover:bg-red-600 hover:text-white rounded-lg text-xs font-bold flex items-center gap-2 transition">
                        <i class="fa-solid fa-trash-can"></i> Delete
                    </button>
                </div>
            </div>

        </div>
        
        <div class="p-4 border-t border-gray-100 bg-gray-50 flex justify-center">
            <span class="text-xs text-gray-400">Showing 3 of 128 reviews</span>
        </div>
    </div>
@endsection