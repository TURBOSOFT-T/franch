<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProduitAttribut extends Model
{
    use HasFactory;
    
    protected $fillable = ['produit_id', 'titre', 'description'];

 

    public function produit()
    {
        return $this->belongsTo(produits::class, 'produit_id'); // Assurez-vous que la colonne est correcte ici
    }
}
