<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vérification 2FA - Culture Bénin</title>
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
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
            position: relative;
            overflow: hidden;
        }
        
        /* Effets de fond décoratifs */
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
            max-width: 440px;
            position: relative;
            z-index: 2;
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
            position: relative;
        }
        
        .logo {
            width: 120px;
            height: 120px;
            margin: 0 auto 20px;
            background: white;
            border-radius: 50%;
            padding: 15px;
            box-shadow: 
                0 8px 24px rgba(45, 80, 22, 0.12),
                inset 0 2px 4px rgba(255, 255, 255, 0.8);
            border: 2px solid var(--border-color);
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
        }
        
        .logo::after {
            content: '';
            position: absolute;
            top: -4px;
            left: -4px;
            right: -4px;
            bottom: -4px;
            border-radius: 50%;
            background: linear-gradient(135deg, var(--primary-color), var(--accent-color));
            z-index: -1;
            animation: rotate 10s linear infinite;
        }
        
        @keyframes rotate {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
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
            font-weight: 500;
        }
        
        .alert-info {
            background: linear-gradient(135deg, #dbeafe, #eff6ff);
            border: 2px solid #bfdbfe;
            border-radius: 12px;
            padding: 20px;
            margin-bottom: 25px;
            position: relative;
            overflow: hidden;
        }
        
        .alert-info::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 4px;
            height: 100%;
            background: var(--primary-color);
        }
        
        .alert-content {
            display: flex;
            align-items: flex-start;
            gap: 12px;
        }
        
        .alert-icon {
            flex-shrink: 0;
            width: 24px;
            height: 24px;
            color: var(--primary-color);
        }
        
        .alert-text {
            flex: 1;
        }
        
        .alert-title {
            font-weight: 600;
            color: var(--text-color);
            margin-bottom: 5px;
            font-size: 15px;
        }
        
        .alert-description {
            color: #4b5563;
            font-size: 14px;
            line-height: 1.5;
        }
        
        .form-group {
            margin-bottom: 24px;
            position: relative;
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
            text-align: center;
            font-size: 18px;
            letter-spacing: 4px;
            font-weight: 600;
        }
        
        .input-field:focus {
            outline: none;
            border-color: var(--primary-color);
            box-shadow: 
                0 0 0 4px rgba(45, 80, 22, 0.1),
                0 4px 12px rgba(45, 80, 22, 0.1);
            transform: translateY(-1px);
        }
        
        .input-field::placeholder {
            color: #9ca3af;
            letter-spacing: normal;
            font-size: 15px;
            font-weight: normal;
        }
        
        .input-error {
            border-color: var(--error-color);
        }
        
        .error-message {
            color: var(--error-color);
            font-size: 13px;
            margin-top: 6px;
            display: flex;
            align-items: center;
            gap: 4px;
        }
        
        .backup-link {
            text-align: center;
            margin: 20px 0;
        }
        
        .link {
            color: var(--primary-color);
            text-decoration: none;
            font-size: 14px;
            font-weight: 600;
            transition: all 0.3s ease;
            position: relative;
            display: inline-flex;
            align-items: center;
            gap: 6px;
        }
        
        .link::after {
            content: '';
            position: absolute;
            bottom: -2px;
            left: 0;
            width: 0;
            height: 2px;
            background: var(--accent-color);
            transition: width 0.3s ease;
        }
        
        .link:hover {
            color: var(--primary-hover);
        }
        
        .link:hover::after {
            width: 100%;
        }
        
        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 16px 24px;
            color: white;
            border: none;
            border-radius: 12px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            width: 100%;
            position: relative;
            overflow: hidden;
        }
        
        .btn-primary {
            background: linear-gradient(135deg, var(--primary-color), var(--primary-hover));
            box-shadow: 0 8px 24px rgba(45, 80, 22, 0.3);
        }
        
        .btn-warning {
            background: linear-gradient(135deg, var(--warning-color), #d97706);
            box-shadow: 0 8px 24px rgba(245, 158, 11, 0.3);
        }
        
        .btn:hover {
            transform: translateY(-2px);
        }
        
        .btn:active {
            transform: translateY(0);
        }
        
        .btn-icon {
            width: 20px;
            height: 20px;
            margin-right: 8px;
        }
        
        /* Modal Styles */
        .modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            backdrop-filter: blur(4px);
            z-index: 1000;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }
        
        .modal-content {
            background: white;
            border-radius: 20px;
            padding: 30px;
            max-width: 400px;
            width: 100%;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.2);
            position: relative;
            animation: modalFadeIn 0.3s ease-out;
        }
        
        @keyframes modalFadeIn {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        .modal-header {
            margin-bottom: 20px;
        }
        
        .modal-title {
            font-size: 20px;
            font-weight: 700;
            color: var(--text-color);
            display: flex;
            align-items: center;
            gap: 10px;
        }
        
        .modal-body {
            margin-bottom: 25px;
        }
        
        .modal-close {
            position: absolute;
            top: 20px;
            right: 20px;
            background: none;
            border: none;
            font-size: 24px;
            color: #6b7280;
            cursor: pointer;
            width: 30px;
            height: 30px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            transition: all 0.3s ease;
        }
        
        .modal-close:hover {
            background: #f3f4f6;
            color: var(--primary-color);
        }
        
        @media (max-width: 640px) {
            .card {
                padding: 30px 20px;
            }
            
            .logo {
                width: 100px;
                height: 100px;
            }
            
            .title {
                font-size: 24px;
            }
            
            .input-field {
                font-size: 16px;
                letter-spacing: 3px;
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
                <h1 class="title">Vérification de Sécurité</h1>
                <p class="subtitle">Entrez votre code d'authentification à deux facteurs</p>
            </div>
            
            <div class="alert-info">
                <div class="alert-content">
                    <svg class="alert-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                    </svg>
                    <div class="alert-text">
                        <div class="alert-title">Protection supplémentaire activée</div>
                        <p class="alert-description">
                            Pour votre sécurité, veuillez entrer le code à 6 chiffres 
                            généré par votre application d'authentification.
                        </p>
                    </div>
                </div>
            </div>
            
            @if ($errors->any())
                <div class="alert-info" style="background: linear-gradient(135deg, #fee2e2, #fef2f2); border-color: #fecaca;">
                    <div class="alert-content">
                        <svg class="alert-icon" fill="none" stroke="#dc2626" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                        <div class="alert-text">
                            @foreach ($errors->all() as $error)
                                <p class="alert-description" style="color: #991b1b;">{{ $error }}</p>
                            @endforeach
                        </div>
                    </div>
                </div>
            @endif
            
            <form method="POST" action="{{ route('two-factor.login') }}">
                @csrf
                
                <div class="form-group">
                    <label for="code">Code de vérification</label>
                    <input 
                        id="code" 
                        class="input-field" 
                        type="text" 
                        name="code" 
                        required 
                        autofocus 
                        autocomplete="off" 
                        placeholder="123456"
                        maxlength="6"
                        pattern="\d{6}"
                    />
                    <div class="error-message" id="code-error"></div>
                </div>
                
                <div class="backup-link">
                    <a href="#" class="link" onclick="openBackupModal(event)">
                        <svg width="16" height="16" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 7a2 2 0 012 2m4 0a6 6 0 01-7.743 5.743L11 17H9v2H7v2H4a1 1 0 01-1-1v-2.586a1 1 0 01.293-.707l5.964-5.964A6 6 0 1121 9z"/>
                        </svg>
                        Utiliser un code de secours
                    </a>
                </div>
                
                <button type="submit" class="btn btn-primary">
                    <svg class="btn-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                    </svg>
                    Vérifier et continuer
                </button>
            </form>
        </div>
    </div>

    <!-- Modal pour les codes de secours -->
    <div id="backupModal" class="modal">
        <div class="modal-content">
            <button class="modal-close" onclick="closeBackupModal()">&times;</button>
            
            <div class="modal-header">
                <h3 class="modal-title">
                    <svg width="24" height="24" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 7a2 2 0 012 2m4 0a6 6 0 01-7.743 5.743L11 17H9v2H7v2H4a1 1 0 01-1-1v-2.586a1 1 0 01.293-.707l5.964-5.964A6 6 0 1121 9z"/>
                    </svg>
                    Code de secours
                </h3>
            </div>
            
            <div class="modal-body">
                <p style="color: #4b5563; margin-bottom: 20px; font-size: 14px; line-height: 1.5;">
                    Entrez l'un de vos codes de secours. Chaque code ne peut être utilisé qu'une seule fois.
                </p>
                
                <form method="POST" action="{{ route('two-factor.backup-login') }}" id="backupForm">
                    @csrf
                    
                    <div class="form-group" style="margin-bottom: 0;">
                        <label for="backup_code">Code de secours</label>
                        <input 
                            id="backup_code" 
                            class="input-field" 
                            type="text" 
                            name="backup_code" 
                            required 
                            autocomplete="off" 
                            placeholder="XXXXXXXX"
                            style="letter-spacing: 1px;"
                        />
                    </div>
                </form>
            </div>
            
            <div class="form-actions">
                <button type="button" class="btn" onclick="closeBackupModal()" style="background: #6b7280; color: white; margin-right: 10px;">
                    Annuler
                </button>
                <button type="submit" form="backupForm" class="btn btn-warning">
                    <svg class="btn-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                    Utiliser ce code
                </button>
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
            
            // Supprime le message d'erreur
            document.getElementById('code-error').textContent = '';
            this.classList.remove('input-error');
        });
        
        codeInput.addEventListener('keydown', function(e) {
            // Permet uniquement les touches numériques et les touches de contrôle
            if (!/^\d$/.test(e.key) && 
                !['Backspace', 'Delete', 'Tab', 'ArrowLeft', 'ArrowRight', 'Home', 'End'].includes(e.key)) {
                e.preventDefault();
            }
        });
    }
    
    // Gestion du modal
    function openBackupModal(e) {
        e.preventDefault();
        const modal = document.getElementById('backupModal');
        modal.style.display = 'flex';
        
        // Focus sur le champ du code de secours
        setTimeout(() => {
            document.getElementById('backup_code').focus();
        }, 300);
    }
    
    function closeBackupModal() {
        const modal = document.getElementById('backupModal');
        modal.style.display = 'none';
    }
    
    // Fermer le modal avec la touche Échap
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
            closeBackupModal();
        }
    });
    
    // Validation du formulaire 2FA
    const twoFactorForm = document.querySelector('form[action*="two-factor-challenge"]');
    if (twoFactorForm) {
        twoFactorForm.addEventListener('submit', function(e) {
            const code = document.getElementById('code');
            const codeError = document.getElementById('code-error');
            
            if (!code.value) {
                codeError.textContent = 'Le code de vérification est requis';
                code.classList.add('input-error');
                e.preventDefault();
                return;
            }
            
            if (!/^\d{6}$/.test(code.value)) {
                codeError.textContent = 'Le code doit contenir exactement 6 chiffres';
                code.classList.add('input-error');
                e.preventDefault();
                return;
            }
        });
    }
    
    // Validation du formulaire de code de secours
    const backupForm = document.getElementById('backupForm');
    if (backupForm) {
        backupForm.addEventListener('submit', function(e) {
            const backupCode = document.getElementById('backup_code');
            if (!backupCode.value.trim()) {
                e.preventDefault();
                alert('Veuillez entrer un code de secours');
            }
        });
    }
    
    // Effet de focus amélioré
    const inputs = document.querySelectorAll('.input-field');
    inputs.forEach(input => {
        input.addEventListener('focus', function() {
            this.parentElement.style.transform = 'translateY(-2px)';
        });
        
        input.addEventListener('blur', function() {
            this.parentElement.style.transform = 'translateY(0)';
        });
    });
    
    // Auto-focus sur le champ code
    window.addEventListener('load', function() {
        if (codeInput) {
            codeInput.focus();
        }
    });
</script>
</body>
</html>