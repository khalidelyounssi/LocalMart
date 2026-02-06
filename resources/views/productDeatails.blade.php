<x-app-layout>
    <div class="bg-gray-50 min-h-screen py-12">
        <div class="max-w-6xl mx-auto px-6">

            {{-- Product Grid --}}
            <div class="grid grid-cols-1 md:grid-cols-2 gap-12 bg-white p-8 rounded-[32px] shadow-sm border border-gray-100">

                {{-- Product Image --}}
                <div class="relative group">
                    <div class="aspect-square bg-gray-100 rounded-[24px] overflow-hidden border border-gray-50">
                        @if($product->image)
                            <img src="{{ asset('storage/'.$product->image) }}" 
                                 alt="{{ $product->title }}"
                                 class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105">
                        @else
                            <div class="w-full h-full flex items-center justify-center text-gray-300">
                                <svg class="w-20 h-20" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1"
                                          d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                            </div>
                        @endif
                    </div>

                    {{-- Like Button --}}
                    <button class="like-btn absolute top-4 right-4 bg-white/90 backdrop-blur-md p-3 rounded-full shadow-md transition-all duration-300 active:scale-90"
                            data-product-id="{{ $product->id }}"
                            title="Ajouter aux favoris">
                        <svg class="w-6 h-6 fill-current {{ auth()->check() && $product->isLikedBy(auth()->user()) ? 'text-red-500' : 'text-gray-400' }}" viewBox="0 0 24 24">
                            <path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 
                                     2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09 
                                     C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5 
                                     c0 3.78-3.4 6.86-8.55 11.54L12 21.35z"/>
                        </svg>
                    </button>
                </div>

                {{-- Product Info --}}
                <div class="flex flex-col justify-center">
                    <div class="flex items-center space-x-2 mb-4">
                        <span class="px-3 py-1 bg-[#1DB954]/10 text-[#1DB954] text-[10px] uppercase font-black tracking-widest rounded-lg">
                            {{ $product->category->name ?? 'Local Product' }}
                        </span>
                        <span class="text-xs text-gray-400 font-medium">|</span>
                        <span class="text-xs text-gray-500 font-bold uppercase tracking-tighter">
                            Stock: {{ $product->stock }}
                        </span>
                    </div>

                    <h1 class="text-4xl font-black text-[#0F172A] leading-tight tracking-tight">
                        {{ $product->title }}
                    </h1>

                    <div class="mt-4 flex items-baseline space-x-2">
                        <span class="text-4xl font-black text-[#1DB954]">${{ number_format($product->price, 2) }}</span>
                    </div>

                    <p class="text-gray-600 mt-6 leading-relaxed text-lg italic">
                        "{{ $product->description }}"
                    </p>

                    <div class="mt-10 flex gap-4">
                        <button class="flex-1 bg-[#1DB954] text-white px-8 py-4 rounded-2xl font-bold hover:bg-[#16a34a] shadow-lg shadow-green-100 transition-all transform hover:-translate-y-1 active:scale-95">
                            Ajouter au Panier
                        </button>
                        <button class="p-4 bg-[#0F172A] text-white rounded-2xl hover:bg-black transition-colors shadow-lg shadow-gray-200">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M8.684 13.342C8.886 12.938 9 12.482 9 12c0-.482-.114-.938-.316-1.342m0 2.684a3 3 0 110-2.684m0 2.684l6.632 3.316m-6.632-6l6.632-3.316m0 0a3 3 0 105.367-2.684 3 3 0 00-5.367 2.684zm0 9.316a3 3 0 105.368 2.684 3 3 0 00-5.368-2.684z" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>

            {{-- Comments Section --}}
            <div class="mt-12 bg-white rounded-[32px] p-8 shadow-sm border border-gray-100">
                <h3 class="text-2xl font-black text-[#0F172A] mb-8 flex items-center">
                    Commentaires 
                    <span class="ml-3 px-2 py-0.5 bg-gray-100 text-gray-500 text-sm rounded-lg">3</span>
                </h3>

                <div class="mb-10">
                    <div class="flex items-start space-x-4">
                        <div class="w-10 h-10 rounded-full bg-gray-200 flex-shrink-0"></div>
                        <div class="flex-1">
                            <textarea placeholder="Partagez votre avis sur ce produit..." 
                                      class="w-full rounded-2xl border-gray-200 bg-gray-50 focus:border-[#1DB954] focus:ring-[#1DB954] transition-all py-3 px-4 text-sm min-h-[100px]"></textarea>
                            <div class="mt-3 flex justify-end">
                                <button class="bg-[#0F172A] text-white px-6 py-2 rounded-xl text-sm font-bold hover:bg-black transition-all">
                                    Publier l'avis
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="space-y-8">
                    <div class="flex space-x-4">
                        <div class="w-10 h-10 rounded-full bg-green-100 flex items-center justify-center text-[#1DB954] font-bold">JD</div>
                        <div class="flex-1 bg-gray-50 p-4 rounded-2xl border border-gray-100">
                            <div class="flex justify-between items-center mb-2">
                                <h5 class="font-bold text-[#0F172A] text-sm">Jean Dupont</h5>
                                <span class="text-[10px] text-gray-400 font-bold uppercase">Il y a 2 jours</span>
                            </div>
                            <p class="text-gray-600 text-sm leading-relaxed">Qualité exceptionnelle, on sent vraiment que c'est du local. Je recommande vivement !</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- JS for Like Button --}}
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const likeBtn = document.querySelector('.like-btn');

            likeBtn?.addEventListener('click', async (e) => {
                e.stopPropagation();
                const productId = likeBtn.dataset.productId;
                const token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

                const res = await fetch(`/products/${productId}/like`, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': token
                    }
                });

                const data = await res.json();

                // Toggle color only
                const svg = likeBtn.querySelector('svg');
                if (data.status === 'added') {
                    svg.classList.add('text-red-500');
                    svg.classList.remove('text-gray-400');
                } else {
                    svg.classList.add('text-gray-400');
                    svg.classList.remove('text-red-500');
                }
            });
        });
    </script>
</x-app-layout>
