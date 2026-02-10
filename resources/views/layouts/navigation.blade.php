<nav class="bg-white border-b border-gray-100 w-full">
    <div class="max-w-[1440px] mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex h-16 items-center justify-between gap-4">

            {{-- Logo + Categories --}}
            <div class="flex items-center gap-6 shrink-0">
                <a href="{{ route('dashboard') }}">
                    <x-application-logo class="h-10 w-auto" />
                </a>

                <button id="open-categories"
                    class="hidden sm:flex items-center gap-2 text-sm font-medium text-gray-600 hover:text-[#1DB954] transition-colors">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                    Categories
                </button>
            </div>

            {{-- Search --}}
            <div class="hidden md:flex flex-1 max-w-2xl">
                <div class="relative w-full">
                    <input type="text"
                        placeholder="Search products..."
                        class="w-full rounded-full border border-gray-200 bg-gray-50 px-5 py-2 text-sm focus:ring-1 focus:ring-[#1DB954] focus:border-[#1DB954] outline-none transition-all">
                </div>
            </div>
         <a href="{{ route('my.orders') }}" class="btn btn-primary">
    Mes Commandes
</a>
            {{-- Cart + User --}}
            <div class="flex items-center gap-2 sm:gap-4 shrink-0">
                <button id="open-cart"
                    class="relative p-2 rounded-full hover:bg-gray-100 transition-colors text-gray-600">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13l-1.5 7h13L17 13M7 13H5.4" />
                    </svg>
                </button>

                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="flex items-center px-3 py-1.5 bg-gray-100 hover:bg-gray-200 rounded-lg text-sm font-medium transition-colors">
                            {{ Auth::user()->name }}
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')">Profile</x-dropdown-link>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-dropdown-link :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();">
                                Log Out
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>
        </div>
    </div>
</nav>

{{-- Categories Sidebar --}}
<div id="categories-sidebar" class="fixed left-0 top-0 h-full w-72 bg-white shadow-2xl transform -translate-x-full transition-transform duration-300 z-[60]">
    <div class="p-4 flex justify-between items-center border-b">
        <h2 class="text-lg font-bold">Categories</h2>
        <button id="close-categories" class="text-2xl text-gray-400 hover:text-black">&times;</button>
    </div>
    <div class="p-4 space-y-1">
        @foreach($categories as $category)
        <a href="{{ route('dashboard.category', $category->slug) }}" class="block px-4 py-2 rounded-lg text-gray-600 hover:bg-green-50 hover:text-[#1DB954] transition-all">
            {{ $category->name }}
        </a>
        @endforeach
    </div>
</div>

{{-- Cart Sidebar --}}
{{-- Cart Sidebar --}}
<div id="cart-sidebar" class="fixed right-0 top-0 h-full w-80 bg-white shadow-2xl transform translate-x-full transition-transform duration-300 z-[60]">
    <div class="p-4 flex justify-between items-center border-b">
        <h2 class="text-lg font-bold">Mon Panier</h2>
        <button id="close-cart" class="text-2xl text-gray-400 hover:text-black">&times;</button>
    </div>

    <div class="p-4 space-y-4 overflow-y-auto h-[calc(100vh-180px)]">
        @php
        $cart = auth()->user()->cart()->with('items.product')->first();

        $total = 0;
        if ($cart) {
        foreach ($cart->items as $item) {
        $total += $item->product->price * $item->quantity;
        }
        }
        @endphp

        @if($cart && $cart->items->count())
        @foreach($cart->items as $item)
        <div class="flex flex-col p-3 bg-gray-50 rounded-xl border border-gray-100">
            <div class="flex justify-between items-start mb-2">
                <span class="font-bold text-gray-800">{{ $item->product->title }}</span>
                <span class="text-[#1DB954] font-bold">
                    {{ number_format($item->product->price * $item->quantity, 2) }} DH
                </span>
            </div>

            <div class="flex justify-between items-center">
                <span class="text-xs text-gray-500">Quantité: {{ $item->quantity }}</span>
                <form action="{{ route('cart.delete', $item->product->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit"
                        class="text-red-500 hover:text-red-700 text-xs font-bold uppercase tracking-wider">
                        Supprimer
                    </button>
                </form>
            </div>
        </div>
        @endforeach
        @else
        <div class="flex flex-col items-center justify-center py-20 text-center">
            <svg class="w-12 h-12 text-gray-200 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
            </svg>
            <p class="text-gray-500 font-medium">Votre panier est vide</p>
        </div>
        @endif
    </div>

    {{-- TOTAL + CHECKOUT --}}
    @if($cart && $cart->items->count())
    <div class="p-4 border-t bg-white">
        <div class="flex justify-between items-center mb-4">
            <span class="font-bold text-gray-700">Total</span>
            <span class="text-xl font-black text-[#1DB954]">
                {{ number_format($total, 2) }} DH
            </span>
        </div>

        <a href="{{ route('checkout') }}"
            class="block w-full text-center bg-[#1DB954] text-white py-3 rounded-xl font-bold
                      hover:bg-[#16a34a] transition-all">
            Passer à la commande
        </a>
    </div>
    @endif
</div>


<script>
    document.addEventListener('DOMContentLoaded', () => {
        document.getElementById('open-cart')?.addEventListener('click', () => {
            document.getElementById('cart-sidebar').classList.remove('translate-x-full');
        });
        document.getElementById('close-cart')?.addEventListener('click', () => {
            document.getElementById('cart-sidebar').classList.add('translate-x-full');
        });
        document.getElementById('open-categories')?.addEventListener('click', () => {
            document.getElementById('categories-sidebar').classList.remove('-translate-x-full');
        });
        document.getElementById('close-categories')?.addEventListener('click', () => {
            document.getElementById('categories-sidebar').classList.add('-translate-x-full');
        });
    });
</script>