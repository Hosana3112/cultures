<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil - Culture Bénin</title>
    <style>
        :root {
            --primary-color: #008751;
            --primary-hover: #006642;
            --accent-color: #d4af37;
            --secondary-color: #e8f5e8;
            --text-color: #1a331c;
            --border-color: #c8e6c9;
            --error-color: #dc2626;
            --success-color: #16a34a;
            --background-gradient: linear-gradient(135deg, #f0f9f0 0%, #e8f5e8 50%, #d4edda 100%);
        }
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, sans-serif;
        }
        
        body {
            background: var(--background-gradient);
            min-height: 100vh;
            padding: 20px;
        }
        
        .profile-container {
            max-width: 1000px;
            margin: 0 auto;
        }
        
        .profile-header {
            text-align: center;
            margin-bottom: 30px;
        }
        
        .logo {
            width: 80px;
            height: 80px;
            margin: 0 auto 15px;
            background: white;
            border-radius: 50%;
            padding: 8px;
            box-shadow: 0 8px 24px rgba(0, 135, 81, 0.12);
            border: 2px solid var(--border-color);
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        .logo img {
            max-width: 100%;
            max-height: 100%;
        }
        
        .profile-title {
            font-size: 32px;
            font-weight: 800;
            color: var(--primary-color);
            margin-bottom: 5px;
            background: linear-gradient(135deg, var(--primary-color), var(--accent-color));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
        
        .profile-subtitle {
            color: #64748b;
            font-size: 16px;
        }
        
        .profile-grid {
            display: grid;
            gap: 25px;
        }
        
        .profile-card {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            box-shadow: 0 20px 40px rgba(0, 135, 81, 0.1);
            padding: 30px;
            border: 1px solid rgba(255, 255, 255, 0.8);
            position: relative;
        }
        
        .profile-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(90deg, var(--primary-color), var(--accent-color));
            border-radius: 20px 20px 0 0;
        }
        
        .card-header {
            margin-bottom: 25px;
        }
        
        .card-title {
            font-size: 20px;
            font-weight: 700;
            color: var(--primary-color);
            display: flex;
            align-items: center;
            gap: 10px;
        }
        
        .card-description {
            color: #64748b;
            margin-top: 5px;
            font-size: 14px;
        }
        
        .photo-section {
            background: var(--secondary-color);
            border-radius: 15px;
            padding: 25px;
            margin-bottom: 25px;
            border: 2px dashed var(--border-color);
        }
        
        .photo-upload-area {
            display: flex;
            gap: 25px;
            align-items: flex-start;
        }
        
        .photo-preview-container {
            flex-shrink: 0;
            width: 140px;
            text-align: center;
        }
        
        .photo-preview {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            border: 3px solid var(--border-color);
            background: white;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 10px;
            overflow: hidden;
        }
        
        .photo-preview img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        
        .photo-placeholder {
            width: 100%;
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #f8f9fa;
            color: #6c757d;
            font-size: 14px;
            text-align: center;
            padding: 10px;
        }
        
        .photo-upload-controls {
            flex: 1;
        }
        
        .file-input-wrapper {
            position: relative;
            margin-bottom: 15px;
        }
        
        .file-input {
            width: 100%;
            padding: 12px 16px;
            border: 2px solid var(--border-color);
            border-radius: 8px;
            background: white;
            font-size: 14px;
            cursor: pointer;
        }
        
        .file-input::file-selector-button {
            background: var(--primary-color);
            color: white;
            border: none;
            padding: 8px 16px;
            border-radius: 6px;
            margin-right: 10px;
            cursor: pointer;
            font-size: 14px;
        }
        
        .photo-info {
            font-size: 12px;
            color: #64748b;
            margin-top: 5px;
        }
        
        .form-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
        }
        
        .full-width {
            grid-column: 1 / -1;
        }
        
        .form-group {
            margin-bottom: 20px;
        }
        
        label {
            display: block;
            font-size: 14px;
            font-weight: 600;
            color: var(--text-color);
            margin-bottom: 8px;
        }
        
        .input-field {
            width: 100%;
            padding: 12px 16px;
            border: 2px solid var(--border-color);
            border-radius: 8px;
            font-size: 14px;
            transition: all 0.3s ease;
            background-color: white;
        }
        
        .input-field:focus {
            outline: none;
            border-color: var(--primary-color);
            box-shadow: 0 0 0 3px rgba(0, 135, 81, 0.1);
        }
        
        .input-error {
            border-color: var(--error-color);
            background-color: #fef2f2;
        }
        
        .error-message {
            color: var(--error-color);
            font-size: 12px;
            margin-top: 5px;
            display: flex;
            align-items: center;
            gap: 4px;
        }
        
        .success-message {
            color: var(--success-color);
            font-size: 14px;
            margin-top: 10px;
            padding: 10px;
            background: #f0fdf4;
            border-radius: 8px;
            border: 1px solid #bbf7d0;
        }
        
        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 12px 24px;
            border: none;
            border-radius: 10px;
            font-size: 14px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            text-decoration: none;
        }
        
        .btn-primary {
            background: linear-gradient(135deg, var(--primary-color), var(--primary-hover));
            color: white;
            box-shadow: 0 8px 24px rgba(0, 135, 81, 0.3);
        }
        
        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 12px 32px rgba(0, 135, 81, 0.4);
        }
        
        .btn-danger {
            background: linear-gradient(135deg, #dc2626, #b91c1c);
            color: white;
            box-shadow: 0 8px 24px rgba(220, 38, 38, 0.3);
        }
        
        .btn-danger:hover {
            transform: translateY(-2px);
            box-shadow: 0 12px 32px rgba(220, 38, 38, 0.4);
        }
        
        .form-actions {
            display: flex;
            gap: 15px;
            align-items: center;
            margin-top: 25px;
        }
        
        .verification-alert {
            background: #fff3cd;
            border: 1px solid #ffeaa7;
            color: #856404;
            border-radius: 10px;
            padding: 15px;
            margin-bottom: 20px;
        }
        
        .delete-section {
            background: #fef2f2;
            border-radius: 15px;
            padding: 25px;
            border-left: 4px solid #dc3545;
        }
        
        .modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            z-index: 1000;
            align-items: center;
            justify-content: center;
        }
        
        .modal-content {
            background: white;
            border-radius: 15px;
            padding: 30px;
            max-width: 500px;
            width: 90%;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.3);
        }
        
        .modal-actions {
            display: flex;
            gap: 15px;
            justify-content: flex-end;
            margin-top: 25px;
        }
        
        @media (max-width: 768px) {
            .form-grid {
                grid-template-columns: 1fr;
            }
            
            .photo-upload-area {
                flex-direction: column;
                gap: 15px;
            }
            
            .form-actions {
                flex-direction: column;
            }
            
            .btn {
                width: 100%;
            }
        }
    </style>
</head>
<body>
    <div class="profile-container">
        <div class="profile-header">
            <div class="logo">
                <img src="{{URL::asset('adminlte/img/logoculture__2_-removebg-preview.png')}}" alt="Culture Bénin">
            </div>
            <h1 class="profile-title">Gestion du Profil</h1>
            <p class="profile-subtitle">Gérez vos informations personnelles et la sécurité de votre compte</p>
        </div>
        
        <div class="profile-grid">
            <!-- Informations du profil -->
            <div class="profile-card">
                @include('profile.partials.update-profile-information-form')
            </div>
            
            <!-- Mot de passe -->
            <div class="profile-card">
                @include('profile.partials.update-password-form')
            </div>
            
            <!-- Suppression du compte -->
            <div class="profile-card">
                @include('profile.partials.delete-user-form')
            </div>
        </div>
    </div>

    <!-- Modal de suppression -->
    <div id="deleteModal" class="modal">
        <div class="modal-content">
            <h3 style="color: #dc2626; margin-bottom: 15px;">Confirmer la suppression</h3>
            <p style="margin-bottom: 20px; color: #64748b;">
                Êtes-vous sûr de vouloir supprimer votre compte ? Cette action est irréversible.
            </p>
            <form id="deleteForm" method="POST" action="{{ route('profile.destroy') }}">
                @csrf
                @method('delete')
                <div class="form-group">
                    <label for="password">Mot de passe de confirmation</label>
                    <input type="password" id="password" name="password" class="input-field" placeholder="Entrez votre mot de passe" required>
                </div>
                <div class="modal-actions">
                    <button type="button" class="btn" onclick="closeModal()" style="background: #6b7280; color: white;">Annuler</button>
                    <button type="submit" class="btn btn-danger">Supprimer le compte</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        // Gestion de l'upload de photo
        function handlePhotoUpload(inputId, previewId) {
            const photoInput = document.getElementById(inputId);
            const photoPreview = document.getElementById(previewId);
            
            if (photoInput) {
                photoInput.addEventListener('change', function() {
                    const file = this.files[0];
                    
                    if (file) {
                        if (file.size > 2 * 1024 * 1024) {
                            alert('Le fichier est trop volumineux. Taille maximum: 2MB');
                            this.value = '';
                            return;
                        }
                        
                        const validTypes = ['image/jpeg', 'image/png', 'image/jpg', 'image/webp'];
                        if (!validTypes.includes(file.type)) {
                            alert('Format de fichier non supporté. Utilisez JPG, PNG ou WEBP.');
                            this.value = '';
                            return;
                        }
                        
                        const reader = new FileReader();
                        reader.onload = function(e) {
                            photoPreview.innerHTML = `<img src="${e.target.result}" alt="Aperçu de la photo">`;
                        };
                        reader.readAsDataURL(file);
                    }
                });
            }
        }

        // Modal functions
        function openModal() {
            document.getElementById('deleteModal').style.display = 'flex';
        }

        function closeModal() {
            document.getElementById('deleteModal').style.display = 'none';
        }

        // Initialize photo upload handlers
        document.addEventListener('DOMContentLoaded', function() {
            handlePhotoUpload('profile_photo', 'profilePhotoPreview');
        });
    </script>
</body>
</html>