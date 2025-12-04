@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">Vérification à deux facteurs</div>

                <div class="card-body">
                    <div class="alert alert-info mb-4">
                        <i class="fas fa-shield-alt"></i> 
                        Pour continuer, veuillez entrer le code de vérification de votre application d'authentification.
                    </div>
                    
                    <form method="POST" action="{{ route('two-factor.login') }}">
                        @csrf
                        
                        <div class="mb-3">
                            <label for="code" class="form-label">Code à 6 chiffres</label>
                            <input type="text" 
                                   class="form-control @error('code') is-invalid @enderror" 
                                   id="code" 
                                   name="code" 
                                   maxlength="6" 
                                   required
                                   autofocus
                                   autocomplete="off"
                                   placeholder="123456">
                            @error('code')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        
                        <div class="mb-3">
                            <div class="form-text">
                                <a href="#" data-bs-toggle="modal" data-bs-target="#backupCodesModal">
                                    <i class="fas fa-key"></i> Utiliser un code de secours
                                </a>
                            </div>
                        </div>
                        
                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary">Vérifier</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal pour les codes de secours -->
<div class="modal fade" id="backupCodesModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Utiliser un code de secours</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('two-factor.backup-login') }}">
                    @csrf
                    
                    <div class="mb-3">
                        <label for="backup_code" class="form-label">Code de secours</label>
                        <input type="text" 
                               class="form-control" 
                               id="backup_code" 
                               name="backup_code" 
                               required
                               placeholder="Entrez un code de secours">
                        <div class="form-text">
                            Chaque code de secours ne peut être utilisé qu'une seule fois.
                        </div>
                    </div>
                    
                    <div class="d-grid">
                        <button type="submit" class="btn btn-warning">Utiliser ce code</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection