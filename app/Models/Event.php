<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;
    protected $fillable = [
        'titre',
        'start',
        'end',
        'limit',
        'description',
        'image',
        'meta_description',
        'autre_description',
    ];
   
}
