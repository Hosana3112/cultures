@extends('layout')

@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Détails du Rôle</h3>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered">
                        <tr>
                            <th width="30%">ID:</th>
                            <td>{{ $role->id }}</td>
                        </tr>
                        <tr>
                            <th>Nom:</th>
                            <td>{{ $role->nom }}</td>
                        </tr>
                        <tr>
                            <th>Créé le:</th>
                            <td>{{ $role->created_at->format('d/m/Y H:i') }}</td>
                        </tr>
                        <tr>
                            <th>Modifié le:</th>
                            <td>{{ $role->updated_at->format('d/m/Y H:i') }}</td>
                        </tr>
                    </table>
                </div>
            </div>

            <div class="mt-4">
                <a href="{{ route('admin.roles.index') }}" class="btn btn-secondary">
                    <i class="fas fa-arrow-left"></i> Retour à la liste
                </a>
            </div>
        </div>
    </div>
</div>
@endsection