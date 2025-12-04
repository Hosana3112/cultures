@extends('layout')

@section('title', 'Modifier le Commentaire')
@section('page_title', 'Modifier le Commentaire')
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ url('/admin/commentaires') }}">Commentaires</a></li>
    <li class="breadcrumb-item active">Modifier</li>
@endsection

@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Modifier le Commentaire</h3>
        </div>
        <div class="card-body">
            <form action="{{ url('/admin/commentaires/' . $commentaire->id_commentaire) }}" method="POST">
                @csrf
                @method('PUT')
                
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group mb-3">
                            <label for="user_id" class="form-label">Utilisateur *</label>
                            <select class="form-control @error('user_id') is-invalid @enderror" id="user_id" name="user_id" required>
                                <option value="">Sélectionnez un utilisateur...</option>
                                @foreach($utilisateurs as $utilisateur)
                                    <option value="{{ $utilisateur->id }}" {{ old('user_id', $commentaire->user_id) == $utilisateur->id ? 'selected' : '' }}>
                                        {{ $utilisateur->prenom }} {{ $utilisateur->nom }} ({{ $utilisateur->email }})
                                    </option>
                                @endforeach
                            </select>
                            @error('user_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="col-md-6">
                        <div class="form-group mb-3">
                            <label for="contenu_id" class="form-label">Contenu *</label>
                            <select class="form-control @error('contenu_id') is-invalid @enderror" id="contenu_id" name="contenu_id" required>
                                <option value="">Sélectionnez un contenu...</option>
                                @foreach($contenus as $contenu)
                                    <option value="{{ $contenu->id }}" {{ old('contenu_id', $commentaire->contenu_id) == $contenu->id ? 'selected' : '' }}>
                                        {{ $contenu->titre }} ({{ $contenu->typeContenu->nom ?? 'Sans type' }})
                                    </option>
                                @endforeach
                            </select>
                            @error('contenu_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="col-md-12">
                        <div class="form-group mb-3">
                            <label for="texte" class="form-label">Commentaire *</label>
                            <textarea class="form-control @error('texte') is-invalid @enderror" 
                                      id="texte" name="texte" rows="4" 
                                      placeholder="Rédigez votre commentaire ici..." required>{{ old('texte', $commentaire->texte) }}</textarea>
                            @error('texte')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror>
                        </div>
                    </div>
                    
                    <div class="col-md-6">
                        <div class="form-group mb-3">
                            <label for="note" class="form-label">Note *</label>
                            <div class="star-rating-input">
                                <div class="d-flex align-items-center">
                                    @for($i = 1; $i <= 5; $i++)
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="note" id="note{{ $i }}" 
                                                   value="{{ $i }}" {{ old('note', $commentaire->note) == $i ? 'checked' : '' }} required>
                                            <label class="form-check-label" for="note{{ $i }}">
                                                @for($j = 1; $j <= $i; $j++)
                                                    <i class="bi bi-star-fill text-warning"></i>
                                                @endfor
                                                @for($j = $i + 1; $j <= 5; $j++)
                                                    <i class="bi bi-star text-secondary"></i>
                                                @endfor
                                                <span class="ms-1">({{ $i }})</span>
                                            </label>
                                        </div>
                                    @endfor
                                </div>
                            </div>
                            @error('note')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror>
                        </div>
                    </div>
                </div>

                <div class="mt-4">
                    <button type="submit" class="btn btn-warning">
                        <i class="bi bi-pencil"></i> Modifier le commentaire
                    </button>
                    <a href="{{ url('/admin/commentaires') }}" class="btn btn-secondary">
                        <i class="bi bi-arrow-left"></i> Retour
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

<style>
.star-rating-input .form-check-input {
    display: none;
}

.star-rating-input .form-check-label {
    cursor: pointer;
    padding: 5px;
    border-radius: 5px;
    transition: background-color 0.2s;
}

.star-rating-input .form-check-label:hover {
    background-color: #f8f9fa;
}

.star-rating-input .form-check-input:checked + .form-check-label {
    background-color: #fff3cd;
    border: 1px solid #ffeaa7;
}
</style>