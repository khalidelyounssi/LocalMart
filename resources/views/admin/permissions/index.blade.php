<x-admin-layout>
    <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-6 mb-10">
        <div>
            <h1 class="text-3xl font-black text-gray-900 tracking-tight">Rôles & Permissions</h1>
            <p class="text-gray-500 font-medium mt-1">Gérez les niveaux d'accès et la sécurité de la plateforme.</p>
        </div>
        
        <button class="bg-green-600 text-white px-6 py-3 rounded-xl font-bold hover:bg-green-700 transition-all shadow-lg shadow-green-100 flex items-center gap-3 group">
            <i class="fa-solid fa-plus group-hover:rotate-90 transition-transform"></i>
            Nouveau Rôle
        </button>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-10">
        @php
            $stats = [
                ['label' => 'Total Rôles', 'value' => '4', 'icon' => 'fa-tags'],
                ['label' => 'Utilisateurs', 'value' => '8,907', 'icon' => 'fa-users'],
                ['label' => 'Rôles Custom', 'value' => '0', 'icon' => 'fa-gears'],
                ['label' => 'Permissions', 'value' => '26', 'icon' => 'fa-key'],
            ];
        @endphp
        
        @foreach($stats as $stat)
        <div class="bg-white p-6 rounded-[2rem] border border-gray-100 shadow-sm hover:shadow-md transition-shadow">
            <div class="flex items-center gap-4">
                <div class="w-12 h-12 bg-gray-50 rounded-2xl flex items-center justify-center text-gray-400">
                    <i class="fa-solid {{ $stat['icon'] }}"></i>
                </div>
                <div>
                    <p class="text-[10px] font-black text-gray-400 uppercase tracking-widest">{{ $stat['label'] }}</p>
                    <h3 class="text-2xl font-black text-gray-900">{{ $stat['value'] }}</h3>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 mb-12">
        <div class="bg-white p-8 rounded-[2.5rem] border border-gray-100 shadow-sm relative overflow-hidden group">
            <div class="absolute top-0 right-0 p-6">
                <button class="text-gray-300 hover:text-gray-900 transition-colors"><i class="fa-solid fa-ellipsis-vertical text-xl"></i></button>
            </div>
            
            <div class="flex items-start gap-6 mb-8">
                <div class="w-16 h-16 bg-gray-900 text-white rounded-3xl flex items-center justify-center text-2xl shadow-xl">
                    <i class="fa-solid fa-shield-halved"></i>
                </div>
                <div>
                    <h4 class="text-2xl font-black text-gray-900">Administrateur</h4>
                    <p class="text-sm text-gray-500 font-medium">Accès total au système et configurations.</p>
                </div>
            </div>

            <div class="space-y-6">
                <div>
                    <p class="text-[10px] font-black text-gray-400 uppercase tracking-[0.2em] mb-4">Permissions Clés</p>
                    <div class="flex flex-wrap gap-2">
                        <span class="px-4 py-2 bg-green-50 text-green-700 rounded-xl text-xs font-bold border border-green-100">users.all</span>
                        <span class="px-4 py-2 bg-green-50 text-green-700 rounded-xl text-xs font-bold border border-green-100">settings.edit</span>
                        <span class="px-4 py-2 bg-gray-50 text-gray-600 rounded-xl text-xs font-bold border border-gray-100">+15 autres</span>
                    </div>
                </div>
                
                <div class="flex items-center justify-between pt-6 border-t border-gray-50">
                    <div class="flex -space-x-3">
                        <div class="w-10 h-10 rounded-full border-4 border-white bg-gray-200 flex items-center justify-center text-[10px] font-bold">JD</div>
                        <div class="w-10 h-10 rounded-full border-4 border-white bg-green-200 flex items-center justify-center text-[10px] font-bold">AK</div>
                        <div class="w-10 h-10 rounded-full border-4 border-white bg-gray-100 flex items-center justify-center text-[10px] font-bold">+2</div>
                    </div>
                    <button class="text-sm font-black text-gray-900 hover:underline">Gérer le rôle</button>
                </div>
            </div>
        </div>

        <div class="bg-white p-8 rounded-[2.5rem] border border-gray-100 shadow-sm group">
            <div class="flex items-start gap-6 mb-8">
                <div class="w-16 h-16 bg-green-100 text-green-600 rounded-3xl flex items-center justify-center text-2xl">
                    <i class="fa-solid fa-store"></i>
                </div>
                <div>
                    <h4 class="text-2xl font-black text-gray-900">Vendeur (Seller)</h4>
                    <p class="text-sm text-gray-500 font-medium">Gestion du catalogue et commandes.</p>
                </div>
            </div>

            <div class="space-y-6">
                <div>
                    <p class="text-[10px] font-black text-gray-400 uppercase tracking-[0.2em] mb-4">Permissions Clés</p>
                    <div class="flex flex-wrap gap-2">
                        <span class="px-4 py-2 bg-gray-50 text-gray-600 rounded-xl text-xs font-bold border border-gray-100">products.manage</span>
                        <span class="px-4 py-2 bg-gray-50 text-gray-600 rounded-xl text-xs font-bold border border-gray-100">orders.view</span>
                        <span class="px-4 py-2 bg-gray-50 text-gray-600 rounded-xl text-xs font-bold border border-gray-100">payouts.request</span>
                    </div>
                </div>
                
                <div class="flex items-center justify-between pt-6 border-t border-gray-50">
                    <span class="text-xs font-bold text-gray-400"><i class="fa-solid fa-users mr-2"></i> 156 Utilisateurs</span>
                    <button class="text-sm font-black text-gray-900 hover:underline">Gérer le rôle</button>
                </div>
            </div>
        </div>
    </div>

    <div class="bg-white rounded-[2.5rem] shadow-sm border border-gray-100 overflow-hidden">
        <div class="p-8 border-b border-gray-50 flex justify-between items-center">
            <div>
                <h3 class="text-xl font-black text-gray-900">Matrice des Permissions</h3>
                <p class="text-xs text-gray-400 font-medium mt-1">Vue d'ensemble comparative des droits d'accès</p>
            </div>
            <div class="flex gap-2">
                <button class="p-2 hover:bg-gray-50 rounded-lg text-gray-400"><i class="fa-solid fa-filter"></i></button>
                <button class="p-2 hover:bg-gray-50 rounded-lg text-gray-400"><i class="fa-solid fa-download"></i></button>
            </div>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-gray-50/50">
                        <th class="px-8 py-5 text-[10px] font-black text-gray-400 uppercase tracking-widest">Fonctionnalité</th>
                        <th class="px-6 py-5 text-[10px] font-black text-gray-400 uppercase tracking-widest text-center">Admin</th>
                        <th class="px-6 py-5 text-[10px] font-black text-gray-400 uppercase tracking-widest text-center">Vendeur</th>
                        <th class="px-6 py-5 text-[10px] font-black text-gray-400 uppercase tracking-widest text-center">Modérateur</th>
                        <th class="px-6 py-5 text-[10px] font-black text-gray-400 uppercase tracking-widest text-center">Client</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-50">
                    @php
                        $rows = [
                            ['label' => 'Gestion Utilisateurs', 'perms' => [true, false, false, false]],
                            ['label' => 'Publication Produits', 'perms' => [true, true, false, false]],
                            ['label' => 'Modération Avis', 'perms' => [true, false, true, false]],
                            ['label' => 'Passer Commande', 'perms' => [true, true, false, true]],
                        ];
                    @endphp

                    @foreach($rows as $row)
                    <tr class="hover:bg-gray-50/50 transition-colors group">
                        <td class="px-8 py-5 font-bold text-gray-700 group-hover:text-green-600 transition-colors">{{ $row['label'] }}</td>
                        @foreach($row['perms'] as $hasPerm)
                        <td class="px-6 py-5 text-center">
                            @if($hasPerm)
                                <div class="w-8 h-8 bg-green-100 text-green-600 rounded-xl flex items-center justify-center mx-auto text-[10px]">
                                    <i class="fa-solid fa-check"></i>
                                </div>
                            @else
                                <span class="text-gray-200 text-xs font-black">—</span>
                            @endif
                        </td>
                        @endforeach
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
<<<<<<< HEAD
    </div>  
</x-admin-layout>
=======
    </div>
@endsection
>>>>>>> cba35a98f759c0532314ea6138851aa98e34708e
