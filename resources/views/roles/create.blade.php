@extends('layout')

@section('title', 'Créer un Rôle')
@section('page_title', 'Créer un Rôle')
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ url('/admin/roles') }}">Rôles</a></li>
    <li class="breadcrumb-item active">Créer</li>
@endsection

@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Créer un nouveau Rôle</h3>
        </div>
        <div class="card-body">
            <form action="{{ url('/admin/roles') }}" method="POST">
                @csrf
                
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="nom" class="form-label">Nom du rôle *</label>
                            <input type="text" class="form-control @error('nom') is-invalid @enderror" 
                                   id="nom" name="nom" value="{{ old('nom') }}" 
                                   placeholder="Entrez le nom du rôle" required>
                            @error('nom')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="mt-4">
                    <button type="submit" class="btn btn-success">
                        <i class="bi bi-check-circle"></i> Créer le rôle
                    </button>
                    <a href="{{ url('/admin/roles') }}" class="btn btn-secondary">
                        <i class="bi bi-arrow-left"></i> Retour
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection