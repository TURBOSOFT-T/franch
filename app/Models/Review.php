<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;
    protected $fillable = [
    'user_id',
    'product_id',
    'review',
            'rate',
            'active',
    ];

    public function products()
    {
        return $this->belongsTo(produits::class, 'product_id','id');
    }

    public function product1()
    {
        return $this->hasOne(produits::class, 'product_id','id');
    }

    
    public function product()
    {
        return $this->belongsTo(produits :: class, 'product_id', 'id');
    }

    /**
     * Get the user that made the review.
     */
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
