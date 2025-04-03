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
        Schema::create('produit_attributs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('produit_id')->nullable(); // Lien avec la table produits
            $table->string('titre')->nullable(); // Nom de l’attribut (ex: "Couleur", "Taille")
            $table->string('description')->nullable(); // Val
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produit_attributs');
    }
};
