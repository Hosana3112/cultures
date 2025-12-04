<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BéninCulture - L'âme de l'Afrique</title>
    
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700;900&family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css" rel="stylesheet">

    <style>
        /* ==========================================================================
           VARIABLES & RESET (MISE À JOUR)
           Palette : Vert Forêt, Or Africain, Terre Cuite
           ========================================================================== */
        :root {
            --primary: #004D40; /* Vert Forêt profond et riche */
            --primary-light: #00897B; /* Vert Canard pour les dégradés */
            --secondary: #FFC107; /* Or Africain/Ambre vibrant */
            --accent: #E65100; /* Orange Brûlé/Terre Cuite pour l'urgence/CTA */
            --light: #fdfdfd; /* Blanc cassé très léger */
            --light-gray: #ECEFF1;
            --dark: #212121; /* Noir doux */
            --gray: #546E7A; /* Gris Bleu pour le texte de corps */
            --white: #ffffff;
            --shadow: 0 10px 30px rgba(0,0,0,0.1); /* Ombre plus nette */
            --shadow-hover: 0 20px 45px rgba(0,0,0,0.15); /* Ombre plus prononcée au survol */
            --shadow-card: 0 5px 15px rgba(0,0,0,0.08); /* Ombre légère pour les cartes */
            --radius-sm: 8px;
            --radius-md: 12px;
            --radius-lg: 18px;
            --radius-xl: 25px;
            --radius-round: 50px;
            --transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            --transition-slow: all 0.5s cubic-bezier(0.4, 0, 0.2, 1);
            --font-head: 'Playfair Display', serif;
            --font-body: 'Poppins', sans-serif;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        html {
            scroll-behavior: smooth;
            scroll-padding-top: 80px;
        }

        body {
            font-family: var(--font-body);
            background-color: var(--light);
            color: var(--dark);
            line-height: 1.65; /* Amélioration de la lisibilité */
            overflow-x: hidden;
            padding-top: 80px;
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
        }

        a { 
            text-decoration: none; 
            color: inherit; 
            transition: var(--transition); 
        }
        
        ul, ol { list-style: none; }
        img { max-width: 100%; height: auto; display: block; }
        button { 
            cursor: pointer; 
            border: none; 
            background: none; 
            font-family: inherit;
            font-size: inherit;
            color: inherit;
        }

        /* Styles généraux pour le code HTML et BLADE */
        
        /* Message de session (Alertes) */
        .alert {
            position: fixed;
            top: 100px;
            left: 50%;
            transform: translateX(-50%);
            z-index: 1000;
            padding: 1rem 2rem;
            border-radius: var(--radius-sm);
            border-left: 5px solid;
            display: flex;
            align-items: center;
            gap: 10px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            opacity: 1;
            transition: var(--transition);
        }

        .alert-success {
            background: rgba(0, 77, 64, 0.1); /* Utiliser le vert primaire */
            color: var(--primary);
            border-left-color: var(--primary);
        }

        .alert-error {
            background: rgba(230, 81, 0, 0.1); /* Utiliser l'accent */
            color: var(--accent);
            border-left-color: var(--accent);
        }

        /* ==========================================================================
           TYPOGRAPHY (MISE À JOUR)
           ========================================================================== */
        h1, h2, h3, h4, h5, h6 {
            font-family: var(--font-head);
            font-weight: 900;
            line-height: 1.15;
            color: var(--primary); /* Titres en Vert profond */
            margin-bottom: 0.8rem;
            letter-spacing: -0.5px;
        }

        h1 { font-size: 4rem; } /* H1 plus grand pour l'impact */
        h2 { font-size: 3rem; } /* H2 plus grand */
        h3 { font-size: 2rem; }
        h4 { font-size: 1.6rem; }

        p {
            margin-bottom: 1.2rem;
            color: var(--gray);
        }

        .text-lead {
            font-size: 1.2rem; /* Taille augmentée */
            line-height: 1.8;
            color: var(--dark);
            font-weight: 300;
        }

        .text-small {
            font-size: 0.9rem;
            color: var(--gray);
        }

        /* ==========================================================================
           LAYOUT & CONTAINERS
           ========================================================================== */
        .container {
            width: 100%;
            max-width: 1300px; /* Conteneur légèrement plus large */
            margin: 0 auto;
            padding: 0 20px;
        }

        .section {
            padding: 6rem 0; /* Plus d'espacement */
            position: relative;
        }

        .section-header {
            text-align: center;
            margin-bottom: 5rem; /* Plus d'espace sous l'en-tête */
        }

        .section-title {
            position: relative;
            display: inline-block;
            margin-bottom: 1.5rem;
            color: var(--primary) !important; /* Titre en couleur principale */
            font-size: 3.5rem; /* Assurer une grande taille */
            font-weight: 900;
        }

        .section-title::after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 50%;
            transform: translateX(-50%);
            width: 100px; /* Ligne plus large et épaisse */
            height: 4px;
            background: linear-gradient(90deg, var(--accent), var(--secondary)); /* Dégradé Or/Orange */
            border-radius: 2px;
        }

        .section-subtitle {
            font-size: 1.3rem !important; /* Taille augmentée */
            color: var(--gray) !important; /* Couleur neutre */
            max-width: 700px;
            margin: 0 auto;
            line-height: 1.7;
            font-weight: 400;
        }
        
        /* Empty State */
        .empty-state {
            text-align: center;
            padding: 4rem 0;
            border: 2px dashed var(--light-gray);
            border-radius: var(--radius-lg);
            margin: 2rem 0;
            background: var(--light-gray);
        }
        .empty-icon {
            font-size: 4rem;
            color: var(--primary-light);
            margin-bottom: 1rem;
        }
        .empty-title {
            color: var(--dark);
            margin-bottom: 0.5rem;
        }
        .empty-text {
            max-width: 500px;
            margin: 0 auto 1.5rem;
        }

        /* ==========================================================================
           BUTTONS (MISE À JOUR)
           ========================================================================== */
        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 0.6rem;
            padding: 0.8rem 2rem;
            border-radius: var(--radius-round);
            font-weight: 600;
            font-size: 1rem;
            transition: var(--transition);
            position: relative;
            overflow: hidden;
            white-space: nowrap;
            text-align: center;
            border: none;
            cursor: pointer;
        }

        .btn:hover {
            transform: translateY(-2px);
        }
        
        /* Primary Button (Vert) */
        .btn-primary {
            background: linear-gradient(135deg, var(--primary), var(--primary-light));
            color: var(--white);
            box-shadow: 0 6px 20px rgba(0, 77, 64, 0.3);
        }

        .btn-primary:hover {
            box-shadow: 0 10px 30px rgba(0, 77, 64, 0.4);
        }

        /* Secondary Button (Or - Utilisé principalement pour le Hero CTA) */
        .btn-secondary {
            background: linear-gradient(135deg, var(--secondary), #ffeb3b);
            color: var(--dark);
            font-weight: 700;
            box-shadow: 0 6px 20px rgba(255, 193, 7, 0.3);
        }

        .btn-secondary:hover {
            box-shadow: 0 10px 30px rgba(255, 193, 7, 0.4);
            color: var(--dark);
        }

        /* Outline Button */
        .btn-outline {
            background: transparent;
            color: var(--primary);
            border: 2px solid var(--primary);
        }

        .btn-outline:hover {
            background: var(--primary);
            color: var(--white);
            transform: translateY(-2px);
        }

        /* Small Button */
        .btn-sm {
            padding: 0.6rem 1.4rem;
            font-size: 0.9rem;
        }

        /* Large Button */
        .btn-lg {
            padding: 1rem 2.5rem;
            font-size: 1.2rem;
        }

        /* ==========================================================================
           NAVIGATION (MISE À JOUR)
           ========================================================================== */
        .navbar {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            z-index: 100;
            padding: 1rem 5%;
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(15px); /* Flou plus fort */
            transition: var(--transition);
        }
        
        .nav-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            max-width: 1400px;
            margin: 0 auto;
        }

        .navbar.scrolled {
            padding: 0.6rem 5%; /* Navigation plus compacte en scroll */
            box-shadow: 0 5px 30px rgba(0,0,0,0.1);
        }

        .logo {
            font-size: 2rem; /* Logo plus grand */
            letter-spacing: -1px;
            display: flex;
            align-items: center;
            font-weight: 700;
            color: var(--dark);
        }

        .logo-img {
            height: 45px; /* Image de logo plus grande */
            margin-right: 8px;
        }

        .logo span {
            color: var(--secondary); /* Le "Bénin" est en couleur Or */
        }
        
        .nav-menu {
            display: flex;
            gap: 2rem;
            margin: 0;
        }

        .nav-link {
            font-weight: 500;
            color: var(--dark);
            padding: 0.6rem 0;
            position: relative;
        }

        .nav-link::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 0;
            height: 3px;
            background: var(--accent); /* Soulignement en couleur accent */
            transition: width 0.3s ease;
        }

        .nav-link:hover::after {
            width: 100%;
        }
        
        .nav-link:hover {
            color: var(--accent);
        }

        .nav-actions {
            display: flex;
            align-items: center;
            gap: 1rem;
        }
        
        /* User Menu */
        .user-menu {
            position: relative;
        }
        
        .user-trigger {
            display: flex;
            align-items: center;
            padding: 0.5rem 1rem 0.5rem 0.5rem;
            border-radius: var(--radius-round);
            background: var(--light-gray);
            transition: var(--transition);
            cursor: pointer;
        }
        
        .user-trigger:hover {
            background: var(--white);
            box-shadow: 0 0 0 2px var(--primary-light);
        }

        .user-avatar {
            width: 35px;
            height: 35px;
            border-radius: 50%;
            background: linear-gradient(135deg, var(--accent), var(--secondary)); /* Dégradé de l'avatar plus chaud */
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--white);
            font-size: 1.2rem;
            overflow: hidden;
            margin-right: 8px;
        }
        
        .user-avatar img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        
        .user-name {
            font-weight: 600;
            color: var(--dark);
        }

        .user-dropdown {
            position: absolute;
            top: 100%;
            right: 0;
            min-width: 200px;
            background: var(--white);
            border-radius: var(--radius-sm);
            box-shadow: var(--shadow);
            padding: 0.5rem 0;
            margin-top: 10px;
            opacity: 0;
            visibility: hidden;
            transform: translateY(-10px);
            transition: var(--transition);
            z-index: 90;
        }
        
        .user-trigger:focus + .user-dropdown,
        .user-menu:hover .user-dropdown {
            opacity: 1;
            visibility: visible;
            transform: translateY(0);
        }

        .dropdown-item {
            display: flex;
            align-items: center;
            padding: 0.75rem 1rem;
            color: var(--dark);
            transition: background-color 0.2s;
            width: 100%;
            text-align: left;
        }

        .dropdown-item:hover {
            background-color: var(--light-gray);
            color: var(--primary);
        }

        .dropdown-item i {
            margin-right: 10px;
            width: 18px;
        }

        .dropdown-divider {
            height: 1px;
            background-color: var(--light-gray);
            margin: 0.5rem 0;
        }
        
        /* Mobile Menu */
        .mobile-menu-btn {
            display: none;
            width: 30px;
            height: 20px;
            position: relative;
            flex-direction: column;
            justify-content: space-between;
            z-index: 101;
        }
        
        .mobile-menu-btn span {
            display: block;
            height: 3px;
            width: 100%;
            background: var(--dark);
            border-radius: 3px;
            transition: all 0.3s ease;
        }
        
        .mobile-menu-btn.active span:nth-child(1) {
            transform: translateY(8.5px) rotate(45deg);
        }
        .mobile-menu-btn.active span:nth-child(2) {
            opacity: 0;
        }
        .mobile-menu-btn.active span:nth-child(3) {
            transform: translateY(-8.5px) rotate(-45deg);
        }

        /* ==========================================================================
           HERO SECTION (MISE À JOUR MAJEURE)
           ========================================================================== */
        .hero {
            height: 90vh; /* Hauteur relative au viewport */
            min-height: 650px;
            background: var(--primary);
            position: relative;
            overflow: hidden;
        }

        .hero-slider {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
        }

        .hero-slide {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-size: cover;
            background-position: center;
            opacity: 0;
            transform: scale(1.1); /* Zoom léger pour l'effet */
            transition: opacity 1.5s ease, transform 6s ease-out; /* Transition plus douce et lente pour l'image */
        }
        
        .hero-slide.active {
            opacity: 1;
            transform: scale(1);
        }

        .hero-slide::after {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            /* Dégradé sur l'image plus dramatique */
            background: linear-gradient(45deg, 
                rgba(0, 77, 64, 0.9), 
                rgba(230, 81, 0, 0.5) /* Accent Terre Cuite pour le contraste */
            );
        }

        .hero-content {
            position: relative;
            z-index: 20;
            height: 100%;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
            color: var(--white);
            padding: 0 20px;
        }

        .hero-title {
            font-size: 5rem; /* H1 encore plus grand et impactant */
            margin-bottom: 2rem;
            text-shadow: 4px 4px 25px rgba(0,0,0,0.8); /* Ombre plus forte */
            line-height: 1;
            letter-spacing: -2px;
            color: var(--white);
        }

        .hero-subtitle {
            font-size: 1.6rem !important; /* Sous-titre très visible */
            margin-bottom: 3rem;
            font-weight: 300;
            color: var(--light);
            text-shadow: 2px 2px 10px rgba(0,0,0,0.4);
            max-width: 800px;
        }
        
        .hero-actions {
            display: flex;
            gap: 1.5rem;
            justify-content: center;
        }

        /* Bouton principal du Hero utilise le style Secondary (Or) */
        .hero-actions .btn-secondary {
            padding: 1rem 3rem;
            font-size: 1.2rem;
        }

        /* ==========================================================================
           SECTION BACKGROUNDS (MISE À JOUR)
           ========================================================================== */
        #gastronomie {
            background: linear-gradient(135deg, var(--light) 0%, #FFF8E1 100%); /* Base claire + Jaune Miel */
        }

        #contes {
            background: linear-gradient(135deg, #FBEFEF 0%, #EFEBE9 100%); /* Rose Clair + Beige Terre */
        }

        #regions {
            background: linear-gradient(135deg, #F1F8E9 0%, #E0F2F1 100%); /* Vert Menthe + Bleu Clair */
        }

        /* ==========================================================================
           CAROUSEL STYLES - CORRIGÉ POUR LE CENTRAGE
           ========================================================================== */
        .carousel-container {
            position: relative;
            width: 100%;
            overflow: hidden;
            border-radius: var(--radius-xl);
            background: var(--white);
            box-shadow: var(--shadow-hover);
            padding: 2rem 0;
        }

        .carousel-inner-container {
            position: relative;
            width: 100%;
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 70px; /* Espace pour les flèches de navigation */
        }

        .carousel-wrapper {
            display: flex;
            transition: transform 0.5s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .carousel-slide {
            flex: 0 0 100%;
            min-width: 0; /* Important pour le flexbox */
            padding: 0 15px; /* Garder ce padding pour l'espace entre les cartes */
            transition: opacity 0.3s ease;
            opacity: 0.3;
            display: flex;
            justify-content: center; /* Centrer horizontalement */
            align-items: center; /* Centrer verticalement */
        }

        .carousel-slide.active {
            opacity: 1;
        }

        .carousel-card {
            background: var(--white);
            border-radius: var(--radius-lg);
            box-shadow: var(--shadow-card);
            overflow: hidden;
            transition: var(--transition);
            height: 100%;
            min-height: 550px;
            display: flex;
            flex-direction: column;
            max-width: 850px; /* Largeur max pour les cartes */
            width: 100%; /* Prendre toute la largeur disponible jusqu'à max-width */
            margin: 0 auto; /* Centrer la carte */
        }

        .carousel-card:hover {
            transform: translateY(-5px);
            box-shadow: var(--shadow-hover);
        }

        .carousel-media {
            height: 300px;
            position: relative;
            overflow: hidden;
        }

        .carousel-media img,
        .carousel-media video {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.5s ease;
        }

        .carousel-card:hover .carousel-media img,
        .carousel-card:hover .carousel-media video {
            transform: scale(1.05);
        }

        .carousel-tag {
            position: absolute;
            top: 15px;
            right: 15px;
            background: var(--accent);
            color: var(--white);
            padding: 0.5rem 1.2rem;
            border-radius: var(--radius-round);
            font-size: 0.9rem;
            font-weight: 600;
            z-index: 10;
            box-shadow: 0 4px 15px rgba(230, 81, 0, 0.4);
        }

        .carousel-content {
            padding: 2rem;
            flex-grow: 1;
            display: flex;
            flex-direction: column;
        }

        .carousel-title {
            font-size: 1.8rem;
            margin-bottom: 1rem;
            line-height: 1.3;
            color: var(--primary);
        }

        .carousel-text {
            font-size: 1.05rem;
            color: var(--gray);
            line-height: 1.6;
            margin-bottom: 1.5rem;
            flex-grow: 1;
        }

        .carousel-meta {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding-top: 1.5rem;
            border-top: 1px solid var(--light-gray);
            margin-top: auto;
        }

        .carousel-author {
            display: flex;
            align-items: center;
            font-size: 0.95rem;
            color: var(--gray);
        }

        .carousel-author i {
            margin-right: 8px;
            color: var(--primary-light);
        }

        /* Carousel Navigation */
        .carousel-nav {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            width: 50px;
            height: 50px;
            background: var(--white);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            z-index: 20;
            box-shadow: var(--shadow);
            transition: var(--transition);
            border: 2px solid var(--primary-light);
        }

        .carousel-nav:hover {
            background: var(--primary);
            color: var(--white);
            transform: translateY(-50%) scale(1.1);
            box-shadow: var(--shadow-hover);
        }

        .carousel-nav.prev {
            left: 20px; /* Ajuster pour être à l'intérieur du conteneur */
        }

        .carousel-nav.next {
            right: 20px; /* Ajuster pour être à l'intérieur du conteneur */
        }

        .carousel-nav.disabled {
            opacity: 0.3;
            cursor: not-allowed;
            pointer-events: none;
        }

        .carousel-nav.disabled:hover {
            background: var(--white);
            color: var(--gray);
            transform: translateY(-50%);
        }

        /* Carousel Indicators */
        .carousel-indicators {
            display: flex;
            justify-content: center;
            gap: 10px;
            margin-top: 2rem;
            padding: 1rem 0;
        }

        .carousel-indicator {
            width: 12px;
            height: 12px;
            border-radius: 50%;
            background: var(--light-gray);
            cursor: pointer;
            transition: var(--transition);
            border: 2px solid transparent;
        }

        .carousel-indicator.active {
            background: var(--accent);
            transform: scale(1.2);
            border-color: var(--secondary);
        }

        .carousel-indicator:hover {
            background: var(--primary-light);
            transform: scale(1.1);
        }

        /* Carousel Controls Info */
        .carousel-controls-info {
            text-align: center;
            margin-top: 1rem;
            color: var(--gray);
            font-size: 0.9rem;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
        }

        .carousel-controls-info i {
            color: var(--accent);
            font-size: 1.2rem;
        }

        /* Keyboard Navigation Highlight */
        .keyboard-nav-hint {
            display: inline-flex;
            align-items: center;
            gap: 5px;
            background: var(--light-gray);
            padding: 0.3rem 0.8rem;
            border-radius: var(--radius-sm);
            font-family: monospace;
            font-weight: bold;
            color: var(--dark);
            border: 1px solid var(--primary-light);
        }

        /* ==========================================================================
           PRICE BADGE (MISE À JOUR)
           ========================================================================== */
        .price-badge {
            display: inline-flex;
            align-items: center;
            gap: 5px;
            padding: 0.5rem 1rem;
            border-radius: var(--radius-round);
            background: linear-gradient(135deg, var(--accent), #f44336); /* Badge plus urgent en Orange Brûlé */
            color: var(--white);
            font-weight: 700;
            font-size: 0.9rem;
            box-shadow: 0 4px 15px rgba(230, 81, 0, 0.4);
            margin-left: 10px;
            animation: shine 3s infinite linear;
            background-size: 200% 100%;
        }

        @keyframes shine {
            0% { background-position: 200% 0; }
            100% { background-position: -200% 0; }
        }

        /* ==========================================================================
           LANGUAGES SECTION (MISE À JOUR)
           ========================================================================== */
        .region-tabs {
            display: flex;
            justify-content: center;
            gap: 1.5rem;
            margin-bottom: 3rem;
            flex-wrap: wrap;
        }

        .tab-btn {
            padding: 0.7rem 1.8rem;
            border-radius: var(--radius-round);
            font-weight: 600;
            font-size: 1rem;
            border: 2px solid var(--accent); /* Bordure en accent */
            color: var(--accent);
            transition: var(--transition);
        }

        .tab-btn.active,
        .tab-btn:hover {
            background: var(--accent);
            color: var(--white);
        }

        .languages-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 2rem;
            text-align: center;
        }

        .language-card {
            background: var(--white);
            padding: 2rem;
            border-radius: var(--radius-lg);
            box-shadow: var(--shadow-card);
            transition: var(--transition-slow);
            border: 2px solid transparent;
        }

        .language-card:hover {
            transform: translateY(-5px);
            border-color: var(--primary-light);
            box-shadow: var(--shadow-hover);
        }

        .language-icon {
            color: var(--primary-light); /* Icône en Vert clair */
            font-size: 3rem;
            margin-bottom: 0.5rem;
        }
        
        .language-name {
            font-size: 1.8rem;
            color: var(--dark);
            margin-bottom: 0.25rem;
        }

        .language-region {
            font-size: 1rem;
            color: var(--gray);
        }

        /* ==========================================================================
           RESPONSIVE DESIGN
           ========================================================================== */
        @media (max-width: 1024px) {
            .nav-menu {
                gap: 1.5rem;
            }
            h1 { font-size: 3.5rem; }
            .hero-title { font-size: 4rem; }
            .section { padding: 5rem 0; }
            .carousel-media { height: 250px; }
            .carousel-content { padding: 1.5rem; }
            .carousel-inner-container {
                padding: 0 60px;
            }
        }

        @media (max-width: 768px) {
            .nav-menu {
                position: fixed;
                top: 80px;
                left: 0;
                width: 100%;
                flex-direction: column;
                background: rgba(255, 255, 255, 0.98);
                padding: 1rem 5%;
                gap: 0;
                transform: translateX(-100%);
                transition: transform 0.4s ease-in-out;
                box-shadow: 0 10px 20px rgba(0, 0, 0, 0.05);
                z-index: 99;
                max-height: calc(100vh - 80px);
                overflow-y: auto;
            }
            .nav-menu.active {
                transform: translateX(0);
            }
            .nav-item {
                border-bottom: 1px solid var(--light-gray);
            }
            .nav-link {
                display: block;
                padding: 1rem 0;
                width: 100%;
            }
            .mobile-menu-btn {
                display: flex;
            }
            
            .hero-title { font-size: 3rem; }
            .section-title { font-size: 2.5rem; }
            .section-subtitle { font-size: 1.1rem !important; }
            .carousel-container { padding: 1rem 0; }
            .carousel-inner-container { padding: 0 50px; }
            .carousel-nav {
                width: 40px;
                height: 40px;
            }
            .carousel-nav.prev {
                left: 10px;
            }
            .carousel-nav.next {
                right: 10px;
            }
            .carousel-media { height: 220px; }
            .carousel-title { font-size: 1.5rem; }
            .hero { height: auto; min-height: 400px; padding: 4rem 0; }
            .tab-btn { padding: 0.5rem 1rem; font-size: 0.9rem; }
            .languages-grid { grid-template-columns: 1fr; max-width: 400px; margin: 0 auto; }
        }

        @media (max-width: 576px) {
            h1 { font-size: 2.8rem; }
            h2 { font-size: 2.2rem; }
            .hero-title { font-size: 2.5rem; }
            .hero-subtitle { font-size: 1.2rem !important; }
            .section { padding: 3rem 0; }
            .btn-lg { padding: 0.8rem 1.8rem; font-size: 1rem; }
            .hero-actions { flex-direction: column; max-width: 300px; }
            .carousel-inner-container { padding: 0 40px; }
            .carousel-media { height: 200px; }
            .carousel-nav {
                width: 35px;
                height: 35px;
                font-size: 0.9rem;
            }
            .carousel-content { padding: 1.2rem; }
            .carousel-title { font-size: 1.3rem; }
            .carousel-slide {
                padding: 0 10px;
            }
        }

        @media (max-width: 400px) {
            .carousel-inner-container { padding: 0 35px; }
            .carousel-nav {
                width: 30px;
                height: 30px;
                font-size: 0.8rem;
            }
        }
    </style>
</head>
<body>

    @if(session('success'))
        <div class="alert alert-success" id="success-alert">
            <i class="fas fa-check-circle"></i>
            <span>{{ session('success') }}</span>
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-error" id="error-alert">
            <i class="fas fa-exclamation-circle"></i>
            <span>{{ session('error') }}</span>
        </div>
    @endif

    <nav class="navbar" id="navbar">
        <div class="nav-container">
            <a href="{{ route('front.accueil') }}" class="logo">
                <img src="{{ URL::asset('adminlte/img/logoculture__2_-removebg-preview.png') }}" 
                     alt="BéninCulture Logo" 
                     class="logo-img">
                Culture<span>Bénin</span>
            </a>

            <ul class="nav-menu" id="navMenu">
                <li class="nav-item">
                    <a href="#gastronomie" class="nav-link">Gastronomie</a>
                </li>
                <li class="nav-item">
                    <a href="#contes" class="nav-link">Contes & Légendes</a>
                </li>
                <li class="nav-item">
                    <a href="#regions" class="nav-link">Régions</a>
                </li>
            </ul>

            <div class="nav-actions">
                @auth
                    <a href="{{ route('front.create') }}" class="btn btn-primary btn-sm">
                        <i class="fas fa-plus"></i>
                        <span>Créer</span>
                    </a>

                    <div class="user-menu">
                        <div class="user-trigger" tabindex="0">
                            @php
                                $user = Auth::user();
                                $sexe = strtolower($user->sexe ?? '');
                                $avatarIcon = $sexe === 'femme' ? 'bi-person-fill' : 'bi-person';
                                $hasPhoto = $user->photo && file_exists(public_path('storage/' . $user->photo));
                                $photoUrl = $hasPhoto ? asset('storage/' . $user->photo) : null;
                            @endphp

                            <div class="user-avatar">
                                @if($hasPhoto)
                                    <img src="{{ $photoUrl }}" alt="Photo de profil">
                                @else
                                    <i class="{{ $avatarIcon }}"></i>
                                @endif
                            </div>
                            <span class="user-name">{{ $user->prenom ?? 'Utilisateur' }}</span>
                        </div>
                        
                        <div class="user-dropdown">
                            <a href="{{ route('profile.edit') }}" class="dropdown-item">
                                <i class="bi bi-person"></i>
                                <span>Mon profil</span>
                            </a>
                            <div class="dropdown-divider"></div>
                            <form method="POST" action="{{ route('logout') }}" class="w-100">
                                @csrf
                                <button type="submit" class="dropdown-item w-100">
                                    <i class="bi bi-box-arrow-right"></i>
                                    <span>Déconnexion</span>
                                </button>
                            </form>
                        </div>
                    </div>
                @else
                    <a href="{{ route('login') }}" class="btn btn-primary">
                        <i class="fas fa-sign-in-alt"></i>
                        <span>Connexion</span>
                    </a>
                @endauth

                <button class="mobile-menu-btn" id="mobileMenuBtn">
                    <span></span>
                    <span></span>
                    <span></span>
                </button>
            </div>
        </div>
    </nav>

    <section class="hero">
        <div class="hero-slider">
            @php
                $slides = [
                    asset('adminlte/img/Ketou-guelede-tourisme.webp'),
                    asset('adminlte/img/man-tindjan.webp'),
                    asset('adminlte/img/cascade-chute-tanougou-61aa53413bd865b9620a76851.webp'),
                    asset('adminlte/img/collinesdassa.jpeg'),
                    asset('adminlte/img/parc-w-1-61aa50398b8865b9620408c0e.webp'),
                    asset('adminlte/img/palais_porto.jpeg'),
                    asset('adminlte/img/porteretour.jpeg'),
                    asset('adminlte/img/mode.jpeg'),
                    asset('adminlte/img/pechegrandpopo.jpeg'),
                    asset('adminlte/img/Monument-to-the-victims-of-the-coup-attempt-of-January-16-1977-Place-des-Martyrs-Cotonou-Benin-1-61aa4dde6ef465b96202c3dc2.webp'),
                ];
            @endphp
            
            @foreach($slides as $index => $slide)
                <div class="hero-slide {{ $index === 0 ? 'active' : '' }}" 
                     style="background-image: url('{{ $slide }}')"></div>
            @endforeach
        </div>
        
        <div class="hero-content">
            <h1 class="hero-title">La culture du Bénin</h1>
            <p class="hero-subtitle">
                Plongez au cœur du berceau du Vaudou, découvrez une gastronomie riche 
                et vibrez au rythme de nos traditions ancestrales.
            </p>
            
            @guest
                <div class="hero-actions">
                    <a href="{{ route('login') }}" class="btn btn-secondary btn-lg">
                        <i class="fas fa-plane-departure"></i>
                        <span>Commencer le voyage</span>
                    </a>
                </div>
            @endguest
        </div>
    </section>

    <section id="gastronomie" class="section">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title">Saveurs & Culture</h2>
                <p class="section-subtitle">
                    Naviguez  les recettes traditionnelles
                </p>
            </div>

            <!-- Carousel pour la gastronomie -->
            <div class="carousel-container" id="gastronomieCarousel">
                <div class="carousel-inner-container">
                    <div class="carousel-wrapper">
                        @forelse($gastronomie_contenus as $index => $contenu)
                            <div class="carousel-slide {{ $index === 0 ? 'active' : '' }}" data-index="{{ $index }}">
                                <div class="carousel-card">
                                    <div class="carousel-media">
                                        @php
                                            $mediaUrl = null;
                                            $isVideo = false;
                                            
                                            if ($contenu->media && $contenu->media->isNotEmpty()) {
                                                $media = $contenu->media->first();
                                                $chemin = $media->chemin;
                                                
                                                $mediaUrl = asset('storage/' . $chemin);
                                                
                                                $extension = strtolower(pathinfo($chemin, PATHINFO_EXTENSION));
                                                $isVideo = in_array($extension, ['mp4', 'mov', 'avi', 'wmv', 'flv', 'webm', 'ogg']);
                                            }
                                        @endphp
                                        
                                        @if($mediaUrl && $isVideo)
                                            <video class="media-video" muted loop playsinline preload="metadata">
                                                <source src="{{ $mediaUrl }}" type="video/mp4">
                                                Votre navigateur ne supporte pas la vidéo.
                                            </video>
                                        @elseif($mediaUrl)
                                            <img src="{{ $mediaUrl }}" 
                                                 alt="{{ $contenu->titre }}" 
                                                 loading="lazy"
                                                 onerror="handleImageError(this, '{{ $chemin ?? '' }}')">
                                        @else
                                            <div class="media-loading">
                                                <i class="fas fa-utensils"></i>
                                            </div>
                                        @endif
                                        
                                        <span class="carousel-tag">
                                            {{ $contenu->typeContenue->nom ?? 'Recette' }}
                                        </span>
                                    </div>
                                    
                                    <div class="carousel-content">
                                        <h3 class="carousel-title">{{ $contenu->titre }}</h3>
                                        <p class="carousel-text">
                                            {{ Str::limit(strip_tags($contenu->texte), 200) }}
                                        </p>
                                        
                                        <div class="carousel-meta">
                                            <div class="carousel-author">
                                                <i class="fas fa-user"></i>
                                                <span>{{ $contenu->auteur->prenom ?? 'Auteur' }}</span>
                                            </div>
                                            
                                            @auth
                                                @php
                                                    $hasPaid = false; // Logique à implémenter
                                                    $price = 1000; // Prix en FCFA
                                                @endphp
                                                
                                                @if($hasPaid)
                                                    <a href="{{ route('front.show', $contenu->id) }}" 
                                                       class="btn btn-primary btn-sm">
                                                        <i class="fas fa-book-open"></i>
                                                        <span>Lire la suite</span>
                                                    </a>
                                                @else
                                                    <a href="{{ route('payment.form') }}?contenu_id={{ $contenu->id }}&type=gastronomie" 
                                                       class="btn btn-primary btn-sm">
                                                        <i class="fas fa-lock"></i>
                                                        <span>Lire la suite</span>
                                                        <span class="price-badge">
                                                            <i class="fas fa-coins"></i>
                                                            {{ number_format($price, 0, ',', ' ') }} FCFA
                                                        </span>
                                                    </a>
                                                @endif
                                            @else
                                                <a href="{{ route('login') }}" 
                                                   class="btn btn-primary btn-sm"
                                                   onclick="return showLoginMessage()">
                                                    <i class="fas fa-lock"></i>
                                                    <span>Lire la suite</span>
                                                    <span class="price-badge">
                                                        <i class="fas fa-coins"></i>
                                                        {{ number_format($price ?? 1000, 0, ',', ' ') }} FCFA
                                                    </span>
                                                </a>
                                            @endauth
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="empty-state" style="grid-column: 1 / -1;">
                                <i class="fas fa-utensils empty-icon"></i>
                                <h3 class="empty-title">Aucune recette disponible</h3>
                                <p class="empty-text">Soyez le premier à partager une recette traditionnelle !</p>
                                
                                @auth
                                    <a href="{{ route('front.create') }}" class="btn btn-primary">
                                        <i class="fas fa-plus"></i>
                                        <span>Créer une recette</span>
                                    </a>
                                @endauth
                            </div>
                        @endforelse
                    </div>
                    
                    <!-- Navigation flèches -->
                    <button class="carousel-nav prev" onclick="prevSlide('gastronomieCarousel')" aria-label="Contenu précédent">
                        <i class="fas fa-chevron-left"></i>
                    </button>
                    <button class="carousel-nav next" onclick="nextSlide('gastronomieCarousel')" aria-label="Contenu suivant">
                        <i class="fas fa-chevron-right"></i>
                    </button>
                </div>
                
                <!-- Indicateurs -->
                @if($gastronomie_contenus->isNotEmpty())
                    <div class="carousel-indicators" id="gastronomieIndicators">
                        @foreach($gastronomie_contenus as $index => $contenu)
                            <div class="carousel-indicator {{ $index === 0 ? 'active' : '' }}" 
                                 onclick="goToSlide('gastronomieCarousel', {{ $index }})"
                                 aria-label="Aller au contenu {{ $index + 1 }}"></div>
                        @endforeach
                    </div>
                @endif
                
                <!-- Info navigation clavier -->
                <div class="carousel-controls-info">
                    <i class="fas fa-keyboard"></i>
                    <span>Utilisez les touches</span>
                    <span class="keyboard-nav-hint">←</span>
                    <span>et</span>
                    <span class="keyboard-nav-hint">→</span>
                    <span>pour naviguer</span>
                </div>
            </div>
        </div>
    </section>

    <section id="contes" class="section">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title">Contes & Légendes</h2>
                <p class="section-subtitle">
                    Naviguez pour explorer les histoires et légendes
                </p>
            </div>

            <!-- Carousel pour les contes -->
            <div class="carousel-container" id="contesCarousel">
                <div class="carousel-inner-container">
                    <div class="carousel-wrapper">
                        @forelse($contes_contenus as $index => $contenu)
                            <div class="carousel-slide {{ $index === 0 ? 'active' : '' }}" data-index="{{ $index }}">
                                <div class="carousel-card">
                                    <div class="carousel-media">
                                        @php
                                            $mediaUrl = null;
                                            $isVideo = false;
                                            
                                            if ($contenu->media && $contenu->media->isNotEmpty()) {
                                                $media = $contenu->media->first();
                                                $chemin = $media->chemin;
                                                
                                                $mediaUrl = asset('storage/' . $chemin);
                                                
                                                $extension = strtolower(pathinfo($chemin, PATHINFO_EXTENSION));
                                                $isVideo = in_array($extension, ['mp4', 'mov', 'avi', 'wmv', 'flv', 'webm', 'ogg']);
                                            }
                                        @endphp
                                        
                                        @if($mediaUrl && $isVideo)
                                            <video class="media-video" muted loop playsinline preload="metadata">
                                                <source src="{{ $mediaUrl }}" type="video/mp4">
                                                Votre navigateur ne supporte pas la vidéo.
                                            </video>
                                        @elseif($mediaUrl)
                                            <img src="{{ $mediaUrl }}" 
                                                 alt="{{ $contenu->titre }}" 
                                                 loading="lazy"
                                                 onerror="handleImageError(this, '{{ $chemin ?? '' }}')">
                                        @else
                                            <div class="media-loading">
                                                <i class="fas fa-book-open"></i>
                                            </div>
                                        @endif
                                        
                                        <span class="carousel-tag">
                                            {{ $contenu->typeContenue->nom ?? 'Conte' }}
                                        </span>
                                    </div>
                                    
                                    <div class="carousel-content">
                                        <h3 class="carousel-title">{{ $contenu->titre }}</h3>
                                        <p class="carousel-text">
                                            {{ Str::limit(strip_tags($contenu->texte), 200) }}
                                        </p>
                                        
                                        <div class="carousel-meta">
                                            <div class="carousel-author">
                                                <i class="fas fa-user"></i>
                                                <span>{{ $contenu->auteur->prenom ?? 'Auteur' }}</span>
                                            </div>
                                            
                                            @auth
                                                @php
                                                    $hasPaid = false; // Logique à implémenter
                                                    $price = 500; // Prix en FCFA pour les contes
                                                @endphp
                                                
                                                @if($hasPaid)
                                                    <a href="{{ route('front.show', $contenu->id) }}" 
                                                       class="btn btn-primary btn-sm">
                                                        <i class="fas fa-book-open"></i>
                                                        <span>Lire la suite</span>
                                                    </a>
                                                @else
                                                    <a href="{{ route('payment.form') }}?contenu_id={{ $contenu->id }}&type=conte" 
                                                       class="btn btn-primary btn-sm">
                                                        <i class="fas fa-lock"></i>
                                                        <span>Lire la suite</span>
                                                        <span class="price-badge">
                                                            <i class="fas fa-coins"></i>
                                                            {{ number_format($price, 0, ',', ' ') }} FCFA
                                                        </span>
                                                    </a>
                                                @endif
                                            @else
                                                <a href="{{ route('login') }}" 
                                                   class="btn btn-primary btn-sm"
                                                   onclick="return showLoginMessage()">
                                                    <i class="fas fa-lock"></i>
                                                    <span>Lire la suite</span>
                                                    <span class="price-badge">
                                                        <i class="fas fa-coins"></i>
                                                        {{ number_format($price ?? 500, 0, ',', ' ') }} FCFA
                                                    </span>
                                                </a>
                                            @endauth
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="empty-state" style="grid-column: 1 / -1;">
                                <i class="fas fa-book-open empty-icon"></i>
                                <h3 class="empty-title">Aucun conte disponible</h3>
                                <p class="empty-text">Partagez les légendes et histoires traditionnelles !</p>
                                
                                @auth
                                    <a href="{{ route('front.create') }}" class="btn btn-primary">
                                        <i class="fas fa-plus"></i>
                                        <span>Créer un conte</span>
                                    </a>
                                @endauth
                            </div>
                        @endforelse
                    </div>
                    
                    <!-- Navigation flèches -->
                    <button class="carousel-nav prev" onclick="prevSlide('contesCarousel')" aria-label="Contenu précédent">
                        <i class="fas fa-chevron-left"></i>
                    </button>
                    <button class="carousel-nav next" onclick="nextSlide('contesCarousel')" aria-label="Contenu suivant">
                        <i class="fas fa-chevron-right"></i>
                    </button>
                </div>
                
                <!-- Indicateurs -->
                @if($contes_contenus->isNotEmpty())
                    <div class="carousel-indicators" id="contesIndicators">
                        @foreach($contes_contenus as $index => $contenu)
                            <div class="carousel-indicator {{ $index === 0 ? 'active' : '' }}" 
                                 onclick="goToSlide('contesCarousel', {{ $index }})"
                                 aria-label="Aller au contenu {{ $index + 1 }}"></div>
                        @endforeach
                    </div>
                @endif
                
                <!-- Info navigation clavier -->
                <div class="carousel-controls-info">
                    <i class="fas fa-keyboard"></i>
                    <span>Utilisez les touches</span>
                    <span class="keyboard-nav-hint">←</span>
                    <span>et</span>
                    <span class="keyboard-nav-hint">→</span>
                    <span>pour naviguer</span>
                </div>
            </div>
        </div>
    </section>

    <section id="regions" class="section">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title">Régions & Langues</h2>
                <p class="section-subtitle">
                    Découvrez la mosaïque culturelle et linguistique qui fait la richesse du Bénin
                </p>
            </div>

            <div class="region-tabs">
                <button class="tab-btn active">Littoral & Sud</button>
                <button class="tab-btn">Centre (Collines)</button>
                <button class="tab-btn">Nord (Atacora/Borgou)</button>
            </div>

            <div class="languages-grid">
                @forelse($langues as $langue)
                    <div class="language-card">
                        <div class="language-icon">
                            <i class="fas fa-comments"></i>
                        </div>
                        <h4 class="language-name">{{ $langue->nom }}</h4>
                        <p class="language-region">
                            {{ $langue->region->nom_region ?? 'Bénin' }}
                        </p>
                    </div>
                @empty
                    <div class="empty-state" style="grid-column: 1 / -1;">
                        <i class="fas fa-language empty-icon"></i>
                        <h3 class="empty-title">Aucune langue répertoriée</h3>
                        <p class="empty-text">Les informations linguistiques seront bientôt disponibles.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </section>

    <script>
        // ==========================================================================
        // CAROUSEL FUNCTIONALITY - CORRIGÉ
        // ==========================================================================
        
        class Carousel {
            constructor(containerId) {
                this.container = document.getElementById(containerId);
                if (!this.container) {
                    console.error(`Carousel container #${containerId} not found`);
                    return;
                }
                
                // Mettre à jour cette ligne pour chercher dans carousel-inner-container
                this.innerContainer = this.container.querySelector('.carousel-inner-container');
                this.wrapper = this.container.querySelector('.carousel-wrapper');
                this.slides = this.container.querySelectorAll('.carousel-slide');
                this.indicators = this.container.querySelectorAll('.carousel-indicator');
                this.prevBtn = this.container.querySelector('.carousel-nav.prev');
                this.nextBtn = this.container.querySelector('.carousel-nav.next');
                
                this.currentIndex = 0;
                this.totalSlides = this.slides.length;
                
                if (this.totalSlides === 0) return;
                
                this.init();
            }
            
            init() {
                // Initial setup
                this.updateCarousel();
                
                // Setup event listeners for buttons
                if (this.prevBtn) {
                    this.prevBtn.addEventListener('click', () => this.prev());
                }
                
                if (this.nextBtn) {
                    this.nextBtn.addEventListener('click', () => this.next());
                }
                
                // Setup event listeners for indicators
                this.indicators.forEach((indicator, index) => {
                    indicator.addEventListener('click', () => this.goTo(index));
                });
                
                // Auto-advance every 8 seconds if more than 1 slide
                if (this.totalSlides > 1) {
                    setInterval(() => this.next(), 8000);
                }
            }
            
            prev() {
                this.currentIndex = (this.currentIndex - 1 + this.totalSlides) % this.totalSlides;
                this.updateCarousel();
            }
            
            next() {
                this.currentIndex = (this.currentIndex + 1) % this.totalSlides;
                this.updateCarousel();
            }
            
            goTo(index) {
                if (index >= 0 && index < this.totalSlides) {
                    this.currentIndex = index;
                    this.updateCarousel();
                }
            }
            
            updateCarousel() {
                // Update slide position
                const slideWidth = 100; // Each slide is 100% width
                const translateX = -this.currentIndex * slideWidth;
                this.wrapper.style.transform = `translateX(${translateX}%)`;
                
                // Update active states
                this.slides.forEach((slide, index) => {
                    slide.classList.toggle('active', index === this.currentIndex);
                });
                
                // Update indicators
                if (this.indicators.length > 0) {
                    this.indicators.forEach((indicator, index) => {
                        indicator.classList.toggle('active', index === this.currentIndex);
                    });
                }
                
                // Update button states
                if (this.prevBtn && this.nextBtn) {
                    this.prevBtn.classList.toggle('disabled', this.currentIndex === 0);
                    this.nextBtn.classList.toggle('disabled', this.currentIndex === this.totalSlides - 1);
                }
            }
        }

        // ==========================================================================
        // HERO SLIDER
        // ==========================================================================
        let currentSlide = 0;
        const slides = document.querySelectorAll('.hero-slide');
        
        function showSlide(n) {
            if (slides.length === 0) return;
            slides.forEach(slide => slide.classList.remove('active'));
            currentSlide = (n + slides.length) % slides.length;
            slides[currentSlide].classList.add('active');
        }
        
        function nextHeroSlide() {
            showSlide(currentSlide + 1);
        }
        
        // ==========================================================================
        // GLOBAL CAROUSEL INSTANCES
        // ==========================================================================
        let gastronomieCarousel = null;
        let contesCarousel = null;

        // ==========================================================================
        // NAVBAR SCROLL EFFECT
        // ==========================================================================
        window.addEventListener('scroll', () => {
            const navbar = document.getElementById('navbar');
            if (navbar) {
                navbar.classList.toggle('scrolled', window.scrollY > 50);
            }
        });

        // ==========================================================================
        // MOBILE MENU
        // ==========================================================================
        const mobileMenuBtn = document.getElementById('mobileMenuBtn');
        const navMenu = document.getElementById('navMenu');
        
        if (mobileMenuBtn && navMenu) {
            mobileMenuBtn.addEventListener('click', () => {
                mobileMenuBtn.classList.toggle('active');
                navMenu.classList.toggle('active');
            });
            
            document.querySelectorAll('.nav-link').forEach(link => {
                link.addEventListener('click', () => {
                    mobileMenuBtn.classList.remove('active');
                    navMenu.classList.remove('active');
                });
            });
            
            function checkScreenSize() {
                if (window.innerWidth > 768) {
                    mobileMenuBtn.classList.remove('active');
                    navMenu.classList.remove('active');
                }
            }
            
            window.addEventListener('resize', checkScreenSize);
            checkScreenSize();
        }

        // ==========================================================================
        // REGION TABS
        // ==========================================================================
        document.querySelectorAll('.tab-btn').forEach(btn => {
            btn.addEventListener('click', function() {
                document.querySelectorAll('.tab-btn').forEach(b => {
                    b.classList.remove('active');
                });
                this.classList.add('active');
            });
        });

        // ==========================================================================
        // IMAGE ERROR HANDLING
        // ==========================================================================
        function handleImageError(img, chemin) {
            console.error('❌ Image failed to load:', img.src);
            
            const cardMedia = img.closest('.carousel-media');
            if (!cardMedia) return;
            
            const cardTitle = img.closest('.carousel-card')?.querySelector('.carousel-title')?.textContent.toLowerCase() || '';
            
            const placeholder = document.createElement('div');
            placeholder.className = 'media-loading';
            
            let iconClass = 'fas fa-image';
            if (cardTitle.includes('recette') || cardTitle.includes('gastronomie')) {
                iconClass = 'fas fa-utensils';
            } else if (cardTitle.includes('conte') || cardTitle.includes('histoire')) {
                iconClass = 'fas fa-book-open';
            }
            
            placeholder.innerHTML = `<i class="${iconClass}"></i>`;
            
            cardMedia.innerHTML = '';
            cardMedia.appendChild(placeholder);
            
            // Re-créer le tag
            const cardTag = document.createElement('span');
            cardTag.className = 'carousel-tag';
            cardTag.innerHTML = img.closest('.carousel-card')?.querySelector('.carousel-tag')?.innerHTML || '';
            cardMedia.appendChild(cardTag);
        }

        // ==========================================================================
        // LOGIN MESSAGE
        // ==========================================================================
        function showLoginMessage() {
            const notification = document.createElement('div');
            notification.className = 'alert alert-error';
            notification.innerHTML = `
                <i class="fas fa-info-circle"></i>
                <span>Veuillez vous connecter pour lire ce contenu.</span>
            `;
            
            document.body.appendChild(notification);
            
            setTimeout(() => {
                notification.style.opacity = '0';
                notification.style.transform = 'translateX(-50%) translateY(-20px)';
                setTimeout(() => notification.remove(), 300);
            }, 3000);
            
            return true;
        }

        // ==========================================================================
        // TOUCH SUPPORT FOR MOBILE
        // ==========================================================================
        function setupTouchSupport() {
            let touchStartX = 0;
            let touchEndX = 0;
            
            document.querySelectorAll('.carousel-container').forEach(container => {
                container.addEventListener('touchstart', (e) => {
                    touchStartX = e.changedTouches[0].screenX;
                }, { passive: true });
                
                container.addEventListener('touchend', (e) => {
                    touchEndX = e.changedTouches[0].screenX;
                    handleSwipe(container.id);
                }, { passive: true });
            });
            
            function handleSwipe(carouselId) {
                const swipeThreshold = 50;
                const swipeDistance = touchEndX - touchStartX;
                
                if (Math.abs(swipeDistance) > swipeThreshold) {
                    if (swipeDistance > 0) {
                        // Swipe right - previous
                        if (carouselId === 'gastronomieCarousel' && gastronomieCarousel) {
                            gastronomieCarousel.prev();
                        } else if (carouselId === 'contesCarousel' && contesCarousel) {
                            contesCarousel.prev();
                        }
                    } else {
                        // Swipe left - next
                        if (carouselId === 'gastronomieCarousel' && gastronomieCarousel) {
                            gastronomieCarousel.next();
                        } else if (carouselId === 'contesCarousel' && contesCarousel) {
                            contesCarousel.next();
                        }
                    }
                }
            }
        }

        // ==========================================================================
        // INITIALISATION - CORRIGÉ
        // ==========================================================================
        document.addEventListener('DOMContentLoaded', () => {
            console.log('DOM loaded, initializing carousels...');
            
            // Initialize carousels
            if (document.getElementById('gastronomieCarousel')) {
                gastronomieCarousel = new Carousel('gastronomieCarousel');
                console.log('Gastronomie carousel initialized with', gastronomieCarousel.totalSlides, 'slides');
            }
            
            if (document.getElementById('contesCarousel')) {
                contesCarousel = new Carousel('contesCarousel');
                console.log('Contes carousel initialized with', contesCarousel.totalSlides, 'slides');
            }
            
            // Start hero slider
            if (slides.length > 0) {
                setInterval(nextHeroSlide, 5000);
                showSlide(0);
                console.log('Hero slider initialized with', slides.length, 'slides');
            }
            
            // Auto-hide alerts
            setTimeout(() => {
                const alerts = document.querySelectorAll('.alert');
                alerts.forEach(alert => {
                    alert.style.opacity = '0';
                    alert.style.transform = 'translateX(-50%) translateY(-20px)';
                    setTimeout(() => alert.remove(), 300);
                });
            }, 4000);
            
            // Add focus styles for keyboard navigation
            document.querySelectorAll('.carousel-nav, .carousel-indicator, .btn').forEach(el => {
                el.addEventListener('focus', () => {
                    el.style.outline = '2px solid var(--accent)';
                    el.style.outlineOffset = '2px';
                });
                
                el.addEventListener('blur', () => {
                    el.style.outline = 'none';
                });
            });
            
            // Setup touch support
            setupTouchSupport();
            
            // Setup smooth scroll
            document.querySelectorAll('a[href^="#"]').forEach(anchor => {
                anchor.addEventListener('click', function(e) {
                    const targetId = this.getAttribute('href');
                    if (targetId === '#' || targetId === '#!') return;
                    
                    const targetElement = document.querySelector(targetId);
                    if (targetElement) {
                        e.preventDefault();
                        
                        window.scrollTo({
                            top: targetElement.offsetTop - 80,
                            behavior: 'smooth'
                        });
                    }
                });
            });
            
            // Setup video autoplay on hover
            document.querySelectorAll('.carousel-card .media-video').forEach(video => {
                const card = video.closest('.carousel-card');
                
                card.addEventListener('mouseenter', () => {
                    video.play().catch(e => {
                        console.log('Video autoplay failed:', e);
                    });
                });
                
                card.addEventListener('mouseleave', () => {
                    video.pause();
                    video.currentTime = 0;
                });
            });
            
            // Setup animations on scroll
            const observerOptions = {
                threshold: 0.1,
                rootMargin: '0px 0px -50px 0px'
            };
            
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.style.opacity = '1';
                        entry.target.style.transform = 'translateY(0)';
                        observer.unobserve(entry.target);
                    }
                });
            }, observerOptions);
            
            document.querySelectorAll('.language-card, .carousel-card').forEach(el => {
                el.style.opacity = '0';
                el.style.transform = 'translateY(30px)';
                el.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
                observer.observe(el);
            });
            
            console.log('Initialization complete');
        });

        // ==========================================================================
        // GLOBAL FUNCTIONS FOR BUTTONS (pour compatibilité avec HTML onclick)
        // ==========================================================================
        function prevSlide(carouselId) {
            if (carouselId === 'gastronomieCarousel' && gastronomieCarousel) {
                gastronomieCarousel.prev();
            } else if (carouselId === 'contesCarousel' && contesCarousel) {
                contesCarousel.prev();
            }
        }

        function nextSlide(carouselId) {
            if (carouselId === 'gastronomieCarousel' && gastronomieCarousel) {
                gastronomieCarousel.next();
            } else if (carouselId === 'contesCarousel' && contesCarousel) {
                contesCarousel.next();
            }
        }

        function goToSlide(carouselId, index) {
            if (carouselId === 'gastronomieCarousel' && gastronomieCarousel) {
                gastronomieCarousel.goTo(index);
            } else if (carouselId === 'contesCarousel' && contesCarousel) {
                contesCarousel.goTo(index);
            }
        }

        // ==========================================================================
        // KEYBOARD NAVIGATION
        // ==========================================================================
        document.addEventListener('keydown', (e) => {
            // Vérifier quel carousel est actif
            const activeElement = document.activeElement;
            const isInCarousel = activeElement.closest('.carousel-container');
            
            if (!isInCarousel) return;
            
            const carouselContainer = activeElement.closest('.carousel-container');
            const carouselId = carouselContainer?.id;
            
            if (!carouselId) return;
            
            let carousel = null;
            if (carouselId === 'gastronomieCarousel') {
                carousel = gastronomieCarousel;
            } else if (carouselId === 'contesCarousel') {
                carousel = contesCarousel;
            }
            
            if (!carousel) return;
            
            switch(e.key) {
                case 'ArrowLeft':
                    e.preventDefault();
                    carousel.prev();
                    break;
                case 'ArrowRight':
                    e.preventDefault();
                    carousel.next();
                    break;
                case 'Home':
                    e.preventDefault();
                    carousel.goTo(0);
                    break;
                case 'End':
                    e.preventDefault();
                    carousel.goTo(carousel.totalSlides - 1);
                    break;
            }
        });

    </script>
</body>
</html>