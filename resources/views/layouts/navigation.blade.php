{{-- Navbar --}}
<nav class="bg-white border-b border-gray-100 sticky top-0 z-50">
    <div class="max-w-[1440px] mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex h-20 items-center justify-between gap-6">

            {{-- Logo --}}
            <div class="flex items-center gap-4 shrink-0">
                <a href="{{ route('dashboard') }}" class="hover:opacity-80 transition">
                    <x-application-logo class="h-10 w-auto" />
                </a>
            </div>

            {{-- Search --}}
            <div class="hidden md:flex flex-1 max-w-xl">
                <div class="relative w-full group">
                    <span class="absolute left-4 top-1/2 -translate-y-1/2 text-gray-400">
                        <i class="fa-solid fa-magnifying-glass text-sm"></i>
                    </span>
                    <input type="text" placeholder="Rechercher des produits..."
                        class="w-full bg-gray-50 border-none rounded-2xl py-2.5 pl-11 pr-4 text-sm focus:ring-2 focus:ring-[#1DB954]/20 transition-all shadow-inner">
                </div>
            </div>

            {{-- Actions: Mes Commandes + Cart + User --}}
            <div class="flex items-center gap-2 sm:gap-4 shrink-0">
                
                {{-- Mes Commandes Button Stiled --}}
                <a href="{{ route('my.orders') }}" 
                   class="hidden sm:flex items-center gap-2 px-5 py-2.5 bg-slate-900 text-white rounded-xl text-xs font-black uppercase tracking-widest hover:bg-[#1DB954] transition-all shadow-lg shadow-slate-100">
                    <i class="fa-solid fa-bag-shopping text-sm"></i>
                    Mes Commandes
                </a>

                {{-- Cart Button --}}
                <button id="open-cart"
                    class="relative p-2.5 rounded-xl bg-gray-50 hover:bg-gray-100 transition-colors text-slate-700">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13l-1.5 7h13L17 13M7 13H5.4" />
                    </svg>
                    @php
                        $cart = auth()->user()->cart()->with('items.product')->first();
                        $totalCount = $cart ? $cart->items->sum('quantity') : 0;
                    @endphp
                    @if($totalCount > 0)
                        <span class="absolute -top-1 -right-1 bg-[#1DB954] text-white text-[10px] font-black w-5 h-5 flex items-center justify-center rounded-full border-2 border-white">
                            {{ $totalCount }}
                        </span>
                    @endif
                </button>

                {{-- User Dropdown --}}
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="flex items-center px-4 py-2 bg-gray-100 hover:bg-gray-200 rounded-xl text-sm font-bold transition-colors">
                            {{ Auth::user()->name }}
                        </button>
                    </x-slot>
                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')">Profile</x-dropdown-link>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-dropdown-link :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();" class="text-red-500 font-bold">
                                Log Out
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>
        </div>
    </div>
</nav>

{{-- Cart Sidebar (كما هو باش يبقى خدام) --}}
<div id="cart-sidebar" class="fixed right-0 top-0 h-full w-80 bg-white shadow-2xl transform translate-x-full transition-transform duration-300 z-[60]">
    <div class="p-6 flex justify-between items-center border-b">
        <h2 class="text-xl font-black text-slate-900">Mon Panier</h2>
        <button id="close-cart" class="text-slate-400 hover:text-black transition-colors">
            <i class="fa-solid fa-xmark text-2xl"></i>
        </button>
    </div>

    <div class="p-6 space-y-4 overflow-y-auto h-[calc(100vh-200px)]">
        @php $total = 0; @endphp
        @if($cart && $cart->items->count())
            @foreach($cart->items as $item)
                @php $total += $item->product->price * $item->quantity; @endphp
                <div class="flex flex-col p-4 bg-gray-50 rounded-2xl border border-gray-100">
                    <div class="flex justify-between items-start mb-2">
                        <span class="font-black text-slate-800 text-sm">{{ $item->product->title }}</span>
                        <span class="text-[#1DB954] font-black text-sm">
                            {{ number_format($item->product->price * $item->quantity, 2) }} DH
                        </span>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="text-xs font-bold text-gray-400">Qté: {{ $item->quantity }}</span>
                        <form action="{{ route('cart.delete', $item->product->id) }}" method="POST">
                            @csrf @method('DELETE')
                            <button type="submit" class="text-red-500 hover:text-red-700 text-[10px] font-black uppercase tracking-wider">
                                Supprimer
                            </button>
                        </form>
                    </div>
                </div>
            @endforeach
        @else
            <div class="flex flex-col items-center justify-center py-20 text-center">
                <i class="fa-solid fa-basket-shopping text-gray-200 text-5xl mb-4"></i>
                <p class="text-gray-400 font-bold">Votre panier est vide</p>
            </div>
        @endif
    </div>

    @if($cart && $cart->items->count())
        <div class="p-6 border-t bg-white sticky bottom-0">
            <div class="flex justify-between items-center mb-6">
                <span class="font-bold text-gray-500">Total</span>
                <span class="text-2xl font-black text-[#1DB954]">{{ number_format($total, 2) }} DH</span>
            </div>
            <a href="{{ route('checkout') }}" class="block w-full text-center bg-[#1DB954] text-white py-4 rounded-2xl font-black uppercase tracking-widest hover:bg-green-600 transition-all shadow-lg shadow-green-100">
                Passer à la commande
            </a>
        </div>
    @endif
</div>

{{-- Scripts --}}
<script>
    document.addEventListener('DOMContentLoaded', () => {
        const cartSidebar = document.getElementById('cart-sidebar');
        document.getElementById('open-cart')?.addEventListener('click', () => {
            cartSidebar.classList.remove('translate-x-full');
        });
        document.getElementById('close-cart')?.addEventListener('click', () => {
            cartSidebar.classList.add('translate-x-full');
        });
    });
</script>