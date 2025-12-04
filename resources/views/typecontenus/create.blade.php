@extends('layout')

@section('title', 'Créer un Type de Contenu')
@section('page_title', 'Créer un Type de Contenu')
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ url('/admin/typecontenus') }}">Types de Contenus</a></li>
    <li class="breadcrumb-item active">Créer</li>
@endsection

@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Créer un nouveau Type de Contenu</h3>
        </div>
        <div class="card-body">
            <form action="{{ url('/admin/typecontenus') }}" method="POST">
                @csrf
                
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group mb-3">
                            <label for="nom" class="form-label">Nom du type *</label>
                            <input type="text" class="form-control @error('nom') is-invalid @enderror" 
                                   id="nom" name="nom" value="{{ old('nom') }}" 
                                   placeholder="Ex: Article, Actualité, Patrimoine, Tradition" required>
                            @error('nom')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <small class="form-text text-muted">
                                Types suggérés: Article, Actualité, Patrimoine, Tradition, Gastronomie, Art
                            </small>
                        </div>
                    </div>
                </div>

                <div class="mt-4">
                    <button type="submit" class="btn btn-success">
                        <i class="bi bi-check-circle"></i> Créer le type
                    </button>
                    <a href="{{ url('/admin/typecontenus') }}" class="btn btn-secondary">
                        <i class="bi bi-arrow-left"></i> Retour
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection