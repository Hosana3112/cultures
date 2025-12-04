@extends('layout')

@section('title', 'Créer un Utilisateur')
@section('page_title', 'Créer un Utilisateur')
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('utilisateurs.index') }}">Utilisateurs</a></li>
    <li class="breadcrumb-item active">Créer</li>
@endsection

@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Créer un nouvel Utilisateur</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('utilisateurs.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group mb-3">
                            <label for="nom" class="form-label">Nom *</label>
                            <input type="text" class="form-control @error('nom') is-invalid @enderror" 
                                   id="nom" name="nom" value="{{ old('nom') }}" 
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
                                   id="prenom" name="prenom" value="{{ old('prenom') }}" 
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
                                   id="email" name="email" value="{{ old('email') }}" 
                                   placeholder="exemple@email.com" required>
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="col-md-6">
                        <div class="form-group mb-3">
                            <label for="mot_de_passe" class="form-label">Mot de passe *</label>
                            <input type="password" class="form-control @error('mot_de_passe') is-invalid @enderror" 
                                   id="mot_de_passe" name="mot_de_passe" 
                                   placeholder="Minimum 6 caractères" required>
                            @error('mot_de_passe')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="col-md-6">
                        <div class="form-group mb-3">
                            <label for="sexe" class="form-label">Sexe *</label>
                            <select class="form-control @error('sexe') is-invalid @enderror" id="sexe" name="sexe" required>
                                <option value="">Sélectionnez...</option>
                                <option value="M" {{ old('sexe') == 'M' ? 'selected' : '' }}>Homme</option>
                                <option value="F" {{ old('sexe') == 'F' ? 'selected' : '' }}>Femme</option>
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
                                   id="date_naissance" name="date_naissance" value="{{ old('date_naissance') }}" 
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
                                <option value="Actif" {{ old('statut') == 'Actif' ? 'selected' : '' }}>Actif</option>
                                <option value="Inactif" {{ old('statut') == 'Inactif' ? 'selected' : '' }}>Inactif</option>
                                <option value="En attente" {{ old('statut') == 'En attente' ? 'selected' : '' }}>En attente</option>
                            </select>
                            @error('statut')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    
                    <!-- SECTION PHOTO AVEC UPLOAD -->
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Photo de profil</h4>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <label for="photo_file" class="form-label">Fichier photo</label>
                                            <input type="file" class="form-control @error('photo_file') is-invalid @enderror" 
                                                   id="photo_file" name="photo_file" 
                                                   accept="image/jpeg,image/png,image/jpg,image/gif">
                                            <small class="form-text text-muted">
                                                Formats acceptés: JPG, PNG, GIF. Taille max: 2MB
                                            </small>
                                            @error('photo_file')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <label for="photo_description" class="form-label">Description de la photo</label>
                                            <textarea class="form-control @error('photo_description') is-invalid @enderror" 
                                                      id="photo_description" name="photo_description" 
                                                      rows="2" placeholder="Description optionnelle de la photo">{{ old('photo_description') }}</textarea>
                                            @error('photo_description')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                
                                <!-- Aperçu de la photo -->
                                <div class="row">
                                    <div class="col-md-6">
                                        <div id="photo-preview" class="mt-2" style="display: none;">
                                            <p class="text-muted">Aperçu:</p>
                                            <img id="preview-image" src="#" alt="Aperçu de la photo" 
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
                    
                    <!-- SELECT LANGUE -->
                    <div class="col-md-6">
                        <div class="form-group mb-3">
                            <label for="langue_id" class="form-label">Langue *</label>
                            <select class="form-control @error('langue_id') is-invalid @enderror" id="langue_id" name="langue_id" required>
                                <option value="">Sélectionnez une langue...</option>
                                @foreach($langues as $langue)
                                    <option value="{{ $langue->id }}" {{ old('langue_id') == $langue->id ? 'selected' : '' }}>
                                        {{ $langue->nom }} ({{ $langue->code_langue }})
                                    </option>
                                @endforeach
                            </select>
                            @error('langue_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    
                    <!-- SELECT ROLE -->
                    <div class="col-md-6">
                        <div class="form-group mb-3">
                            <label for="role_id" class="form-label">Rôle *</label>
                            <select class="form-control @error('role_id') is-invalid @enderror" id="role_id" name="role_id" required>
                                <option value="">Sélectionnez un rôle...</option>
                                @foreach($roles as $role)
                                    <option value="{{ $role->id }}" {{ old('role_id') == $role->id ? 'selected' : '' }}>
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
                    <button type="submit" class="btn btn-success">
                        <i class="bi bi-check-circle"></i> Créer l'utilisateur
                    </button>
                    <a href="{{ route('utilisateurs.index') }}" class="btn btn-secondary">
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
            const validTypes = ['image/jpeg', 'image/png', 'image/jpg', 'image/gif'];
            if (!validTypes.includes(file.type)) {
                alert('Format de fichier non supporté. Utilisez JPG, PNG ou GIF.');
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
    
    // Validation de la date de naissance (18 ans minimum)
    const dateNaissanceInput = document.getElementById('date_naissance');
    dateNaissanceInput.addEventListener('change', function() {
        const selectedDate = new Date(this.value);
        const minDate = new Date();
        minDate.setFullYear(minDate.getFullYear() - 18);
        
        if (selectedDate > minDate) {
            alert('L\'utilisateur doit avoir au moins 18 ans.');
            this.value = '';
        }
    });
});
</script>
@endpush