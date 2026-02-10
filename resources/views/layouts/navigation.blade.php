<nav class="bg-white border-b border-gray-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex h-16 items-center justify-between">

            {{-- Logo + Categories --}}
            <div class="flex items-center gap-6">
                <a href="{{ route('dashboard') }}">
                    <x-application-logo class="h-10 w-auto" />
                </a>

                <button id="open-categories"
                        class="hidden sm:flex items-center gap-2 text-sm font-medium text-gray-600 hover:text-[#1DB954]">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2"
                         viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                    Categories
                </button>
            </div>

            {{-- Search --}}
            <div class="hidden md:flex flex-1 max-w-xl mx-6">
                <input type="text"
                       placeholder="Search products..."
                       class="w-full rounded-full border border-gray-200 bg-gray-50 px-4 py-2 text-sm">
            </div>

            {{-- Cart + User --}}
            <div class="flex items-center gap-4">
                <button id="open-cart"
                        class="relative p-2 rounded-full hover:bg-gray-100">
                    <svg class="w-6 h-6 text-gray-600"
                         fill="none" stroke="currentColor" stroke-width="2"
                         viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M3 3h2l.4 2M7 13h10l4-8H5.4
                                 M7 13l-1.5 7h13L17 13M7 13H5.4"/>
                    </svg>
                </button>

                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="px-3 py-1 bg-gray-100 rounded">
                            {{ Auth::user()->name }}
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')">
                            Profile
                        </x-dropdown-link>

                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-dropdown-link :href="route('logout')"
                                onclick="event.preventDefault(); this.closest('form').submit();">
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
<div id="categories-sidebar" class="fixed left-0 top-0 h-full w-72 bg-white shadow-lg transform -translate-x-full transition-transform duration-300 z-50">
    <div class="p-4 flex justify-between items-center border-b">
        <h2 class="text-lg font-semibold">Categories</h2>
        <button id="close-categories">&times;</button>
    </div>

    <div class="p-4 space-y-2">
        @foreach($categories as $category)
            <a href="{{ route('dashboard.category', $category->slug) }}" class="block hover:text-[#1DB954]">
                {{ $category->name }}
            </a>
        @endforeach
    </div>
</div>

{{-- Cart Sidebar --}}
<div id="cart-sidebar" class="fixed right-0 top-0 h-full w-80 bg-white shadow-lg transform translate-x-full transition-transform duration-300 z-50">
    <div class="p-4 flex justify-between items-center border-b">
        <h2 class="text-lg font-semibold">Panier</h2>
        <button id="close-cart">&times;</button>
    </div>

   <div class="p-4 space-y-3 text-sm">
    @php
        $cart = auth()->user()->cart()->with('items.product')->first();
    @endphp

    @if($cart && $cart->items->count())
        @foreach($cart->items as $item)
            <div class="flex justify-between items-center">
                <span>{{ $item->product->title }} × {{ $item->quantity }}</span>
                <span>{{ number_format($item->product->price * $item->quantity, 2) }} DH</span>
                
                {{-- Delete button --}}
                <form action="{{ route('cart.delete', $item->product->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="ml-2 text-red-600 hover:text-red-800 text-sm">
                        Supprimer
                    </button>
                </form>
            </div>
        @endforeach
    @else
        <p class="text-gray-500">Votre panier est vide</p>
    @endif
</div>

</div>

{{-- JS --}}
<script>
document.addEventListener('DOMContentLoaded', () => {

    // CART
    document.getElementById('open-cart')?.addEventListener('click', () => {
        document.getElementById('cart-sidebar').classList.remove('translate-x-full');
    });

    document.getElementById('close-cart')?.addEventListener('click', () => {
        document.getElementById('cart-sidebar').classList.add('translate-x-full');
    });

    // CATEGORIES
    document.getElementById('open-categories')?.addEventListener('click', () => {
        document.getElementById('categories-sidebar').classList.remove('-translate-x-full');
    });

    document.getElementById('close-categories')?.addEventListener('click', () => {
        document.getElementById('categories-sidebar').classList.add('-translate-x-full');
    });
});
</script>
