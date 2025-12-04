<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Paiement Sécurisé - Culture Bénin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        :root {
            --primary-color: #2d5016;
            --primary-hover: #1f3510;
            --accent-color: #d4af37;
            --secondary-color: #e8f5e8;
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
        
        .payment-container {
            width: 100%;
            max-width: 500px;
            position: relative;
            z-index: 2;
        }
        
        .payment-card {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            border: none;
            box-shadow: 
                0 20px 40px rgba(45, 80, 22, 0.1),
                0 8px 24px rgba(45, 80, 22, 0.08),
                inset 0 1px 0 rgba(255, 255, 255, 0.4);
            overflow: hidden;
        }
        
        .card-header {
            background: linear-gradient(135deg, var(--primary-color), var(--primary-hover));
            border-bottom: none;
            padding: 30px 30px 25px;
            position: relative;
        }
        
        .card-header::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 80px;
            height: 4px;
            background: var(--accent-color);
            border-radius: 2px;
        }
        
        .header-content {
            display: flex;
            align-items: center;
            gap: 15px;
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
            font-size: 24px;
        }
        
        .header-text p {
            color: rgba(255, 255, 255, 0.9);
            font-size: 14px;
            margin: 0;
        }
        
        .security-badge {
            display: flex;
            align-items: center;
            gap: 8px;
            justify-content: center;
            color: white;
            font-size: 13px;
            padding: 8px 15px;
            background: rgba(255, 255, 255, 0.15);
            border-radius: 20px;
            margin-top: 10px;
        }
        
        .card-body {
            padding: 30px;
        }
        
        .form-label {
            font-weight: 600;
            color: var(--text-color);
            margin-bottom: 8px;
            font-size: 14px;
        }
        
        .form-control {
            border: 2px solid var(--border-color);
            border-radius: 10px;
            padding: 12px 16px;
            font-size: 14px;
            transition: all 0.3s ease;
            background: white;
        }
        
        .form-control:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 3px rgba(45, 80, 22, 0.1);
            outline: none;
        }
        
        .form-text {
            font-size: 12px;
            color: #6c757d;
            margin-top: 5px;
        }
        
        .alert {
            border-radius: 10px;
            border: none;
            padding: 15px;
            font-size: 14px;
        }
        
        .btn-primary {
            background: linear-gradient(135deg, var(--primary-color), var(--primary-hover));
            border: none;
            border-radius: 10px;
            padding: 16px;
            font-weight: 600;
            font-size: 16px;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            box-shadow: 0 8px 20px rgba(45, 80, 22, 0.3);
        }
        
        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 12px 25px rgba(45, 80, 22, 0.4);
            background: linear-gradient(135deg, var(--primary-hover), var(--primary-color));
        }
        
        .btn-primary:active {
            transform: translateY(0);
        }
        
        .payment-partner {
            text-align: center;
            margin-top: 30px;
            padding-top: 25px;
            border-top: 1px solid var(--border-color);
        }
        
        .payment-partner img {
            height: 40px;
            filter: drop-shadow(0 2px 4px rgba(0, 0, 0, 0.1));
        }
        
        .partner-text {
            color: #6c757d;
            font-size: 13px;
            margin-top: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 5px;
        }
        
        .payment-methods {
            display: flex;
            justify-content: center;
            gap: 15px;
            margin-top: 20px;
        }
        
        .payment-method {
            width: 50px;
            height: 30px;
            background: white;
            border-radius: 5px;
            display: flex;
            align-items: center;
            justify-content: center;
            border: 1px solid var(--border-color);
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
        }
        
        .payment-method i {
            color: #555;
            font-size: 18px;
        }
        
        @media (max-width: 576px) {
            .payment-container {
                max-width: 100%;
            }
            
            .card-body {
                padding: 25px 20px;
            }
            
            .header-content {
                flex-direction: column;
                text-align: center;
                gap: 10px;
            }
            
            .header-text h4 {
                font-size: 20px;
            }
        }
    </style>
</head>
<body>
    <div class="payment-container">
        <div class="card payment-card">
            <div class="card-header">
                <div class="header-content">
                    <div class="logo-circle">
                        <img src="{{URL::asset('adminlte/img/logoculture__2_-removebg-preview.png')}}" alt="Culture Bénin">
                    </div>
                    <div class="header-text">
                        <h4>Paiement Sécurisé</h4>
                        <p>Culture Bénin - Soutenez notre patrimoine</p>
                    </div>
                </div>
                
                <div class="security-badge">
                    <i class="fas fa-lock"></i>
                    <span>Transaction 100% sécurisée</span>
                </div>
            </div>
            
            <div class="card-body">
                @if(session('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <i class="fas fa-exclamation-triangle me-2"></i>
                        {{ session('error') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                
                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <i class="fas fa-check-circle me-2"></i>
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                
                <form method="POST" action="{{ route('payment.process') }}" id="paymentForm">
                    @csrf
                    
                    <div class="mb-4">
                        <label for="amount" class="form-label">Montant à régler (XOF)</label>
                        <div class="input-group">
                            <span class="input-group-text bg-light border-end-0">
                                <i class="fas fa-money-bill-wave text-primary"></i>
                            </span>
                            <input type="number" class="form-control border-start-0" id="amount" name="amount" 
                                   value="{{ old('amount', 1000) }}" min="100" required>
                        </div>
                        <div class="form-text d-flex justify-content-between mt-2">
                            <span>Minimum: 100 XOF</span>
                            <span id="amountPreview" class="text-primary fw-bold"></span>
                        </div>
                    </div>
                    
                    <div class="mb-4">
                        <label for="customer_name" class="form-label">
                            <i class="fas fa-user text-primary me-2"></i>Nom complet
                        </label>
                        <input type="text" class="form-control" id="customer_name" name="customer_name" 
                               value="{{ old('customer_name') }}" required placeholder="Votre nom et prénom">
                    </div>
                    
                    <div class="mb-4">
                        <label for="customer_email" class="form-label">
                            <i class="fas fa-envelope text-primary me-2"></i>Adresse email
                        </label>
                        <input type="email" class="form-control" id="customer_email" name="customer_email" 
                               value="{{ old('customer_email') }}" required placeholder="votre@email.com">
                    </div>
                    
                    <div class="mb-4">
                        <label for="customer_phone" class="form-label">
                            <i class="fas fa-phone text-primary me-2"></i>Téléphone
                        </label>
                        <input type="text" class="form-control" id="customer_phone" name="customer_phone" 
                               value="{{ old('customer_phone') }}" placeholder="+229 XX XX XX XX">
                    </div>
                    
                    <div class="mb-4">
                        <label for="description" class="form-label">
                            <i class="fas fa-file-alt text-primary me-2"></i>Description
                        </label>
                        <textarea class="form-control" id="description" name="description" rows="2" 
                                  placeholder="Objet de votre contribution...">{{ old('description') }}</textarea>
                    </div>
                    
                    <div class="d-grid mb-4">
                        <button type="submit" class="btn btn-primary btn-lg" id="payButton">
                            <i class="fas fa-lock me-2"></i>
                            Payer maintenant
                        </button>
                    </div>
                </form>
                
                <div class="payment-partner">
                    <img src="https://fedapay.com/images/logo.png" alt="FedaPay" class="mb-3">
                    <p class="partner-text">
                        <i class="fas fa-shield-alt text-success me-2"></i>
                        Paiement 100% sécurisé par FedaPay
                    </p>
                    
                    <div class="payment-methods">
                        <div class="payment-method" title="Mobile Money">
                            <i class="fas fa-mobile-alt"></i>
                        </div>
                        <div class="payment-method" title="Carte Bancaire">
                            <i class="far fa-credit-card"></i>
                        </div>
                        <div class="payment-method" title="Visa">
                            <i class="fab fa-cc-visa"></i>
                        </div>
                        <div class="payment-method" title="Mastercard">
                            <i class="fab fa-cc-mastercard"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Aperçu du montant en temps réel
        const amountInput = document.getElementById('amount');
        const amountPreview = document.getElementById('amountPreview');
        
        function formatAmount(amount) {
            return new Intl.NumberFormat('fr-FR').format(amount) + ' XOF';
        }
        
        amountInput.addEventListener('input', function() {
            const amount = parseInt(this.value) || 0;
            amountPreview.textContent = formatAmount(amount);
        });
        
        // Initialiser l'aperçu
        amountPreview.textContent = formatAmount(parseInt(amountInput.value) || 1000);
        
        // Validation du formulaire
        document.getElementById('paymentForm').addEventListener('submit', function(e) {
            const amount = parseInt(amountInput.value);
            const name = document.getElementById('customer_name').value;
            const email = document.getElementById('customer_email').value;
            
            if (amount < 100) {
                e.preventDefault();
                alert('Le montant minimum est de 100 XOF');
                amountInput.focus();
                return;
            }
            
            if (!name.trim()) {
                e.preventDefault();
                alert('Veuillez saisir votre nom complet');
                document.getElementById('customer_name').focus();
                return;
            }
            
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailRegex.test(email)) {
                e.preventDefault();
                alert('Veuillez saisir une adresse email valide');
                document.getElementById('customer_email').focus();
                return;
            }
            
            // Animation du bouton
            const payButton = document.getElementById('payButton');
            payButton.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i>Traitement en cours...';
            payButton.disabled = true;
        });
        
        // Animation d'entrée
        document.addEventListener('DOMContentLoaded', function() {
            const card = document.querySelector('.payment-card');
            card.style.opacity = '0';
            card.style.transform = 'translateY(20px)';
            
            setTimeout(() => {
                card.style.transition = 'opacity 0.5s ease, transform 0.5s ease';
                card.style.opacity = '1';
                card.style.transform = 'translateY(0)';
            }, 100);
        });
    </script>
</body>
</html>