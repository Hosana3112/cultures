@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Activer l'authentification à deux facteurs</div>

                <div class="card-body">
                    <div class="alert alert-info">
                        <strong>Étape 1:</strong> Scannez le QR code avec Google Authenticator
                    </div>
                    
                    <!-- QR Code -->
                    <div class="text-center mb-4">
                        <img src="{{ $qrCode }}" alt="QR Code" class="img-fluid">
                    </div>
                    
                    <!-- Code secret -->
                    <div class="alert alert-warning">
                        <strong>Code secret:</strong> {{ $secret }}
                        <small class="d-block mt-1">
                            Vous pouvez entrer ce code manuellement si vous ne pouvez pas scanner le QR code.
                        </small>
                    </div>
                    
                    <!-- Codes de secours -->
                    <div class="alert alert-danger">
                        <strong>Codes de secours:</strong>
                        <p class="mb-2">Sauvegardez ces codes dans un endroit sécurisé. Chaque code ne peut être utilisé qu'une fois.</p>
                        <div class="row">
                            @foreach($backupCodes as $code)
                            <div class="col-md-6 mb-2">
                                <code>{{ $code }}</code>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    
                    <!-- Formulaire de vérification -->
                    <div class="mt-4">
                        <div class="alert alert-success">
                            <strong>Étape 2:</strong> Entrez le code à 6 chiffres de Google Authenticator
                        </div>
                        
                        <form method="POST" action="{{ route('two-factor.verify') }}">
                            @csrf
                            
                            <div class="mb-3">
                                <label for="code" class="form-label">Code de vérification</label>
                                <input type="text" 
                                       class="form-control @error('code') is-invalid @enderror" 
                                       id="code" 
                                       name="code" 
                                       maxlength="6" 
                                       required
                                       autocomplete="off">
                                @error('code')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            
                            <div class="d-grid gap-2">
                                <button type="submit" class="btn btn-primary">Vérifier et activer</button>
                                <a href="{{ route('dashboard') }}" class="btn btn-secondary">Annuler</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection