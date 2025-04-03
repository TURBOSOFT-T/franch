<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;
use App\Models\{Category,Service, config, Marque, produits,Event, favoris, Formation};

class HomeComposer
{
 
    public function compose(View $view)
    {
        $view->with([
          //  'categories' => Category::has('produits')->take(8)->get(),
           'categories' => Category::has('produits')->get(), // Pour la catégorie page
           // 'categories' => Category::all(), // Pour la catégorie page
            'searchproducts' => produits::select('*')->latest()->take(5)->get(),
            'events' => Event::select('*')->latest()->take(3)->get(),
            'lastevents' => Event::select('*')->latest()->take(5)->get(),
            'formations' => Formation::select('*')->latest()->take(4)->get(),
            'lastformations' => Formation::orderBy('created_at', 'desc')->take(4)->get(),
          //  'produits' => produits::select('*')->latest()->take(9)->get(),
            'lastproduits' => produits::orderBy('created_at', 'desc')->take(9)->get(),
           'marques' => Marque::all(),

          //  'marques' =>Marque::has('produits')->take(6)->get(), /// Pour le home page
            'brands' =>Marque::has('produits')->get(), // Pour le  sop page
          // 'categorie'=>Category::all(),
            'configs' => config::all(),
            'services'=>Service::all(),
            'favoris'=>Favoris::where('id_produit', '!=', null)
            ->where('id_user', auth()->id() )->get(),
        ]);
    }
}