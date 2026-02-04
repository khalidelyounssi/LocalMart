<x-guest-layout>
    <div class="min-h-[400px] flex items-center justify-center p-4">
        <div class="w-full max-w-md bg-white p-8 rounded-2xl shadow-xl border border-gray-100">
            
            <div class="mb-8 text-center">
                <div class="w-16 h-16 bg-green-100 text-green-600 rounded-2xl flex items-center justify-center mx-auto mb-4 shadow-sm">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                    </svg>
                </div>
                <h2 class="text-2xl font-bold text-gray-900">{{ __('Zone Sécurisée') }}</h2>
                <p class="text-sm text-gray-500 mt-2 leading-relaxed">
                    {{ __('Il s\'agit d\'une zone sécurisée. Veuillez confirmer votre mot de passe avant de continuer.') }}
                </p>
            </div>

            <form method="POST" action="{{ route('password.confirm') }}" class="space-y-6">
                @csrf

                <div class="space-y-1">
                    <x-input-label for="password" :value="__('Mot de passe')" class="text-gray-700 font-semibold" />

                    <x-text-input id="password" 
                                    class="block mt-1 w-full px-4 py-3 border-gray-200 rounded-xl focus:ring-green-500 focus:border-green-500 shadow-sm transition-all"
                                    type="password"
                                    name="password"
                                    required 
                                    placeholder="••••••••"
                                    autocomplete="current-password" />

                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <div class="flex flex-col gap-3">
                    <button type="submit" class="w-full bg-green-600 hover:bg-green-700 text-white font-bold py-3 rounded-xl transition-all shadow-lg shadow-green-100 active:scale-[0.98] flex items-center justify-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                        </svg>
                        {{ __('Confirmer') }}
                    </button>
                    
                    <a href="{{ url()->previous() }}" class="text-center text-sm font-medium text-gray-500 hover:text-gray-700 transition-colors">
                        {{ __('Retourner') }}
                    </a>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>