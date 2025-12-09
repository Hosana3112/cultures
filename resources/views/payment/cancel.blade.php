<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Paiement Annulé - Culture Bénin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        :root {
            --primary-color: #2d5016;
            --accent-color: #d4af37;
            --warning-color: #ffc107;
            --warning-light: #fff3cd;
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
        
        .cancel-container {
            width: 100%;
            max-width: 500px;
            position: relative;
            z-index: 2;
        }
        
        .cancel-card {
            background: white;
            border-radius: 15px;
            border: none;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }
        
        .card-header {
            background: linear-gradient(135deg, var(--warning-color), #ffb300);
            border-bottom: none;
            padding: 30px;
            text-align: center;
            color: white;
        }
        
        .card-body {
            padding: 40px 30px;
            text-align: center;
        }
        
        .warning-icon {
            font-size: 80px;
            color: var(--warning-color);
            margin-bottom: 20px;
        }
        
        .btn-primary {
            background: var(--primary-color);
            border: none;
            padding: 12px 30px;
            border-radius: 8px;
        }
        
        .btn-primary:hover {
            background: #1f3510;
        }
        
        .btn-outline-secondary {
            border: 1px solid var(--border-color);
            color: var(--text-color);
        }
        
        .btn-outline-secondary:hover {
            background: var(--border-color);
        }
        
        @media (max-width: 576px) {
            .card-body {
                padding: 30px 20px;
            }
        }
    </style>
</head>
<body>
    <div class="cancel-container">
        <div class="card cancel-card">
            <div class="card-header">
                <h4><i class="fas fa-exclamation-triangle me-2"></i> Paiement Annulé</h4>
            </div>
            
            <div class="card-body">
                <div class="warning-icon">
                    <i class="fas fa-times-circle"></i>
                </div>
                
                <h3 class="mb-3">Paiement Interrompu</h3>
                <p class="lead mb-4">Vous avez annulé le processus de paiement.</p>
                
                <div class="alert alert-warning mb-4">
                    <i class="fas fa-info-circle me-2"></i>
                    <strong>Aucun prélèvement n'a été effectué</strong> sur votre compte.
                </div>
                
                <div class="mt-4">
                    @if(isset($contenu_id))
                        <a href="{{ route('admin.contenus.show', ['contenu' => $contenu_id]) }}" class="btn btn-primary me-2">
                            <i class="fas fa-arrow-left me-2"></i>
                            Retour au contenu
                        </a>
                    @endif
                    
                    <a href="{{ route('payment.form') }}" class="btn btn-primary me-2">
                        <i class="fas fa-redo me-2"></i>
                        Réessayer le paiement
                    </a>
                    
                    <a href="/" class="btn btn-outline-secondary">
                        <i class="fas fa-home me-2"></i>
                        Retour à l'accueil
                    </a>
                </div>
            </div>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>