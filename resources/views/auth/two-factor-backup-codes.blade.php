<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Codes de Secours - Culture Bénin</title>
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
            max-width: 800px;
            margin: 0 auto;
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
        
        .alert-danger {
            background: linear-gradient(135deg, #fef2f2, #fee2e2);
            border: 2px solid #fecaca;
            border-radius: 15px;
            padding: 25px;
            margin-bottom: 25px;
            position: relative;
            overflow: hidden;
        }
        
        .alert-danger::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 4px;
            height: 100%;
            background: #dc2626;
        }
        
        .alert-content {
            display: flex;
            align-items: flex-start;
            gap: 15px;
        }
        
        .alert-icon {
            flex-shrink: 0;
            width: 28px;
            height: 28px;
            color: #dc2626;
        }
        
        .alert-text {
            flex: 1;
        }
        
        .alert-title {
            font-weight: 700;
            color: #991b1b;
            margin-bottom: 10px;
            font-size: 16px;
        }
        
        .alert-description {
            color: #7f1d1d;
            font-size: 14px;
            line-height: 1.6;
        }
        
        .alert-info {
            background: linear-gradient(135deg, #f0f9ff, #e0f2fe);
            border: 2px solid #bae6fd;
            border-radius: 15px;
            padding: 25px;
            margin-bottom: 30px;
        }
        
        .alert-info::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 4px;
            height: 100%;
            background: #0ea5e9;
        }
        
        .codes-container {
            margin-bottom: 35px;
        }
        
        .codes-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 15px;
            margin-top: 20px;
        }
        
        @media (max-width: 768px) {
            .codes-grid {
                grid-template-columns: 1fr;
            }
        }
        
        .code-card {
            background: white;
            border-radius: 12px;
            padding: 20px;
            border: 2px solid var(--border-color);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }
        
        .code-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(45, 80, 22, 0.1);
            border-color: var(--accent-color);
        }
        
        .code-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 3px;
            background: linear-gradient(90deg, var(--primary-color), var(--accent-color));
        }
        
        .code-text {
            font-family: 'Courier New', monospace;
            font-size: 18px;
            font-weight: 700;
            color: var(--primary-color);
            text-align: center;
            letter-spacing: 2px;
            padding: 10px;
            background: #f8fafc;
            border-radius: 8px;
            border: 1px solid #e2e8f0;
        }
        
        .actions {
            display: flex;
            gap: 15px;
            flex-wrap: wrap;
            margin-top: 30px;
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
            min-width: 160px;
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
        
        .btn-icon {
            width: 20px;
            height: 20px;
            margin-right: 10px;
        }
        
        @media print {
            body {
                background: white !important;
                padding: 0 !important;
            }
            
            body::before {
                display: none !important;
            }
            
            .card {
                box-shadow: none !important;
                border: 1px solid #ddd !important;
            }
            
            .logo-container,
            .alert-danger,
            .alert-info,
            .actions {
                display: none !important;
            }
            
            .codes-grid {
                grid-template-columns: repeat(2, 1fr) !important;
                gap: 20px !important;
                margin-top: 40px !important;
            }
            
            .code-card {
                break-inside: avoid;
                page-break-inside: avoid;
                border: 1px solid #ccc !important;
                box-shadow: none !important;
            }
            
            .code-text {
                font-size: 16pt !important;
                padding: 15px !important;
                background: white !important;
                border: 1px solid #eee !important;
            }
            
            .container {
                max-width: 100% !important;
                margin: 0 !important;
            }
            
            @page {
                margin: 20mm;
            }
        }
        
        @media (max-width: 640px) {
            .card {
                padding: 25px 20px;
            }
            
            .logo {
                width: 80px;
                height: 80px;
            }
            
            .title {
                font-size: 24px;
            }
            
            .actions {
                flex-direction: column;
            }
            
            .btn {
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
                    <img src="{{URL::asset('adminlte/img/logoculture__2_-removebg-preview.png')}}" alt="BéninCulture Logo">
                </div>
                <h1 class="title">Codes de Secours</h1>
                <p class="subtitle">Pour l'authentification à deux facteurs</p>
            </div>
            
            <!-- Alerte d'importance -->
            <div class="alert-danger">
                <div class="alert-content">
                    <svg class="alert-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.964-.833-2.732 0L4.346 16.5c-.77.833.192 2.5 1.732 2.5z"/>
                    </svg>
                    <div class="alert-text">
                        <div class="alert-title">Important !</div>
                        <p class="alert-description">
                            Ces codes de secours sont affichés <strong>une seule fois</strong>. 
                            Conservez-les dans un endroit sécurisé. Chaque code ne peut être utilisé 
                            qu'une seule fois pour vous connecter si vous n'avez pas accès à votre 
                            application d'authentification.
                        </p>
                    </div>
                </div>
            </div>
            
            <!-- Conseil d'utilisation -->
            <div class="alert-info">
                <div class="alert-content">
                    <svg class="alert-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                    <div class="alert-text">
                        <div class="alert-title">Conseil de sécurité</div>
                        <p class="alert-description" style="color: #0369a1;">
                            Imprimez ces codes ou écrivez-les sur un papier que vous garderez en sécurité. 
                            Vous pouvez aussi les sauvegarder dans un gestionnaire de mots de passe sécurisé.
                        </p>
                    </div>
                </div>
            </div>
            
            <!-- Grille des codes -->
            <div class="codes-container">
                <div class="codes-grid">
                    @foreach($backupCodes as $index => $code)
                        <div class="code-card">
                            <div class="code-text">{{ $code }}</div>
                        </div>
                    @endforeach
                </div>
            </div>
            
            <!-- Actions -->
            <div class="actions">
                <button onclick="window.print()" class="btn btn-primary">
                    <svg class="btn-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z"/>
                    </svg>
                    Imprimer les codes
                </button>
                
                <a href="{{ route('profile.edit') }}#two-factor" class="btn btn-secondary">
                    <svg class="btn-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                    </svg>
                    Retour au profil
                </a>
            </div>
        </div>
    </div>

    <script>
        // Auto-focus sur le bouton d'impression pour l'accessibilité
        window.addEventListener('load', function() {
            // Préparer l'impression avec un message
            const printButton = document.querySelector('button[onclick="window.print()"]');
            if (printButton) {
                printButton.addEventListener('click', function() {
                    setTimeout(() => {
                        alert('Assurez-vous de conserver l\'impression en lieu sûr !');
                    }, 100);
                });
            }
        });
        
        // Animation des cartes de code au survol
        const codeCards = document.querySelectorAll('.code-card');
        codeCards.forEach(card => {
            card.addEventListener('mouseenter', function() {
                this.style.transform = 'translateY(-4px) scale(1.02)';
            });
            
            card.addEventListener('mouseleave', function() {
                this.style.transform = 'translateY(0) scale(1)';
            });
        });
        
        // Copier un code au clic
        codeCards.forEach((card, index) => {
            card.addEventListener('click', function() {
                const code = this.querySelector('.code-text').textContent;
                navigator.clipboard.writeText(code).then(() => {
                    // Animation de feedback
                    const originalColor = this.style.backgroundColor;
                    this.style.backgroundColor = '#d1fae5';
                    setTimeout(() => {
                        this.style.backgroundColor = originalColor;
                    }, 500);
                });
            });
        });
    </script>
</body>
</html>