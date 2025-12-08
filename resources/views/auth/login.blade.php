<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion - Culture Bénin</title>
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
        
        .form-options {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
        }
        
        .checkbox-container {
            display: flex;
            align-items: center;
            gap: 8px;
        }
        
        .checkbox {
            width: 18px;
            height: 18px;
            border: 2px solid var(--border-color);
            border-radius: 4px;
            cursor: pointer;
            position: relative;
            transition: all 0.2s ease;
        }
        
        .checkbox:checked {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
        }
        
        .checkbox:checked::after {
            content: '✓';
            position: absolute;
            color: white;
            font-size: 12px;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }
        
        .checkbox-label {
            font-size: 14px;
            color: var(--text-color);
            cursor: pointer;
        }
        
        .link {
            color: var(--primary-color);
            text-decoration: none;
            font-size: 14px;
            font-weight: 600;
            transition: all 0.3s ease;
            position: relative;
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
            background: linear-gradient(135deg, var(--primary-color), var(--primary-hover));
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
            box-shadow: 0 8px 24px rgba(45, 80, 22, 0.3);
        }
        
        .btn:hover {
            transform: translateY(-2px);
            box-shadow: 
                0 12px 32px rgba(45, 80, 22, 0.4),
                0 4px 16px rgba(45, 80, 22, 0.2);
        }
        
        .btn:active {
            transform: translateY(0);
        }
        
        .btn::after {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            width: 5px;
            height: 5px;
            background: rgba(255, 255, 255, 0.5);
            opacity: 0;
            border-radius: 100%;
            transform: scale(1, 1) translate(-50%);
            transform-origin: 50% 50%;
        }
        
        .btn:focus:not(:active)::after {
            animation: ripple 1s ease-out;
        }
        
        @keyframes ripple {
            0% {
                transform: scale(0, 0);
                opacity: 0.5;
            }
            100% {
                transform: scale(20, 20);
                opacity: 0;
            }
        }
        
        .btn-icon {
            width: 20px;
            height: 20px;
            margin-right: 8px;
        }
        
        .footer {
            text-align: center;
            margin-top: 30px;
            padding-top: 20px;
            border-top: 1px solid var(--border-color);
        }
        
        .footer-text {
            color: #64748b;
            font-size: 14px;
        }
        
        .footer-link {
            color: var(--primary-color);
            text-decoration: none;
            font-weight: 600;
            transition: color 0.3s ease;
        }
        
        .footer-link:hover {
            color: var(--primary-hover);
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
            
            .form-options {
                flex-direction: column;
                gap: 15px;
                align-items: flex-start;
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
                <h1 class="title"> BéninCulture</h1>
                <p class="subtitle">Veuillez vous connecter à votre compte</p>
            </div>
            
            <form method="POST" action="{{ route('login') }}">
                @csrf
                
                <!-- Email Address -->
                <div class="form-group">
                    <label for="email">Adresse Email</label>
                    <input 
                        id="email" 
                        class="input-field" 
                        type="email" 
                        name="email" 
                        :value="old('email')" 
                        required 
                        autofocus 
                        autocomplete="email" 
                        placeholder="votre@email.com"
                    />
                    <div class="error-message" id="email-error"></div>
                </div>
                
                <!-- Password -->
                <div class="form-group">
                    <label for="password">Mot de passe</label>
                    <input 
                        id="password" 
                        class="input-field"
                        type="password"
                        name="password"
                        required 
                        autocomplete="current-password"
                        placeholder="Votre mot de passe"
                    />
                    <div class="error-message" id="password-error"></div>
                </div>
                
                <!-- Remember Me and Forgot Password -->
                <div class="form-options">
                    <div class="checkbox-container">
                        <input 
                            id="remember_me" 
                            type="checkbox" 
                            class="checkbox" 
                            name="remember"
                        >
                        <label for="remember_me" class="checkbox-label">Se souvenir de moi</label>
                    </div>
                    
                    <a class="link" href="{{ route('password.request') }}">
                        Mot de passe oublié ?
                    </a>
                </div>
                
                <!-- Submit Button -->
                <button type="submit" class="btn">
                    <svg class="btn-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1" />
                    </svg>
                    Se connecter
                </button>
            </form>
                <p >👋 Pas encore de compte ?</p>
                <a href="{{ route('register') }}" class="register-btn"> S'inscrire </a>
        </div>
    </div>

    <script>
        // Validation basique côté client
        document.querySelector('form').addEventListener('submit', function(e) {
            let isValid = true;
            
            // Validation de l'email
            const email = document.getElementById('email');
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!email.value.trim()) {
                document.getElementById('email-error').textContent = 'L\'email est requis';
                email.classList.add('input-error');
                isValid = false;
            } else if (!emailRegex.test(email.value)) {
                document.getElementById('email-error').textContent = 'Format d\'email invalide';
                email.classList.add('input-error');
                isValid = false;
            } else {
                document.getElementById('email-error').textContent = '';
                email.classList.remove('input-error');
            }
            
            // Validation du mot de passe
            const password = document.getElementById('password');
            if (!password.value) {
                document.getElementById('password-error').textContent = 'Le mot de passe est requis';
                password.classList.add('input-error');
                isValid = false;
            } else {
                document.getElementById('password-error').textContent = '';
                password.classList.remove('input-error');
            }
            
            if (!isValid) {
                e.preventDefault();
            }
        });
        
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
    </script>
</body>
</html>