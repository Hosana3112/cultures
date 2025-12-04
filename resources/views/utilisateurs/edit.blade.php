@extends('layout')

@section('title', 'Modifier l\'Utilisateur')
@section('page_title', 'Modifier l\'Utilisateur')
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ url('/admin/utilisateurs') }}">Utilisateurs</a></li>
    <li class="breadcrumb-item active">Modifier</li>
@endsection

@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Modifier l'Utilisateur</h3>
        </div>
        <div class="card-body">
            <form action="{{ url('/admin/utilisateurs/' . $utilisateur->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group mb-3">
                            <label for="nom" class="form-label">Nom *</label>
                            <input type="text" class="form-control @error('nom') is-invalid @enderror" 
                                   id="nom" name="nom" value="{{ old('nom', $utilisateur->nom) }}" 
                                   placeholder="Entrez le nom" required>
                            @error('nom')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="col-md-6">
                        <div class="form-group mb-3">
                            <label for="prenom" class="form-label">Prénom *</label>
                            <input type="text" class="form-control @error('prenom') is-invalid @enderror" 
                                   id="prenom" name="prenom" value="{{ old('prenom', $utilisateur->prenom) }}" 
                                   placeholder="Entrez le prénom" required>
                            @error('prenom')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="col-md-6">
                        <div class="form-group mb-3">
                            <label for="email" class="form-label">Email *</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" 
                                   id="email" name="email" value="{{ old('email', $utilisateur->email) }}" 
                                   placeholder="exemple@email.com" required>
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="col-md-6">
                        <div class="form-group mb-3">
                            <label for="mot_de_passe" class="form-label">Mot de passe</label>
                            <input type="password" class="form-control @error('mot_de_passe') is-invalid @enderror" 
                                   id="mot_de_passe" name="mot_de_passe" 
                                   placeholder="Laisser vide pour ne pas changer">
                            @error('mot_de_passe')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <small class="form-text text-muted">Laisser vide pour conserver l'ancien mot de passe</small>
                        </div>
                    </div>
                    
                    <div class="col-md-6">
                        <div class="form-group mb-3">
                            <label for="sexe" class="form-label">Sexe *</label>
                            <select class="form-control @error('sexe') is-invalid @enderror" id="sexe" name="sexe" required>
                                <option value="">Sélectionnez...</option>
                                <option value="M" {{ old('sexe', $utilisateur->sexe) == 'M' ? 'selected' : '' }}>Homme</option>
                                <option value="F" {{ old('sexe', $utilisateur->sexe) == 'F' ? 'selected' : '' }}>Femme</option>
                            </select>
                            @error('sexe')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="col-md-6">
                        <div class="form-group mb-3">
                            <label for="date_naissance" class="form-label">Date de naissance *</label>
                            <input type="date" class="form-control @error('date_naissance') is-invalid @enderror" 
                                   id="date_naissance" name="date_naissance" value="{{ old('date_naissance', $utilisateur->date_naissance->format('Y-m-d')) }}" 
                                   max="{{ date('Y-m-d', strtotime('-18 years')) }}" required>
                            @error('date_naissance')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="col-md-6">
                        <div class="form-group mb-3">
                            <label for="statut" class="form-label">Statut</label>
                            <select class="form-control @error('statut') is-invalid @enderror" id="statut" name="statut">
                                <option value="">Sélectionnez un statut...</option>
                                <option value="Actif" {{ old('statut', $utilisateur->statut) == 'Actif' ? 'selected' : '' }}>Actif</option>
                                <option value="Inactif" {{ old('statut', $utilisateur->statut) == 'Inactif' ? 'selected' : '' }}>Inactif</option>
                                <option value="En attente" {{ old('statut', $utilisateur->statut) == 'En attente' ? 'selected' : '' }}>En attente</option>
                                <option value="Suspendu" {{ old('statut', $utilisateur->statut) == 'Suspendu' ? 'selected' : '' }}>Suspendu</option>
                            </select>
                            @error('statut')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    
                    <!-- SECTION PHOTO AVEC UPLOAD ET AFFICHAGE -->
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Photo de profil</h4>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <!-- Photo actuelle -->
                                    <div class="col-md-4">
                                        <div class="form-group mb-3">
                                            <label class="form-label">Photo actuelle</label>
                                            <div class="text-center">
                                                @if($utilisateur->photo_chemin)
                                                    <img src="{{ Storage::url($utilisateur->photo_chemin) }}" 
                                                         alt="Photo de {{ $utilisateur->prenom }} {{ $utilisateur->nom }}"
                                                         class="img-thumbnail" style="max-width: 200px; max-height: 200px;">
                                                    <div class="mt-2">
                                                        <small class="text-muted d-block">
                                                            Taille: {{ $utilisateur->photo_taille ? round($utilisateur->photo_taille / 1024, 2) . ' KB' : 'N/A' }}
                                                        </small>
                                                        <small class="text-muted d-block">
                                                            Type: {{ $utilisateur->photo_mime_type ?? 'N/A' }}
                                                        </small>
                                                        @if($utilisateur->photo_description)
                                                            <small class="text-muted d-block">
                                                                Description: {{ $utilisateur->photo_description }}
                                                            </small>
                                                        @endif
                                                    </div>
                                                @else
                                                    <div class="bg-light rounded p-4 text-muted">
                                                        <i class="bi bi-person-circle" style="font-size: 3rem;"></i>
                                                        <p class="mt-2 mb-0">Aucune photo</p>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <!-- Upload nouvelle photo -->
                                    <div class="col-md-8">
                                        <div class="form-group mb-3">
                                            <label for="photo_file" class="form-label">Nouvelle photo</label>
                                            <input type="file" class="form-control @error('photo_file') is-invalid @enderror" 
                                                   id="photo_file" name="photo_file" 
                                                   accept="image/jpeg,image/png,image/jpg,image/gif,image/webp">
                                            <small class="form-text text-muted">
                                                Formats acceptés: JPG, PNG, GIF, WEBP. Taille max: 2MB
                                            </small>
                                            @error('photo_file')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        
                                        <div class="form-group mb-3">
                                            <label for="photo_description" class="form-label">Description de la photo</label>
                                            <textarea class="form-control @error('photo_description') is-invalid @enderror" 
                                                      id="photo_description" name="photo_description" 
                                                      rows="2" placeholder="Description optionnelle de la photo">{{ old('photo_description', $utilisateur->photo_description) }}</textarea>
                                            @error('photo_description')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        
                                        <!-- Option pour supprimer la photo -->
                                        <div class="form-check mb-3">
                                            <input class="form-check-input" type="checkbox" id="supprimer_photo" name="supprimer_photo" value="1">
                                            <label class="form-check-label text-danger" for="supprimer_photo">
                                                Supprimer la photo actuelle
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                
                                <!-- Aperçu de la nouvelle photo -->
                                <div class="row">
                                    <div class="col-md-6">
                                        <div id="photo-preview" class="mt-2" style="display: none;">
                                            <p class="text-muted">Aperçu de la nouvelle photo:</p>
                                            <img id="preview-image" src="#" alt="Aperçu de la nouvelle photo" 
                                                 class="img-thumbnail" style="max-width: 200px; max-height: 200px;">
                                            <div class="mt-2">
                                                <small id="file-info" class="text-muted"></small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-6">
                        <div class="form-group mb-3">
                            <label for="langue_id" class="form-label">Langue *</label>
                            <select class="form-control @error('langue_id') is-invalid @enderror" id="langue_id" name="langue_id" required>
                                <option value="">Sélectionnez une langue...</option>
                                @foreach($langues as $langue)
                                    <option value="{{ $langue->id }}" {{ old('langue_id', $utilisateur->langue_id) == $langue->id ? 'selected' : '' }}>
                                        {{ $langue->nom }} ({{ $langue->code_langue }})
                                    </option>
                                @endforeach
                            </select>
                            @error('langue_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="col-md-6">
                        <div class="form-group mb-3">
                            <label for="role_id" class="form-label">Rôle *</label>
                            <select class="form-control @error('role_id') is-invalid @enderror" id="role_id" name="role_id" required>
                                <option value="">Sélectionnez un rôle...</option>
                                @foreach($roles as $role)
                                    <option value="{{ $role->id }}" {{ old('role_id', $utilisateur->role_id) == $role->id ? 'selected' : '' }}>
                                        {{ $role->nom }}
                                    </option>
                                @endforeach
                            </select>
                            @error('role_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="mt-4">
                    <button type="submit" class="btn btn-warning">
                        <i class="bi bi-pencil"></i> Modifier l'utilisateur
                    </button>
                    <a href="{{ url('/admin/utilisateurs') }}" class="btn btn-secondary">
                        <i class="bi bi-arrow-left"></i> Retour
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const photoInput = document.getElementById('photo_file');
    const previewContainer = document.getElementById('photo-preview');
    const previewImage = document.getElementById('preview-image');
    const fileInfo = document.getElementById('file-info');
    const supprimerPhotoCheckbox = document.getElementById('supprimer_photo');
    
    // Gestion de l'upload de nouvelle photo
    photoInput.addEventListener('change', function() {
        const file = this.files[0];
        
        if (file) {
            // Vérifier la taille du fichier (2MB max)
            if (file.size > 2 * 1024 * 1024) {
                alert('Le fichier est trop volumineux. Taille maximum: 2MB');
                this.value = '';
                previewContainer.style.display = 'none';
                return;
            }
            
            // Vérifier le type de fichier
            const validTypes = ['image/jpeg', 'image/png', 'image/jpg', 'image/gif', 'image/webp'];
            if (!validTypes.includes(file.type)) {
                alert('Format de fichier non supporté. Utilisez JPG, PNG, GIF ou WEBP.');
                this.value = '';
                previewContainer.style.display = 'none';
                return;
            }
            
            // Afficher l'aperçu
            const reader = new FileReader();
            reader.onload = function(e) {
                previewImage.src = e.target.result;
                previewContainer.style.display = 'block';
                
                // Afficher les informations du fichier
                fileInfo.textContent = `Nom: ${file.name} | Taille: ${(file.size / 1024).toFixed(2)} KB | Type: ${file.type}`;
            }
            reader.readAsDataURL(file);
        } else {
            previewContainer.style.display = 'none';
        }
    });
    
    // Désactiver l'upload si on choisit de supprimer la photo
    supprimerPhotoCheckbox.addEventListener('change', function() {
        if (this.checked) {
            photoInput.disabled = true;
            photoInput.value = '';
            previewContainer.style.display = 'none';
        } else {
            photoInput.disabled = false;
        }
    });
    
    // Validation de la date de naissance (18 ans minimum)
    const dateNaissanceInput = document.getElementById('date_naissance');
    dateNaissanceInput.addEventListener('change', function() {
        const selectedDate = new Date(this.value);
        const minDate = new Date();
        minDate.setFullYear(minDate.getFullYear() - 18);
        
        if (selectedDate > minDate) {
            alert('L\'utilisateur doit avoir au moins 18 ans.');
            this.value = '{{ $utilisateur->date_naissance->format('Y-m-d') }}';
        }
    });
});
</script>
@endpush