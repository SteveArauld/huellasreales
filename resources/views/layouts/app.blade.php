<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8" />

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <link rel="preload" as="image" href="{{ asset("assets/images/hero-background.png") }}">
    <link rel="preload" as="image" href="{{ asset("assets/images/hero-slide-2.png") }}">
    <link rel="preload" as="image" href="{{ asset("assets/images/hero-slide-3.png") }}">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Fraunces:opsz,wght@9..144,300;9..144,380;9..144,450&amp;family=Inter+Tight:wght@300;400;500;600&amp;display=swap" data-precedence="default">



    <title>
        {{ trim(View::yieldContent('title') . ' | ' . config('app.name')) }}
    </title>

    <link rel="icon" type="image/png" href="{{ asset("assets/logo/logo.png") }}" sizes="96x96">
    <link rel="icon" type="image/svg+xml" href="{{ asset("assets/logo/logo.png") }}">
    <link rel="shortcut icon" href="{{ asset("assets/logo/logo.png") }}">

    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset("assets/logo/logo.png") }}">



    <meta name="author" content="Alma de Criador">
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="Alma de Criador">
    <meta name="twitter:card" content="summary">
    <meta name="twitter:title" content="Alma de Criador — Cachorros de raza, criados en familia">
    <meta name="twitter:description" content="Criadero certificado en España. +15 años seleccionando cachorros de raza pura con garantía sanitaria, microchip y envío nacional.">

    <meta name="description" content="Criadero certificado en España. +15 años seleccionando cachorros de raza pura con garantía sanitaria, microchip y envío nacional.">
    <meta property="og:title" content="Alma de Criador — Cachorros de raza, criados en familia">
    <meta property="og:description" content="Criadero certificado en España. +15 años seleccionando cachorros de raza pura con garantía sanitaria, microchip y envío nacional.">
    <meta property="og:url" content="/">
    <link rel="preconnect" href="https://fonts.googleapis.com">




    <meta property="og:image" content="{{ asset("assets/images/id-preview-8fe2edb0--3f61be70-827e-438e-87fc-cf5491281355.png") }}">
    <meta name="twitter:image" content="{{ asset("assets/images/id-preview-8fe2edb0--3f61be70-827e-438e-87fc-cf5491281355.png") }}">

    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="anonymous">
    <link rel="canonical" href="/">
    <style>
        #mobile-menu {
            transition: all 0.3s ease-in-out;
            max-height: 0;
            overflow: hidden;
            opacity: 0;
        }

        #mobile-menu:not(.hidden) {
            max-height: 500px;
            opacity: 1;
            padding: 1rem 0;
        }

        #mobile-menu.hidden {
            max-height: 0;
            opacity: 0;
            padding: 0;
        }
    </style>

    <style>
    /* Toast notification styles - sans overlay */
    .toast-container {
        position: fixed;
        top: 100px;
        right: 20px;
        z-index: 9999;
        max-width: 420px;
        width: 100%;
    }
    
    .toast {
        background: #ffffff;
        border-radius: 12px;
        padding: 20px 24px;
        box-shadow: 0 20px 60px rgba(0, 0, 0, 0.15);
        border-left: 4px solid #2d7d46;
        transform: translateX(120%);
        transition: transform 0.5s cubic-bezier(0.68, -0.55, 0.265, 1.55);
        margin-bottom: 12px;
        display: flex;
        align-items: flex-start;
        gap: 16px;
    }
    
    .toast.show {
        transform: translateX(0);
    }
    
    .toast-icon {
        flex-shrink: 0;
        width: 40px;
        height: 40px;
        background: #e8f5e9;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #2d7d46;
    }
    
    .toast-icon svg {
        width: 22px;
        height: 22px;
    }
    
    .toast-content {
        flex: 1;
    }
    
    .toast-title {
        font-weight: 600;
        font-size: 16px;
        color: #1a1a1a;
        margin-bottom: 4px;
    }
    
    .toast-message {
        font-size: 14px;
        color: #666;
        line-height: 1.5;
        margin: 0;
    }
    
    .toast-close {
        flex-shrink: 0;
        background: none;
        border: none;
        color: #999;
        cursor: pointer;
        padding: 4px;
        transition: color 0.2s;
        margin-top: -4px;
    }
    
    .toast-close:hover {
        color: #333;
    }
    
    .toast-close svg {
        width: 18px;
        height: 18px;
    }
    
 
    
    .toast.error .toast-icon {
        background: #fce4ec;
        color: #d32f2f;
    }
</style>
    @vite(['resources/css/app.css'])
    @stack('styles')
</head>

<body class="flex min-h-dvh flex-col bg-background">

    @include('layouts.partials.navbar.public')

    @yield('content')

    @include('layouts.partials.footer.public')


    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const menuToggle = document.getElementById('menu-toggle');
            const mobileMenu = document.getElementById('mobile-menu');
            let isMenuOpen = false;

            if (menuToggle && mobileMenu) {
                // Ouvrir/fermer le menu
                menuToggle.addEventListener('click', function(e) {
                    e.stopPropagation();
                    isMenuOpen = !isMenuOpen;

                    if (isMenuOpen) {
                        mobileMenu.classList.remove('hidden');
                        menuToggle.setAttribute('aria-expanded', 'true');
                        // Option : changer l'icône en X
                        menuToggle.innerHTML = `
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="size-5" aria-hidden="true">
                        <path d="M18 6L6 18"></path>
                        <path d="M6 6l12 12"></path>
                    </svg>
                `;
                    } else {
                        mobileMenu.classList.add('hidden');
                        menuToggle.setAttribute('aria-expanded', 'false');
                        // Remettre l'icône menu
                        menuToggle.innerHTML = `
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-menu size-5" aria-hidden="true">
                        <path d="M4 5h16"></path>
                        <path d="M4 12h16"></path>
                        <path d="M4 19h16"></path>
                    </svg>
                `;
                    }
                });

                // Fermer le menu en cliquant à l'extérieur
                document.addEventListener('click', function(e) {
                    if (isMenuOpen && !mobileMenu.contains(e.target) && !menuToggle.contains(e.target)) {
                        menuToggle.click();
                    }
                });

                // Fermer le menu en appuyant sur Échap
                document.addEventListener('keydown', function(e) {
                    if (e.key === 'Escape' && isMenuOpen) {
                        menuToggle.click();
                    }
                });
            }
        });
    </script>

    

</body>

@stack('scripts')

</html>