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
    <meta name="description" content="Plateforme d'administration pour la valorisation de la culture béninoise" />
    <meta name="keywords" content="bénin, culture, administration, patrimoine" />
    <meta name="supported-color-schemes" content="light dark" />
    <link rel="preload" href="{{URL::asset('adminlte/css/adminlte.css')}}" />
    
    <!-- Fonts -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fontsource/source-sans-3@5.0.12/index.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.11.0/styles/overlayscrollbars.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css" />
    
    <!-- Styles -->
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
        
        /* Styles pour les logos */
        .navbar-logo {
            display: flex;
            align-items: center;
            margin-right: 1rem;
        }

        .navbar-logo img {
            max-height: 35px;
            width: auto;
            object-fit: contain;
        }

        .navbar-logo-text {
            color: var(--primary-color) !important;
            font-weight: 600;
            font-size: 1.1rem;
            margin-left: 0.5rem;
        }

        .sidebar-brand .brand-link {
            display: flex;
            flex-direction: column;
            align-items: center;
            text-decoration: none;
            gap: 0.5rem;
            padding: 0.5rem 0;
        }

        .sidebar-brand img {
            max-height: 40px;
            width: auto;
            object-fit: contain;
        }

        .sidebar-brand .brand-text {
            color: var(--primary-color) !important;
            font-weight: 600;
            font-size: 1rem;
            text-align: center;
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
        
        .sidebar-brand {
            background: white;
            padding: 1rem;
            border-bottom: 1px solid var(--border-color);
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
        
        /* Responsive */
        @media (max-width: 768px) {
            .navbar-nav .nav-link {
                padding: 0.5rem 0.75rem;
                font-size: 0.9rem;
            }
            
            .navbar-logo img {
                max-height: 30px;
            }
            
            .navbar-logo-text {
                font-size: 1rem;
            }
            
            .sidebar-brand img {
                max-height: 35px;
            }
            
            .sidebar-brand .brand-text {
                font-size: 0.9rem;
            }
            
            .small-box .inner h3 {
                font-size: 2rem;
            }
        }

        @media (max-width: 576px) {
            .navbar-logo-text {
                display: none; /* Cache le texte sur très petits écrans */
            }
        }
    </style>
    @stack('styles')
  </head>

  <body class="layout-fixed sidebar-expand-lg bg-body-tertiary">
    <div class="app-wrapper">
      <!-- Header -->
      <nav class="app-header navbar navbar-expand bg-body">
        <div class="container-fluid">
          <!-- Logo dans le header -->
          <div class="navbar-logo">
            <img src="{{URL::asset('adminlte/img/logoculture__2_-removebg-preview.png')}}" alt="BéninCulture Logo">
            <span class="navbar-logo-text">BéninCulture</span>
          </div>
          
          <ul class="navbar-nav">
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
      
      <!-- Sidebar -->
      <aside class="app-sidebar bg-body-secondary shadow" data-bs-theme="light">
        <div class="sidebar-brand">
          <a href="{{ route('dashboard') }}" class="brand-link">
            <img src="{{URL::asset('adminlte/img/logoculture__2_-removebg-preview.png')}}" alt="BéninCulture Logo">
            <span class="brand-text">BéninCulture</span>
          </a>
        </div>
        
        <div class="sidebar-wrapper">
          <nav class="mt-2">
            <ul class="nav sidebar-menu flex-column" data-lte-toggle="treeview" role="navigation" data-accordion="false">
              <li class="nav-header text-uppercase small fw-bold text-muted mt-3">GESTION DU CONTENU</li>
              <li class="nav-item"><a href="{{ route('admin.contenus.index') }}" class="nav-link"><i class="nav-icon bi bi-file-text"></i><p>Contenus</p></a></li>
              <li class="nav-item"><a href="{{ route('admin.medias.index') }}" class="nav-link"><i class="nav-icon bi bi-images"></i><p>Médias</p></a></li>
              <li class="nav-item"><a href="{{ route('admin.commentaires.index') }}" class="nav-link"><i class="nav-icon bi bi-chat-dots"></i><p>Commentaires</p></a></li>
              
              <li class="nav-header text-uppercase small fw-bold text-muted mt-3">CATÉGORIES</li>
              <li class="nav-item"><a href="{{ route('admin.typecontenus.index') }}" class="nav-link"><i class="nav-icon bi bi-tags"></i><p>Types de Contenus</p></a></li>
              <li class="nav-item"><a href="{{ route('admin.typemedias.index') }}" class="nav-link"><i class="nav-icon bi bi-collection"></i><p>Types de Médias</p></a></li>
              <li class="nav-item"><a href="{{ route('admin.langues.index') }}" class="nav-link"><i class="nav-icon bi bi-translate"></i><p>Langues</p></a></li>
              <li class="nav-item"><a href="{{ route('admin.regions.index') }}" class="nav-link"><i class="nav-icon bi bi-geo-alt"></i><p>Régions</p></a></li>
              
              <li class="nav-header text-uppercase small fw-bold text-muted mt-3">UTILISATEURS</li>
              <li class="nav-item"><a href="{{ route('admin.utilisateurs.index') }}" class="nav-link"><i class="nav-icon bi bi-people"></i><p>Utilisateurs</p></a></li>
              <li class="nav-item"><a href="{{ route('admin.roles.index') }}" class="nav-link"><i class="nav-icon bi bi-shield-check"></i><p>Rôles</p></a></li>
            </ul>
          </nav>
        </div>
      </aside>
      
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
                  <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Accueil</a></li>
                  <li class="breadcrumb-item active">@yield('breadcrumb', 'Tableau de Bord')</li>
                </ol>
              </div>
            </div>
          </div>
        </div>
        
        <div class="app-content">
          <div class="container-fluid">
            @yield('content')
          </div>
        </div>
      </main>
      
      <!-- Footer -->
      <footer class="app-footer">
        <div class="float-end d-none d-sm-inline">Plateforme Culture Béninoise</div>
        <strong>Copyright &copy; 2024-2025 <a href="#" class="text-decoration-none">Culture Béninoise</a>.</strong>
        Tous droits réservés.
      </footer>
    </div>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="{{ asset('adminlte/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('adminlte/js/dataTables.bootstrap5.min.js') }}"></script>
    
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        $('.datatable').DataTable({
            language: { url: "{{ asset('adminlte/json/fr-FR.json') }}" },
            pageLength: 25,
            responsive: true
        });
    });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.11.0/browser/overlayscrollbars.browser.es6.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.min.js"></script>
    <script src="{{URL::asset('adminlte/js/adminlte.js')}}"></script>

    @stack('scripts')
  </body>
</html>