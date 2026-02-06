<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-[#0F172A] leading-tight">
            {{ __('Bienvenue, Explorateur') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-50 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-10">

            {{-- Banner --}}
            <div class="relative bg-[#1DB954] rounded-3xl overflow-hidden shadow-lg h-72 flex items-center">
                <div class="relative z-10 px-12">
                    <h1 class="text-4xl font-black text-white mb-2 uppercase tracking-tight">
                        Style Durable.
                    </h1>
                    <p class="text-white/90 text-lg mb-8 max-w-md">
                        Découvrez notre nouvelle collection d’essentiels locaux.
                    </p>
                    <button class="bg-[#0F172A] text-white px-8 py-3 rounded-full font-bold hover:bg-black transition">
                        Acheter la collection
                    </button>
                </div>
            </div>

            {{-- Categories --}}
            <div class="flex space-x-4 overflow-x-auto pb-4">
                @foreach(['Nouveautés','Meilleures ventes','Coton bio','Accessoires','Décoration maison'] as $category)
                    <div class="flex-shrink-0 bg-white px-6 py-3 rounded-2xl border hover:border-[#1DB954] cursor-pointer">
                        <span class="text-gray-600 font-bold uppercase text-[10px]">
                            {{ $category }}
                        </span>
                    </div>
                @endforeach
            </div>

            {{-- Products --}}
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
                @forelse ($products as $product)
                    <div
                        class="product-card bg-white rounded-3xl border overflow-hidden shadow-sm hover:shadow-xl transition cursor-pointer"
                        data-url="{{ route('products.show', $product) }}"
                        data-product-id="{{ $product->id }}"
                    >

                        {{-- Image --}}
                        <div class="aspect-[4/5] bg-gray-100 relative overflow-hidden">
                            @if ($product->image)
                                <img
                                    src="{{ asset('storage/'.$product->image) }}"
                                    class="w-full h-full object-cover hover:scale-110 transition-transform duration-500"
                                >
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

                            {{-- Plus button --}}
                            <button
                                class="open-modal absolute bottom-4 right-4 bg-[#1DB954] text-white w-10 h-10 rounded-full flex items-center justify-center shadow-lg"
                                data-product-id="{{ $product->id }}"
                                data-product-title="{{ $product->title }}"
                            >
                                +
                            </button>
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
                    </div>
                @empty
                    <p class="col-span-4 text-center text-gray-400">
                        Aucun produit disponible.
                    </p>
                @endforelse
            </div>
        </div>
    </div>

    {{-- MODAL --}}
    <div id="modal-container" class="fixed inset-0 z-50 hidden items-center justify-center bg-black/60">
        <div class="bg-white rounded-3xl w-96 p-8 relative shadow-xl">
            <h3 id="modal-title" class="text-xl font-bold mb-6"></h3>

            <form id="modal-form" method="POST">
                @csrf
                <button class="w-full bg-[#1DB954] text-white py-3 rounded-xl font-bold">
                    Confirmer l’ajout
                </button>
            </form>

            <button id="modal-cancel" class="mt-4 w-full bg-gray-100 py-3 rounded-xl">
                Annuler
            </button>

            <button id="modal-close" class="absolute top-4 right-4 text-xl">
                &times;
            </button>
        </div>
    </div>

    {{-- JS NATIF --}}
    <script>
        document.addEventListener('DOMContentLoaded', () => {

            const modal = document.getElementById('modal-container');
            const modalTitle = document.getElementById('modal-title');
            const modalForm = document.getElementById('modal-form');

            // Card click → details page
            document.querySelectorAll('.product-card').forEach(card => {
                card.addEventListener('click', () => {
                    window.location.href = card.dataset.url;
                });
            });

            // Open modal
            document.querySelectorAll('.open-modal').forEach(btn => {
                btn.addEventListener('click', e => {
                    e.stopPropagation();

                    modalTitle.textContent =
                        `Ajouter "${btn.dataset.productTitle}" au panier ?`;

                    modalForm.action = `/cart/add/${btn.dataset.productId}`;

                    modal.classList.remove('hidden');
                    modal.classList.add('flex');
                });
            });

            // Close modal
            document.querySelectorAll('#modal-close, #modal-cancel').forEach(btn => {
                btn.addEventListener('click', () => {
                    modal.classList.add('hidden');
                    modal.classList.remove('flex');
                });
            });

            modal.addEventListener('click', e => {
                if (e.target === modal) {
                    modal.classList.add('hidden');
                    modal.classList.remove('flex');
                }
            });
        });
    </script>
</x-app-layout>
