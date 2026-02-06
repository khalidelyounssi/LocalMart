<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LocalMart - Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-[#fcfcfd] font-sans antialiased text-gray-900">

    <div class="flex h-screen overflow-hidden">

        <aside class="w-72 bg-white border-r border-gray-100 flex flex-col z-20 transition-all duration-300">
            <div class="p-8 mb-4">
                <a href="{{ route('admin.dashboard.index') }}" class="flex items-center gap-3 group">
                    <div class="w-11 h-11 bg-gray-900 rounded-xl flex items-center justify-center shadow-lg group-hover:bg-green-600 transition-all duration-500 group-hover:rotate-6">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-white" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M11 20A7 7 0 0 1 9.8 6.1C15.5 5 17 4.48 19 2c1 2 2 4.18 2 8 0 5.5-4.78 10-10 10Z" />
                            <path d="M2 21c0-3 1.85-5.36 5.08-6C10 14.5 10.5 13.8 10.5 13.5s-.5-1-1.5-1.5c-3-1.5-3.5-5.5-3-8.5" />
                        </svg>
                    </div>
                    <div class="flex flex-col">
                        <span class="text-xl font-black tracking-tighter leading-none">Local<span class="text-green-600">Mart</span></span>
                        <span class="text-[9px] font-bold text-gray-400 uppercase tracking-widest mt-1">Management Hub</span>
                    </div>
                </a>
            </div>

            <nav class="flex-1 px-4 space-y-1 overflow-y-auto custom-scrollbar">
                <p class="px-4 text-[10px] font-black text-gray-300 uppercase tracking-[0.2em] mb-4">Menu Principal</p>

                <x-admin-nav-link href="{{ route('admin.dashboard.index') }}" icon="fa-table-columns" label="Dashboard" :active="request()->is('admin/dashboard*')" />
                <x-admin-nav-link href="{{ route('admin.users.index') }}" icon="fa-users" label="Utilisateurs" :active="request()->is('admin/users*')" />
                <x-admin-nav-link href="{{ route('admin.products.index') }}" icon="fa-box-open" label="Produits" :active="request()->is('admin/products*')" />
                <x-admin-nav-link href="{{ route('admin.categories.index') }}" icon="fa-list" label="Catégories" :active="request()->is('admin/categories*')" />
                <x-admin-nav-link href="{{ route('admin.permissions.index') }}" icon="fa-key" label="Permissions" :active="request()->is('admin/permissions*')" />
                <x-admin-nav-link href="{{ route('admin.comments.index') }}" icon="fa-comment" label="Commentaires" :active="request()->is('admin/comments*')" />
            </nav>

            <div class="p-6 border-t border-gray-50">
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button class="flex items-center gap-3 w-full px-4 py-3 text-red-500 font-bold text-sm hover:bg-red-50 rounded-2xl transition-all group">
                        <i class="fa-solid fa-right-from-bracket group-hover:-translate-x-1 transition-transform"></i>
                        <span>Déconnexion</span>
                    </button>
                </form>
            </div>
        </aside>

        <div class="flex-1 flex flex-col min-w-0 overflow-hidden">

            <header class="h-20 bg-white/80 backdrop-blur-md border-b border-gray-100 flex items-center justify-between px-8 shrink-0 z-10 sticky top-0">

                <div class="flex-1 max-w-xl">
                    <div class="relative group">
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                            <i class="fa-solid fa-magnifying-glass text-gray-400 group-focus-within:text-green-600 transition-colors"></i>
                        </div>
                        <input
                            type="text"
                            placeholder="Rechercher quelque chose..."
                            class="block w-full bg-gray-50 border-gray-100 text-sm font-medium rounded-2xl pl-11 py-2.5 focus:bg-white focus:ring-4 focus:ring-green-50 focus:border-green-200 transition-all placeholder:text-gray-400">
                    </div>
                </div>

                <div class="flex items-center gap-6">
                    <button class="relative p-2 text-gray-400 hover:text-green-600 hover:bg-green-50 rounded-xl transition-all">
                        <i class="fa-regular fa-bell text-xl"></i>
                        <span class="absolute top-2 right-2.5 w-2 h-2 bg-red-500 rounded-full border-2 border-white"></span>
                    </button>

                    <x-dropdown align="right" width="56">
                        <x-slot name="trigger">
                            <button class="flex items-center gap-3 p-1 pr-3 hover:bg-gray-50 rounded-2xl transition-all group">
                                <div class="w-11 h-11 bg-slate-900 group-hover:bg-green-600 rounded-xl flex items-center justify-center shadow-lg shadow-slate-200 group-hover:shadow-green-100 transition-all duration-300">
                                    <span class="text-white text-xs font-black tracking-widest uppercase">
                                        {{ substr(Auth::user()?->name, 0, 2) }}
                                    </span>
                                </div>

                                <div class="text-left hidden sm:block">
                                    <p class="text-sm font-black text-slate-800 leading-tight group-hover:text-green-600 transition-colors">
                                        {{ Auth::user()?->name }}
                                    </p>
                                    <p class="text-[10px] font-bold text-gray-400 uppercase tracking-widest mt-0.5">
                                        {{ Auth::user()?->roles->first()?->name ?? 'Admin' }}
                                    </p>
                                </div>

                                <i class="fa-solid fa-chevron-down text-[10px] text-gray-300 group-hover:text-green-600"></i>
                            </button>
                        </x-slot>

                        <x-slot name="content">
                            <div class="px-5 py-4 border-b border-gray-50">
                                <p class="text-[10px] font-black text-gray-400 uppercase tracking-[0.2em] mb-1">Identifiant</p>
                                <p class="text-sm font-bold text-slate-700 truncate">{{ Auth::user()?->email }}</p>
                            </div>

                            <div class="p-2">
                                <x-dropdown-link :href="route('profile.edit')" class="flex items-center gap-3 px-4 py-2.5 text-sm font-bold text-slate-600 hover:bg-green-50 hover:text-green-600 rounded-xl transition-all">
                                    <i class="fa-regular fa-circle-user text-lg opacity-70"></i>
                                    {{ __('Mon Profil') }}
                                </x-dropdown-link>

                                <div class="h-px bg-gray-50 my-2 mx-2"></div>

                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="flex w-full items-center gap-3 px-4 py-2.5 text-sm font-bold text-red-500 hover:bg-red-50 rounded-xl transition-all">
                                        <i class="fa-solid fa-power-off text-lg opacity-70"></i>
                                        {{ __('Déconnexion') }}
                                    </button>
                                </form>
                            </div>
                        </x-slot>
                    </x-dropdown>
                </div>
            </header>
            <main class="flex-1 overflow-y-auto p-8 custom-scrollbar">
                <div class="max-w-7xl mx-auto">
                    @yield('content')
                </div>
            </main>
        </div>
    </div>

    <style>
        .custom-scrollbar::-webkit-scrollbar {
            width: 4px;
        }

        .custom-scrollbar::-webkit-scrollbar-track {
            background: transparent;
        }

        .custom-scrollbar::-webkit-scrollbar-thumb {
            background: #e5e7eb;
            border-radius: 10px;
        }

        .custom-scrollbar::-webkit-scrollbar-thumb:hover {
            background: #d1d5db;
        }
    </style>
</body>

</html>