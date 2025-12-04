@extends('layout')

@section('title', 'Créer un Type de Média')
@section('page_title', 'Créer un Type de Média')
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ url('/admin/typemedias') }}">Types de Médias</a></li>
    <li class="breadcrumb-item active">Créer</li>
@endsection

@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Créer un nouveau Type de Média</h3>
        </div>
        <div class="card-body">
            <form action="{{ url('/admin/typemedias') }}" method="POST">
                @csrf
                
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group mb-3">
                            <label for="nom" class="form-label">Nom du type *</label>
                            <input type="text" class="form-control @error('nom') is-invalid @enderror" 
                                   id="nom" name="nom" value="{{ old('nom') }}" 
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
                    <button type="submit" class="btn btn-success">
                        <i class="bi bi-check-circle"></i> Créer le type
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