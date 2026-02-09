<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-[#0F172A] leading-tight">
            {{ __('Bienvenue, Explorateur') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-50 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-10">

            <div class="relative bg-[#1DB954] rounded-3xl overflow-hidden shadow-lg h-72 flex items-center">
                <div class="relative z-10 px-12">
                    <h1 class="text-4xl font-black text-white mb-2 uppercase tracking-tight">Style Durable.</h1>
                    <p class="text-white/90 text-lg mb-8 max-w-md">Découvrez notre nouvelle collection d’essentiels locaux, conçue pour le minimaliste moderne.</p>
                    <button class="bg-[#0F172A] text-white px-8 py-3 rounded-full font-bold hover:bg-black transition shadow-xl">Acheter la collection</button>
                </div>
                <div class="absolute right-0 top-0 h-full w-1/2 bg-white opacity-10 skew-x-12 translate-x-20"></div>
                <div class="absolute right-10 bottom-0 w-64 h-64 bg-white/20 rounded-full blur-3xl"></div>
            </div>

            <div class="flex space-x-4 overflow-x-auto pb-4 scrollbar-hide">
                @foreach(['Nouveautés', 'Meilleures ventes', 'Coton bio', 'Accessoires', 'Décoration maison'] as $category)
                    <div class="flex-shrink-0 bg-white px-6 py-3 rounded-2xl border border-gray-200 shadow-sm hover:border-[#1DB954] group cursor-pointer transition">
                        <span class="text-gray-600 group-hover:text-[#1DB954] font-bold uppercase text-[10px] tracking-widest transition-colors">{{ $category }}</span>
                    </div>
                @endforeach
            </div>

            {{-- Products --}}
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
                @forelse ($products as $product)
                <div
                    class="product-card bg-white rounded-3xl border overflow-hidden shadow-sm hover:shadow-xl transition cursor-pointer"
                    data-url="{{ route('products.show', $product) }}"
                    data-product-id="{{ $product->id }}">

                    {{-- Image --}}
                    <div class="aspect-[4/5] bg-gray-100 relative overflow-hidden">
                        @if ($product->image)
                        <img
                            src="{{ asset('storage/'.$product->image) }}"
                            class="w-full h-full object-cover hover:scale-110 transition-transform duration-500">
                        @endif

                        {{-- Badges --}}
                        <div class="absolute top-4 left-4 space-y-2">
                            <span class="bg-white px-2 py-1 rounded text-xs font-bold">
                                Stock : {{ $product->stock }}
                            </span>
                            <span class="bg-[#1DB954] text-white px-2 py-1 rounded text-xs font-bold">
                                {{ $product->category->name ?? 'Non catégorisé' }}
                            </span>
                        </div>

                    </div>

                    {{-- Content --}}
                    <div class="p-6">
                        <h4 class="font-bold text-lg mb-2 truncate">
                            {{ $product->title }}
                        </h4>

                        <p class="text-sm text-gray-500 line-clamp-2 mb-4">
                            {{ Str::limit($product->description, 80) }}
                        </p>

                        <div class="flex justify-between items-center">
                            <span class="text-[#1DB954] font-black text-xl">
                                ${{ number_format($product->price, 2) }}
                            </span>
                        </div>
                    </div>
                    <a href="#" class="text-[#1DB954] font-bold text-sm hover:underline">Voir tout &rarr;</a>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
                    @forelse ($products as $product)
                        <div class="group product-card bg-white rounded-3xl border border-gray-100 overflow-hidden shadow-sm hover:shadow-xl transition-all duration-300 relative">

                            <div class="aspect-[4/5] bg-gray-100 relative overflow-hidden">
                                @if ($product->image)
                                    <img src="{{ asset('storage/'.$product->image) }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                                @else
                                    <div class="w-full h-full flex items-center justify-center text-gray-300 group-hover:scale-110 transition-transform duration-500">
                                        <svg class="w-16 h-16 opacity-30" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                        </svg>
                                    </div>
                                @endif

                                <div class="absolute top-4 left-4 flex flex-col space-y-2">
                                    <span class="bg-white/90 backdrop-blur px-2 py-1 rounded-lg text-[10px] text-[#0F172A] font-black uppercase shadow-sm w-fit">
                                        Stock : {{ $product->stock }}
                                    </span>
                                    <span class="bg-[#1DB954] text-white px-2 py-1 rounded-lg text-[10px] font-bold uppercase shadow-sm w-fit">
                                        {{ $product->category->name ?? 'Non catégorisé' }}
                                    </span>
                                </div>

                                <button class="open-modal absolute bottom-4 right-4 bg-[#1DB954] text-white rounded-full w-10 h-10 flex items-center justify-center hover:bg-[#16a34a] shadow-lg transition-colors">
                                    +
                                </button>
                            </div>

                            <div class="p-6">
                                <div class="flex items-center mb-3 text-[10px] uppercase tracking-widest text-gray-400 font-bold">
                                    <div class="w-4 h-4 rounded-full bg-[#1DB954]/20 border border-[#1DB954]/30 mr-2"></div>
                                    {{ $product->seller->name ?? 'Vendeur' }}
                                </div>

                                <h4 class="text-[#0F172A] font-bold text-lg leading-tight mb-2 truncate">{{ $product->title }}</h4>
                                
                                <p class="text-gray-500 text-xs line-clamp-2 mb-6 leading-relaxed">
                                    {{ Str::limit($product->description, 100) }}
                                </p>

                                <div class="flex justify-between items-center pt-4 border-t border-gray-50">
                                    <div class="flex flex-col">
                                        <span class="text-gray-400 text-[10px] uppercase font-bold">Prix</span>
                                        <span class="text-[#1DB954] font-black text-xl">${{ number_format($product->price, 2) }}</span>
                                    </div>
                                    
                                    <div class="flex space-x-1">
                                        <button title="Commentaire" class="p-2.5 rounded-2xl bg-gray-50 text-gray-400 hover:text-[#1DB954] hover:bg-[#1DB954]/10 transition-colors">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                                            </svg>
                                        </button>
                                        <button title="J'aime" class="p-2.5 rounded-2xl bg-gray-50 text-gray-400 hover:text-red-500 hover:bg-red-50 transition-colors">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                            </div>

                        </div>
                    @empty
                        <p class="text-center text-gray-400 col-span-4 italic">
                            Aucun produit disponible pour le moment.
                        </p>
                    @endforelse
                </div>
            </div>

        </div>
    </div>

 

    {{-- JS --}}
    <script>
        document.addEventListener('DOMContentLoaded', () => {

          

            // Card click → details page
            document.querySelectorAll('.product-card').forEach(card => {
                card.addEventListener('click', () => {
                    window.location.href = card.dataset.url;
                });
            })

        });

    
       
    </script>
</x-app-layout>