<section class="bg-white p-8 rounded-2xl border border-gray-100 shadow-sm">
    <header class="flex items-center gap-4 mb-8">
        <div class="w-12 h-12 bg-green-100 text-green-600 rounded-xl flex items-center justify-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
            </svg>
        </div>
        <div>
            <h2 class="text-xl font-bold text-gray-900">
                {{ __('Modifier le mot de passe') }}
            </h2>
            <p class="mt-1 text-sm text-gray-500">
                {{ __('Utilisez un mot de passe long et aléatoire pour garantir la sécurité de votre compte.') }}
            </p>
        </div>
    </header>

    <form method="post" action="{{ route('password.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('put')

        <div class="space-y-1">
            <x-input-label for="update_password_current_password" :value="__('Mot de passe actuel')" class="text-gray-700 font-semibold" />
            <x-text-input id="update_password_current_password" name="current_password" type="password" 
                class="mt-1 block w-full pl-4 pr-4 py-2.5 border-gray-200 rounded-xl focus:ring-green-500 focus:border-green-500 shadow-sm" 
                autocomplete="current-password" />
            <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2" />
        </div>

        <div class="space-y-1">
            <x-input-label for="update_password_password" :value="__('Nouveau mot de passe')" class="text-gray-700 font-semibold" />
            <x-text-input id="update_password_password" name="password" type="password" 
                class="mt-1 block w-full pl-4 pr-4 py-2.5 border-gray-200 rounded-xl focus:ring-green-500 focus:border-green-500 shadow-sm" 
                autocomplete="new-password" />
            <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" />
        </div>

        <div class="space-y-1">
            <x-input-label for="update_password_password_confirmation" :value="__('Confirmer le mot de passe')" class="text-gray-700 font-semibold" />
            <x-text-input id="update_password_password_confirmation" name="password_confirmation" type="password" 
                class="mt-1 block w-full pl-4 pr-4 py-2.5 border-gray-200 rounded-xl focus:ring-green-500 focus:border-green-500 shadow-sm" 
                autocomplete="new-password" />
            <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center gap-4 pt-4 border-t border-gray-50">
            <button type="submit" class="bg-green-600 hover:bg-green-700 text-white font-bold py-2.5 px-6 rounded-xl transition-all shadow-lg shadow-green-100 active:scale-[0.98]">
                {{ __('Mettre à jour') }}
            </button>

            @if (session('status') === 'password-updated')
                <div 
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 3000)"
                    class="flex items-center gap-2 text-sm text-green-600 font-bold"
                >
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                    </svg>
                    {{ __('Mot de passe mis à jour.') }}
                </div>
            @endif
        </div>
    </form>
</section>