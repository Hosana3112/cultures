@extends('layout')

@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Détails de l'Utilisateur</h3>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-4">
                    <!-- Carte Photo -->
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">Photo de profil</h5>
                        </div>
                        <div class="card-body text-center">
                            @if($utilisateur->photo_chemin)
                                <img src="{{ Storage::url($utilisateur->photo_chemin) }}" 
                                     alt="Photo de {{ $utilisateur->prenom }} {{ $utilisateur->nom }}"
                                     class="img-thumbnail rounded-circle mb-3" 
                                     style="width: 200px; height: 200px; object-fit: cover;">
                                
                                <div class="photo-metadata">
                                    <p class="mb-1">
                                        <small class="text-muted">
                                            <strong>Nom original:</strong> {{ $utilisateur->photo_nom_original }}
                                        </small>
                                    </p>
                                    <p class="mb-1">
                                        <small class="text-muted">
                                            <strong>Type:</strong> {{ $utilisateur->photo_mime_type }}
                                        </small>
                                    </p>
                                    <p class="mb-1">
                                        <small class="text-muted">
                                            <strong>Taille:</strong> {{ $utilisateur->photo_taille ? round($utilisateur->photo_taille / 1024, 2) . ' KB' : 'N/A' }}
                                        </small>
                                    </p>
                                    @if($utilisateur->photo_description)
                                        <p class="mb-0">
                                            <small class="text-muted">
                                                <strong>Description:</strong> {{ $utilisateur->photo_description }}
                                            </small>
                                        </p>
                                    @endif
                                </div>
                            @else
                                <div class="bg-light rounded-circle d-inline-flex align-items-center justify-content-center mb-3" 
                                     style="width: 200px; height: 200px;">
                                    <i class="fas fa-user-circle" style="font-size: 4rem; color: #6c757d;"></i>
                                </div>
                                <p class="text-muted">Aucune photo de profil</p>
                            @endif
                        </div>
                    </div>
                </div>
                
                <div class="col-md-8">
                    <!-- Informations utilisateur -->
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">Informations personnelles</h5>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered">
                                <tr>
                                    <th width="30%">ID:</th>
                                    <td>{{ $utilisateur->id }}</td>
                                </tr>
                                <tr>
                                    <th>Nom complet:</th>
                                    <td><strong>{{ $utilisateur->nom }} {{ $utilisateur->prenom }}</strong></td>
                                </tr>
                                <tr>
                                    <th>Email:</th>
                                    <td>
                                        <i class="fas fa-envelope text-muted me-2"></i>
                                        {{ $utilisateur->email }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>Sexe:</th>
                                    <td>
                                        @if($utilisateur->sexe == 'M')
                                            <span class="badge bg-primary">
                                                <i class="fas fa-male me-1"></i>Homme
                                            </span>
                                        @else
                                            <span class="badge bg-pink">
                                                <i class="fas fa-female me-1"></i>Femme
                                            </span>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th>Date de naissance:</th>
                                    <td>
                                        <i class="fas fa-birthday-cake text-muted me-2"></i>
                                        {{ $utilisateur->date_naissance->format('d/m/Y') }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>Âge:</th>
                                    <td>
                                        <span class="badge bg-info">
                                            {{ $utilisateur->date_naissance->age }} ans
                                        </span>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Statut:</th>
                                    <td>
                                        @php
                                            $statusColors = [
                                                'Actif' => 'success',
                                                'Inactif' => 'secondary',
                                                'En attente' => 'warning',
                                                'Suspendu' => 'danger'
                                            ];
                                            $statut = $utilisateur->statut ?? 'Inactif';
                                            $color = $statusColors[$statut] ?? 'secondary';
                                        @endphp
                                        <span class="badge bg-{{ $color }}">
                                            {{ $statut }}
                                        </span>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Langue:</th>
                                    <td>
                                        @if($utilisateur->langue)
                                            <i class="fas fa-language text-muted me-2"></i>
                                            {{ $utilisateur->langue->nom }} 
                                            <small class="text-muted">({{ $utilisateur->langue->code_langue }})</small>
                                        @else
                                            <span class="text-muted">
                                                <i class="fas fa-language me-2"></i>Non définie
                                            </span>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th>Rôle:</th>
                                    <td>
                                        @if($utilisateur->role)
                                            @php
                                                $roleColors = [
                                                    'Admin' => 'danger',
                                                    'Modérateur' => 'warning',
                                                    'Utilisateur' => 'primary',
                                                    'Éditeur' => 'info'
                                                ];
                                                $roleNom = $utilisateur->role->nom;
                                                $roleColor = $roleColors[$roleNom] ?? 'secondary';
                                            @endphp
                                            <span class="badge bg-{{ $roleColor }}">
                                                <i class="fas fa-user-tag me-1"></i>{{ $roleNom }}
                                            </span>
                                        @else
                                            <span class="badge bg-warning">
                                                <i class="fas fa-exclamation-triangle me-1"></i>Non défini
                                            </span>
                                        @endif
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>

                    <!-- Dates importantes -->
                    <div class="card mt-4">
                        <div class="card-header">
                            <h5 class="card-title">Dates importantes</h5>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered">
                                <tr>
                                    <th width="30%">Date d'inscription:</th>
                                    <td>
                                        <i class="fas fa-calendar-plus text-muted me-2"></i>
                                        {{ $utilisateur->date_inscription->format('d/m/Y H:i') }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>Compte créé le:</th>
                                    <td>
                                        <i class="fas fa-calendar-check text-muted me-2"></i>
                                        {{ $utilisateur->created_at->format('d/m/Y H:i') }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>Dernière modification:</th>
                                    <td>
                                        <i class="fas fa-calendar-edit text-muted me-2"></i>
                                        {{ $utilisateur->updated_at->format('d/m/Y H:i') }}
                                    </td>
                                </tr>
                                @if($utilisateur->email_verified_at)
                                <tr>
                                    <th>Email vérifié le:</th>
                                    <td>
                                        <i class="fas fa-check-circle text-success me-2"></i>
                                        {{ $utilisateur->email_verified_at->format('d/m/Y H:i') }}
                                    </td>
                                </tr>
                                @endif
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mt-4">
                <a href="{{ route('admin.utilisateurs.index') }}" class="btn btn-secondary">
                    <i class="fas fa-arrow-left"></i> Retour à la liste
                </a>
                @if(auth()->user()->can('edit-utilisateurs'))
                <a href="{{ route('admin.utilisateurs.edit', $utilisateur->id) }}" class="btn btn-warning">
                    <i class="fas fa-edit"></i> Modifier
                </a>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection

@push('styles')
<style>
.bg-pink {
    background-color: #e83e8c !important;
    color: white;
}

.photo-metadata {
    background-color: #f8f9fa;
    border-radius: 5px;
    padding: 10px;
    margin-top: 10px;
}

.img-thumbnail.rounded-circle {
    border: 3px solid #dee2e6;
    box-shadow: 0 2px 4px rgba(0,0,0,0.1);
}

.card {
    box-shadow: 0 2px 4px rgba(0,0,0,0.1);
    border: 1px solid #dee2e6;
}

.card-header {
    background-color: #f8f9fa;
    border-bottom: 1px solid #dee2e6;
}

.table th {
    background-color: #f8f9fa;
    font-weight: 600;
}

.badge {
    font-size: 0.85em;
    padding: 0.5em 0.75em;
}
</style>
@endpush