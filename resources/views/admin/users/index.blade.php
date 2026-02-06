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
    <div class="bg-white p-6 rounded-3xl border border-gray-100 shadow-sm">
        <p class="text-[10px] font-black text-gray-400 uppercase tracking-widest mb-1">Total Utilisateurs</p>
        <p class="text-2xl font-black text-slate-900">{{ $totalUsers}}</p>
    </div>
    <div class="bg-white p-6 rounded-3xl border border-gray-100 shadow-sm border-l-4 border-l-green-500">
        <p class="text-[10px] font-black text-gray-400 uppercase tracking-widest mb-1">Nouveaux ce mois</p>
        <p class="text-2xl font-black text-slate-900">+{{$newUsersThisMonth}}</p>
    </div>
    <div class="bg-white p-6 rounded-3xl border border-gray-100 shadow-sm border-l-4 border-l-red-500">
        <p class="text-[10px] font-black text-gray-400 uppercase tracking-widest mb-1">Comptes Suspendus</p>
        <p class="text-2xl font-black text-slate-900">{{$suspendedUsers}}</p>
    </div>
</div>

<div class="bg-white rounded-[2rem] border border-gray-100 shadow-xl shadow-gray-50/50 overflow-hidden">
    <div class="p-6 border-b border-gray-50 flex flex-wrap gap-4 items-center justify-between bg-white">
        <div class="flex items-center gap-4 flex-1">
            <div class="relative max-w-xs w-full group">
                <i class="fa-solid fa-magnifying-glass absolute left-4 top-1/2 -translate-y-1/2 text-gray-400 group-focus-within:text-green-600 transition-colors"></i>
                <input type="text" placeholder="Rechercher par nom ou email..."
                    class="w-full pl-11 pr-4 py-2.5 bg-gray-50 border-none rounded-2xl focus:ring-4 focus:ring-green-50 focus:bg-white transition-all text-sm font-medium">
            </div>

            <div class="relative">
                <select class="appearance-none bg-gray-50 border-none rounded-2xl pl-4 pr-10 py-2.5 text-sm font-bold text-slate-600 outline-none cursor-pointer focus:ring-4 focus:ring-green-50 transition-all">
                    <option>Tous les Rôles</option>
                    <option>Client</option>
                    <option>Vendeur</option>
                    <option>Modérateur</option>
                </select>
                <i class="fa-solid fa-chevron-down absolute right-4 top-1/2 -translate-y-1/2 text-gray-400 text-[10px] pointer-events-none"></i>
            </div>
        </div>

        <button class="text-slate-400 hover:text-slate-600 p-2 transition-colors">
            <i class="fa-solid fa-rotate-right"></i>
        </button>
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
                        @if($user->roles->isNotEmpty())
                        @foreach($user->roles as $role)
                        <span class="px-4 py-1.5 bg-slate-100 text-slate-600 rounded-xl text-[10px] font-black uppercase tracking-tight">
                            {{ $role->name }}
                        </span>
                        @endforeach
                        @else
                        <span class="px-4 py-1.5 bg-gray-50 text-gray-400 rounded-xl text-[10px] font-black uppercase tracking-tight">
                            Aucun Rôle
                        </span>
                        @endif
                    </td>

                    <td class="px-6 py-5 text-center">
                        <form action="{{ route('admin.users.toggle', $user->id) }}" method="POST">
                            @csrf
                            @method('PATCH')
                            <button type="submit"
                                class="inline-flex items-center gap-1.5 px-3 py-1 rounded-xl text-[10px] font-black uppercase transition-all duration-300
                        {{ $user->status == 'active' ? 'bg-green-50 text-green-600 hover:bg-red-50 hover:text-red-600' : 'bg-red-50 text-red-600 hover:bg-green-50 hover:text-green-600' }}">
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
                            <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cet utilisateur ?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="w-9 h-9 flex items-center justify-center rounded-xl bg-gray-50 text-slate-400 hover:bg-red-50 hover:text-red-500 transition-all duration-300 shadow-sm"
                                    title="Supprimer">
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
        <div class="p-6 bg-gray-50/50 border-t border-gray-50">
            {{ $users->links() }}
        </div>
    </div>
</div>
@endsection