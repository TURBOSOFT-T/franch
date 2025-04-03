<?php

namespace App\Livewire\Reviews;

use App\Models\produits;
use App\Models\Review;
use Livewire\Component;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
class AddReviews extends Component
{


  

    public $product;
    
    public $review;
    public $rate= 0;
    public $produit;
    public $product_id;

    protected $rules = [
        'rate' => 'required|integer|between:1,5',
        'review' => 'required',
   
       'product_id' =>'required|exists:produits,id',


       

    ];

    public function messages()
    {
        return [
            'rate.required' => 'Veuillez sélectionner une note.',
            'rate.integer' => 'La note doit être un nombre entier.',
            'rate.min' => 'La note minimale est de 1.',
            'rate.max' => 'La note maximale est de 5.'
        ];
    }



    public function mount($product)
    {
        // Assurez-vous de récupérer l'ID du produit
        $this->product_id = is_object($product) ? $product->id : $product;
    }

    public function setRating($rate)
    {
        $this->rate = $rate;
    }


    public function submitReview()
    {
        $this->validate();
        
        Review::create([
          
            'review' => $this->review,
            'rate' => $this->rate,
            'product_id' => $this->product->id,
            'user_id' => auth()->user()->id,
        ]);

        session()->flash('success', 'Votre avis a été soumis avec succès !');

        $this->reset([ 'review', 'rate']);
    }


    public function update(Request $request, produits $product, Review $review)
    {
        if (auth()->user()->id !== $review->user_id) {
            return response()->json(['message' => 'Action Forbidden']);
        }
        $request->validate([
            'review' => 'required|string',
            'rating' => 'required|numeric|min:0|max:5',
        ]);

        $review->review = $request->review;
        $review->rating = $request->rating;
        $review->save();

        return response()->json(['message' => 'Review Updated', 'review' => $review]);
    }
 
    public function render()
    {  
     
        return view('livewire.reviews.add-reviews');
    }

    
    public function destroy(produits $product, Review $review)
    {
        if (auth()->user()->id !== $review->user_id) {
            return response()->json(['message' => 'Action Forbidden']);
        }
        $review->delete();
        return response()->json(null, 204);
    }

}
