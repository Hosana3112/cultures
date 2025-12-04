@extends('layout')

@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Détails du Commentaire</h3>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered">
                        <tr>
                            <th width="30%">ID:</th>
                            <td>{{ $commentaire->id_commentaire }}</td>
                        </tr>
                        <tr>
                            <th>Utilisateur:</th>
                            <td>
                                @if($commentaire->user)
                                    <strong>{{ $commentaire->user->prenom }} {{ $commentaire->user->nom }}</strong>
                                    <br><small class="text-muted">{{ $commentaire->user->email }}</small>
                                    <br><small class="text-muted">Langue: {{ $commentaire->user->langue->nom ?? 'Non définie' }}</small>
                                @else
                                    <span class="text-muted">Utilisateur inconnu</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>Contenu:</th>
                            <td>
                                @if($commentaire->contenu)
                                    <strong>{{ $commentaire->contenu->titre }}</strong>
                                    <br>
                                    <small class="text-muted">
                                        Type: {{ $commentaire->contenu->typeContenu->nom ?? 'Non défini' }}
                                        | Statut: {{ $commentaire->contenu->statut }}
                                    </small>
                                @else
                                    <span class="text-muted">Contenu supprimé</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>Note:</th>
                            <td>
                                <div class="star-rating">
                                    @for($i = 1; $i <= 5; $i++)
                                        @if($i <= $commentaire->note)
                                            <i class="fas fa-star text-warning"></i>
                                        @else
                                            <i class="far fa-star text-secondary"></i>
                                        @endif
                                    @endfor
                                    <span class="ms-2 badge bg-primary">{{ $commentaire->note }}/5</span>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <th>Date:</th>
                            <td>{{ $commentaire->date->format('d/m/Y à H:i') }}</td>
                        </tr>
                        <tr>
                            <th>Créé le:</th>
                            <td>{{ $commentaire->date->format('d/m/Y H:i') }}</td>
                        </tr>
                    </table>
                </div>
                
                <!-- Commentaire complet -->
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">Commentaire complet</h5>
                        </div>
                        <div class="card-body">
                            <div class="bg-light p-3 rounded">
                                <p class="mb-0">{{ $commentaire->texte }}</p>
                            </div>
                            
                            <!-- Avis selon la note -->
                            <div class="mt-3">
                                @if($commentaire->note >= 4)
                                    <div class="alert alert-success">
                                        <i class="fas fa-smile"></i>
                                        <strong>Avis positif</strong> - L'utilisateur a apprécié le contenu
                                    </div>
                                @elseif($commentaire->note == 3)
                                    <div class="alert alert-info">
                                        <i class="fas fa-meh"></i>
                                        <strong>Avis neutre</strong> - L'utilisateur est mitigé
                                    </div>
                                @else
                                    <div class="alert alert-warning">
                                        <i class="fas fa-frown"></i>
                                        <strong>Avis négatif</strong> - L'utilisateur n'a pas aimé le contenu
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mt-4">
                <a href="{{ route('commentaires.index') }}" class="btn btn-secondary">
                    <i class="fas fa-arrow-left"></i> Retour à la liste
                </a>
            </div>
        </div>
    </div>
</div>
@endsection

<style>
.star-rating {
    display: inline-flex;
    align-items: center;
    font-size: 1.2rem;
}
</style>