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
            <!--[if lte IE 9]>
        <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
    <![endif]-->
            <a href="#top" class="back-to-top" id="backto-top"><i class="fal fa-arrow-up"></i></a>

            <!-- End Header -->
            <main class="main-wrapper">
                <!-- Start Breadcrumb Area  -->
                <div class="axil-breadcrumb-area">
                    <div class="container">
                        <div class="row align-items-center">
                            <div class="col-lg-6 col-md-8">
                                <div class="inner">
                                    <ul class="axil-breadcrumb">
                                        <li class="axil-breadcrumb-item"><a href="index.html">
                                                {{ \App\Helpers\TranslationHelper::TranslateText('Accueil') }}</a></li>
                                        <li class="separator"></li>
                                        <li class="axil-breadcrumb-item active" aria-current="page">
                                            {{ \App\Helpers\TranslationHelper::TranslateText('Actualités') }}</li>
                                    </ul>
                                    <h1 class="title">
                                        {{ \App\Helpers\TranslationHelper::TranslateText('Les actualités') }}</h1>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-4">
                                <div class="inner">
                                    <div class="bradcrumb-thumb">
                                        <img src="{{ Storage::url($config->image_shop) }}" alt="Image">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Breadcrumb Area  -->
                <!-- Start Blog Area  -->
                <div class="axil-blog-area axil-section-gap">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-8">
                                <div class="row g-5">

                                    @foreach ($events as $event)
                                        <div class="col-md-6">
                                            <div class="content-blog blog-grid">
                                                <div class="inner">
                                                    <div class="thumbnail">
                                                        <a
                                                            href="{{ route('details-actualites', ['id' => $event->id, 'slug' => Str::slug(Str::limit($event->titre, 10))]) }}">
                                                            <img style="border-radius: 8px; width: 400px; height: 300px; object-fit: cover;"
                                                                src="{{ Storage::url($event->image) }}" alt="Blog Images">
                                                        </a>

                                                    </div>
                                                    <div class="content">
                                                        <h5 class="title"><a
                                                                href="{{ route('details-actualites', ['id' => $event->id, 'slug' => Str::slug(Str::limit($event->titre, 10))]) }}">
                                                                {{ \App\Helpers\TranslationHelper::TranslateText($event->titre ?? '') }}
                                                            </a></h5>
                                                        <div class="read-more-btn">
                                                            <a class="axil-btn right-icon"
                                                                href="{{ route('details-actualites', ['id' => $event->id, 'slug' => Str::slug(Str::limit($event->titre, 10))]) }}">
                                                                {{ \App\Helpers\TranslationHelper::TranslateText('Voir plus') }}
                                                                <i class="fal fa-long-arrow-right"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach


                                </div>
                                <div class="post-pagination">
                                    <nav class="navigation pagination" aria-label="Products">
                                        <ul class="page-numbers">
                                            {{ $events->links() }} </ul>
                                    </nav>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <!-- Start Sidebar Area  -->
                                <aside class="axil-sidebar-area">
                                    <div class="axil-single-widget mt--40 widget_search">
                                        <h6 class="widget-title">Search</h6>
                                        <form class="blog-search" role="search" action="{{ url('recherche') }}" method="get">
                                            <button class="search-button"><i class="fal fa-search"></i></button>
                                           {{--  <input type="text" placeholder="Search"> --}}
                                            <input value="{{ $titre ?? '' }}" id="search" type="search" name="search" placeholder="  {{ \App\Helpers\TranslationHelper::TranslateText('Rechercher actualité') }}">

                                        </form>
                                    </div>
                                    <!-- Start Single Widget  -->
                                    <div class="axil-single-widget mt--40">
                                        <h6 class="widget-title">Latest Posts</h6>

                                        <!-- Start Single Post List  -->
                                        @foreach ($lastevents as $event)
                                            <div class="content-blog post-list-view mb--20">
                                                <div class="thumbnail">
                                                    <a  href="{{ route('details-actualites', ['id' => $event->id, 'slug' => Str::slug(Str::limit($event->titre, 10))]) }}">
                                                        <img 
                                                        style="border-radius: 8px; width: 100px; height: 80px; object-fit: cover;" 
                                                        src="{{ Storage::url($event->image) }}" alt="Blog Images">
                                                    </a>
                                                </div>
                                                <div class="content">
                                                    <h6 class="title"><a
                                                            href="{{ route('details-actualites', ['id' => $event->id, 'slug' => Str::slug(Str::limit($event->titre, 10))]) }}">
                                                            {{ \App\Helpers\TranslationHelper::TranslateText($event->titre ?? '') }}
                                                        </a></h6>
                                                    <div class="axil-post-meta">
                                                        <div class="post-meta-content">
                                                            <ul class="post-meta-list">
                                                                <li>

                                                                    {{ \Carbon\Carbon::parse($event->created_at)->format('d F Y') }}
                                                                </li>

                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                        <!-- End Single Post List  -->

                                    </div>
                                 

                                    <!-- End Single Widget  -->

                                </aside>
                                <!-- End Sidebar Area -->
                            </div>
                        </div>
                        <!-- End post-pagination -->
                    </div>
                    <!-- End .container -->
                </div>
                <!-- End Blog Area  -->


                <!-- End Axil Newsletter Area  -->
            </main>


    </main>
    </main>


@endsection
