<x-guest-layout>
    <div class="min-h-[450px] flex items-center justify-center p-4">
        <div class="w-full max-w-md bg-white p-8 rounded-[2rem] shadow-xl border border-gray-50">
            
            <div class="mb-8 text-center">
                <div class="w-16 h-16 bg-green-50 text-green-600 rounded-2xl flex items-center justify-center mx-auto mb-4 shadow-sm">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 7a2 2 0 012 2m4 0a6 6 0 01-7.743 5.743L11 17H9v2H7v2H4a1 1 0 01-1-1v-2.586a1 1 0 01.293-.707l5.964-5.964A6 6 0 1121 9z" />
                    </svg>
                </div>
                <h2 class="text-2xl font-black text-gray-900 tracking-tight">{{ __('Mot de passe oublié ?') }}</h2>
                <p class="text-sm text-gray-500 mt-3 leading-relaxed px-2">
                    {{ __('Pas de problème. Indiquez-nous votre adresse e-mail et nous vous enverrons un lien de réinitialisation.') }}
                </p>
            </div>

            <div class="mb-4">
                <x-auth-session-status :status="session('status')" class="p-4 bg-green-50 text-green-700 rounded-xl text-sm font-bold border border-green-100" />
            </div>

            <form method="POST" action="{{ route('password.email') }}" class="space-y-6">
                @csrf

                <div class="space-y-1">
                    <x-input-label for="email" :value="__('Adresse Email')" class="text-gray-700 font-bold ml-1" />
                    <x-text-input id="email" 
                                class="block mt-1 w-full px-4 py-3 border-gray-100 bg-gray-50 rounded-xl focus:ring-green-500 focus:border-green-500 transition-all placeholder-gray-400" 
                                type="email" 
                                name="email" 
                                :value="old('email')" 
                                required 
                                autofocus 
                                placeholder="votre@email.com" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <div class="flex flex-col gap-4">
                    <button type="submit" class="w-full bg-green-600 hover:bg-green-700 text-white font-black py-4 rounded-xl transition-all shadow-lg shadow-green-100 active:scale-[0.98] uppercase tracking-wider text-sm">
                        {{ __('Envoyer le lien') }}
                    </button>
                    
                    <a href="{{ route('login') }}" class="text-center text-sm font-bold text-gray-400 hover:text-green-600 transition-colors flex items-center justify-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                        </svg>
                        {{ __('Retour à la connexion') }}
                    </a>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>