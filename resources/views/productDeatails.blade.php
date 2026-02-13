<x-app-layout>
    <div class="bg-[#F8FAFC] min-h-screen py-12">
        <div class="max-w-6xl mx-auto px-4">

            {{-- Main Product Card --}}
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 bg-white p-8 md:p-12 rounded-[40px] shadow-sm border border-gray-50">

                {{-- Left Side: Image & Like --}}
                <div class="space-y-6">
                    <div class="aspect-square bg-[#F1F5F9] rounded-[32px] overflow-hidden relative group">
                        @if($product->image)
                            <img src="{{ asset('storage/'.$product->image) }}" alt="{{ $product->title }}"
                                class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                        @endif
                    </div>

                    <div class="flex items-center justify-end px-2">
                        <button class="like-btn group flex items-center gap-3 px-6 py-3 rounded-2xl border border-gray-100 bg-white hover:border-[#1DB954] transition-all active:scale-90 shadow-sm"
                                data-product-id="{{ $product->id }}">
                            <svg class="w-6 h-6 fill-current transition-colors {{ auth()->check() && $product->isLikedBy(auth()->user()) ? 'text-[#1DB954]' : 'text-gray-300' }}"
                                viewBox="0 0 24 24">
                                <path d="M2 21h4V9H2v12zm20-11c0-1.1-.9-2-2-2h-6.31l.95-4.57.03-.32 c0-.41-.17-.79-.44-1.06L13 1 6.59 7.41C6.22 7.78 6 8.3 6 8.83V19 c0 1.1.9 2 2 2h9c.83 0 1.54-.5 1.84-1.22l3.02-7.05 c.09-.23.14-.47.14-.73v-2z" />
                            </svg>
                            <span class="like-count text-sm font-black text-slate-700">
                                {{ $product->wishlists_count ?? $product->wishlists()->count() }}
                            </span>
                        </button>
                    </div>
                </div>

                {{-- Right Side: Info & Actions --}}
                <div class="flex flex-col justify-center">
                    <div class="mb-4">
                        <span class="px-3 py-1 bg-green-50 text-[#1DB954] text-[10px] uppercase font-black tracking-widest rounded-lg">
                            {{ $product->category->name ?? 'Produit Local' }}
                        </span>
                    </div>

                    <h1 class="text-4xl md:text-5xl font-black text-slate-900 mb-6 tracking-tighter italic leading-tight">
                        {{ $product->title }}
                    </h1>

                    <div class="mb-8 flex items-baseline gap-2">
                        <span class="text-5xl font-black text-[#1DB954] tracking-tighter">
                            {{ number_format($product->price, 2) }}
                        </span>
                        <span class="text-xl font-bold text-slate-400 uppercase tracking-widest">DH</span>
                    </div>

                    {{-- الوصف - La Description --}}
                    <div class="relative mb-10 pl-6 border-l-4 border-gray-100">
                        <p class="text-slate-500 text-lg leading-relaxed italic font-medium">
                            "{{ $product->description }}"
                        </p>
                    </div>
                    
                    {{-- Actions --}}
                    <form method="POST" action="{{ route('cart.add' ,$product) }}" class="flex flex-wrap items-center gap-4">
                        @csrf
                        <div class="flex items-center bg-slate-100 rounded-2xl h-14 p-1 shadow-inner">
                            <button type="button" onclick="decrement()" class="w-10 h-full font-bold text-xl text-slate-500 hover:text-slate-900">−</button>
                            <input type="number" name="quantity" id="quantity" value="1" min="1" max="{{ $product->stock }}" class="w-12 bg-transparent border-none text-center font-black focus:ring-0 text-slate-900" />
                            <button type="button" onclick="increment()" class="w-10 h-full font-bold text-xl text-slate-500 hover:text-slate-900">+</button>
                        </div>
                        <button type="submit" class="flex-1 min-w-[180px] h-14 bg-slate-900 text-white rounded-[20px] font-black uppercase tracking-widest text-xs hover:bg-[#1DB954] transition-all transform hover:-translate-y-1 active:scale-95 shadow-lg shadow-slate-100">
                            <i class="fa-solid fa-cart-plus mr-2"></i> Ajouter au panier
                        </button>
                    </form>

                    <div class="mt-8 text-[10px] font-bold text-gray-400 uppercase tracking-widest">
                        Disponibilité: <span class="text-[#1DB954]">{{ $product->stock }} pièces restantes</span>
                    </div>
                </div>
            </div>
            
            <div class="mt-12">
                <livewire:comments :product="$product" />
            </div>
        </div>
    </div>

    {{-- JavaScript --}}
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const likeBtn = document.querySelector('.like-btn');
            likeBtn?.addEventListener('click', async (e) => {
                e.preventDefault();
                const productId = likeBtn.dataset.productId;
                const token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
                const countEl = likeBtn.querySelector('.like-count');
                const svg = likeBtn.querySelector('svg');

                try {
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
                } catch (error) {
                    console.error("Erreur Like:", error);
                }
            });
        });

        function increment() {
            const qty = document.getElementById('quantity');
            if (parseInt(qty.value) < parseInt(qty.max)) qty.value = parseInt(qty.value) + 1;
        }
        function decrement() {
            const qty = document.getElementById('quantity');
            if (parseInt(qty.value) > 1) qty.value = parseInt(qty.value) - 1;
        }
    </script>
</x-app-layout>