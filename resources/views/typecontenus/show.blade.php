@extends('layout')

@section('title', 'Détails du Type de Contenu')
@section('page_title', 'Détails du Type de Contenu')
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('typecontenus.index') }}">Types de Contenu</a></li>
    <li class="breadcrumb-item active">Détails</li>
@endsection

@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Détails du Type de Contenu</h3>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered">
                        <tr>
                            <th width="30%">ID:</th>
                            <td>{{ $typecontenue->id }}</td>
                        </tr>
                        <tr>
                            <th>Nom:</th>
                            <td>{{ $typecontenue->nom }}</td>
                        </tr>
                        <tr>
                            <th>Créé le:</th>
                            <td>
                                @if($typecontenue->created_at)
                                    {{ $typecontenue->created_at->format('d/m/Y H:i') }}
                                @else
                                    <span class="text-muted">Non spécifié</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>Modifié le:</th>
                            <td>
                                @if($typecontenue->updated_at)
                                    {{ $typecontenue->updated_at->format('d/m/Y H:i') }}
                                @else
                                    <span class="text-muted">Non spécifié</span>
                                @endif
                            </td>
                        </tr>
                    </table>
                </div>
            </div>

            <div class="mt-4">
                <a href="{{ route('typecontenus.index') }}" class="btn btn-secondary">
                    <i class="fas fa-arrow-left"></i> Retour à la liste
                </a>
            </div>
        </div>
    </div>
</div>
@endsection