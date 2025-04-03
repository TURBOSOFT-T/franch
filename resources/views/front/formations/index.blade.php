@extends('front.fixe')
@section('titre', 'Accueil')
@section('body')
    <main>
        @php
            $config = DB::table('configs')->first();
            $service = DB::table('services')->get();
            $produit = DB::table('produits')->get();
        @endphp


<body class="sticky-header">

    <main class="main-wrapper">
        <!-- Start Breadcrumb Area  -->
        <div class="axil-breadcrumb-area">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6 col-md-8">
                        <div class="inner">
                            <ul class="axil-breadcrumb">
                              {{--   <li class="axil-breadcrumb-item"><a href="{{ route('home') }}">
                                        {{ \App\Helpers\TranslationHelper::TranslateText('Accueil') }}</a></li>
                                <li class="separator"></li>
                                <li class="axil-breadcrumb-item1 active" aria-current="page">   {{ \App\Helpers\TranslationHelper::TranslateText('Formations') }}
                                </li> --}}
                            </ul>
                            <h1 class="title">
                                {{ \App\Helpers\TranslationHelper::TranslateText('Explorez toutes les formations') }}
                            </h1>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-4">
                        <div class="inner">
                            {{-- <div class="bradcrumb-thumb">
                                <img src="assets/images/product/product-45.png" alt="Image">
                            </div> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Breadcrumb Area  -->
        <!-- Start Shop Area  -->
        <div class="axil-shop-area axil-section-gap bg-color-white">
            <div class="container">
          
                <div class="row row--15">
                    @foreach($formations as $formation)
                    <div class="col-xl-3 col-lg-4 col-sm-6">
                        <div class="axil-product product-style-one has-color-pick mt--40">
                            <div class="thumbnail">
                                <a href="{{ route('details-formation', ['id' => $formation->id, 'slug' => Str::slug(Str::limit($formation->titre, 10))]) }}">
                                    <img style="border-radius: 8px; width: 400px; height: 300px; object-fit: cover;"
                                    src="{{ Storage::url($formation->image) }}" alt="Blog Images">     </a>
                            
                               
                              
                            </div>
                            <div class="product-content">
                                <div class="inner">
                                    <h5 class="title"><a  href="{{ route('details-formation', ['id' => $formation->id, 'slug' => Str::slug(Str::limit($formation->titre, 10))]) }}">
                                        {{ \App\Helpers\TranslationHelper::TranslateText($formation->titre ?? '') }}
                                    </a></h5>
                                    
                                 
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
            
               
                </div>
                
            </div>
            <!-- End .container -->
        </div>
        <!-- End Shop Area  -->
     
        <!-- End Axil Newsletter Area  -->
    </main>



</main>



@endsection
