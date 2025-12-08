<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $contenu->titre }} - BéninCulture</title>
    
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
        }

        body {
            font-family: 'Poppins', sans-serif;
            background: var(--dark);
            color: var(--light);
            line-height: 1.6;
            overflow-x: hidden;
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

        .nav-links {
            display: flex;
            gap: 2.5rem;
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
            background: transparent;
            color: var(--light);
            border: 2px solid var(--primary-light);
        }

        .btn-secondary:hover {
            background: var(--gradient-primary);
            border-color: var(--primary-light);
        }

        .btn-outline {
            background: transparent;
            color: var(--light);
            border: 2px solid rgba(255, 255, 255, 0.2);
        }

        .btn-outline:hover {
            border-color: var(--secondary);
            color: var(--secondary);
        }

        .btn-sm {
            padding: 0.6rem 1.5rem;
            font-size: 0.9rem;
        }

        /* User Menu */
        .user-menu {
            position: relative;
        }

        .user-info {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            padding: 0.5rem 1rem 0.5rem 0.5rem;
            border-radius: 50px;
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            transition: all 0.3s ease;
            cursor: pointer;
            border: 1px solid rgba(255, 255, 255, 0.1);
        }

        .user-info:hover {
            background: rgba(255, 255, 255, 0.15);
            border-color: var(--primary-light);
            box-shadow: 0 0 20px rgba(0, 137, 123, 0.3);
        }

        .user-avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: var(--gradient-gold);
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--dark);
            font-weight: 700;
            overflow: hidden;
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

        .user-menu:hover .user-dropdown {
            opacity: 1;
            visibility: visible;
            transform: translateY(0);
        }

        .user-dropdown a,
        .logout-btn {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            padding: 0.85rem 1.2rem;
            color: var(--light);
            transition: all 0.2s;
            width: 100%;
            text-align: left;
            background: none;
            border: none;
            cursor: pointer;
            text-decoration: none;
            font-family: inherit;
            font-size: inherit;
        }

        .user-dropdown a:hover,
        .logout-btn:hover {
            background: rgba(0, 137, 123, 0.2);
            color: var(--secondary);
        }

        .user-dropdown a i,
        .logout-btn i {
            color: var(--secondary);
        }

        .divider {
            height: 1px;
            background: rgba(255, 255, 255, 0.1);
            margin: 0.5rem 0;
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

        /* ===== CONTENT WRAPPER ===== */
        .content-wrapper {
            position: relative;
            z-index: 10;
            padding-top: 120px;
            min-height: 100vh;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }

        /* ===== HEADER ===== */
        .content-header {
            text-align: center;
            margin-bottom: 4rem;
            animation: fadeInUp 0.6s ease;
        }

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

        .content-title {
            font-size: 4rem;
            font-weight: 900;
            background: var(--gradient-gold);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            margin-bottom: 2rem;
            line-height: 1.2;
            animation: titleGlow 3s ease-in-out infinite;
        }

        @keyframes titleGlow {
            0%, 100% {
                filter: drop-shadow(0 0 20px rgba(255, 193, 7, 0.5));
            }
            50% {
                filter: drop-shadow(0 0 40px rgba(255, 193, 7, 0.8));
            }
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
            gap: 0.75rem;
            background: rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(20px);
            padding: 0.85rem 1.5rem;
            border-radius: 50px;
            border: 1px solid rgba(255, 255, 255, 0.1);
            transition: all 0.3s ease;
        }

        .meta-item:hover {
            transform: translateY(-3px);
            background: rgba(255, 255, 255, 0.08);
            border-color: var(--secondary);
            box-shadow: 0 10px 30px rgba(255, 193, 7, 0.2);
        }

        .meta-item i {
            color: var(--secondary);
            font-size: 1.1rem;
        }

        .meta-item span {
            font-weight: 500;
            color: rgba(255, 255, 255, 0.8);
        }

        .author-badge {
            background: var(--gradient-gold);
            color: var(--dark);
            padding: 0.3rem 0.8rem;
            border-radius: 20px;
            font-size: 0.85rem;
            font-weight: 700;
            margin-left: 0.5rem;
        }

        /* ===== MEDIA GALLERY ===== */
        .media-gallery {
            margin-bottom: 4rem;
            animation: fadeInUp 0.6s ease 0.2s both;
        }

        .main-media-container {
            background: rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(20px);
            border-radius: 30px;
            overflow: hidden;
            border: 1px solid rgba(255, 255, 255, 0.1);
            box-shadow: 0 30px 60px rgba(0, 0, 0, 0.5);
            transition: all 0.4s ease;
        }

        .main-media-container:hover {
            border-color: rgba(255, 193, 7, 0.3);
            box-shadow: 0 40px 80px rgba(0, 0, 0, 0.6);
        }

        .main-media {
            width: 100%;
            height: 600px;
            position: relative;
            overflow: hidden;
            background: rgba(0, 0, 0, 0.3);
        }

        .main-media img,
        .main-media video {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.5s ease;
        }

        .main-media-container:hover .main-media img,
        .main-media-container:hover .main-media video {
            transform: scale(1.05);
        }

        .media-thumbnails {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(150px, 1fr));
            gap: 1rem;
            padding: 1.5rem;
            background: rgba(0, 0, 0, 0.2);
        }

        .thumbnail {
            height: 100px;
            border-radius: 15px;
            overflow: hidden;
            cursor: pointer;
            transition: all 0.3s ease;
            border: 3px solid transparent;
            position: relative;
        }

        .thumbnail:hover {
            transform: scale(1.1);
            border-color: var(--secondary);
            box-shadow: 0 10px 30px rgba(255, 193, 7, 0.4);
        }

        .thumbnail.active {
            border-color: var(--secondary);
            transform: scale(1.05);
            box-shadow: 0 10px 30px rgba(255, 193, 7, 0.4);
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
            background: rgba(0, 0, 0, 0.5);
            display: flex;
            align-items: center;
            justify-content: center;
            opacity: 0;
            transition: all 0.3s ease;
        }

        .thumbnail:hover .thumbnail-overlay {
            opacity: 1;
        }

        .thumbnail-overlay i {
            color: white;
            font-size: 1.5rem;
        }

        /* ===== CONTENT BODY ===== */
        .content-body {
            background: rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(20px);
            border-radius: 30px;
            padding: 4rem;
            margin-bottom: 4rem;
            border: 1px solid rgba(255, 255, 255, 0.1);
            box-shadow: 0 30px 60px rgba(0, 0, 0, 0.3);
            animation: fadeInUp 0.6s ease 0.4s both;
            transition: all 0.4s ease;
        }

        .content-body:hover {
            border-color: rgba(255, 193, 7, 0.2);
        }

        .content-text {
            font-size: 1.15rem;
            color: rgba(255, 255, 255, 0.9);
            line-height: 1.9;
            white-space: pre-wrap;
        }

        .content-actions {
            display: flex;
            gap: 1.5rem;
            justify-content: center;
            margin-top: 3rem;
            padding-top: 3rem;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            flex-wrap: wrap;
        }

        /* ===== RATING SECTION ===== */
        .rating-section {
            background: rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(20px);
            border-radius: 30px;
            padding: 4rem;
            margin-bottom: 4rem;
            border: 1px solid rgba(255, 255, 255, 0.1);
            box-shadow: 0 30px 60px rgba(0, 0, 0, 0.3);
            text-align: center;
            animation: fadeInUp 0.6s ease 0.6s both;
            transition: all 0.4s ease;
        }

        .rating-section:hover {
            border-color: rgba(255, 193, 7, 0.2);
        }

        .section-title {
            font-size: 2.5rem;
            font-weight: 900;
            background: var(--gradient-gold);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            margin-bottom: 2rem;
        }

        .average-rating {
            font-size: 5rem;
            font-weight: 900;
            background: var(--gradient-gold);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            margin-bottom: 1rem;
            filter: drop-shadow(0 0 20px rgba(255, 193, 7, 0.3));
        }

        .rating-stars {
            display: flex;
            justify-content: center;
            gap: 0.5rem;
            margin-bottom: 1.5rem;
        }

        .rating-stars .star {
            font-size: 2rem;
            color: var(--secondary);
            filter: drop-shadow(0 0 10px rgba(255, 193, 7, 0.5));
        }

        .rating-count {
            color: rgba(255, 255, 255, 0.6);
            font-size: 1.1rem;
            margin-bottom: 3rem;
        }

        .user-rating {
            margin-top: 3rem;
            padding-top: 3rem;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
        }

        .user-rating-title {
            font-size: 1.5rem;
            color: white;
            margin-bottom: 1.5rem;
            font-weight: 700;
        }

        .user-stars {
            display: flex;
            justify-content: center;
            gap: 1rem;
            margin-bottom: 1.5rem;
        }

        .user-stars .star {
            font-size: 2.5rem;
            color: rgba(255, 255, 255, 0.2);
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .user-stars .star:hover,
        .user-stars .star.hover {
            color: var(--secondary);
            transform: scale(1.2);
            filter: drop-shadow(0 0 15px rgba(255, 193, 7, 0.8));
        }

        .user-stars .star.active {
            color: var(--secondary);
            filter: drop-shadow(0 0 15px rgba(255, 193, 7, 0.6));
        }

        .rating-message {
            color: var(--secondary);
            font-size: 1.1rem;
            font-weight: 600;
            min-height: 1.5em;
        }

        /* ===== COMMENTS SECTION ===== */
        .comments-section {
            background: rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(20px);
            border-radius: 30px;
            padding: 4rem;
            border: 1px solid rgba(255, 255, 255, 0.1);
            box-shadow: 0 30px 60px rgba(0, 0, 0, 0.3);
            animation: fadeInUp 0.6s ease 0.8s both;
            transition: all 0.4s ease;
        }

        .comments-section:hover {
            border-color: rgba(255, 193, 7, 0.2);
        }

        .comments-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 3rem;
        }

        .comments-count {
            background: var(--gradient-primary);
            color: white;
            padding: 0.5rem 1.2rem;
            border-radius: 50px;
            font-size: 1rem;
            font-weight: 700;
            box-shadow: 0 5px 20px rgba(0, 137, 123, 0.4);
        }

        /* ===== COMMENT FORM ===== */
        .comment-form-card {
            background: rgba(0, 0, 0, 0.3);
            border-radius: 20px;
            padding: 2.5rem;
            margin-bottom: 3rem;
            border: 1px solid rgba(255, 255, 255, 0.1);
        }

        .comment-form-title {
            font-size: 1.5rem;
            color: white;
            margin-bottom: 2rem;
            display: flex;
            align-items: center;
            gap: 0.75rem;
            font-weight: 700;
        }

        .comment-form-title i {
            color: var(--secondary);
        }

        .form-group {
            margin-bottom: 2rem;
        }

        .form-control {
            width: 100%;
            padding: 1.2rem;
            border: 2px solid rgba(255, 255, 255, 0.1);
            border-radius: 15px;
            font-family: 'Poppins', sans-serif;
            font-size: 1rem;
            background: rgba(255, 255, 255, 0.05);
            color: white;
            transition: all 0.3s ease;
            resize: vertical;
            min-height: 150px;
        }

        .form-control:focus {
            outline: none;
            border-color: var(--secondary);
            background: rgba(255, 255, 255, 0.08);
            box-shadow: 0 0 0 3px rgba(255, 193, 7, 0.1);
        }

        .form-control::placeholder {
            color: rgba(255, 255, 255, 0.4);
        }

        .char-count {
            display: flex;
            justify-content: space-between;
            font-size: 0.95rem;
            color: rgba(255, 255, 255, 0.5);
            margin-top: 0.75rem;
        }

        .submit-comment:disabled {
            opacity: 0.5;
            cursor: not-allowed;
            transform: none !important;
        }

        /* ===== COMMENTS LIST ===== */
        .comments-list {
            max-height: 700px;
            overflow-y: auto;
            padding-right: 1rem;
        }

        .comments-list::-webkit-scrollbar {
            width: 8px;
        }

        .comments-list::-webkit-scrollbar-track {
            background: rgba(255, 255, 255, 0.05);
            border-radius: 4px;
        }

        .comments-list::-webkit-scrollbar-thumb {
            background: var(--gradient-gold);
            border-radius: 4px;
        }

        .comment-item {
            background: rgba(0, 0, 0, 0.3);
            border-radius: 20px;
            padding: 2rem;
            margin-bottom: 1.5rem;
            border: 1px solid rgba(255, 255, 255, 0.1);
            transition: all 0.3s ease;
        }

        .comment-item:hover {
            transform: translateY(-5px);
            border-color: var(--secondary);
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.4);
        }

        .comment-header {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            margin-bottom: 1.2rem;
        }

        .comment-author-info {
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .comment-author-avatar {
            width: 45px;
            height: 45px;
            border-radius: 50%;
            background: var(--gradient-accent);
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 700;
            font-size: 1.1rem;
        }

        .comment-author {
            font-weight: 600;
            color: white;
            font-size: 1.05rem;
        }

        .comment-author-badge {
            display: inline-block;
            background: var(--gradient-gold);
            color: var(--dark);
            padding: 0.25rem 0.75rem;
            border-radius: 15px;
            font-size: 0.8rem;
            font-weight: 700;
            margin-left: 0.5rem;
        }

        .comment-date {
            color: rgba(255, 255, 255, 0.5);
            font-size: 0.9rem;
            margin-top: 0.25rem;
        }

        .comment-rating {
            display: flex;
            gap: 0.3rem;
        }

        .comment-rating .star {
            font-size: 1rem;
            color: var(--secondary);
        }

        .comment-text {
            color: rgba(255, 255, 255, 0.8);
            line-height: 1.8;
            font-size: 1.05rem;
            white-space: pre-wrap;
        }

        /* ===== EMPTY STATE ===== */
        .empty-state {
            text-align: center;
            padding: 4rem 2rem;
            color: rgba(255, 255, 255, 0.6);
        }

        .empty-state i {
            font-size: 4rem;
            color: var(--secondary);
            margin-bottom: 1.5rem;
            opacity: 0.3;
        }

        .empty-state h4 {
            font-size: 1.8rem;
            color: white;
            margin-bottom: 1rem;
        }

        .empty-state p {
            font-size: 1.05rem;
            margin-bottom: 2rem;
        }

        /* ===== LOADER ===== */
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

        /* ===== RESPONSIVE ===== */
        @media (max-width: 768px) {
            .content-wrapper {
                padding-top: 100px;
            }

            .content-title {
                font-size: 2.5rem;
            }

            .main-media {
                height: 350px;
            }

            .media-thumbnails {
                grid-template-columns: repeat(auto-fill, minmax(100px, 1fr));
            }

            .thumbnail {
                height: 80px;
            }

            .content-body,
            .rating-section,
            .comments-section {
                padding: 2rem;
            }

            .content-actions {
                flex-direction: column;
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

            .average-rating {
                font-size: 3.5rem;
            }

            .user-stars .star {
                font-size: 2rem;
            }

            .comment-form-card {
                padding: 1.5rem;
            }

            .comment-item {
                padding: 1.5rem;
            }
        }

        @media (max-width: 576px) {
            .content-title {
                font-size: 2rem;
            }

            .main-media {
                height: 250px;
            }

            .section-title {
                font-size: 2rem;
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

            .comment-form-card {
                padding: 1rem;
            }

            .comment-item {
                padding: 1rem;
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

            .alert {
                padding: 1rem;
                width: 95%;
                text-align: center;
            }
        }
    </style>
</head>
<body>
    <!-- Animated Background -->
    <div class="animated-bg">
        <div class="floating-shapes">
            <div class="shape"></div>
            <div class="shape"></div>
        </div>
    </div>

    <!-- Alerts -->
    @if(session('success'))
        <div class="alert alert-success">
            <i class="fas fa-check-circle"></i>
            <span>{{ session('success') }}</span>
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-error">
            <i class="fas fa-exclamation-circle"></i>
            <span>{{ session('error') }}</span>
        </div>
    @endif

    <!-- Navbar -->
    <nav class="navbar" id="navbar">
        <div class="nav-container">
            <a href="{{ route('front.accueil') }}" class="logo">
                <img src="{{ URL::asset('adminlte/img/logoculture__2_-removebg-preview.png') }}" 
                     alt="BéninCulture" 
                     class="logo-img">
                <span class="logo-text">CultureBénin</span>
            </a>
            
            <div class="nav-links">
                <a href="{{ route('front.accueil') }}#gastronomie" class="nav-link">Gastronomie</a>
                <a href="{{ route('front.accueil') }}#contes" class="nav-link">Contes & Légendes</a>
            </div>
            
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
                        <form method="POST" action="{{ route('logout') }}" style="width: 100%;">
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
                    <i class="fas fa-sign-in-alt"></i>
                    <span>Se connecter</span>
                </a>
            @endauth
        </div>
    </nav>

    <!-- Content Wrapper -->
    <div class="content-wrapper">
        <div class="container">
            
            <!-- Header -->
            <div class="content-header">
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
                                <span class="author-badge">
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

            <!-- Media Gallery -->
            @if($contenu->media && $contenu->media->isNotEmpty())
            <div class="media-gallery">
                <div class="main-media-container">
                    @php
                        $firstMedia = $contenu->media->first();
                        $extension = strtolower(pathinfo($firstMedia->chemin, PATHINFO_EXTENSION));
                        $isImage = in_array($extension, ['jpg', 'jpeg', 'png', 'gif', 'bmp', 'webp', 'svg']);
                        
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
                                 loading="lazy">
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
                             onclick="changeMainMedia('{{ asset('storage/' . $thumbChemin) }}', '{{ $isThumbImage ? 'image' : 'video' }}', this)">
                            @if($isThumbImage)
                                <img src="{{ asset('storage/' . $thumbChemin) }}" 
                                     alt="Thumbnail {{ $index + 1 }}" 
                                     loading="lazy">
                            @else
                                <video muted playsinline>
                                    <source src="{{ asset('storage/' . $thumbChemin) }}" type="video/mp4">
                                </video>
                            @endif
                            <div class="thumbnail-overlay">
                                <i class="fas fa-search-plus"></i>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    @endif
                </div>
            </div>
            @else
            <div class="media-gallery">
                <div class="main-media-container">
                    <div class="empty-state">
                        <i class="fas fa-image"></i>
                        <h4>Aucun média disponible</h4>
                        <p>Ce contenu ne contient pas de médias.</p>
                    </div>
                </div>
            </div>
            @endif

            <!-- Content Body -->
            <div class="content-body">
                <div class="content-text">
                    {!! nl2br(e($contenu->texte)) !!}
                </div>

                <div class="content-actions">
                    <a href="{{ route('front.accueil') }}" class="btn btn-secondary">
                        <i class="fas fa-arrow-left"></i>
                        <span>Retour à l'accueil</span>
                    </a>

                    @auth
                        @if(Auth::id() === $contenu->auteur_id)
                            <a href="{{ route('contenus.edit', $contenu) }}" class="btn btn-outline">
                                <i class="fas fa-edit"></i>
                                <span>Modifier</span>
                            </a>
                            
                            <form action="{{ route('contenus.destroy', $contenu) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-outline" 
                                        onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce contenu ?')">
                                    <i class="fas fa-trash"></i>
                                    <span>Supprimer</span>
                                </button>
                            </form>
                        @endif
                    @endauth

                    <button class="btn btn-outline" onclick="shareContent()">
                        <i class="fas fa-share"></i>
                        <span>Partager</span>
                    </button>
                </div>
            </div>

            <!-- Rating Section -->
            <div class="rating-section">
                <h3 class="section-title">Notes et Appréciations</h3>
                
                @php
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

            <!-- Comments Section -->
            <div class="comments-section">
                <div class="comments-header">
                    <h3 class="section-title">Commentaires</h3>
                    <span class="comments-count" id="comments-count">
                        {{ $contenu->commentaires->count() }}
                    </span>
                </div>

                @auth
                <!-- Comment Form -->
                <div class="comment-form-card">
                    <h4 class="comment-form-title">
                        <i class="fas fa-comment-dots"></i>
                        Ajouter un commentaire
                    </h4>
                    
                    <form id="comment-form" action="{{ url('/commentaires') }}" method="POST">
                        @csrf
                        <input type="hidden" name="contenu_id" value="{{ $contenu->id }}">
                        <input type="hidden" name="note" id="user-note" value="0">
                        
                        <div class="form-group">
                            <textarea class="form-control" 
                                      id="user-comment" 
                                      name="commentaire" 
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
                            <span>Publier le commentaire</span>
                        </button>
                    </form>
                </div>
                @else
                <!-- Login Prompt -->
                <div class="empty-state">
                    <i class="fas fa-comment-slash"></i>
                    <h4>Connectez-vous pour commenter</h4>
                    <p>Participez à la discussion en vous connectant à votre compte.</p>
                    <a href="{{ route('login') }}" class="btn btn-primary">
                        <i class="fas fa-sign-in-alt"></i>
                        <span>Se connecter</span>
                    </a>
                </div>
                @endauth

                <!-- Comments List -->
                <div class="comments-list" id="comments-list">
                    @forelse($contenu->commentaires as $commentaire)
                    <div class="comment-item">
                        <div class="comment-header">
                            <div class="comment-author-info">
                                <div class="comment-author-avatar">
                                    @php
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
        const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
        
        // Navbar scroll
        window.addEventListener('scroll', function() {
            const navbar = document.getElementById('navbar');
            navbar.classList.toggle('scrolled', window.scrollY > 50);
        });

        // Change main media
        function changeMainMedia(mediaUrl, mediaType, element) {
            const mainMediaContainer = document.getElementById('main-media');
            
            document.querySelectorAll('.thumbnail').forEach(thumb => {
                thumb.classList.remove('active');
            });
            element.classList.add('active');
            
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
            }
        }

        // Rating stars
        document.addEventListener('DOMContentLoaded', function() {
            const userStars = document.querySelectorAll('#user-rating-stars .star');
            const userNoteInput = document.getElementById('user-note');
            let userRating = 0;
            
            if (userStars.length > 0) {
                userStars.forEach((star, index) => {
                    star.addEventListener('click', function() {
                        const rating = parseInt(this.getAttribute('data-rating'));
                        userRating = rating;
                        userNoteInput.value = rating;
                        
                        userStars.forEach((s, i) => {
                            s.classList.remove('fas', 'far', 'active');
                            if (i < rating) {
                                s.classList.add('fas', 'active');
                            } else {
                                s.classList.add('far');
                            }
                        });
                        
                        const messages = ['Mauvais', 'Passable', 'Bon', 'Très bon', 'Excellent'];
                        const messageEl = document.getElementById('rating-message');
                        if (messageEl) {
                            messageEl.textContent = messages[rating - 1];
                        }
                        
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
            
            // Character counter
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
            
            // Comment form submission
            const commentForm = document.getElementById('comment-form');
            if (commentForm) {
                commentForm.addEventListener('submit', async function(e) {
                    e.preventDefault();
                    
                    if (userRating === 0) {
                        showAlert('Veuillez donner une note avant de publier votre commentaire.', 'error');
                        return;
                    }
                    
                    if (commentTextarea && commentTextarea.value.length < 10) {
                        showAlert('Le commentaire doit contenir au moins 10 caractères.', 'error');
                        return;
                    }
                    
                    const formData = new FormData(this);
                    
                    // Ajouter le champ commentaire s'il n'est pas présent
                    if (!formData.has('commentaire') && commentTextarea) {
                        formData.append('commentaire', commentTextarea.value);
                    }
                    
                    if (submitBtn) {
                        submitBtn.disabled = true;
                        submitBtn.innerHTML = '<div class="loader"></div> <span>Publication...</span>';
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
                            addNewComment(data.commentaire);
                            updateRatingStats(data.noteMoyenne, data.nombreNotes);
                            
                            commentForm.reset();
                            userRating = 0;
                            userNoteInput.value = 0;
                            charCount.textContent = '0';
                            
                            userStars.forEach(star => {
                                star.classList.remove('fas', 'active');
                                star.classList.add('far');
                            });
                            
                            showAlert('Votre commentaire a été publié avec succès!', 'success');
                            
                            const messageEl = document.getElementById('rating-message');
                            if (messageEl) {
                                messageEl.textContent = '';
                            }
                        } else {
                            if (data.errors) {
                                showAlert(Object.values(data.errors)[0][0], 'error');
                            } else {
                                showAlert(data.message || 'Erreur lors de la publication.', 'error');
                            }
                        }
                    } catch (error) {
                        console.error('Error:', error);
                        showAlert('Une erreur est survenue. Veuillez réessayer.', 'error');
                    } finally {
                        if (submitBtn) {
                            submitBtn.disabled = true;
                            submitBtn.innerHTML = '<i class="fas fa-paper-plane"></i> <span>Publier le commentaire</span>';
                        }
                    }
                });
            }
            
            function addNewComment(commentData) {
    const commentsList = document.getElementById('comments-list');
    const commentsCount = document.getElementById('comments-count');
    
    const emptyState = commentsList.querySelector('.empty-state');
    if (emptyState) {
        emptyState.remove();
    }
    
    const commentDiv = document.createElement('div');
    commentDiv.className = 'comment-item';
    commentDiv.style.animation = 'fadeInUp 0.6s ease forwards';
    
    let starsHTML = '';
    for (let i = 1; i <= 5; i++) {
        starsHTML += i <= (commentData.note || 0) ? 
            '<i class="fas fa-star star"></i>' : 
            '<i class="far fa-star star"></i>';
    }
    
    const commentDate = new Date(commentData.date);
    const formattedDate = commentDate.toLocaleDateString('fr-FR', { 
        day: '2-digit', 
        month: '2-digit', 
        year: 'numeric',
        hour: '2-digit',
        minute: '2-digit'
    });
    
    const authorName = commentData.utilisateur?.prenom || commentData.utilisateur?.nom || 'Utilisateur';
    const authorLastName = commentData.utilisateur?.nom || '';
    const initials = (authorName.charAt(0) + (authorLastName.charAt(0) || '')).toUpperCase();
    
    const isAuthor = commentData.user_id === {{ $contenu->auteur_id }};
    const authorBadge = isAuthor ? 
        '<span class="comment-author-badge"><i class="fas fa-crown"></i> Auteur</span>' : 
        '';
    
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
        <div class="comment-text">${escapeHtml(commentData.texte || '')}</div> <!-- CORRIGÉ : utiliser texte -->
    `;
    
    const firstComment = commentsList.firstElementChild;
    if (firstComment) {
        commentsList.insertBefore(commentDiv, firstComment);
    } else {
        commentsList.appendChild(commentDiv);
    }
    
    const currentCount = parseInt(commentsCount.textContent) || 0;
    commentsCount.textContent = currentCount + 1;
}
            
            function updateRatingStats(averageRating, count) {
                const avgRatingEl = document.querySelector('.average-rating');
                if (avgRatingEl) {
                    avgRatingEl.textContent = (averageRating || 0).toFixed(1);
                }
                
                const ratingCountEl = document.querySelector('.rating-count');
                if (ratingCountEl) {
                    ratingCountEl.textContent = `Basé sur ${count || 0} évaluation${count > 1 ? 's' : ''}`;
                }
                
                updateAverageStars(averageRating || 0);
            }
            
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
            
            function escapeHtml(text) {
                const div = document.createElement('div');
                div.textContent = text;
                return div.innerHTML;
            }
            
            function showAlert(message, type) {
                document.querySelectorAll('.alert').forEach(alert => {
                    alert.remove();
                });
                
                const alertDiv = document.createElement('div');
                alertDiv.className = `alert alert-${type}`;
                alertDiv.innerHTML = `<i class="fas fa-${type === 'success' ? 'check' : 'exclamation'}-circle"></i><span>${message}</span>`;
                
                document.body.appendChild(alertDiv);
                
                setTimeout(() => {
                    alertDiv.style.transition = 'opacity 0.5s ease';
                    alertDiv.style.opacity = '0';
                    setTimeout(() => alertDiv.remove(), 500);
                }, 5000);
            }
        });
        
        // Share function
        function shareContent() {
            const shareData = {
                title: '{{ $contenu->titre }}',
                text: 'Découvrez ce contenu sur CultureBénin',
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
        
        // Auto-remove alerts
        setTimeout(() => {
            document.querySelectorAll('.alert').forEach(alert => {
                alert.remove();
            });
        }, 5000);
    </script>
</body>
</html>