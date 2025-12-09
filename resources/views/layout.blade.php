<!doctype html>
<html lang="fr">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>@yield('title', 'Culture Béninoise | Admin')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes" />
    <meta name="color-scheme" content="light dark" />
    <meta name="theme-color" content="#008751" media="(prefers-color-scheme: light)" />
    <meta name="theme-color" content="#1a1a1a" media="(prefers-color-scheme: dark)" />
    <meta name="title" content="Culture Béninoise | Admin" />
    <meta name="author" content="Culture Béninoise" />
    <meta
      name="description"
      content="Plateforme d'administration pour la valorisation de la culture béninoise"
    />
    <meta
      name="keywords"
      content="bénin, culture, administration, patrimoine"
    />
    <meta name="supported-color-schemes" content="light dark" />
    <link rel="preload" href="{{URL::asset('adminlte/css/adminlte.css')}}" />
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/@fontsource/source-sans-3@5.0.12/index.css"
      integrity="sha256-tXJfXfp6Ewt1ilPzLDtQnJV4hclT9XuaZUKyUvmyr+Q="
      crossorigin="anonymous"
      media="print"
      onload="this.media='all'"
    />
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.11.0/styles/overlayscrollbars.min.css"
      crossorigin="anonymous"
    />
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css"
      crossorigin="anonymous"
    />
    <link rel="stylesheet" href="{{URL::asset('adminlte/css/adminlte.css')}}" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/apexcharts@3.37.1/dist/apexcharts.css" />
    <link rel="stylesheet" href="{{ asset('adminlte/css/dataTables.bootstrap5.min.css') }}">

    <style>
        :root {
            --primary-color: #008751;
            --secondary-color: #f8f9fa;
            --accent-color: #e9ecef;
            --text-color: #333;
            --text-light: #6c757d;
            --border-color: #dee2e6;
            --shadow: 0 2px 10px rgba(0, 0, 0, 0.08);
        }
        
        /* LOGO DANS LE HEADER - REDIMENSIONNÉ */
        .navbar-logo {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            margin-right: 1rem;
        }
        
        .navbar-logo img {
            max-height: 28px;
            width: auto;
            object-fit: contain;
        }
        
        .navbar-logo-text {
            color: var(--primary-color) !important;
            font-weight: 600;
            font-size: 1rem;
            margin: 0;
        }
        
        /* LOGO RÉDUIT dans sidebar */
        .sidebar-brand {
            padding: 0.75rem 1rem;
            border-bottom: 1px solid var(--border-color);
            text-align: center;
        }
        
        .brand-link {
            display: flex;
            flex-direction: column;
            align-items: center;
            text-decoration: none;
            gap: 0.4rem;
        }
        
        .logo {
            display: flex;
            justify-content: center;
            align-items: center;
        }
        
        .logo img {
            max-height: 30px;
            width: auto;
            object-fit: contain;
        }
        
        .brand-text {
            color: var(--primary-color) !important;
            font-weight: 600;
            font-size: 0.9rem;
            margin: 0;
            line-height: 1.2;
        }

        /* AVATARS PAR DÉFAUT */
        .user-image-default {
            width: 32px;
            height: 32px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            color: white;
            font-size: 1rem;
            background: var(--accent-color);
        }

        .user-image-default i {
            font-size: 1.2rem;
        }

        .user-header .user-image-default {
            width: 90px;
            height: 90px;
            font-size: 2.5rem;
        }

        .user-header .user-image-default i {
            font-size: 3rem;
        }
        
        /* Styles pour modérateur (sans sidebar) */
        .moderator-layout .app-sidebar,
        .moderator-layout .app-footer {
            display: none;
        }
        
        .moderator-layout .app-main {
            margin-left: 0;
        }
        
        .moderator-layout .app-content-header {
            margin-top: 0;
        }
        
        /* Styles existants conservés */
        .app-header.navbar {
            background-color: white !important;
            border-bottom: 1px solid var(--border-color);
            box-shadow: var(--shadow);
        }
        
        .navbar-nav .nav-link {
            color: var(--text-color) !important;
            font-weight: 500;
            padding: 0.5rem 1rem;
            border-radius: 0.375rem;
            margin: 0 0.125rem;
            transition: all 0.3s ease;
        }
        
        .navbar-nav .nav-link:hover {
            background-color: var(--accent-color);
        }
        
        .navbar-nav .dropdown-menu {
            border: 1px solid var(--border-color);
            box-shadow: var(--shadow);
            border-radius: 0.5rem;
        }
        
        .dropdown-item {
            padding: 0.75rem 1rem;
            transition: all 0.3s ease;
        }
        
        .dropdown-item:hover {
            background-color: var(--primary-color);
            color: white;
        }
        
        .app-sidebar {
            background-color: white !important;
            border-right: 1px solid var(--border-color);
            box-shadow: var(--shadow);
        }
        
        .nav-link.active {
            background-color: var(--primary-color) !important;
            color: white !important;
        }
        
        .nav-link:hover:not(.active) {
            background-color: var(--accent-color);
        }
        
        .navbar-badge {
            background-color: var(--primary-color) !important;
            color: white !important;
            font-weight: bold;
        }
        
        .user-header {
            background-color: var(--primary-color) !important;
        }
        
        .app-content-header {
            background: white;
            border-bottom: 1px solid var(--border-color);
            padding: 1.5rem 0;
        }
        
        .app-content-header h1 {
            color: var(--primary-color);
            font-weight: 600;
            margin: 0;
        }
        
        .card {
            border: 1px solid var(--border-color);
            border-radius: 0.5rem;
            transition: all 0.3s ease;
            box-shadow: none;
        }
        
        .card:hover {
            box-shadow: var(--shadow);
        }
        
        .card-header {
            background: white;
            color: var(--text-color);
            border-bottom: 1px solid var(--border-color);
            font-weight: 600;
        }
        
        .table {
            border-radius: 0.5rem;
            overflow: hidden;
        }
        
        .table thead {
            background: var(--accent-color);
            color: var(--text-color);
        }
        
        .table th {
            border: none;
            font-weight: 600;
            padding: 1rem;
        }
        
        .table td {
            padding: 0.75rem 1rem;
            vertical-align: middle;
        }
        
        .btn-primary {
            background-color: var(--primary-color);
            border: none;
            border-radius: 0.375rem;
            font-weight: 500;
            transition: all 0.3s ease;
        }
        
        .btn-primary:hover {
            background-color: #007a45;
        }
        
        .app-footer {
            background: white;
            color: var(--text-light);
            border-top: 1px solid var(--border-color);
            margin-top: 2rem;
        }
        
        .badge.bg-primary {
            background-color: var(--primary-color) !important;
        }
        
        .small-box {
            border-radius: 0.5rem;
            overflow: hidden;
            transition: all 0.3s ease;
            border: 1px solid var(--border-color);
        }
        
        .small-box:hover {
            box-shadow: var(--shadow);
        }
        
        .small-box .inner h3 {
            font-size: 2.5rem;
            font-weight: 700;
            margin: 0 0 10px 0;
        }
        
        .small-box .inner p {
            font-size: 1.1rem;
            font-weight: 600;
        }
        
        .small-box-icon {
            position: absolute;
            top: 15px;
            right: 15px;
            font-size: 70px;
            opacity: 0.3;
            transition: all 0.3s ease;
        }
        
        .small-box:hover .small-box-icon {
            opacity: 0.4;
        }
        
        .user-menu .dropdown-toggle {
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }
        
        .user-image {
            width: 32px;
            height: 32px;
            object-fit: cover;
        }
        
        @media (max-width: 768px) {
            .navbar-nav .nav-link {
                padding: 0.5rem 0.75rem;
                font-size: 0.9rem;
            }
            
            .brand-text {
                font-size: 0.8rem;
            }
            
            .small-box .inner h3 {
                font-size: 2rem;
            }
            
            .logo img {
                max-height: 25px;
            }
            
            .sidebar-brand {
                padding: 0.5rem 0.75rem;
            }
            
            .navbar-logo-text {
                display: none;
            }
            
            .navbar-logo img {
                max-height: 24px;
            }
        }
    </style>
    @stack('styles')
  </head>

  <body class="layout-fixed sidebar-expand-lg bg-body-tertiary @if(Auth::user()->role_id == 2) moderator-layout @endif">
    <div class="app-wrapper">
      <!-- Header - Visible pour tous mais sans menu "Gestion" pour modérateur -->
      <nav class="app-header navbar navbar-expand bg-body">
        <div class="container-fluid">
          <!-- Logo redimensionné -->
          <div class="navbar-logo">
            <img src="{{URL::asset('adminlte/img/logoculture__2_-removebg-preview.png')}}" alt="BéninCulture Logo">
            <span class="navbar-logo-text">BéninCulture</span>
          </div>
          
          <ul class="navbar-nav">
            @if(Auth::user()->role_id != 2)
            <li class="nav-item">
              <a class="nav-link" data-lte-toggle="sidebar" href="#" role="button">
                <i class="bi bi-list"></i>
              </a>
            </li>
            
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">
                <i class="bi bi-gear-fill me-1"></i>Gestion
              </a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="{{ route('admin.langues.index') }}"><i class="bi bi-translate me-2"></i>Langues</a></li>
                <li><a class="dropdown-item" href="{{ route('admin.contenus.index') }}"><i class="bi bi-file-text me-2"></i>Contenus</a></li>
                <li><a class="dropdown-item" href="{{ route('admin.roles.index') }}"><i class="bi bi-shield-check me-2"></i>Rôles</a></li>
                <li><a class="dropdown-item" href="{{ route('admin.utilisateurs.index') }}"><i class="bi bi-people me-2"></i>Utilisateurs</a></li>
                <li><a class="dropdown-item" href="{{ route('admin.medias.index') }}"><i class="bi bi-images me-2"></i>Médias</a></li>
                <li><a class="dropdown-item" href="{{ route('admin.typecontenus.index') }}"><i class="bi bi-tags me-2"></i>Type Contenus</a></li>
                <li><a class="dropdown-item" href="{{ route('admin.typemedias.index') }}"><i class="bi bi-collection me-2"></i>Types Médias</a></li>
                <li><a class="dropdown-item" href="{{ route('admin.regions.index') }}"><i class="bi bi-geo-alt me-2"></i>Régions</a></li>
                <li><a class="dropdown-item" href="{{ route('admin.commentaires.index') }}"><i class="bi bi-chat-dots me-2"></i>Commentaires</a></li>
              </ul>
            </li>
            @else
            <!-- Pour modérateur : juste le bouton menu caché -->
            <li class="nav-item" style="visibility: hidden;">
              <a class="nav-link" data-lte-toggle="sidebar" href="#" role="button">
                <i class="bi bi-list"></i>
              </a>
            </li>
            @endif
          </ul>
          
          <ul class="navbar-nav ms-auto">
            
            <li class="nav-item">
              <a class="nav-link" href="#" data-lte-toggle="fullscreen">
                <i data-lte-icon="maximize" class="bi bi-arrows-fullscreen"></i>
                <i data-lte-icon="minimize" class="bi bi-fullscreen-exit" style="display: none"></i>
              </a>
            </li>
            
            <li class="nav-item dropdown user-menu">
              <a href="#" class="nav-link dropdown-toggle d-flex align-items-center" data-bs-toggle="dropdown">
                <!-- Photo de profil dynamique -->
                @php
                    $user = Auth::user();
                    $sexe = strtolower($user->sexe ?? '');
                    
                    // Déterminer l'icône selon le sexe
                    if ($sexe === 'homme') {
                        $avatarIcon = 'bi-person';
                    } elseif ($sexe === 'femme') {
                        $avatarIcon = 'bi-person-fill';
                    } else {
                        $avatarIcon = 'bi-person';
                    }
                    
                    $hasPhoto = false;
                    $photoUrl = null;
                    
                    if ($user->photo && file_exists(storage_path('app/public/' . $user->photo))) {
                        $hasPhoto = true;
                        $photoUrl = asset('storage/' . $user->photo);
                    }
                @endphp

                @if($hasPhoto)
                  <img
                    src="{{ $photoUrl }}"
                    class="user-image rounded-circle shadow me-2"
                    alt="Photo de profil"
                    onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';"
                  />
                  <div class="user-image-default shadow me-2" style="display: none;">
                    <i class="{{ $avatarIcon }}"></i>
                  </div>
                @else
                  <div class="user-image-default shadow me-2">
                    <i class="{{ $avatarIcon }}"></i>
                  </div>
                @endif
                <span class="d-none d-md-inline">{{ $user->prenom ?? 'Utilisateur' }} {{ $user->nom ?? '' }}</span>
              </a>
              <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-end">
                <li class="user-header text-bg-primary">
                  <!-- Photo dans le dropdown -->
                  @if($hasPhoto)
                    <img
                      src="{{ $photoUrl }}"
                      class="rounded-circle shadow"
                      alt="Photo de profil"
                      onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';"
                    />
                    <div class="user-image-default shadow" style="display: none;">
                      <i class="{{ $avatarIcon }}"></i>
                    </div>
                  @else
                    <div class="user-image-default shadow">
                      <i class="{{ $avatarIcon }}"></i>
                    </div>
                  @endif
                  <p>
                    {{ $user->prenom ?? 'Utilisateur' }} {{ $user->nom ?? '' }}
                    <small>{{ $user->role->nom ?? 'Administrateur' }}</small>
                  </p>
                </li>
                <li class="user-body">
                  <div class="row">
                    <div class="col-12 text-center">
                      <a href="{{ route('profile.edit') }}">Mon Profil</a>
                    </div>
                  </div>
                </li>
                <li class="user-footer">
                  <a href="{{ route('profile.edit') }}" class="btn btn-default btn-flat">Modifier le profil</a>
                  <form method="POST" action="{{ route('logout') }}" class="d-inline">
                    @csrf
                    <button type="submit" class="btn btn-default btn-flat float-end">Déconnexion</button>
                  </form>
                </li>
              </ul>
            </li>
          </ul>
        </div>
      </nav>
      
      <!-- Sidebar - Caché pour modérateur -->
      @if(Auth::user()->role_id != 2)
      <aside class="app-sidebar bg-body-secondary shadow" data-bs-theme="light">
        <div class="sidebar-brand">
          <a href="{{ route('dashboard-custom') }}" class="brand-link">
            <div class="logo">
              <img src="{{URL::asset('adminlte/img/logoculture__2_-removebg-preview.png')}}" alt="BéninCulture Logo">
            </div>
            <span class="brand-text">BéninCulture</span>
          </a>
        </div>
        
        <div class="sidebar-wrapper">
          <nav class="mt-2">
            <ul
              class="nav sidebar-menu flex-column"
              data-lte-toggle="treeview"
              role="navigation"
              aria-label="Main navigation"
              data-accordion="false"
              id="navigation"
            >
              
              <li class="nav-header text-uppercase small fw-bold text-muted mt-3">GESTION DU CONTENU</li>
              
              <li class="nav-item">
                <a href="{{ route('admin.contenus.index') }}" class="nav-link">
                  <i class="nav-icon bi bi-file-text"></i>
                  <p>Contenus</p>
                </a>
              </li>
              
              <li class="nav-item">
                <a href="{{ route('admin.medias.index') }}" class="nav-link">
                  <i class="nav-icon bi bi-images"></i>
                  <p>Médias</p>
                </a>
              </li>
              
              <li class="nav-item">
                <a href="{{ route('admin.commentaires.index') }}" class="nav-link">
                  <i class="nav-icon bi bi-chat-dots"></i>
                  <p>Commentaires</p>
                </a>
              </li>
              
              <li class="nav-header text-uppercase small fw-bold text-muted mt-3">CATÉGORIES</li>
              
              <li class="nav-item">
                <a href="{{ route('admin.typecontenus.index') }}" class="nav-link">
                  <i class="nav-icon bi bi-tags"></i>
                  <p>Types de Contenus</p>
                </a>
              </li>
              
              <li class="nav-item">
                <a href="{{ route('admin.typemedias.index') }}" class="nav-link">
                  <i class="nav-icon bi bi-collection"></i>
                  <p>Types de Médias</p>
                </a>
              </li>
              
              <li class="nav-item">
                <a href="{{ route('admin.langues.index') }}" class="nav-link">
                  <i class="nav-icon bi bi-translate"></i>
                  <p>Langues</p>
                </a>
              </li>
              
              <li class="nav-item">
                <a href="{{ route('admin.regions.index') }}" class="nav-link">
                  <i class="nav-icon bi bi-geo-alt"></i>
                  <p>Régions</p>
                </a>
              </li>
              
              <li class="nav-header text-uppercase small fw-bold text-muted mt-3">UTILISATEURS</li>
              
              <li class="nav-item">
                <a href="{{ route('admin.utilisateurs.index') }}" class="nav-link">
                  <i class="nav-icon bi bi-people"></i>
                  <p>Utilisateurs</p>
                </a>
              </li>
              
              <li class="nav-item">
                <a href="{{ route('admin.roles.index') }}" class="nav-link">
                  <i class="nav-icon bi bi-shield-check"></i>
                  <p>Rôles</p>
                </a>
              </li>
            </ul>
          </nav>
        </div>
      </aside>
      @endif
      
      <!-- Main Content -->
      <main class="app-main">
        <div class="app-content-header">
          <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-6">
                <h1>@yield('page_title', 'Tableau de Bord')</h1>
              </div>
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-end">
                  @if(Auth::user()->role_id != 2)
                  <li class="breadcrumb-item"><a href="{{ route('dashboard-custom') }}">Accueil</a></li>
                  @endif
                  <li class="breadcrumb-item active">@yield('breadcrumb', 'Tableau de Bord')</li>
                </ol>
              </div>
            </div>
          </div>
        </div>
        
        <div class="app-content">
          <div class="container-fluid">
            @if(Request::is('/') && Auth::user()->role_id != 2)
            <!-- Dashboard - Caché pour modérateur -->
            <div class="row">
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-primary text-white">
                      <div class="inner">
                        <h3>{{ $stats['total_contenus'] ?? 0 }}</h3>
                        <p>Contenus Culturels</p>
                      </div>
                      <svg class="small-box-icon" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                        <path d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z"></path>
                      </svg>
                      <a href="{{ route('admin.contenus.index') }}" class="small-box-footer link-light link-underline-opacity-0 link-underline-opacity-50-hover">
                        Voir détails <i class="bi bi-link-45deg"></i>
                      </a>
                    </div>
                </div>
                
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-success text-white">
                      <div class="inner">
                        <h3>{{ $stats['total_utilisateurs'] ?? 0 }}</h3>
                        <p>Utilisateurs</p>
                      </div>
                      <svg class="small-box-icon" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                        <path d="M4.5 6.375a4.125 4.125 0 118.25 0 4.125 4.125 0 01-8.25 0zM14.25 8.625a3.375 3.375 0 116.75 0 3.375 3.375 0 01-6.75 0zM1.5 19.125a7.125 7.125 0 0114.25 0v.003l-.001.119a.75.75 0 01-.363.63 13.067 13.067 0 01-6.761 1.873c-2.472 0-4.786-.684-6.76-1.873a.75.75 0 01-.364-.63l-.001-.122zM17.25 19.128l-.001.144a2.25 2.25 0 01-.233.96 10.088 10.088 0 005.06-1.01.75.75 0 00.42-.643 4.875 4.875 0 00-6.957-4.611 8.586 8.586 0 011.71 5.157v.003z"></path>
                      </svg>
                      <a href="{{ route('admin.utilisateurs.index') }}" class="small-box-footer link-light link-underline-opacity-0 link-underline-opacity-50-hover">
                        Voir détails <i class="bi bi-link-45deg"></i>
                      </a>
                    </div>
                </div>
                
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-warning text-dark">
                      <div class="inner">
                        <h3>{{ $stats['total_commentaires'] ?? 0 }}</h3>
                        <p>Commentaires</p>
                      </div>
                      <svg class="small-box-icon" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                        <path d="M4.913 2.658c2.075-.27 4.19-.408 6.337-.408 2.147 0 4.262.139 6.337.408 1.922.25 3.291 1.861 3.405 3.727a4.403 4.403 0 00-1.032-.211 50.89 50.89 0 00-8.42 0c-2.358.196-4.04 2.19-4.04 4.434v4.286a4.47 4.47 0 002.433 3.984L7.28 21.53A.75.75 0 016 21v-4.03a48.527 48.527 0 01-1.087-.128C2.905 16.58 1.5 14.833 1.5 12.862V6.638c0-1.97 1.405-3.718 3.413-3.979z"></path>
                        <path d="M15.75 7.5c-1.376 0-2.739.057-4.086.169C10.124 7.797 9 9.103 9 10.609v4.285c0 1.507 1.128 2.814 2.67 2.94 1.243.102 2.5.157 3.768.165l2.782 2.781a.75.75 0 001.28-.53v-2.39l.33-.026c1.542-.125 2.67-1.433 2.67-2.94v-4.286c0-1.505-1.125-2.811-2.664-2.94A49.392 49.392 0 0015.75 7.5z"></path>
                      </svg>
                      <a href="{{ route('admin.commentaires.index') }}" class="small-box-footer link-dark link-underline-opacity-0 link-underline-opacity-50-hover">
                        Voir détails <i class="bi bi-link-45deg"></i>
                      </a>
                    </div>
                </div>
                
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-danger text-white">
                      <div class="inner">
                        <h3>{{ $stats['total_medias'] ?? 0 }}</h3>
                        <p>Médias</p>
                      </div>
                      <svg class="small-box-icon" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                        <path d="M4.5 4.5a3 3 0 00-3 3v9a3 3 0 003 3h8.25a3 3 0 003-3v-9a3 3 0 00-3-3H4.5zM19.94 18.75l-2.69-2.69V7.94l2.69-2.69c.944-.945 2.56-.276 2.56 1.06v11.38c0 1.336-1.616 2.005-2.56 1.06z"></path>
                      </svg>
                      <a href="{{ route('admin.medias.index') }}" class="small-box-footer link-light link-underline-opacity-0 link-underline-opacity-50-hover">
                        Voir détails <i class="bi bi-link-45deg"></i>
                      </a>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-7 connectedSortable">
                    <div class="card mb-4">
                        <div class="card-header">
                            <h3 class="card-title">Statistiques des Contenus par Type</h3>
                        </div>
                        <div class="card-body">
                            <div id="contenus-chart"></div>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-5 connectedSortable">
                    <div class="card border-primary mb-4">
                        <div class="card-header">
                            <h3 class="card-title">Répartition par Région</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-primary btn-sm" data-lte-toggle="card-collapse">
                                    <i data-lte-icon="expand" class="bi bi-plus-lg"></i>
                                    <i data-lte-icon="collapse" class="bi bi-dash-lg"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div id="regions-chart" style="height: 250px"></div>
                        </div>
                    </div>
                </div>
            </div>
            @else
            @yield('content')
            @endif
          </div>
        </div>
      </main>
      
      <!-- Footer - Caché pour modérateur -->
      @if(Auth::user()->role_id != 2)
      <footer class="app-footer">
        <div class="float-end d-none d-sm-inline">Plateforme Culture Béninoise</div>
        <strong>
          Copyright &copy; 2024-2025&nbsp;
          <a href="#" class="text-decoration-none">Culture Béninoise</a>.
        </strong>
        Tous droits réservés.
      </footer>
      @endif
    </div>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="{{ asset('adminlte/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('adminlte/js/dataTables.bootstrap5.min.js') }}"></script>
    
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        $('.datatable').DataTable({
            language: {
                url: "{{ asset('adminlte/json/fr-FR.json') }}"
            },
            pageLength: 25,
            responsive: true
        });
    });
    </script>

    <script
      src="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.11.0/browser/overlayscrollbars.browser.es6.min.js"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.min.js"
      crossorigin="anonymous"
    ></script>
    <script src="{{URL::asset('adminlte/js/adminlte.js')}}"></script>

    @if(Request::is('/') && Auth::user()->role_id != 2)
    <script src="https://cdn.jsdelivr.net/npm/apexcharts@3.37.1/dist/apexcharts.min.js"></script>
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        const contenusChartOptions = {
            series: [{
                name: 'Nombre de contenus',
                data: @json($stats['contenus_par_type'] ?? [])
            }],
            chart: {
                height: 300,
                type: 'bar',
                toolbar: {
                    show: false
                }
            },
            colors: ['#008751'],
            plotOptions: {
                bar: {
                    borderRadius: 4,
                    horizontal: false,
                }
            },
            dataLabels: {
                enabled: false
            },
            xaxis: {
                categories: @json($stats['types_contenus'] ?? [])
            },
            tooltip: {
                y: {
                    formatter: function (val) {
                        return val + " contenus"
                    }
                }
            }
        };

        const contenusChart = new ApexCharts(
            document.querySelector('#contenus-chart'),
            contenusChartOptions
        );
        contenusChart.render();

        const regionsChartOptions = {
            series: @json($stats['contenus_par_region'] ?? []),
            chart: {
                height: 250,
                type: 'donut',
            },
            labels: @json($stats['regions'] ?? []),
            colors: ['#008751', '#6c757d', '#17a2b8', '#fd7e14', '#6f42c1', '#20c997'],
            legend: {
                position: 'bottom'
            },
            responsive: [{
                breakpoint: 480,
                options: {
                    chart: {
                        width: 200
                    },
                    legend: {
                        position: 'bottom'
                    }
                }
            }]
        };

        const regionsChart = new ApexCharts(
            document.querySelector('#regions-chart'),
            regionsChartOptions
        );
        regionsChart.render();
    });
    </script>
    @endif
    @stack('scripts')
  </body>
</html>