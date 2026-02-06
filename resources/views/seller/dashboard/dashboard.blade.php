@extends('layouts.seller')

@section('content')
<div class="container mx-auto">
    <div class="mb-10">
        <h1 class="text-3xl font-black text-gray-800 tracking-tight">Tableau de bord</h1>
        <p class="text-gray-500 font-medium">Bonjour, <span class="text-indigo-600 font-bold">{{ auth()->user()->name }}</span> ! Voici un résumé de votre activité.</p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
        
        <div class="bg-gradient-to-br from-indigo-600 to-indigo-800 p-8 rounded-[2.5rem] shadow-2xl shadow-indigo-200 relative overflow-hidden group">
            <div class="absolute -right-4 -top-4 w-24 h-24 bg-white/10 rounded-full blur-2xl group-hover:scale-150 transition-transform duration-500"></div>
            <div class="relative z-10">
                <div class="flex justify-between items-center mb-4">
                    <p class="text-indigo-100 text-xs font-black uppercase tracking-[0.2em]">Total des Revenus</p>
                    <div class="bg-white/20 p-3 rounded-2xl">
                        <i class="fa-solid fa-wallet text-white text-xl"></i>
                    </div>
                </div>
                <h3 class="text-white text-4xl font-black tracking-tight">
                    {{ number_format($totalEarnings ?? 0, 2) }} <span class="text-sm opacity-80">DH</span>
                </h3>
                <p class="text-indigo-200 text-xs mt-4 font-medium italic">+ 0% depuis le mois dernier</p>
            </div>
        </div>

        <div class="bg-white p-8 rounded-[2.5rem] border border-gray-100 shadow-xl shadow-gray-100/50 group hover:border-indigo-200 transition-all duration-300">
            <div class="flex justify-between items-center mb-4">
                <p class="text-gray-400 text-xs font-black uppercase tracking-[0.2em]">Mes Produits</p>
                <div class="bg-indigo-50 p-3 rounded-2xl text-indigo-600 group-hover:bg-indigo-600 group-hover:text-white transition-colors duration-300">
                    <i class="fa-solid fa-box-open text-xl"></i>
                </div>
            </div>
            <h3 class="text-gray-800 text-4xl font-black tracking-tight">{{ $productsCount ?? 0 }}</h3>
            <p class="text-gray-400 text-xs mt-4 font-medium italic text-indigo-500">Gérer mon catalogue →</p>
        </div>

        <div class="bg-white p-8 rounded-[2.5rem] border border-gray-100 shadow-xl shadow-gray-100/50 group hover:border-amber-200 transition-all duration-300">
            <div class="flex justify-between items-center mb-4">
                <p class="text-gray-400 text-xs font-black uppercase tracking-[0.2em]">En Attente</p>
                <div class="bg-amber-50 p-3 rounded-2xl text-amber-600 group-hover:bg-amber-500 group-hover:text-white transition-colors duration-300">
                    <i class="fa-solid fa-clock text-xl"></i>
                </div>
            </div>
            <h3 class="text-gray-800 text-4xl font-black tracking-tight text-amber-600">{{ $pendingOrdersCount ?? 0 }}</h3>
            <p class="text-gray-400 text-xs mt-4 font-medium italic text-amber-500">Commandes à traiter</p>
        </div>

    </div>

    <div class="mt-12 bg-indigo-50/50 p-8 rounded-[2.5rem] border border-indigo-100/50 flex items-center justify-between">
        <div class="flex items-center gap-6">
            <div class="bg-white p-4 rounded-3xl shadow-sm text-indigo-600">
                <i class="fa-solid fa-lightbulb text-2xl"></i>
            </div>
            <div>
                <h4 class="font-black text-gray-800">Conseil du jour</h4>
                <p class="text-sm text-gray-500">Ajoutez des images de haute qualité pour augmenter vos ventes de 30% !</p>
            </div>
        </div>
        <button class="bg-white text-indigo-600 px-6 py-3 rounded-2xl font-bold text-sm shadow-sm hover:shadow-md transition">Voir les guides</button>
    </div>
</div>
@endsection