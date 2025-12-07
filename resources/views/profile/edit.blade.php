<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil - Culture Bénin</title>
    <style>
        :root {
            --primary-color: #008751;
            --primary-hover: #006642;
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
        
        body {
            background: var(--background-gradient);
            min-height: 100vh;
            padding: 20px;
        }
        
        .profile-container {
            max-width: 1000px;
            margin: 0 auto;
        }
        
        .profile-header {
            text-align: center;
            margin-bottom: 30px;
        }
        
        .logo {
            width: 80px;
            height: 80px;
            margin: 0 auto 15px;
            background: white;
            border-radius: 50%;
            padding: 8px;
            box-shadow: 0 8px 24px rgba(0, 135, 81, 0.12);
            border: 2px solid var(--border-color);
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        .logo img {
            max-width: 100%;
            max-height: 100%;
        }
        
        .profile-title {
            font-size: 32px;
            font-weight: 800;
            color: var(--primary-color);
            margin-bottom: 5px;
            background: linear-gradient(135deg, var(--primary-color), var(--accent-color));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
        
        .profile-subtitle {
            color: #64748b;
            font-size: 16px;
        }
        
        .profile-grid {
            display: grid;
            gap: 25px;
        }
        
        .profile-card {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            box-shadow: 0 20px 40px rgba(0, 135, 81, 0.1);
            padding: 30px;
            border: 1px solid rgba(255, 255, 255, 0.8);
            position: relative;
        }
        
        .profile-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(90deg, var(--primary-color), var(--accent-color));
            border-radius: 20px 20px 0 0;
        }
        
        .card-header {
            margin-bottom: 25px;
        }
        
        .card-title {
            font-size: 20px;
            font-weight: 700;
            color: var(--primary-color);
            display: flex;
            align-items: center;
            gap: 10px;
        }
        
        .card-description {
            color: #64748b;
            margin-top: 5px;
            font-size: 14px;
        }
        
        .photo-section {
            background: var(--secondary-color);
            border-radius: 15px;
            padding: 25px;
            margin-bottom: 25px;
            border: 2px dashed var(--border-color);
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
        
        .form-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
        }
        
        .full-width {
            grid-column: 1 / -1;
        }
        
        .form-group {
            margin-bottom: 20px;
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
            box-shadow: 0 0 0 3px rgba(0, 135, 81, 0.1);
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
        
        .success-message {
            color: var(--success-color);
            font-size: 14px;
            margin-top: 10px;
            padding: 10px;
            background: #f0fdf4;
            border-radius: 8px;
            border: 1px solid #bbf7d0;
        }
        
        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 12px 24px;
            border: none;
            border-radius: 10px;
            font-size: 14px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            text-decoration: none;
        }
        
        .btn-primary {
            background: linear-gradient(135deg, var(--primary-color), var(--primary-hover));
            color: white;
            box-shadow: 0 8px 24px rgba(0, 135, 81, 0.3);
        }
        
        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 12px 32px rgba(0, 135, 81, 0.4);
        }
        
        .btn-danger {
            background: linear-gradient(135deg, #dc2626, #b91c1c);
            color: white;
            box-shadow: 0 8px 24px rgba(220, 38, 38, 0.3);
        }
        
        .btn-danger:hover {
            transform: translateY(-2px);
            box-shadow: 0 12px 32px rgba(220, 38, 38, 0.4);
        }
        
        .btn-warning {
            background: linear-gradient(135deg, #f59e0b, #d97706);
            color: white;
            box-shadow: 0 8px 24px rgba(245, 158, 11, 0.3);
        }
        
        .btn-warning:hover {
            transform: translateY(-2px);
            box-shadow: 0 12px 32px rgba(245, 158, 11, 0.4);
        }
        
        .form-actions {
            display: flex;
            gap: 15px;
            align-items: center;
            margin-top: 25px;
        }
        
        .verification-alert {
            background: #fff3cd;
            border: 1px solid #ffeaa7;
            color: #856404;
            border-radius: 10px;
            padding: 15px;
            margin-bottom: 20px;
        }
        
        .delete-section {
            background: #fef2f2;
            border-radius: 15px;
            padding: 25px;
            border-left: 4px solid #dc3545;
        }
        
        .modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            z-index: 1000;
            align-items: center;
            justify-content: center;
        }
        
        .modal-content {
            background: white;
            border-radius: 15px;
            padding: 30px;
            max-width: 500px;
            width: 90%;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.3);
        }
        
        .modal-actions {
            display: flex;
            gap: 15px;
            justify-content: flex-end;
            margin-top: 25px;
        }
        
        /* Styles spécifiques pour la section 2FA */
        .two-factor-status {
            padding: 20px;
            border-radius: 12px;
            margin-bottom: 20px;
        }
        
        .two-factor-enabled {
            background: linear-gradient(135deg, #d1fae5, #a7f3d0);
            border: 2px solid #34d399;
        }
        
        .two-factor-disabled {
            background: linear-gradient(135deg, #fef3c7, #fde68a);
            border: 2px solid #fbbf24;
        }
        
        .backup-codes-alert {
            background: linear-gradient(135deg, #fffbeb, #fef3c7);
            border: 2px solid #fbbf24;
            border-radius: 12px;
            padding: 20px;
            margin-bottom: 20px;
        }
        
        .codes-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 10px;
            margin-top: 15px;
        }
        
        .backup-code {
            background: white;
            padding: 12px;
            border-radius: 8px;
            border: 1px solid #e5e7eb;
            font-family: 'Courier New', monospace;
            text-align: center;
            font-weight: 600;
            color: var(--primary-color);
        }
        
        @media (max-width: 768px) {
            .form-grid {
                grid-template-columns: 1fr;
            }
            
            .photo-upload-area {
                flex-direction: column;
                gap: 15px;
            }
            
            .form-actions {
                flex-direction: column;
            }
            
            .btn {
                width: 100%;
            }
            
            .codes-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>
    <div class="profile-container">
        <div class="profile-header">
            <div class="logo">
                <img src="{{URL::asset('adminlte/img/logoculture__2_-removebg-preview.png')}}" alt="Culture Bénin">
            </div>
            <h1 class="profile-title">Gestion du Profil</h1>
            <p class="profile-subtitle">Gérez vos informations personnelles et la sécurité de votre compte</p>
        </div>
        
        <div class="profile-grid">
            <!-- Informations du profil -->
            <div class="profile-card">
                @include('profile.partials.update-profile-information-form')
            </div>
            
            <!-- Mot de passe -->
            <div class="profile-card">
                @include('profile.partials.update-password-form')
            </div>
            
            <!-- Authentification à deux facteurs -->
            <div class="profile-card">
                <section id="two-factor">
                    <div class="card-header">
                        <h2 class="card-title">
                            <svg width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 11c0 3.517-1.009 6.799-2.753 9.571m-3.44-2.04l.054-.09A13.916 13.916 0 0 0 8 11a4 4 0 1 1 8 0c0 1.017-.07 2.019-.203 3m-2.118 6.844A21.88 21.88 0 0 0 15.171 17m3.839 1.132c.645-2.266.99-4.659.99-7.132A8 8 0 0 0 8 4.07M3 15.364c.64-1.319 1-2.8 1-4.364 0-1.457.39-2.823 1.07-4"/>
                            </svg>
                            Authentification à deux facteurs
                        </h2>
                        <p class="card-description">
                            Ajoutez une couche de sécurité supplémentaire à votre compte avec l'authentification à deux facteurs
                        </p>
                    </div>

                    @if(auth()->user()->google2fa_enabled)
                        <!-- Section quand le 2FA est activé -->
                        <div class="two-factor-status two-factor-enabled">
                            <div style="display: flex; align-items: flex-start; gap: 12px;">
                                <svg width="24" height="24" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                                </svg>
                                <div>
                                    <strong style="display: block; margin-bottom: 5px; color: #065f46;">Authentification à deux facteurs activée</strong>
                                    <p style="margin: 0; font-size: 14px; color: #065f46;">
                                        Votre compte est protégé par une authentification à deux facteurs. 
                                        Vous devrez entrer un code de vérification à chaque connexion.
                                    </p>
                                </div>
                            </div>
                        </div>

                        <!-- Codes de secours -->
                        <div class="form-group">
                            <label style="display: flex; align-items: center; gap: 8px; color: var(--text-color);">
                                <svg width="18" height="18" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 7a2 2 0 012 2m4 0a6 6 0 01-7.743 5.743L11 17H9v2H7v2H4a1 1 0 01-1-1v-2.586a1 1 0 01.293-.707l5.964-5.964A6 6 0 1121 9z"/>
                                </svg>
                                Codes de secours restants
                            </label>
                            
                            @php
                                $backupCodes = auth()->user()->backup_codes ?? [];
                                $remainingCodes = count($backupCodes);
                            @endphp
                            
                            @if($remainingCodes > 0)
                                <div class="backup-codes-alert">
                                    <div style="display: flex; align-items: center; gap: 10px; margin-bottom: 10px;">
                                        <svg width="20" height="20" fill="none" stroke="#d97706" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.964-.833-2.732 0L4.346 16.5c-.77.833.192 2.5 1.732 2.5z"/>
                                        </svg>
                                        <span style="color: #92400e; font-weight: 600;">
                                            Vous avez <span style="background: #fbbf24; padding: 2px 8px; border-radius: 4px;">{{ $remainingCodes }}</span> codes de secours
                                        </span>
                                    </div>
                                    <p style="color: #92400e; font-size: 13px; margin: 0;">
                                        Conservez ces codes dans un endroit sécurisé. Chaque code ne peut être utilisé qu'une seule fois.
                                    </p>
                                </div>
                                
                                <div style="margin-top: 15px;">
                                    <a href="{{ route('two-factor.backup-codes') }}" class="btn btn-warning">
                                        <svg width="18" height="18" fill="none" stroke="currentColor" viewBox="0 0 24 24" style="margin-right: 8px;">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/>
                                        </svg>
                                        Regénérer les codes de secours
                                    </a>
                                </div>
                            @else
                                <div style="background: #fef2f2; border-radius: 8px; padding: 15px; border: 1px solid #fecaca;">
                                    <div style="display: flex; align-items: center; gap: 10px;">
                                        <svg width="20" height="20" fill="none" stroke="#dc2626" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                        </svg>
                                        <span style="color: #991b1b; font-weight: 600;">
                                            Vous n'avez plus de codes de secours disponibles
                                        </span>
                                    </div>
                                    <p style="color: #991b1b; font-size: 13px; margin-top: 5px; margin-bottom: 15px;">
                                        Il est recommandé de générer de nouveaux codes de secours.
                                    </p>
                                    <a href="{{ route('two-factor.backup-codes') }}" class="btn btn-warning">
                                        <svg width="18" height="18" fill="none" stroke="currentColor" viewBox="0 0 24 24" style="margin-right: 8px;">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                                        </svg>
                                        Générer de nouveaux codes
                                    </a>
                                </div>
                            @endif
                        </div>

                        <!-- Désactiver le 2FA -->
                        <div style="margin-top: 30px; padding-top: 20px; border-top: 1px solid var(--border-color);">
                            <h3 style="font-size: 16px; font-weight: 600; color: var(--text-color); margin-bottom: 15px;">
                                Désactiver l'authentification à deux facteurs
                            </h3>
                            
                            <form method="POST" action="{{ route('two-factor.disable') }}" onsubmit="return confirm('Êtes-vous sûr de vouloir désactiver l\'authentification à deux facteurs ?')">
                                @csrf
                                
                                <div class="form-grid" style="grid-template-columns: 1fr; gap: 15px;">
                                    <div class="form-group">
                                        <label for="disable_2fa_password">Mot de passe actuel *</label>
                                        <input 
                                            type="password" 
                                            id="disable_2fa_password" 
                                            name="password" 
                                            class="input-field @error('password') input-error @enderror" 
                                            required
                                            placeholder="Entrez votre mot de passe pour confirmer"
                                        />
                                        @error('password')
                                            <div class="error-message">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                
                                <div class="form-actions" style="margin-top: 20px;">
                                    <button type="submit" class="btn btn-danger">
                                        <svg width="18" height="18" fill="none" stroke="currentColor" viewBox="0 0 24 24" style="margin-right: 8px;">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 18.364A9 9 0 005.636 5.636m12.728 12.728A9 9 0 015.636 5.636m12.728 12.728L5.636 5.636"/>
                                        </svg>
                                        Désactiver l'authentification à deux facteurs
                                    </button>
                                </div>
                            </form>
                        </div>
                    @else
                        <!-- Section quand le 2FA n'est pas activé -->
                        <div class="two-factor-status two-factor-disabled">
                            <div style="display: flex; align-items: flex-start; gap: 12px;">
                                <svg width="24" height="24" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                                <div>
                                    <strong style="display: block; margin-bottom: 5px; color: #92400e;">Authentification à deux facteurs non activée</strong>
                                    <p style="margin: 0; font-size: 14px; color: #92400e;">
                                        Ajoutez une couche de sécurité supplémentaire à votre compte. 
                                        Après activation, vous devrez entrer un code de vérification à chaque connexion.
                                    </p>
                                </div>
                            </div>
                        </div>

                        <!-- Comment ça marche -->
                        <div style="background: var(--secondary-color); border-radius: 10px; padding: 20px; margin-top: 20px;">
                            <h3 style="font-size: 16px; font-weight: 600; color: var(--primary-color); margin-bottom: 15px; display: flex; align-items: center; gap: 8px;">
                                <svg width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                                Comment ça marche ?
                            </h3>
                            <ul style="list-style: none; padding: 0; margin: 0; display: grid; gap: 10px;">
                                <li style="display: flex; align-items: flex-start; gap: 8px;">
                                    <span style="background: var(--primary-color); color: white; width: 20px; height: 20px; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 12px; flex-shrink: 0;">1</span>
                                    <span style="font-size: 14px; color: var(--text-color);">Téléchargez Google Authenticator sur votre téléphone</span>
                                </li>
                                <li style="display: flex; align-items: flex-start; gap: 8px;">
                                    <span style="background: var(--primary-color); color: white; width: 20px; height: 20px; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 12px; flex-shrink: 0;">2</span>
                                    <span style="font-size: 14px; color: var(--text-color);">Scannez le QR code qui sera affiché</span>
                                </li>
                                <li style="display: flex; align-items: flex-start; gap: 8px;">
                                    <span style="background: var(--primary-color); color: white; width: 20px; height: 20px; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 12px; flex-shrink: 0;">3</span>
                                    <span style="font-size: 14px; color: var(--text-color);">Entrez le code de vérification à 6 chiffres</span>
                                </li>
                                <li style="display: flex; align-items: flex-start; gap: 8px;">
                                    <span style="background: var(--primary-color); color: white; width: 20px; height: 20px; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 12px; flex-shrink: 0;">4</span>
                                    <span style="font-size: 14px; color: var(--text-color);">Conservez les codes de secours en lieu sûr</span>
                                </li>
                            </ul>
                        </div>

                        <!-- Boutons d'action -->
                        <div class="form-actions" style="margin-top: 25px; display: flex; flex-direction: column; gap: 15px;">
                            <a href="{{ route('two-factor.enable') }}" class="btn btn-primary">
                                <svg width="18" height="18" fill="none" stroke="currentColor" viewBox="0 0 24 24" style="margin-right: 8px;">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                                </svg>
                                Activer l'authentification à deux facteurs
                            </a>
                            
                            <div style="display: flex; gap: 10px; flex-wrap: wrap;">
                                <a href="https://play.google.com/store/apps/details?id=com.google.android.apps.authenticator2" 
                                   target="_blank" 
                                   class="btn" 
                                   style="background: white; color: var(--primary-color); border: 1px solid var(--border-color); flex: 1; min-width: 120px;">
                                    <svg width="18" height="18" fill="currentColor" viewBox="0 0 24 24" style="margin-right: 8px;">
                                        <path d="M17.523 15.341a1 1 0 01.966.049l2.5 1.5a1 1 0 010 1.71l-2.5 1.5a1 1 0 01-1.415-.407 1 1 0 01.1-1.316L18.5 17.5l-1.328.797a1 1 0 01-1.415-.407 1 1 0 01.1-1.316L17.5 15.5l-1.328.797a1 1 0 01-1.415-.407 1 1 0 01.1-1.316L17.523 15.341zM6 2h12a2 2 0 012 2v12a2 2 0 01-2 2H6a2 2 0 01-2-2V4a2 2 0 012-2zm0 2v12h12V4H6z"/>
                                    </svg>
                                    Android
                                </a>
                                
                                <a href="https://apps.apple.com/fr/app/google-authenticator/id388497605" 
                                   target="_blank" 
                                   class="btn" 
                                   style="background: white; color: var(--primary-color); border: 1px solid var(--border-color); flex: 1; min-width: 120px;">
                                    <svg width="18" height="18" fill="currentColor" viewBox="0 0 24 24" style="margin-right: 8px;">
                                        <path d="M14.94 5.19A4.38 4.38 0 0016 2a4.44 4.44 0 00-3 1.52 4.17 4.17 0 00-1 3.09 3.69 3.69 0 002.94-1.42zm2.52 7.44a4.51 4.51 0 012.16-3.81 4.66 4.66 0 00-3.66-2c-1.56-.16-3 .91-3.83.91s-2-.89-3.3-.87a4.92 4.92 0 00-4.14 2.53C2.93 12.45 4.24 17 6 19.47c.8 1.21 1.8 2.58 3.12 2.53s1.75-.76 3.28-.76 2 .76 3.3.73 2.22-1.24 3.06-2.45a11 11 0 001.38-2.85 4.41 4.41 0 01-2.68-4.04z"/>
                                    </svg>
                                    iOS
                                </a>
                            </div>
                        </div>
                    @endif

                    <!-- Messages de succès/erreur -->
                    @if(session('success'))
                        <div class="success-message" style="margin-top: 20px;">
                            <svg width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24" style="margin-right: 10px; vertical-align: middle;">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                            {{ session('success') }}
                        </div>
                    @endif

                    @if(session('error'))
                        <div class="error-message" style="margin-top: 20px; padding: 10px; background: #fef2f2; border-radius: 8px; border: 1px solid #fecaca;">
                            <svg width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24" style="margin-right: 10px; vertical-align: middle;">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                            {{ session('error') }}
                        </div>
                    @endif
                </section>
            </div>
            
            <!-- Suppression du compte -->
            <div class="profile-card">
                @include('profile.partials.delete-user-form')
            </div>
        </div>
    </div>

    <!-- Modal de suppression -->
    <div id="deleteModal" class="modal">
        <div class="modal-content">
            <h3 style="color: #dc2626; margin-bottom: 15px;">Confirmer la suppression</h3>
            <p style="margin-bottom: 20px; color: #64748b;">
                Êtes-vous sûr de vouloir supprimer votre compte ? Cette action est irréversible.
            </p>
            <form id="deleteForm" method="POST" action="{{ route('profile.destroy') }}">
                @csrf
                @method('delete')
                <div class="form-group">
                    <label for="password">Mot de passe de confirmation</label>
                    <input type="password" id="password" name="password" class="input-field" placeholder="Entrez votre mot de passe" required>
                </div>
                <div class="modal-actions">
                    <button type="button" class="btn" onclick="closeModal()" style="background: #6b7280; color: white;">Annuler</button>
                    <button type="submit" class="btn btn-danger">Supprimer le compte</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        // Gestion de l'upload de photo
        function handlePhotoUpload(inputId, previewId) {
            const photoInput = document.getElementById(inputId);
            const photoPreview = document.getElementById(previewId);
            
            if (photoInput) {
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
                        };
                        reader.readAsDataURL(file);
                    }
                });
            }
        }

        // Modal functions
        function openModal() {
            document.getElementById('deleteModal').style.display = 'flex';
        }

        function closeModal() {
            document.getElementById('deleteModal').style.display = 'none';
        }

        // Initialize photo upload handlers
        document.addEventListener('DOMContentLoaded', function() {
            handlePhotoUpload('profile_photo', 'profilePhotoPreview');
            
            // Scroll vers la section 2FA si elle est dans l'URL
            if (window.location.hash === '#two-factor') {
                const twoFactorSection = document.getElementById('two-factor');
                if (twoFactorSection) {
                    twoFactorSection.scrollIntoView({ behavior: 'smooth' });
                }
            }
        });
    </script>
</body>
</html>