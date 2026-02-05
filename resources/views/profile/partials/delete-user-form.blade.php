<section class="bg-white p-8 rounded-2xl border border-red-50 border-dashed shadow-sm">
    <header class="flex items-center gap-4 mb-8">
        <div class="w-12 h-12 bg-red-100 text-red-600 rounded-xl flex items-center justify-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
            </svg>
        </div>
        <div>
            <h2 class="text-xl font-bold text-gray-900">
                {{ __('Supprimer le compte') }}
            </h2>
            <p class="mt-1 text-sm text-gray-500">
                {{ __('Une fois votre compte supprimé, toutes ses ressources et données seront définitivement effacées.') }}
            </p>
        </div>
    </header>

    <x-danger-button
        class="bg-red-600 hover:bg-red-700 px-6 py-2.5 rounded-xl font-bold transition-all shadow-lg shadow-red-100"
        x-data=""
        x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')"
    >{{ __('Supprimer définitivement') }}</x-danger-button>

    <x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
        <form method="post" action="{{ route('profile.destroy') }}" class="p-8 bg-white rounded-2xl">
            @csrf
            @method('delete')

            <h2 class="text-2xl font-black text-gray-900 tracking-tight">
                {{ __('Êtes-vous sûr de vouloir supprimer votre compte ?') }}
            </h2>

            <p class="mt-4 text-sm text-gray-600 leading-relaxed">
                {{ __('Cette action est irréversible. Veuillez saisir votre mot de passe pour confirmer que vous souhaitez supprimer définitivement votre compte LocalMart.') }}
            </p>

            <div class="mt-6 space-y-2">
                <x-input-label for="password" value="{{ __('Mot de passe') }}" class="sr-only" />

                <x-text-input
                    id="password"
                    name="password"
                    type="password"
                    class="block w-full px-4 py-3 border-gray-200 rounded-xl focus:ring-red-500 focus:border-red-500"
                    placeholder="{{ __('Votre mot de passe pour confirmer') }}"
                />

                <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-2" />
            </div>

            <div class="mt-8 flex justify-end gap-3">
                <button type="button" 
                    class="px-6 py-2.5 rounded-xl font-bold text-gray-600 hover:bg-gray-100 transition-all"
                    x-on:click="$dispatch('close')">
                    {{ __('Annuler') }}
                </button>

                <x-danger-button class="px-6 py-2.5 bg-red-600 hover:bg-red-700 rounded-xl font-bold shadow-lg shadow-red-200">
                    {{ __('Confirmer la suppression') }}
                </x-danger-button>
            </div>
        </form>
    </x-modal>
</section>