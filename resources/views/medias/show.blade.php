@extends('layout')

@section('title', 'Détails du Média')
@section('page_title', 'Détails du Média')
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ url('/admin/medias') }}">Médias</a></li>
    <li class="breadcrumb-item active">Détails</li>
@endsection

@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Détails du Média</h3>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered">
                        <tr>
                            <th width="30%">ID:</th>
                            <td>{{ $media->id }}</td>
                        </tr>
                        <tr>
                            <th>Nom du fichier:</th>
                            <td><strong>{{ $media->nom_original }}</strong></td>
                        </tr>
                        <tr>
                            <th>Chemin de stockage:</th>
                            <td><code>{{ $media->chemin }}</code></td>
                        </tr>
                        <tr>
                            <th>Type MIME:</th>
                            <td>{{ $media->mime_type ?? 'Non défini' }}</td>
                        </tr>
                        <tr>
                            <th>Taille:</th>
                            <td>
                                @if($media->taille)
                                    {{ number_format($media->taille / 1024, 2) }} KB
                                @else
                                    <span class="text-muted">Non définie</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>Type de média:</th>
                            <td>
                                @if($media->typeMedia)
                                    <span class="badge bg-info">{{ $media->typeMedia->nom }}</span>
                                @else
                                    <span class="badge bg-warning">Non défini</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>Contenu associé:</th>
                            <td>
                                @if($media->contenu)
                                    {{ $media->contenu->titre }}
                                    <br>
                                    <small class="text-muted">
                                        Type: {{ $media->contenu->typeContenu->nom ?? 'Non défini' }}
                                    </small>
                                @else
                                    <span class="text-muted">Aucun contenu associé</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>Description:</th>
                            <td>{{ $media->description ?? 'Aucune description' }}</td>
                        </tr>
                        <tr>
                            <th>Créé le:</th>
                            <td>{{ $media->created_at->format('d/m/Y H:i') }}</td>
                        </tr>
                        <tr>
                            <th>Modifié le:</th>
                            <td>{{ $media->updated_at->format('d/m/Y H:i') }}</td>
                        </tr>
                    </table>
                </div>
                
                <!-- Aperçu du média -->
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">Aperçu & Actions</h5>
                        </div>
                        <div class="card-body text-center">
                            @if($media->mime_type && str_contains($media->mime_type, 'image/'))
                                <div class="mb-3">
                                    <img src="{{ Storage::url($media->chemin) }}" 
                                         alt="{{ $media->nom_original }}" 
                                         class="img-fluid rounded" 
                                         style="max-height: 200px;">
                                    <p class="mt-2 text-success">
                                        <i class="fas fa-image"></i> Fichier image
                                    </p>
                                </div>
                                <a href="{{ Storage::url($media->chemin) }}" 
                                   class="btn btn-success btn-sm" 
                                   target="_blank">
                                    <i class="fas fa-eye"></i> Voir l'image
                                </a>
                            @elseif($media->mime_type && str_contains($media->mime_type, 'video/'))
                                <div class="mb-3">
                                    <i class="fas fa-video display-1 text-primary"></i>
                                    <p class="mt-2">Fichier vidéo</p>
                                </div>
                                <a href="{{ route('medias.stream', $media->id) }}" 
                                   class="btn btn-primary btn-sm" 
                                   target="_blank">
                                    <i class="fas fa-play"></i> Lire la vidéo
                                </a>
                            @elseif($media->mime_type && str_contains($media->mime_type, 'audio/'))
                                <div class="mb-3">
                                    <i class="fas fa-music display-1 text-warning"></i>
                                    <p class="mt-2">Fichier audio</p>
                                </div>
                                <a href="{{ route('medias.stream', $media->id) }}" 
                                   class="btn btn-warning btn-sm" 
                                   target="_blank">
                                    <i class="fas fa-play"></i> Écouter
                                </a>
                            @elseif($media->mime_type && str_contains($media->mime_type, 'pdf'))
                                <div class="mb-3">
                                    <i class="fas fa-file-pdf display-1 text-danger"></i>
                                    <p class="mt-2">Document PDF</p>
                                </div>
                                <a href="{{ route('medias.stream', $media->id) }}" 
                                   class="btn btn-danger btn-sm" 
                                   target="_blank">
                                    <i class="fas fa-eye"></i> Voir le PDF
                                </a>
                            @else
                                <div class="mb-3">
                                    <i class="fas fa-file display-1 text-secondary"></i>
                                    <p class="mt-2">Fichier document</p>
                                </div>
                            @endif
                            
                            <div class="mt-3">
                                <a href="{{ route('medias.download', $media->id) }}" 
                                   class="btn btn-outline-primary btn-sm">
                                    <i class="fas fa-download"></i> Télécharger
                                </a>
                            </div>

                            <div class="alert alert-info mt-3">
                                <small>
                                    <i class="fas fa-info-circle"></i>
                                    URL: <code>{{ Storage::url($media->chemin) }}</code>
                                </small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mt-4">
                <a href="{{ route('admin.medias.index') }}" class="btn btn-secondary">
                    <i class="fas fa-arrow-left"></i> Retour à la liste
                </a>
                <a href="{{ route('admin.medias.edit', $media->id) }}" class="btn btn-warning">
                    <i class="fas fa-edit"></i> Modifier
                </a>
            </div>
        </div>
    </div>
</div>
@endsection