<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Culture Béninoise - Site Indisponible</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        :root {
            --primary-blue: #0066cc;
            --light-blue: #e6f2ff;
            --dark-blue: #004d99;
            --white: #ffffff;
            --light-gray: #f8f9fa;
        }
        
        body {
            background: linear-gradient(135deg, var(--light-blue) 0%, var(--white) 50%, var(--light-blue) 100%);
            min-height: 100vh;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
        .maintenance-container {
            background: var(--white);
            border-radius: 20px;
            box-shadow: 0 20px 40px rgba(0, 102, 204, 0.1);
            padding: 3rem;
            margin-top: 10vh;
            border: 2px solid var(--light-blue);
            position: relative;
            overflow: hidden;
        }
        
        .maintenance-container::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 5px;
            background: linear-gradient(90deg, var(--primary-blue), var(--dark-blue));
        }
        
        .logo-container {
            text-align: center;
            margin-bottom: 2rem;
        }
        
        .logo {
            width: 120px;
            height: 120px;
            background: var(--light-blue);
            border-radius: 50%;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 1rem;
            border: 3px solid var(--primary-blue);
        }
        
        .logo i {
            font-size: 3rem;
            color: var(--primary-blue);
        }
        
        .title {
            color: var(--primary-blue);
            font-weight: 700;
            font-size: 2.5rem;
            margin-bottom: 1rem;
            text-align: center;
        }
        
        .subtitle {
            color: var(--dark-blue);
            font-size: 1.3rem;
            margin-bottom: 2rem;
            text-align: center;
            font-weight: 300;
        }
        
        .message-box {
            background: var(--light-blue);
            border-radius: 15px;
            padding: 2rem;
            text-align: center;
            border-left: 5px solid var(--primary-blue);
            margin-bottom: 2rem;
        }
        
        .message-icon {
            font-size: 3rem;
            color: var(--primary-blue);
            margin-bottom: 1rem;
        }
        
        .message-text {
            color: var(--dark-blue);
            font-size: 1.5rem;
            font-weight: 500;
            margin: 0;
        }
        
        .features {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 1.5rem;
            margin-bottom: 2rem;
        }
        
        .feature-item {
            text-align: center;
            padding: 1.5rem;
            background: var(--light-gray);
            border-radius: 12px;
            border: 1px solid #e9ecef;
            transition: transform 0.3s ease;
        }
        
        .feature-item:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0, 102, 204, 0.1);
        }
        
        .feature-icon {
            font-size: 2rem;
            color: var(--primary-blue);
            margin-bottom: 1rem;
        }
        
        .feature-title {
            color: var(--dark-blue);
            font-weight: 600;
            margin-bottom: 0.5rem;
        }
        
        .feature-desc {
            color: #666;
            font-size: 0.9rem;
        }
        
        .contact-info {
            background: var(--light-blue);
            border-radius: 15px;
            padding: 1.5rem;
            text-align: center;
            margin-top: 2rem;
        }
        
        .contact-title {
            color: var(--dark-blue);
            font-weight: 600;
            margin-bottom: 1rem;
        }
        
        .contact-email {
            color: var(--primary-blue);
            font-weight: 500;
            text-decoration: none;
        }
        
        .contact-email:hover {
            text-decoration: underline;
        }
        
        .pulse-animation {
            animation: pulse 2s infinite;
        }
        
        @keyframes pulse {
            0% { transform: scale(1); }
            50% { transform: scale(1.05); }
            100% { transform: scale(1); }
        }
        
        .btn-primary-custom {
            background: var(--primary-blue);
            border: none;
            padding: 12px 30px;
            border-radius: 25px;
            color: white;
            font-weight: 500;
            transition: all 0.3s ease;
        }
        
        .btn-primary-custom:hover {
            background: var(--dark-blue);
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0, 102, 204, 0.3);
        }
        
        @media (max-width: 768px) {
            .maintenance-container {
                margin: 2rem;
                padding: 2rem 1.5rem;
            }
            
            .title {
                font-size: 2rem;
            }
            
            .subtitle {
                font-size: 1.1rem;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-md-10">
                <div class="maintenance-container pulse-animation">
                    <div class="logo-container">
                        <div class="logo">
                             <img
                              src="{{URL::asset('adminlte/img/logoculture (2).png')}}"
                              alt="AdminLTE Logo"
                              class="brand-image opacity-75 shadow"
                            />
                        </div>
                        <h1 class="title">Culture Bénin</h1>
                        <p class="subtitle">Bienvenue sur notre plateforme de culture</p>
                    </div>
                    
                    <div class="message-box">
                        <i class="bi bi-tools message-icon"></i>
                        <h2 class="message-text">Ce site est indisponible pour le moment</h2>
                    </div>
                    
                    <div class="features">
                        <div class="feature-item">
                            <i class="bi bi-gear-fill feature-icon"></i>
                            <h4 class="feature-title">Maintenance en cours</h4>
                            <p class="feature-desc">Nous améliorons votre expérience utilisateur</p>
                        </div>
                    </div>
                    
                    <div class="text-center">
                    <div class="text-center">
                       <form method="POST" action="{{ route('logout') }}">
                       @csrf

                       <x-responsive-nav-link :href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                             <button class="btn btn-primary-custom">
                            Déconnexion
                            </button>
                       </x-responsive-nav-link>
                     </form>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Animation supplémentaire pour le bouton
        document.querySelector('.btn-primary-custom').addEventListener('mouseenter', function() {
            this.style.transform = 'translateY(-2px)';
        });
        
        document.querySelector('.btn-primary-custom').addEventListener('mouseleave', function() {
            this.style.transform = 'translateY(0)';
        });
    </script>
</body>
</html>