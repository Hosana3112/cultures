@extends('layout')

@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Détails de la Région</h3>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered">
                        <tr>
                            <th width="30%">ID:</th>
                            <td>{{ $region->id }}</td>
                        </tr>
                        <tr>
                            <th>Nom:</th>
                            <td><strong>{{ $region->nom_region }}</strong></td>
                        </tr>
                        <tr>
                            <th>Localisation:</th>
                            <td>{{ $region->localisation ?? 'Non spécifiée' }}</td>
                        </tr>
                        <tr>
                            <th>Population:</th>
                            <td>
                                @if($region->population)
                                    {{ number_format($region->population, 0, ',', ' ') }} habitants
                                @else
                                    <span class="text-muted">Non spécifiée</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>Superficie:</th>
                            <td>
                                @if($region->superficie)
                                    {{ number_format($region->superficie, 0, ',', ' ') }} km²
                                @else
                                    <span class="text-muted">Non spécifiée</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>Description:</th>
                            <td>{{ $region->description ?? 'Aucune description' }}</td>
                        </tr>
                        <tr>
                            <th>Créé le:</th>
                            <td>{{ $region->created_at->format('d/m/Y H:i') }}</td>
                        </tr>
                        <tr>
                            <th>Modifié le:</th>
                            <td>{{ $region->updated_at->format('d/m/Y H:i') }}</td>
                        </tr>
                    </table>
                </div>
            </div>

            <div class="mt-4">
                <a href="{{ route('admin.regions.index') }}" class="btn btn-secondary">
                    <i class="fas fa-arrow-left"></i> Retour à la liste
                </a>
            </div>
        </div>
    </div>
</div>
@endsection