@extends('layout')

@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <div class="d-flex justify-content-between align-items-center">
                <div class="d-flex align-items-center">
                    <h3 class="card-title mb-0 me-3">Liste des Utilisateurs</h3>
                    <a href="{{ route('utilisateurs.create') }}" class="btn btn-primary btn-sm">
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
                <table id="utilisateurs-table" class="table table-bordered table-striped table-hover w-100">
                    <thead class="table-dark">
                        <tr>
                            <th>Nom & Prénom</th>
                            <th>Sexe</th>
                            <th>Rôle</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($utilisateurs as $utilisateur)
                        <tr>
                            <td>
                                <strong>{{ $utilisateur->nom }} {{ $utilisateur->prenom }}</strong>
                                @if($utilisateur->photo)
                                    <br><small class="text-muted">Photo disponible</small>
                                @endif
                            </td>
                            <td>
                                @if($utilisateur->sexe == 'M')
                                    <span class="badge bg-primary">Homme</span>
                                @else
                                    <span class="badge bg-pink">Femme</span>
                                @endif
                            </td>
                            <td>
                                @if($utilisateur->role)
                                    <span class="badge bg-secondary">{{ $utilisateur->role->nom }}</span>
                                @else
                                    <span class="badge bg-warning">Non défini</span>
                                @endif
                            </td>
                            <td>
                                <div class="btn-group btn-group-sm" role="group">
                                    <a href="{{ route('utilisateurs.show', $utilisateur->id) }}" class="btn btn-success" title="Voir">
                                        <i class="bi bi-eye"></i>
                                    </a>
                                    <a href="{{ route('utilisateurs.edit', $utilisateur->id) }}" class="btn btn-warning" title="Modifier">
                                        <i class="bi bi-pencil"></i>
                                    </a>
                                    <form action="{{ route('utilisateurs.destroy', $utilisateur->id) }}" method="POST" style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger" title="Supprimer" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet utilisateur ?')">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4" class="text-center text-muted">Aucun utilisateur trouvé</td>
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
document.addEventListener('DOMContentLoaded', function() {
    // Initialisation basique de DataTables
    $('#utilisateurs-table').DataTable({
        language: {
            url: "{{ asset('adminlte/json/fr-FR.json') }}"
        },
        pageLength: 10,
        lengthMenu: [[10, 25, 50, -1], [10, 25, 50, "Tous"]],
        responsive: true
    });
});
</script>
@endpush

<style>
.bg-pink {
    background-color: #e83e8c !important;
}
</style>