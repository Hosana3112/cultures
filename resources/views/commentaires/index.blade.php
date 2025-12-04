@extends('layout')

@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <div class="d-flex justify-content-between align-items-center">
                <div class="d-flex align-items-center">
                    <h3 class="card-title mb-0 me-3">Liste des Commentaires</h3>
                    <a href="{{ route('commentaires.create') }}" class="btn btn-primary btn-sm">
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
                <table id="commentaires-table" class="table table-bordered table-striped table-hover">
                    <thead>
                        <tr>
                            <th>Utilisateur</th>
                            <th>Commentaire</th>
                            <th>Note</th>
                            <th>Date</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($commentaires as $commentaire)
                        <tr>
                            <td>
                                @if($commentaire->utilisateur)
                                    <strong>{{ $commentaire->utilisateur->prenom }} {{ $commentaire->utilisateur->nom }}</strong>
                                    <br><small class="text-muted">{{ $commentaire->utilisateur->email }}</small>
                                @else
                                    <span class="text-muted">Utilisateur inconnu</span>
                                @endif
                            </td>
                            <td>{{ Str::limit($commentaire->texte, 50) }}</td>
                            <td>
                                <div class="star-rating">
                                    @for($i = 1; $i <= 5; $i++)
                                        @if($i <= $commentaire->note)
                                            <i class="bi bi-star-fill text-warning"></i>
                                        @else
                                            <i class="bi bi-star text-secondary"></i>
                                        @endif
                                    @endfor
                                    <small class="ms-1">({{ $commentaire->note }}/5)</small>
                                </div>
                            </td>
                            <td data-order="{{ $commentaire->date->timestamp }}">
                                {{ $commentaire->date->format('d/m/Y H:i') }}
                            </td>
                            <td>
                                <div class="btn-group btn-group-sm" role="group">
                                    <a href="{{ route('commentaires.show', $commentaire->id_commentaire) }}" class="btn btn-success" title="Voir">
                                        <i class="bi bi-eye"></i>
                                    </a>
                                    <a href="{{ route('commentaires.edit', $commentaire->id_commentaire) }}" class="btn btn-warning" title="Modifier">
                                        <i class="bi bi-pencil"></i>
                                    </a>
                                    <form action="{{ route('commentaires.destroy', $commentaire->id_commentaire) }}" method="POST" style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger" title="Supprimer" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce commentaire ?')">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="text-center text-muted">Aucun commentaire trouvé</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

@push('styles')
<style>
.star-rating {
    display: inline-flex;
    align-items: center;
}

.btn-group-sm > .btn {
    padding: 0.25rem 0.5rem;
    font-size: 0.875rem;
}
</style>
@endpush

@push('scripts')
<script>
$(document).ready(function() {
    $('#commentaires-table').DataTable({
        language: {
            url: "{{ asset('adminlte/json/fr-FR.json') }}"
        },
        responsive: true,
        autoWidth: false,
        columnDefs: [
            {
                targets: 4, // Colonne Actions
                orderable: false,
                searchable: false,
                width: '120px'
            },
            {
                targets: 2, // Colonne Note
                orderable: true,
                searchable: false
            },
            {
                targets: 3, // Colonne Date
                type: 'date-euro' // Pour le tri correct des dates françaises
            }
        ],
        order: [[3, 'desc']], // Tri par date décroissante par défaut
        pageLength: 25,
        lengthMenu: [[10, 25, 50, -1], [10, 25, 50, "Tous"]]
    });
});
</script>
@endpush