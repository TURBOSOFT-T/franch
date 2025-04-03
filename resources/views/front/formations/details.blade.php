@extends('front.fixe')
@section('titre', $formation->titre)
@section('body')

    @php

        $config = DB::table('configs')->first();
    @endphp

    <head>
    @section('formation')
    <meta name="csrf-token" content="{{ csrf_token() }}">

        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="robots" content="index, follow">
        <meta name="author" content="marisa-belle.com">

        <meta name="description" content="{{ $formation->description ?? ' ' }}">
        <meta name="author" content="autodreieck-gmbh.com">
        <meta property="og:title" content="{{ $formation->titre }}">
        <meta property="og:description" content="{{ $formation->description ?? '' }}">
        <meta property="og:brand" content="{{ $formation->marques->titre ?? '' }}">
        <meta property="og:image" content="{{ $formation->image }}">
        <meta property="og:type" content="product">

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
                                            src="{{ Storage::url($formation->image) }}" height="600" width="600"
                                            alt="Product image" style="transition: transform 0.3s ease;" />
                                    </div>


                                </div>
                                <br><br>

                                {{--  <div class="nav nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                    @foreach (json_decode($formation->photos) ?? [] as $image)
                                        <div class="slider__item">
                                            <img onclick="changeMainImage('{{ Storage::url($image) }}')"
                                                src="{{ Storage::url($image) }}" width="100" height="100"
                                                style="border-radius: 8px;" alt="Additional product image" />
                                        </div>
                                    @endforeach
                                </div> --}}
                            </div>





                        </div>

                        <div class="col-lg-5 mb--40">
                            <div class="single-product-content">
                                <div class="inner">
                                    <h3 class="product-title">
                                        {{ \App\Helpers\TranslationHelper::TranslateText($formation->titre) }}</h3>


                                    <div class="product-rating">

                                    </div>
                                    <ul class="product-meta">



                                        {{-- <li><span style="color: #EFB121">
                                                {{ \App\Helpers\TranslationHelper::TranslateText('Categorie') }}:</span>
                                            <span style="color: #5EA13C">

                                                {{ \App\Helpers\TranslationHelper::TranslateText(Str::limit($formation->categories->titre, 30)) }}
                                            </span></li> --}}

                                        {{--  <li> <span style="color: #EFB121">
                                                {{ \App\Helpers\TranslationHelper::TranslateText('Reference') }}:</span>
                                            <span style="color: #5EA13C">{{ $formation->reference }}</span></li> --}}
                                    </ul>
                                    <p class="description">

                                        {!! \App\Helpers\TranslationHelper::TranslateText(Str::limit($formation->description, 1100000)) !!}
                                    </p>

                                    <div class="product-variations-wrapper">









                                        <div class="product-variation product-size-variation">

                                        </div>


                                    </div>
                                    <br><br>
                                    <!-- Start Product Action Wrapper  -->
                                    <div class="product-action-wrapper d-flex-center">
                                        <!-- Start Quentity Action  -->




                                        <!-- End Quentity Action  -->

                                        <!-- Start Product Action  -->
                                        <ul class="product-action d-flex-center mb--0">

                                            <li class="select-option2">
                                                <a href="javascript:void(0);" data-bs-toggle="modal"
                                                    data-bs-target="#inscriptionModal"
                                                    data-formation-id="{{ $formation->id }}">
                                                    {{ \App\Helpers\TranslationHelper::TranslateText("S'inscrire") }}
                                                </a>
                                            </li>

                                            <style>
                                                .select-option2 {
                                                    background-color: #d86f6f;
                                                    color: #ffffff;
                                                    border: none;
                                                    padding: 10px 20px;
                                                    border-radius: 5px;
                                                    text-decoration: none;
                                                }
                                            </style>
                                            {{--   <li class="add-to-cart"><a onclick="AddToCart( {{ $formation->id }} )"
                                                    class=" badge  btn-bg-primary2">Ajouter au panier</a></li> --}}




                                            <style>
                                                .btn-bg-primary2 {
                                                    background-color: #5EA13C;
                                                    color: #ffffff;
                                                    border: none;
                                                    padding: 10px 20px;
                                                    border-radius: 5px;
                                                    text-decoration: none;
                                                }
                                            </style>
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

                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="description" role="tabpanel"
                            aria-labelledby="description-tab">
                            <div class="product-desc-wrapper">
                                <div class="row">
                                    <div class="col-lg-12 mb--30">
                                        <div class="single-desc">

                                            <p>
                                                {!! \App\Helpers\TranslationHelper::TranslateText($formation->description ?? ' ') !!}
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

                    </div>
                </div>
            </div>
            <!-- woocommerce-tabs -->

        </div>
        <!-- End Shop Area  -->



        <style>
            .axil-breadcrumb-item1 {
                font-size: 14px;
                color: #EFB121;
                /* Default breadcrumb color */
            }

            .axil-breadcrumb-item.active {
                font-weight: bold;
                color: #EFB121;
                /* Distinct color for active item */
            }

            .axil-breadcrumb-item:not(.active)::after {
                content: " / ";
                /* Adds a separator after non-active items */
                color: #EFB121;
            }
        </style>
        <!-- End Axil Newsletter Area  -->


        <script>
            $(document).ready(function() {
                // Initialisation de Slick
                $('.recent-product-activation').slick({
                    slidesToShow: 1, // titrebre de formations visibles à la fois
                    slidesToScroll: 1, // titrebre de formations à défiler à chaque fois
                    infinite: true, // Défilement en boucle
                    autoplay: true, // Défilement automatique
                    autoplaySpeed: 3000, // Vitesse de défilement en millisecondes
                    arrows: true, // Afficher les flèches de navigation
                    dots: false, // Désactiver les points de pagination
                    responsive: [{
                            breakpoint: 1024,
                            settings: {
                                slidesToShow: 3
                            }
                        },
                        {
                            breakpoint: 768,
                            settings: {
                                slidesToShow: 2
                            }
                        },
                        {
                            breakpoint: 480,
                            settings: {
                                slidesToShow: 1
                            }
                        }
                    ]
                });
            });
        </script>

        <style>
            .recent-product-activation {
                display: flex;
                gap: 15px;
                /* Espace entre les formations */
            }

            .slick-slide {
                display: inline-block;
                /* Assure que les formations restent sur une ligne */
            }
        </style>



        <!-- Modal d'inscription -->
        <div class="modal fade" id="inscriptionModal" tabindex="-1" aria-labelledby="inscriptionModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="inscriptionModalLabel">Inscription à la formation: {{$formation->titre}}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        
                        <form id="inscriptionForm">
                            @csrf
                            <input type="hidden" name="formation_id" id="formationId">
                            <div class=" row mb-3">
                            <div class="col-sm-6 mb-3">
                                <label for="userName" class="form-label">
                                    {{ \App\Helpers\TranslationHelper::TranslateText('Nom') }}
                                </label>
                                <input type="text" class="form-control" name="nom" id="userName"  style="background-color: #e4e7d8;" required>
                            </div>

                            <div class="col-sm-6 mb-3">
                                <label for="userName" class="form-label"> 
                                    {{ \App\Helpers\TranslationHelper::TranslateText('Prénom') }}
                                </label>
                                <input type="text" class="form-control" name="prenom" id="prenom"  style="background-color: #e4e7d8;" required>
                            </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-sm-6 mb-3">
                                    <label for="userName" class="form-label">
                                        {{ \App\Helpers\TranslationHelper::TranslateText('Ville') }}
                                    </label>
                                    <input type="text" class="form-control" name="ville" id="ville"  style="background-color: #e4e7d8;" required>
                                </div>
    
                                <div class="col-sm-6 mb-3">
                                    <label for="userName" class="form-label">
                                        {{ \App\Helpers\TranslationHelper::TranslateText('Téléphone') }}
                                    </label>
                                    <input type="number" class="form-control" name="telephone" id="telephone"  style="background-color: #e4e7d8;" required>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="userName" class="form-label">
                                    {{ \App\Helpers\TranslationHelper::TranslateText('Adresse') }}
                                </label>
                                <input type="text" class="form-control" name="addresse" id="adresse"  style="background-color: #e4e7d8;" required>
                            </div>
                           

                            <div class="mb-3">
                                <label for="userEmail" class="form-label">Email

                                </label>
                                <input type="email" class="form-control" name="email" id="userEmail" style="background-color: #e4e7d8;"  required>
                            </div>

                            <div class="mb-3">
                                <label for="message" class="form-label">
                                    {{ \App\Helpers\TranslationHelper::TranslateText('Message') }}
                                </label>
                                <textarea class="form-control" name="message" id="message" rows="6" style="background-color: #e4e7d8;" required></textarea>
                            </div>
                            
                            <button type="submit" class="select-option2">Confirmer l'inscription</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <script>
          document.addEventListener("DOMContentLoaded", function() {
    var inscriptionModal = document.getElementById('inscriptionModal');
    inscriptionModal.addEventListener('show.bs.modal', function(event) {
        var button = event.relatedTarget;
        var formationId = button.getAttribute('data-formation-id');
        document.getElementById('formationId').value = formationId;
    });

    document.getElementById("inscriptionForm").addEventListener("submit", function(e) {
        e.preventDefault();

        var formData = new FormData(this);
        fetch("{{ route('inscriptions.store') }}", {
                method: "POST",
                headers: {
                    "Accept": "application/json", // Indique à Laravel que tu veux une réponse JSON
                    "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').content
                },
                body: formData
            })
            .then(response => response.json().catch(() => response.text())) // Gère les erreurs JSON
            .then(data => {
                if (data.success) {
                    Swal.fire("Succès", "Votre inscription a été enregistrée !", "success");
                    document.getElementById("inscriptionForm").reset();
                    var modal = bootstrap.Modal.getInstance(inscriptionModal);
                    modal.hide();
                } else {
                    Swal.fire("Erreur", data.message || "Une erreur est survenue", "error");
                }
            })
            .catch(error => {
                console.error("Erreur:", error);
                Swal.fire("Erreur", "Problème lors de l'inscription", "error");
            });
    });
});

        </script>


    </main>

</main>
@endsection
