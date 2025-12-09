@extends('layout')

@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <div class="d-flex justify-content-between align-items-center">
                <div class="d-flex align-items-center">
                    <h3 class="card-title mb-0 me-3">Liste des Contenus Culturels</h3>
                    @auth
                        @if(Auth::user()->role_id == 1 || Auth::user()->role_id == 2) {{-- Admins ET Modérateurs --}}
                            <a href="{{ route('admin.contenus.create') }}" class="btn btn-primary btn-sm">
                                <i class="bi bi-plus-circle"></i> Nouveau
                            </a>
                        @endif
                    @endauth
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
                <table id="contenus-table" class="table table-bordered table-striped table-hover">
                    <thead>
                        <tr>
                            <th>Type</th>
                            <th>Titre</th>
                            <th>Auteur</th>
                            <th>Région</th>
                            <th>Statut</th>
                            <th>Date</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($contenus as $contenu)
                        <tr>
                            <td>
                                @if($contenu->typeContenu)
                                    <span class="badge bg-info">{{ $contenu->typeContenu->nom }}</span>
                                @else
                                    <span class="badge bg-warning">Non défini</span>
                                @endif
                            </td>
                            <td>
                                <strong>{{ Str::limit($contenu->titre, 40) }}</strong>
                                @if($contenu->parent_id)
                                    <br><small class="text-muted">↳ Version modifiée</small>
                                @endif
                            </td>
                            <td>
                                @if($contenu->auteur)
                                    {{ $contenu->auteur->prenom }} {{ $contenu->auteur->nom }}
                                @else
                                    <span class="text-muted">-</span>
                                @endif
                            </td>
                            <td>
                                @if($contenu->region)
                                    {{ $contenu->region->nom_region }}
                                @else
                                    <span class="text-muted">-</span>
                                @endif
                            </td>
                            <td>
                                @if($contenu->statut == 'Validé')
                                    <span class="badge bg-success">Validé</span>
                                @elseif($contenu->statut == 'Brouillon')
                                    <span class="badge bg-secondary">Brouillon</span>
                                @elseif($contenu->statut == 'En attente')
                                    <span class="badge bg-warning">En attente</span>
                                @else
                                    <span class="badge bg-info">{{ $contenu->statut }}</span>
                                @endif
                            </td>
                            <td data-order="{{ $contenu->created_at->timestamp }}">
                                {{ $contenu->created_at->format('d/m/Y') }}
                            </td>
                            <td>
                                <div class="btn-group btn-group-sm" role="group">
                                    <!-- Bouton Voir - Toujours visible -->
                                    <a href="{{ route('admin.contenus.show', $contenu->id) }}" class="btn btn-success" title="Voir">
                                        <i class="bi bi-eye"></i>
                                    </a>
                                    
                                    @auth
                                        @if(Auth::user()->role_id == 1 || Auth::user()->role_id == 2) {{-- Admins ET Modérateurs --}}
                                            <!-- Bouton Modifier -->
                                            <a href="{{ route('admin.contenus.edit', $contenu->id) }}" class="btn btn-warning" title="Modifier">
                                                <i class="bi bi-pencil"></i>
                                            </a>
                                            
                                            @if(Auth::user()->role_id == 1) {{-- Seulement Admins pour supprimer --}}
                                                <!-- Bouton Supprimer - Seulement pour les Admins -->
                                                <form action="{{ route('admin.contenus.destroy', $contenu->id) }}" method="POST" style="display: inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger" title="Supprimer" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce contenu ?')">
                                                        <i class="bi bi-trash"></i>
                                                    </button>
                                                </form>
                                            @endif
                                        @endif
                                    @endauth
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td>-</td>
                            <td>-</td>
                            <td>-</td>
                            <td>-</td>
                            <td>-</td>
                            <td>-</td>
                            <td class="text-center text-muted">Aucun contenu trouvé</td>
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
    $('#contenus-table').DataTable({
        language: {
            url: "{{ asset('adminlte/json/fr-FR.json') }}"
        },
        responsive: true,
        autoWidth: false,
        columnDefs: [
            {
                targets: 6, // Colonne Actions
                orderable: false,
                searchable: false,
                width: '120px'
            },
            {
                targets: 5, // Colonne Date
                type: 'date-euro'
            },
            {
                targets: [0, 1, 2, 3, 4], // Colonnes Type, Titre, Auteur, Région, Statut
                searchable: true,
                orderable: true
            }
        ],
        order: [[5, 'desc']], // Tri par date de création décroissante
        pageLength: 25,
        lengthMenu: [[10, 25, 50, -1], [10, 25, 50, "Tous"]]
    });
});
</script>
@endpush