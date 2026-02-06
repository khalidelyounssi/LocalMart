<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LocalMart - Admin Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body class="bg-gray-50 font-sans">
    <div class="flex h-screen overflow-hidden">
        
        <aside class="w-64 bg-white border-r border-gray-200 flex flex-col">
            <div class="p-6 flex items-center gap-3 text-blue-600">
                <i class="fa-solid fa-shop text-2xl"></i>
                <span class="text-xl font-bold text-gray-800">LocalMart <span class="text-xs text-indigo-500 italic">Admin</span></span>
            </div>

            <nav class="flex-1 px-4 space-y-2 py-4">
                <x-admin-nav-link href="{{route('admin.dashboard.index') }}" icon="fa-table-columns" label="Dashboard" :active="request()->is('admin/dashboard*')" />
                <x-admin-nav-link href="{{route('admin.users.index') }}" icon="fa-users" label="Users" :active="request()->is('admin/users*')" />
                <x-admin-nav-link href="{{route('admin.products.index') }}" icon="fa-box-open" label="Products" :active="request()->is('admin/products*')" />
                <x-admin-nav-link href="{{route('admin.categories.index') }}" icon="fa-list" label="Categories" :active="request()->is('admin/categories*')" />
                <x-admin-nav-link href="{{route('admin.comments.index') }}" icon="fa-comment" label="Comments" :active="request()->is('admin/comments*')" />
                <x-admin-nav-link href="{{route('admin.permissions.index') }}" icon="fa-shield" label="Roles & Permissions" :active="request()->is('admin/permissions*')" />
            </nav>

            <div class="p-4 border-t border-gray-100">
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button class="flex items-center gap-3 w-full p-2 hover:bg-red-50 text-red-600 rounded-lg transition">
                        <i class="fa-solid fa-right-from-bracket"></i>
                        <span class="font-medium">Logout</span>
                    </button>
                </form>
            </div>
        </aside>

        <main class="flex-1 flex flex-col overflow-y-auto">
            <header class="h-16 bg-white border-b border-gray-200 flex items-center justify-between px-8 shrink-0">
                <h2 class="text-lg font-semibold text-gray-700">Admin Office</h2>
                <div class="flex items-center gap-4">
                    <span class="text-sm text-gray-500 italic">2026-02-03</span>
                </div>
            
            </header>

            <div class="p-8">
                @yield('content')
            </div>
        </main>

    </div>

</body>
</html>