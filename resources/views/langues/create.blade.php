@extends('layout')

@section('title', 'Créer une Langue')
@section('page_title', 'Créer une Langue')
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ url('/admin/langues') }}">Langues</a></li>
    <li class="breadcrumb-item active">Créer</li>
@endsection

@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Créer une nouvelle Langue</h3>
        </div>
        <div class="card-body">
            <form action="{{ url('/admin/langues') }}" method="POST">
                @csrf
                
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group mb-3">
                            <label for="nom" class="form-label">Nom de la langue *</label>
                            <input type="text" class="form-control @error('nom') is-invalid @enderror" 
                                   id="nom" name="nom" value="{{ old('nom') }}" 
                                   placeholder="Ex: Français" required>
                            @error('nom')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="col-md-6">
                        <div class="form-group mb-3">
                            <label for="code_langue" class="form-label">Code langue *</label>
                            <input type="text" class="form-control @error('code_langue') is-invalid @enderror" 
                                   id="code_langue" name="code_langue" value="{{ old('code_langue') }}" 
                                   placeholder="Ex: fr, en, yo" required maxlength="10">
                            @error('code_langue')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="col-md-12">
                        <div class="form-group mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea class="form-control @error('description') is-invalid @enderror" 
                                      id="description" name="description" rows="3" 
                                      placeholder="Description de la langue...">{{ old('description') }}</textarea>
                            @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="mt-4">
                    <button type="submit" class="btn btn-success">
                        <i class="bi bi-check-circle"></i> Créer la langue
                    </button>
                    <a href="{{ url('/admin/langues') }}" class="btn btn-secondary">
                        <i class="bi bi-arrow-left"></i> Retour
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection