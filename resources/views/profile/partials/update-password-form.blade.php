<section>
    <div class="card-header">
        <h2 class="card-title">
            <svg width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
            </svg>
            Mot de passe
        </h2>
        <p class="card-description">
            Assurez-vous que votre compte utilise un mot de passe long et aléatoire pour rester sécurisé
        </p>
    </div>

    <form method="post" action="{{ route('password.update') }}" class="password-form">
        @csrf
        @method('put')

        <div class="form-grid">
            <div class="form-group">
                <label for="update_password_current_password">Mot de passe actuel *</label>
                <input 
                    id="update_password_current_password" 
                    name="current_password" 
                    type="password" 
                    class="input-field @error('current_password', 'updatePassword') input-error @enderror" 
                    autocomplete="current-password"
                    placeholder="Votre mot de passe actuel"
                />
                @error('current_password', 'updatePassword')
                    <div class="error-message">
                        <svg width="16" height="16" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="form-group">
                <label for="update_password_password">Nouveau mot de passe *</label>
                <input 
                    id="update_password_password" 
                    name="password" 
                    type="password" 
                    class="input-field @error('password', 'updatePassword') input-error @enderror" 
                    autocomplete="new-password"
                    placeholder="Minimum 8 caractères"
                />
                @error('password', 'updatePassword')
                    <div class="error-message">
                        <svg width="16" height="16" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="form-group">
                <label for="update_password_password_confirmation">Confirmer le mot de passe *</label>
                <input 
                    id="update_password_password_confirmation" 
                    name="password_confirmation" 
                    type="password" 
                    class="input-field" 
                    autocomplete="new-password"
                    placeholder="Répétez le nouveau mot de passe"
                />
            </div>
        </div>

        <div class="form-actions">
            <button type="submit" class="btn btn-primary">
                <svg width="18" height="18" fill="none" stroke="currentColor" viewBox="0 0 24 24" style="margin-right: 8px;">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                </svg>
                Mettre à jour le mot de passe
            </button>

            @if (session('status') === 'password-updated')
                <div class="success-message">
                    {{ __('Mot de passe mis à jour avec succès.') }}
                </div>
            @endif
        </div>
    </form>
</section>