<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-[#8D6E63] leading-tight">
            {{ __('Bienvenue, Explorateur') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-[#FDF8F3] min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-10">

            <!-- Bannière -->
            <div class="relative bg-[#D7C0AE] rounded-3xl overflow-hidden shadow-sm h-72 flex items-center">
                <div class="relative z-10 px-12">
                    <h1 class="text-4xl font-black text-[#4E342E] mb-2 uppercase tracking-tight">Style Durable.</h1>
                    <p class="text-[#8D6E63] text-lg mb-8 max-w-md">Découvrez notre nouvelle collection d’essentiels aux tons naturels, conçue pour le minimaliste moderne.</p>
                    <button class="bg-[#8D6E63] text-white px-8 py-3 rounded-full font-bold hover:bg-[#70554C] transition shadow-lg shadow-[#8D6E63]/20">Acheter la collection</button>
                </div>
                <div class="absolute right-0 top-0 h-full w-1/2 bg-[#BC9F8B] opacity-30 skew-x-12 translate-x-20"></div>
                <div class="absolute right-10 bottom-0 w-64 h-64 bg-white/10 rounded-full blur-3xl"></div>
            </div>

            <!-- Catégories -->
            <div class="flex space-x-4 overflow-x-auto pb-4 scrollbar-hide">
                @foreach(['Nouveautés', 'Meilleures ventes', 'Coton bio', 'Accessoires', 'Décoration maison'] as $category)
                    <div class="flex-shrink-0 bg-white px-6 py-3 rounded-2xl border border-[#E8D7C5] shadow-sm hover:border-[#BC9F8B] cursor-pointer transition">
                        <span class="text-[#8D6E63] font-bold uppercase text-[10px] tracking-widest">{{ $category }}</span>
                    </div>
                @endforeach
            </div>

            <!-- Produits en vedette -->
            <div class="space-y-6">
                <div class="flex justify-between items-end px-2">
                    <div>
                        <h3 class="text-2xl font-black text-[#4E342E] tracking-tight">Produits en vedette</h3>
                        <p class="text-[#BC9F8B] text-sm">Articles soigneusement sélectionnés pour votre style.</p>
                    </div>
                    <a href="#" class="text-[#8D6E63] font-bold text-sm hover:underline">Voir tout &rarr;</a>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
                    @forelse ($products as $product)
                        <div class="group product-card bg-white rounded-3xl border border-[#F5EBE0] overflow-hidden shadow-sm hover:shadow-xl transition-all duration-300 relative">

                            <!-- Image du produit -->
                            <div class="aspect-[4/5] bg-[#F5EBE0] relative overflow-hidden">
                                @if ($product->image)
                                    <img src="{{ asset('storage/'.$product->image) }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                                @else
                                    <div class="w-full h-full flex items-center justify-center text-[#BC9F8B] group-hover:scale-110 transition-transform duration-500">
                                        <svg class="w-16 h-16 opacity-30" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                        </svg>
                                    </div>
                                @endif

                                <div class="absolute top-4 left-4 flex flex-col space-y-2">
                                    <span class="bg-white/90 backdrop-blur px-2 py-1 rounded-lg text-[10px] text-[#8D6E63] font-black uppercase shadow-sm w-fit">
                                        Stock : {{ $product->stock }}
                                    </span>
                                    <span class="bg-[#8D6E63] text-white px-2 py-1 rounded-lg text-[10px] font-bold uppercase shadow-sm w-fit">
                                        {{ $product->category->name ?? 'Non catégorisé' }}
                                    </span>
                                </div>

                                <!-- Bouton + pour le modal -->
                                <button class="open-modal absolute bottom-4 right-4 bg-[#8D6E63] text-white rounded-full w-10 h-10 flex items-center justify-center hover:bg-[#70554C] shadow-lg">
                                    +
                                </button>
                            </div>

                            <!-- Infos produit -->
                            <div class="p-6">
                                <div class="flex items-center mb-3 text-[10px] uppercase tracking-widest text-[#BC9F8B] font-bold">
                                    <div class="w-4 h-4 rounded-full bg-[#D7C0AE] mr-2"></div>
                                    Marchand #{{ $product->seller->id }} ({{ $product->seller->name ?? 'Vendeur' }})
                                </div>

                                <h4 class="text-[#4E342E] font-bold text-lg leading-tight mb-2 truncate">{{ $product->title }}</h4>
                                
                                <p class="text-[#BC9F8B] text-xs line-clamp-2 mb-6 leading-relaxed">
                                    {{ Str::limit($product->description, 100) }}
                                </p>

                                <div class="flex justify-between items-center pt-4 border-t border-[#F5EBE0]">
                                    <div class="flex flex-col">
                                        <span class="text-[#BC9F8B] text-[10px] uppercase font-bold">Prix</span>
                                        <span class="text-[#8D6E63] font-black text-xl">${{ number_format($product->price, 2) }}</span>
                                    </div>
                                    
                                    <div class="flex space-x-1">
                                        <button title="Commentaire" class="p-2.5 rounded-2xl bg-[#FDF8F3] text-[#BC9F8B] hover:text-[#8D6E63] hover:bg-[#F5EBE0] transition-colors">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                                            </svg>
                                        </button>
                                        <button title="J'aime" class="p-2.5 rounded-2xl bg-[#FDF8F3] text-[#BC9F8B] hover:text-red-500 hover:bg-red-50 transition-colors">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                            </div>

                        </div>
                    @empty
                        <p class="text-center text-[#BC9F8B] col-span-4">
                            Aucun produit disponible pour le moment.
                        </p>
                    @endforelse
                </div>
            </div>

        </div>
    </div>

    <!-- Conteneur du Modal -->
    <div id="modal-container" class="fixed inset-0 z-50 hidden items-center justify-center bg-black bg-opacity-50">
        <div class="bg-white rounded-2xl w-80 p-6 relative">
            <h3 id="modal-title" class="text-lg font-bold text-[#4E342E] mb-4">Ajouter le produit à votre panier ?</h3>
            <div class="flex justify-end space-x-3">
                <form id="modal-form" method="POST" action=""> 
                    @csrf
                    <button type="submit" class="bg-[#8D6E63] text-white px-4 py-2 rounded-lg hover:bg-[#70554C]">Ajouter au panier</button>
                </form>
                <button id="modal-cancel" class="bg-gray-300 px-4 py-2 rounded-lg hover:bg-gray-400">Annuler</button>
            </div>
            <button id="modal-close" class="absolute top-3 right-3 text-gray-500 hover:text-gray-700">&times;</button>
        </div>
    </div>

    <script>
        // JS natif pour le modal
        document.addEventListener('DOMContentLoaded', () => {
            const modal = document.getElementById('modal-container');
            const modalTitle = document.getElementById('modal-title');
            const modalForm = document.getElementById('modal-form');
            const closeButtons = [document.getElementById('modal-close'), document.getElementById('modal-cancel')];

            // Ouvrir le modal
            document.querySelectorAll('.open-modal').forEach(btn => {
                btn.addEventListener('click', () => {
                    const card = btn.closest('.product-card');
                    const productId = card.dataset.productId = card.dataset.productId || btn.dataset.productId || btn.closest('.product-card').querySelector('h4').textContent;
                    const productTitle = card.querySelector('h4').textContent;

                    modalTitle.textContent = `Ajouter "${productTitle}" à votre panier ?`;
                    modalForm.action = `/cart/add/${card.dataset.productId}`;

                    modal.classList.remove('hidden');
                    modal.classList.add('flex');
                });
            });

            // Fermer le modal
            closeButtons.forEach(btn => {
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
