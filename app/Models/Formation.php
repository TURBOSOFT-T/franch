<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Formation extends Model
{
    use HasFactory;

    protected $fillable = [
        'titre',
        'description',
        'image',
        'date_debut',
        'date_fin',
    ];

    public function inscriptions()
    {
        return $this->hasMany(Inscription::class);
    }
}
