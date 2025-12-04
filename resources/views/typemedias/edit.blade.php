@extends('layout')

@section('title', 'Modifier le Type de Média')
@section('page_title', 'Modifier le Type de Média')
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ url('/admin/typemedias') }}">Types de Médias</a></li>
    <li class="breadcrumb-item active">Modifier</li>
@endsection

@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Modifier le Type de Média</h3>
        </div>
        <div class="card-body">
            <form action="{{ url('/admin/typemedias/' . $typemedia->id) }}" method="POST">
                @csrf
                @method('PUT')
                
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group mb-3">
                            <label for="nom" class="form-label">Nom du type *</label>
                            <input type="text" class="form-control @error('nom') is-invalid @enderror" 
                                   id="nom" name="nom" value="{{ old('nom', $typemedia->nom) }}" 
                                   placeholder="Ex: Image, Vidéo, Audio, Document" required>
                            @error('nom')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <small class="form-text text-muted">
                                Types suggérés: Image, Vidéo, Audio, Document PDF, Présentation
                            </small>
                        </div>
                    </div>
                </div>

                <div class="mt-4">
                    <button type="submit" class="btn btn-warning">
                        <i class="bi bi-pencil"></i> Modifier le type
                    </button>
                    <a href="{{ url('/admin/typemedias') }}" class="btn btn-secondary">
                        <i class="bi bi-arrow-left"></i> Retour
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection