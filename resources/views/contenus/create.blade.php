@extends('layout')

@section('title', 'Créer un Contenu')
@section('page_title', 'Créer un Contenu')

@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Créer un nouveau Contenu Culturel</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.contenus.store') }}" method="POST">
                @csrf
                
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group mb-3">
                            <label for="titre" class="form-label">Titre *</label>
                            <input type="text" class="form-control @error('titre') is-invalid @enderror" 
                                   id="titre" name="titre" value="{{ old('titre') }}" 
                                   placeholder="Titre du contenu culturel" required>
                            @error('titre')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="col-md-12">
                        <div class="form-group mb-3">
                            <label for="texte" class="form-label">Contenu *</label>
                            <textarea class="form-control @error('texte') is-invalid @enderror" 
                                      id="texte" name="texte" rows="6" 
                                      placeholder="Rédigez votre contenu culturel ici..." required>{{ old('texte') }}</textarea>
                            @error('texte')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="col-md-6">
                        <div class="form-group mb-3">
                            <label for="statut" class="form-label">Statut *</label>
                            <select class="form-control @error('statut') is-invalid @enderror" id="statut" name="statut" required>
                                <option value="">Sélectionnez un statut...</option>
                                <option value="Brouillon" {{ old('statut') == 'Brouillon' ? 'selected' : '' }}>Brouillon</option>
                                <option value="Publié" {{ old('statut') == 'Publié' ? 'selected' : '' }}>Publié</option>
                                <option value="En attente" {{ old('statut') == 'En attente' ? 'selected' : '' }}>En attente</option>
                            </select>
                            @error('statut')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    
                    <!-- SELECT TYPE DE CONTENU -->
                    <div class="col-md-6">
                        <div class="form-group mb-3">
                            <label for="type_contenu_id" class="form-label">Type de contenu *</label>
                            <select class="form-control @error('type_contenu_id') is-invalid @enderror" id="type_contenu_id" name="type_contenu_id" required>
                                <option value="">Sélectionnez un type...</option>
                                @foreach($typecontenus as $typecontenu)
                                    <option value="{{ $typecontenu->id }}" {{ old('type_contenu_id') == $typecontenu->id ? 'selected' : '' }}>
                                        {{ $typecontenu->nom }}
                                    </option>
                                @endforeach
                            </select>
                            @error('type_contenu_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    
                    <!-- SELECT AUTEUR -->
                    <div class="col-md-6">
                        <div class="form-group mb-3">
                            <label for="auteur_id" class="form-label">Auteur *</label>
                            <select class="form-control @error('auteur_id') is-invalid @enderror" id="auteur_id" name="auteur_id" required>
                                <option value="">Sélectionnez un auteur...</option>
                                @foreach($utilisateurs as $utilisateur)
                                    <option value="{{ $utilisateur->id }}" {{ old('auteur_id') == $utilisateur->id ? 'selected' : '' }}>
                                        {{ $utilisateur->prenom }} {{ $utilisateur->nom }}
                                    </option>
                                @endforeach
                            </select>
                            @error('auteur_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    
                    <!-- SELECT RÉGION -->
                    <div class="col-md-6">
                        <div class="form-group mb-3">
                            <label for="region_id" class="form-label">Région *</label>
                            <select class="form-control @error('region_id') is-invalid @enderror" id="region_id" name="region_id" required>
                                <option value="">Sélectionnez une région...</option>
                                @foreach($regions as $region)
                                    <option value="{{ $region->id }}" {{ old('region_id') == $region->id ? 'selected' : '' }}>
                                        {{ $region->nom_region }}
                                    </option>
                                @endforeach
                            </select>
                            @error('region_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="mt-4">
                    <button type="submit" class="btn btn-success">
                        <i class="bi bi-check-circle"></i> Créer le contenu
                    </button>
                    <a href="{{ route('admin.contenus.index') }}" class="btn btn-secondary">
                        <i class="bi bi-arrow-left"></i> Retour
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection