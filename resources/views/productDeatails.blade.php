<x-app-layout>
    <div class="bg-gray-50 min-h-screen py-8 md:py-12">
        <div class="max-w-6xl mx-auto px-4 sm:px-6">

            {{-- Main Product Card --}}
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 lg:gap-12 bg-white p-6 md:p-10 rounded-[32px] shadow-sm border border-gray-100">

                {{-- Left Side: Image --}}
                <div class="space-y-4">
                    <div class="aspect-square bg-gray-50 rounded-[28px] overflow-hidden border border-gray-100 group">
                        @if($product->image)
                            <img src="{{ asset('storage/'.$product->image) }}" alt="{{ $product->title }}"
                                class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                        @else
                            <div class="w-full h-full flex items-center justify-center text-gray-300">
                                <svg class="w-20 h-20" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                            </div>
                        @endif
                    </div>

                    {{-- Like Button Row --}}
                    <div class="flex justify-end">
                        <button class="like-btn bg-white border border-gray-200 px-6 py-2.5 rounded-full shadow-sm flex items-center gap-2 transition-all hover:border-[#1DB954] active:scale-95"
                                data-product-id="{{ $product->id }}">
                            <svg class="w-5 h-5 fill-current {{ auth()->check() && $product->isLikedBy(auth()->user()) ? 'text-[#1DB954]' : 'text-gray-300' }}"
                                viewBox="0 0 24 24">
                                <path d="M2 21h4V9H2v12zm20-11c0-1.1-.9-2-2-2h-6.31l.95-4.57.03-.32 c0-.41-.17-.79-.44-1.06L13 1 6.59 7.41C6.22 7.78 6 8.3 6 8.83V19 c0 1.1.9 2 2 2h9c.83 0 1.54-.5 1.84-1.22l3.02-7.05 c.09-.23.14-.47.14-.73v-2z" />
                            </svg>
                            <span class="like-count text-sm font-bold text-gray-700">
                                {{ $product->wishlists_count ?? $product->wishlists()->count() }}
                            </span>
                        </button>
                    </div>
                </div>

                {{-- Right Side: Info --}}
                <div class="flex flex-col py-2">
                    <div class="flex items-center gap-3 mb-6">
                        <span class="px-3 py-1 bg-green-50 text-[#1DB954] text-[11px] uppercase font-black tracking-widest rounded-full border border-green-100">
                            {{ $product->category->name ?? 'Local Product' }}
                        </span>
                        <span class="w-1.5 h-1.5 rounded-full bg-gray-200"></span>
                        <span class="text-xs text-gray-500 font-bold uppercase tracking-tight">
                            Stock: {{ $product->stock }} unités
                        </span>
                    </div>

                    <h1 class="text-3xl md:text-5xl font-black text-[#0F172A] leading-tight mb-4">
                        {{ $product->title }}
                    </h1>

                    <div class="mb-8">
                        <span class="text-5xl font-black text-[#1DB954] tracking-tight">{{ number_format($product->price, 2) }} DH</span>
                    </div>

                    <p class="text-gray-600 text-lg leading-relaxed italic mb-10 border-l-4 border-gray-100 pl-4">
                        "{{ $product->description }}"
                    </p>

                    {{-- Actions --}}
                    <form method="POST" action="{{ route('cart.add' ,$product) }}" class="flex flex-wrap items-center gap-4">
                        @csrf
                        <div class="flex items-center overflow-hidden rounded-2xl border-2 border-gray-100 bg-white shadow-sm h-14">
                            <button type="button" onclick="decrement()" class="w-12 h-full flex items-center justify-center text-xl font-bold bg-gray-50 text-gray-700 hover:bg-gray-100 transition">−</button>
                            <input type="number" name="quantity" id="quantity" value="1" min="1" max="{{ $product->stock }}"
                                   class="w-14 h-full text-center text-lg font-bold focus:ring-0 border-none" />
                            <button type="button" onclick="increment()" class="w-12 h-full flex items-center justify-center text-xl font-bold bg-gray-50 text-gray-700 hover:bg-gray-100 transition">+</button>
                        </div>

                        <button type="submit" {{ $product->stock == 0 ? 'disabled' : '' }}
                                class="flex-1 min-w-[200px] h-14 bg-[#1DB954] text-white px-8 rounded-2xl font-bold hover:bg-[#16a34a] shadow-lg shadow-green-100 transition-all transform hover:-translate-y-1 active:scale-95 disabled:opacity-50 disabled:cursor-not-allowed">
                            Ajouter au Panier
                        </button>

                        <button type="button" class="h-14 w-14 flex items-center justify-center bg-[#0F172A] text-white rounded-2xl hover:bg-black transition-colors shadow-lg shadow-gray-200 group">
                            <svg class="w-6 h-6 transition-transform group-hover:rotate-12" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.684 13.342C8.886 12.938 9 12.482 9 12c0-.482-.114-.938-.316-1.342m0 2.684a3 3 0 110-2.684m0 2.684l6.632 3.316m-6.632-6l6.632-3.316m0 0a3 3 0 105.367-2.684 3 3 0 00-5.367 2.684zm0 9.316a3 3 0 105.368 2.684 3 3 0 00-5.368-2.684z" />
                            </svg>
                        </button>
                    </form>
                </div>
            </div>


<livewire:comments :product="$product" />




            {{-- Comments Section --}}
            <!-- <div class="mt-12 bg-white rounded-[32px] p-6 md:p-10 shadow-sm border border-gray-100">
                <div class="flex items-center gap-4 mb-10">
                    <h3 class="text-2xl font-black text-[#0F172A]">Commentaires</h3>
                    <span class="px-3 py-1 bg-gray-100 text-gray-500 text-xs font-bold rounded-full">3 avis</span>
                </div> -->

                {{-- Add Comment --}}
                <!-- <div class="mb-12">
                    <div class="flex items-start gap-4">
                        <div class="w-12 h-12 shrink-0 rounded-full bg-gray-200 overflow-hidden"></div>
                        <div class="flex-1 space-y-3">
                            <textarea placeholder="Partagez votre avis sur ce produit..."
                                class="w-full rounded-2xl border-gray-200 bg-gray-50 p-4 text-sm focus:ring-[#1DB954] focus:border-[#1DB954] min-h-[120px] outline-none transition-all"></textarea>
                            <div class="flex justify-end">
                                <button class="bg-[#0F172A] text-white px-8 py-2.5 rounded-xl text-sm font-bold hover:bg-black transition-all">
                                    Publier l'avis
                                </button>
                            </div>
                        </div>
                    </div>
                </div> -->

                {{-- Comment List --}}
                <!-- <div class="space-y-6">
                    <div class="flex gap-4">
                        <div class="w-12 h-12 shrink-0 rounded-full bg-green-100 flex items-center justify-center text-[#1DB954] font-black shadow-sm">
                            JD
                        </div>
                        <div class="flex-1 bg-gray-50 p-5 rounded-2xl border border-gray-100">
                            <div class="flex justify-between items-center mb-2">
                                <h5 class="font-bold text-gray-800">Jean Dupont</h5>
                                <span class="text-[10px] text-gray-400 font-bold uppercase tracking-wider">Il y a 2 jours</span>
                            </div>
                            <p class="text-gray-600 text-sm leading-relaxed">
                                Qualité exceptionnelle, on sent vraiment que c'est du local. La livraison a été rapide et le produit dépasse mes attentes.
                            </p>
                        </div>
                    </div>
                </div> -->
            </div>
        </div>
    </div>

    {{-- JS --}}
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
                if (data.status === 'added') {
                    svg.classList.add('text-[#1DB954]');
                    svg.classList.remove('text-gray-300');
                    countEl.textContent = parseInt(countEl.textContent) + 1;
                } else {
                    svg.classList.add('text-gray-300');
                    svg.classList.remove('text-[#1DB954]');
                    countEl.textContent = parseInt(countEl.textContent) - 1;
                }
            });
        });

        function increment() {
            const qty = document.getElementById('quantity');
            const max = parseInt(qty.max);
            const value = parseInt(qty.value);
            if (value < max) qty.value = value + 1;
        }

        function decrement() {
            const qty = document.getElementById('quantity');
            if (parseInt(qty.value) > 1) qty.value = parseInt(qty.value) - 1;
        }
    </script>
</x-app-layout>