@extends('front.fixe')
@section('titre', 'Détails actualité')

<head>
@section('actualite')
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="robots" content="index, follow">


<meta name="description" content="{{ $event->description ?? ' ' }}">
<meta name="author" content="marisa-belle.com">
<meta property="og:title" content="{{ $event->titre }}">
<meta property="og:description" content="{{ $event->description ?? '' }}">

<meta property="og:image" content="{{ $event->image }}">
<meta property="og:type" content="product">

<meta name="robots" content="index, follow">


@endsection

</head>
@section('body')
    <main>
        @php
            $config = DB::table('configs')->first();

        @endphp



        <body class="sticky-header overflow-md-visible">
            <!--[if lte IE 9]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
        <![endif]-->

            <main class="main-wrapper">
                <!-- Start Blog Area  -->
                <div class="axil-blog-area axil-section-gap">

                    <!-- End .single-post -->
                    <div class="post-single-wrapper position-relative">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-1">
                                    <div class="d-flex flex-wrap align-content-start h-100">
                                        <div class="position-sticky sticky-top">
                                            <div class="post-details__social-share">

                                                <div class="social-share">
                                                    <a href="{{ $config->facebook ?? ' ' }}" class="social-icon"><i
                                                            class="fab fa-facebook-f"></i></a>
                                                    <a href="{{ $config->instagram ?? ' ' }}" class="social-icon"><i
                                                            class="fab fa-instagram"></i></a>

                                                    <a href="{{ $config->linkedin ?? ' ' }}" class="social-icon"><i
                                                            class="fab fa-linkedin-in"></i></a>
                                                    <a href="{{ $config->tiktok ?? ' ' }}" class="social-icon"><i
                                                            class="fab fa-tiktok"></i></a> <!-- TikTok ajouté ici -->

                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-7 axil-post-wrapper">
                                    <div class="post-heading">
                                        <h2 class="title">
                                            {{ \App\Helpers\TranslationHelper::TranslateText($event->titre ?? '') }}</h2>
                                        <div class="axil-post-meta">

                                            <div class="post-meta-content">

                                                <ul class="post-meta-list">
                                                    <li> {{ \Carbon\Carbon::parse($event->created_at)->format('d F Y') }}
                                                    </li>

                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    {{--  <p>
                                        {!! \App\Helpers\TranslationHelper::TranslateText($event->description ?? '') !!}
                                    </p>
 --}}


                                    <div class="content-blog format-quote mt--10 mb--50 mb_sm--30">
                                        <div class="inner">
                                            <div class="content">
                                                <blockquote>
                                                    <p>“
                                                        {!! \App\Helpers\TranslationHelper::TranslateText($event->meta_description ?? '') !!}

                                                        ”</p>
                                                </blockquote>

                                            </div>
                                        </div>
                                    </div>



                                    <div class="post-details wp-block-columns alignwide has-2-columns">
                                        <div class="wp-block-column">
                                            <figure class="wp-block-image is-resized">
                                                <img 
                                                style="border-radius: 8px; width: 700px; height: 500px; object-fit: cover;" 
                                                class="img-fluid" src="{{ Storage::url($event->image) }}"
                                                    alt="blog image">
                                            </figure>

                                        </div>

                                    </div>

                                    <p>
                                        {!! \App\Helpers\TranslationHelper::TranslateText($event->description ?? '') !!}

                                        </p>

                                    <p>
                                        {!! \App\Helpers\TranslationHelper::TranslateText($event->autre_description ?? '') !!}

                                    </p>


                                    <!-- End .axil-commnet-area -->

                                    <!-- Start Comment Respond  -->

                                    <!-- End Comment Respond  -->
                                </div>

                                <div class="col-lg-4">
                                    <!-- Start Sidebar Area  -->
                                    <aside class="axil-sidebar-area">

                                        <div class="axil-single-widget mt--40 widget_search">
                                            <h6 class="widget-title">Search</h6>
                                            <form class="blog-search" role="search" action="{{ url('recherche') }}"
                                                method="get">
                                                <button class="search-button"><i class="fal fa-search"></i></button>
                                                {{--  <input type="text" placeholder="Search"> --}}
                                                <input value="{{ $titre ?? '' }}" id="search" type="search"
                                                    name="search"
                                                    placeholder="  {{ \App\Helpers\TranslationHelper::TranslateText('Rechercher actualité') }}">

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
                        </div>
                    </div>
                </div>
                <!-- End Blog Area  -->


                <!-- End Axil Newsletter Area  -->

            </main>




    </main>
    </main>


@endsection
