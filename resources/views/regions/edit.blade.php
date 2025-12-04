@extends('layout')

@section('title', 'Modifier la Région')
@section('page_title', 'Modifier la Région')
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ url('/admin/regions') }}">Régions</a></li>
    <li class="breadcrumb-item active">Modifier</li>
@endsection

@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Modifier la Région</h3>
        </div>
        <div class="card-body">
            <form action="{{ url('/admin/regions/' . $region->id) }}" method="POST">
                @csrf
                @method('PUT')
                
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group mb-3">
                            <label for="nom_region" class="form-label">Nom de la région *</label>
                            <input type="text" class="form-control @error('nom_region') is-invalid @enderror" 
                                   id="nom_region" name="nom_region" value="{{ old('nom_region', $region->nom_region) }}" 
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
                                   id="localisation" name="localisation" value="{{ old('localisation', $region->localisation) }}" 
                                   placeholder="Ex: Sud, Nord, Centre...">
                            @error('localisation')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="col-md-6">
                        <div class="form-group mb-3">
                            <label for="population" class="form-label">Population</label>
                            <input type="number" class="form-control @error('population') is-invalid @enderror" 
                                   id="population" name="population" value="{{ old('population', $region->population) }}" 
                                   placeholder="Nombre d'habitants">
                            @error('population')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="col-md-6">
                        <div class="form-group mb-3">
                            <label for="superficie" class="form-label">Superficie (km²)</label>
                            <input type="number" step="0.01" class="form-control @error('superficie') is-invalid @enderror" 
                                   id="superficie" name="superficie" value="{{ old('superficie', $region->superficie) }}" 
                                   placeholder="Superficie en km²">
                            @error('superficie')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="col-md-12">
                        <div class="form-group mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea class="form-control @error('description') is-invalid @enderror" 
                                      id="description" name="description" rows="4" 
                                      placeholder="Description de la région, particularités culturelles...">{{ old('description', $region->description) }}</textarea>
                            @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="mt-4">
                    <button type="submit" class="btn btn-warning">
                        <i class="bi bi-pencil"></i> Modifier la région
                    </button>
                    <a href="{{ url('/admin/regions') }}" class="btn btn-secondary">
                        <i class="bi bi-arrow-left"></i> Retour
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection