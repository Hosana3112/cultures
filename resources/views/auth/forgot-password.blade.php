<x-guest-layout>
    <div class="mb-6 text-center">
        <div class="mx-auto w-12 h-12 bg-blue-100 rounded-full flex items-center justify-center mb-4">
            <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
            </svg>
        </div>
        <h2 class="text-2xl font-bold text-gray-900">Mot de passe oublié</h2>
        <p class="mt-3 text-sm text-gray-600">
            {{ __("Pas de problème ! Indiquez-nous votre adresse email et nous vous enverrons un lien de réinitialisation de mot de passe.") }}
        </p>
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4 p-4 bg-blue-50 border border-blue-200 text-blue-700 rounded-md" :status="session('status')" />

    <form method="POST" action="{{ route('password.email') }}" class="space-y-6">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Adresse Email')" />
            <x-text-input 
                id="email" 
                class="block mt-1 w-full" 
                type="email" 
                name="email" 
                :value="old('email')" 
                required 
                autofocus 
                autocomplete="email"
                placeholder="votre@email.com"
            />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Submit Button -->
        <div>
            <x-primary-button class="w-full justify-center py-3 bg-blue-600 hover:bg-blue-700 focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition duration-150 ease-in-out">
                <svg class="w-4 h-4 me-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                </svg>
                {{ __('Envoyer le lien de réinitialisation') }}
            </x-primary-button>
        </div>

        <!-- Help Text -->
        <div class="text-center">
            <p class="text-xs text-gray-500">
                📧 {{ __("Vous recevrez un email avec les instructions pour créer un nouveau mot de passe.") }}
            </p>
        </div>
    </form>

    <!-- Back to Login -->
    <div class="mt-8 text-center border-t border-gray-200 pt-6">
        <a href="{{ route('login') }}" class="inline-flex items-center text-sm font-medium text-gray-600 hover:text-gray-900 transition duration-150 ease-in-out">
            <svg class="w-4 h-4 me-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
            </svg>
            {{ __('Retour à la connexion') }}
        </a>
    </div>

    <!-- Support Contact (optionnel) -->
    <div class="mt-6 p-4 bg-gray-50 rounded-lg border border-gray-200">
        <div class="flex items-start">
            <svg class="w-5 h-5 text-gray-400 mt-0.5 me-2 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m3.536 9.192l-3.536 3.536M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            <div>
                <p class="text-sm font-medium text-gray-900">Besoin d'aide ?</p>
                <p class="text-xs text-gray-600 mt-1">
                    {{ __("Si vous ne recevez pas l'email, vérifiez vos spams ou contactez le support.") }}
                </p>
            </div>
        </div>
    </div>
</x-guest-layout>