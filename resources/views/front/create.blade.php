<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Partager un contenu - BéninCulture</title>
    
    <!-- Fonts & Icons -->
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700;900&family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css" rel="stylesheet">

    <style>
        /* --- VARIABLES --- */
        :root {
            --primary: #1a4d2e;
            --primary-light: #2d6c47;
            --secondary: #d4a017;
            --secondary-light: #e6b845;
            --accent: #e0542e;
            --accent-light: #f06844;
            --light: #f9f7f2;
            --lighter: #fffefc;
            --dark: #2c2c2c;
            --gray: #666;
            --gray-light: #e9ecef;
            --border: #e0e0e0;
            --shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
            --shadow-hover: 0 8px 30px rgba(0, 0, 0, 0.12);
            --radius: 12px;
            --radius-large: 20px;
            --transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            --font-head: 'Playfair Display', serif;
            --font-body: 'Poppins', sans-serif;
        }

        /* --- RESET & BASE --- */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: var(--font-body);
            background: linear-gradient(135deg, #f5f2eb 0%, #fefefe 100%);
            color: var(--dark);
            line-height: 1.6;
            min-height: 100vh;
        }

        a { 
            text-decoration: none; 
            color: inherit;
            transition: var(--transition);
        }

        button {
            cursor: pointer;
            border: none;
            background: none;
            font-family: inherit;
            transition: var(--transition);
        }

        .container {
            max-width: 900px;
            margin: 0 auto;
            padding: 0 20px;
        }

        /* --- NAVIGATION --- */
        .navbar {
            background: var(--lighter);
            box-shadow: 0 2px 15px rgba(0, 0, 0, 0.05);
            padding: 1rem 2rem;
            position: sticky;
            top: 0;
            z-index: 1000;
            backdrop-filter: blur(10px);
            background: rgba(255, 255, 255, 0.95);
        }

        .nav-content {
            display: flex;
            justify-content: space-between;
            align-items: center;
            max-width: 1200px;
            margin: 0 auto;
        }

        .logo-container {
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }

        .logo-img {
            height: 36px;
            width: auto;
        }

        .logo-text {
            font-family: var(--font-head);
            font-size: 1.5rem;
            color: var(--primary);
            font-weight: 900;
        }

        .logo-text span {
            color: var(--secondary);
        }

        .nav-links {
            display: flex;
            gap: 2rem;
            align-items: center;
        }

        .nav-link {
            color: var(--dark);
            font-weight: 500;
            position: relative;
            padding: 0.5rem 0;
        }

        .nav-link::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 0;
            height: 2px;
            background: var(--secondary);
            transition: width 0.3s ease;
        }

        .nav-link:hover::after {
            width: 100%;
        }

        /* --- FORM CONTAINER --- */
        .form-container {
            padding: 2rem 0 4rem;
            min-height: calc(100vh - 80px);
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .form-card {
            background: var(--lighter);
            border-radius: var(--radius-large);
            box-shadow: var(--shadow);
            overflow: hidden;
            width: 100%;
            border: 1px solid rgba(255, 255, 255, 0.8);
            backdrop-filter: blur(10px);
        }

        /* --- FORM HEADER --- */
        .form-header {
            background: linear-gradient(135deg, var(--primary) 0%, var(--primary-light) 100%);
            padding: 3rem 2.5rem;
            color: white;
            text-align: center;
            position: relative;
            overflow: hidden;
        }

        .form-header::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: 
                radial-gradient(circle at 30% 30%, rgba(255, 255, 255, 0.1) 1px, transparent 1px),
                radial-gradient(circle at 70% 70%, rgba(212, 160, 23, 0.15) 1px, transparent 1px);
            background-size: 50px 50px;
            animation: floatPattern 20s linear infinite;
        }

        @keyframes floatPattern {
            0% { transform: translate(0, 0) rotate(0deg); }
            100% { transform: translate(-25px, -25px) rotate(360deg); }
        }

        .form-title {
            font-family: var(--font-head);
            font-size: 2.5rem;
            margin-bottom: 0.75rem;
            position: relative;
            z-index: 2;
        }

        .form-subtitle {
            font-size: 1.1rem;
            opacity: 0.9;
            position: relative;
            z-index: 2;
        }

        /* --- FORM CONTENT --- */
        .form-content {
            padding: 3rem 2.5rem;
        }

        .form-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 2rem;
        }

        @media (max-width: 768px) {
            .form-grid {
                grid-template-columns: 1fr;
            }
        }

        /* --- FORM GROUPS --- */
        .form-group {
            margin-bottom: 1.5rem;
        }

        .form-group.full-width {
            grid-column: 1 / -1;
        }

        .form-label {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            margin-bottom: 0.75rem;
            font-weight: 600;
            color: var(--primary);
            font-size: 1rem;
        }

        .form-label i {
            color: var(--secondary);
            font-size: 1.1rem;
            width: 20px;
        }

        .required {
            color: var(--accent);
            margin-left: 2px;
        }

        .form-control {
            width: 100%;
            padding: 1rem 1.25rem;
            border: 2px solid var(--gray-light);
            border-radius: var(--radius);
            font-family: var(--font-body);
            font-size: 1rem;
            background: var(--lighter);
            transition: var(--transition);
            color: var(--dark);
        }

        .form-control:focus {
            outline: none;
            border-color: var(--secondary);
            box-shadow: 0 0 0 3px rgba(212, 160, 23, 0.1);
            background: white;
            transform: translateY(-2px);
        }

        .form-control::placeholder {
            color: #999;
        }

        textarea.form-control {
            min-height: 150px;
            resize: vertical;
            line-height: 1.6;
            padding: 1.25rem;
        }

        select.form-control {
            appearance: none;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='%23d4a017' viewBox='0 0 16 16'%3E%3Cpath d='M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z'/%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-position: right 1.25rem center;
            background-size: 16px;
            padding-right: 3rem;
        }

        /* --- FILE UPLOAD --- */
        .file-upload-area {
            border: 3px dashed var(--border);
            border-radius: var(--radius);
            padding: 3rem 2rem;
            text-align: center;
            background: var(--lighter);
            transition: var(--transition);
            cursor: pointer;
            position: relative;
        }

        .file-upload-area:hover {
            border-color: var(--secondary);
            background: rgba(212, 160, 23, 0.02);
            transform: translateY(-3px);
            box-shadow: var(--shadow-hover);
        }

        .file-upload-area.dragover {
            border-color: var(--secondary);
            background: rgba(212, 160, 23, 0.05);
            transform: scale(1.01);
        }

        .upload-icon {
            font-size: 3rem;
            color: var(--secondary);
            margin-bottom: 1rem;
            display: inline-block;
            transition: var(--transition);
        }

        .file-upload-area:hover .upload-icon {
            transform: translateY(-5px) scale(1.1);
        }

        .upload-text {
            color: var(--primary);
            font-weight: 600;
            margin-bottom: 0.5rem;
            font-size: 1.2rem;
        }

        .upload-hint {
            color: var(--gray);
            font-size: 0.9rem;
            line-height: 1.5;
            margin-bottom: 0.25rem;
        }

        .upload-btn {
            margin-top: 1.5rem;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            background: var(--primary);
            color: white;
            padding: 0.75rem 1.5rem;
            border-radius: 50px;
            font-weight: 500;
            transition: var(--transition);
        }

        .upload-btn:hover {
            background: var(--primary-light);
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(26, 77, 46, 0.2);
        }

        .file-input {
            display: none;
        }

        /* --- FILE PREVIEW --- */
        .file-preview-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(160px, 1fr));
            gap: 1rem;
            margin-top: 1.5rem;
        }

        .preview-item {
            position: relative;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 3px 10px rgba(0, 0, 0, 0.1);
            transition: var(--transition);
            background: white;
        }

        .preview-item:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
        }

        .preview-media {
            width: 100%;
            height: 120px;
            object-fit: cover;
            display: block;
        }

        .preview-info {
            padding: 0.75rem;
            background: white;
        }

        .preview-name {
            font-size: 0.85rem;
            font-weight: 500;
            color: var(--dark);
            margin-bottom: 0.25rem;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .preview-size {
            font-size: 0.75rem;
            color: var(--gray);
        }

        .remove-btn {
            position: absolute;
            top: 8px;
            right: 8px;
            width: 28px;
            height: 28px;
            background: var(--accent);
            color: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 0.8rem;
            opacity: 0;
            transform: scale(0.8);
            transition: var(--transition);
        }

        .preview-item:hover .remove-btn {
            opacity: 1;
            transform: scale(1);
        }

        .remove-btn:hover {
            background: var(--accent-light);
            transform: scale(1.1) !important;
        }

        /* --- COUNTERS & PROGRESS --- */
        .counter-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 0.75rem;
            font-size: 0.9rem;
        }

        .char-count {
            color: var(--gray);
        }

        .char-limit {
            color: var(--accent);
            font-weight: 500;
        }

        .progress-bar {
            height: 4px;
            background: var(--gray-light);
            border-radius: 2px;
            margin-top: 0.5rem;
            overflow: hidden;
        }

        .progress-fill {
            height: 100%;
            background: var(--secondary);
            border-radius: 2px;
            transition: width 0.3s ease;
            width: 0%;
        }

        .progress-fill.warning {
            background: #ff9800;
        }

        .progress-fill.danger {
            background: var(--accent);
        }

        .hint-text {
            font-size: 0.85rem;
            color: var(--gray);
            margin-top: 0.5rem;
            font-style: italic;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .hint-text i {
            color: var(--secondary);
        }

        /* --- ALERTS --- */
        .alert {
            padding: 1rem 1.25rem;
            border-radius: var(--radius);
            margin: 1rem 0;
            display: flex;
            align-items: flex-start;
            gap: 0.75rem;
            animation: slideIn 0.3s ease;
        }

        @keyframes slideIn {
            from {
                opacity: 0;
                transform: translateY(-10px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .alert-success {
            background: rgba(40, 167, 69, 0.1);
            color: #155724;
            border-left: 3px solid #28a745;
        }

        .alert-error {
            background: rgba(220, 53, 69, 0.1);
            color: #721c24;
            border-left: 3px solid #dc3545;
        }

        .alert-info {
            background: rgba(212, 160, 23, 0.1);
            color: var(--primary);
            border-left: 3px solid var(--secondary);
        }

        .alert-icon {
            font-size: 1.2rem;
            flex-shrink: 0;
        }

        .alert-content {
            flex: 1;
        }

        .alert-title {
            font-weight: 600;
            margin-bottom: 0.25rem;
        }

        /* --- FORM ACTIONS --- */
        .form-actions {
            display: flex;
            gap: 1rem;
            justify-content: flex-end;
            margin-top: 3rem;
            padding-top: 2rem;
            border-top: 1px solid var(--border);
        }

        @media (max-width: 640px) {
            .form-actions {
                flex-direction: column;
            }
        }

        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 0.75rem;
            padding: 1rem 2rem;
            border-radius: 50px;
            font-weight: 600;
            font-size: 1rem;
            transition: var(--transition);
            border: none;
            cursor: pointer;
            min-width: 160px;
        }

        @media (max-width: 640px) {
            .btn {
                width: 100%;
            }
        }

        .btn-secondary {
            background: white;
            color: var(--dark);
            border: 2px solid var(--border);
        }

        .btn-secondary:hover {
            background: var(--gray-light);
            border-color: var(--gray);
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        .btn-primary {
            background: linear-gradient(135deg, var(--accent) 0%, var(--accent-light) 100%);
            color: white;
            position: relative;
            overflow: hidden;
        }

        .btn-primary::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, 
                transparent, 
                rgba(255, 255, 255, 0.2), 
                transparent);
            transition: left 0.5s ease;
        }

        .btn-primary:hover::before {
            left: 100%;
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(224, 84, 46, 0.3);
        }

        .btn-primary:disabled {
            opacity: 0.7;
            cursor: not-allowed;
            transform: none !important;
            box-shadow: none !important;
        }

        /* --- ANIMATIONS --- */
        @keyframes pulse {
            0% { transform: scale(1); }
            50% { transform: scale(1.05); }
            100% { transform: scale(1); }
        }

        .pulse {
            animation: pulse 2s infinite;
        }

        /* --- RESPONSIVE --- */
        @media (max-width: 768px) {
            .navbar {
                padding: 1rem;
            }
            
            .nav-links {
                display: none;
            }
            
            .form-header {
                padding: 2rem 1.5rem;
            }
            
            .form-title {
                font-size: 2rem;
            }
            
            .form-content {
                padding: 2rem 1.5rem;
            }
            
            .file-upload-area {
                padding: 2rem 1.5rem;
            }
        }

        @media (max-width: 480px) {
            .form-title {
                font-size: 1.75rem;
            }
            
            .form-header {
                padding: 1.5rem 1rem;
            }
            
            .form-content {
                padding: 1.5rem 1rem;
            }
            
            .upload-icon {
                font-size: 2.5rem;
            }
            
            .file-preview-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }
    </style>
</head>
<body>
    <!-- Navigation -->
    <nav class="navbar">
        <div class="nav-content">
            <div class="logo-container">
                <img src="{{ URL::asset('adminlte/img/logoculture__2_-removebg-preview.png') }}" 
                     alt="BéninCulture" 
                     class="logo-img">
                <span class="logo-text">Bénin<span>Culture</span></span>
            </div>
            
            <div class="nav-links">
                <a href="{{ route('front.accueil') }}#gastronomie" class="nav-link">Gastronomie</a>
                <a href="{{ route('front.accueil') }}#contes" class="nav-link">Contes & Légendes</a>
                <a href="{{ route('front.accueil') }}#regions" class="nav-link">Régions</a>
                <a href="{{ route('front.accueil') }}" class="nav-link">
                    <i class="fas fa-home"></i> Accueil
                </a>
            </div>
        </div>
    </nav>

    <!-- Messages de session -->
    @if(session('success'))
        <div class="container">
            <div class="alert alert-success">
                <i class="fas fa-check-circle alert-icon"></i>
                <div class="alert-content">
                    <div class="alert-title">Succès !</div>
                    {{ session('success') }}
                </div>
            </div>
        </div>
    @endif

    @if(session('error'))
        <div class="container">
            <div class="alert alert-error">
                <i class="fas fa-exclamation-circle alert-icon"></i>
                <div class="alert-content">
                    <div class="alert-title">Erreur</div>
                    {{ session('error') }}
                </div>
            </div>
        </div>
    @endif

    <!-- Formulaire -->
    <div class="form-container">
        <div class="container">
            <div class="form-card">
                <!-- En-tête du formulaire -->
                <div class="form-header">
                    <h1 class="form-title">Partager un trésor culturel</h1>
                    <p class="form-subtitle">Contribuez à préserver et partager la richesse de notre patrimoine</p>
                </div>

                <!-- Corps du formulaire -->
                <form action="{{ route('contenus.store') }}" method="POST" enctype="multipart/form-data" class="form-content" id="contentForm">
                    @csrf

                    <div class="form-grid">
                        <!-- Titre -->
                        <div class="form-group full-width">
                            <label class="form-label">
                                <i class="fas fa-heading"></i>
                                Titre du contenu <span class="required">*</span>
                            </label>
                            <input type="text" 
                                   class="form-control" 
                                   id="titre" 
                                   name="titre" 
                                   value="{{ old('titre') }}" 
                                   required 
                                   placeholder="Donnez un titre évocateur à votre contenu..."
                                   maxlength="255">
                            
                            <div class="counter-container">
                                <span class="char-count">
                                    <span id="title-count">0</span>/255 caractères
                                </span>
                                <span class="char-limit" id="title-limit"></span>
                            </div>
                            
                            <p class="hint-text">
                                <i class="fas fa-lightbulb"></i>
                                Un bon titre doit être court, clair et accrocheur
                            </p>
                            
                            @error('titre')
                                <div class="alert alert-error">
                                    <i class="fas fa-exclamation-circle alert-icon"></i>
                                    <div class="alert-content">{{ $message }}</div>
                                </div>
                            @enderror
                        </div>

                        <!-- Type de contenu -->
                        <div class="form-group">
                            <label class="form-label">
                                <i class="fas fa-tag"></i>
                                Type de contenu <span class="required">*</span>
                            </label>
                            <select class="form-control" id="type_contenu_id" name="type_contenu_id" required>
                                <option value="">Choisir un type...</option>
                                @foreach($typecontenus as $type)
                                    <option value="{{ $type->id }}" {{ old('type_contenu_id') == $type->id ? 'selected' : '' }}>
                                        {{ ucfirst($type->nom) }}
                                    </option>
                                @endforeach
                            </select>
                            
                            @error('type_contenu_id')
                                <div class="alert alert-error">
                                    <i class="fas fa-exclamation-circle alert-icon"></i>
                                    <div class="alert-content">{{ $message }}</div>
                                </div>
                            @enderror
                        </div>

                        <!-- Région -->
                        <div class="form-group">
                            <label class="form-label">
                                <i class="fas fa-map-marker-alt"></i>
                                Région d'origine <span class="required">*</span>
                            </label>
                            <select class="form-control" id="region_id" name="region_id" required>
                                <option value="">Sélectionner une région...</option>
                                @foreach($regions as $region)
                                    <option value="{{ $region->id }}" {{ old('region_id') == $region->id ? 'selected' : '' }}>
                                        {{ $region->nom_region }}
                                    </option>
                                @endforeach
                            </select>
                            
                            @error('region_id')
                                <div class="alert alert-error">
                                    <i class="fas fa-exclamation-circle alert-icon"></i>
                                    <div class="alert-content">{{ $message }}</div>
                                </div>
                            @enderror
                        </div>

                        <!-- Description -->
                        <div class="form-group full-width">
                            <label class="form-label">
                                <i class="fas fa-align-left"></i>
                                Votre histoire <span class="required">*</span>
                            </label>
                            <textarea class="form-control" 
                                      id="description" 
                                      name="description" 
                                      required 
                                      rows="6"
                                      placeholder="Racontez votre histoire avec passion et précision..."
                                      maxlength="5000">{{ old('description') }}</textarea>
                            
                            <div class="counter-container">
                                <span class="char-count">
                                    <span id="char-count">0</span>/5000 caractères
                                </span>
                                <span class="char-limit" id="char-limit"></span>
                            </div>
                            
                            <div class="progress-bar">
                                <div class="progress-fill" id="progress-fill"></div>
                            </div>
                            
                            <p class="hint-text">
                                <i class="fas fa-info-circle"></i>
                                Minimum 100 caractères recommandé. Soyez descriptif !
                            </p>
                            
                            @error('description')
                                <div class="alert alert-error">
                                    <i class="fas fa-exclamation-circle alert-icon"></i>
                                    <div class="alert-content">{{ $message }}</div>
                                </div>
                            @enderror
                        </div>

                        <!-- Durée de lecture -->
                        <div class="form-group">
                            <label class="form-label">
                                <i class="fas fa-clock"></i>
                                Durée estimée
                            </label>
                            <input type="text" 
                                   class="form-control" 
                                   id="duree_lecture" 
                                   name="duree_lecture" 
                                   value="{{ old('duree_lecture') }}"
                                   placeholder="Ex: 5 minutes">
                            
                            <p class="hint-text">
                                <i class="fas fa-hourglass-half"></i>
                                Aide les lecteurs à prévoir leur temps
                            </p>
                        </div>

                        <!-- Médias -->
                        <div class="form-group full-width">
                            <label class="form-label">
                                <i class="fas fa-images"></i>
                                Illustrations & médias
                            </label>
                            
                            <!-- Zone de dépôt -->
                            <div class="file-upload-area" id="fileUploadArea">
                                <div class="upload-icon">
                                    <i class="fas fa-cloud-upload-alt"></i>
                                </div>
                                <div class="upload-text">Ajouter des médias</div>
                                <p class="upload-hint">Glissez-déposez vos fichiers ici</p>
                                <p class="upload-hint">ou cliquez pour parcourir</p>
                                
                                <div class="counter-container" style="margin-top: 1.5rem;">
                                    <span class="char-count">
                                        <span id="file-count">0</span>/10 fichiers
                                    </span>
                                    <span class="char-limit" id="total-size">0 MB</span>
                                </div>
                                
                                <button type="button" class="upload-btn" onclick="document.getElementById('medias').click()">
                                    <i class="fas fa-folder-open"></i>
                                    Parcourir les fichiers
                                </button>
                                
                                <p class="hint-text" style="margin-top: 1rem;">
                                    <i class="fas fa-file-image"></i>
                                    Formats : JPG, PNG, GIF, MP4 (max 10MB par fichier)
                                </p>
                                
                                <input type="file" 
                                       class="file-input" 
                                       id="medias" 
                                       name="medias[]" 
                                       multiple 
                                       accept="image/*,video/*"
                                       onchange="previewFiles()">
                            </div>

                            <!-- Prévisualisation -->
                            <div class="file-preview-grid" id="file-preview"></div>

                            @error('medias')
                                <div class="alert alert-error" style="margin-top: 1rem;">
                                    <i class="fas fa-exclamation-circle alert-icon"></i>
                                    <div class="alert-content">{{ $message }}</div>
                                </div>
                            @enderror
                            
                            @error('medias.*')
                                <div class="alert alert-error" style="margin-top: 1rem;">
                                    <i class="fas fa-exclamation-circle alert-icon"></i>
                                    <div class="alert-content">{{ $message }}</div>
                                </div>
                            @enderror
                        </div>

                        <!-- Information -->
                        <div class="form-group full-width">
                            <div class="alert alert-info">
                                <i class="fas fa-info-circle alert-icon"></i>
                                <div class="alert-content">
                                    <div class="alert-title">Processus de publication</div>
                                    <p>Votre contenu sera soumis à validation par nos modérateurs. 
                                    Vous serez notifié par email dès qu'il sera publié. 
                                    Merci de votre contribution à la préservation de notre culture !</p>
                                </div>
                            </div>
                        </div>

                        <!-- Actions -->
                        <div class="form-actions">
                            <a href="{{ route('front.accueil') }}" class="btn btn-secondary">
                                <i class="fas fa-arrow-left"></i>
                                Retour à l'accueil
                            </a>
                            <button type="submit" class="btn btn-primary" id="submitBtn">
                                <i class="fas fa-paper-plane"></i>
                                Publier le contenu
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        // Variables globales
        let totalFilesSize = 0;
        const maxFiles = 10;
        const maxFileSize = 10 * 1024 * 1024; // 10MB
        const maxChars = 5000;
        const minChars = 100;

        // Initialisation au chargement
        document.addEventListener('DOMContentLoaded', function() {
            initCounters();
            initDragAndDrop();
        });

        // Compteur de caractères pour le titre
        function initCounters() {
            const titre = document.getElementById('titre');
            const titleCount = document.getElementById('title-count');
            const titleLimit = document.getElementById('title-limit');
            
            titre.addEventListener('input', function() {
                const length = this.value.length;
                titleCount.textContent = length;
                
                if (length > 200) {
                    titleLimit.textContent = 'Presque atteint !';
                    titleLimit.style.color = 'var(--accent)';
                } else {
                    titleLimit.textContent = '';
                }
            });
            
            titleCount.textContent = titre.value.length;

            // Compteur de caractères pour la description
            const description = document.getElementById('description');
            const charCount = document.getElementById('char-count');
            const charLimit = document.getElementById('char-limit');
            const progressFill = document.getElementById('progress-fill');

            description.addEventListener('input', updateCharCount);

            function updateCharCount() {
                const length = description.value.length;
                charCount.textContent = length;
                
                // Calcul du pourcentage
                const percentage = (length / maxChars) * 100;
                progressFill.style.width = `${Math.min(percentage, 100)}%`;
                
                // Mise à jour de la couleur
                if (percentage > 90) {
                    progressFill.className = 'progress-fill danger';
                    charLimit.textContent = 'Limite presque atteinte !';
                    charLimit.style.color = 'var(--accent)';
                } else if (percentage > 70) {
                    progressFill.className = 'progress-fill warning';
                    charLimit.textContent = '';
                } else {
                    progressFill.className = 'progress-fill';
                    charLimit.textContent = '';
                }
                
                // Validation minimum
                if (length < minChars && length > 0) {
                    charLimit.textContent = `Minimum ${minChars} caractères recommandé`;
                    charLimit.style.color = '#ff9800';
                }
            }
            
            updateCharCount();
        }

        // Gestion du drag and drop
        function initDragAndDrop() {
            const fileUploadArea = document.getElementById('fileUploadArea');
            const fileInput = document.getElementById('medias');

            fileUploadArea.addEventListener('dragover', function(e) {
                e.preventDefault();
                this.classList.add('dragover');
            });

            fileUploadArea.addEventListener('dragleave', function(e) {
                e.preventDefault();
                this.classList.remove('dragover');
            });

            fileUploadArea.addEventListener('drop', function(e) {
                e.preventDefault();
                this.classList.remove('dragover');
                
                const files = e.dataTransfer.files;
                if (files.length > 0) {
                    fileInput.files = files;
                    previewFiles();
                    
                    // Animation de feedback
                    this.style.animation = 'pulse 0.5s ease';
                    setTimeout(() => {
                        this.style.animation = '';
                    }, 500);
                }
            });
        }

        // Prévisualisation des fichiers
        function previewFiles() {
            const preview = document.getElementById('file-preview');
            const files = document.getElementById('medias').files;
            const fileCount = document.getElementById('file-count');
            const totalSize = document.getElementById('total-size');
            
            preview.innerHTML = '';
            totalFilesSize = 0;
            
            // Validation du nombre de fichiers
            if (files.length > maxFiles) {
                showError(`Vous ne pouvez pas télécharger plus de ${maxFiles} fichiers.`);
                document.getElementById('medias').value = '';
                fileCount.textContent = '0';
                totalSize.textContent = '0 MB';
                return;
            }
            
            for (let i = 0; i < files.length; i++) {
                const file = files[i];
                
                // Validation de la taille
                if (file.size > maxFileSize) {
                    showError(`Le fichier "${file.name}" dépasse la taille maximale de 10MB.`);
                    continue;
                }
                
                totalFilesSize += file.size;
                const reader = new FileReader();

                reader.onload = function(e) {
                    const previewItem = document.createElement('div');
                    previewItem.className = 'preview-item';
                    
                    let mediaContent = '';
                    if (file.type.startsWith('image/')) {
                        mediaContent = `<img src="${e.target.result}" alt="${file.name}" class="preview-media">`;
                    } else if (file.type.startsWith('video/')) {
                        mediaContent = `
                            <video class="preview-media">
                                <source src="${e.target.result}" type="${file.type}">
                                Votre navigateur ne supporte pas la lecture vidéo
                            </video>
                        `;
                    } else {
                        mediaContent = `
                            <div class="preview-media" style="display: flex; align-items: center; justify-content: center; background: #f5f5f5;">
                                <i class="fas fa-file" style="font-size: 2rem; color: #666;"></i>
                            </div>
                        `;
                    }
                    
                    previewItem.innerHTML = `
                        ${mediaContent}
                        <div class="preview-info">
                            <div class="preview-name" title="${file.name}">${file.name}</div>
                            <div class="preview-size">${formatBytes(file.size)}</div>
                        </div>
                        <button type="button" class="remove-btn" onclick="removeFile(${i})" title="Supprimer">
                            <i class="fas fa-times"></i>
                        </button>
                    `;
                    
                    preview.appendChild(previewItem);
                }

                reader.readAsDataURL(file);
            }
            
            // Mettre à jour les compteurs
            fileCount.textContent = files.length;
            totalSize.textContent = formatBytes(totalFilesSize);
            
            // Avertissement si approche de la limite
            if (totalFilesSize > maxFileSize * 5) {
                totalSize.style.color = 'var(--accent)';
                totalSize.innerHTML = `<strong>${formatBytes(totalFilesSize)}</strong>`;
            } else {
                totalSize.style.color = 'var(--gray)';
            }
        }

        // Supprimer un fichier
        function removeFile(index) {
            const input = document.getElementById('medias');
            const files = Array.from(input.files);
            
            // Soustraire la taille du fichier supprimé
            totalFilesSize -= files[index].size;
            
            files.splice(index, 1);
            
            // Mettre à jour l'input file
            const dt = new DataTransfer();
            files.forEach(file => dt.items.add(file));
            input.files = dt.files;
            
            // Recharger la prévisualisation
            previewFiles();
            
            // Déclencher l'événement change
            input.dispatchEvent(new Event('change'));
        }

        // Formatage des tailles de fichier
        function formatBytes(bytes, decimals = 2) {
            if (bytes === 0) return '0 Bytes';
            const k = 1024;
            const dm = decimals < 0 ? 0 : decimals;
            const sizes = ['Bytes', 'KB', 'MB', 'GB'];
            const i = Math.floor(Math.log(bytes) / Math.log(k));
            return parseFloat((bytes / Math.pow(k, i)).toFixed(dm)) + ' ' + sizes[i];
        }

        // Affichage des erreurs
        function showError(message) {
            const alertDiv = document.createElement('div');
            alertDiv.className = 'alert alert-error';
            alertDiv.innerHTML = `
                <i class="fas fa-exclamation-circle alert-icon"></i>
                <div class="alert-content">${message}</div>
            `;
            
            document.querySelector('.form-content').insertBefore(alertDiv, document.querySelector('.form-group:last-child'));
            
            // Supprimer l'alerte après 5 secondes
            setTimeout(() => {
                alertDiv.remove();
            }, 5000);
        }

        // Validation du formulaire
        document.getElementById('contentForm').addEventListener('submit', function(e) {
            const submitBtn = document.getElementById('submitBtn');
            const descriptionText = document.getElementById('description').value.trim();
            const titreText = document.getElementById('titre').value.trim();
            
            // Vérification de la longueur minimale
            if (descriptionText.length < minChars) {
                e.preventDefault();
                showError(`La description doit contenir au moins ${minChars} caractères. Actuellement: ${descriptionText.length} caractères.`);
                document.getElementById('description').focus();
                return;
            }
            
            // Vérification du titre
            if (titreText.length < 3) {
                e.preventDefault();
                showError('Le titre doit contenir au moins 3 caractères.');
                document.getElementById('titre').focus();
                return;
            }
            
            // Désactiver le bouton pendant l'envoi
            submitBtn.disabled = true;
            submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Publication en cours...';
            
            // Réactiver après 10 secondes (sécurité)
            setTimeout(() => {
                submitBtn.disabled = false;
                submitBtn.innerHTML = '<i class="fas fa-paper-plane"></i> Publier le contenu';
            }, 10000);
        });
    </script>
</body>
</html>