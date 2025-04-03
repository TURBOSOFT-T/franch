<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('commandes', function (Blueprint $table) {
            $table->id();
            $table->enum("statut", ['créé','attente','livraison' ,'traitement', 'En cours livraison', 'livrée', 'payée','planification','retournée'])->default('attente');
          
                $table->enum("mode", ["espèce","paypal","carte de credit"])->default("espèce");
            $table->enum("etat",["attente","confirmé","annulé"])->default("attente") ;
            $table->text("note")->nullable()->default(null);
            $table->string("nom")->nullable();
            $table->string("prenom")->nullable();
            $table->float('coupon')->nullable();
            $table->string("adresse")->nullable();
            $table->string("phone")->nullable();
            $table->string("email")->nullable();
            $table->string("pays")->nullable();
            $table->string("gouvernorat")->nullable();
            $table->decimal("frais", 10,3)->nullable();
            $table->unsignedBigInteger('country_id')->nullable();
            $table->unsignedBigInteger('state_id')->nullable();
            $table->unsignedBigInteger('city_id')->nullable();
            $table->unsignedBigInteger('user_id')->nullable()->default(null);
            $table->enum('payment_method', ['stripe', 'bank_transfer'])->default('bank_transfer'); // Mode de paiement
            $table->enum('payment_status', ['pending', 'paid', 'failed'])->default('pending'); // Statut du paiement
            $table->string('transaction_id')->nullable(); // ID de transaction Stripe (si applicable)
       
           
            $table->timestamps();


            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('commandes');
    }
};