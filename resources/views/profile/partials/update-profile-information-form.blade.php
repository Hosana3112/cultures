<section>
    <div class="card-header">
        <h2 class="card-title">
            <svg width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
            </svg>
            Informations du Profil
        </h2>
        <p class="card-description">
            Mettez à jour les informations de votre profil et votre adresse email
        </p>
    </div>

    <!-- Section Photo de Profil -->
    <div class="photo-section">
        <div class="photo-upload-area">
            <div class="photo-preview-container">
                <div class="photo-preview" id="profilePhotoPreview">
                    @if(Auth::user()->photo)
                        <img src="{{ Auth::user()->photo }}" alt="Photo de profil actuelle">
                    @else
                        <div class="photo-placeholder">
                            <svg width="40" height="40" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                            </svg>
                        </div>
                    @endif
                </div>
            </div>
            <div class="photo-upload-controls">
                <div class="file-input-wrapper">
                    <input 
                        type="file" 
                        id="profile_photo" 
                        name="photo" 
                        class="file-input"
                        accept="image/jpeg,image/png,image/jpg,image/webp"
                    >
                    <div class="photo-info">
                        Formats acceptés: JPG, PNG, WEBP • Taille maximale: 2MB
                    </div>
                </div>
            </div>
        </div>
    </div>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="profile-form">
        @csrf
        @method('patch')

        <div class="form-grid">
            <div class="form-group">
                <label for="name">Nom complet *</label>
                <input 
                    id="name" 
                    name="name" 
                    type="text" 
                    class="input-field @error('name') input-error @enderror" 
                    value="{{ old('name', $user->name) }}" 
                    required 
                    autofocus 
                    autocomplete="name"
                    placeholder="Votre nom complet"
                />
                @error('name')
                    <div class="error-message">
                        <svg width="16" height="16" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="form-group">
                <label for="email">Adresse Email *</label>
                <input 
                    id="email" 
                    name="email" 
                    type="email" 
                    class="input-field @error('email') input-error @enderror" 
                    value="{{ old('email', $user->email) }}" 
                    required 
                    autocomplete="email"
                    placeholder="votre@email.com"
                />
                @error('email')
                    <div class="error-message">
                        <svg width="16" height="16" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>

        @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
            <div class="verification-alert">
                <p>
                    {{ __('Votre adresse email n\'est pas vérifiée.') }}
                    <button form="send-verification" class="btn" style="background: transparent; color: #856404; text-decoration: underline; padding: 0;">
                        {{ __('Cliquez ici pour renvoyer l\'email de vérification.') }}
                    </button>
                </p>

                @if (session('status') === 'verification-link-sent')
                    <div class="success-message">
                        {{ __('Un nouveau lien de vérification a été envoyé à votre adresse email.') }}
                    </div>
                @endif
            </div>
        @endif

        <div class="form-actions">
            <button type="submit" class="btn btn-primary">
                <svg width="18" height="18" fill="none" stroke="currentColor" viewBox="0 0 24 24" style="margin-right: 8px;">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                </svg>
                Enregistrer les modifications
            </button>

            @if (session('status') === 'profile-updated')
                <div class="success-message">
                    {{ __('Modifications enregistrées avec succès.') }}
                </div>
            @endif
        </div>
    </form>
</section>