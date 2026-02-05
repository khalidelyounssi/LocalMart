<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-[#8D6E63] leading-tight">
            {{ __('Welcome back, Explorer') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-[#FDF8F3] min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-10">
            
            <div class="relative bg-[#D7C0AE] rounded-3xl overflow-hidden shadow-sm h-72 flex items-center">
                <div class="relative z-10 px-12">
                    <h1 class="text-4xl font-black text-[#4E342E] mb-2 uppercase tracking-tight">Sustainable Style.</h1>
                    <p class="text-[#8D6E63] text-lg mb-8 max-w-md">Discover our new collection of earth-toned essentials crafted for the modern minimalist.</p>
                    <button class="bg-[#8D6E63] text-white px-8 py-3 rounded-full font-bold hover:bg-[#70554C] transition shadow-lg shadow-[#8D6E63]/20">Shop Collection</button>
                </div>
                <div class="absolute right-0 top-0 h-full w-1/2 bg-[#BC9F8B] opacity-30 skew-x-12 translate-x-20"></div>
                <div class="absolute right-10 bottom-0 w-64 h-64 bg-white/10 rounded-full blur-3xl"></div>
            </div>

            <div class="flex space-x-4 overflow-x-auto pb-4 scrollbar-hide">
                @foreach(['New Arrivals', 'Best Sellers', 'Organic Cotton', 'Accessories', 'Home Decor'] as $category)
                    <div class="flex-shrink-0 bg-white px-6 py-3 rounded-2xl border border-[#E8D7C5] shadow-sm hover:border-[#BC9F8B] cursor-pointer transition">
                        <span class="text-[#8D6E63] font-bold uppercase text-[10px] tracking-widest">{{ $category }}</span>
                    </div>
                @endforeach
            </div>

            <div class="space-y-6">
                <div class="flex justify-between items-end px-2">
                    <div>
                        <h3 class="text-2xl font-black text-[#4E342E] tracking-tight">Featured Products</h3>
                        <p class="text-[#BC9F8B] text-sm">Hand-picked items for your style.</p>
                    </div>
                    <a href="#" class="text-[#8D6E63] font-bold text-sm hover:underline">See everything &rarr;</a>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
                    @for ($i = 1; $i <= 8; $i++)
                        <div class="group bg-white rounded-3xl border border-[#F5EBE0] overflow-hidden shadow-sm hover:shadow-xl transition-all duration-300">
                            
                            <div class="aspect-[4/5] bg-[#F5EBE0] relative overflow-hidden">
                                <div class="w-full h-full flex items-center justify-center text-[#BC9F8B] group-hover:scale-110 transition-transform duration-500">
                                    <svg class="w-16 h-16 opacity-30" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                    </svg>
                                </div>
                                
                                <div class="absolute top-4 left-4 flex flex-col space-y-2">
                                    <span class="bg-white/90 backdrop-blur px-2 py-1 rounded-lg text-[10px] text-[#8D6E63] font-black uppercase shadow-sm w-fit">
                                        Stock: {{ rand(1, 50) }}
                                    </span>
                                    <span class="bg-[#8D6E63] text-white px-2 py-1 rounded-lg text-[10px] font-bold uppercase shadow-sm w-fit">
                                        Essentials
                                    </span>
                                </div>
                            </div>

                            <div class="p-6">
                                <div class="flex items-center mb-3 text-[10px] uppercase tracking-widest text-[#BC9F8B] font-bold">
                                    <div class="w-4 h-4 rounded-full bg-[#D7C0AE] mr-2"></div>
                                    Merchant #{{ rand(10, 99) }}
                                </div>

                                <h4 class="text-[#4E342E] font-bold text-lg leading-tight mb-2 truncate">Minimalist Linen Shirt</h4>
                                
                                <p class="text-[#BC9F8B] text-xs line-clamp-2 mb-6 leading-relaxed">
                                    Crafted from 100% organic linen. This piece offers a breathable, relaxed fit for everyday comfort.
                                </p>

                                <div class="flex justify-between items-center pt-4 border-t border-[#F5EBE0]">
                                    <div class="flex flex-col">
                                        <span class="text-[#BC9F8B] text-[10px] uppercase font-bold">Price</span>
                                        <span class="text-[#8D6E63] font-black text-xl">$59.00</span>
                                    </div>
                                    
                                    <div class="flex space-x-1">
                                        <button title="Comment" class="p-2.5 rounded-2xl bg-[#FDF8F3] text-[#BC9F8B] hover:text-[#8D6E63] hover:bg-[#F5EBE0] transition-colors">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                                            </svg>
                                        </button>
                                        <button title="Like" class="p-2.5 rounded-2xl bg-[#FDF8F3] text-[#BC9F8B] hover:text-red-500 hover:bg-red-50 transition-colors">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endfor
                </div>
            </div>

            

        </div>
    </div>
</x-app-layout>