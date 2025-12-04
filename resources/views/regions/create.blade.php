@extends('layout')

@section('title', 'Créer une Région')
@section('page_title', 'Créer une Région')

@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Créer une nouvelle Région</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('regions.store') }}" method="POST">
                @csrf
                
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group mb-3">
                            <label for="nom_region" class="form-label">Nom de la région *</label>
                            <input type="text" class="form-control @error('nom_region') is-invalid @enderror" 
                                   id="nom_region" name="nom_region" value="{{ old('nom_region') }}" 
                                   placeholder="Ex: Atlantique, Borgou, Zou..." required>
                            @error('nom_region')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="col-md-6">
                        <div class="form-group mb-3">
                            <label for="localisation" class="form-label">Localisation</label>
                            <input type="text" class="form-control @error('localisation') is-invalid @enderror" 
                                   id="localisation" name="localisation" value="{{ old('localisation') }}" 
                                   placeholder="Ex: Sud, Nord, Centre...">
                            @error('localisation')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="col-md-12">
                        <div class="form-group mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea class="form-control @error('description') is-invalid @enderror" 
                                      id="description" name="description" rows="4" 
                                      placeholder="Description de la région, particularités culturelles...">{{ old('description') }}</textarea>
                            @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="mt-4">
                    <button type="submit" class="btn btn-success">
                        <i class="bi bi-check-circle"></i> Créer la région
                    </button>
                    <a href="{{ route('regions.index') }}" class="btn btn-secondary">
                        <i class="bi bi-arrow-left"></i> Retour
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection