<x-guest-layout>
    <div class="mb-6 text-center">
        <div class="mx-auto w-16 h-16 bg-orange-100 rounded-full flex items-center justify-center mb-4">
            <svg class="w-8 h-8 text-orange-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
            </svg>
        </div>
        <h2 class="text-2xl font-bold text-gray-900">Vérification requise</h2>
        <p class="mt-3 text-sm text-gray-600">
            {{ __("Merci pour votre inscription ! Avant de commencer, veuillez vérifier votre adresse email.") }}
        </p>
    </div>

    <div class="mb-6 p-4 bg-blue-50 border border-blue-200 rounded-lg">
        <div class="flex">
            <svg class="w-5 h-5 text-blue-500 mt-0.5 me-3 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            <div class="text-sm text-blue-700">
                <p class="font-medium">Vérifiez votre boîte email</p>
                <p class="mt-1">
                    {{ __("Nous venons de vous envoyer un lien de vérification. Cliquez sur le lien dans l'email pour activer votre compte. Si vous n'avez pas reçu l'email, nous pouvons vous en renvoyer un.") }}
                </p>
            </div>
        </div>
    </div>

    @if (session('status') == 'verification-link-sent')
        <div class="mb-6 p-4 bg-green-50 border border-green-200 rounded-lg">
            <div class="flex">
                <svg class="w-5 h-5 text-green-500 mt-0.5 me-3 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <div class="text-sm text-green-700">
                    <p class="font-medium">Email envoyé !</p>
                    <p class="mt-1">
                        {{ __("Un nouveau lien de vérification a été envoyé à l'adresse email que vous avez fournie lors de l'inscription.") }}
                    </p>
                </div>
            </div>
        </div>
    @endif

    <div class="space-y-4">
        <!-- Resend Verification Email -->
        <form method="POST" action="{{ route('verification.send') }}">
            @csrf

            <div>
                <x-primary-button class="w-full justify-center py-3 bg-orange-600 hover:bg-orange-700 focus:ring-2 focus:ring-orange-500 focus:ring-offset-2 transition duration-150 ease-in-out">
                    <svg class="w-4 h-4 me-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                    </svg>
                    {{ __('Renvoyer l\'email de vérification') }}
                </x-primary-button>
            </div>
        </form>

        <!-- Logout -->
        <form method="POST" action="{{ route('logout') }}">
            @csrf

            <button type="submit" class="w-full text-center py-2 px-4 border border-gray-300 rounded-md text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-orange-500 transition duration-150 ease-in-out">
                <svg class="w-4 h-4 inline me-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                </svg>
                {{ __('Se déconnecter') }}
            </button>
        </form>
    </div>

    <!-- Help Section -->
    <div class="mt-8 p-4 bg-gray-50 rounded-lg border border-gray-200">
        <div class="flex items-start">
            <svg class="w-5 h-5 text-gray-400 mt-0.5 me-2 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            <div>
                <p class="text-sm font-medium text-gray-900">Vous ne recevez pas l'email ?</p>
                <ul class="text-xs text-gray-600 mt-1 space-y-1">
                    <li>• Vérifiez vos courriers indésirables (spam)</li>
                    <li>• Assurez-vous que l'adresse email est correcte</li>
                    <li>• Attendez quelques minutes avant de renvoyer</li>
                </ul>
            </div>
        </div>
    </div>

    <!-- Support Contact -->
    <div class="mt-4 text-center">
        <p class="text-xs text-gray-500">
            {{ __("Besoin d'aide ?") }}
            <a href="mailto:support@example.com" class="text-orange-600 hover:text-orange-500 font-medium">
                {{ __("Contactez le support") }}
            </a>
        </p>
    </div>
</x-guest-layout>