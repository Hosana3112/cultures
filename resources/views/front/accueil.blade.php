<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BéninCulture - L'âme de l'Afrique</title>
    
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700;900&family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css" rel="stylesheet">

    <style>
        :root {
            --primary: #004D40;
            --primary-light: #00897B;
            --secondary: #FFC107;
            --accent: #E65100;
            --gradient-primary: linear-gradient(135deg, #004D40 0%, #00897B 100%);
            --gradient-accent: linear-gradient(135deg, #E65100 0%, #FF6F00 100%);
            --gradient-gold: linear-gradient(135deg, #FFC107 0%, #FFD54F 100%);
            --light: #fdfdfd;
            --dark: #1a1a1a;
            --gray: #546E7A;
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
            font-family: 'Poppins', sans-serif;
            background: var(--dark);
            color: var(--light);
            line-height: 1.6;
            overflow-x: hidden;
        }

        /* ===== ALERTS ===== */
        .alert {
            position: fixed;
            top: 100px;
            left: 50%;
            transform: translateX(-50%);
            z-index: 2000;
            padding: 1.2rem 2.5rem;
            border-radius: 50px;
            display: flex;
            align-items: center;
            gap: 12px;
            backdrop-filter: blur(20px);
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.3);
            animation: slideDown 0.5s ease;
        }

        @keyframes slideDown {
            from {
                transform: translateX(-50%) translateY(-100px);
                opacity: 0;
            }
            to {
                transform: translateX(-50%) translateY(0);
                opacity: 1;
            }
        }

        .alert-success {
            background: rgba(0, 77, 64, 0.9);
            color: white;
            border: 2px solid var(--primary-light);
        }

        .alert-error {
            background: rgba(230, 81, 0, 0.9);
            color: white;
            border: 2px solid var(--accent);
        }

        /* ===== ANIMATED BACKGROUND ===== */
        .animated-bg {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 0;
            background: linear-gradient(135deg, #1a1a1a 0%, #2d2d2d 100%);
        }

        .animated-bg::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: 
                radial-gradient(circle at 20% 50%, rgba(0, 77, 64, 0.15) 0%, transparent 50%),
                radial-gradient(circle at 80% 80%, rgba(230, 81, 0, 0.15) 0%, transparent 50%),
                radial-gradient(circle at 40% 20%, rgba(255, 193, 7, 0.1) 0%, transparent 50%);
            animation: bgShift 20s ease infinite;
        }

        @keyframes bgShift {
            0%, 100% { opacity: 1; transform: scale(1); }
            50% { opacity: 0.8; transform: scale(1.1); }
        }

        .floating-shapes {
            position: absolute;
            width: 100%;
            height: 100%;
            overflow: hidden;
            z-index: 1;
        }

        .shape {
            position: absolute;
            opacity: 0.03;
            animation: float 20s infinite ease-in-out;
        }

        .shape:nth-child(1) {
            top: 10%;
            left: 10%;
            width: 300px;
            height: 300px;
            background: var(--gradient-primary);
            border-radius: 30% 70% 70% 30% / 30% 30% 70% 70%;
            animation-delay: 0s;
        }

        .shape:nth-child(2) {
            top: 60%;
            right: 10%;
            width: 250px;
            height: 250px;
            background: var(--gradient-accent);
            border-radius: 70% 30% 30% 70% / 70% 70% 30% 30%;
            animation-delay: -5s;
        }

        .shape:nth-child(3) {
            bottom: 10%;
            left: 50%;
            width: 200px;
            height: 200px;
            background: var(--gradient-gold);
            border-radius: 50%;
            animation-delay: -10s;
        }

        @keyframes float {
            0%, 100% { transform: translate(0, 0) rotate(0deg); }
            25% { transform: translate(30px, -30px) rotate(90deg); }
            50% { transform: translate(0, -60px) rotate(180deg); }
            75% { transform: translate(-30px, -30px) rotate(270deg); }
        }

        /* ===== NAVBAR ===== */
        .navbar {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            z-index: 1000;
            padding: 1rem 5%;
            background: rgba(26, 26, 26, 0.7);
            backdrop-filter: blur(20px) saturate(180%);
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            transition: all 0.3s ease;
        }

        .navbar.scrolled {
            padding: 0.5rem 5%;
            background: rgba(26, 26, 26, 0.9);
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.3);
        }

        .nav-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            max-width: 1400px;
            margin: 0 auto;
        }

        .logo {
            font-size: 2rem;
            font-weight: 800;
            display: flex;
            align-items: center;
            gap: 10px;
            text-decoration: none;
        }

        .logo-img {
            height: 45px;
            filter: drop-shadow(0 0 10px rgba(255, 193, 7, 0.3));
        }

        .logo-text {
            background: var(--gradient-gold);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .nav-menu {
            display: flex;
            gap: 2.5rem;
            list-style: none;
        }

        .nav-link {
            color: var(--light);
            font-weight: 600;
            position: relative;
            padding: 0.5rem 0;
            transition: all 0.3s ease;
            text-decoration: none;
        }

        .nav-link::before {
            content: '';
            position: absolute;
            bottom: 0;
            left: 50%;
            width: 0;
            height: 2px;
            background: var(--gradient-accent);
            transform: translateX(-50%);
            transition: width 0.3s ease;
        }

        .nav-link:hover {
            color: var(--secondary);
            transform: translateY(-2px);
        }

        .nav-link:hover::before {
            width: 100%;
        }

        .nav-actions {
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .btn {
            padding: 0.8rem 2rem;
            border-radius: 50px;
            font-weight: 700;
            transition: all 0.3s ease;
            border: none;
            cursor: pointer;
            position: relative;
            overflow: hidden;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            text-decoration: none;
        }

        .btn::before {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            width: 0;
            height: 0;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.2);
            transform: translate(-50%, -50%);
            transition: width 0.6s, height 0.6s;
        }

        .btn:hover::before {
            width: 300px;
            height: 300px;
        }

        .btn span, .btn i {
            position: relative;
            z-index: 1;
        }

        .btn-primary {
            background: var(--gradient-primary);
            color: white;
            box-shadow: 0 10px 30px rgba(0, 137, 123, 0.4);
        }

        .btn-primary:hover {
            transform: translateY(-3px);
            box-shadow: 0 15px 40px rgba(0, 137, 123, 0.6);
        }

        .btn-secondary {
            background: var(--gradient-gold);
            color: var(--dark);
            box-shadow: 0 10px 30px rgba(255, 193, 7, 0.4);
        }

        .btn-secondary:hover {
            transform: translateY(-3px);
            box-shadow: 0 15px 40px rgba(255, 193, 7, 0.6);
        }

        .btn-sm {
            padding: 0.6rem 1.5rem;
            font-size: 0.9rem;
        }

        .btn-lg {
            padding: 1.2rem 3rem;
            font-size: 1.2rem;
        }

        /* User Menu */
        .user-menu {
            position: relative;
        }

        .user-trigger {
            display: flex;
            align-items: center;
            padding: 0.5rem 1rem 0.5rem 0.5rem;
            border-radius: 50px;
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            transition: all 0.3s ease;
            cursor: pointer;
            border: 1px solid rgba(255, 255, 255, 0.1);
        }

        .user-trigger:hover {
            background: rgba(255, 255, 255, 0.15);
            border-color: var(--primary-light);
            box-shadow: 0 0 20px rgba(0, 137, 123, 0.3);
        }

        .user-avatar {
            width: 35px;
            height: 35px;
            border-radius: 50%;
            background: var(--gradient-gold);
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--dark);
            font-size: 1.2rem;
            overflow: hidden;
            margin-right: 8px;
            border: 2px solid rgba(255, 193, 7, 0.3);
        }

        .user-avatar img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .user-name {
            font-weight: 600;
            color: white;
        }

        .user-dropdown {
            position: absolute;
            top: 100%;
            right: 0;
            min-width: 220px;
            background: rgba(26, 26, 26, 0.95);
            backdrop-filter: blur(20px);
            border-radius: 15px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.5);
            padding: 0.5rem 0;
            margin-top: 10px;
            opacity: 0;
            visibility: hidden;
            transform: translateY(-10px);
            transition: all 0.3s ease;
            z-index: 90;
            border: 1px solid rgba(255, 255, 255, 0.1);
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
            padding: 0.85rem 1.2rem;
            color: var(--light);
            transition: all 0.2s;
            width: 100%;
            text-align: left;
            background: none;
            border: none;
            cursor: pointer;
            text-decoration: none;
        }

        .dropdown-item:hover {
            background: rgba(0, 137, 123, 0.2);
            color: var(--secondary);
        }

        .dropdown-item i {
            margin-right: 12px;
            width: 18px;
            color: var(--secondary);
        }

        .dropdown-divider {
            height: 1px;
            background: rgba(255, 255, 255, 0.1);
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
            cursor: pointer;
            background: none;
            border: none;
        }

        .mobile-menu-btn span {
            display: block;
            height: 3px;
            width: 100%;
            background: var(--light);
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

        /* ===== HERO SECTION ===== */
        .hero {
            position: relative;
            height: 100vh;
            min-height: 650px;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
            z-index: 10;
        }

        .hero-slider {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 1;
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
            transform: scale(1.1);
            transition: opacity 2s ease, transform 8s ease-out;
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
            background: linear-gradient(135deg, 
                rgba(0, 77, 64, 0.85) 0%, 
                rgba(230, 81, 0, 0.75) 100%
            );
        }

        .particles {
            position: absolute;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            z-index: 5;
            pointer-events: none;
        }

        .particle {
            position: absolute;
            width: 4px;
            height: 4px;
            background: rgba(255, 193, 7, 0.6);
            border-radius: 50%;
            animation: particleFloat 15s infinite ease-in-out;
        }

        @keyframes particleFloat {
            0%, 100% {
                transform: translate(0, 0) scale(1);
                opacity: 0;
            }
            10% {
                opacity: 1;
            }
            90% {
                opacity: 1;
            }
            100% {
                transform: translate(100px, -1000px) scale(0);
                opacity: 0;
            }
        }

        .hero-content {
            position: relative;
            z-index: 20;
            text-align: center;
            max-width: 900px;
            padding: 0 20px;
        }

        .hero-title {
            font-size: 5.5rem;
            font-weight: 900;
            margin-bottom: 2rem;
            background: linear-gradient(135deg, white, var(--secondary));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            animation: titleGlow 3s ease-in-out infinite;
            line-height: 1.1;
        }

        @keyframes titleGlow {
            0%, 100% {
                filter: drop-shadow(0 0 20px rgba(255, 193, 7, 0.5));
            }
            50% {
                filter: drop-shadow(0 0 40px rgba(255, 193, 7, 0.8));
            }
        }

        .hero-subtitle {
            font-size: 1.5rem;
            color: rgba(255, 255, 255, 0.95);
            margin-bottom: 3rem;
            font-weight: 300;
            text-shadow: 0 2px 20px rgba(0, 0, 0, 0.5);
            line-height: 1.6;
        }

        .hero-actions {
            display: flex;
            gap: 2rem;
            justify-content: center;
        }

        /* ===== SECTION STYLES ===== */
        .section {
            position: relative;
            z-index: 10;
            padding: 8rem 0;
            background: transparent;
        }

        .container {
            max-width: 1400px;
            margin: 0 auto;
            padding: 0 20px;
        }

        .section-header {
            text-align: center;
            margin-bottom: 5rem;
        }

        .section-title {
            font-size: 4rem;
            font-weight: 900;
            background: var(--gradient-gold);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            margin-bottom: 1.5rem;
            position: relative;
            display: inline-block;
        }

        .section-title::after {
            content: '';
            position: absolute;
            bottom: -15px;
            left: 50%;
            transform: translateX(-50%);
            width: 150px;
            height: 4px;
            background: var(--gradient-accent);
            border-radius: 2px;
            box-shadow: 0 0 20px rgba(230, 81, 0, 0.5);
        }

        .section-subtitle {
            font-size: 1.3rem;
            color: rgba(255, 255, 255, 0.7);
            max-width: 700px;
            margin: 2rem auto 0;
            line-height: 1.7;
        }

        /* ===== CARD STYLES ===== */
        .cards-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
            gap: 3rem;
            margin-top: 4rem;
        }

        .card {
            background: rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(20px);
            border-radius: 30px;
            overflow: hidden;
            border: 1px solid rgba(255, 255, 255, 0.1);
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            position: relative;
        }

        /* Carte Gastronomie - Nuances orangées/dorées */
        .card-gastronomie {
            background: linear-gradient(135deg, 
                rgba(255, 193, 7, 0.08) 0%, 
                rgba(230, 81, 0, 0.12) 100%
            );
            border: 1px solid rgba(255, 193, 7, 0.2);
        }

        .card-gastronomie::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg, 
                rgba(255, 193, 7, 0.15) 0%, 
                rgba(230, 81, 0, 0.2) 100%
            );
            opacity: 0;
            transition: opacity 0.4s ease;
        }

        .card-gastronomie:hover {
            transform: translateY(-15px) scale(1.02);
            box-shadow: 0 30px 60px rgba(255, 193, 7, 0.3);
            border-color: rgba(255, 193, 7, 0.5);
        }

        .card-gastronomie:hover::before {
            opacity: 1;
        }

        /* Carte Contes - Nuances violettes/bleutées */
        .card-conte {
            background: linear-gradient(135deg, 
                rgba(103, 58, 183, 0.08) 0%, 
                rgba(0, 137, 123, 0.12) 100%
            );
            border: 1px solid rgba(103, 58, 183, 0.2);
        }

        .card-conte::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg, 
                rgba(103, 58, 183, 0.15) 0%, 
                rgba(0, 137, 123, 0.2) 100%
            );
            opacity: 0;
            transition: opacity 0.4s ease;
        }

        .card-conte:hover {
            transform: translateY(-15px) scale(1.02);
            box-shadow: 0 30px 60px rgba(103, 58, 183, 0.3);
            border-color: rgba(103, 58, 183, 0.5);
        }

        .card-conte:hover::before {
            opacity: 1;
        }

        .card-media {
            position: relative;
            height: 300px;
            overflow: hidden;
            background: rgba(0, 0, 0, 0.3);
        }

        .card-media img,
        .card-media video {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.6s ease;
        }

        .card:hover .card-media img,
        .card:hover .card-media video {
            transform: scale(1.15) rotate(2deg);
        }

        .media-loading {
            width: 100%;
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 4rem;
            color: var(--secondary);
            background: rgba(0, 0, 0, 0.3);
        }

        .card-tag {
            position: absolute;
            top: 20px;
            right: 20px;
            background: var(--gradient-accent);
            color: white;
            padding: 0.6rem 1.5rem;
            border-radius: 50px;
            font-weight: 700;
            font-size: 0.9rem;
            box-shadow: 0 10px 30px rgba(230, 81, 0, 0.5);
            z-index: 10;
        }

        .card-content {
            padding: 2.5rem;
            position: relative;
        }

        .card-title {
            font-size: 2rem;
            font-weight: 800;
            color: white;
            margin-bottom: 1rem;
            background: linear-gradient(135deg, white, var(--secondary));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            line-height: 1.3;
        }

        .card-text {
            color: rgba(255, 255, 255, 0.7);
            line-height: 1.8;
            margin-bottom: 2rem;
            font-size: 1.05rem;
        }

        .card-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding-top: 1.5rem;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
        }

        .card-author {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            color: rgba(255, 255, 255, 0.6);
        }

        .card-author i {
            color: var(--secondary);
        }

        .price-badge {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.6rem 1.2rem;
            background: var(--gradient-gold);
            color: var(--dark);
            border-radius: 50px;
            font-weight: 800;
            box-shadow: 0 5px 20px rgba(255, 193, 7, 0.4);
            margin-left: 10px;
        }

        /* ===== EMPTY STATE ===== */
        .empty-state {
            text-align: center;
            padding: 6rem 2rem;
            background: rgba(255, 255, 255, 0.03);
            border-radius: 30px;
            border: 2px dashed rgba(255, 255, 255, 0.1);
            grid-column: 1 / -1;
        }

        .empty-icon {
            font-size: 5rem;
            color: var(--secondary);
            margin-bottom: 2rem;
            opacity: 0.3;
        }

        .empty-title {
            font-size: 2rem;
            color: white;
            margin-bottom: 1rem;
        }

        .empty-text {
            color: rgba(255, 255, 255, 0.6);
            max-width: 500px;
            margin: 0 auto 2rem;
        }

        /* ===== SCROLL ANIMATIONS ===== */
        .fade-in {
            opacity: 0;
            transform: translateY(30px);
            transition: all 0.8s ease;
        }

        .fade-in.visible {
            opacity: 1;
            transform: translateY(0);
        }

        /* ===== MOBILE RESPONSIVE ===== */
        @media (max-width: 768px) {
            .hero-title {
                font-size: 3rem;
            }

            .hero-subtitle {
                font-size: 1.2rem;
            }

            .section-title {
                font-size: 2.5rem;
            }

            .section {
                padding: 5rem 0;
            }

            .cards-grid {
                grid-template-columns: 1fr;
                gap: 2rem;
            }

            .nav-menu {
                position: fixed;
                top: 80px;
                left: 0;
                width: 100%;
                flex-direction: column;
                background: rgba(26, 26, 26, 0.98);
                backdrop-filter: blur(20px);
                padding: 1rem 5%;
                gap: 0;
                transform: translateX(-100%);
                transition: transform 0.4s ease-in-out;
                box-shadow: 0 10px 20px rgba(0, 0, 0, 0.3);
                z-index: 99;
                max-height: calc(100vh - 80px);
                overflow-y: auto;
            }

            .nav-menu.active {
                transform: translateX(0);
            }

            .nav-item {
                border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            }

            .nav-link {
                display: block;
                padding: 1rem 0;
                width: 100%;
            }

            .mobile-menu-btn {
                display: flex;
            }

            .hero-actions {
                flex-direction: column;
                width: 100%;
                max-width: 300px;
            }

            .card-media {
                height: 220px;
            }
        }

        @media (max-width: 576px) {
            .hero-title {
                font-size: 2.5rem;
            }

            .section-title {
                font-size: 2rem;
            }

            .card-content {
                padding: 1.5rem;
            }

            .card-title {
                font-size: 1.5rem;
            }

            .btn-lg {
                padding: 1rem 2rem;
                font-size: 1rem;
            }
        }
    </style>
</head>
<body>
    <!-- Alerts Laravel -->
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

    <!-- Animated Background -->
    <div class="animated-bg">
        <div class="floating-shapes">
            <div class="shape"></div>
            <div class="shape"></div>
            <div class="shape"></div>
        </div>
    </div>

    <!-- Navbar -->
    <nav class="navbar" id="navbar">
        <div class="nav-container">
            <a href="{{ route('front.accueil') }}" class="logo">
                <img src="{{ URL::asset('adminlte/img/logoculture__2_-removebg-preview.png') }}" 
                     alt="BéninCulture Logo" 
                     class="logo-img">
                <span class="logo-text">CultureBénin</span>
            </a>

            <ul class="nav-menu" id="navMenu">
                <li class="nav-item">
                    <a href="#gastronomie" class="nav-link">Gastronomie</a>
                </li>
                <li class="nav-item">
                    <a href="#contes" class="nav-link">Contes & Légendes</a>
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
                            <form method="POST" action="{{ route('logout') }}" style="width: 100%;">
                                @csrf
                                <button type="submit" class="dropdown-item">
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

    <!-- Hero Section -->
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

        <div class="particles" id="particles"></div>

        <div class="hero-content fade-in visible">
            <h1 class="hero-title">La Culture du Bénin</h1>
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

    <!-- Gastronomie Section -->
    <section id="gastronomie" class="section">
        <div class="container">
            <div class="section-header fade-in">
                <h2 class="section-title">Saveurs & Culture</h2>
                <p class="section-subtitle">
                    Découvrez les recettes traditionnelles qui racontent l'histoire de notre peuple
                </p>
            </div>

            <div class="cards-grid">
                @forelse($gastronomie_contenus as $contenu)
                    <div class="card card-gastronomie fade-in">
                        <div class="card-media">
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
                                     onerror="this.parentElement.innerHTML='<div class=\'media-loading\'><i class=\'fas fa-utensils\'></i></div>'">
                            @else
                                <div class="media-loading">
                                    <i class="fas fa-utensils"></i>
                                </div>
                            @endif
                            
                            <span class="card-tag">
                                {{ $contenu->typeContenue->nom ?? 'Recette' }}
                            </span>
                        </div>
                        
                        <div class="card-content">
                            <h3 class="card-title">{{ $contenu->titre }}</h3>
                            <p class="card-text">
                                {{ Str::limit(strip_tags($contenu->texte), 200) }}
                            </p>
                            
                            <div class="card-footer">
                                <div class="card-author">
                                    <i class="fas fa-user"></i>
                                    <span>{{ $contenu->auteur->prenom ?? 'Auteur' }}</span>
                                </div>
                                
                                @auth
                                    @php
                                        $hasPaid = false;
                                        $price = 1000;
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
                                            <span>Lire</span>
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
                                        <span>Lire</span>
                                    </a>
                                @endauth
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="empty-state">
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
        </div>
    </section>

    <!-- Contes Section -->
    <section id="contes" class="section">
        <div class="container">
            <div class="section-header fade-in">
                <h2 class="section-title">Contes & Légendes</h2>
                <p class="section-subtitle">
                    Laissez-vous emporter par les histoires qui ont bercé des générations
                </p>
            </div>

            <div class="cards-grid">
                @forelse($contes_contenus as $contenu)
                    <div class="card card-conte fade-in">
                        <div class="card-media">
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
                                     onerror="this.parentElement.innerHTML='<div class=\'media-loading\'><i class=\'fas fa-book-open\'></i></div>'">
                            @else
                                <div class="media-loading">
                                    <i class="fas fa-book-open"></i>
                                </div>
                            @endif
                            
                            <span class="card-tag">
                                {{ $contenu->typeContenue->nom ?? 'Conte' }}
                            </span>
                        </div>
                        
                        <div class="card-content">
                            <h3 class="card-title">{{ $contenu->titre }}</h3>
                            <p class="card-text">
                                {{ Str::limit(strip_tags($contenu->texte), 200) }}
                            </p>
                            
                            <div class="card-footer">
                                <div class="card-author">
                                    <i class="fas fa-user"></i>
                                    <span>{{ $contenu->auteur->prenom ?? 'Auteur' }}</span>
                                </div>
                                
                                @auth
                                    @php
                                        $hasPaid = false;
                                        $price = 500;
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
                                            <span>Lire</span>
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
                                        <span>Lire</span>
                                    </a>
                                @endauth
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="empty-state">
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
        </div>
    </section>

    <script>
        // ===== HERO SLIDER =====
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

        // ===== NAVBAR SCROLL =====
        window.addEventListener('scroll', () => {
            const navbar = document.getElementById('navbar');
            if (navbar) {
                navbar.classList.toggle('scrolled', window.scrollY > 50);
            }
        });

        // ===== MOBILE MENU =====
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
        }

        // ===== PARTICLES =====
        function createParticles() {
            const container = document.getElementById('particles');
            if (!container) return;
            
            for (let i = 0; i < 30; i++) {
                const particle = document.createElement('div');
                particle.className = 'particle';
                particle.style.left = Math.random() * 100 + '%';
                particle.style.animationDelay = Math.random() * 15 + 's';
                particle.style.animationDuration = (10 + Math.random() * 10) + 's';
                container.appendChild(particle);
            }
        }

        // ===== SCROLL ANIMATIONS =====
        function handleScrollAnimations() {
            const elements = document.querySelectorAll('.fade-in');
            
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('visible');
                    }
                });
            }, {
                threshold: 0.1
            });
            
            elements.forEach(el => observer.observe(el));
        }

        // ===== VIDEO HOVER =====
        function setupVideoHover() {
            document.querySelectorAll('.card .media-video').forEach(video => {
                const card = video.closest('.card');
                
                card.addEventListener('mouseenter', () => {
                    video.play().catch(e => console.log('Video autoplay failed:', e));
                });
                
                card.addEventListener('mouseleave', () => {
                    video.pause();
                    video.currentTime = 0;
                });
            });
        }

        // ===== LOGIN MESSAGE =====
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

        // ===== SMOOTH SCROLL =====
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

        // ===== INITIALIZATION =====
        document.addEventListener('DOMContentLoaded', () => {
            createParticles();
            handleScrollAnimations();
            setupVideoHover();
            
            if (slides.length > 0) {
                setInterval(nextHeroSlide, 5000);
                showSlide(0);
            }
            
            setTimeout(() => {
                const alerts = document.querySelectorAll('.alert');
                alerts.forEach(alert => {
                    alert.style.opacity = '0';
                    alert.style.transform = 'translateX(-50%) translateY(-20px)';
                    setTimeout(() => alert.remove(), 300);
                });
            }, 4000);
        });
    </script>
</body>
</html>