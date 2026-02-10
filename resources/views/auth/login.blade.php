<x-guest-layout>
    <div class="min-h-screen bg-white flex font-sans text-slate-900">
        <div class="hidden lg:flex lg:w-1/2 bg-green-600 relative overflow-hidden">
            <div class="absolute inset-0 opacity-30" style="background-image: url('data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iNjAiIGhlaWdodD0iNjAiIHZpZXdCb3g9IjAgMCA2MCA2MCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj48ZyBmaWxsPSJub25lIiBmaWxsLXJ1bGU9ImV2ZW5vZGQiPjxnIGZpbGw9IiNmZmZmZmYiIGZpbGwtb3BhY2l0eT0iMC4xIj48cGF0aCBkPSJNMzYgMzRjMC0yIDItNCAyLTRzMiAyIDIgNC0yIDQtMiA0LTItMi0yLTR6Ii8+PC9nPjwvZz48L3N2Zz4=')"></div>
            <div class="relative z-10 flex flex-col justify-center px-12 text-white">
                <div class="flex items-center gap-3 mb-8">
                    <div class="w-12 h-12 bg-white/20 rounded-xl flex items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-7 h-7" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M11 20A7 7 0 0 1 9.8 6.1C15.5 5 17 4.48 19 2c1 2 2 4.18 2 8 0 5.5-4.78 10-10 10Z" />
                            <path d="M2 21c0-3 1.85-5.36 5.08-6C10 14.5 10.5 13.8 10.5 13.5s-.5-1-1.5-1.5c-3-1.5-3.5-5.5-3-8.5" />
                        </svg>
                    </div>
                    <span class="text-3xl font-bold font-display tracking-tight">LocalMart</span>
                </div>
                <h1 class="text-4xl font-bold leading-tight mb-4 text-pretty">Soutenez le commerce local de votre région</h1>
                <p class="text-lg text-white/80 max-w-md">Connectez-vous pour retrouver vos producteurs préférés, découvrir des produits frais et gérer vos commandes.</p>

                <div class="mt-12 grid grid-cols-3 gap-6 border-t border-white/20 pt-8">
                    <div class="text-center">
                        <div class="text-3xl font-bold">500+</div>
                        <div class="text-sm text-white/70">Vendeurs</div>
                    </div>
                    <div class="text-center">
                        <div class="text-3xl font-bold">10K+</div>
                        <div class="text-sm text-white/70">Produits</div>
                    </div>
                    <div class="text-center">
                        <div class="text-3xl font-bold">50K+</div>
                        <div class="text-sm text-white/70">Clients</div>
                    </div>
                </div>
            </div>
        </div>

        <div class="w-full lg:w-1/2 flex items-center justify-center p-6 sm:p-12 bg-gray-50">
            <div class="w-full max-w-md bg-white p-8 rounded-2xl shadow-xl border border-gray-100">
                <div class="mb-8 text-center">
                    <h2 class="text-2xl font-bold text-gray-900">Bon retour !</h2>
                    <p class="text-gray-600">Saisissez vos identifiants pour accéder au marché</p>
                </div>

                <form method="POST" action="{{ route('login') }}" class="space-y-4">
                    @csrf

                    <div class="space-y-1">
                        <label for="email" class="text-sm font-medium text-gray-700">Adresse Email</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                </svg>
                            </div>
                            <input id="email" type="email" name="email" value="{{ old('email') }}" autofocus placeholder="nom@exemple.com"
                                class="w-full pl-10 pr-4 py-2 border rounded-lg focus:ring-2 focus:ring-green-500 outline-none @error('email') border-red-500 @enderror">
                        </div>
                        @error('email') <p class="text-xs text-red-500 mt-1">{{ $message }}</p> @enderror
                    </div>

                    <div class="space-y-1">
                        <label for="password" class="text-sm font-medium text-gray-700">Mot de passe</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                                </svg>
                            </div>
                            <input id="password" type="password" name="password" placeholder="••••••••"
                                class="w-full pl-10 pr-4 py-2 border rounded-lg focus:ring-2 focus:ring-green-500 outline-none @error('password') border-red-500 @enderror">
                        </div>
                        @error('password') <p class="text-xs text-red-500 mt-1">{{ $message }}</p> @enderror
                    </div>
                    @if(session('error'))
                    <div class="bg-red-100 text-red-700 p-4 rounded-xl mb-4">
                        {{ session('error') }}
                    </div>
                    @endif
                    <div class="flex items-center justify-between py-2">
                        <div class="flex items-center">
                            <input id="remember_me" type="checkbox" name="remember" class="rounded border-gray-300 text-green-600 focus:ring-green-500 shadow-sm">
                            <label for="remember_me" class="ml-2 text-sm text-gray-600 cursor-pointer">Se souvenir de moi</label>
                        </div>
                        @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}" class="text-sm text-green-600 font-semibold hover:text-green-700">Oublié ?</a>
                        @endif
                    </div>

                    <button type="submit" class="w-full bg-green-600 hover:bg-green-700 text-white font-bold py-3 rounded-lg transition-all flex items-center justify-center gap-2 shadow-lg shadow-green-200 active:scale-[0.98]">
                        Se connecter
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                        </svg>
                    </button>
                </form>

                <p class="mt-8 text-center text-sm text-gray-600">
                    Pas encore de compte ? <a href="{{ route('register') }}" class="text-green-600 font-bold hover:underline">Créer un compte</a>
                </p>
            </div>
        </div>
    </div>
</x-guest-layout>