@extends('layouts.admin')

@section('content')
<div class="flex flex-col md:flex-row md:items-center justify-between gap-4 mb-10">
    <div>
        <h1 class="text-3xl font-black text-slate-900 tracking-tight">Utilisateurs</h1>
        <p class="text-gray-500 font-medium mt-1 text-sm">Gérez les comptes clients, vendeurs et modérateurs.</p>
    </div>
    <button class="bg-slate-900 text-white px-6 py-3 rounded-2xl flex items-center justify-center gap-2 hover:bg-green-600 shadow-lg shadow-slate-200 hover:shadow-green-100 transition-all duration-300 font-bold text-sm group">
        <i class="fa-solid fa-user-plus group-hover:scale-110 transition-transform"></i>
        Ajouter un Utilisateur
    </button>
</div>

<div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
    <div class="bg-white p-6 rounded-3xl border border-gray-100 shadow-sm border-l-4 border-l-slate-900 transition-all hover:scale-[1.02]">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-[10px] font-black text-gray-400 uppercase tracking-widest mb-1">Total Utilisateurs</p>
                <p class="text-2xl font-black text-slate-900">{{ $totalUsers }}</p>
            </div>
            <div class="w-12 h-12 bg-slate-50 text-slate-900 rounded-2xl flex items-center justify-center text-xl">
                <i class="fa-solid fa-user-group"></i>
            </div>
        </div>
    </div>

    <div class="bg-white p-6 rounded-3xl border border-gray-100 shadow-sm border-l-4 border-l-green-500 transition-all hover:scale-[1.02]">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-[10px] font-black text-gray-400 uppercase tracking-widest mb-1">Nouveaux ce mois</p>
                <p class="text-2xl font-black text-slate-900">+{{ $newUsersThisMonth }}</p>
            </div>
            <div class="w-12 h-12 bg-green-50 text-green-600 rounded-2xl flex items-center justify-center text-xl">
                <i class="fa-solid fa-calendar-plus"></i>
            </div>
        </div>
    </div>

    <div class="bg-white p-6 rounded-3xl border border-gray-100 shadow-sm border-l-4 border-l-red-500 transition-all hover:scale-[1.02]">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-[10px] font-black text-gray-400 uppercase tracking-widest mb-1">Comptes Suspendus</p>
                <p class="text-2xl font-black text-slate-900">{{ $suspendedUsers }}</p>
            </div>
            <div class="w-12 h-12 bg-red-50 text-red-600 rounded-2xl flex items-center justify-center text-xl">
                <i class="fa-solid fa-user-slash"></i>
            </div>
        </div>
    </div>

    <div class="bg-white p-6 rounded-3xl border border-gray-100 shadow-sm border-l-4 border-l-emerald-500 transition-all hover:scale-[1.02]">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-[10px] font-black text-gray-400 uppercase tracking-widest mb-1">Total Clients</p>
                <p class="text-2xl font-black text-slate-900">{{ $totalUsersRoleClient }}</p>
            </div>
            <div class="w-12 h-12 bg-emerald-50 text-emerald-500 rounded-2xl flex items-center justify-center text-xl">
                <i class="fa-solid fa-users"></i>
            </div>
        </div>
    </div>

    <div class="bg-white p-6 rounded-3xl border border-gray-100 shadow-sm border-l-4 border-l-blue-500 transition-all hover:scale-[1.02]">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-[10px] font-black text-gray-400 uppercase tracking-widest mb-1">Total Vendeurs</p>
                <p class="text-2xl font-black text-slate-900">{{ $totalUsersRoleSeller }}</p>
            </div>
            <div class="w-12 h-12 bg-blue-50 text-blue-500 rounded-2xl flex items-center justify-center text-xl">
                <i class="fa-solid fa-shop"></i>
            </div>
        </div>
    </div>

    <div class="bg-white p-6 rounded-3xl border border-gray-100 shadow-sm border-l-4 border-l-purple-500 transition-all hover:scale-[1.02]">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-[10px] font-black text-gray-400 uppercase tracking-widest mb-1">Modérateurs</p>
                <p class="text-2xl font-black text-slate-900">{{ $totalUsersRoleModerator }}</p>
            </div>
            <div class="w-12 h-12 bg-purple-50 text-purple-500 rounded-2xl flex items-center justify-center text-xl">
                <i class="fa-solid fa-user-shield"></i>
            </div>
        </div>
    </div>
</div>

<div class="bg-white rounded-[2rem] border border-gray-100 shadow-xl shadow-gray-50/50 overflow-hidden">
    <div class="p-6 border-b border-gray-50 flex flex-wrap gap-4 items-center justify-between bg-white">
        <div class="flex items-center gap-4 flex-1">
            <form action="{{ route('admin.users.index') }}" method="GET" class="relative max-w-xs w-full group">
                <i class="fa-solid fa-magnifying-glass absolute left-4 top-1/2 -translate-y-1/2 text-gray-400 group-focus-within:text-green-600 transition-colors"></i>
                <input type="text" name="search" placeholder="Rechercher..." class="w-full pl-11 pr-4 py-2.5 bg-gray-50 border-none rounded-2xl focus:ring-4 focus:ring-green-50 focus:bg-white transition-all text-sm font-medium">
            </form>

            <select class="appearance-none bg-gray-50 border-none rounded-2xl px-4 py-2.5 text-sm font-bold text-slate-600 outline-none cursor-pointer focus:ring-4 focus:ring-green-50">
                <option>Tous les Rôles</option>
            </select>
        </div>
    </div>

    <div class="overflow-x-auto">
        <table class="w-full text-left">
            <thead>
                <tr class="bg-gray-50/50">
                    <th class="px-8 py-4 text-[10px] font-black text-gray-400 uppercase tracking-widest">Utilisateur</th>
                    <th class="px-6 py-4 text-[10px] font-black text-gray-400 uppercase tracking-widest text-center">Rôle</th>
                    <th class="px-6 py-4 text-[10px] font-black text-gray-400 uppercase tracking-widest text-center">Statut</th>
                    <th class="px-6 py-4 text-[10px] font-black text-gray-400 uppercase tracking-widest">Inscription</th>
                    <th class="px-6 py-4 text-right pr-8 text-[10px] font-black text-gray-400 uppercase tracking-widest">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-50">
                @foreach($users as $user)
                <tr class="hover:bg-green-50/30 transition-colors group">
                    <td class="px-8 py-5">
                        <div class="flex items-center gap-4">
                            <div class="w-12 h-12 bg-slate-100 text-slate-600 rounded-2xl flex items-center justify-center font-black text-sm group-hover:bg-green-600 group-hover:text-white transition-all duration-300">
                                {{ substr($user->name, 0, 2) }}
                            </div>
                            <div>
                                <div class="font-bold text-slate-900 text-sm">{{ $user->name }}</div>
                                <div class="text-xs text-gray-400 font-medium">{{ $user->email }}</div>
                            </div>
                        </div>
                    </td>

                    <td class="px-6 py-5 text-center">
                        @forelse($user->roles as $role)
                            <span class="px-4 py-1.5 bg-slate-100 text-slate-600 rounded-xl text-[10px] font-black uppercase tracking-tight">
                                {{ $role->name }}
                            </span>
                        @empty
                            <span class="text-[10px] text-gray-400 italic">Aucun</span>
                        @endforelse
                    </td>

                    <td class="px-6 py-5 text-center">
                        <form action="{{ route('admin.users.toggle', $user->id) }}" method="POST">
                            @csrf
                            @method('PATCH')
                            <button type="submit" class="inline-flex items-center gap-1.5 px-3 py-1 rounded-xl text-[10px] font-black uppercase transition-all duration-300 {{ $user->status == 'active' ? 'bg-green-50 text-green-600 hover:bg-red-50 hover:text-red-600' : 'bg-red-50 text-red-600 hover:bg-green-50 hover:text-green-600' }}">
                                <span class="w-1.5 h-1.5 {{ $user->status == 'active' ? 'bg-green-500' : 'bg-red-500' }} rounded-full"></span>
                                {{ $user->status }}
                            </button>
                        </form>
                    </td>

                    <td class="px-6 py-5">
                        <div class="text-sm font-bold text-slate-700">{{ $user->created_at->format('d M Y') }}</div>
                    </td>

                    <td class="px-6 py-5 text-right pr-8">
                        <div class="flex justify-end gap-2">
                            <a href="{{ route('admin.users.edit', $user->id) }}" class="w-9 h-9 flex items-center justify-center rounded-xl bg-gray-50 text-slate-400 hover:bg-green-50 hover:text-green-600 transition-all duration-300 shadow-sm" title="Modifier">
                                <i class="fa-regular fa-pen-to-square"></i>
                            </a>
                            <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" onsubmit="return confirm('Supprimer cet utilisateur ?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="w-9 h-9 flex items-center justify-center rounded-xl bg-gray-50 text-slate-400 hover:bg-red-50 hover:text-red-500 transition-all duration-300 shadow-sm" title="Supprimer">
                                    <i class="fa-regular fa-trash-can"></i>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="p-6 bg-gray-50/50 border-t border-gray-50 flex items-center justify-between">
        <p class="text-xs text-gray-400 font-bold uppercase tracking-widest">
            Page {{ $users->currentPage() }} sur {{ $users->lastPage() }}
        </p>
        <div>{{ $users->links() }}</div>
    </div>
</div>
@endsection