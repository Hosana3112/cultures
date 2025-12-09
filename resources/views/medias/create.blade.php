@extends('layout')

@section('title', 'Créer un Média')
@section('page_title', 'Créer un Média')
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ url('/admin/medias') }}">Médias</a></li>
    <li class="breadcrumb-item active">Créer</li>
@endsection

@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Créer un nouveau Média</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.medias.store') }}" method="POST" enctype="multipart/form-data" id="media-form">
                @csrf
                
                <div class="row">
                    <div class="col-md-6">
                        <!-- Type de média en premier pour déterminer les contraintes -->
                        <div class="form-group mb-3">
                            <label for="type_media_id" class="form-label">Type de média *</label>
                            <select class="form-control @error('type_media_id') is-invalid @enderror" 
                                    id="type_media_id" name="type_media_id" required>
                                <option value="">Sélectionnez un type...</option>
                                @foreach($typemedias as $type)
                                    <option value="{{ $type->id }}" 
                                            {{ old('type_media_id') == $type->id ? 'selected' : '' }}>
                                        {{ $type->nom }}
                                    </option>
                                @endforeach
                            </select>
                            @error('type_media_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6">
                        <!-- Fichier avec contraintes dynamiques -->
                        <div class="form-group mb-3">
                            <label for="fichier" class="form-label">Fichier *</label>
                            <input type="file" class="form-control @error('fichier') is-invalid @enderror" 
                                   id="fichier" name="fichier" required>
                            @error('fichier')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <small class="form-text text-muted" id="file-help">
                                Sélectionnez d'abord un type de média
                            </small>
                            <div id="file-error" class="text-danger small mt-1" style="display: none;"></div>
                        </div>
                    </div>
                    
                    <div class="col-md-6">
                        <div class="form-group mb-3">
                            <label for="contenu_id" class="form-label">Contenu associé *</label>
                            <select class="form-control @error('contenu_id') is-invalid @enderror" id="contenu_id" name="contenu_id" required>
                                <option value="">Sélectionnez un contenu...</option>
                                @foreach($contenus as $contenu)
                                    <option value="{{ $contenu->id }}" {{ old('contenu_id') == $contenu->id ? 'selected' : '' }}>
                                        {{ $contenu->titre }} ({{ $contenu->typeContenu->nom ?? 'Sans type' }})
                                    </option>
                                @endforeach
                            </select>
                            @error('contenu_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="col-md-12">
                        <div class="form-group mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea class="form-control @error('description') is-invalid @enderror" 
                                      id="description" name="description" rows="4" 
                                      placeholder="Description du média, contexte, droits d'auteur...">{{ old('description') }}</textarea>
                            @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="mt-4">
                    <button type="submit" class="btn btn-success" id="submit-btn">
                        <i class="bi bi-check-circle"></i> Créer le média
                    </button>
                    <a href="{{ route('admin.medias.index') }}" class="btn btn-secondary">
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
// Définir les contraintes par type de média basé sur le nom
function getTypeConstraints(typeName) {
    const constraints = {
        // Images
        'image': {
            accept: 'image/*',
            extensions: ['.jpg', '.jpeg', '.png', '.gif', '.webp', '.bmp', '.svg'],
            help: 'Formats acceptés : JPG, JPEG, PNG, GIF, WEBP, BMP, SVG (max: 5MB)'
        },
        // Vidéos
        'vidéo': {
            accept: 'video/*',
            extensions: ['.mp4', '.avi', '.mov', '.wmv', '.flv', '.webm', '.mkv'],
            help: 'Formats acceptés : MP4, AVI, MOV, WMV, FLV, WEBM, MKV (max: 5MB)'
        },
        'video': {
            accept: 'video/*',
            extensions: ['.mp4', '.avi', '.mov', '.wmv', '.flv', '.webm', '.mkv'],
            help: 'Formats acceptés : MP4, AVI, MOV, WMV, FLV, WEBM, MKV (max: 5MB)'
        },
        // Audio
        'audio': {
            accept: 'audio/*',
            extensions: ['.mp3', '.wav', '.ogg', '.m4a', '.aac', '.flac'],
            help: 'Formats acceptés : MP3, WAV, OGG, M4A, AAC, FLAC (max: 5MB)'
        },
        // Documents
        'document': {
            accept: '.pdf,.doc,.docx,.txt,.xls,.xlsx,.ppt,.pptx',
            extensions: ['.pdf', '.doc', '.docx', '.txt', '.xls', '.xlsx', '.ppt', '.pptx'],
            help: 'Formats acceptés : PDF, DOC, DOCX, TXT, XLS, XLSX, PPT, PPTX (max: 5MB)'
        },
        // Archives
        'archive': {
            accept: '.zip,.rar,.7z,.tar,.gz',
            extensions: ['.zip', '.rar', '.7z', '.tar', '.gz'],
            help: 'Formats acceptés : ZIP, RAR, 7Z, TAR, GZ (max: 5MB)'
        },
        'zip': {
            accept: '.zip,.rar,.7z,.tar,.gz',
            extensions: ['.zip', '.rar', '.7z', '.tar', '.gz'],
            help: 'Formats acceptés : ZIP, RAR, 7Z, TAR, GZ (max: 5MB)'
        }
    };

    // Chercher une correspondance dans le nom du type
    const typeLower = typeName.toLowerCase();
    for (const [key, constraint] of Object.entries(constraints)) {
        if (typeLower.includes(key)) {
            return constraint;
        }
    }

    // Par défaut, accepter tous les fichiers
    return {
        accept: '*/*',
        extensions: [],
        help: 'Tous les fichiers sont acceptés (max: 5MB)'
    };
}

document.addEventListener('DOMContentLoaded', function() {
    const typeSelect = document.getElementById('type_media_id');
    const fileInput = document.getElementById('fichier');
    const fileHelp = document.getElementById('file-help');
    const fileError = document.getElementById('file-error');
    const submitBtn = document.getElementById('submit-btn');
    const form = document.getElementById('media-form');

    // Mettre à jour les contraintes du fichier quand le type change
    typeSelect.addEventListener('change', function() {
        const selectedOption = this.options[this.selectedIndex];
        const typeName = selectedOption.textContent;
        
        const constraints = getTypeConstraints(typeName);
        
        fileInput.accept = constraints.accept;
        fileHelp.textContent = constraints.help;
        fileError.style.display = 'none';
        fileInput.value = ''; // Réinitialiser la sélection
        submitBtn.disabled = false;
    });

    // Validation côté client du fichier
    fileInput.addEventListener('change', function() {
        const selectedOption = typeSelect.options[typeSelect.selectedIndex];
        const typeName = selectedOption.textContent;
        const file = this.files[0];
        
        if (!typeName || !file) return;

        const constraints = getTypeConstraints(typeName);
        
        // Vérifier l'extension seulement si des extensions spécifiques sont définies
        if (constraints.extensions.length > 0) {
            const fileName = file.name.toLowerCase();
            const fileExtension = '.' + fileName.split('.').pop();
            
            const isValidExtension = constraints.extensions.some(ext => 
                fileName.endsWith(ext.replace('.', ''))
            );

            if (!isValidExtension) {
                const allowedExtensions = constraints.extensions.join(', ');
                fileError.textContent = `Extension non autorisée. Extensions acceptées : ${allowedExtensions}`;
                fileError.style.display = 'block';
                this.value = '';
                submitBtn.disabled = true;
                return;
            }
        }

        // Vérifier la taille (5MB max)
        if (file.size > 5 * 1024 * 1024) {
            fileError.textContent = 'Le fichier est trop volumineux. Taille maximum : 5MB';
            fileError.style.display = 'block';
            this.value = '';
            submitBtn.disabled = true;
            return;
        }

        // Tout est bon
        fileError.style.display = 'none';
        submitBtn.disabled = false;
    });

    // Validation finale avant soumission
    form.addEventListener('submit', function(e) {
        const selectedOption = typeSelect.options[typeSelect.selectedIndex];
        const typeName = selectedOption.textContent;
        const file = fileInput.files[0];
        
        if (!typeName) {
            e.preventDefault();
            alert('Veuillez sélectionner un type de média');
            return;
        }

        if (!file) {
            e.preventDefault();
            alert('Veuillez sélectionner un fichier');
            return;
        }

        const constraints = getTypeConstraints(typeName);
        
        // Vérifier l'extension
        if (constraints.extensions.length > 0) {
            const fileName = file.name.toLowerCase();
            const isValidExtension = constraints.extensions.some(ext => 
                fileName.endsWith(ext.replace('.', ''))
            );

            if (!isValidExtension) {
                e.preventDefault();
                const allowedExtensions = constraints.extensions.join(', ');
                alert(`Type de fichier non autorisé. Extensions acceptées : ${allowedExtensions}`);
                return;
            }
        }

        // Vérifier la taille
        if (file.size > 5 * 1024 * 1024) {
            e.preventDefault();
            alert('Le fichier est trop volumineux. Taille maximum : 5MB');
            return;
        }
    });

    // Initialiser au chargement si type déjà sélectionné
    if (typeSelect.value) {
        typeSelect.dispatchEvent(new Event('change'));
    }
});
</script>
@endpush