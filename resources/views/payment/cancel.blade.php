<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Paiement annulé</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card border-warning text-center">
                    <div class="card-header bg-warning text-white">
                        <h4><i class="bi bi-exclamation-triangle"></i> Paiement annulé</h4>
                    </div>
                    
                    <div class="card-body">
                        <div class="mb-4">
                            <i class="bi bi-x-circle-fill text-warning" style="font-size: 4rem;"></i>
                        </div>
                        
                        <h3>Paiement interrompu</h3>
                        <p class="lead">Vous avez annulé le processus de paiement.</p>
                        
                        <div class="alert alert-warning mt-4">
                            <p>Aucun prélèvement n'a été effectué sur votre compte.</p>
                        </div>
                        
                        <div class="mt-4">
                            <a href="{{ route('payment.form') }}" class="btn btn-primary">
                                Réessayer
                            </a>
                            <a href="/" class="btn btn-outline-secondary">
                                Accueil
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>