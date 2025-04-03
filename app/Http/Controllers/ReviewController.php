<?php

namespace App\Http\Controllers;

use App\Models\{notifications, Review, produits, User};
use App\Http\Requests\StoreReviewRequest;
use App\Http\Requests\UpdateReviewRequest;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function __construct()
    {
      $this->middleware('auth');
    }
    public function index()
    {
        //
    }
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
  

    public function store(Request $request, produits $product)
    {
        $request->validate([
            'review' => 'required|string',
            'rate' => 'required|numeric|min:0|max:5',
            'product_id' =>'required|exists:produits,id',
        ]);
        $products = produits::  findOrFail($request['product_id']);
       // dd($products);
        $review = new Review;
        $review->review = $request->review;
        $review->rate = $request->rate;
        $review ->product_id=$request->product_id;
        $review->user_id = auth()->user()->id;

        $products->reviews()->save($review);

       
    
        return redirect()->back()->with('success', 'Le review est ajouté  avec succès!');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @param  \App\Review  $review
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @param  \App\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function destroy1(produits $product, Review $review)
    {
        if (auth()->user()->id !== $review->user_id) {
            return response()->json(['message' => 'Action Forbidden']);
        }
        $review->delete();
        return response()->json(null, 204);
    }


    public function approve($id)
    {
        $review = Review::find($id);
        
        if ($review) {
            $review->active = true; 
            $review->save();
            
            return redirect()->back()
                             ->with('success', 'Témoignage approuvé avec succès.');
        }
    
        return redirect()->back()
                         ->with('error', 'Témoignage introuvable.');
    }

    public function disapprove($id)
{
    $review = Review::find($id);

    if ($review) {
        $review->active = false; 
        $review->save();

        return redirect()->back()
                         ->with('success', 'Review désapprouvée avec succès.');
    }

    return redirect()->back()
                     ->with('error', 'Review introuvable.');
}

 
    public function destroy($id)
    {
        $review = Review::find($id);
    
        if ($review) {
            $review->delete();
    
            return redirect()->back()
                             ->with('success', 'Review supprimée avec succès.');
        }
    
        return redirect()->back()
                         ->with('error', 'Review introuvable.');
    }
}
