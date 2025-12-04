<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription - Culture Bénin</title>
    <style>
        :root {
            --primary-color: #2d5016;
            --primary-hover: #1f3510;
            --accent-color: #d4af37;
            --secondary-color: #e8f5e8;
            --text-color: #1a331c;
            --border-color: #c8e6c9;
            --error-color: #dc2626;
            --success-color: #16a34a;
            --background-gradient: linear-gradient(135deg, #f0f9f0 0%, #e8f5e8 50%, #d4edda 100%);
        }
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, sans-serif;
        }
        
        html, body {
            height: 100%;
            overflow: hidden;
        }
        
        body {
            background: var(--background-gradient);
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
            position: relative;
        }
        
        body::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: radial-gradient(circle, rgba(45, 80, 22, 0.03) 0%, transparent 70%);
            animation: float 20s ease-in-out infinite;
        }
        
        @keyframes float {
            0%, 100% { transform: translate(0, 0) rotate(0deg); }
            33% { transform: translate(30px, -30px) rotate(120deg); }
            66% { transform: translate(-20px, 20px) rotate(240deg); }
        }
        
        .container {
            width: 100%;
            max-width: 900px;
            position: relative;
            z-index: 2;
            height: 100%;
            display: flex;
            align-items: center;
        }
        
        .card {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            box-shadow: 
                0 20px 40px rgba(45, 80, 22, 0.1),
                0 8px 24px rgba(45, 80, 22, 0.08),
                inset 0 1px 0 rgba(255, 255, 255, 0.4);
            padding: 40px;
            width: 100%;
            border: 1px solid rgba(255, 255, 255, 0.8);
            position: relative;
            max-height: 95vh;
            display: flex;
            flex-direction: column;
        }
        
        .card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(90deg, var(--primary-color), var(--accent-color));
        }
        
        .logo-container {
            text-align: center;
            margin-bottom: 25px;
            flex-shrink: 0;
        }
        
        .logo {
            width: 100px;
            height: 100px;
            margin: 0 auto 15px;
            background: white;
            border-radius: 50%;
            padding: 12px;
            box-shadow: 
                0 8px 24px rgba(45, 80, 22, 0.12),
                inset 0 2px 4px rgba(255, 255, 255, 0.8);
            border: 2px solid var(--border-color);
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        .logo img {
            max-width: 100%;
            max-height: 100%;
            filter: drop-shadow(0 4px 8px rgba(45, 80, 22, 0.2));
        }
        
        .title {
            font-size: 28px;
            font-weight: 800;
            color: var(--primary-color);
            margin-bottom: 5px;
            text-align: center;
            background: linear-gradient(135deg, var(--primary-color), var(--accent-color));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
        
        .subtitle {
            color: #64748b;
            text-align: center;
            margin-bottom: 25px;
            font-size: 16px;
            font-weight: 500;
        }
        
        .form-content {
            flex: 1;
            overflow-y: auto;
            padding-right: 10px;
            margin-bottom: 20px;
        }
        
        /* Style personnalisé pour la barre de défilement INTERNE */
        .form-content::-webkit-scrollbar {
            width: 8px;
        }
        
        .form-content::-webkit-scrollbar-track {
            background: #f1f1f1;
            border-radius: 10px;
        }
        
        .form-content::-webkit-scrollbar-thumb {
            background: var(--primary-color);
            border-radius: 10px;
        }
        
        .form-content::-webkit-scrollbar-thumb:hover {
            background: var(--primary-hover);
        }
        
        .form-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
            margin-bottom: 20px;
        }
        
        .form-group {
            margin-bottom: 18px;
        }
        
        .full-width {
            grid-column: 1 / -1;
        }
        
        .photo-section {
            grid-column: 1 / -1;
            background: var(--secondary-color);
            border-radius: 15px;
            padding: 25px;
            margin-bottom: 20px;
            border: 2px dashed var(--border-color);
        }
        
        .photo-section-title {
            font-size: 18px;
            font-weight: 600;
            color: var(--primary-color);
            margin-bottom: 15px;
            display: flex;
            align-items: center;
            gap: 8px;
        }
        
        .photo-section-title svg {
            width: 20px;
            height: 20px;
        }
        
        .photo-upload-area {
            display: flex;
            gap: 25px;
            align-items: flex-start;
        }
        
        .photo-preview-container {
            flex-shrink: 0;
            width: 140px;
            text-align: center;
        }
        
        .photo-preview {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            border: 3px solid var(--border-color);
            background: white;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 10px;
            overflow: hidden;
        }
        
        .photo-preview img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        
        .photo-placeholder {
            width: 100%;
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #f8f9fa;
            color: #6c757d;
            font-size: 14px;
            text-align: center;
            padding: 10px;
        }
        
        .photo-upload-controls {
            flex: 1;
        }
        
        .file-input-wrapper {
            position: relative;
            margin-bottom: 15px;
        }
        
        .file-input {
            width: 100%;
            padding: 12px 16px;
            border: 2px solid var(--border-color);
            border-radius: 8px;
            background: white;
            font-size: 14px;
            cursor: pointer;
        }
        
        .file-input::file-selector-button {
            background: var(--primary-color);
            color: white;
            border: none;
            padding: 8px 16px;
            border-radius: 6px;
            margin-right: 10px;
            cursor: pointer;
            font-size: 14px;
        }
        
        .photo-info {
            font-size: 12px;
            color: #64748b;
            margin-top: 5px;
        }
        
        label {
            display: block;
            font-size: 14px;
            font-weight: 600;
            color: var(--text-color);
            margin-bottom: 8px;
        }
        
        .input-field {
            width: 100%;
            padding: 12px 16px;
            border: 2px solid var(--border-color);
            border-radius: 8px;
            font-size: 14px;
            transition: all 0.3s ease;
            background-color: white;
        }
        
        .input-field:focus {
            outline: none;
            border-color: var(--primary-color);
            box-shadow: 0 0 0 3px rgba(45, 80, 22, 0.1);
        }
        
        .input-error {
            border-color: var(--error-color);
            background-color: #fef2f2;
        }
        
        .error-message {
            color: var(--error-color);
            font-size: 12px;
            margin-top: 5px;
            display: flex;
            align-items: center;
            gap: 4px;
        }
        
        .form-actions {
            flex-shrink: 0;
            padding-top: 20px;
            border-top: 1px solid var(--border-color);
        }
        
        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 15px 30px;
            background: linear-gradient(135deg, var(--primary-color), var(--primary-hover));
            color: white;
            border: none;
            border-radius: 10px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            width: 100%;
            box-shadow: 0 8px 24px rgba(45, 80, 22, 0.3);
        }
        
        .btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 12px 32px rgba(45, 80, 22, 0.4);
        }
        
        .form-footer {
            text-align: center;
            margin-top: 15px;
        }
        
        .link {
            color: var(--primary-color);
            text-decoration: none;
            font-size: 14px;
            font-weight: 600;
            transition: all 0.3s ease;
        }
        
        .link:hover {
            color: var(--primary-hover);
            text-decoration: underline;
        }

        @media (max-width: 768px) {
            body {
                padding: 10px;
            }
            
            .card {
                max-height: 98vh;
                padding: 25px;
            }
            
            .form-grid {
                grid-template-columns: 1fr;
                gap: 15px;
            }
            
            .photo-upload-area {
                flex-direction: column;
                gap: 15px;
            }
            
            .photo-preview-container {
                width: 100%;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="card">
            <div class="logo-container">
                <div class="logo">
                    <img src="{{URL::asset('adminlte/img/logoculture__2_-removebg-preview.png')}}" alt="Culture Bénin">
                </div>
                <h1 class="title">Rejoindre  BéninCulture </h1>
                <p class="subtitle">Créez votre compte pour découvrir notre patrimoine culturel</p>
            </div>
            
            <div class="form-content">
                <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data" id="registrationForm">
                    @csrf
                    
                    <!-- Section Photo de Profil -->
                    <div class="photo-section">
                        <div class="photo-section-title">
                            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                            </svg>
                            Photo de Profil
                        </div>
                        <div class="photo-upload-area">
                            <div class="photo-preview-container">
                                <div class="photo-preview" id="photoPreview">
                                    <div class="photo-placeholder">
                                        Aucune photo sélectionnée
                                    </div>
                                </div>
                                <div class="photo-info" id="fileInfo"></div>
                            </div>
                            <div class="photo-upload-controls">
                                <div class="file-input-wrapper">
                                    <input 
                                        type="file" 
                                        id="photo_file" 
                                        name="photo_file" 
                                        class="file-input"
                                        accept="image/jpeg,image/png,image/jpg,image/webp"
                                    >
                                    <div class="photo-info">
                                        Formats acceptés: JPG, PNG, WEBP • Taille maximale: 2MB
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input 
                                        type="text" 
                                        id="photo_description" 
                                        name="photo_description" 
                                        class="input-field"
                                        placeholder="Description de la photo (optionnel)"
                                    >
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-grid">
                        <!-- Prénom -->
                        <div class="form-group">
                            <label for="prenom">Prénom *</label>
                            <input 
                                id="prenom" 
                                class="input-field" 
                                type="text" 
                                name="prenom" 
                                value="{{ old('prenom') }}" 
                                required 
                                autofocus 
                                placeholder="Votre prénom" 
                            />
                            <div class="error-message" id="prenom-error"></div>
                        </div>
                        
                        <!-- Nom -->
                        <div class="form-group">
                            <label for="nom">Nom *</label>
                            <input 
                                id="nom" 
                                class="input-field" 
                                type="text" 
                                name="nom" 
                                value="{{ old('nom') }}" 
                                required 
                                placeholder="Votre nom de famille"
                            />
                            <div class="error-message" id="nom-error"></div>
                        </div>
                        
                        <!-- Email -->
                        <div class="form-group full-width">
                            <label for="email">Adresse Email *</label>
                            <input 
                                id="email" 
                                class="input-field" 
                                type="email" 
                                name="email" 
                                value="{{ old('email') }}" 
                                required 
                                placeholder="exemple@email.com"
                            />
                            <div class="error-message" id="email-error"></div>
                        </div>
                        
                        <!-- Sexe -->
                        <div class="form-group">
                            <label for="sexe">Sexe *</label>
                            <select 
                                id="sexe" 
                                name="sexe" 
                                class="input-field"
                                required
                            >
                                <option value="">Sélectionnez votre sexe</option>
                                <option value="M" {{ old('sexe') == 'M' ? 'selected' : '' }}>Masculin</option>
                                <option value="F" {{ old('sexe') == 'F' ? 'selected' : '' }}>Féminin</option>
                            </select>
                            <div class="error-message" id="sexe-error"></div>
                        </div>
                        
                        <!-- Date de Naissance -->
                        <div class="form-group">
                            <label for="date_naissance">Date de Naissance *</label>
                            <input 
                                id="date_naissance" 
                                class="input-field" 
                                type="date" 
                                name="date_naissance" 
                                value="{{ old('date_naissance') }}" 
                                required 
                                max="{{ date('Y-m-d', strtotime('-18 years')) }}"
                            />
                            <div class="error-message" id="date_naissance-error"></div>
                        </div>
                        
                        <!-- Langue -->
                        <div class="form-group">
                            <label for="langue_id">Langue Préférée *</label>
                            <select 
                                id="langue_id" 
                                name="langue_id" 
                                class="input-field"
                                required
                            >
                                <option value="">Choisissez votre langue</option>
                                @foreach($langues as $langue)
                                    <option value="{{ $langue->id }}" {{ old('langue_id') == $langue->id ? 'selected' : '' }}>
                                        {{ $langue->nom }} ({{ $langue->code_langue }})
                                    </option>
                                @endforeach
                            </select>
                            <div class="error-message" id="langue_id-error"></div>
                        </div>
                        
                        <!-- Mot de passe -->
                        <div class="form-group">
                            <label for="password">Mot de passe *</label>
                            <input 
                                id="password" 
                                class="input-field"
                                type="password"
                                name="password"
                                required 
                                placeholder="Minimum 8 caractères"
                            />
                            <div class="error-message" id="password-error"></div>
                        </div>
                        
                        <!-- Confirmation du mot de passe -->
                        <div class="form-group">
                            <label for="password_confirmation">Confirmer le mot de passe *</label>
                            <input 
                                id="password_confirmation" 
                                class="input-field"
                                type="password"
                                name="password_confirmation" 
                                required 
                                placeholder="Répétez votre mot de passe"
                            />
                            <div class="error-message" id="password_confirmation-error"></div>
                        </div>
                    </div>
                </form>
            </div>
            
            <div class="form-actions">
                <button type="submit" class="btn" id="submitBtn" form="registrationForm">
                    <svg width="18" height="18" fill="none" stroke="currentColor" viewBox="0 0 24 24" style="margin-right: 8px;">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"/>
                    </svg>
                    Créer mon compte
                </button>

                <div class="form-footer">
                    <a class="link" href="{{ route('login') }}">
                        Déjà un compte ? Se connecter
                    </a>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Gestion de l'upload de photo
        const photoInput = document.getElementById('photo_file');
        const photoPreview = document.getElementById('photoPreview');
        const fileInfo = document.getElementById('fileInfo');
        
        photoInput.addEventListener('change', function() {
            const file = this.files[0];
            
            if (file) {
                if (file.size > 2 * 1024 * 1024) {
                    alert('Le fichier est trop volumineux. Taille maximum: 2MB');
                    this.value = '';
                    return;
                }
                
                const validTypes = ['image/jpeg', 'image/png', 'image/jpg', 'image/webp'];
                if (!validTypes.includes(file.type)) {
                    alert('Format de fichier non supporté. Utilisez JPG, PNG ou WEBP.');
                    this.value = '';
                    return;
                }
                
                const reader = new FileReader();
                reader.onload = function(e) {
                    photoPreview.innerHTML = `<img src="${e.target.result}" alt="Aperçu de la photo">`;
                    fileInfo.textContent = `${file.name} • ${(file.size / 1024).toFixed(2)} KB`;
                };
                reader.readAsDataURL(file);
            } else {
                photoPreview.innerHTML = '<div class="photo-placeholder">Aucune photo sélectionnée</div>';
                fileInfo.textContent = '';
            }
        });

        // Validation simultanée
        document.getElementById('registrationForm').addEventListener('submit', function(e) {
            e.preventDefault();
            
            let isValid = true;
            const errors = [];
            
            // Réinitialiser les erreurs
            document.querySelectorAll('.error-message').forEach(el => el.textContent = '');
            document.querySelectorAll('.input-field').forEach(el => el.classList.remove('input-error'));
            
            // Validation de tous les champs
            const fields = [
                { id: 'prenom', name: 'prénom' },
                { id: 'nom', name: 'nom' },
                { id: 'email', name: 'email' },
                { id: 'sexe', name: 'sexe' },
                { id: 'date_naissance', name: 'date de naissance' },
                { id: 'langue_id', name: 'langue' },
                { id: 'password', name: 'mot de passe' },
                { id: 'password_confirmation', name: 'confirmation du mot de passe' }
            ];
            
            fields.forEach(field => {
                const element = document.getElementById(field.id);
                const errorElement = document.getElementById(field.id + '-error');
                
                if (!element.value.trim()) {
                    element.classList.add('input-error');
                    errorElement.textContent = `Ce champ est requis`;
                    errors.push(field.name);
                    isValid = false;
                } else if (field.id === 'email') {
                    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                    if (!emailRegex.test(element.value)) {
                        element.classList.add('input-error');
                        errorElement.textContent = 'Format d\'email invalide';
                        errors.push('email (format invalide)');
                        isValid = false;
                    }
                } else if (field.id === 'password' && element.value.length < 8) {
                    element.classList.add('input-error');
                    errorElement.textContent = 'Le mot de passe doit contenir au moins 8 caractères';
                    errors.push('mot de passe (trop court)');
                    isValid = false;
                } else if (field.id === 'password_confirmation') {
                    const password = document.getElementById('password').value;
                    if (element.value !== password) {
                        element.classList.add('input-error');
                        errorElement.textContent = 'Les mots de passe ne correspondent pas';
                        errors.push('confirmation du mot de passe');
                        isValid = false;
                    }
                }
            });
            
            // Validation de l'âge
            const dateNaissance = document.getElementById('date_naissance');
            if (dateNaissance.value) {
                const selectedDate = new Date(dateNaissance.value);
                const minDate = new Date();
                minDate.setFullYear(minDate.getFullYear() - 18);
                
                if (selectedDate > minDate) {
                    dateNaissance.classList.add('input-error');
                    document.getElementById('date_naissance-error').textContent = 'Vous devez avoir au moins 18 ans';
                    errors.push('âge (moins de 18 ans)');
                    isValid = false;
                }
            }
            
            if (!isValid) {
                const errorMessage = `Veuillez corriger les erreurs suivantes :\n\n• ${errors.join('\n• ')}`;
                alert(errorMessage);
            } else {
                this.submit();
            }
        });
    </script>
</body>
</html>