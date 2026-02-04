<x-guest-layout>
    <div class="min-h-[450px] flex items-center justify-center p-4">
        <div class="w-full max-w-md bg-white p-8 rounded-[2rem] shadow-xl border border-gray-50 text-center">
            
            <div class="mb-6">
                <div class="w-20 h-20 bg-green-50 text-green-600 rounded-3xl flex items-center justify-center mx-auto shadow-sm relative">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-10 h-10" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                    </svg>
                    <span class="absolute top-0 right-0 flex h-4 w-4">
                        <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-green-400 opacity-75"></span>
                        <span class="relative inline-flex rounded-full h-4 w-4 bg-green-500"></span>
                    </span>
                </div>
            </div>

            <h2 class="text-2xl font-black text-gray-900 tracking-tight mb-4">{{ __('Vérifiez votre e-mail') }}</h2>
            
            <p class="text-sm text-gray-500 leading-relaxed mb-8 px-2">
                {{ __('Merci pour votre inscription ! Avant de commencer, pourriez-vous vérifier votre adresse e-mail en cliquant sur le lien que nous venons de vous envoyer ?') }}
            </p>

            @if (session('status') == 'verification-link-sent')
                <div class="mb-8 p-4 bg-green-50 rounded-2xl border border-green-100 text-sm font-bold text-green-700 animate-pulse">
                    {{ __('Un nouveau lien de vérification a été envoyé à l\'adresse e-mail fournie.') }}
                </div>
            @endif

            <div class="flex flex-col gap-4">
                <form method="POST" action="{{ route('verification.send') }}">
                    @csrf
                    <button type="submit" class="w-full bg-green-600 hover:bg-green-700 text-white font-black py-4 rounded-xl transition-all shadow-lg shadow-green-100 active:scale-[0.98] uppercase tracking-wider text-sm">
                        {{ __('Renvoyer l\'e-mail') }}
                    </button>
                </form>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="text-sm font-bold text-gray-400 hover:text-red-500 transition-colors flex items-center justify-center gap-2 mx-auto">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                        </svg>
                        {{ __('Se déconnecter') }}
                    </button>
                </form>
            </div>
        </div>
    </div>
</x-guest-layout>