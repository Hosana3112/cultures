<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Activer 2FA - Culture Bénin</title>
    <style>
        :root {
            --primary-color: #2d5016;
            --primary-hover: #1f3510;
            --secondary-color: #e8f5e8;
            --accent-color: #d4af37;
            --text-color: #1a331c;
            --border-color: #c8e6c9;
            --error-color: #dc2626;
            --success-color: #16a34a;
            --warning-color: #f59e0b;
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
        
        .container {
            max-width: 800px;
            margin: 0 auto;
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
            border: 1px solid rgba(255, 255, 255, 0.8);
            position: relative;
            overflow: hidden;
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
            margin-bottom: 30px;
        }
        
        .logo {
            width: 100px;
            height: 100px;
            margin: 0 auto 20px;
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
        }
        
        .title {
            font-size: 28px;
            font-weight: 800;
            color: var(--primary-color);
            margin-bottom: 8px;
            text-align: center;
            background: linear-gradient(135deg, var(--primary-color), var(--accent-color));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
        
        .subtitle {
            color: #64748b;
            text-align: center;
            margin-bottom: 30px;
            font-size: 16px;
        }
        
        .step-container {
            margin-bottom: 30px;
        }
        
        .step-title {
            font-size: 18px;
            font-weight: 700;
            color: var(--text-color);
            margin-bottom: 15px;
            display: flex;
            align-items: center;
            gap: 10px;
        }
        
        .step-number {
            background: var(--primary-color);
            color: white;
            width: 30px;
            height: 30px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 14px;
            font-weight: 600;
        }
        
        .qr-container {
            background: white;
            border-radius: 15px;
            padding: 30px;
            text-align: center;
            border: 2px solid var(--border-color);
            margin-bottom: 20px;
        }
        
        .qr-code {
            max-width: 300px;
            margin: 0 auto 20px;
        }
        
        .qr-code img {
            width: 100%;
            height: auto;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }
        
        .secret-container {
            background: #f8f9fa;
            border-radius: 10px;
            padding: 20px;
            margin-bottom: 20px;
        }
        
        .secret-label {
            font-size: 14px;
            font-weight: 600;
            color: var(--text-color);
            margin-bottom: 10px;
        }
        
        .secret-code {
            font-family: 'Courier New', monospace;
            font-size: 18px;
            font-weight: 600;
            color: var(--primary-color);
            background: white;
            padding: 15px;
            border-radius: 8px;
            border: 1px solid var(--border-color);
            text-align: center;
            letter-spacing: 2px;
        }
        
        .backup-codes-container {
            background: #fff7ed;
            border: 2px dashed #fdba74;
            border-radius: 15px;
            padding: 25px;
            margin-bottom: 30px;
        }
        
        .backup-codes-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 10px;
            margin-top: 15px;
        }
        
        @media (max-width: 768px) {
            .backup-codes-grid {
                grid-template-columns: 1fr;
            }
        }
        
        .backup-code {
            background: white;
            padding: 12px;
            border-radius: 8px;
            border: 1px solid #fed7aa;
            font-family: 'Courier New', monospace;
            font-size: 14px;
            font-weight: 600;
            text-align: center;
            color: #92400e;
        }
        
        .verification-form {
            background: #f0fdf4;
            border-radius: 15px;
            padding: 25px;
            border: 2px solid #bbf7d0;
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
            padding: 16px 20px;
            border: 2px solid var(--border-color);
            border-radius: 12px;
            font-size: 15px;
            transition: all 0.3s ease;
            background-color: white;
            box-shadow: 0 2px 8px rgba(45, 80, 22, 0.05);
        }
        
        .input-field:focus {
            outline: none;
            border-color: var(--primary-color);
            box-shadow: 
                0 0 0 4px rgba(45, 80, 22, 0.1),
                0 4px 12px rgba(45, 80, 22, 0.1);
        }
        
        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 16px 24px;
            border: none;
            border-radius: 12px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            text-decoration: none;
        }
        
        .btn-primary {
            background: linear-gradient(135deg, var(--primary-color), var(--primary-hover));
            color: white;
            box-shadow: 0 8px 24px rgba(45, 80, 22, 0.3);
        }
        
        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 12px 32px rgba(45, 80, 22, 0.4);
        }
        
        .btn-secondary {
            background: white;
            color: var(--primary-color);
            border: 2px solid var(--border-color);
        }
        
        .btn-secondary:hover {
            background: var(--secondary-color);
            transform: translateY(-2px);
        }
        
        .form-actions {
            display: flex;
            gap: 15px;
            margin-top: 25px;
        }
        
        @media (max-width: 640px) {
            .form-actions {
                flex-direction: column;
            }
            
            .btn {
                width: 100%;
            }
            
            .card {
                padding: 25px 20px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="card">
            <div class="logo-container">
                <div class="logo">
                    <img src="{{URL::asset('adminlte/img/logoculture__2_-removebg-preview.png')}}" alt="BéninCulture Logo">
                </div>
                <h1 class="title">Activer l'Authentification à Deux Facteurs</h1>
                <p class="subtitle">Ajoutez une couche de sécurité supplémentaire à votre compte</p>
            </div>
            
            <!-- Étape 1: QR Code -->
            <div class="step-container">
                <div class="step-title">
                    <span class="step-number">1</span>
                    Scannez le QR Code
                </div>
                
                <div class="qr-container">
                    <div class="qr-code">
                        <img src="{{ $qrCode }}" alt="QR Code pour Google Authenticator">
                    </div>
                    <p style="color: #64748b; font-size: 14px;">
                        Scannez ce QR code avec Google Authenticator ou une application similaire
                    </p>
                </div>
                
                <div class="secret-container">
                    <div class="secret-label">Code secret (pour saisie manuelle)</div>
                    <div class="secret-code">{{ $secret }}</div>
                    <p style="color: #64748b; font-size: 13px; margin-top: 10px;">
                        Utilisez ce code si vous ne pouvez pas scanner le QR code
                    </p>
                </div>
            </div>
            
            <!-- Étape 2: Codes de secours -->
            <div class="step-container">
                <div class="step-title">
                    <span class="step-number">2</span>
                    Sauvegardez vos codes de secours
                </div>
                
                <div class="backup-codes-container">
                    <p style="color: #92400e; font-weight: 600; margin-bottom: 10px;">
                        <svg width="16" height="16" fill="none" stroke="currentColor" viewBox="0 0 24 24" style="vertical-align: middle; margin-right: 5px;">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.964-.833-2.732 0L4.346 16.5c-.77.833.192 2.5 1.732 2.5z"/>
                        </svg>
                        Important : Conservez ces codes en lieu sûr
                    </p>
                    <p style="color: #92400e; font-size: 14px; margin-bottom: 15px;">
                        Chaque code ne peut être utilisé qu'une seule fois. Ils vous permettront de vous connecter si vous perdez l'accès à votre application d'authentification.
                    </p>
                    
                    <div class="backup-codes-grid">
                        @foreach($backupCodes as $code)
                            <div class="backup-code">{{ $code }}</div>
                        @endforeach
                    </div>
                </div>
            </div>
            
            <!-- Étape 3: Vérification -->
            <div class="step-container">
                <div class="step-title">
                    <span class="step-number">3</span>
                    Vérifiez l'activation
                </div>
                
                <div class="verification-form">
                    <p style="color: #065f46; margin-bottom: 20px;">
                        Entrez le code à 6 chiffres généré par votre application d'authentification pour vérifier que tout fonctionne correctement.
                    </p>
                    
                    @if ($errors->any())
                        <div style="background: #fef2f2; border: 1px solid #fecaca; border-radius: 8px; padding: 15px; margin-bottom: 20px;">
                            @foreach ($errors->all() as $error)
                                <p style="color: #991b1b; margin: 0; font-size: 14px;">{{ $error }}</p>
                            @endforeach
                        </div>
                    @endif
                    
                    <form method="POST" action="{{ route('two-factor.verify') }}">
                        @csrf
                        
                        <div class="form-group">
                            <label for="code">Code de vérification</label>
                            <input 
                                id="code" 
                                type="text" 
                                name="code" 
                                class="input-field" 
                                required 
                                placeholder="Entrez le code à 6 chiffres"
                                maxlength="6"
                                autofocus
                                autocomplete="off"
                            />
                        </div>
                        
                        <div class="form-actions">
                            <button type="submit" class="btn btn-primary">
                                <svg width="18" height="18" fill="none" stroke="currentColor" viewBox="0 0 24 24" style="margin-right: 8px;">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                </svg>
                                Vérifier et activer
                            </button>
                            
                            <a href="{{ route('dashboard') }}" class="btn btn-secondary">
                                <svg width="18" height="18" fill="none" stroke="currentColor" viewBox="0 0 24 24" style="margin-right: 8px;">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                                </svg>
                                Annuler
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Validation du code 2FA
        const codeInput = document.getElementById('code');
        if (codeInput) {
            codeInput.addEventListener('input', function(e) {
                // Supprime tous les caractères non numériques
                this.value = this.value.replace(/\D/g, '');
                
                // Limite à 6 chiffres
                if (this.value.length > 6) {
                    this.value = this.value.substring(0, 6);
                }
            });
            
            codeInput.addEventListener('keydown', function(e) {
                // Permet uniquement les touches numériques et les touches de contrôle
                if (!/^\d$/.test(e.key) && 
                    !['Backspace', 'Delete', 'Tab', 'ArrowLeft', 'ArrowRight', 'Home', 'End'].includes(e.key)) {
                    e.preventDefault();
                }
            });
        }
        
        // Impression des codes de secours
        function printBackupCodes() {
            window.print();
        }
        
        // Effet de focus amélioré
        const inputs = document.querySelectorAll('.input-field');
        inputs.forEach(input => {
            input.addEventListener('focus', function() {
                this.style.transform = 'translateY(-1px)';
            });
            
            input.addEventListener('blur', function() {
                this.style.transform = 'translateY(0)';
            });
        });
    </script>
</body>
</html>