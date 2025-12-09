@extends('layout')

@section('title', 'Modifier le Contenu')
@section('page_title', 'Modifier le Contenu')
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ url('/contenus') }}">Contenus</a></li>
    <li class="breadcrumb-item active">Modifier</li>
@endsection

@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Modifier le Contenu</h3>
        </div>
        <div class="card-body">
            <!-- CORRECTION ICI : Supprimer /admin/ de l'URL -->
            <form action="{{ url('/contenus/' . $contenu->id) }}" method="POST">
                @csrf
                @method('PUT')
                
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group mb-3">
                            <label for="titre" class="form-label">Titre *</label>
                            <input type="text" class="form-control @error('titre') is-invalid @enderror" 
                                   id="titre" name="titre" value="{{ old('titre', $contenu->titre) }}" 
                                   placeholder="Titre du contenu culturel" required>
                            @error('titre')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="col-md-6">
                        <div class="form-group mb-3">
                            <label for="type_contenu_id" class="form-label">Type de contenu *</label>
                            <select class="form-control @error('type_contenu_id') is-invalid @enderror" id="type_contenu_id" name="type_contenu_id" required>
                                <option value="">Sélectionnez un type...</option>
                                @php
                                    $typeContenues = \App\Models\TypeContenue::all();
                                @endphp
                                @foreach($typeContenues as $type)
                                    <option value="{{ $type->id }}" {{ old('type_contenu_id', $contenu->type_contenu_id) == $type->id ? 'selected' : '' }}>
                                        {{ $type->nom }}
                                    </option>
                                @endforeach
                            </select>
                            @error('type_contenu_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="col-md-6">
                        <div class="form-group mb-3">
                            <label for="statut" class="form-label">Statut *</label>
                            <select class="form-control @error('statut') is-invalid @enderror" id="statut" name="statut" required>
                                <option value="">Sélectionnez un statut...</option>
                                <option value="Brouillon" {{ old('statut', $contenu->statut) == 'Brouillon' ? 'selected' : '' }}>Brouillon</option>
                                <option value="En attente" {{ old('statut', $contenu->statut) == 'En attente' ? 'selected' : '' }}>En attente</option>
                                <option value="Publié" {{ old('statut', $contenu->statut) == 'Publié' ? 'selected' : '' }}>Publié</option>
                                <option value="Archivé" {{ old('statut', $contenu->statut) == 'Archivé' ? 'selected' : '' }}>Archivé</option>
                            </select>
                            @error('statut')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="col-md-6">
                        <div class="form-group mb-3">
                            <label for="auteur_id" class="form-label">Auteur *</label>
                            <select class="form-control @error('auteur_id') is-invalid @enderror" id="auteur_id" name="auteur_id" required>
                                <option value="">Sélectionnez un auteur...</option>
                                @php
                                    $auteurs = \App\Models\Utilisateur::where('role_id', 3)->orWhere('role_id', 4)->get();
                                @endphp
                                @foreach($auteurs as $auteur)
                                    <option value="{{ $auteur->id }}" {{ old('auteur_id', $contenu->auteur_id) == $auteur->id ? 'selected' : '' }}>
                                        {{ $auteur->prenom }} {{ $auteur->nom }} ({{ $auteur->email }})
                                    </option>
                                @endforeach
                            </select>
                            @error('auteur_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="col-md-6">
                        <div class="form-group mb-3">
                            <label for="region_id" class="form-label">Région *</label>
                            <select class="form-control @error('region_id') is-invalid @enderror" id="region_id" name="region_id" required>
                                <option value="">Sélectionnez une région...</option>
                                @php
                                    $regions = \App\Models\Region::all();
                                @endphp
                                @foreach($regions as $region)
                                    <option value="{{ $region->id }}" {{ old('region_id', $contenu->region_id) == $region->id ? 'selected' : '' }}>
                                        {{ $region->nom_region }}
                                    </option>
                                @endforeach
                            </select>
                            @error('region_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="col-md-6">
                        <div class="form-group mb-3">
                            <label for="parent_id" class="form-label">Contenu parent</label>
                            <select class="form-control @error('parent_id') is-invalid @enderror" id="parent_id" name="parent_id">
                                <option value="">Aucun (contenu original)</option>
                                @php
                                    $contenusParents = \App\Models\Contenu::where('id', '!=', $contenu->id)->get();
                                @endphp
                                @foreach($contenusParents as $contenuParent)
                                    <option value="{{ $contenuParent->id }}" {{ old('parent_id', $contenu->parent_id) == $contenuParent->id ? 'selected' : '' }}>
                                        {{ $contenuParent->titre }}
                                    </option>
                                @endforeach
                            </select>
                            @error('parent_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="col-md-6">
                        <div class="form-group mb-3">
                            <label for="moderateur_id" class="form-label">Modérateur</label>
                            <select class="form-control @error('moderateur_id') is-invalid @enderror" id="moderateur_id" name="moderateur_id">
                                <option value="">Aucun modérateur</option>
                                @php
                                    $moderateurs = \App\Models\Utilisateur::where('role_id', 2)->get();
                                @endphp
                                @foreach($moderateurs as $moderateur)
                                    <option value="{{ $moderateur->id }}" {{ old('moderateur_id', $contenu->moderateur_id) == $moderateur->id ? 'selected' : '' }}>
                                        {{ $moderateur->prenom }} {{ $moderateur->nom }}
                                    </option>
                                @endforeach
                            </select>
                            @error('moderateur_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="col-md-6">
                        <div class="form-group mb-3">
                            <label for="date_validation" class="form-label">Date de validation</label>
                            <input type="datetime-local" class="form-control @error('date_validation') is-invalid @enderror" 
                                   id="date_validation" name="date_validation" 
                                   value="{{ old('date_validation', $contenu->date_validation ? $contenu->date_validation->format('Y-m-d\TH:i') : '') }}">
                            @error('date_validation')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="col-md-12">
                        <div class="form-group mb-3">
                            <label for="texte" class="form-label">Contenu *</label>
                            <textarea class="form-control @error('texte') is-invalid @enderror" 
                                      id="texte" name="texte" rows="12" 
                                      placeholder="Rédigez votre contenu culturel ici..." required>{{ old('texte', $contenu->texte) }}</textarea>
                            @error('texte')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="mt-4">
                    <a href="{{ route('admin.contenus.index') }}" class="btn btn-warning">
                        <i class="bi bi-pencil"></i> Modifier le contenu
                    </a>
                    <!-- CORRECTION ICI aussi pour le lien de retour -->
                    <a href="{{ route('admin.contenus.index') }}" class="btn btn-secondary">
                        <i class="bi bi-arrow-left"></i> Retour
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection