<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $contenu->titre }} - BéninCulture</title>
    
    <!-- Fonts & Icons -->
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700;900&family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css" rel="stylesheet">

    <style>
        /* --- VARIABLES GLOBALES --- */
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
            --gray-lighter: #f8f9fa;
            --border: #e0e0e0;
            --shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
            --shadow-hover: 0 8px 30px rgba(0, 0, 0, 0.12);
            --shadow-large: 0 20px 40px rgba(0, 0, 0, 0.1);
            --radius: 12px;
            --radius-large: 20px;
            --transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            --font-head: 'Playfair Display', serif;
            --font-body: 'Poppins', sans-serif;
        }

        /* --- RESET & BASE STYLES --- */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: var(--font-body);
            background-color: var(--light);
            color: var(--dark);
            line-height: 1.6;
            overflow-x: hidden;
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
        }

        img, video {
            max-width: 100%;
            height: auto;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }

        /* --- ANIMATIONS --- */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .fade-in {
            animation: fadeInUp 0.6s ease forwards;
        }

        /* --- NAVIGATION --- */
        .navbar {
            background: rgba(255, 255, 255, 0.98);
            backdrop-filter: blur(10px);
            box-shadow: 0 2px 30px rgba(0, 0, 0, 0.1);
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            z-index: 1000;
            padding: 1rem 0;
            transition: var(--transition);
        }

        .navbar.scrolled {
            padding: 0.75rem 0;
            background: rgba(255, 255, 255, 0.98);
        }

        .nav-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0 2rem;
        }

        .logo-container {
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }

        .logo-img {
            height: 40px;
            width: auto;
        }

        .logo-text {
            font-family: var(--font-head);
            font-size: 1.8rem;
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
            font-size: 1rem;
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
            transition: var(--transition);
        }

        .nav-link:hover::after {
            width: 100%;
        }

        /* --- BOUTONS --- */
        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
            padding: 0.75rem 1.5rem;
            border-radius: 50px;
            font-weight: 600;
            font-size: 1rem;
            transition: var(--transition);
            text-align: center;
            white-space: nowrap;
            cursor: pointer;
            border: none;
        }

        .btn-primary {
            background: linear-gradient(135deg, var(--accent), var(--accent-light));
            color: white;
            box-shadow: 0 4px 15px rgba(224, 84, 46, 0.3);
        }

        .btn-primary:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 25px rgba(224, 84, 46, 0.4);
        }

        .btn-secondary {
            background: transparent;
            color: var(--primary);
            border: 2px solid var(--primary);
        }

        .btn-secondary:hover {
            background: var(--primary);
            color: white;
            transform: translateY(-2px);
        }

        .btn-outline {
            background: transparent;
            color: var(--dark);
            border: 2px solid var(--border);
        }

        .btn-outline:hover {
            border-color: var(--secondary);
            color: var(--primary);
            transform: translateY(-2px);
        }

        /* --- MENU UTILISATEUR --- */
        .user-menu {
            position: relative;
        }

        .user-info {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            cursor: pointer;
            padding: 0.5rem 0.75rem;
            border-radius: 25px;
            transition: var(--transition);
        }

        .user-info:hover {
            background: rgba(0, 0, 0, 0.05);
        }

        .user-avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            overflow: hidden;
            background: var(--accent);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
        }

        .user-avatar img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .user-name {
            font-weight: 600;
            color: var(--primary);
            font-size: 0.95rem;
        }

        .user-dropdown {
            position: absolute;
            top: 100%;
            right: 0;
            background: white;
            border-radius: 10px;
            box-shadow: var(--shadow-large);
            padding: 0.75rem 0;
            min-width: 200px;
            opacity: 0;
            visibility: hidden;
            transform: translateY(-10px);
            transition: var(--transition);
            z-index: 1001;
        }

        .user-menu:hover .user-dropdown {
            opacity: 1;
            visibility: visible;
            transform: translateY(0);
        }

        .user-dropdown a {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            padding: 0.75rem 1.5rem;
            color: var(--dark);
            transition: var(--transition);
        }

        .user-dropdown a:hover {
            background: rgba(26, 77, 46, 0.05);
            color: var(--primary);
        }

        .user-dropdown .divider {
            height: 1px;
            background: var(--gray-light);
            margin: 0.5rem 0;
        }

        .logout-btn {
            width: 100%;
            text-align: left;
            padding: 0.75rem 1.5rem;
            color: var(--dark);
            transition: var(--transition);
            display: flex;
            align-items: center;
            gap: 0.75rem;
            background: none;
            border: none;
            font-family: inherit;
            font-size: inherit;
        }

        .logout-btn:hover {
            background: rgba(220, 53, 69, 0.05);
            color: #dc3545;
        }

        /* --- CONTENU PRINCIPAL --- */
        .content-wrapper {
            padding-top: 100px;
            min-height: 100vh;
            background: linear-gradient(135deg, #f5f2eb 0%, #fefefe 100%);
        }

        .content-container {
            max-width: 1000px;
            margin: 0 auto;
        }

        /* --- EN-TÊTE DU CONTENU --- */
        .content-header {
            text-align: center;
            margin-bottom: 3rem;
            padding: 0 2rem;
        }

        .content-title {
            font-family: var(--font-head);
            font-size: 3.5rem;
            color: var(--primary);
            margin-bottom: 1.5rem;
            line-height: 1.2;
            position: relative;
            display: inline-block;
        }

        .content-title::after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 50%;
            transform: translateX(-50%);
            width: 100px;
            height: 4px;
            background: linear-gradient(90deg, var(--secondary), var(--accent));
            border-radius: 2px;
        }

        .content-meta {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
            gap: 1.5rem;
            margin-top: 2rem;
        }

        .meta-item {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            background: white;
            padding: 0.75rem 1.25rem;
            border-radius: 50px;
            box-shadow: var(--shadow);
            transition: var(--transition);
        }

        .meta-item:hover {
            transform: translateY(-2px);
            box-shadow: var(--shadow-hover);
        }

        .meta-item i {
            color: var(--secondary);
        }

        .meta-item span {
            font-weight: 500;
            color: var(--gray);
        }

        /* --- GALLERIE MÉDIAS --- */
        .media-gallery {
            margin-bottom: 3rem;
            background: white;
            border-radius: var(--radius-large);
            overflow: hidden;
            box-shadow: var(--shadow);
        }

        .main-media {
            width: 100%;
            height: 500px;
            position: relative;
            overflow: hidden;
        }

        .main-media img,
        .main-media video {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .media-thumbnails {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(120px, 1fr));
            gap: 1rem;
            padding: 1.5rem;
            background: var(--gray-lighter);
        }

        .thumbnail {
            height: 80px;
            border-radius: 8px;
            overflow: hidden;
            cursor: pointer;
            transition: var(--transition);
            border: 3px solid transparent;
            position: relative;
        }

        .thumbnail:hover {
            transform: scale(1.05);
            border-color: var(--secondary);
        }

        .thumbnail.active {
            border-color: var(--secondary);
            transform: scale(1.05);
        }

        .thumbnail img,
        .thumbnail video {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .thumbnail-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.3);
            display: flex;
            align-items: center;
            justify-content: center;
            opacity: 0;
            transition: var(--transition);
        }

        .thumbnail:hover .thumbnail-overlay {
            opacity: 1;
        }

        /* --- CORPS DU CONTENU --- */
        .content-body {
            background: white;
            border-radius: var(--radius-large);
            padding: 3rem;
            margin-bottom: 3rem;
            box-shadow: var(--shadow);
            line-height: 1.8;
        }

        .content-text {
            font-size: 1.1rem;
            color: var(--dark);
            white-space: pre-wrap;
        }

        .content-text p {
            margin-bottom: 1.5rem;
        }

        .content-text h2,
        .content-text h3 {
            font-family: var(--font-head);
            color: var(--primary);
            margin: 2rem 0 1rem;
        }

        .content-text ul,
        .content-text ol {
            margin: 1rem 0 1rem 2rem;
        }

        /* --- ACTIONS DU CONTENU --- */
        .content-actions {
            display: flex;
            gap: 1rem;
            justify-content: center;
            margin-top: 3rem;
            padding-top: 3rem;
            border-top: 1px solid var(--border);
            flex-wrap: wrap;
        }

        /* --- SECTION NOTES --- */
        .rating-section {
            background: white;
            border-radius: var(--radius-large);
            padding: 3rem;
            margin-bottom: 3rem;
            box-shadow: var(--shadow);
            text-align: center;
            position: relative;
            overflow: hidden;
        }

        .section-title {
            font-family: var(--font-head);
            color: var(--primary);
            font-size: 2rem;
            margin-bottom: 2rem;
            position: relative;
            display: inline-block;
        }

        .section-title::after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 50%;
            transform: translateX(-50%);
            width: 60px;
            height: 3px;
            background: linear-gradient(90deg, var(--secondary), var(--accent));
            border-radius: 2px;
        }

        .average-rating {
            font-size: 3.5rem;
            font-weight: 900;
            color: var(--secondary);
            margin-bottom: 0.5rem;
        }

        .rating-stars {
            display: flex;
            justify-content: center;
            gap: 0.25rem;
            margin-bottom: 1rem;
        }

        .rating-stars .star {
            font-size: 1.8rem;
            color: var(--secondary);
        }

        .rating-count {
            color: var(--gray);
            font-size: 0.95rem;
            margin-bottom: 2rem;
        }

        .user-rating {
            margin-top: 2rem;
            padding-top: 2rem;
            border-top: 1px solid var(--border);
        }

        .user-rating-title {
            font-size: 1.2rem;
            color: var(--primary);
            margin-bottom: 1rem;
        }

        .user-stars {
            display: flex;
            justify-content: center;
            gap: 0.5rem;
            margin-bottom: 1rem;
        }

        .user-stars .star {
            font-size: 2rem;
            color: #ddd;
            cursor: pointer;
            transition: var(--transition);
        }

        .user-stars .star:hover,
        .user-stars .star.hover {
            color: var(--secondary);
            transform: scale(1.1);
        }

        .user-stars .star.active {
            color: var(--secondary);
        }

        .rating-message {
            color: var(--gray);
            font-size: 0.9rem;
            min-height: 1.5em;
        }

        /* --- SECTION COMMENTAIRES --- */
        .comments-section {
            background: white;
            border-radius: var(--radius-large);
            padding: 3rem;
            box-shadow: var(--shadow);
        }

        .comments-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 2rem;
        }

        .comments-count {
            background: var(--primary);
            color: white;
            padding: 0.25rem 0.75rem;
            border-radius: 20px;
            font-size: 0.9rem;
            font-weight: 600;
        }

        /* --- FORMULAIRE COMMENTAIRE --- */
        .comment-form-card {
            background: var(--gray-lighter);
            border-radius: var(--radius);
            padding: 2rem;
            margin-bottom: 3rem;
        }

        .comment-form-title {
            font-size: 1.3rem;
            color: var(--primary);
            margin-bottom: 1.5rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .comment-form-title i {
            color: var(--secondary);
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        .form-label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: 600;
            color: var(--dark);
        }

        .form-control {
            width: 100%;
            padding: 1rem;
            border: 2px solid var(--border);
            border-radius: var(--radius);
            font-family: var(--font-body);
            font-size: 1rem;
            background: white;
            transition: var(--transition);
            resize: vertical;
            min-height: 120px;
        }

        .form-control:focus {
            outline: none;
            border-color: var(--secondary);
            box-shadow: 0 0 0 3px rgba(212, 160, 23, 0.1);
        }

        .char-count {
            text-align: right;
            font-size: 0.9rem;
            color: var(--gray);
            margin-top: 0.5rem;
            display: flex;
            justify-content: space-between;
        }

        .submit-comment {
            width: 100%;
            padding: 1rem;
            border-radius: var(--radius);
            font-weight: 600;
            font-size: 1rem;
        }

        .submit-comment:disabled {
            opacity: 0.6;
            cursor: not-allowed;
            transform: none !important;
        }

        /* --- LISTE DES COMMENTAIRES --- */
        .comments-list {
            max-height: 600px;
            overflow-y: auto;
            padding-right: 1rem;
        }

        .comments-list::-webkit-scrollbar {
            width: 6px;
        }

        .comments-list::-webkit-scrollbar-track {
            background: var(--gray-lighter);
            border-radius: 3px;
        }

        .comments-list::-webkit-scrollbar-thumb {
            background: var(--secondary);
            border-radius: 3px;
        }

        .comment-item {
            background: white;
            border-radius: var(--radius);
            padding: 2rem;
            margin-bottom: 1.5rem;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
            border: 1px solid var(--border);
            transition: var(--transition);
        }

        .comment-item:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
            border-color: var(--secondary);
        }

        .comment-header {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            margin-bottom: 1rem;
        }

        .comment-author-info {
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .comment-author-avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: var(--accent);
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 600;
        }

        .comment-author {
            font-weight: 600;
            color: var(--primary);
        }

        .comment-author-badge {
            display: inline-block;
            background: linear-gradient(135deg, var(--secondary), var(--accent));
            color: white;
            padding: 0.2rem 0.6rem;
            border-radius: 12px;
            font-size: 0.75rem;
            font-weight: 600;
            margin-left: 0.5rem;
        }

        .comment-date {
            color: var(--gray);
            font-size: 0.9rem;
        }

        .comment-rating {
            display: flex;
            gap: 0.2rem;
        }

        .comment-rating .star {
            font-size: 0.9rem;
            color: var(--secondary);
        }

        .comment-text {
            color: var(--dark);
            line-height: 1.7;
            font-size: 1rem;
            white-space: pre-wrap;
        }

        /* --- ÉTAT VIDE --- */
        .empty-state {
            text-align: center;
            padding: 3rem;
            color: var(--gray);
        }

        .empty-state i {
            font-size: 3rem;
            color: var(--secondary);
            margin-bottom: 1rem;
            opacity: 0.5;
        }

        .empty-state h4 {
            font-size: 1.5rem;
            color: var(--primary);
            margin-bottom: 0.5rem;
        }

        .empty-state p {
            font-size: 1rem;
            margin-bottom: 1.5rem;
        }

        /* --- ALERTES --- */
        .alert {
            position: fixed;
            top: 100px;
            left: 50%;
            transform: translateX(-50%);
            padding: 1rem 2rem;
            border-radius: 10px;
            font-weight: 500;
            border-left: 4px solid;
            max-width: 600px;
            width: 90%;
            z-index: 9999;
            animation: fadeInUp 0.5s ease;
            box-shadow: var(--shadow);
            backdrop-filter: blur(10px);
        }

        .alert-success {
            background: rgba(40, 167, 69, 0.95);
            color: white;
            border-left-color: #28a745;
        }

        .alert-error {
            background: rgba(220, 53, 69, 0.95);
            color: white;
            border-left-color: #dc3545;
        }

        .alert-info {
            background: rgba(23, 162, 184, 0.95);
            color: white;
            border-left-color: #17a2b8;
        }

        /* --- LOADER --- */
        .loader {
            display: inline-block;
            width: 20px;
            height: 20px;
            border: 3px solid rgba(255, 255, 255, 0.3);
            border-top: 3px solid white;
            border-radius: 50%;
            animation: spin 1s linear infinite;
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

        /* --- RESPONSIVE --- */
        @media (max-width: 1024px) {
            .content-title {
                font-size: 3rem;
            }
            
            .main-media {
                height: 400px;
            }
        }

        @media (max-width: 768px) {
            .content-wrapper {
                padding-top: 80px;
            }
            
            .content-title {
                font-size: 2.5rem;
            }
            
            .content-meta {
                flex-direction: column;
                align-items: center;
                gap: 1rem;
            }
            
            .main-media {
                height: 300px;
            }
            
            .media-thumbnails {
                grid-template-columns: repeat(auto-fill, minmax(100px, 1fr));
            }
            
            .content-body,
            .rating-section,
            .comments-section {
                padding: 2rem;
            }
            
            .content-actions {
                flex-direction: column;
                align-items: center;
            }
            
            .btn {
                width: 100%;
                max-width: 300px;
            }
            
            .nav-links {
                display: none;
            }
            
            .user-name {
                display: none;
            }
        }

        @media (max-width: 480px) {
            .content-title {
                font-size: 2rem;
            }
            
            .main-media {
                height: 250px;
            }
            
            .media-thumbnails {
                grid-template-columns: repeat(auto-fill, minmax(80px, 1fr));
            }
            
            .thumbnail {
                height: 60px;
            }
            
            .content-body,
            .rating-section,
            .comments-section {
                padding: 1.5rem;
            }
            
            .average-rating {
                font-size: 2.5rem;
            }
            
            .rating-stars .star {
                font-size: 1.5rem;
            }
            
            .user-stars .star {
                font-size: 1.8rem;
            }
            
            .comment-item {
                padding: 1.5rem;
            }
            
            .alert {
                width: 95%;
                padding: 1rem;
            }
        }
    </style>
</head>
<body>

    <!-- Navigation -->
    <nav class="navbar" id="navbar">
        <div class="nav-container">
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
                
                @auth
                    <a href="{{ route('front.create') }}" class="btn btn-primary">
                        <i class="fas fa-plus"></i> Créer un contenu
                    </a>
                @endauth
            </div>
            
            <!-- Menu utilisateur -->
            @auth
                <div class="user-menu">
                    <div class="user-info">
                        @php
                            $user = Auth::user();
                            $initials = strtoupper(substr($user->prenom ?? 'U', 0, 1) . substr($user->nom ?? 'U', 0, 1));
                        @endphp

                        <div class="user-avatar">
                            @if(!empty($user->photo))
                                <img src="{{ asset('storage/' . $user->photo) }}" alt="Photo de profil">
                            @else
                                <span>{{ $initials }}</span>
                            @endif
                        </div>
                        <span class="user-name">{{ $user->prenom ?? 'Utilisateur' }}</span>
                    </div>
                    
                    <div class="user-dropdown">
                        <a href="{{ route('profile.edit') }}">
                            <i class="bi bi-person"></i>
                            <span>Mon profil</span>
                        </a>
                        <a href="{{ route('front.create') }}">
                            <i class="bi bi-plus-circle"></i>
                            <span>Créer un contenu</span>
                        </a>
                        <div class="divider"></div>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="logout-btn">
                                <i class="bi bi-box-arrow-right"></i>
                                <span>Déconnexion</span>
                            </button>
                        </form>
                    </div>
                </div>
            @else
                <a href="{{ route('login') }}" class="btn btn-primary">
                    <i class="fas fa-sign-in-alt"></i> Se connecter
                </a>
            @endauth
        </div>
    </nav>

    <!-- Messages de session -->
    @if(session('success'))
        <div class="alert alert-success">
            <i class="fas fa-check-circle me-2"></i>{{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-error">
            <i class="fas fa-exclamation-circle me-2"></i>{{ session('error') }}
        </div>
    @endif

    <!-- Contenu principal -->
    <div class="content-wrapper">
        <div class="container content-container">
            
            <!-- En-tête du contenu -->
            <div class="content-header fade-in">
                <h1 class="content-title">{{ $contenu->titre }}</h1>
                
                <div class="content-meta">
                    <div class="meta-item">
                        <i class="fas fa-tag"></i>
                        <span>{{ $contenu->typeContenue->nom ?? 'Non catégorisé' }}</span>
                    </div>
                    
                    @if($contenu->duree_lecture)
                    <div class="meta-item">
                        <i class="fas fa-clock"></i>
                        <span>{{ $contenu->duree_lecture }}</span>
                    </div>
                    @endif
                    
                    <div class="meta-item">
                        <i class="fas fa-user"></i>
                        <span>
                            @if($contenu->auteur)
                                {{ $contenu->auteur->prenom ?? $contenu->auteur->nom ?? 'Auteur inconnu' }}
                            @else
                                Auteur inconnu
                            @endif
                        </span>
                        @auth
                            @if(Auth::id() === $contenu->auteur_id)
                                <span style="background: var(--secondary); color: white; padding: 0.2rem 0.6rem; border-radius: 12px; font-size: 0.8rem; margin-left: 0.5rem;">
                                    <i class="fas fa-crown"></i> Vous
                                </span>
                            @endif
                        @endauth
                    </div>
                    
                    <div class="meta-item">
                        <i class="fas fa-calendar"></i>
                        <span>{{ $contenu->date_creation->format('d/m/Y') }}</span>
                    </div>
                </div>
            </div>

            <!-- Gallerie des médias -->
            @if($contenu->media && $contenu->media->isNotEmpty())
            <div class="media-gallery fade-in">
                @php
                    $firstMedia = $contenu->media->first();
                    // Vérifier si c'est une image
                    $extension = strtolower(pathinfo($firstMedia->chemin, PATHINFO_EXTENSION));
                    $isImage = in_array($extension, ['jpg', 'jpeg', 'png', 'gif', 'bmp', 'webp', 'svg']);
                    
                    // Nettoyer le chemin
                    $chemin = $firstMedia->chemin;
                    if (strpos($chemin, 'public/') === 0) {
                        $chemin = substr($chemin, 7);
                    }
                @endphp
                
                <div class="main-media" id="main-media">
                    @if($isImage)
                        <img src="{{ asset('storage/' . $chemin) }}" 
                             alt="{{ $contenu->titre }}" 
                             id="main-media-display"
                             loading="lazy"
                             onerror="this.src='{{ asset('adminlte/img/default-image.jpg') }}';">
                    @else
                        <video controls id="main-media-display" preload="metadata">
                            <source src="{{ asset('storage/' . $chemin) }}" type="video/mp4">
                            Votre navigateur ne supporte pas la lecture vidéo.
                        </video>
                    @endif
                </div>

                @if($contenu->media->count() > 1)
                <div class="media-thumbnails">
                    @foreach($contenu->media as $index => $media)
                    @php 
                        $thumbChemin = $media->chemin;
                        if (strpos($thumbChemin, 'public/') === 0) {
                            $thumbChemin = substr($thumbChemin, 7);
                        }
                        $thumbExtension = strtolower(pathinfo($thumbChemin, PATHINFO_EXTENSION));
                        $isThumbImage = in_array($thumbExtension, ['jpg', 'jpeg', 'png', 'gif', 'bmp', 'webp', 'svg']);
                    @endphp
                    <div class="thumbnail {{ $index === 0 ? 'active' : '' }}" 
                         onclick="changeMainMedia('{{ asset('storage/' . $thumbChemin) }}', '{{ $isThumbImage ? 'image' : 'video' }}', this)"
                         data-index="{{ $index }}">
                        @if($isThumbImage)
                            <img src="{{ asset('storage/' . $thumbChemin) }}" 
                                 alt="Thumbnail {{ $index + 1 }}" 
                                 loading="lazy"
                                 onerror="this.src='{{ asset('adminlte/img/default-thumbnail.jpg') }}';">
                        @else
                            <video muted playsinline>
                                <source src="{{ asset('storage/' . $thumbChemin) }}" type="video/mp4">
                            </video>
                        @endif
                        <div class="thumbnail-overlay">
                            <i class="fas fa-search-plus" style="color: white;"></i>
                        </div>
                    </div>
                    @endforeach
                </div>
                @endif
            </div>
            @else
            <div class="media-gallery fade-in">
                <div class="empty-state">
                    <i class="fas fa-image"></i>
                    <h4>Aucun média disponible</h4>
                    <p>Ce contenu ne contient pas de médias.</p>
                </div>
            </div>
            @endif

            <!-- Corps du contenu -->
            <div class="content-body fade-in">
                <div class="content-text">
                    {!! nl2br(e($contenu->texte)) !!}
                </div>

                <!-- Actions -->
                <div class="content-actions">
                    <a href="{{ route('front.accueil') }}" class="btn btn-secondary">
                        <i class="fas fa-arrow-left"></i> Retour à l'accueil
                    </a>

                    @auth
                        @if(Auth::id() === $contenu->auteur_id)
                            <a href="{{ route('contenus.edit', $contenu) }}" class="btn btn-outline">
                                <i class="fas fa-edit"></i> Modifier
                            </a>
                            
                            <form action="{{ route('contenus.destroy', $contenu) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-outline" 
                                        onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce contenu ?')">
                                    <i class="fas fa-trash"></i> Supprimer
                                </button>
                            </form>
                        @endif
                    @endauth

                    <button class="btn btn-outline" onclick="shareContent()">
                        <i class="fas fa-share"></i> Partager
                    </button>
                </div>
            </div>

            <!-- Section Notes -->
            <div class="rating-section fade-in">
                <h3 class="section-title">Notes et Appréciations</h3>
                
                @php
                    // Calculer la moyenne des notes
                    $noteMoyenne = $contenu->commentaires->avg('note') ?? 0;
                    $nombreNotes = $contenu->commentaires->count();
                @endphp
                
                <div class="average-rating">{{ number_format($noteMoyenne, 1) }}</div>
                
                <div class="rating-stars">
                    @for($i = 1; $i <= 5; $i++)
                        @if($i <= floor($noteMoyenne))
                            <i class="fas fa-star star"></i>
                        @elseif($i - 0.5 <= $noteMoyenne)
                            <i class="fas fa-star-half-alt star"></i>
                        @else
                            <i class="far fa-star star"></i>
                        @endif
                    @endfor
                </div>
                
                <div class="rating-count">
                    Basé sur {{ $nombreNotes }} évaluation{{ $nombreNotes > 1 ? 's' : '' }}
                </div>

                @auth
                <div class="user-rating">
                    <h4 class="user-rating-title">Donnez votre avis</h4>
                    <div class="user-stars" id="user-rating-stars">
                        @for($i = 1; $i <= 5; $i++)
                            <i class="far fa-star star" data-rating="{{ $i }}"></i>
                        @endfor
                    </div>
                    <div id="rating-message" class="rating-message"></div>
                </div>
                @endauth
            </div>

            <!-- Section Commentaires -->
            <div class="comments-section fade-in">
                <div class="comments-header">
                    <h3 class="section-title">Commentaires</h3>
                    <span class="comments-count" id="comments-count">
                        {{ $contenu->commentaires->count() }}
                    </span>
                </div>

                @auth
                <!-- Formulaire de commentaire -->
                <div class="comment-form-card">
                    <h4 class="comment-form-title">
                        <i class="fas fa-comment-dots"></i>
                        Ajouter un commentaire
                    </h4>
                    
                    <form id="comment-form" action="{{ route('commentaires.store') }}" method="POST">
                        @csrf
                        <input type="hidden" name="contenu_id" value="{{ $contenu->id }}">
                        <input type="hidden" name="note" id="user-note" value="0">
                        
                        <div class="form-group">
                            <textarea class="form-control" 
                                      id="user-comment" 
                                      name="texte" 
                                      required 
                                      placeholder="Partagez votre avis sur ce contenu..."
                                      minlength="10"
                                      maxlength="1000"></textarea>
                            <div class="char-count">
                                <span>Minimum 10 caractères</span>
                                <span><span id="char-count">0</span>/1000</span>
                            </div>
                        </div>
                        
                        <button type="submit" class="btn btn-primary submit-comment" id="submit-comment" disabled>
                            <i class="fas fa-paper-plane"></i> 
                            <span id="submit-text">Publier le commentaire</span>
                        </button>
                    </form>
                </div>
                @else
                <!-- Message de connexion -->
                <div class="empty-state">
                    <i class="fas fa-comment-slash"></i>
                    <h4>Connectez-vous pour commenter</h4>
                    <p>Participez à la discussion en vous connectant à votre compte.</p>
                    <a href="{{ route('login') }}" class="btn btn-primary">
                        <i class="fas fa-sign-in-alt"></i> Se connecter
                    </a>
                </div>
                @endauth

                <!-- Liste des commentaires -->
                <div class="comments-list" id="comments-list">
                    @forelse($contenu->commentaires as $commentaire)
                    <div class="comment-item fade-in">
                        <div class="comment-header">
                            <div class="comment-author-info">
                                <div class="comment-author-avatar">
                                    @php
                                        // Récupérer le nom de l'utilisateur
                                        $prenom = $commentaire->utilisateur->prenom ?? 'U';
                                        $nom = $commentaire->utilisateur->nom ?? '';
                                        $initials = strtoupper(substr($prenom, 0, 1) . substr($nom, 0, 1));
                                    @endphp
                                    {{ $initials }}
                                </div>
                                <div>
                                    <div class="comment-author">
                                        {{ $commentaire->utilisateur->prenom ?? $commentaire->utilisateur->nom ?? 'Utilisateur' }}
                                        @if($commentaire->user_id === $contenu->auteur_id)
                                            <span class="comment-author-badge">
                                                <i class="fas fa-crown"></i> Auteur
                                            </span>
                                        @endif
                                    </div>
                                    <div class="comment-date">
                                        {{ $commentaire->date->format('d/m/Y à H:i') }}
                                    </div>
                                </div>
                            </div>
                            
                            <div class="comment-rating">
                                @for($i = 1; $i <= 5; $i++)
                                    @if($i <= ($commentaire->note ?? 0))
                                        <i class="fas fa-star star"></i>
                                    @else
                                        <i class="far fa-star star"></i>
                                    @endif
                                @endfor
                            </div>
                        </div>
                        
                        <div class="comment-text">
                            {{ $commentaire->texte }}
                        </div>
                    </div>
                    @empty
                    <div class="empty-state">
                        <i class="fas fa-comments"></i>
                        <h4>Aucun commentaire</h4>
                        <p>Soyez le premier à commenter ce contenu !</p>
                    </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>

    <script>
        // Token CSRF
        const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
        
        // Effet de scroll sur la navbar
        window.addEventListener('scroll', function() {
            const navbar = document.getElementById('navbar');
            navbar.classList.toggle('scrolled', window.scrollY > 50);
        });

        // Changement de média principal
        function changeMainMedia(mediaUrl, mediaType, element) {
            const mainMediaContainer = document.getElementById('main-media');
            
            // Mettre à jour les thumbnails actifs
            document.querySelectorAll('.thumbnail').forEach(thumb => {
                thumb.classList.remove('active');
            });
            element.classList.add('active');
            
            // Créer un nouveau média
            let newMedia;
            if (mediaType === 'image') {
                newMedia = document.createElement('img');
                newMedia.src = mediaUrl;
                newMedia.alt = "Media principal";
                newMedia.loading = "lazy";
            } else {
                newMedia = document.createElement('video');
                newMedia.controls = true;
                newMedia.preload = "metadata";
                const source = document.createElement('source');
                source.src = mediaUrl;
                source.type = "video/mp4";
                newMedia.appendChild(source);
            }
            
            newMedia.id = 'main-media-display';
            newMedia.style.opacity = '0';
            newMedia.style.transition = 'opacity 0.3s ease';
            newMedia.style.width = '100%';
            newMedia.style.height = '100%';
            newMedia.style.objectFit = 'cover';
            
            // Animation de transition
            const currentMedia = document.getElementById('main-media-display');
            if (currentMedia) {
                currentMedia.style.opacity = '0';
                setTimeout(() => {
                    mainMediaContainer.innerHTML = '';
                    mainMediaContainer.appendChild(newMedia);
                    setTimeout(() => {
                        newMedia.style.opacity = '1';
                    }, 50);
                }, 300);
            } else {
                mainMediaContainer.appendChild(newMedia);
                setTimeout(() => {
                    newMedia.style.opacity = '1';
                }, 50);
            }
        }

        // Initialisation
        document.addEventListener('DOMContentLoaded', function() {
            // Étoiles de notation
            const userStars = document.querySelectorAll('#user-rating-stars .star');
            const userNoteInput = document.getElementById('user-note');
            let userRating = 0;
            
            if (userStars.length > 0) {
                userStars.forEach((star, index) => {
                    star.addEventListener('click', function() {
                        const rating = parseInt(this.getAttribute('data-rating'));
                        userRating = rating;
                        userNoteInput.value = rating;
                        
                        // Mettre à jour l'affichage
                        userStars.forEach((s, i) => {
                            s.classList.remove('fas', 'far', 'active');
                            if (i < rating) {
                                s.classList.add('fas', 'active');
                            } else {
                                s.classList.add('far');
                            }
                        });
                        
                        // Message
                        const messages = ['Mauvais', 'Passable', 'Bon', 'Très bon', 'Excellent'];
                        const messageEl = document.getElementById('rating-message');
                        if (messageEl) {
                            messageEl.textContent = messages[rating - 1];
                            messageEl.style.color = '#d4a017';
                        }
                        
                        // Activer le bouton de commentaire
                        const commentText = document.getElementById('user-comment');
                        const submitBtn = document.getElementById('submit-comment');
                        if (commentText && submitBtn) {
                            submitBtn.disabled = commentText.value.length < 10;
                        }
                    });
                    
                    star.addEventListener('mouseover', function() {
                        const rating = parseInt(this.getAttribute('data-rating'));
                        userStars.forEach((s, i) => {
                            s.classList.remove('hover');
                            if (i < rating) {
                                s.classList.add('hover');
                            }
                        });
                    });
                    
                    star.addEventListener('mouseout', function() {
                        userStars.forEach(s => s.classList.remove('hover'));
                    });
                });
            }
            
            // Compteur de caractères pour le commentaire
            const commentTextarea = document.getElementById('user-comment');
            const charCount = document.getElementById('char-count');
            const submitBtn = document.getElementById('submit-comment');
            
            if (commentTextarea && charCount) {
                commentTextarea.addEventListener('input', function() {
                    const length = this.value.length;
                    charCount.textContent = length;
                    
                    if (submitBtn) {
                        submitBtn.disabled = length < 10 || userRating === 0;
                    }
                });
            }
            
            // Gestion du formulaire de commentaire
            const commentForm = document.getElementById('comment-form');
            if (commentForm) {
                commentForm.addEventListener('submit', async function(e) {
                    e.preventDefault();
                    
                    // Validation
                    if (userRating === 0) {
                        showAlert('Veuillez donner une note avant de publier votre commentaire.', 'error');
                        return;
                    }
                    
                    if (commentTextarea && commentTextarea.value.length < 10) {
                        showAlert('Le commentaire doit contenir au moins 10 caractères.', 'error');
                        return;
                    }
                    
                    // Préparer l'envoi
                    const formData = new FormData(this);
                    
                    // Désactiver le bouton
                    if (submitBtn) {
                        submitBtn.disabled = true;
                        submitBtn.innerHTML = '<div class="loader"></div> Publication...';
                    }
                    
                    try {
                        const response = await fetch(this.action, {
                            method: 'POST',
                            body: formData,
                            headers: {
                                'X-Requested-With': 'XMLHttpRequest',
                                'X-CSRF-Token': csrfToken
                            }
                        });
                        
                        const data = await response.json();
                        
                        if (data.success) {
                            // Ajouter le nouveau commentaire
                            addNewComment(data.commentaire);
                            
                            // Mettre à jour les statistiques
                            updateRatingStats(data.noteMoyenne, data.nombreNotes);
                            
                            // Réinitialiser le formulaire
                            commentForm.reset();
                            userRating = 0;
                            userNoteInput.value = 0;
                            charCount.textContent = '0';
                            
                            // Réinitialiser les étoiles
                            userStars.forEach(star => {
                                star.classList.remove('fas', 'active');
                                star.classList.add('far');
                            });
                            
                            // Message de succès
                            showAlert('Votre commentaire a été publié avec succès!', 'success');
                            
                            // Réinitialiser le message de note
                            const messageEl = document.getElementById('rating-message');
                            if (messageEl) {
                                messageEl.textContent = '';
                                messageEl.style.color = '';
                            }
                        } else {
                            showAlert(data.message || 'Erreur lors de la publication.', 'error');
                        }
                    } catch (error) {
                        console.error('Error:', error);
                        showAlert('Une erreur est survenue. Veuillez réessayer.', 'error');
                    } finally {
                        // Réactiver le bouton
                        if (submitBtn) {
                            submitBtn.disabled = true;
                            submitBtn.innerHTML = '<i class="fas fa-paper-plane"></i> <span id="submit-text">Publier le commentaire</span>';
                        }
                    }
                });
            }
            
            // Fonction pour ajouter un nouveau commentaire
            function addNewComment(commentData) {
                const commentsList = document.getElementById('comments-list');
                const commentsCount = document.getElementById('comments-count');
                
                // Supprimer l'état vide s'il existe
                const emptyState = commentsList.querySelector('.empty-state');
                if (emptyState) {
                    emptyState.remove();
                }
                
                // Créer le nouvel élément
                const commentDiv = document.createElement('div');
                commentDiv.className = 'comment-item fade-in';
                commentDiv.style.animation = 'fadeInUp 0.6s ease forwards';
                
                // Générer les étoiles
                let starsHTML = '';
                for (let i = 1; i <= 5; i++) {
                    starsHTML += i <= (commentData.note || 0) ? 
                        '<i class="fas fa-star star"></i>' : 
                        '<i class="far fa-star star"></i>';
                }
                
                // Formater la date
                const commentDate = new Date(commentData.date);
                const formattedDate = commentDate.toLocaleDateString('fr-FR', { 
                    day: '2-digit', 
                    month: '2-digit', 
                    year: 'numeric',
                    hour: '2-digit',
                    minute: '2-digit'
                });
                
                // Avatar initials
                const authorName = commentData.utilisateur?.prenom || commentData.utilisateur?.nom || 'Utilisateur';
                const authorLastName = commentData.utilisateur?.nom || '';
                const initials = (authorName.charAt(0) + (authorLastName.charAt(0) || '')).toUpperCase();
                
                // Vérifier si l'utilisateur est l'auteur
                const isAuthor = commentData.user_id === {{ $contenu->auteur_id }};
                const authorBadge = isAuthor ? 
                    '<span class="comment-author-badge"><i class="fas fa-crown"></i> Auteur</span>' : 
                    '';
                
                // HTML du commentaire
                commentDiv.innerHTML = `
                    <div class="comment-header">
                        <div class="comment-author-info">
                            <div class="comment-author-avatar">${initials}</div>
                            <div>
                                <div class="comment-author">
                                    ${escapeHtml(authorName)}
                                    ${authorBadge}
                                </div>
                                <div class="comment-date">${formattedDate}</div>
                            </div>
                        </div>
                        <div class="comment-rating">
                            ${starsHTML}
                        </div>
                    </div>
                    <div class="comment-text">${escapeHtml(commentData.texte || '')}</div>
                `;
                
                // Ajouter en haut de la liste
                const firstComment = commentsList.firstElementChild;
                if (firstComment) {
                    commentsList.insertBefore(commentDiv, firstComment);
                } else {
                    commentsList.appendChild(commentDiv);
                }
                
                // Mettre à jour le compteur
                const currentCount = parseInt(commentsCount.textContent) || 0;
                commentsCount.textContent = currentCount + 1;
            }
            
            // Mettre à jour les statistiques de notation
            function updateRatingStats(averageRating, count) {
                // Note moyenne
                const avgRatingEl = document.querySelector('.average-rating');
                if (avgRatingEl) {
                    avgRatingEl.textContent = (averageRating || 0).toFixed(1);
                }
                
                // Nombre d'évaluations
                const ratingCountEl = document.querySelector('.rating-count');
                if (ratingCountEl) {
                    ratingCountEl.textContent = `Basé sur ${count || 0} évaluation${count > 1 ? 's' : ''}`;
                }
                
                // Étoiles moyennes
                updateAverageStars(averageRating || 0);
            }
            
            // Mettre à jour les étoiles moyennes
            function updateAverageStars(averageRating) {
                const averageStars = document.querySelector('.rating-stars');
                if (!averageStars) return;
                
                averageStars.innerHTML = '';
                
                for (let i = 1; i <= 5; i++) {
                    const star = document.createElement('i');
                    if (i <= Math.floor(averageRating)) {
                        star.className = 'fas fa-star star';
                    } else if (i - 0.5 <= averageRating) {
                        star.className = 'fas fa-star-half-alt star';
                    } else {
                        star.className = 'far fa-star star';
                    }
                    averageStars.appendChild(star);
                }
            }
            
            // Fonction d'échappement HTML
            function escapeHtml(text) {
                const div = document.createElement('div');
                div.textContent = text;
                return div.innerHTML;
            }
            
            // Afficher une alerte
            function showAlert(message, type) {
                // Supprimer les anciennes alertes
                document.querySelectorAll('.alert').forEach(alert => {
                    alert.remove();
                });
                
                // Créer la nouvelle alerte
                const alertDiv = document.createElement('div');
                alertDiv.className = `alert alert-${type}`;
                alertDiv.innerHTML = `<i class="fas fa-${type === 'success' ? 'check' : 'exclamation'}-circle me-2"></i>${message}`;
                
                document.body.appendChild(alertDiv);
                
                // Auto-suppression
                setTimeout(() => {
                    alertDiv.style.transition = 'opacity 0.5s ease';
                    alertDiv.style.opacity = '0';
                    setTimeout(() => alertDiv.remove(), 500);
                }, 5000);
            }
        });
        
        // Fonction de partage
        function shareContent() {
            const shareData = {
                title: '{{ $contenu->titre }}',
                text: 'Découvrez ce contenu sur BéninCulture',
                url: window.location.href
            };
            
            if (navigator.share) {
                navigator.share(shareData)
                .catch(err => {
                    if (err.name !== 'AbortError') {
                        copyToClipboard();
                    }
                });
            } else {
                copyToClipboard();
            }
        }
        
        // Copier dans le presse-papier
        function copyToClipboard() {
            const text = `{{ $contenu->titre }}\n${window.location.href}`;
            
            if (navigator.clipboard) {
                navigator.clipboard.writeText(text)
                    .then(() => showAlert('Lien copié dans le presse-papier !', 'success'))
                    .catch(() => {
                        fallbackCopyToClipboard(text);
                    });
            } else {
                fallbackCopyToClipboard(text);
            }
        }
        
        // Fallback pour copier dans le presse-papier
        function fallbackCopyToClipboard(text) {
            const textarea = document.createElement('textarea');
            textarea.value = text;
            textarea.style.position = 'fixed';
            textarea.style.opacity = '0';
            document.body.appendChild(textarea);
            textarea.select();
            
            try {
                document.execCommand('copy');
                showAlert('Lien copié dans le presse-papier !', 'success');
            } catch (err) {
                console.error('Erreur lors de la copie:', err);
                showAlert('Impossible de copier le lien.', 'error');
            } finally {
                document.body.removeChild(textarea);
            }
        }
        
        // Auto-suppression des alertes
        setTimeout(() => {
            document.querySelectorAll('.alert').forEach(alert => {
                alert.remove();
            });
        }, 5000);
    </script>
</body>
</html>