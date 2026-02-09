<nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
       
        <div class="flex items-center gap-4">
            <button id="open-cart" class="hidden sm:inline-flex p-2 rounded-full hover:bg-gray-100 relative group">
                <svg class="w-5 h-5 text-gray-600 group-hover:text-[#1DB954] transition-colors" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13l-1.5 7h13L17 13M7 13H5.4" />
                </svg>
            </button>
          
        </div>
    </div>

   
    <div x-show="open" class="sm:hidden border-t border-gray-200">
      
    </div>

    <!-- CART SIDEBAR -->
    <div id="cart-sidebar"
         class="fixed right-0 top-0 h-full w-80 bg-white shadow-lg transform translate-x-full transition-transform duration-300 z-50">
        <div class="p-4 flex justify-between items-center border-b">
            <h2 class="text-lg font-semibold">Panier</h2>
            <button id="close-cart" class="text-gray-500 hover:text-gray-800">&times;</button>
        </div>

        <!-- CART CONTENT -->
        @php
            $cartOrder = auth()->user()->orders()->where('status', 'pending')->with('items.product')->first();
        @endphp

        <div id="cart-items" class="p-4 space-y-4 overflow-y-auto h-[calc(100%-64px)]">
            @if($cartOrder && $cartOrder->items->count())
                @foreach($cartOrder->items as $item)
                    <div class="flex justify-between items-center border-b py-2">
                        <span>{{ $item->product->title }} x {{ $item->quantity }}</span>
                        <span>${{ number_format($item->price_at_purchase * $item->quantity, 2) }}</span>
                    </div>
                @endforeach
            @else
                <div>Votre panier est vide</div>
            @endif
        </div>

        <div class="p-4 border-t">
            <button id="checkout-btn" class="w-full bg-blue-600 text-white py-2 rounded hover:bg-blue-700">
                Checkout
            </button>
        </div>
    </div>

    <!-- JS to open/close cart and categories -->
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            // --- CART SIDEBAR ---
            const cartBtn = document.getElementById('open-cart');
            const cartSidebar = document.getElementById('cart-sidebar');
            const cartClose = document.getElementById('close-cart');

            cartBtn?.addEventListener('click', () => {
                cartSidebar.classList.remove('translate-x-full');
            });

            cartClose?.addEventListener('click', () => {
                cartSidebar.classList.add('translate-x-full');
            });

            // --- CATEGORIES SIDEBAR ---
            const categoriesBtn = document.querySelector('button.sm\\:flex');
            const categoriesSidebar = document.getElementById('categories-sidebar');
            const categoriesOverlay = document.getElementById('categories-overlay');
            const categoriesClose = document.getElementById('close-categories');

            categoriesBtn?.addEventListener('click', () => {
                categoriesSidebar.classList.remove('-translate-x-full');
                categoriesOverlay.classList.remove('hidden');
            });

            const closeCategories = () => {
                categoriesSidebar.classList.add('-translate-x-full');
                categoriesOverlay.classList.add('hidden');
            };

            categoriesClose?.addEventListener('click', closeCategories);
        });
    </script>
</nav>
