@extends('layout')

@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <div class="d-flex justify-content-between align-items-center">
                <div class="d-flex align-items-center">
                    <h3 class="card-title mb-0 me-3">Liste des Médias</h3>
                    <a href="{{ route('admin.medias.create') }}" class="btn btn-primary btn-sm">
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

            @if(session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <i class="bi bi-exclamation-triangle me-2"></i>
                    {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <div class="table-responsive">
                <table id="medias-table" class="table table-bordered table-striped table-hover">
                    <thead>
                        <tr>
                            <th>Fichier</th>
                            <th>Type</th>
                            <th>Taille</th>
                            <th>Date</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($medias as $media)
                        <tr>
                            <td>
                                <div class="d-flex align-items-center">
                                    @if($media->mime_type && str_contains($media->mime_type, 'image/'))
                                        <img src="{{ Storage::url($media->chemin) }}" alt="{{ $media->nom_original }}" 
                                             class="rounded me-3" style="width: 50px; height: 50px; object-fit: cover;">
                                    @elseif($media->mime_type && str_contains($media->mime_type, 'video/'))
                                        <div class="bg-primary rounded d-flex align-items-center justify-content-center me-3" 
                                             style="width: 50px; height: 50px;">
                                            <i class="bi bi-play-btn-fill text-white"></i>
                                        </div>
                                    @elseif($media->mime_type && str_contains($media->mime_type, 'audio/'))
                                        <div class="bg-warning rounded d-flex align-items-center justify-content-center me-3" 
                                             style="width: 50px; height: 50px;">
                                            <i class="bi bi-music-note-beamed text-white"></i>
                                        </div>
                                    @else
                                        <div class="bg-secondary rounded d-flex align-items-center justify-content-center me-3" 
                                             style="width: 50px; height: 50px;">
                                            <i class="bi bi-file-earmark text-white"></i>
                                        </div>
                                    @endif
                                    <div>
                                        <strong class="d-block">{{ $media->nom_original }}</strong>
                                        <small class="text-muted">{{ $media->description ?? 'Sans description' }}</small>
                                        @if($media->chemin)
                                            <br><small class="text-info">{{ $media->chemin }}</small>
                                        @endif
                                    </div>
                                </div>
                            </td>
                            <td>
                                @if($media->typeMedia)
                                    <span class="badge bg-info">{{ $media->typeMedia->nom }}</span>
                                @else
                                    <span class="badge bg-warning">Non défini</span>
                                @endif
                                @if($media->mime_type)
                                    <br><small class="text-muted">{{ $media->mime_type }}</small>
                                @endif
                            </td>
                            <td>
                                @if($media->taille)
                                    {{ number_format($media->taille / 1024, 2) }} KB
                                @else
                                    <span class="text-muted">N/A</span>
                                @endif
                            </td>
                            <td data-order="{{ $media->created_at->timestamp }}">
                                {{ $media->created_at->format('d/m/Y H:i') }}
                            </td>
                            <td>
                                <div class="btn-group btn-group-sm" role="group">
                                    <!-- Bouton Voir/Télécharger -->
                                    @if($media->mime_type && str_contains($media->mime_type, 'image/'))
                                        <a href="{{ Storage::url($media->chemin) }}" 
                                           class="btn btn-success" 
                                           title="Voir" 
                                           target="_blank">
                                            <i class="bi bi-eye"></i>
                                        </a>
                                    @else
                                        <a href="{{ route('medias.download', $media->id) }}" 
                                           class="btn btn-success" 
                                           title="Télécharger">
                                            <i class="bi bi-download"></i>
                                        </a>
                                    @endif

                                    <!-- Bouton Aperçu -->
                                    <a href="{{ route('medias.stream', $media->id) }}" 
                                       class="btn btn-info" 
                                       title="Aperçu" 
                                       target="_blank">
                                        <i class="bi bi-play-circle"></i>
                                    </a>

                                    <!-- Bouton Modifier -->
                                    <a href="{{ route('admin.medias.edit', $media->id) }}" 
                                       class="btn btn-warning" 
                                       title="Modifier">
                                        <i class="bi bi-pencil"></i>
                                    </a>

                                    <!-- Bouton Supprimer -->
                                    <form action="{{ route('admin.medias.destroy', $media->id) }}" 
                                          method="POST" 
                                          style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" 
                                                class="btn btn-danger" 
                                                title="Supprimer" 
                                                onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce média ?')">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="text-center text-muted">
                                <i class="bi bi-inbox me-2"></i>Aucun média trouvé
                            </td>
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
    .table td {
        vertical-align: middle;
    }
</style>
@endpush

@push('scripts')
<script>
$(document).ready(function() {
    $('#medias-table').DataTable({
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
                width: '160px'
            },
            {
                targets: 3, // Colonne Date
                type: 'date-euro'
            },
            {
                targets: 2, // Colonne Taille
                searchable: false,
                orderable: true
            },
            {
                targets: 1, // Colonne Type
                searchable: true,
                orderable: true
            },
            {
                targets: 0, // Colonne Fichier
                searchable: true,
                orderable: true
            }
        ],
        order: [[3, 'desc']], // Tri par date décroissante par défaut
        pageLength: 25,
        lengthMenu: [[10, 25, 50, -1], [10, 25, 50, "Tous"]]
    });
});
</script>
@endpush