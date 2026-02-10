<x-app-layout>
    <div class="bg-gray-50 min-h-screen py-12">
        <div class="max-w-6xl mx-auto px-6">

            {{-- Product Grid --}}
            <div class="grid grid-cols-1 md:grid-cols-2 gap-12 bg-white p-8 rounded-[32px] shadow-sm border border-gray-100">

                {{-- Product Image --}}
                <div class="group">
                    <div class="aspect-square bg-gray-100 rounded-[24px] overflow-hidden border border-gray-50">
                        @if($product->image)
                        <img src="{{ asset('storage/'.$product->image) }}" alt="{{ $product->title }}"
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

                    {{-- Like Button (under image) --}}
                    <div class="mt-4 flex justify-end">
                        <button
                            class="like-btn bg-white border border-gray-200 px-5 py-2 rounded-full shadow-sm
                                   flex items-center gap-2 transition-all duration-300 hover:bg-gray-50 active:scale-95"
                            data-product-id="{{ $product->id }}"
                            title="J’aime ce produit">
                            {{-- Hand / Like icon --}}
                            <svg
                                class="w-5 h-5 fill-current
                                {{ auth()->check() && $product->isLikedBy(auth()->user()) ? 'text-[#1DB954]' : 'text-gray-400' }}"
                                viewBox="0 0 24 24">
                                <path d="M2 21h4V9H2v12zm20-11c0-1.1-.9-2-2-2h-6.31l.95-4.57.03-.32
                                         c0-.41-.17-.79-.44-1.06L13 1 6.59 7.41C6.22 7.78 6 8.3 6 8.83V19
                                         c0 1.1.9 2 2 2h9c.83 0 1.54-.5 1.84-1.22l3.02-7.05
                                         c.09-.23.14-.47.14-.73v-2z" />
                            </svg>

                            {{-- Likes count --}}
                            <span class="like-count text-sm font-bold text-gray-700">
                                {{ $product->wishlists_count ?? $product->wishlists()->count() }}
                            </span>
                        </button>
                    </div>
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
                        <form method="POST" action="{{ route('cart.add' ,$product) }}">
                            @csrf

                            <div class="flex items-center border rounded">
                                <button type="button" onclick="decrement()" class="px-3 py-1 bg-gray-200">−</button>
                                <input type="number" name="quantity" id="quantity" value="1" min="1" class="w-12 text-center border-l border-r" />
                                <button type="button" onclick="increment()" class="px-3 py-1 bg-gray-200">+</button>
                            </div>
                            <button type="submit"
                                class="flex-1 bg-[#1DB954] text-white px-8 py-4 rounded-2xl font-bold hover:bg-[#16a34a] shadow-lg shadow-green-100 transition-all transform hover:-translate-y-1 active:scale-95">
                                Ajouter au Panier
                            </button>
                        </form>


                        <button
                            class="p-4 bg-[#0F172A] text-white rounded-2xl hover:bg-black transition-colors shadow-lg shadow-gray-200">
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
                                <button
                                    class="bg-[#0F172A] text-white px-6 py-2 rounded-xl text-sm font-bold hover:bg-black transition-all">
                                    Publier l'avis
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="space-y-8">
                    <div class="flex space-x-4">
                        <div class="w-10 h-10 rounded-full bg-green-100 flex items-center justify-center text-[#1DB954] font-bold">
                            JD
                        </div>
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
                const countEl = likeBtn.querySelector('.like-count');
                const svg = likeBtn.querySelector('svg');

                const res = await fetch(`/products/${productId}/like`, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': token
                    }
                });

                const data = await res.json();

                // Toggle icon color
                if (data.status === 'added') {
                    svg.classList.add('text-[#1DB954]');
                    svg.classList.remove('text-gray-400');
                    countEl.textContent = parseInt(countEl.textContent) + 1;
                } else {
                    svg.classList.add('text-gray-400');
                    svg.classList.remove('text-[#1DB954]');
                    countEl.textContent = parseInt(countEl.textContent) - 1;
                }
            });
        });

        //incriemnt
        function increment() {
            let qty = document.getElementById('quantity');
            qty.value = parseInt(qty.value) + 1;
        }

        function decrement() {
            let qty = document.getElementById('quantity');
            if (parseInt(qty.value) > 1) {
                qty.value = parseInt(qty.value) - 1;
            }
        }
    </script>
</x-app-layout>