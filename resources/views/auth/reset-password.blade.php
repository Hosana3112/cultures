<x-guest-layout>
    <div class="mb-6 text-center">
        <div class="mx-auto w-12 h-12 bg-green-100 rounded-full flex items-center justify-center mb-4">
            <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 7a2 2 0 012 2m4 0a6 6 0 01-7.743 5.743L11 17H9v2H7v2H4a1 1 0 01-1-1v-2.586a1 1 0 01.293-.707l5.964-5.964A6 6 0 1121 9z" />
            </svg>
        </div>
        <h2 class="text-2xl font-bold text-gray-900">Nouveau mot de passe</h2>
        <p class="mt-3 text-sm text-gray-600">
            {{ __('Créez un nouveau mot de passe sécurisé pour votre compte.') }}
        </p>
    </div>

    <form method="POST" action="{{ route('password.store') }}" class="space-y-6">
        @csrf

        <!-- Password Reset Token -->
        <input type="hidden" name="token" value="{{ $request->route('token') }}">

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Adresse Email')" />
            <x-text-input 
                id="email" 
                class="block mt-1 w-full" 
                type="email" 
                name="email" 
                :value="old('email', $request->email)" 
                required 
                autofocus 
                autocomplete="email"
                placeholder="votre@email.com"
            />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div>
            <x-input-label for="password" :value="__('Nouveau mot de passe')" />
            <x-text-input 
                id="password" 
                class="block mt-1 w-full" 
                type="password" 
                name="password" 
                required 
                autocomplete="new-password"
                placeholder="Minimum 8 caractères"
            />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
            
            <!-- Password Requirements -->
            <div class="mt-2 text-xs text-gray-500">
                <p>🔒 Votre mot de passe doit contenir :</p>
                <ul class="mt-1 space-y-1">
                    <li class="flex items-center">
                        <span class="w-2 h-2 bg-gray-300 rounded-full me-2"></span>
                        Au moins 8 caractères
                    </li>
                    <li class="flex items-center">
                        <span class="w-2 h-2 bg-gray-300 rounded-full me-2"></span>
                        Lettres majuscules et minuscules
                    </li>
                    <li class="flex items-center">
                        <span class="w-2 h-2 bg-gray-300 rounded-full me-2"></span>
                        Chiffres et caractères spéciaux
                    </li>
                </ul>
            </div>
        </div>

        <!-- Confirm Password -->
        <div>
            <x-input-label for="password_confirmation" :value="__('Confirmer le mot de passe')" />
            <x-text-input 
                id="password_confirmation" 
                class="block mt-1 w-full"
                type="password"
                name="password_confirmation" 
                required 
                autocomplete="new-password"
                placeholder="Répétez le nouveau mot de passe"
            />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <!-- Submit Button -->
        <div>
            <x-primary-button class="w-full justify-center py-3 bg-green-600 hover:bg-green-700 focus:ring-2 focus:ring-green-500 focus:ring-offset-2 transition duration-150 ease-in-out">
                <svg class="w-4 h-4 me-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                </svg>
                {{ __('Réinitialiser le mot de passe') }}
            </x-primary-button>
        </div>

        <!-- Success Message -->
        <div class="text-center">
            <p class="text-xs text-gray-500">
                ✅ {{ __('Votre mot de passe sera mis à jour immédiatement après confirmation.') }}
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

    <!-- Security Tips -->
    <div class="mt-6 p-4 bg-blue-50 rounded-lg border border-blue-200">
        <div class="flex items-start">
            <svg class="w-5 h-5 text-blue-400 mt-0.5 me-2 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
            </svg>
            <div>
                <p class="text-sm font-medium text-blue-900">Conseil de sécurité</p>
                <p class="text-xs text-blue-700 mt-1">
                    {{ __("Utilisez un mot de passe unique que vous n'utilisez sur aucun autre site.") }}
                </p>
            </div>
        </div>
    </div>
</x-guest-layout>