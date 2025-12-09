@extends('layout')

@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <div class="d-flex justify-content-between align-items-center">
                <div class="d-flex align-items-center">
                    <h3 class="card-title mb-0 me-3">Liste des Rôles</h3>
                    <a href="{{ route('admin.roles.create') }}" class="btn btn-primary btn-sm">
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
                <table id="roles-table" class="table table-bordered table-striped table-hover">
                    <thead>
                        <tr>
                            <th>Nom</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($roles as $role)
                        <tr>
                            <td>{{ $role->nom }}</td>
                            <td>
                                <div class="btn-group btn-group-sm" role="group">
                                    <a href="{{ route('admin.roles.show', $role->id) }}" class="btn btn-success" title="Voir">
                                        <i class="bi bi-eye"></i>
                                    </a>
                                    <a href="{{ route('admin.roles.edit', $role->id) }}" class="btn btn-warning" title="Modifier">
                                        <i class="bi bi-pencil"></i>
                                    </a>
                                    <form action="{{ route('admin.roles.destroy', $role->id) }}" method="POST" style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger" title="Supprimer" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce rôle ?')">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="2" class="text-center text-muted">Aucun rôle trouvé</td>
                        </tr>
                        @endforelse
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
    $('#roles-table').DataTable({
        language: {
            url: "{{ asset('adminlte/json/fr-FR.json') }}"
        },
        responsive: true,
        autoWidth: false,
        columnDefs: [
            {
                targets: 1, // Colonne Actions
                orderable: false,
                searchable: false,
                width: '120px'
            },
            {
                targets: 0, // Colonne Nom
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