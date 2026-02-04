<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>LocalMart Seller</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-50 font-sans antialiased">
    <nav class="bg-indigo-600 text-white shadow-lg py-4">
        <div class="max-w-7xl mx-auto px-4 flex justify-between items-center">
            <span class="text-2xl font-black uppercase tracking-tighter">LocalMart Seller</span>
            <div class="space-x-6 font-bold flex items-center">
                <a href="{{ route('seller.index') }}" class="hover:text-indigo-200 transition">Mes Produits</a>
                <a href="{{ route('seller.create') }}" class="hover:text-indigo-200 transition">Ajouter</a>
                <form method="POST" action="{{ route('logout') }}" class="inline">
                    @csrf
                    <button type="submit" class="bg-indigo-800 px-4 py-2 rounded-xl hover:bg-indigo-900 transition">Déconnexion</button>
                </form>
            </div>
        </div>
    </nav>

    <main class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @yield('content')
        </div>
    </main>
</body>
</html>