@extends('layouts.admin')

@section('content')
    <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-6 mb-10">
        <div>
            <h1 class="text-3xl font-black text-gray-900 tracking-tight">Rôles & Permissions</h1>
            <p class="text-gray-500 font-medium mt-1">Gérez les niveaux d'accès directement depuis la matrice.</p>
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-10">
        <div class="bg-white p-6 rounded-[2rem] border border-gray-100 shadow-sm">
            <div class="flex items-center gap-4">
                <div class="w-12 h-12 bg-gray-50 rounded-2xl flex items-center justify-center text-gray-400">
                    <i class="fa-solid fa-tags"></i>
                </div>
                <div>
                    <p class="text-[10px] font-black text-gray-400 uppercase tracking-widest">Total Rôles</p>
                    <h3 class="text-2xl font-black text-gray-900">{{ $roles->count() }}</h3>
                </div>
            </div>
        </div>

        <div class="bg-white p-6 rounded-[2rem] border border-gray-100 shadow-sm">
            <div class="flex items-center gap-4">
                <div class="w-12 h-12 bg-gray-50 rounded-2xl flex items-center justify-center text-gray-400">
                    <i class="fa-solid fa-users"></i>
                </div>
                <div>
                    <p class="text-[10px] font-black text-gray-400 uppercase tracking-widest">Utilisateurs</p>
                    <h3 class="text-2xl font-black text-gray-900">{{ number_format($usersCount) }}</h3>
                </div>
            </div>
        </div>

        <div class="bg-white p-6 rounded-[2rem] border border-gray-100 shadow-sm">
            <div class="flex items-center gap-4">
                <div class="w-12 h-12 bg-gray-50 rounded-2xl flex items-center justify-center text-gray-400">
                    <i class="fa-solid fa-key"></i>
                </div>
                <div>
                    <p class="text-[10px] font-black text-gray-400 uppercase tracking-widest">Permissions</p>
                    <h3 class="text-2xl font-black text-gray-900">{{ $permissions->count() }}</h3>
                </div>
            </div>
        </div>
    </div>

    <div class="bg-white rounded-[2.5rem] shadow-sm border border-gray-100 overflow-hidden">
        <div class="p-8 border-b border-gray-50 flex justify-between items-center">
            <div>
                <h3 class="text-xl font-black text-gray-900">Matrice des Permissions</h3>
                <p class="text-xs text-gray-400 font-medium mt-1">Cochez les cases pour modifier les droits en temps réel.</p>
            </div>
        </div>
        
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-gray-50/50">
                        <th class="px-8 py-5 text-[10px] font-black text-gray-400 uppercase tracking-widest">Permission</th>
                        @foreach($roles as $role)
                            <th class="px-6 py-5 text-[10px] font-black text-gray-400 uppercase tracking-widest text-center">{{ $role->name }}</th>
                        @endforeach
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-50">
                    @foreach($permissions as $permission)
                    <tr class="hover:bg-gray-50/50 transition-colors group">
                        <td class="px-8 py-5 font-bold text-gray-700 group-hover:text-green-600 transition-colors">
                            {{ $permission->name }}
                        </td>
                        @foreach($roles as $role)
                        <td class="px-6 py-5 text-center">
                            {{-- Checkbox pour le Toggle --}}
                            <input type="checkbox" 
                                   class="permission-checkbox w-5 h-5 text-green-600 bg-gray-100 border-gray-300 rounded focus:ring-green-500 cursor-pointer"
                                   data-role="{{ $role->id }}" 
                                   data-permission="{{ $permission->name }}"
                                   {{ $role->hasPermissionTo($permission->name) ? 'checked' : '' }}>
                        </td>
                        @endforeach
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    {{-- Script AJAX avec Axios --}}
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script>
        document.querySelectorAll('.permission-checkbox').forEach(checkbox => {
            checkbox.addEventListener('change', function() {
                const roleId = this.getAttribute('data-role');
                const permissionName = this.getAttribute('data-permission');
                const isChecked = this.checked;

                axios.post('{{ route("permissions.toggle") }}', {
                    role_id: roleId,
                    permission: permissionName,
                    status: isChecked
                })
                .then(response => {
                    console.log('Mis à jour avec succès');
                })
                .catch(error => {
                    alert('Erreur: impossible de mettre à jour la permission');
                    this.checked = !isChecked; 
                });
            });
        });
    </script>
@endsection