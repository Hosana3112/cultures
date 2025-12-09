@extends('layout')

@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <div class="d-flex justify-content-between align-items-center">
                <div class="d-flex align-items-center">
                    <h3 class="card-title mb-0 me-3">Liste des Régions</h3>
                    <a href="{{ route('admin.regions.create') }}" class="btn btn-primary btn-sm">
                        <i class="bi bi-plus-circle"></i> Nouveau
                    </a>
                </div>
            </div>
        </div>
        <div class="card-body">
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <i class="bi bi-check-circle me-2"></i>
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <div class="table-responsive">
                <table id="regions-table" class="table table-bordered table-striped table-hover">
                    <thead>
                        <tr>
                            <th>Nom de la Région</th>
                            <th>Description</th>
                            <th>Localisation</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($regions as $item)
                        <tr>
                            <td>{{ $item->nom_region ?? 'Non spécifié' }}</td>
                            <td>{{ Str::limit($item->description ?? 'Aucune description', 50) }}</td>
                            <td>{{ $item->localisation ?? 'Non spécifié' }}</td>
                            <td>
                                <div class="btn-group btn-group-sm" role="group">
                                    <a href="{{ route('admin.regions.show', $item->id) }}" class="btn btn-success" title="Voir">
                                        <i class="bi bi-eye"></i>
                                    </a>
                                    <a href="{{ route('admin.regions.edit', $item->id) }}" class="btn btn-warning" title="Modifier">
                                        <i class="bi bi-pencil"></i>
                                    </a>
                                    <form method="POST" action="{{ route('admin.regions.destroy', $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit" class="btn btn-danger" title="Supprimer" onclick="return confirm('Confirmer la suppression ?')">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
$(document).ready(function() {
    $('#regions-table').DataTable({
        language: {
            url: "{{ asset('adminlte/json/fr-FR.json') }}"
        },
        responsive: true,
        autoWidth: false,
        columnDefs: [
            {
                targets: 3, // Colonne Actions
                orderable: false,
                searchable: false,
                width: '120px'
            },
            {
                targets: 0, // Colonne Nom
                searchable: true,
                orderable: true
            },
            {
                targets: 1, // Colonne Description
                searchable: true,
                orderable: true
            },
            {
                targets: 2, // Colonne Localisation
                searchable: true,
                orderable: true
            }
        ],
        order: [[0, 'asc']], // Tri par nom alphabétique par défaut
        pageLength: 25,
        lengthMenu: [[10, 25, 50, -1], [10, 25, 50, "Tous"]]
    });
});
</script>
@endpush