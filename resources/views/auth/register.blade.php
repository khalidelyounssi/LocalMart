<x-guest-layout>
<div class="min-h-screen bg-white flex font-sans text-slate-900">
    <div class="hidden lg:flex lg:w-1/2 bg-green-600 relative overflow-hidden">
        <div class="absolute inset-0 opacity-30" style="background-image: url('data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iNjAiIGhlaWdodD0iNjAiIHZpZXdCb3g9IjAgMCA2MCA2MCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj48ZyBmaWxsPSJub25lIiBmaWxsLXJ1bGU9ImV2ZW5vZGQiPjxnIGZpbGw9IiNmZmZmZmYiIGZpbGwtb3BhY2l0eT0iMC4xIj48cGF0aCBkPSJNMzYgMzRjMC0yIDItNCAyLTRzMiAyIDIgNC0yIDQtMiA0LTItMi0yLTR6Ii8+PC9nPjwvZz48L3N2Zz4=')"></div>
        <div class="relative z-10 flex flex-col justify-center px-12 text-white">
            <div class="flex items-center gap-3 mb-8">
                <div class="w-12 h-12 bg-white/20 rounded-xl flex items-center justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-7 h-7 text-white" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M11 20A7 7 0 0 1 9.8 6.1C15.5 5 17 4.48 19 2c1 2 2 4.18 2 8 0 5.5-4.78 10-10 10Z"/>
                        <path d="M2 21c0-3 1.85-5.36 5.08-6C10 14.5 10.5 13.8 10.5 13.5s-.5-1-1.5-1.5c-3-1.5-3.5-5.5-3-8.5"/>
                    </svg>
                </div>
                <span class="text-3xl font-bold font-display tracking-tight">LocalMart</span>
            </div>
            <h1 class="text-4xl font-bold leading-tight mb-4 text-pretty">Rejoignez notre communauté locale</h1>
            <p class="text-lg text-white/80 max-w-md">Créez votre compte aujourd'hui pour accéder au catalogue et soutenir les producteurs de votre ville.</p>

            <div class="mt-12 space-y-4">
                <div class="flex items-center gap-4 bg-white/10 rounded-2xl p-4 border border-white/10 backdrop-blur-sm">
                    <div class="w-10 h-10 bg-white/20 rounded-lg flex items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M6 2 3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4Z"/><path d="M3 6h18"/><path d="M16 10a4 4 0 0 1-8 0"/>
                        </svg>
                    </div>
                    <div>
                        <div class="font-semibold text-white">Achetez localement</div>
                        <div class="text-sm text-white/70">Accédez à des produits frais et uniques</div>
                    </div>
                </div>
                <div class="flex items-center gap-4 bg-white/10 rounded-2xl p-4 border border-white/10 backdrop-blur-sm">
                    <div class="w-10 h-10 bg-white/20 rounded-lg flex items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M3 9h18v10a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V9Z"/><path d="M3 9l9-7 9 7"/><path d="M9 22V12h6v10"/></svg>
                    </div>
                    <div>
                        <div class="font-semibold text-white">Devenez Vendeur</div>
                        <div class="text-sm text-white/70">Lancez votre boutique après validation</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="w-full lg:w-1/2 flex items-center justify-center p-6 sm:p-12 bg-gray-50">
        <div class="w-full max-w-md bg-white p-8 rounded-2xl shadow-xl border border-gray-100">
            <div class="mb-8 text-center">
                <h2 class="text-2xl font-bold text-gray-900">Créer un compte</h2>
                <p class="text-gray-600">Commencez l'aventure avec LocalMart</p>
            </div>

            <form method="POST" action="{{ route('register') }}" class="space-y-4">
                @csrf

                <div class="space-y-1">
                    <label for="name" class="text-sm font-medium text-gray-700">Nom Complet</label>
                    <input id="name" type="text" name="name" value="{{ old('name') }}"  autofocus placeholder="Ex: Ahmed Alaoui"
                        class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-green-500 outline-none transition-all @error('name') border-red-500 @enderror">
                    @error('name') <p class="text-xs text-red-500 mt-1">{{ $message }}</p> @enderror
                </div>

                <div class="space-y-1">
                    <label for="email" class="text-sm font-medium text-gray-700">Adresse Email</label>
                    <input id="email" type="email" name="email" value="{{ old('email') }}"  placeholder="nom@exemple.com"
                        class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-green-500 outline-none transition-all @error('email') border-red-500 @enderror">
                    @error('email') <p class="text-xs text-red-500 mt-1">{{ $message }}</p> @enderror
                </div>

                <div class="space-y-1">
                    <label for="password" class="text-sm font-medium text-gray-700">Mot de passe</label>
                    <input id="password" type="password" name="password"  placeholder="••••••••"
                        class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-green-500 outline-none transition-all @error('password') border-red-500 @enderror">
                    @error('password') <p class="text-xs text-red-500 mt-1">{{ $message }}</p> @enderror
                </div>

                <div class="space-y-1">
                    <label for="password_confirmation" class="text-sm font-medium text-gray-700">Confirmer le mot de passe</label>
                    <input id="password_confirmation" type="password" name="password_confirmation"  placeholder="••••••••"
                        class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-green-500 outline-none transition-all">
                </div>

                <div class="flex items-start gap-2 py-2">
                    <input type="checkbox" name="terms" id="terms"  class="mt-1 rounded border-gray-300 text-green-600 focus:ring-green-500 shadow-sm">
                    <label for="terms" class="text-sm text-gray-600">
                        J'accepte les <a href="#" class="text-green-600 font-semibold hover:underline">Conditions d'utilisation</a> et la <a href="#" class="text-green-600 font-semibold hover:underline">Politique de confidentialité</a>
                    </label>
                </div>

                <button type="submit" class="w-full bg-green-600 hover:bg-green-700 text-white font-bold py-3 rounded-lg transition-all flex items-center justify-center gap-2 shadow-lg shadow-green-200 active:scale-[0.98]">
                    Créer mon compte
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                    </svg>
                </button>
            </form>

            <p class="mt-8 text-center text-sm text-gray-600">
                Vous avez déjà un compte ? <a href="{{ route('login') }}" class="text-green-600 font-bold hover:underline">Se connecter</a>
            </p>
        </div>
    </div>
</div>
</x-guest-layout>   