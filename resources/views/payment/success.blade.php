<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Paiement Réussi - Culture Bénin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <style>
        :root {
            --primary-color: #2d5016;
            --primary-hover: #1f3510;
            --accent-color: #d4af37;
            --success-color: #28a745;
            --success-light: #d4edda;
            --text-color: #1a331c;
            --border-color: #c8e6c9;
            --background-gradient: linear-gradient(135deg, #f0f9f0 0%, #e8f5e8 50%, #d4edda 100%);
        }
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            background: var(--background-gradient);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
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
        
        .success-container {
            width: 100%;
            max-width: 600px;
            position: relative;
            z-index: 2;
        }
        
        .success-card {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            border: none;
            box-shadow: 
                0 20px 40px rgba(45, 80, 22, 0.1),
                0 8px 24px rgba(45, 80, 22, 0.08),
                inset 0 1px 0 rgba(255, 255, 255, 0.4);
            overflow: hidden;
            animation: cardAppear 0.8s ease-out;
        }
        
        @keyframes cardAppear {
            0% {
                opacity: 0;
                transform: translateY(30px) scale(0.95);
            }
            100% {
                opacity: 1;
                transform: translateY(0) scale(1);
            }
        }
        
        .card-header {
            background: linear-gradient(135deg, var(--success-color), #20c997);
            border-bottom: none;
            padding: 30px 30px 25px;
            position: relative;
            text-align: center;
        }
        
        .card-header::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 100px;
            height: 4px;
            background: var(--accent-color);
            border-radius: 2px;
        }
        
        .header-content {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 20px;
            margin-bottom: 15px;
        }
        
        .logo-circle {
            width: 70px;
            height: 70px;
            background: white;
            border-radius: 50%;
            padding: 10px;
            box-shadow: 
                0 4px 12px rgba(0, 0, 0, 0.1),
                inset 0 1px 3px rgba(255, 255, 255, 0.8);
            border: 2px solid rgba(255, 255, 255, 0.3);
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
        }
        
        .logo-circle img {
            max-width: 100%;
            max-height: 100%;
            filter: drop-shadow(0 2px 4px rgba(45, 80, 22, 0.2));
        }
        
        .header-text h4 {
            color: white;
            font-weight: 800;
            margin-bottom: 5px;
            font-size: 28px;
        }
        
        .header-text p {
            color: rgba(255, 255, 255, 0.9);
            font-size: 16px;
            margin: 0;
        }
        
        .card-body {
            padding: 40px 30px 30px;
            text-align: center;
        }
        
        .success-icon {
            width: 120px;
            height: 120px;
            background: linear-gradient(135deg, var(--success-color), #20c997);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 25px;
            position: relative;
            animation: iconPulse 2s infinite;
        }
        
        @keyframes iconPulse {
            0% { box-shadow: 0 0 0 0 rgba(40, 167, 69, 0.4); }
            70% { box-shadow: 0 0 0 20px rgba(40, 167, 69, 0); }
            100% { box-shadow: 0 0 0 0 rgba(40, 167, 69, 0); }
        }
        
        .success-icon i {
            color: white;
            font-size: 60px;
        }
        
        .thank-you-title {
            color: var(--text-color);
            font-weight: 700;
            margin-bottom: 10px;
            font-size: 28px;
        }
        
        .thank-you-subtitle {
            color: #6c757d;
            font-size: 16px;
            margin-bottom: 30px;
            max-width: 400px;
            margin-left: auto;
            margin-right: auto;
        }
        
        .payment-details {
            background: var(--success-light);
            border-radius: 15px;
            padding: 25px;
            margin: 25px auto;
            border-left: 5px solid var(--success-color);
            max-width: 450px;
            text-align: left;
        }
        
        .detail-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px 0;
            border-bottom: 1px solid rgba(40, 167, 69, 0.2);
        }
        
        .detail-item:last-child {
            border-bottom: none;
        }
        
        .detail-label {
            color: var(--text-color);
            font-weight: 600;
            font-size: 14px;
            display: flex;
            align-items: center;
            gap: 8px;
        }
        
        .detail-label i {
            color: var(--success-color);
            font-size: 16px;
        }
        
        .detail-value {
            color: var(--text-color);
            font-weight: 700;
            font-size: 15px;
            text-align: right;
        }
        
        .email-confirmation {
            background: #f8f9fa;
            border-radius: 10px;
            padding: 15px;
            margin: 25px auto;
            max-width: 450px;
        }
        
        .email-confirmation i {
            color: var(--success-color);
            margin-right: 8px;
        }
        
        .action-buttons {
            display: flex;
            justify-content: center;
            gap: 15px;
            margin-top: 30px;
            flex-wrap: wrap;
        }
        
        .btn {
            padding: 12px 28px;
            border-radius: 10px;
            font-weight: 600;
            font-size: 16px;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            min-width: 180px;
        }
        
        .btn-primary {
            background: linear-gradient(135deg, var(--primary-color), var(--primary-hover));
            border: none;
            box-shadow: 0 6px 18px rgba(45, 80, 22, 0.3);
        }
        
        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(45, 80, 22, 0.4);
            background: linear-gradient(135deg, var(--primary-hover), var(--primary-color));
        }
        
        .btn-outline-secondary {
            border: 2px solid var(--border-color);
            color: var(--text-color);
            background: white;
        }
        
        .btn-outline-secondary:hover {
            border-color: var(--primary-color);
            background: var(--secondary-color);
            transform: translateY(-2px);
        }
        
        .confetti {
            position: absolute;
            width: 10px;
            height: 10px;
            background: var(--accent-color);
            border-radius: 50%;
            animation: confettiFall 5s linear infinite;
        }
        
        @keyframes confettiFall {
            0% {
                transform: translateY(-100px) rotate(0deg);
                opacity: 1;
            }
            100% {
                transform: translateY(100vh) rotate(720deg);
                opacity: 0;
            }
        }
        
        @media (max-width: 576px) {
            .success-container {
                max-width: 100%;
            }
            
            .card-body {
                padding: 30px 20px;
            }
            
            .header-content {
                flex-direction: column;
                gap: 15px;
            }
            
            .header-text h4 {
                font-size: 24px;
            }
            
            .action-buttons {
                flex-direction: column;
                align-items: center;
            }
            
            .btn {
                width: 100%;
                max-width: 250px;
            }
            
            .payment-details {
                padding: 20px 15px;
            }
        }
    </style>
</head>
<body>
    <!-- Confetti animation -->
    <div id="confetti-container"></div>
    
    <div class="success-container">
        <div class="card success-card">
            <div class="card-header">
                <div class="header-content">
                    <div class="logo-circle">
                        <img src="{{URL::asset('adminlte/img/logoculture__2_-removebg-preview.png')}}" alt="Culture Bénin">
                    </div>
                    <div class="header-text">
                        <h4>Paiement Réussi</h4>
                        <p>Culture Bénin - Merci pour votre soutien</p>
                    </div>
                </div>
            </div>
            
            <div class="card-body">
                <div class="success-icon">
                    <i class="bi bi-check-circle-fill"></i>
                </div>
                
                <h2 class="thank-you-title">Merci pour votre contribution !</h2>
                <p class="thank-you-subtitle">
                    Votre paiement a été traité avec succès. Vous soutenez la préservation de notre patrimoine culturel.
                </p>
                
                <div class="payment-details">
                    <div class="detail-item">
                        <span class="detail-label">
                            <i class="bi bi-hash"></i>Référence
                        </span>
                        <span class="detail-value">{{ $payment->reference }}</span>
                    </div>
                    
                    <div class="detail-item">
                        <span class="detail-label">
                            <i class="bi bi-cash-stack"></i>Montant
                        </span>
                        <span class="detail-value">{{ number_format($payment->amount, 0, ',', ' ') }} XOF</span>
                    </div>
                    
                    <div class="detail-item">
                        <span class="detail-label">
                            <i class="bi bi-calendar-check"></i>Date
                        </span>
                        <span class="detail-value">{{ $payment->paid_at->format('d/m/Y H:i') }}</span>
                    </div>
                    
                    <div class="detail-item">
                        <span class="detail-label">
                            <i class="bi bi-credit-card"></i>Méthode
                        </span>
                        <span class="detail-value">{{ $payment->payment_method }}</span>
                    </div>
                </div>
                
                <div class="email-confirmation">
                    <p class="mb-0">
                        <i class="bi bi-envelope-check"></i>
                        Un reçu de confirmation a été envoyé à 
                        <strong>{{ $payment->customer_email }}</strong>
                    </p>
                </div>
                
                <div class="action-buttons">
                    <a href="{{ route('payment.form') }}" class="btn btn-primary">
                        <i class="bi bi-plus-circle me-2"></i>
                        Nouveau paiement
                    </a>
                    <a href=route('front.show', ['id' => $contenuId]) class="btn btn-primary">
                        Voir le contenu
                    </a>
                </div>
                
                <div class="mt-4 text-muted small">
                    <p class="mb-0">
                        <i class="bi bi-shield-check text-success me-2"></i>
                        Transaction sécurisée et cryptée
                    </p>
                </div>
            </div>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Animation de confetti
        function createConfetti() {
            const container = document.getElementById('confetti-container');
            const colors = ['#2d5016', '#d4af37', '#28a745', '#20c997', '#ffc107'];
            
            for (let i = 0; i < 50; i++) {
                const confetti = document.createElement('div');
                confetti.className = 'confetti';
                
                // Position aléatoire
                confetti.style.left = Math.random() * 100 + 'vw';
                confetti.style.background = colors[Math.floor(Math.random() * colors.length)];
                
                // Taille aléatoire
                const size = Math.random() * 10 + 5;
                confetti.style.width = size + 'px';
                confetti.style.height = size + 'px';
                
                // Animation aléatoire
                const delay = Math.random() * 5;
                const duration = Math.random() * 3 + 3;
                confetti.style.animationDelay = delay + 's';
                confetti.style.animationDuration = duration + 's';
                
                container.appendChild(confetti);
                
                // Supprimer après animation
                setTimeout(() => {
                    confetti.remove();
                }, (delay + duration) * 1000);
            }
        }
        
        // Créer confetti initial
        createConfetti();
        
        // Répéter toutes les 5 secondes
        setInterval(createConfetti, 5000);
        
        // Animation d'apparition progressive
        document.addEventListener('DOMContentLoaded', function() {
            const elements = document.querySelectorAll('.detail-item, .email-confirmation, .action-buttons');
            elements.forEach((element, index) => {
                element.style.opacity = '0';
                element.style.transform = 'translateY(20px)';
                
                setTimeout(() => {
                    element.style.transition = 'opacity 0.5s ease, transform 0.5s ease';
                    element.style.opacity = '1';
                    element.style.transform = 'translateY(0)';
                }, 300 + (index * 100));
            });
        });
        
        // Message de confirmation au clic sur les boutons
        document.querySelectorAll('.btn').forEach(button => {
            button.addEventListener('click', function(e) {
                if (this.href.includes('payment.form')) {
                    // Animation de départ
                    this.innerHTML = '<i class="bi bi-arrow-clockwise spin me-2"></i>Redirection...';
                    this.disabled = true;
                }
            });
        });
        
        // Ajouter une classe pour l'animation de rotation
        const style = document.createElement('style');
        style.textContent = `
            .bi-arrow-clockwise.spin {
                animation: spin 1s linear infinite;
            }
            @keyframes spin {
                from { transform: rotate(0deg); }
                to { transform: rotate(360deg); }
            }
        `;
        document.head.appendChild(style);
    </script>
</body>
</html>