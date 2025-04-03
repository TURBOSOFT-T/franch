@extends('front.fixe')
@section('titre', $produit->nom)
@section('body')

    @php

        $config = DB::table('configs')->first();
    @endphp

    <head>
    @section('header')
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="robots" content="index, follow">

        <meta name="author" content="marisa-belle.com">
        <meta name="description" content="{{ $produit->description ?? ' ' }}">
        <meta name="author" content="autodreieck-gmbh.com">
        <meta property="og:title" content="{{ $produit->nom }}">
        <meta property="og:description" content="{{ $produit->description ?? '' }}">
        <meta property="og:brand" content="{{ $produit->marques->nom ?? '' }}">
        <meta property="og:image" content="{{ $produit->photo }}">
        <meta property="og:type" content="product">
        <meta property="og:price:amount" content="{{ $produit->prix }} €">

        <meta property="og:availability" content="{{ $produit->statut }}">

        <meta property="product:price:amount" content="{{ $produit->prix }} €">

        <meta property="product:availability" content="{{ $produit->statut }}">
        <meta name="robots" content="index, follow">


    @endsection

</head>
<script src="path/to/jquery.js"></script>
<script src="path/to/jquery.elevatezoom.js"></script>


<main>

    <main class="main-wrapper">
        <!-- Start Shop Area  -->
        <div class="axil-single-product-area axil-section-gap pb--0 bg-color-white">
            <div class="single-product-thumb mb--40">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="shop-details-img">
                                <div class="tab-content" id="v-pills-tabContent">

                                    <div class="shop-details-tab-img product-img--main" id="zoomContainers"
                                        data-scale="1.4" style="overflow: hidden; position: relative;">

                                        <img id="mainImage"
                                            style="border-radius: 8px; width: 600px; height: 400px; object-fit: cover;"
                                            src="{{ Storage::url($produit->photo) }}" height="600" width="600"
                                            alt="Product image" style="transition: transform 0.3s ease;" />
                                    </div>


                                </div>
                                <br><br>

                                <div class="nav nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                    @foreach (json_decode($produit->photos) ?? [] as $image)
                                        <div class="slider__item">
                                            <img onclick="changeMainImage('{{ Storage::url($image) }}')"
                                                src="{{ Storage::url($image) }}" width="100" height="100"
                                                style="border-radius: 8px;" alt="Additional product image" />
                                        </div>
                                    @endforeach
                                </div>
                            </div>

                            <script>
                                function changeMainImage(imageUrl) {
                                    document.getElementById('mainImage').src = imageUrl;
                                }
                            </script>

                            <script>
                                const zoomContainers = document.getElementById('zoomContainers');
                                const mainImage = document.getElementById('mainImage');
                                const scale = zoomContainers.getAttribute('data-scale') || 1.4;


                                zoomContainers.addEventListener('mouseover', function() {
                                    mainImage.style.transform = `scale(${scale})`;
                                    mainImage.style.cursor = "zoom-in";
                                });


                                zoomContainers.addEventListener('mouseout', function() {
                                    mainImage.style.transform = "scale(1)";
                                });


                                function changeMainImage(imageUrl) {
                                    mainImage.src = imageUrl;
                                    mainImage.style.transform = "scale(1)";
                                }
                            </script>




                        </div>

                        <div class="col-lg-5 mb--40">
                            <div class="single-product-content">
                                <div class="inner">
                                    <h3 class="product-title">
                                        {{ \App\Helpers\TranslationHelper::TranslateText($produit->nom) }}</h3>

                                    <span class="price-amount">

                                        @if ($produit->inPromotion())
                                            <div class="row">
                                                <div class="col-sm-6 col-6">

                                                    <b class="text-succes" style="color: #bd9944">
                                                        {{ $produit->getPrice() }} <x-devise></x-devise>
                                                    </b>
                                                </div>

                                                <div class="col-sm-6 col-6 text-end">


                                                    <span
                                                        style="position: relative; font-size: 1.7rem; color: #f71010; font-weight: bold;">
                                                        {{ $produit->prix }} <x-devise></x-devise>
                                                        <span
                                                            style="position: absolute; top: 50%; left: 0; width: 100%; height: 2px; background-color: black;"></span>
                                                    </span>


                                                </div>
                                            @else
                                                <span class="price current-price">

                                                    {{ $produit->getPrice() }} <x-devise></x-devise>
                                                    </b></span>
                                        @endif
                                    </span>
                                    <div class="product-rating">
                                        <div class="star-rating">

                                            @php
                                                $rate = ceil($produit->getReview->avg('rate'));
                                            @endphp
                                            @for ($i = 1; $i <= 5; $i++)
                                                @if ($rate >= $i)
                                                    <i style="color: rgb(150, 150, 60)" class="fa fa-star"></i>
                                                @else
                                                    <i style="color: rgb(150, 150, 60)" class="fa fa-star-o"></i>
                                                @endif
                                            @endfor

                                        </div>


                                        <div class="review-link">
                                            <a href="#">(<span>{{ $produit->reviews->count() }} </span>
                                                {{ \App\Helpers\TranslationHelper::TranslateText('Commentaires') }})</a>
                                        </div>
                                    </div>
                                    <ul class="product-meta">
                                        @if ($produit->stock > 0)
                                            <label class="badge btn-bg-promotion">
                                                {{ \App\Helpers\TranslationHelper::TranslateText('Stock disponible') }}</label>
                                        @else
                                            <label class="badge bg-danger">
                                                {{ \App\Helpers\TranslationHelper::TranslateText('Stock non disponible') }}</label>
                                        @endif
                                        <style>
                                            .btn-bg-promotion {
                                                background-color: #bd9944;
                                                /* Example primary color */
                                                color: #fff;
                                                border: none;
                                            }
                                        </style>


                                        {{-- <li><span style="color: #EFB121">
                                                {{ \App\Helpers\TranslationHelper::TranslateText('Categorie') }}:</span>
                                            <span style="color: #5EA13C">

                                                {{ \App\Helpers\TranslationHelper::TranslateText(Str::limit($produit->categories->nom, 30)) }}
                                            </span></li> --}}

                                        {{--  <li> <span style="color: #EFB121">
                                                {{ \App\Helpers\TranslationHelper::TranslateText('Reference') }}:</span>
                                            <span style="color: #5EA13C">{{ $produit->reference }}</span></li> --}}
                                    </ul>
                                    <p class="description">

                                        {!! \App\Helpers\TranslationHelper::TranslateText(Str::limit($produit->meta_description, 1100000)) !!}
                                    </p>

                                    <div class="product-variations-wrapper">




                                        <ul>

                                            {{ \App\Helpers\TranslationHelper::TranslateText('Fonctionnalités principales:') }}
                                            <br>

                                            @foreach ($produit->attributs as $attribut)
                                                <strong>{{ $attribut->titre }}:</strong>
                                                {{ $attribut->description }} <br>
                                            @endforeach
                                        </ul>





                                        <div class="product-variation product-size-variation">

                                        </div>


                                    </div>

                                    <!-- Start Product Action Wrapper  -->
                                    <div class="product-action-wrapper d-flex-center">
                                        <!-- Start Quentity Action  -->
                                        <div class="pro-qty">
                                            {{--  <input type="text" value="1"> --}}
                                            <span class="quantity-control minus"></span>
                                            <input type="number" class="input-text qty text" name="quantite"
                                                min="1" value="1" id="qte-{{ $produit->id }}"
                                                autocomplete="off">
                                            <span class="quantity-control plus"></i></span>
                                        </div>



                                        <!-- End Quentity Action  -->

                                        <!-- Start Product Action  -->
                                        <ul class="product-action d-flex-center mb--0">

                                            <li class="select-option2"><a onclick="AddToCart( {{ $produit->id }} )">
                                                    {{ \App\Helpers\TranslationHelper::TranslateText('Ajouter au panier') }}</a>
                                            </li>


                                            @if (Auth()->user())
                                                @php

                                                    $count = DB::table('favoris')
                                                        ->where('id_user', Auth()->user()->id)
                                                        ->where('id_produit', $produit->id)
                                                        ->count();
                                                @endphp
                                                <li class="wishlist">

                                                    <a onclick="AddFavoris({{ $produit->id }})"
                                                        class="axil-btn wishlist-btn"><i class="far fa-heart"></i></a>
                                                </li>
                                            @endif


                                        </ul>
                                        <!-- End Product Action  -->

                                    </div>
                                    <!-- End Product Action Wrapper  -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End .single-product-thumb -->

            <div class="woocommerce-tabs wc-tabs-wrapper bg-vista-white">
                <div class="container">
                    <ul class="nav tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <a class="active" id="description-tab" data-bs-toggle="tab" href="#description"
                                role="tab" aria-controls="description" aria-selected="true"><span
                                    style="color: #EFB121">
                                    {{ \App\Helpers\TranslationHelper::TranslateText('Description') }}</span></a>
                        </li>


                        <li class="nav-item" role="presentation">
                            <a id="reviews-tab" data-bs-toggle="tab" href="#reviews" role="tab"
                                aria-controls="reviews" aria-selected="false" style="color:#EFB121">
                                {!! \App\Helpers\TranslationHelper::TranslateText('Commentaires') !!}</a>
                        </li>

                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="description" role="tabpanel"
                            aria-labelledby="description-tab">
                            <div class="product-desc-wrapper">
                                <div class="row">
                                    <div class="col-lg-12 mb--30">
                                        <div class="single-desc">

                                            <p>
                                                {!! \App\Helpers\TranslationHelper::TranslateText($produit->description ?? ' ') !!}
                                            </p>
                                        </div>
                                    </div>
                                    <!-- End .col-lg-6 -->

                                    <!-- End .col-lg-6 -->
                                </div>
                                <!-- End .row -->

                                <!-- End .row -->
                            </div>
                            <!-- End .product-desc-wrapper -->
                        </div>

                        <div class="tab-pane fade" id="reviews" role="tabpanel" aria-labelledby="reviews-tab">
                            <div class="reviews-wrapper">
                                <div class="row">
                                    <div class="col-lg-6 mb--40">
                                        <div class="axil-comment-area pro-desc-commnet-area">
                                            <h5 class="title">{{ $produit->reviews->count() }}
                                                {!! \App\Helpers\TranslationHelper::TranslateText(' commentaire(s) sur le produit:') !!}
                                            </h5>
                                            <ul class="comment-list">
                                                <!-- Start Single Comment  -->
                                                @foreach ($produit->reviews as $review)
                                                    <li class="comment">
                                                        <div class="comment-body">
                                                            <div class="single-comment">

                                                                <div class="mb-md-0 mb-3">
                                                                    
                                                                   {{--  @if (Auth::user()->avatar ?? false)
                                                                        <img src="{{ asset('assets/avatars/' . Auth::user()->avatar) }}"
                                                                            class="rounded-circle shadow"
                                                                            width="50" height="50"
                                                                            alt="" alt="Avatar">
                                                                    @endif --}}

                                                                    @if (!empty($user) && $user->avatar)
                                                                    <img src="{{ asset('assets/avatars/' . $user->avatar) }}"
                                                                         class="rounded-circle shadow"
                                                                         width="50" height="50"
                                                                         alt="Avatar">
                                                                @endif
                                                                </div>


                                                                <div class="comment-inner">
                                                                    <h6 class="commenter">
                                                                        <a class="hover-flip-item-wrapper"
                                                                            href="#">
                                                                            <span class="hover-flip-item">
                                                                                <span
                                                                                    data-text="Cameron Williamson">{{ $review->user->prenom }}
                                                                                    {{ $review->user->nom }}</span>
                                                                            </span>
                                                                        </a>

                                                                        <span
                                                                            class="commenter-rating ratiing-four-star">


                                                                            @for ($i = 1; $i <= 5; $i++)
                                                                                @if ($review->rate > $i)
                                                                                    <i class="fas fa-star"></i>
                                                                                @else
                                                                                    <i class="fas fa-star-0"></i>
                                                                                @endif
                                                                            @endfor


                                                                        </span>
                                                                    </h6>
                                                                    <div class="comment-text">
                                                                        <p>“ {{ $review->review }} ” </p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                @endforeach
                                                {{-- @livewire('Reviews.ProductReviews', ['product' => $produit]) --}}

                                                <!-- End Single Comment  -->


                                            </ul>
                                        </div>
                                        <!-- End .axil-commnet-area -->
                                    </div>
                                    <!-- End .col -->
                                    <div class="col-lg-6 mb--40">
                                        <!-- Start Comment Respond  -->
                                        <div class="comment-respond pro-des-commend-respond mt--0">
                                            <h5 class="title mb--30"> {!! \App\Helpers\TranslationHelper::TranslateText('Laissez votre avis') !!}</h5>
                                            <p>
                                                {!! \App\Helpers\TranslationHelper::TranslateText(
                                                    'Votre adresse email ne sera pas publiée. Les champs obligatoires sont marqués',
                                                ) !!} *</p>
                                            @auth
                                                @livewire('Reviews.AddReviews', ['product' => $produit])
                                            @else
                                                <p class="text-center p-5">

                                                    {!! \App\Helpers\TranslationHelper::TranslateText('Vous avez besoins de vous') !!}
                                                    <a href="#" style="color:rgb(241, 18, 18)">
                                                        {!! \App\Helpers\TranslationHelper::TranslateText('connecter') !!}
                                                    </a>
                                                    {!! \App\Helpers\TranslationHelper::TranslateText('ou') !!}
                                                    <a style="color:rgb(228, 20, 27)" href="#">
                                                        {!! \App\Helpers\TranslationHelper::TranslateText('enregistrer') !!}
                                                    </a>
                                                    {!! \App\Helpers\TranslationHelper::TranslateText('pour laisser votre avis') !!}
                                                    </a>

                                                </p>
                                            @endauth



                                            <!-- CSS to style selected stars -->
                                            <style>
                                                .star i.selected {
                                                    color: #FFD700;
                                                    /* Change to preferred color for selected stars */
                                                }
                                            </style>

                                        </div>
                                        <!-- End Comment Respond  -->
                                    </div>
                                    <!-- End .col -->
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <!-- woocommerce-tabs -->

        </div>
        <!-- End Shop Area  -->


        <!-- Start Recently Viewed Product Area  -->
        <div class="axil-product-area bg-color-white axil-section-gap pb--50 pb_sm--30">
            <div class="container">
                <div class="section-title-wrapper">
                    <h4>   <span class="axil-breadcrumb-item1 active" aria-current="page"> <i class="far fa-shopping-basket"></i> 
                        
                        {{ \App\Helpers\TranslationHelper::TranslateText('Les produits de la même categorie') }}
                    </span> </h4>
                                
    
                    <h2 class="title"> {{ \App\Helpers\TranslationHelper::TranslateText('Parcourir') }}</h2>
                </div>
                <div class="recent-product-activation slick-layout-wrapper--15 axil-slick-arrow arrow-top-slide">
                    @php

                        $relatedProducts = $produit->categories->produits->where('id', '!=', $produit->id);

                    @endphp
                    @if ($relatedProducts)
                        @foreach ($relatedProducts as $produit)
                            <div class="slick-single-layout">
                                <div class="axil-product">
                                    <div class="thumbnail">
                                        <a
                                            href="{{ route('details-produits', ['id' => $produit->id, 'slug' => Str::slug(Str::limit($produit->nom, 10))]) }}">
                                            <img style="border-radius: 8px; width: 300px; height: 200px; object-fit: cover;"   src="{{ Storage::url($produit->photo) }}" alt="Product Images">

                                            

                                            <div class="top-left"
                                                style="background-color:#EFB121;color: white;">
                                                <span>
                                                    @if ($produit->inPromotion())
                                                        <span>
                                                            -{{ $produit->inPromotion()->pourcentage }}%</span>
                                                    @endif
                                                </span>
                                            </div>
                                        </a>

                                        <div class="product-hover-action">
                                            <ul class="cart-action">
                                                @if (Auth()->user())
                                                    <li class="wishlist"><a
                                                            onclick="AddFavoris({{ $produit->id }})"><i
                                                                class="far fa-heart"></i></a></li>
                                                @endif
                                                <li class="axil-btn  btn-bg-primary2 "><a
                                                        onclick="AddToCart( {{ $produit->id }} )">
                                                        {{ \App\Helpers\TranslationHelper::TranslateText('Ajouter au panier') }}
                                                        </a></li>
                                                {{-- <li class="quickview"><a href="#" data-bs-toggle="modal"
                                                        data-bs-target="#quick-view-modal"><i
                                                            class="far fa-eye"></i></a></li> --}}

                                            </ul>
                                        </div>
                                    </div>
                                    <div class="product-content">
                                        <div class="inner">

                                            <div class="product-rating">
                                                <span class="icon">
    
    
                                                    @php
                                                        $rate = ceil($produit->getReview->avg('rate'));
                                                    @endphp
                                                    @for ($i = 1; $i <= 5; $i++)
                                                        @if ($rate >= $i)
                                                            <i style="color: rgb(161, 161, 58)" class="fa fa-star"></i>
                                                        @else
                                                            <i style="color: rgb(150, 150, 60)" class="far fa-star"></i>
                                                        @endif
                                                    @endfor
    
                                                </span>
                                                <span class="rating-number">({{ $produit->reviews->count() }})</span>
                                            </div>
                                            <h5 class="title"><a
                                                    href="{{ route('details-produits', ['id' => $produit->id, 'slug' => Str::slug(Str::limit($produit->nom, 10))]) }}"> {{ \App\Helpers\TranslationHelper::TranslateText(Str::limit($produit->nom, 15)) }}</a>
                                            </h5>
                                            <div class="product-price-variant">
                                                <h6 class="product-price--main">


                                                    @if ($produit->inPromotion())
                                                        <div class="row">
                                                            <div class="col-sm-6 col-6">

                                                                <b class="text-succes" style="color: #bd9944">
                                                                    {{ $produit->getPrice() }} <x-devise></x-devise>
                                                                </b>
                                                            </div>

                                                            <div class="col-sm-6 col-6 text-end">



                                                                
                                                    <span class="price old-price"
                                                    style="position: relative; font-size: 1.5rem; color: #dc3545; font-weight: bold;">
                                                    {{ $produit->prix }} <x-devise></x-devise>
                                                    <span
                                                        style="position: absolute; top: 50%; left: 0; width: 100%; height: 2px; background-color: black;"></span>
                                                </span>


                                                            </div>
                                                        @else
                                                            {{ $produit->getPrice() }}<x-devise></x-devise> 
                                                    @endif



                                                </h6>
                                            </div>
                                            <div class="color-variant-wrapper">

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif



                </div>
            </div>
        </div>
            <style>
                .axil-breadcrumb-item1 {
            font-size: 14px;
            color: #EFB121; /* Default breadcrumb color */
            }
            
            .axil-breadcrumb-item.active {
            font-weight: bold;
            color: #EFB121; /* Distinct color for active item */
            }
            
            .axil-breadcrumb-item:not(.active)::after {
            content: " / "; /* Adds a separator after non-active items */
            color: #EFB121;
            }
            
            </style>
            <!-- End Axil Newsletter Area  -->
    </main>

</main>
@endsection
