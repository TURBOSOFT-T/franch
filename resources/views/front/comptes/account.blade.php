@extends('front.fixe')
@section('titre', 'Mo compte ')
@section('body')


    <main>



        <!-- Start Breadcrumb Section -->
        <div class="breadcrumb-section">
            <div class="container">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">
                                {{ \App\Helpers\TranslationHelper::TranslateText('Accueil') }}</a></li>
                        <li class="breadcrumb-item active" aria-current="page">
                            {{ \App\Helpers\TranslationHelper::TranslateText('Boutique') }}</li>
                        <li class="breadcrumb-item active" aria-current="page">
                            {{ \App\Helpers\TranslationHelper::TranslateText('Mon compte') }}</li>
                    </ol>
                </nav>
            </div>
        </div>

        <div class="axil-dashboard-area axil-section-gap">
            <div class="container">
                <div class="axil-dashboard-warp">

                    <div class="row">
                        <div class="col-xl-3 col-md-4">
                            <aside class="axil-dashboard-aside">
                                <nav class="axil-dashboard-nav">
                                    <div class="nav nav-tabs" role="tablist">
                                        <a class="nav-item nav-link active" data-bs-toggle="tab" href="#nav-dashboard"
                                            role="tab" aria-selected="true"><i class="fas fa-th-large"></i>Dashboard</a>
                                        <a class="nav-item nav-link" data-bs-toggle="tab" href="#nav-orders" role="tab"
                                            aria-selected="false"><i class="fas fa-shopping-basket"></i>
                                            {{ \App\Helpers\TranslationHelper::TranslateText('Mes commandes') }}</a>
                                        <a class="nav-item nav-link" data-bs-toggle="tab" href="#nav-favoris" role="tab"
                                            aria-selected="false">
                                            <i class="fas fa-heart"></i>
                                            {{ \App\Helpers\TranslationHelper::TranslateText('Mes favoris') }}
                                        </a>

                                        {{-- <a class="nav-item nav-link" data-bs-toggle="tab" href="#nav-downloads" role="tab" aria-selected="false"><i class="fas fa-file-download"></i> {{ \App\Helpers\TranslationHelper::TranslateText('Mes favoris') }}</a>
                                --}} {{--   <a class="nav-item nav-link" data-bs-toggle="tab" href="#nav-avis" role="tab" aria-selected="false"><i class="fas fa-file-download"></i> {{ \App\Helpers\TranslationHelper::TranslateText('Mes avis') }}</a>
                                   --}} <a class="nav-item nav-link"
                                            data-bs-toggle="tab" href="#nav-avis" role="tab" aria-selected="false">
                                            <i class="fas fa-comments"></i>
                                            {{ \App\Helpers\TranslationHelper::TranslateText('Mes avis') }}
                                        </a>

                                        <a class="nav-item nav-link" data-bs-toggle="tab" href="#nav-account" role="tab"
                                            aria-selected="false"><i class="fas fa-user"></i>
                                            {{ \App\Helpers\TranslationHelper::TranslateText('Mon profile') }}</a>

                                        <a class="nav-item nav-link" href="{{ route('logout') }}"
                                            onclick="event.preventDefault();   document.getElementById('logout-form').submit();"><i
                                                class="fal fa-sign-out"></i>
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                                class="d-none">
                                                @csrf
                                            </form>

                                            {{ \App\Helpers\TranslationHelper::TranslateText('Déconnexion') }}
                                        </a>
                                    </div>
                                </nav>
                            </aside>
                        </div>
                        <div class="col-xl-9 col-md-8">
                            <div class="tab-content">
                                <div class="tab-pane fade show active" id="nav-dashboard" role="tabpanel">
                                    <div class="axil-dashboard-overview">
                                        <div class="tab-pane fade show active" id="v-pills-dashboard" role="tabpanel"
                                            aria-labelledby="v-pills-dashboard-tab">
                                            <div class="dashboard-area box--shadow">


                                                <div class="row pt-1 g-1">

                                                    <div class="col-md-3 col-sm-6">
                                                        <div class="dashboard-card hover-border1 wow fadeInDown"
                                                            data-wow-duration="1.5s" data-wow-delay=".6s">
                                                            <div class="header">
                                                                <h5>{{ \App\Helpers\TranslationHelper::TranslateText('Mes commandes') }}
                                                                </h5>
                                                            </div>
                                                            <div class="row body">
                                                                <div class="col-sm-6 col-6 counter-item">
                                                                    <h2>{{ $totalCommand ?? '00' }}</h2>
                                                                </div>
                                                                <div class="col-sm-6 col-6 icon">
                                                                    <i class="fas fa-shopping-cart"
                                                                        style="font-size: 50px; color: #3498db;"></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>


                                                    <div class="col-md-3 col-sm-6">
                                                        <div class="dashboard-card hover-border1 wow fadeInDown"
                                                            data-wow-duration="1.5s" data-wow-delay=".4s">
                                                            <div class="header">
                                                                <h5>
                                                                    {{ \App\Helpers\TranslationHelper::TranslateText('Commandes en cours') }}
                                                                </h5>
                                                            </div>
                                                            <div class=" row body">
                                                                <div class=" col-sm-6 col-6counter-item">
                                                                    <h2>{{ $commandesEnCours ?? '00' }}</h2>
                                                                </div>
                                                                <div class=" col-sm-6 col-6icon">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="50"
                                                                        height="50" viewBox="0 0 50 50">
                                                                        <path
                                                                            d="M10.5364 0.0619668C9.98562 0.212036 9.33157 0.562198 8.96439 0.89235C8.76932 1.07243 7.5645 2.79323 6.29083 4.72412C5.01717 6.645 3.18125 9.42629 2.20592 10.887C1.24206 12.3476 0.358527 13.7183 0.243782 13.9384C0.0487155 14.3085 0.037241 15.239 0.0028176 30.2859C-0.00865689 39.7603 0.0142921 46.5134 0.083139 46.9136C0.324103 48.4543 1.57482 49.6048 3.30747 49.895C4.13363 50.035 45.8548 50.035 46.681 49.895C47.5072 49.7549 48.1842 49.4447 48.7808 48.9245C49.4119 48.3743 49.7676 47.754 49.9053 46.9636C50.0316 46.1932 50.0316 14.8888 49.9053 14.3185C49.848 14.0684 49.0333 12.7378 47.8629 10.967C46.7843 9.34625 44.8795 6.49493 43.6403 4.62407C42.401 2.75321 41.2192 1.07243 41.0241 0.89235C40.8175 0.702262 40.4045 0.432138 40.0832 0.292073L39.5095 0.0219484L25.1664 0.00193914C17.2834 -0.00806548 10.697 0.0219484 10.5364 0.0619668ZM23.3878 7.62546V12.3776H14.2082H5.02864L5.18928 12.1475C5.28108 12.0275 6.34821 10.4167 7.55303 8.57589C8.76932 6.73504 10.1233 4.6941 10.5593 4.0438L11.3511 2.87326H17.3637H23.3878V7.62546ZM40.4848 5.62453C41.4716 7.10522 42.8141 9.13615 43.4682 10.1266C44.1222 11.1171 44.7303 12.0275 44.8221 12.1475L44.9828 12.3776H35.8491H26.7154V7.62546V2.87326L32.6936 2.89327L38.6833 2.92329L40.4848 5.62453ZM46.681 30.9862C46.681 46.5634 46.681 46.6935 46.4515 46.8936C46.222 47.0937 46.0729 47.0937 24.9942 47.0937C3.91562 47.0937 3.76645 47.0937 3.53696 46.8936C3.30747 46.6935 3.30747 46.5634 3.30747 30.9862V15.279H24.9942H46.681V30.9862Z" />
                                                                        <path
                                                                            d="M30.7315 26.094C30.5708 26.1541 28.7005 27.7148 26.5662 29.5656L22.6993 32.9372L21.1159 31.5666C19.234 29.9358 18.8554 29.7657 17.9259 30.1459C17.3293 30.396 17.0424 30.8863 17.0998 31.5466L17.1572 32.1068L19.4406 34.0977C20.6913 35.1982 21.8617 36.1687 22.0338 36.2487C22.4354 36.4288 23.078 36.4288 23.4796 36.2487C23.8583 36.0686 32.7165 28.3251 32.9001 28.0149C33.0952 27.6748 33.0493 26.9744 32.7969 26.6143C32.4067 26.054 31.5003 25.8239 30.7315 26.094Z" />
                                                                    </svg>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-3 col-sm-6">
                                                        <div class="dashboard-card hover-border1 wow fadeInDown"
                                                            data-wow-duration="1.5s" data-wow-delay=".6s">
                                                            <div class="header">
                                                                <h5>{{ \App\Helpers\TranslationHelper::TranslateText('Mes favoris') }}
                                                                </h5>
                                                            </div>
                                                            <div class="row body">
                                                                <div class="col-sm-6 col-6 counter-item">
                                                                    <h2>{{ $totalFavoris ?? '00' }}</h2>
                                                                </div>
                                                                <div class="col-sm-6 col-6 icon">
                                                                    <i class="fas fa-heart"
                                                                        style="font-size: 30px; color: #e74c3c;"></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-3 col-sm-6">
                                                        <div class="dashboard-card hover-border1 wow fadeInDown"
                                                            data-wow-duration="1.5s" data-wow-delay=".6s">
                                                            <div class="header">
                                                                <h5>{{ \App\Helpers\TranslationHelper::TranslateText('Mes avis') }}
                                                                </h5>
                                                            </div>
                                                            <div class="row body">
                                                                <div class="col-sm-6 col-6 counter-item">
                                                                    <h2>{{ $totalAvis ?? '00' }}</h2>
                                                                </div>
                                                                <div class="col-sm-6 col-6 icon">
                                                                    <i class="fas fa-comment-dots"
                                                                        style="font-size: 30px; color: #f39c12;"></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>



                                                </div>

                                                <table class="table table-striped">
                                                    <thead>
                                                        <tr>
                                                            <th>Icône</th>
                                                            <th>Section</th>
                                                            <th>Nombre</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <!-- Commandes -->
                                                        <tr>
                                                            <td>
                                                                <i class="fas fa-shopping-cart"
                                                                    style="font-size: 30px; color: #3498db;"></i>
                                                            </td>
                                                            <td>Mes commandes</td>
                                                            <td>{{ $totalCommand ?? '00' }}</td>
                                                        </tr>

                                                        <!-- Avis -->
                                                        <tr>
                                                            <td>
                                                                <i class="fas fa-comment-dots"
                                                                    style="font-size: 30px; color: #f39c12;"></i>
                                                            </td>
                                                            <td>Mes avis</td>
                                                            <td>{{ $totalAvis ?? '00' }}</td>
                                                        </tr>

                                                        <!-- Favoris -->
                                                        <tr>
                                                            <td>
                                                                <i class="fas fa-heart"
                                                                    style="font-size: 30px; color: #e74c3c;"></i>
                                                            </td>
                                                            <td>Mes favoris</td>
                                                            <td>{{ $totalFavoris ?? '00' }}</td>
                                                        </tr>
                                                    </tbody>
                                                </table>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="nav-orders" role="tabpanel">
                                    <div class="axil-dashboard-order">
                                        <div class="table-responsive">
                                            <table class="table">
                                                <thead>
                                                    <tr>

                                                        <th scope="col">
                                                            {{ \App\Helpers\TranslationHelper::TranslateText('Produit') }}
                                                        </th>

                                                        <th scope="col">
                                                            {{ \App\Helpers\TranslationHelper::TranslateText('Montant') }}
                                                        </th>
                                                        <th scope="col">
                                                            {{ \App\Helpers\TranslationHelper::TranslateText('Frais') }}
                                                        </th>
                                                        <th scope="col">
                                                            {{ \App\Helpers\TranslationHelper::TranslateText('Date') }}
                                                        </th>
                                                        <th scope="col">
                                                            {{ \App\Helpers\TranslationHelper::TranslateText('Status') }}
                                                        </th>
                                                        <th scope="col">Action</th>

                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @forelse ($commandes as $key => $commande)
                                                        <tr>
                                                            <td data-label="Image">
                                                                {{ $commande->contenus->count() }}
                                                            </td>
                                                            <td data-label="Order ID"> {{ $commande->montant() }}
                                                                <x-devise></x-devise></td>
                                                            <td data-label="Product Details"> {{ $commande->frais ?? 0 }}
                                                                <x-devise></x-devise></td>
                                                            <td data-label="price"> {{ $commande->created_at }}</td>
                                                            <td data-label="Status" class="text-green">
                                                                {{ $commande->statut }}
                                                            </td>
                                                            <td>
                                                                {{-- <a href="{{ route('print_commande', ['id' => $commande->id]) }}"
                                                            class="axil-btn view-btn">
                                                         
                                                            <span>Facture</span>
                                                        </a> --}}

                                                                <a href="{{ route('print_commande', ['id' => $commande->id]) }}"
                                                                    class="axil-btn btn-bg-primary2">


                                                                    {{ \App\Helpers\TranslationHelper::TranslateText('Facture') }}</a>
                                                            </td>
                                                        </tr>
                                                    @empty
                                                        <tr>
                                                            <td colspan="6 ">

                                                                <div class="text-center p-5"><img width="50"
                                                                        height="50"
                                                                        src="https://img.icons8.com/?size=100&id=15867&format=png&color=000000"
                                                                        alt="shopping-cart--v1" />
                                                                    <br>
                                                                    <h5>

                                                                        {{ \App\Helpers\TranslationHelper::TranslateText('Pas de commandes enregistrées pour le moment') }}.
                                                                    </h5>

                                                                </div>
                                                            </td>
                                                        </tr>
                                                    @endforelse



                                                </tbody>
                                            </table>

                                            <div class="table-pagination">

                                                <nav class="shop-pagination">
                                                    <ul class="pagination-list">
                                                        {{ $commandes->links('pagination::bootstrap-4') }}
                                                    </ul>
                                                </nav>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="nav-favoris" role="tabpanel">
                                    <div class="axil-dashboard-order">
                                        <p> {{ \App\Helpers\TranslationHelper::TranslateText('Mes favoris') }}</p>
                                        @livewire('Front.Favoris')
                                    </div>
                                </div>


                                <div class="tab-pane fade" id="nav-avis" role="tabpanel">
                                    <div class="axil-dashboard-order">
                                        <p> {{ \App\Helpers\TranslationHelper::TranslateText('Mes favoris sur les produits') }}
                                        </p>
                                        {{--   @livewire('Front.Favoris') --}}


                                        @include('components.alert')

                                        <div class="table-responsive-sm">
                                            <table id="basic-datatable"
                                                class="table table-striped dt-responsive nowrap w-100">
                                                <thead class="table-dark cusor">
                                                    <tr>

                                                        <th>Nom </th>


                                                        <th>Message</th>
                                                     <th>Produits</th>
                                                        <th>Notes</th>
                                                        <th> Date</th>
                                                        <th style="text-align: right;">
                                                            <span wire:loading>
                                                                <img src="https://i.gifer.com/ZKZg.gif" width="20"
                                                                    height="20" class="rounded shadow" alt="">
                                                            </span>
                                                        </th>
                                                    </tr>
                                                </thead>

                                                <tbody>
                                                    @forelse ($reviews as $review)
                                                        <tr>
                                                            <td>
                                                                <span class="hover-flip-item">
                                                                    <span
                                                                        data-text="Cameron Williamson">{{ $review->user->prenom }}
                                                                        {{ $review->user->nom }}</span>
                                                                </span>

                                                            </td>
                                                            <td>
                                                                <p>“ {{ $review->review }} ” </p>

                                                            </td>


                                                            <td>
                                                                <img src="{{ Storage::url($review->products->photo) }}"
                                                                    alt="{{ $review->products->nom }}" width="50"
                                                                    height="50">
                                                                {{ $review->product->nom ?? '' }}

                                                            </td>


                                                            <td>
                                                                <span class="commenter-rating ratiing-four-star">


                                                                    @for ($i = 1; $i <= 5; $i++)
                                                                        @if ($review->rate > $i)
                                                                            <i class="fas fa-star"></i>
                                                                        @else
                                                                            <i class="fas fa-star-0"></i>
                                                                        @endif
                                                                    @endfor


                                                                </span>
                                                            </td>
                                                        



                                                            <td>{{ $review->created_at->format('d/m/Y') }} </td>
                                                            <td style="text-align: right;">
                                                                <div class="btn-group">

                                                                    <form
                                                                        action="{{ route('reviews.destroy', $review->id) }}"
                                                                        method="POST">
                                                                        @csrf
                                                                        <input name="_method" type="hidden"
                                                                            value="DELETE">
                                                                        <button type="submit"
                                                                            class="btn btn-xs btn-danger btn-flat show_confirm"
                                                                            data-toggle="tooltip" title='Delete'><svg
                                                                                xmlns="http://www.w3.org/2000/svg"
                                                                                viewBox="0 0 24 24" width="20"
                                                                                style="background-color: #e0610d22; fill:#dbd7d7;"
                                                                                height="22" fill="currentColor">
                                                                                <path
                                                                                    d="M6.45455 19L2 22.5V4C2 3.44772 2.44772 3 3 3H21C21.5523 3 22 3.44772 22 4V18C22 18.5523 21.5523 19 21 19H6.45455ZM13.4142 11L15.8891 8.52513L14.4749 7.11091L12 9.58579L9.52513 7.11091L8.11091 8.52513L10.5858 11L8.11091 13.4749L9.52513 14.8891L12 12.4142L14.4749 14.8891L15.8891 13.4749L13.4142 11Z">
                                                                                </path>
                                                                            </svg></button>

                                                                    </form>


                                                                </div>
                                                                <!-- Bouton Modifier -->



                                                            </td>
                                                        </tr>
                                                    @empty
                                                        <tr>
                                                            <td colspan="7" class="p-5 text-center">
                                                                <img width="100" height="100"
                                                                    src="https://img.icons8.com/dotty/100/578b07/testimonial-card.png"
                                                                    alt="testimonial-card" />
                                                                <br>
                                                                <h6>
                                                                    Aucun témoignage trouvé.
                                                                </h6>
                                                            </td>
                                                        </tr>
                                                    @endforelse

                                                </tbody>


                                            </table>
                                        </div>
                                        {{ $reviews->links('pagination::bootstrap-4') }}

                                    </div>
                                </div>

                                <div class="tab-pane fade" id="nav-account" role="tabpanel">
                                    <div class="col-lg-12">
                                        <div class="row">

                                            <div class="col-xl-8">

                                                <div class=" mb-4">
                                                    <div class="card-header">
                                                        {{ \App\Helpers\TranslationHelper::TranslateText('Mon profile') }}
                                                    </div>
                                                    <br>
                                                    <div class="">
                                                        @livewire('Profiles.Information')
                                                    </div>
                                                </div>
                                            </div>


                                            <div class="col">

                                                <div class="col-xl-24">

                                                    <div class=" mb-4">
                                                        <div class="card-header">
                                                            {{ \App\Helpers\TranslationHelper::TranslateText('Sécurité') }}
                                                        </div>
                                                        <br>
                                                        <div class="">
                                                            @livewire('Profiles.UpdateProfile')
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>




    </main>

@endsection
