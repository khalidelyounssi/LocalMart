<x-guest-layout>
    <div class="min-h-[500px] flex items-center justify-center p-4">
        <div class="w-full max-w-md bg-white p-8 rounded-[2.5rem] shadow-2xl border border-gray-50">
            
            <div class="mb-8 text-center">
                <div class="w-16 h-16 bg-green-100 text-green-600 rounded-2xl flex items-center justify-center mx-auto mb-4 shadow-inner">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                    </svg>
                </div>
                <h2 class="text-2xl font-black text-gray-900 tracking-tight">{{ __('Nouveau Mot de Passe') }}</h2>
                <p class="text-sm text-gray-500 mt-2">
                    {{ __('Choisissez un mot de passe fort pour sécuriser votre compte.') }}
                </p>
            </div>

            <form method="POST" action="{{ route('password.store') }}" class="space-y-5">
                @csrf

                <input type="hidden" name="token" value="{{ $request->route('token') }}">

                <div class="space-y-1">
                    <x-input-label for="email" :value="__('Adresse Email')" class="font-bold text-gray-700 ml-1" />
                    <x-text-input id="email" 
                                class="block mt-1 w-full px-4 py-3 bg-gray-50 border-transparent rounded-xl focus:bg-white focus:ring-green-500 focus:border-green-500 transition-all" 
                                type="email" name="email" 
                                :value="old('email', $request->email)" 
                                required autofocus autocomplete="username" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <div class="space-y-1">
                    <x-input-label for="password" :value="__('Nouveau Mot de Passe')" class="font-bold text-gray-700 ml-1" />
                    <x-text-input id="password" 
                                class="block mt-1 w-full px-4 py-3 bg-gray-50 border-transparent rounded-xl focus:bg-white focus:ring-green-500 focus:border-green-500 transition-all" 
                                type="password" 
                                name="password" 
                                required autocomplete="new-password" 
                                placeholder="••••••••" />
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <div class="space-y-1">
                    <x-input-label for="password_confirmation" :value="__('Confirmer le Mot de Passe')" class="font-bold text-gray-700 ml-1" />
                    <x-text-input id="password_confirmation" 
                                class="block mt-1 w-full px-4 py-3 bg-gray-50 border-transparent rounded-xl focus:bg-white focus:ring-green-500 focus:border-green-500 transition-all"
                                type="password"
                                name="password_confirmation" 
                                required autocomplete="new-password" 
                                placeholder="••••••••" />
                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                </div>

                <div class="pt-2">
                    <button type="submit" class="w-full bg-green-600 hover:bg-green-700 text-white font-black py-4 rounded-xl transition-all shadow-lg shadow-green-100 active:scale-[0.98] uppercase tracking-widest text-sm">
                        {{ __('Réinitialiser') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>