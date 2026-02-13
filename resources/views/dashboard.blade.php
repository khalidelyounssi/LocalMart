<x-app-layout>
    {{-- إضافة Swiper CSS للسلايدر --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />

    <style>
        .no-scrollbar::-webkit-scrollbar { display: none; }
        .no-scrollbar { -ms-overflow-style: none; scrollbar-width: none; }
        .swiper-pagination-bullet-active { background: #1DB954 !important; }
    </style>

    <div class="py-8 bg-[#F8FAFC] min-h-screen">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-12">

            {{-- 1. Hero Carousel (Slider) --}}
            <div class="swiper heroSwiper h-[400px] rounded-[3rem] shadow-2xl overflow-hidden border-4 border-white">
                <div class="swiper-wrapper">
                    <div class="swiper-slide relative">
                        <img src="https://images.unsplash.com/photo-1441986300917-64674bd600d8?q=80&w=2070" class="w-full h-full object-cover">
                        <div class="absolute inset-0 bg-gradient-to-r from-black/60 to-transparent flex items-center px-16">
                            <div class="max-w-md text-white">
                                <span class="bg-[#1DB954] px-4 py-1 rounded-full text-[10px] font-black uppercase tracking-widest">Nouveautés 2026</span>
                                <h2 class="text-6xl font-black mt-4 mb-6 leading-tight">VOTRE STYLE, VOTRE CHOIX.</h2>
                                <button class="bg-white text-black px-10 py-4 rounded-2xl font-black hover:bg-[#1DB954] hover:text-white transition-all shadow-xl">ACHETER</button>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide relative">
                        <img src="https://images.unsplash.com/photo-1523275335684-37898b6baf30?q=80&w=1999" class="w-full h-full object-cover">
                        <div class="absolute inset-0 bg-gradient-to-r from-black/60 to-transparent flex items-center px-16">
                            <div class="max-w-md text-white">
                                <span class="bg-blue-500 px-4 py-1 rounded-full text-[10px] font-black uppercase tracking-widest">Tech Trends</span>
                                <h2 class="text-6xl font-black mt-4 mb-6 leading-tight">DEMAIN COMMENCE ICI.</h2>
                                <button class="bg-blue-500 text-white px-10 py-4 rounded-2xl font-black hover:scale-105 transition-all shadow-xl">EXPLORER</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="swiper-pagination"></div>
            </div>

            {{-- 2. Category Tabs (Filtered by Category) --}}
            <section>
                <div class="flex items-center gap-3 mb-6">
                    <div class="h-6 w-1.5 bg-[#1DB954] rounded-full"></div>
                    <h3 class="text-xl font-black text-slate-900 uppercase tracking-tighter">Nos Catégories</h3>
                </div>
                <div class="flex items-center gap-3 overflow-x-auto no-scrollbar pb-2">
                    <a href="{{ route('dashboard') }}" 
                        class="flex-shrink-0 px-8 py-3 rounded-2xl text-xs font-black uppercase tracking-widest transition-all
                        {{ !request()->segment(3) ? 'bg-[#1DB954] text-white shadow-lg' : 'bg-white text-gray-400 border border-gray-100 hover:border-[#1DB954]' }}">
                        Tout Voir
                    </a>
                    @foreach($categories as $category)
                    <a href="{{ route('dashboard.category', $category->slug) }}"
                        class="flex-shrink-0 px-8 py-3 rounded-2xl text-xs font-black uppercase tracking-widest transition-all
                        {{ request()->segment(3) === $category->slug ? 'bg-[#1DB954] text-white shadow-lg' : 'bg-white text-gray-400 border border-gray-100 hover:border-[#1DB954]' }}">
                        {{ $category->name }}
                    </a>
                    @endforeach
                </div>
            </section>

            {{-- 3. Promotion Cards (Featured Sections) --}}
            <section class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <div class="relative h-64 bg-slate-900 rounded-[3rem] p-10 overflow-hidden group">
                    <div class="relative z-10">
                        <h4 class="text-white text-3xl font-black mb-2 uppercase leading-tight">Flash Sale<br><span class="text-[#1DB954]">-30% OFF</span></h4>
                        <p class="text-gray-400 text-sm mb-6">Valable uniquement ce weekend.</p>
                        <button class="bg-[#1DB954] text-white px-8 py-3 rounded-xl font-black text-xs uppercase hover:scale-105 transition">En profiter</button>
                    </div>
                    <i class="fa-solid fa-bolt-lightning absolute right-[-20px] bottom-[-20px] text-white/5 text-[15rem] -rotate-12 group-hover:rotate-0 transition-transform duration-700"></i>
                </div>
                <div class="relative h-64 bg-white border border-gray-100 rounded-[3rem] p-10 overflow-hidden group shadow-sm">
                    <div class="relative z-10">
                        <h4 class="text-slate-900 text-3xl font-black mb-2 uppercase leading-tight">Eco<br><span class="text-[#1DB954]">Friendly</span></h4>
                        <p class="text-gray-400 text-sm mb-6">Produits 100% locaux et durables.</p>
                        <button class="bg-slate-900 text-white px-8 py-3 rounded-xl font-black text-xs uppercase hover:scale-105 transition">Voir plus</button>
                    </div>
                    <i class="fa-solid fa-leaf absolute right-[-20px] bottom-[-20px] text-green-500/5 text-[15rem] -rotate-12 group-hover:rotate-0 transition-transform duration-700"></i>
                </div>
            </section>

            {{-- 4. Main Product Grid --}}
            <section>
                <div class="flex items-center justify-between mb-10">
                    <h3 class="text-2xl font-black text-slate-900 uppercase tracking-tighter">Dernières Arrivées</h3>
                </div>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
                    @forelse ($products as $product)
                    <div class="group bg-white rounded-[2.5rem] border border-gray-50 overflow-hidden hover:shadow-2xl transition-all duration-500 relative">
                        <div class="h-64 overflow-hidden relative bg-gray-50">
                            @if($product->image)
                                <img src="{{ asset('storage/'.$product->image) }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                            @else
                                <div class="w-full h-full flex items-center justify-center bg-gray-200"><i class="fa-solid fa-image text-gray-400"></i></div>
                            @endif
                            <div class="absolute top-5 left-5">
                                <span class="bg-white/90 backdrop-blur px-3 py-1 rounded-xl text-[10px] font-black uppercase text-slate-900 shadow-sm">
                                    {{ $product->category->name ?? 'Nouveau' }}
                                </span>
                            </div>
                        </div>
                        <div class="p-6">
                            <h4 class="font-bold text-slate-900 text-lg mb-1 truncate">{{ $product->title }}</h4>
                            <div class="flex justify-between items-center mt-4">
                                <span class="text-2xl font-black text-[#1DB954] tracking-tighter">{{ number_format($product->price, 2) }} DH</span>
                                <button class="w-12 h-12 bg-slate-900 text-white rounded-2xl flex items-center justify-center hover:bg-[#1DB954] transition-all shadow-lg shadow-slate-200">
                                    <i class="fa-solid fa-plus text-sm"></i>
                                </button>
                            </div>
                        </div>
                        <a href="{{ route('products.show', $product) }}" class="absolute inset-0 z-10"></a>
                    </div>
                    @empty
                    <div class="col-span-full text-center py-20 bg-white rounded-[3rem] border border-dashed">
                        <p class="text-gray-400 font-bold uppercase tracking-widest text-xs">Aucun produit disponible</p>
                    </div>
                    @endforelse
                </div>
            </section>
        </div>
    </div>

    {{-- Swiper JS Logic --}}
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            new Swiper(".heroSwiper", {
                loop: true,
                autoplay: { delay: 4000, disableOnInteraction: false },
                pagination: { el: ".swiper-pagination", clickable: true },
            });
        });
    </script>
</x-app-layout>