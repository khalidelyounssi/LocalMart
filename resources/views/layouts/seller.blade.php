<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LocalMart - Seller Dashboard</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body class="bg-gray-50 font-sans">
    <div class="flex h-screen overflow-hidden">
        
        <aside class="w-64 bg-white border-r border-gray-200 flex flex-col">
            <div class="p-6 flex items-center gap-3 text-indigo-600">
                <i class="fa-solid fa-shop text-2xl"></i>
                <span class="text-xl font-bold text-gray-800">LocalMart <span class="text-xs text-indigo-500 italic">Seller</span></span>
            </div>
            <a href="{{ route('seller.dashboard') }}" 
       class="flex items-center gap-3 p-3 rounded-xl transition {{ request()->routeIs('seller.dashboard') ? 'bg-indigo-50 text-indigo-600 font-bold' : 'text-gray-600 hover:bg-gray-50' }}">
        <i class="fa-solid fa-chart-line"></i>
        <span class="font-medium">Tableau de bord</span>
    </a>

            <nav class="flex-1 px-4 space-y-2 py-4">
                <a href="{{ route('seller.products.index') }}" 
                   class="flex items-center gap-3 p-3 rounded-xl transition {{ request()->routeIs('seller.products.index') ? 'bg-indigo-50 text-indigo-600 font-bold' : 'text-gray-600 hover:bg-gray-50' }}">
                    <i class="fa-solid fa-box-open"></i>
                    <span class="font-medium">Mes Produits</span>
                </a>

                
                <a href="{{ route('seller.orders.index') }}" class="flex items-center gap-3 p-3 rounded-xl transition {{ request()->routeIs('seller.orders.*') ? 'bg-indigo-50 text-indigo-600 font-bold' : 'text-gray-600 hover:bg-gray-50' }}">
                    <i class="fa-solid fa-cart-shopping"></i>
                    <span>Mes Commandes</span>
                </a>

                <a href="{{ route('seller.products.reviews') }}" class="flex items-center gap-3 p-3 rounded-xl transition {{ request()->routeIs('seller.reviews.*') ? 'bg-indigo-50 text-indigo-600 font-bold' : 'text-gray-600 hover:bg-gray-50' }}">
                    <i class="fa-solid fa-star"></i>
                    <span>Avis Clients</span>
                </a>
            </nav>

            <div class="p-4 border-t border-gray-100">
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button class="flex items-center gap-3 w-full p-3 hover:bg-red-50 text-red-600 rounded-xl transition font-medium">
                        <i class="fa-solid fa-right-from-bracket"></i>
                        <span>Logout</span>
                    </button>
                </form>
            </div>
        </aside>

        <main class="flex-1 flex flex-col overflow-y-auto">
            <header class="h-16 bg-white border-b border-gray-200 flex items-center justify-between px-8 shrink-0">
                <h2 class="text-lg font-semibold text-gray-700">Seller Office</h2>
                <div class="flex items-center gap-4">
                    <span class="text-sm text-gray-500 italic">{{ auth()->user()->name }}</span>
                    <div class="h-8 w-8 rounded-full bg-indigo-100 flex items-center justify-center text-indigo-600 font-bold text-xs">
                        {{ substr(auth()->user()->name, 0, 1) }}
                    </div>
                </div>
            </header>

            <div class="p-8">
                @yield('content')
            </div>
        </main>

    </div>
</body>
</html>