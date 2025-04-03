@include('sweetalert::alert')
@php
    $config = DB::table('configs')->first();
    $service = DB::table('services')->get();
    $produit = DB::table('produits')->get();
@endphp

<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>MKSUPRISESDELUXE</title>
    <meta name="robots" content="noindex, follow" />
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ Storage::url($config->icon ?? ' ') }}">

    <!-- CSS
    ============================================ -->

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="/assets/css/vendor/bootstrap.min.css">
    <link rel="stylesheet" href="/assets/css/vendor/font-awesome.css">
    <link rel="stylesheet" href="/assets/css/vendor/flaticon/flaticon.css">
    <link rel="stylesheet" href="/assets/css/vendor/slick.css">
    <link rel="stylesheet" href="/assets/css/vendor/slick-theme.css">
    <link rel="stylesheet" href="/assets/css/vendor/jquery-ui.min.css">
    <link rel="stylesheet" href="/assets/css/vendor/sal.css">
    <link rel="stylesheet" href="/assets/css/vendor/magnific-popup.css">
    <link rel="stylesheet" href="/assets/css/vendor/base.css">
    <link rel="stylesheet" href="/assets/css/style.min.css">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="/Script.js"></script>
    <link rel="stylesheet" href="/style.css">
    @yield('header')

</head>


<body class="sticky-header overflow-md-visible">

    <a href="#top" class="back-to-top" id="backto-top"><i class="fal fa-arrow-up"></i></a>
    <!-- Start Header -->
    <header class="header axil-header header-style-7">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-lg-12 col-md-12 col-12">
                    <div class="header-top-text">
                        <div class="scroll-text">
                            <p>
                                <i class="fas fa-star" style="color: #f3ba0e; margin-right: 8px;"></i>
                                {!! \App\Helpers\TranslationHelper::TranslateText($config->slogan ?? '') !!}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <style>
            
@keyframes clignoter {
    0% {
        opacity: 1; /* Visible */
    }
    100% {
        opacity: 0; /* Invisible */
    }
}

@keyframes defilement {
    0% {
        transform: translateX(100%); /* Commence à droite */
    }
    100% {
        transform: translateX(-100%); /* Va à gauche */
    }
}

.header-top-text {
    width: 100%; /* Prend toute la largeur */
    overflow: hidden; 
    background: #2C3E50; /* Couleur de fond (modifiable) */
    padding: 10px 0; /* Espace haut/bas */
}

.scroll-text {
    display: block;
    width: 100%;
    white-space: nowrap; /* Évite le retour à la ligne */
    overflow: hidden; 
    position: relative; /* Position relative pour l'animation */
}

.scroll-text p {
    display: inline-block;
    padding-left: 100%; /* Départ hors écran */
    animation: scroll 30s linear infinite; /* Animation infinie */
    font-size: 16px;
    color: #fff; 
    font-weight: bold;
    text-transform: uppercase; /* Optionnel pour le style */
}

@keyframes scroll {
    0% {
        transform: translateX(100%);
    }
    100% {
        transform: translateX(-100%);
    }
}

/* Pause au survol */
.scroll-text:hover p {
    animation-play-state: paused;
}
        </style>
        <!-- Start Mainmenu Area -->
            <div id="axil-sticky-placeholder"></div>
            <div class="axil-mainmenu">
                <div class="container-fluid">
                    <div class="header-navbar">

                        <div class="header-brands">
                            <a href="{{ route('home') }}" class="logo logo-dark">
                                <img src="{{ Storage::url($config->logo ?? ' ') }}" alt="Site Logo">
                            </a>
                            <a href="{{ route('home') }}" class="logo logo-light">
                                <img src="{{ Storage::url($config->logo ?? ' ') }}" alt="Site Logo">
                            </a>

                        </div>

                        <div class=" header-main-nav">
                            <nav class="mainmenu-nav">
                                <button class="mobile-close-btn mobile-nav-toggler"><i
                                        class="fas fa-times"></i></button>


                                <div class="mobile-nav-brand header-brands">
                                    <a href="{{ route('home') }}" class="logo logo-dark">
                                        <img src="{{ Storage::url($config->logo ?? ' ') }}" alt="Site Logo">
                                    </a>
                                    <a href="{{ route('home') }}" class="logo logo-light">
                                        <img src="{{ Storage::url($config->logo ?? ' ') }}" alt="Site Logo">
                                    </a>
                                </div>

                                <ul class="mainmenu">

                                    <style>
                                       
                                    </style>

                                    <li class="dropdown">
                                        <a class="dropdown-toggle" href="#" role="button"
                                            id="dropdown-header-menu" data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="far fa-th-large"></i>
                                            {{ \App\Helpers\TranslationHelper::TranslateText('Categories') }}
                                        </a>
                                        <ul class="dropdown-menu" aria-labelledby="dropdown-header-menu">
                                            @foreach ($categories as $category)
                                                <li>

                                                    <a class="dropdown-item1 @class([
                                                        'selected' =>
                                                            isset($current_category) && $current_category->id === $category->id,
                                                    ])"
                                                        href="/category/{{ $category->id }}"
                                                        style="color: {{ isset($current_category) && $current_category->id === $category->id ? '#EFB121' : '#000000' }};">
                                                        {{ $category->nom ?? ' ' }}
                                                    </a>


                                                </li>
                                            @endforeach
                                        </ul>
                                    </li>



                                    <li class="menu-item"><a href="{{ route('home') }}"> {{ \App\Helpers\TranslationHelper::TranslateText('Accueil') }}</a></li></a>

                                    </li>


                                    </li class="menu-item">
                                    <li><a href="{{ route('about') }}">
                                            {{ \App\Helpers\TranslationHelper::TranslateText('A propos de nous') }}</a></li>



                                    <li class="menu-item">
                                        <a href="{{ route('shop') }}">{{ __('boutique') }}</a>
                                    </li>
                                    <li class="menu-item"><a href="actualites">
                                            {{ \App\Helpers\TranslationHelper::TranslateText('Actualités') }}
                                        </a></li>


                                    <li class="menu-item"><a href="{{ route('contact') }}">
                                            {{ \App\Helpers\TranslationHelper::TranslateText('Contact') }}</a></li>



                                </ul>
                            </nav>
                        </div>
                        <div class="header-action">
                            <ul class="action-list">

                                <li class="axil-search d-xl-block d-none w-2">
                                    <input type="search" class="placeholder product-search-input small-input"
                                        name="search2" id="search2" maxlength="128"
                                        placeholder="  {{ \App\Helpers\TranslationHelper::TranslateText('Rechercher un produit') }}"
                                        autocomplete="off" style="width: 100px;">
                                    <button type="submit" class="icon wooc-btn-search">
                                        <i class="flaticon-magnifying-glass"></i>
                                    </button>
                                </li>




                                <li class="axil-search d-md-none w-2" style="transition: background-color 0.3s;">
                                    <a href="javascript:void(0)" class="header-search-icon" title="Search">
                                        <i class="far fa-search"></i>
                                    </a>
                                </li>

                                <style>
                                    .axil-search:hover {
                                        background-color: #f0f0f0;
                                        /* Remplacez par la couleur souhaitée */
                                    }
                                </style>


                                <li class="shopping-cart">
                                    <a href="#" class="cart-dropdown-btn">
                                        <span class="cart-count" id="count-panier-span">00</span>
                                        <i class="far fa-shopping-cart"></i>
                                    </a>
                                </li>
                                <li class="wishlist">
                                    <a href="{{ route('favories') }}">
                                        <i class="far fa-heart"></i>
                                    </a>
                                </li>
                                <li class="my-account">
                                    <a href="javascript:void(0)">
                                        <i class="far fa-user"></i>
                                    </a>
                                    <div class="my-account-dropdown">

                                        @if (Auth()->user())
                                            <ul>
                                                @if (auth()->user()->role != 'client')
                                                    <li><a href="{{ url('dashboard') }}">Dashboard</a>
                                                    </li>
                                                @endif
                                                <li>
                                                    <a href="{{ route('account') }}">
                                                        {{ \App\Helpers\TranslationHelper::TranslateText('Mon compte') }}
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="{{ route('favories') }}">
                                                        {{ \App\Helpers\TranslationHelper::TranslateText('Mes favoris') }}</a>
                                                </li>
                                                <li>
                                                    <a href="{{ route('cart') }}">
                                                        {{ \App\Helpers\TranslationHelper::TranslateText('Mon panier') }}</a>
                                                </li>
                                                <li>

                                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                                        onclick="event.preventDefault();   document.getElementById('logout-form').submit();">
                                                        {{ \App\Helpers\TranslationHelper::TranslateText('Déconnexion') }}
                                                    </a>

                                                    <form id="logout-form" action="{{ route('logout') }}"
                                                        method="POST" class="d-none">
                                                        @csrf
                                                    </form>
                                                </li>




                                            </ul>
                                        @else
                                            <div class="login-btn">
                                                <a href="{{ url('login') }}" class="axil-btn btn-bg-primary2">
                                                    {{ \App\Helpers\TranslationHelper::TranslateText('Connexion') }}</a>
                                            </div>

                                            <div class="reg-footer text-center">
                                                {{ \App\Helpers\TranslationHelper::TranslateText('Pas de compte') }}?
                                                <a href="{{ url('register') }}" class="btn-link">
                                                    {{ \App\Helpers\TranslationHelper::TranslateText('Inscrivez vous ici') }}.</a>
                                            </div>
                                        @endif

                                    </div>
                                </li>

                                <li>

                                    <div class="custom-dropdown">
                                        <form action="{{ route('locale.change') }}" method="POST">
                                            @csrf
                                            <div class="dropdown">
                                                <button class="dropbtn">
                                                    @if (app()->getLocale() == 'fr')
                                                        <img src="https://img.icons8.com/color/20/france-circular.png"
                                                            alt="fr">
                                                    @elseif(app()->getLocale() == 'en')
                                                        <img src="https://img.icons8.com/color/20/great-britain-circular.png"
                                                            alt="en">
                                                    @else
                                                        <img src="https://img.icons8.com/color/20/france-circular.png"
                                                            alt="fr">
                                                    @endif
                                                </button>
                                                <div class="dropdown-content">
                                                    <button type="submit" name="locale" value="fr"
                                                        class="dropdown-item">
                                                        <img src="https://img.icons8.com/color/20/france-circular.png"
                                                            alt="fr">
                                                        Français
                                                    </button>
                                                    <button type="submit" name="locale" value="en"
                                                        class="dropdown-item">
                                                        <img src="https://img.icons8.com/color/20/great-britain-circular.png"
                                                            alt="en">
                                                        English
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>



                                    <style>
                                        .custom-dropdown {
                                            position: relative;
                                            display: inline-block;


                                        }

                                        .dropbtn {
                                            background-color: #f7fef7;
                                            color: white;
                                            padding: 10px;
                                            font-size: 16px;
                                            border: none;
                                            cursor: pointer;
                                        }

                                        .dropdown-content {
                                            display: none;
                                            position: absolute;
                                            background-color: #f9f9f9;
                                            min-width: 160px;
                                            box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
                                            z-index: 1;
                                        }

                                        .dropdown-content .dropdown-item {
                                            background-color: white;
                                            border: none;
                                            width: 100%;
                                            text-align: left;
                                            padding: 8px 16px;
                                            cursor: pointer;
                                            display: flex;
                                            align-items: center;
                                        }

                                        .dropdown-content .dropdown-item img {
                                            margin-right: 8px;
                                        }

                                        .dropdown-content .dropdown-item:hover {
                                            background-color: #f8f3f3;
                                        }

                                        .dropdown:hover .dropdown-content {
                                            display: block;
                                        }

                                        .dropdown:hover .dropbtn {
                                            background-color: #eef4ee;
                                        }

                                        /* Responsive adjustments */
                                        @media (max-width: 600px) {
                                            .dropbtn {
                                                font-size: 14px;
                                                padding: 8px;
                                            }

                                            .dropdown-content .dropdown-item {
                                                font-size: 14px;
                                                padding: 8px 16px;
                                            }
                                        }
                                    </style>

                                </li>
                          
                                <li class="axil-mobile-toggle">
                                    <button class="menu-btn mobile-nav-toggler">
                                        <i class="flaticon-menu-2"></i>
                                    </button>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Mainmenu Area -->
    </header>
    <!-- End Header -->



    <main>



        @yield('body')




    </main>



    <footer class="axil-footer-area footer-style-2">
        <!-- Start Footer Top Area  -->
        <div class="footer-top separator-top">
            <div class="container">
                <div class="row">
                    <!-- Start Single Widget  -->
                    <div class="col-lg-3 col-sm-6">
                        <div class="axil-footer-widget">
                            <h5 class="widget-title"></h5>
                            <style>
                                .logo {
                                    position: relative;
                                    top: -30px;
                                    /* Déplace le logo de 30px vers le haut */
                                }
                            </style>
                            <div class="logo mb--30">
                                <a href="{{ route('home') }}">
                                    <img class="light-logo" src="{{ Storage::url($config->logofooter ?? ' ') }}"
                                        alt="Logo" height="200" width="200">
                                </a>
                            </div>

                            <p class="logo" style="font-size: 18px; line-height: 1.6; text-align: justify;">

                                {!! \App\Helpers\TranslationHelper::TranslateText($config->description) !!}
                            </p>


                        </div>
                    </div>
                    <!-- End Single Widget  -->
                    <!-- Start Single Widget  -->
                    <div class="col-lg-3 col-sm-6">
                        <div class="axil-footer-widget">
                            <h5 class="widget-title">
                                {{ \App\Helpers\TranslationHelper::TranslateText('Mon compte') }}</h5>
                            <div class="inner">
                                <ul>
                                    @if (Auth()->user())
                                        <li><a href="{{ route('profile') }}">
                                                {{ \App\Helpers\TranslationHelper::TranslateText('Paramètres') }}</a>
                                        </li>
                                        <li><a href="{{ route('favories') }}">
                                                {{ \App\Helpers\TranslationHelper::TranslateText('Mes favoris') }}</a>
                                        </li>
                                        <li><a href="{{ route('cart') }}">
                                                {{ \App\Helpers\TranslationHelper::TranslateText('Mon panier') }}</a>
                                        </li>
                                    @endif
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- End Single Widget  -->
                    <!-- Start Single Widget  -->
                    <div class="col-lg-3 col-sm-6">
                        <div class="axil-footer-widget">
                            <h5 class="widget-title"> {{ \App\Helpers\TranslationHelper::TranslateText(' Pages') }}
                            </h5>
                            <div class="inner">
                                <ul>
                                    <li><a href="{{ route('home') }}">
                                            {{ \App\Helpers\TranslationHelper::TranslateText('Accueil') }}</a></li>
                                    <li><a href="{{ route('about') }}">
                                            {{ \App\Helpers\TranslationHelper::TranslateText('A propos de nous') }}</a>
                                    </li>

                                    <li><a href="{{ route('shop') }}">
                                            {{ \App\Helpers\TranslationHelper::TranslateText('Produits') }}</a></li>
                                    <li><a href="{{ route('contact') }}">
                                            {{ \App\Helpers\TranslationHelper::TranslateText('Contact') }}</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- End Single Widget  -->
                    <!-- Start Single Widget  -->
                    <div class="col-lg-3 col-sm-6">
                        <div class="axil-footer-widget">
                            <h5 class="widget-title">
                                {{ \App\Helpers\TranslationHelper::TranslateText('Contact info') }}
                            </h5>
                            <div class="inner">
                                {{-- <span>Save $3 With App & New User only</span> --}}
                                <div class="download-btn-group">

                                    <div class="inner">

                                        <ul class="support-list-item">
                                            <li><a href="mailto:example@domain.com"><i
                                                        class="fal fa-envelope-open"></i>
                                                    {{ $config->email ?? ' ' }}</a></li>
                                            <li><a href="tel:{{ preg_replace('/\D/', '', $config->telephone) }}"><i
                                                        class="fal fa-phone-alt"></i>{{ $config->telephone ?? ' ' }}</a>
                                            </li>
                                            <li><i class="fal fa-map-marker-alt"></i>{{ $config->addresse ?? ' ' }}
                                            </li>
                                        </ul>
                                    </div>


                                </div>

                                <div class="col-xl-8">
                                    <div class="social-share scroll-social">
                                        @if(!empty($config->facebook))
                                            <a href="{{ $config->facebook }}" class="social-icon" target="_blank" title="Facebook"><i class="fab fa-facebook-f"></i></a>
                                        @endif
                                
                                        @if(!empty($config->instagram))
                                            <a href="{{ $config->instagram }}" class="social-icon" target="_blank" title="Instagram"><i class="fab fa-instagram"></i></a>
                                        @endif
                                
                                        @if(!empty($config->linkedin))
                                            <a href="{{ $config->linkedin }}" class="social-icon" target="_blank" title="LinkedIn"><i class="fab fa-linkedin-in"></i></a>
                                        @endif
                                
                                        @if(!empty($config->tiktok))
                                            <a href="{{ $config->tiktok }}" class="social-icon" target="_blank" title="TikTok"><i class="fab fa-tiktok"></i></a>
                                        @endif
                                    </div>
                                </div>
                                
                                

                            </div>
                        </div>
                    </div>
                    <!-- End Single Widget  -->
                </div>
            </div>
        </div>

        <div class="whatsapp-float">
            <a href="https://wa.me/{{ preg_replace('/\D/', '', $config->telephone) }}" target="_blank">
                <i class="fab fa-whatsapp"></i>
            </a>
        </div>

        <style>
            .whatsapp-float {
                position: fixed;
                bottom: 90px;
                /* Distance par rapport au bas */
                right: 20px;
                /* Distance par rapport à la droite */
                width: 60px;
                height: 60px;
                background-color: #25D366;
                /* Couleur verte WhatsApp */
                border-radius: 50%;
                /* Cercle */
                display: flex;
                align-items: center;
                justify-content: center;
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
                transition: transform 0.3s ease, box-shadow 0.3s ease;
                z-index: 1000;
                /* Toujours visible au-dessus des autres éléments */
            }

            .whatsapp-float a {
                color: white;
                font-size: 30px;
                /* Taille de l'icône */
                text-decoration: none;
            }

            .whatsapp-float:hover {
                transform: scale(1.1);
                /* Effet zoom au survol */
                box-shadow: 0 6px 12px rgba(0, 0, 0, 0.3);
            }
        </style>
        <!-- End Footer Top Area  -->
        <!-- Start Copyright Area  -->
        <div class="copyright-area copyright-default separator-top">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-xl-4">

                    </div>
                    <div class="col-xl-4 col-lg-12">
                        <div class="copyright-left d-flex flex-wrap justify-content-center">
                            <ul class="quick-link">
                                <li>(C){{ date('Y') }} mksuprisesdeluxe.com | Tout droit reservé<a href="#"
                                        style="color: #c71f17;">
                                        <b> </b>
                                    </a>.</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-12">
                        <div
                            class="copyright-right d-flex flex-wrap justify-content-xl-end justify-content-center align-items-center">

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Copyright Area  -->
    </footer>
    <!-- End Footer Top Area  -->


    <!-- End Footer Area  -->


    <!-- Header Search Modal End -->
    <div class="header-search-modal" id="header-search-modal">
        <button class="card-close sidebar-close"><i class="fas fa-times"></i></button>
        <div class="header-search-wrap">
            <div class="card-header">
                <form role="search" action="{{ url('search') }}" method="get">
                    <div class="input-group">
                        <input value="{{ $nom ?? '' }}" class="form-control" id="search" type="search"
                            name="search"
                            placeholder="  {{ \App\Helpers\TranslationHelper::TranslateText('Rechercher produit') }}">

                        <button type="submit" class="axil-btn btn-bg-primary"><i class="far fa-search"></i></button>
                    </div>
                </form>
            </div>
            <div class="card-body">
                <div class="search-result-header">
                    <h6 class="title"></h6>
                    <a href="{{ route('shop') }}" class="view-all">
                        {{ \App\Helpers\TranslationHelper::TranslateText('Voir tout') }}
                    </a>
                </div>
                <div class="psearch-results">
                    @if (isset($searchproducts))
                        @foreach ($searchproducts as $produit)
                            <div class="axil-product-list">
                                <div class="thumbnail">
                                    <a
                                        href="{{ route('details-produits', ['id' => $produit->id, 'slug' => Str::slug(Str::limit($produit->nom, 10))]) }}">
                                        <img width="100" height="100" src="{{ Storage::url($produit->photo) }}"
                                            alt="Yantiti Leather Bags">
                                    </a>
                                </div>
                                <div class="product-content">
                                    <div class="product-rating">
                                     
                                    </div>
                                    <h6 class="product-title"><a
                                            href="{{ route('details-produits', ['id' => $produit->id, 'slug' => Str::slug(Str::limit($produit->nom, 10))]) }}">
                                            {!! \App\Helpers\TranslationHelper::TranslateText($produit->nom ?? '') !!}
                                        </a>
                                    </h6>

                                    <div class="product-price-variant">
                                        @if ($produit->inPromotion())
                                            <span class="price current-price"><b class="text-success"
                                                    style="color: #4169E1">
                                                    {{ $produit->getPrice() }} <x-devise></x-devise>
                                                </b></span>
                                            <span class="price old-price">
                                                <span class="price old-price"
                                                    style="position: relative; font-size: 1.2rem; color: #dc3545; font-weight: bold;">
                                                    {{ $produit->prix }} <x-devise></x-devise>
                                                    <span
                                                        style="position: absolute; top: 50%; left: 0; width: 100%; height: 2px; background-color: black;"></span>
                                                </span>
                                            </span>
                                        @else
                                            {{ $produit->getPrice() }}<x-devise></x-devise>
                                        @endif

                                    </div>
                                    <div class="product-cart">
                                        <a onclick="AddToCart( {{ $produit->id }} )" class="cart-btn"><i
                                                class="fal fa-shopping-cart"></i></a>
                                        @if (Auth()->user())
                                            <a onclick="AddFavoris({{ $produit->id }})" class="cart-btn"><i
                                                    class="fal fa-heart"></i></a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif

                </div>
            </div>
        </div>
    </div>
    <!-- Header Search Modal End -->




    <div class="cart-dropdown" id="cart-dropdown">
        <div class="cart-content-wrap">
            <div class="cart-header">
                <h2 class="header-title"> {{ \App\Helpers\TranslationHelper::TranslateText('Mon panier') }}</h2>
                <button class="cart-close sidebar-close"><i class="fas fa-times"></i></button>
            </div>
            <div class="cart-body">
                <ul class="cart-item-list" id="list_content_panier">




                </ul>
            </div>
            <div class="cart-footer">
                <h3 class="cart-subtotal">
                    <span class="subtotal-title">Subtotal:</span>
                    <span class="subtotal-amount" id="montant_total_panier">00</span>
                </h3>
                <div class="group-btn">
                    <a href="{{ route('cart') }}" class="axil-btn btn-bg-primary2 viewcart-btn">
                        {{ \App\Helpers\TranslationHelper::TranslateText('Voir panier') }}
                    </a>
                    <a href="{{ url('/commander') }}" class="axil-btn btn-bg-secondary2 checkout-btn">
                        {{ \App\Helpers\TranslationHelper::TranslateText('Passer commande') }}
                    </a>
                </div>
            </div>
        </div>
    </div>


    <!-- JS
============================================ -->
    <!-- Modernizer JS -->
    <script src="/assets/js/vendor/modernizr.min.js"></script>
    <!-- jQuery JS -->
    <script src="/assets/js/vendor/jquery.js"></script>
    <!-- Bootstrap JS -->
    <script src="/assets/js/vendor/popper.min.js"></script>
    <script src="/assets/js/vendor/bootstrap.min.js"></script>
    <script src="/assets/js/vendor/slick.min.js"></script>
    <script src="/assets/js/vendor/js.cookie.js"></script>
    <!-- <script src="assets/js/vendor/jquery.style.switcher.js"></script> -->
    <script src="/assets/js/vendor/jquery-ui.min.js"></script>
    <script src="/assets/js/vendor/jquery.ui.touch-punch.min.js"></script>
    <script src="/assets/js/vendor/jquery.countdown.min.js"></script>
    <script src="/assets/js/vendor/sal.js"></script>
    <script src="/assets/js/vendor/jquery.magnific-popup.min.js"></script>
    <script src="/assets/js/vendor/imagesloaded.pkgd.min.js"></script>
    <script src="/assets/js/vendor/isotope.pkgd.min.js"></script>
    <script src="/assets/js/vendor/counterup.js"></script>
    <script src="/assets/js/vendor/waypoints.min.js"></script>

    <!-- Main JS -->
    <script src="/assets/js/main.js"></script>

</body>

</html>
