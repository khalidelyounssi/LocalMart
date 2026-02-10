@extends('layouts.admin')

@section('content')
<div id="message" class="hidden fixed top-10 right-10 z-[100] min-w-[350px] transform transition-all duration-500"></div>
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
                <p id="total-users" class="text-2xl font-black text-slate-900">{{ $totalUsers }}</p>
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
                <p id="total-user-mois" class="text-2xl font-black text-slate-900">+{{ $newUsersThisMonth }}</p>
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
                <p id="total-suspended-users" class="text-2xl font-black text-slate-900">{{ $suspendedUsers }}</p>
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
                <p id="total-clients" class="text-2xl font-black text-slate-900">{{ $totalUsersRoleClient }}</p>
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
                <p id="total-sellers" class="text-2xl font-black text-slate-900">{{ $totalUsersRoleSeller }}</p>
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
                <p id="total-moderators" class="text-2xl font-black text-slate-900">{{ $totalUsersRoleModerator }}</p>
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
                <input id="search-input" type="text" name="search" placeholder="Rechercher..." class="w-full pl-11 pr-4 py-2.5 bg-gray-50 border-none rounded-2xl focus:ring-4 focus:ring-green-50 focus:bg-white transition-all text-sm font-medium">
            </form>

            <select id="role-filter" class="appearance-none bg-gray-50 border-none rounded-2xl px-4 py-2.5 text-sm font-bold text-slate-600 outline-none cursor-pointer focus:ring-4 focus:ring-green-50">
                <option value="all">Tous les Rôles</option>
                <option value="admin">Admin</option>
                <option value="moderator">Moderator</option>
                <option value="seller">Seller</option>
                <option value="client">Client</option>
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
            <tbody id="users-table-body" class="divide-y divide-gray-50">
                @include('admin.users.partials._users_table')
            </tbody>
        </table>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script>
    axios.defaults.headers.common['X-CSRF-TOKEN'] = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

    function showMessage(message, type = 'success') {
        const msgDiv = document.getElementById('message');
        const bgColor = type === 'success' ? 'bg-green-500' : 'bg-red-500';

        msgDiv.className = `fixed top-10 right-10 z-[100] min-w-[320px] ${bgColor} text-white p-4 rounded-2xl shadow-2xl font-bold text-sm transition-all duration-500 flex items-center gap-3 opacity-100 translate-y-0`;
        msgDiv.innerHTML = `<i class="fa-solid ${type === 'success' ? "fa-check-circle" : "fa-exclamation-circle"} mr-2"></i>${message}`;

        msgDiv.classList.remove('hidden');

        setTimeout(() => {
            msgDiv.classList.add('hidden');
        }, 3000);
    }

    function updateUserStatus(userId) {
        /**
         *  Créez la requête (même route que celle définie dans admin.php pour le changement de statut)
         */
        axios.patch(`/users/${userId}/toggle`)
            .then(Response => {
                if (Response.data.success) {
                    showMessage(Response.data.message, 'success');
                    const data = Response.data;
                    document.getElementById(`status-text-${userId}`).innerText = data.new_status;
                    document.getElementById(`date-${userId}`).innerText = data.updated_at;

                    const statusBtn = document.getElementById(`status-btn-${userId}`);
                    const statusDot = document.getElementById(`status-dot-${userId}`);

                    if (data.new_status === 'active') {
                        statusBtn.className = 'inline-flex items-center gap-1.5 px-3 py-1 rounded-xl text-[10px] font-black uppercase transition-all duration-300 bg-green-50 text-green-600';
                        statusDot.className = 'w-1.5 h-1.5 bg-green-500 rounded-full';
                    } else {
                        statusBtn.className = 'inline-flex items-center gap-1.5 px-3 py-1 rounded-xl text-[10px] font-black uppercase transition-all duration-300 bg-red-50 text-red-600';
                        statusDot.className = 'w-1.5 h-1.5 bg-red-500 rounded-full';
                    }
                    if (data.status) {
                        document.getElementById('total-users').innerText = data.status.total_users;
                        document.getElementById('total-user-mois').innerText = '+' + data.status.total_users_this_month;
                        document.getElementById('total-suspended-users').innerText = data.status.suspended_users;
                    }
                }
            })
            .catch(error => {
                console.error('Erreur lors de la mise à jour du statut :', error);
                const errorMessage = error.Response?.data?.message || 'Une erreur est survenue. Veuillez réessayer.';
                showMessage(errorMessage, 'error');
            });
    }

    function updateUserRole(UserId, newRole) {
        axios.patch(`/users/${UserId}/role`, {
                role: newRole
            })
            .then(Response => {
                if (Response.data.success) {
                    const data = Response.data;
                    if (data.role_counts) {
                        document.getElementById('total-clients').innerText = data.role_counts.total_clients;
                        document.getElementById('total-sellers').innerText = data.role_counts.total_sellers;
                        document.getElementById('total-moderators').innerText = data.role_counts.total_moderators;
                    }
                    console.log('role updated to : ' + newRole);
                    showMessage(Response.data.message, 'success');
                }
            })
            .catch(error => {
                console.error('Erreur lors de la mise à jour du rôle :', error);
                const errorMessage = error.Response?.data?.message || 'Une erreur est survenue. Veuillez réessayer.';
                showMessage(errorMessage, 'error');
            })
    }

    function deleteUser(userId) {
        if (confirm('Êtes-vous sûr de vouloir supprimer cet utilisateur ?')) {
            axios.delete(`/users/${userId}`)
                .then(response => {
                    if (response.data.success) {
                        showMessage(response.data.message, 'success');
                        document.getElementById(`user-row-${userId}`).remove();
                        const data = response.data;
                        if (data.status) {
                            document.getElementById('total-users').innerText = data.status.total_users;
                            document.getElementById('total-user-mois').innerText = '+' + data.status.total_users_this_month;
                            document.getElementById('total-suspended-users').innerText = data.status.suspended_users;
                            document.getElementById('total-clients').innerText = data.status.total_clients;
                            document.getElementById('total-sellers').innerText = data.status.total_sellers;
                            document.getElementById('total-moderators').innerText = data.status.total_moderators;
                        }
                    }
                })
                .catch(error => {
                    console.error('Erreur lors de la suppression de l`utilisateur :', error);
                    const errorMessage = error.Response?.data?.message || 'Une erreur est survenue. Veuillez réessayer.';
                    showMessage(errorMessage, 'error');
                });
        }
    }
    /**
     * fillter pour les rôles 
     */

    document.getElementById('role-filter').addEventListener('change', function() {
        /**
         * le role qui existe
         */
        let selectedRole = this.value;

        /**
         * faire une requete get pour filtrer les utilisateurs par role
         */
        axios.get('{{route("admin.users.index") }}', {
                params: {
                    role: selectedRole
                },
                headers: {
                    'X-Requested-With': 'XMLHttpRequest'
                }
            })
            .then(response => {
                document.getElementById('users-table-body').innerHTML = response.data;
            })
            .catch(error => {
                console.error('Erreur lors du filtrage des utilisateurs :', error);
                console.log(error.Response);
                showMessage('Une erreur est survenue lors du filtrage des utilisateurs.', 'error');
            });
    });

    /** 
     * filtre de recherche en temps réel
     */

    let searchTimer;
    document.getElementById('search-input').addEventListener('input', function() {
        const searchQuery = this.value;
        const selectedRole = document.getElementById('role-filter').value;

        clearTimeout(searchTimer);

        searchTimer = setTimeout(() => {
            axios.get("{{route('admin.users.index')}}", {
                    params: {
                        search: searchQuery,
                        role: selectedRole
                    },
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest'
                    }
                })
                .then(response => {
                    document.getElementById('users-table-body').innerHTML = response.data;
                })
                .catch(error => {
                    console.error('Error search: ', error);
                })
        },500)
    })
    document.querySelector('form.group').addEventListener('submit', function(e) {
        e.preventDefault();
    });
</script>
@endsection