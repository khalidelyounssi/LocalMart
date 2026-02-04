<!DOCTYPE html>
<html lang="fr" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LocalMart | Soutenez vos commerçants locaux</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
        }
    </style>
</head>

<body class="bg-white text-slate-900 antialiased">

    <nav class="fixed w-full z-50 bg-white/80 backdrop-blur-md border-b border-gray-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16 items-center">
                <div class="flex items-center gap-2">
                    <div class="w-10 h-10 bg-green-600 rounded-xl flex items-center justify-center shadow-lg shadow-green-200">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-white" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M11 20A7 7 0 0 1 9.8 6.1C15.5 5 17 4.48 19 2c1 2 2 4.18 2 8 0 5.5-4.78 10-10 10Z" />
                            <path d="M2 21c0-3 1.85-5.36 5.08-6C10 14.5 10.5 13.8 10.5 13.5s-.5-1-1.5-1.5c-3-1.5-3.5-5.5-3-8.5" />
                        </svg>
                    </div>
                    <span class="text-xl font-extrabold tracking-tight text-gray-900">LocalMart</span>
                </div>

                <div class="flex items-center gap-3">
                    @auth
                    <a href="{{ url('/dashboard') }}" class="bg-gray-900 text-white px-6 py-2.5 rounded-xl text-sm font-bold hover:bg-gray-800 transition-all shadow-lg shadow-gray-200">Accéder au Marché</a>
                    @else
                    <a href="{{ route('login') }}" class="text-sm font-bold text-gray-700 hover:text-green-600 px-4 py-2 transition-colors">Connexion</a>
                    @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="bg-green-600 text-white px-6 py-2.5 rounded-xl text-sm font-bold hover:bg-green-700 transition-all shadow-lg shadow-green-200">Rejoindre Nous</a>
                    @endif
                    @endauth
                </div>
            </div>
        </div>
    </nav>

    <header class="relative pt-32 pb-20 lg:pt-48 lg:pb-32 overflow-hidden">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 text-center">
            <div class="inline-flex items-center gap-2 px-3 py-1 mb-6 text-xs font-bold tracking-wider text-green-700 uppercase bg-green-50 rounded-full border border-green-100">
                <span class="flex h-2 w-2 rounded-full bg-green-500 animate-pulse"></span>
                Exclusif aux membres LocalMart
            </div>
            <h1 class="text-5xl lg:text-7xl font-extrabold tracking-tight text-gray-900 mb-6 leading-[1.1]">
                Découvrez le terroir <br><span class="text-green-600 italic">à portée de clic</span>
            </h1>
            <p class="text-lg text-gray-600 max-w-2xl mx-auto mb-10 leading-relaxed font-medium">
                Connectez-vous pour accéder à notre catalogue exclusif de produits frais, gérer vos commandes et soutenir les petits producteurs de votre région.
            </p>

            <div class="flex flex-col sm:flex-row justify-center gap-4">
                @guest
                <a href="{{ route('register') }}" class="px-10 py-4 bg-green-600 text-white rounded-2xl font-bold text-lg hover:bg-green-700 transition-all shadow-xl shadow-green-200 hover:-translate-y-1">
                    Créer mon compte
                </a>
                <a href="{{ route('login') }}" class="px-10 py-4 bg-white border-2 border-gray-100 text-gray-700 rounded-2xl font-bold text-lg hover:bg-gray-50 transition-all">
                    Se connecter
                </a>
                @else
                <a href="{{ url('/dashboard') }}" class="px-10 py-4 bg-green-600 text-white rounded-2xl font-bold text-lg hover:bg-green-700 transition-all shadow-xl shadow-green-200 hover:-translate-y-1">
                    Entrer dans le catalogue
                </a>
                @endguest
            </div>
        </div>

        <div class="absolute top-0 left-1/2 -translate-x-1/2 w-full h-full -z-10 opacity-30">
            <div class="absolute top-20 left-1/4 w-96 h-96 bg-green-300 rounded-full blur-[120px]"></div>
            <div class="absolute bottom-20 right-1/4 w-96 h-96 bg-emerald-200 rounded-full blur-[120px]"></div>
        </div>
    </header>

    <section id="features" class="py-24 bg-gray-50/50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-3xl font-extrabold text-gray-900">Une fois connecté, vous pourrez...</h2>
                <p class="mt-4 text-gray-600 max-w-xl mx-auto">Accédez à un écosystème e-commerce complet conçu pour vous.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="bg-white p-8 rounded-[2.5rem] shadow-sm border border-gray-100 hover:shadow-xl transition-all duration-300">
                    <div class="w-14 h-14 bg-green-50 text-green-600 rounded-2xl flex items-center justify-center mb-6">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-7 h-7" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold mb-3 text-gray-900">Commander en Direct</h3>
                    <p class="text-gray-600 leading-relaxed text-sm">Parcourez le catalogue complet par catégories et passez vos commandes en quelques secondes.</p>
                </div>

                <div class="bg-white p-8 rounded-[2.5rem] shadow-sm border border-gray-100 hover:shadow-xl transition-all duration-300">
                    <div class="w-14 h-14 bg-blue-50 text-blue-600 rounded-2xl flex items-center justify-center mb-6">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-7 h-7" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold mb-3 text-gray-900">Suivi & Notifications</h3>
                    <p class="text-gray-600 leading-relaxed text-sm">Recevez des emails Gmail à chaque changement de statut de votre commande (En attente, Payée, Livrée).</p>
                </div>

                <div class="bg-white p-8 rounded-[2.5rem] shadow-sm border border-gray-100 hover:shadow-xl transition-all duration-300">
                    <div class="w-14 h-14 bg-orange-50 text-orange-600 rounded-2xl flex items-center justify-center mb-6">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-7 h-7" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold mb-3 text-gray-900">Interaction Sociale</h3>
                    <p class="text-gray-600 leading-relaxed text-sm">Laissez des avis, notez les produits et gérez vos "likes" pour personnaliser votre expérience.</p>
                </div>
                <div class="bg-white p-8 rounded-[2.5rem] shadow-sm border border-gray-100 hover:shadow-xl transition-all duration-300">
                    <div class="w-14 h-14 bg-red-50 text-red-600 rounded-2xl flex items-center justify-center mb-6">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-7 h-7" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold mb-3 text-gray-900">Sécurité Maximale</h3>
                    <p class="text-gray-600 leading-relaxed text-sm">Vos données personnelles et vos transactions sont protégées par un cryptage SSL de bout en bout et des protocoles de sécurité Laravel 11.</p>
                </div>
                <div class="bg-white p-8 rounded-[2.5rem] shadow-sm border border-gray-100 hover:shadow-xl transition-all duration-300">
                    <div class="w-14 h-14 bg-purple-50 text-purple-600 rounded-2xl flex items-center justify-center mb-6">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-7 h-7" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m3.536 9.192l-3.536 3.536M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-5 0a4 4 0 11-8 0 4 4 0 018 0z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold mb-3 text-gray-900">Assistance 24/7</h3>
                    <p class="text-gray-600 leading-relaxed text-sm">Une équipe dédiée est à votre écoute pour résoudre vos problèmes et répondre à vos questions à tout moment de la journée.</p>
                </div>

                <div class="bg-white p-8 rounded-[2.5rem] shadow-sm border border-gray-100 hover:shadow-xl transition-all duration-300">
                    <div class="w-14 h-14 bg-amber-50 text-amber-600 rounded-2xl flex items-center justify-center mb-6">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-7 h-7" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold mb-3 text-gray-900">Paiement Facile</h3>
                    <p class="text-gray-600 leading-relaxed text-sm">Payez en toute confiance via Stripe ou optez pour le paiement à la livraison selon vos préférences et la disponibilité chez le vendeur.</p>
                </div>
            </div>
        </div>
    </section>

    <footer class="bg-white border-t border-gray-100 pt-16 pb-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col md:flex-row justify-between items-center gap-6 mb-8 text-center md:text-left">
                <div>
                    <div class="text-2xl font-black text-gray-900 mb-2">LocalMart</div>
                    <p class="text-gray-500 text-sm italic">Soutenez votre économie locale dès aujourd'hui.</p>
                </div>
                <div class="flex gap-8 text-sm font-bold text-gray-400 uppercase tracking-widest">
                    <a href="{{ route('login') }}" class="hover:text-green-600 transition-colors">Connexion</a>
                    <a href="{{ route('register') }}" class="hover:text-green-600 transition-colors">Inscription</a>
                    <a href="#" class="hover:text-green-600 transition-colors">Contact</a>
                </div>
            </div>
            <div class="border-t border-gray-50 pt-8 text-center text-xs text-gray-400 font-medium tracking-widest uppercase">
                © 2026 LocalMart. Plateforme Sécurisée Laravel.
            </div>
        </div>
    </footer>
</body>

</html>