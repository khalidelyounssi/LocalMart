<nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex h-16 items-center justify-between gap-4">

            <!-- Left: Logo + Categories -->
            <div class="flex items-center gap-6">
                <!-- Logo -->
                <a href="{{ route('dashboard') }}" class="flex items-center gap-2">
                    <x-application-logo class="h-9 w-auto text-gray-800" />
                </a>

                <!-- Categories (desktop) -->
                <button class="hidden sm:flex items-center gap-2 text-sm font-medium text-gray-600 hover:text-gray-900">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2"
                         viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                    Categories
                </button>
            </div>

            <!-- Center: Search -->
            <div class="hidden md:flex flex-1 max-w-xl">
                <div class="relative w-full">
                    <input
                        type="text"
                        placeholder="Search products..."
                        class="w-full rounded-full border border-gray-200 bg-gray-50 pl-10 pr-4 py-2 text-sm
                               focus:border-indigo-500 focus:ring-indigo-500"
                    >
                    <svg class="absolute left-3 top-1/2 -translate-y-1/2 w-5 h-5 text-gray-400"
                         fill="none" stroke="currentColor" stroke-width="2"
                         viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M21 21l-4.35-4.35M17 11a6 6 0 11-12 0 6 6 0 0112 0z" />
                    </svg>
                </div>
            </div>

            <!-- Right: Actions -->
            <div class="flex items-center gap-4">

             

                <!-- Cart -->
                <button class="hidden sm:inline-flex p-2 rounded-full hover:bg-gray-100 relative">
                    <svg class="w-5 h-5 text-gray-600" fill="none" stroke="currentColor" stroke-width="2"
                         viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13l-1.5 7h13L17 13M7 13H5.4" />
                    </svg>
                 
                </button>

                <!-- Profile Dropdown -->
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="flex items-center gap-2 rounded-full bg-gray-100 px-3 py-1.5 text-sm font-medium text-gray-700 hover:bg-gray-200">
                            {{ Auth::user()->name }}
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                      d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                      clip-rule="evenodd" />
                            </svg>
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

                <!-- Mobile menu button -->
                <button @click="open = !open"
                        class="sm:hidden inline-flex items-center justify-center rounded-md p-2 text-gray-500 hover:bg-gray-100">
                    <svg class="h-6 w-6" fill="none" stroke="currentColor" stroke-width="2"
                         viewBox="0 0 24 24">
                        <path x-show="!open" stroke-linecap="round" stroke-linejoin="round"
                              d="M4 6h16M4 12h16M4 18h16" />
                        <path x-show="open" stroke-linecap="round" stroke-linejoin="round"
                              d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile Menu -->
    <div x-show="open" class="sm:hidden border-t border-gray-200">
        <div class="p-4 space-y-2">
            <input
                type="text"
                placeholder="Search products..."
                class="w-full rounded-lg border border-gray-200 px-3 py-2 text-sm"
            />

            <!-- <x-responsive-nav-link :href="route('dashboard')">
                Dashboard
            </x-responsive-nav-link> -->

            <x-responsive-nav-link :href="route('profile.edit')">
                Profile
            </x-responsive-nav-link>

            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <x-responsive-nav-link :href="route('logout')"
                    onclick="event.preventDefault(); this.closest('form').submit();">
                    Log Out
                </x-responsive-nav-link>
            </form>
        </div>
    </div>
</nav>
