@extends('front.fixe')
@section('titre', 'Paiement')
@section('body')
    <main>

        <body class="sticky-header">
           

         
            <a href="#top" class="back-to-top" id="backto-top"><i class="fal fa-arrow-up"></i></a>

            <main class="main-wrapper">
                <div class="axil-breadcrumb-area">
                    <div class="container">
                        <div class="row align-items-center">
                            <div class="col-lg-6 col-md-8">
                                <div class="inner">
                                    <ul class="axil-breadcrumb">
                                        <li class="axil-breadcrumb-item"><a href="{{ route('home') }}">
                                                {{ \App\Helpers\TranslationHelper::TranslateText('Accueil') }}</a></li>
                                        <li class="separator"></li>
                                        <li class="axil-breadcrumb-item1 active" aria-current="page"> {{ __('boutique') }}
                                        </li>
                                    </ul>

                                    <h1 class="title">
                                        {{ \App\Helpers\TranslationHelper::TranslateText('Confirmation de votre commande') }}
                                    </h1>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-4">
                                {{-- <div class="inner">
                                    <div class="bradcrumb-thumb">
                                        <img src="{{ Storage::url($config->image_shop) }}" alt="Image">
                                    </div>
                                </div> --}}
                            </div>
                        </div>
                    </div>
                </div>

          
                <div class="axil-checkout-area axil-section-gap">
                    <div class="container">

                        <div>
                            <form  action="{{ route('order.confirm') }}" method="post" >
                                @if ($errors->any())
                                    {!! implode('', $errors->all('<div>:message</div>')) !!}
                                @endif
                                @csrf
                                <div class="row">
                                    <div class="col-lg-6">
                        
                                        <div class="axil-checkout-billing">
                                            <h4 class="title mb--40">
                                                {{ \App\Helpers\TranslationHelper::TranslateText('Détails factures') }}</h4>
                        
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label> {{ \App\Helpers\TranslationHelper::TranslateText('Nom') }}
                                                            <span>*</span></label>
                                                        <input style=" background-color: #fbecec" type="text" name="nom" wire:model.lazy="nom" wire:model.lazy="nom" 
                        
                                                            @if (Auth::user()) value="{{ Auth::user()->nom }}" @endif
                                                            required />
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label>
                                                            {{ \App\Helpers\TranslationHelper::TranslateText('Prénom') }}<span>*</span></label>
                                                        <input style=" background-color: #fbecec" type="text" name="prenom" wire:model.lazy="prenom" wire:model.lazy="prenom"  
                                                            @if (Auth::user()) value="{{ Auth::user()->prenom }}" @endif
                                                            required />
                        
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label>Email <span>*</span></label>
                                                        <input style=" background-color: #fbecec" type="mail" name="email" wire:model.lazy="email" wire:model.lazy="email" 
                                                            @if (Auth::user()) value="{{ Auth::user()->email }}" @endif
                                                            required />
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label>
                                                            {{ \App\Helpers\TranslationHelper::TranslateText('Téléphone') }}<span>*</span></label>
                                                        <input style=" background-color: #fbecec" type="number" name="phone" wire:model.lazy="phone" wire:model.lazy="phone" 
                                                            required />
                        
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label> {{ \App\Helpers\TranslationHelper::TranslateText('Adresse') }}
                                                    <span>*</span></label>
                        
                                                <input style=" background-color: #fbecec" type="text" name="adresse" wire:model.lazy="adresse" wire:model.lazy="adresse" 
                                                    class="mb--15"
                                                    placeholder=" {{ \App\Helpers\TranslationHelper::TranslateText('Votre adresse') }}"
                                                    required />
                                            </div>
                        
                                            <div class="form-group mb-3">
                                                <p wire:loading ></p>
                                                <select  name="country"  id="country_id" wire:model="country_id" wire:model.lazy="country_id" class="form-control"
                                                    style=" background-color: #fbecec">
                                                    <option value=""> {{ \App\Helpers\TranslationHelper::TranslateText('--Choisir pays--') }}</option>
                                                    @foreach ($countries as $country)
                                                        <option value="{{  $country->id }}" >
                                                            {{ $country->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                           
                                            
                        
                        
                        <br><br>
                        
                                            <div class="form-group">
                                                <label>
                                                    {{ \App\Helpers\TranslationHelper::TranslateText('Messge(optionnel)') }}
                                                </label>
                                                <textarea style=" background-color: #fbecec" id="message" rows="2"  wire:model.lazy="note" wire:click="note" 
                                                    placeholder=" {{ \App\Helpers\TranslationHelper::TranslateText('Note sur votre commande(Optionnel)') }}"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="axil-order-summery order-checkout-summery">
                                            <h5 class="title mb--20">
                                                {{ \App\Helpers\TranslationHelper::TranslateText('Votre commande') }}</h5>
                                            <div class="summery-table-wrap">
                                                <table class="table summery-table">
                                                    <thead>
                                                        <tr>
                                                            <th> {{ \App\Helpers\TranslationHelper::TranslateText('Produit') }}
                                                            </th>
                                                            <th>Subtotal</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($paniers as $id => $details)
                                                            <tr class="order-product">
                                                                <td>{{ $details['nom'] }} <span class="quantity">x
                                                                        {{ $details['quantite'] }}</span></td>
                                                                <td> {{ $details['total'] }} <x-devise></x-devise></td>
                        
                                                            </tr>
                                                        @endforeach
                        
                                                        <tr class="order-subtotal">
                                                            <td>Subtotal</td>
                                                            <td>{{ $total }} <x-devise></x-devise></td>
                                                        </tr>
                        
                        
                                                        <tr class="order-shipping">
                        
                                                    <tbody>
                                                        <td colspan="2">
                                                            <tr>
                                                                <td class="tax">
                                                                    {{ \App\Helpers\TranslationHelper::TranslateText('Frais de livraison') }}
                                                                </td>
                                                                <td>{{ $configs->frais ?? 0 }}
                                                                    <x-devise></x-devise>
                                                                </td>
                                                            </tr>
                                                          {{--   <tr>
                                                                <td class="tax">
                                                                    {{ \App\Helpers\TranslationHelper::TranslateText('Coupon de réduction') }}
                                                                </td>
                                                                <td>-{{ session('coupon')['value'] ?? 0 }}
                                                                    <x-devise></x-devise>
                                                                </td>
                                                            </tr> --}}
                                                        </td>
                        
                        
                        
                                                    </tbody>
                                                
                                                    </tr>
                                                    <tr class="order-total">
                                                        <td>Total</td>
                                                        <td class="order-total-amount">{{ $total + $configs->frais ?? 0 }}
                                                            <x-devise></x-devise></td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                        
                                                
                                               
                        
                                               
                                            </div>

                                           {{--  <div class="order-payment-method">
                                                <div class="single-payment">
                                                    <div class="input-group">
                                                        <input type="radio" id="radio4" name="payment">
                                                        <label for="radio4">Direct bank transfer</label>
                                                    </div>
                                                    <p>Make your payment directly into our bank account. Please use your Order ID as the payment reference. Your order will not be shipped until the funds have cleared in our account.</p>
                                                </div>
                                              
                                                <div class="single-payment">
                                                    <div class="input-group justify-content-between align-items-center">
                                                        <input type="radio" id="radio6" name="payment" checked>
                                                        <label for="radio6">Paiement par carte (Stripe)</label>
                                                        <div id="card-element"></div>
                                                        <input type="hidden" name="stripeToken" id="stripeToken">
                                                        <div id="card-errors" class="text-danger"></div>
                                                    </div>
                                                    <p>Pay via PayPal; you can pay with your credit card if you don’t have a PayPal account.</p>
                                                </div>
                                            </div> --}}

                                            
                        
                                           
                        
                                            <button type="submit" class="axil-btn btn-bg-primary2 checkout-btn">
                                                {{ \App\Helpers\TranslationHelper::TranslateText('Confirmation') }}</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>


                        

                     {{--    @livewire('commandes.checkout') --}}
                 
                    </div>
                </div>
                <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
                <script>
                    document.addEventListener("DOMContentLoaded", function() {
    
                        var stripe = Stripe('{{ config('services.stripe.key') }}');
                        // console.log("Test key:", stripe);
                        var elements = stripe.elements();
                        var card = elements.create("card");
                        card.mount("#card-element");
                        var form = document.getElementById("payment-form");
    
                        form.addEventListener("submit", function(event) {
                            event.preventDefault();
                            stripe.createToken(card).then(function(result) {
                                //  console.log("Token Stripe généré avec succès :", result.token.id);
                                document.getElementById("stripeToken").value = result.token.id;
    
    
                                form.submit();
    
                            });
                        });
    
    
                    });
                </script>
    
                <!-- End Checkout Area  -->
                <style>
                /*     .btn-bg-primary2 {
                        background-color: #e40f0f;
                        color: #ffffff;
                        border: none;
                        padding: 10px 20px;
                        border-radius: 5px;
                        text-decoration: none;
                    }
 */
                    .btn-bg-secondary2 {
                        background-color: #EFB121;
                        /* Couleur de fond, bleu dans cet exemple */
                        color: #ffffff;
                        /* Couleur du texte, blanc dans cet exemple */
                        border: none;
                        padding: 10px 20px;
                        /* Optionnel, ajuste la taille */
                        border-radius: 5px;
                        /* Optionnel, arrondit les coins */
                        text-decoration: none;
                        /* Supprime le soulignement */
                    }
                </style>


            </main>

    </main>

@endsection
