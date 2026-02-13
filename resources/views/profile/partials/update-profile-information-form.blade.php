<section class="bg-white p-8 rounded-2xl border border-gray-100 shadow-sm">
    <header class="flex items-center gap-4 mb-8">
        <div class="w-12 h-12 bg-green-100 text-green-600 rounded-xl flex items-center justify-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
            </svg>
        </div>
        <div>
            <h2 class="text-xl font-bold text-gray-900">
                {{ __('Informations du Profil') }}
            </h2>
            <p class="mt-1 text-sm text-gray-500">
                {{ __("Mettez à jour vos informations personnelles et votre adresse e-mail.") }}
            </p>
        </div>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')

        <div class="space-y-1">
            <x-input-label for="name" :value="__('Nom Complet')" class="text-gray-700 font-semibold" />
            <div class="relative">
                <x-text-input id="name" name="name" type="text" 
                    class="mt-1 block w-full pl-4 pr-4 py-2.5 border-gray-200 rounded-xl focus:ring-green-500 focus:border-green-500 shadow-sm" 
                    :value="old('name', $user->name)" required autofocus autocomplete="name" />
            </div>
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

        <div class="space-y-1">
            <x-input-label for="email" :value="__('Adresse Email')" class="text-gray-700 font-semibold" />
            <div class="relative">
                <x-text-input id="email" name="email" type="email" 
                    class="mt-1 block w-full pl-4 pr-4 py-2.5 border-gray-200 rounded-xl focus:ring-green-500 focus:border-green-500 shadow-sm" 
                    :value="old('email', $user->email)" required autocomplete="username" />
            </div>
            <x-input-error class="mt-2" :messages="$errors->get('email')" />

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div class="mt-4 p-4 bg-amber-50 rounded-xl border border-amber-100">
                    <p class="text-sm text-amber-800 flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                        </svg>
                        {{ __('Votre adresse e-mail n\'est pas vérifiée.') }}
                    </p>

                    <button form="send-verification" class="mt-2 text-sm font-bold text-green-600 hover:text-green-700 underline focus:outline-none">
                        {{ __('Cliquez ici pour renvoyer l\'e-mail de vérification.') }}
                    </button>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 font-medium text-sm text-green-600">
                            {{ __('Un nouveau lien de vérification a été envoyé.') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>

        <div class="flex items-center gap-4 pt-4 border-t border-gray-50">
            <button type="submit" class="bg-green-600 hover:bg-green-700 text-white font-bold py-2.5 px-6 rounded-xl transition-all shadow-lg shadow-green-100 active:scale-[0.98]">
                {{ __('Enregistrer les modifications') }}
            </button>

            @if (session('status') === 'profile-updated')
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
                    {{ __('Enregistré.') }}
                </div>
            @endif
        </div>
    </form>
</section>