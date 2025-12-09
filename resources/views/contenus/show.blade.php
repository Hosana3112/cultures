@extends('layout')

@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Détails du Contenu</h3>
        </div>
        <div class="card-body">
            <!-- Message si le contenu est déjà validé -->
            @if($contenu->statut == 'Validé')
                <div class="row mb-4">
                    <div class="col-12">
                        <div class="alert alert-success">
                            <i class="fas fa-check-circle"></i>
                            <strong>Contenu validé</strong> - Ce contenu a été validé le 
                            {{ $contenu->date_validation->format('d/m/Y à H:i') }}
                            @if($contenu->moderateur)
                                par {{ $contenu->moderateur->prenom }} {{ $contenu->moderateur->nom }}
                            @endif
                        </div>
                    </div>
                </div>
            @endif

            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered">
                        <tr>
                            <th width="30%">ID:</th>
                            <td>{{ $contenu->id }}</td>
                        </tr>
                        <tr>
                            <th>Titre:</th>
                            <td><strong>{{ $contenu->titre }}</strong></td>
                        </tr>
                        <tr>
                            <th>Type:</th>
                            <td>
                                @if($contenu->typeContenu)
                                    <span class="badge bg-info">{{ $contenu->typeContenu->nom }}</span>
                                @else
                                    <span class="badge bg-warning">Non défini</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>Statut:</th>
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
                        </tr>
                        <tr>
                            <th>Auteur:</th>
                            <td>
                                @if($contenu->auteur)
                                    {{ $contenu->auteur->prenom }} {{ $contenu->auteur->nom }}
                                    <br><small class="text-muted">{{ $contenu->auteur->email }}</small>
                                @else
                                    <span class="text-muted">Non défini</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>Région:</th>
                            <td>
                                @if($contenu->region)
                                    {{ $contenu->region->nom_region }}
                                @else
                                    <span class="text-muted">Non définie</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>Contenu parent:</th>
                            <td>
                                @if($contenu->parent)
                                    {{ $contenu->parent->titre }}
                                @else
                                    <span class="text-muted">Aucun (contenu original)</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>Modérateur:</th>
                            <td>
                                @if($contenu->moderateur)
                                    {{ $contenu->moderateur->prenom }} {{ $contenu->moderateur->nom }}
                                @else
                                    <span class="text-muted">Aucun</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>Date validation:</th>
                            <td>
                                @if($contenu->date_validation)
                                    {{ $contenu->date_validation->format('d/m/Y H:i') }}
                                @else
                                    <span class="text-muted">Non validé</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>Date création:</th>
                            <td>{{ $contenu->created_at->format('d/m/Y H:i') }}</td>
                        </tr>
                        <tr>
                            <th>Modifié le:</th>
                            <td>{{ $contenu->updated_at->format('d/m/Y H:i') }}</td>
                        </tr>
                    </table>
                </div>
                
                <!-- Médias associés -->
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">Médias associés</h5>
                        </div>
                        <div class="card-body">
                            @php
                                $medias = \App\Models\Media::where('contenu_id', $contenu->id)
                                                          ->with('type_media')
                                                          ->get();
                            @endphp

                            @if($medias->count() > 0)
                                <div class="row">
                                    @foreach($medias as $media)
                                        <div class="col-md-12 mb-3">
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="row align-items-center">
                                                        <div class="col-md-3 text-center">
                                                            @if($media->mime_type && str_contains($media->mime_type, 'image/'))
                                                                <img src="{{ Storage::url($media->chemin) }}" 
                                                                     alt="{{ $media->nom_original }}"
                                                                     class="img-fluid rounded"
                                                                     style="max-height: 100px; object-fit: cover;">
                                                            @elseif($media->mime_type && str_contains($media->mime_type, 'video/'))
                                                                <div class="bg-primary text-white rounded p-3">
                                                                    <i class="fas fa-video fa-2x"></i>
                                                                </div>
                                                            @else
                                                                <div class="bg-secondary text-white rounded p-3">
                                                                    <i class="fas fa-file fa-2x"></i>
                                                                </div>
                                                            @endif
                                                        </div>
                                                        <div class="col-md-6">
                                                            <h6 class="card-title mb-1">{{ $media->nom_original }}</h6>
                                                            <p class="card-text mb-1">
                                                                <small class="text-muted">
                                                                    {{ $media->type_media->nom ?? 'Non défini' }}
                                                                </small>
                                                            </p>
                                                        </div>
                                                        <div class="col-md-3 text-end">
                                                            <div class="btn-group-vertical btn-group-sm">
                                                                @if($media->mime_type && str_contains($media->mime_type, 'image/'))
                                                                   <a href="{{ route('medias.stream', $media->id) }}" 
                                                                      class="btn btn-info" 
                                                                      title="Aperçu" 
                                                                      target="_blank">
                                                                      <i class="bi bi-play-circle"></i>Voir
                                                                    </a>
                                                                @endif
                                                                <a href="{{ route('medias.download', $media->id) }}" 
                                                                   class="btn btn-outline-primary">
                                                                    <i class="fas fa-download"></i> Télé.
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            @else
                                <div class="text-center text-muted py-4">
                                    <i class="fas fa-images fa-3x mb-3"></i>
                                    <p>Aucun média associé à ce contenu</p>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <!-- Contenu texte -->
            <div class="row mt-4">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">Contenu</h5>
                        </div>
                        <div class="card-body">
                            <div class="bg-light p-3 rounded">
                                {!! nl2br(e($contenu->texte)) !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mt-4">
                <a href="{{ route('admin.contenus.index') }}" class="btn btn-secondary">
                    <i class="fas fa-arrow-left"></i> Retour à la liste
                </a>
                
                <!-- Bouton de validation en bas seulement -->
                @auth
                    @php
                        $userRoleId = Auth::user()->role_id ?? null;
                        $canValidate = in_array($userRoleId, [1, 2]);
                        $isValidated = $contenu->statut == 'Validé';
                    @endphp

                    @if($canValidate && !$isValidated)
                        <form action="{{ route('admin.contenus.valider', $contenu->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('PUT')
                            <button type="submit" class="btn btn-success" 
                                    onclick="return confirm('Êtes-vous sûr de vouloir valider ce contenu ?')">
                                <i class="fas fa-check"></i> Valider ce contenu
                            </button>
                        </form>
                    @endif
                @endauth
            </div>
        </div>
    </div>
</div>
@endsection