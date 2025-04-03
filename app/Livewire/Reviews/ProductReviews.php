<?php

namespace App\Livewire\Reviews;

use App\Models\produits;
use Livewire\Component;

class ProductReviews extends Component
{


    public $product;
    public $reviews;
    public $averageRating;

    public function mount(produits $product)
    {
        $this->product = $product;
        $this->loadReviews();
    }

    public function loadReviews()
    {
        $this->reviews = $this->product->reviews()->latest()->get();
        $this->averageRating = $this->product->reviews()->avg('rate');
    }
    public function render()
    {
        return view('livewire.reviews.product-reviews');
    }
}
