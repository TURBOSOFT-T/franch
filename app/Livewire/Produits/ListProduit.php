<?php

namespace App\Livewire\Produits;

use App\Models\produits;
use App\Models\ProduitAttribut;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\historiques_stock;

class ListProduit extends Component
{

    protected $listeners = ['add-stock' => '$refresh'];
    use WithPagination;
    public $key;

    public $selectedProduct, $attribute_name, $attribute_value;
   // public $selectedProduct;
    public $productAttributes = [];
    




    public function render()
    {
        $Query = produits::query();
        if(!is_null($this->key)){
            $Query->where('nom', 'like', '%'.$this->key.'%');
        }
        $produits = $Query->paginate(30);
        $total = produits::count();
        $total_supprimers = produits::onlyTrashed()->count();
        return view('livewire.produits.list-produit',compact('produits','total','total_supprimers'));
    }
    public function openAttributeModal($productId)
    {
        $this->selectedProduct = $productId;
        $this->reset(['attribute_name', 'attribute_value']);
        $this->dispatch('show-attribute-modal'); // Livewire v3
    }
    
    public function saveAttributes()
    {
        if (!$this->selectedProduct) return;
    
        ProduitAttribut::create([
            'produit_id' => $this->selectedProduct,
            'titre' => $this->attribute_name,
            'description' => $this->attribute_value,
        ]);
    
        // Fermer le modal
        $this->dispatch('hide-attribute-modal'); // Livewire v3
        session()->flash('message', 'Attribut ajouté avec succès !');
    }
    public function openViewAttributesModal($productId)
    {
        $this->selectedProduct = $productId;
        $this->productAttributes = ProduitAttribut::where('produit_id', $productId)->get();
        
        // Ou transformer en collection avec collect()
        $this->productAttributes = collect($this->productAttributes);
        
        // Déclencher l'affichage du modal
        $this->dispatch('show-view-attributes-modal');
    }   
    public function deleteAttribute($attributeId)
    {
        $attribute = ProduitAttribut::find($attributeId);
        if ($attribute) {
            $attribute->delete();
           
        // Fermer le modal
        $this->dispatch('hide-attribute-modal'); // Livewire v3
        session()->flash('message', 'Attribut ajouté avec succès !');
        } else {
            session()->flash('error', 'Attribut introuvable.');
        }

        
        
        // Facultatif: pour mettre à jour la liste des attributs après suppression
        $this->productAttributes = ProduitAttribut::all();

     
        // Fermer le modal
        $this->dispatch('hide-attribute-modal'); // Livewire v3
        session()->flash('message', 'Attribut ajouté avec succès !');
    }

    
     // Méthode pour supprimer un attribut
     public function deleteAttribute1($attributeId)
     {
         // Recherche et suppression de l'attribut par ID
         $attribute = ProduitAttribut::find($attributeId);
         
         if ($attribute) {
             $attribute->delete(); // Suppression de l'attribut
             session()->flash('message', 'Attribut supprimé avec succès.');
         } else {
             session()->flash('error', 'Attribut introuvable.');
         }
 
         // Recharger les attributs après la suppression
         $this->productAttributes = ProduitAttribut::where('produit_id', $this->selectedProduct)->get();
 
         // Facultatif: déclencher une mise à jour du DOM
         $this->dispatchBrowserEvent('update-attributes-list');
     }
 
   /*  public $stock;

    public function addStock($produitId)
    {
        $produit = produits::find($produitId);
        $produit->stock += $this->stock;
        $produit->save();

        
       
        $historique_stock = new historiques_stock();
        $historique_stock->quantite = $request->quantite;
       $historique_stock->id_produit = $pro->id;
       $historique_stock->save();
    
        session()->flash('message', 'Stock ajouté avec succès.');
        $this->reset('stock'); 
    }
     */

     public $showModal = false; // Propriété pour contrôler l'affichage du modal
     public $selectedProduit;
     public $stock = 1; // Valeur par défaut pour le stock à ajouter
 
     public function openModal($produitId)
     {
         $this->selectedProduit = $produitId; // Définir le produit sélectionné
         $this->stock = 1; // Réinitialiser la quantité
         $this->showModal = true; // Ouvrir le modal
     }
 
     public function addStock()
     {
         $produit = produits::find($this->selectedProduit);
         if ($produit) {
             $produit->stock += $this->stock;
             $produit->save();
             
        $historique_stock = new historiques_stock();
        $historique_stock->quantite = $this->stock;
       $historique_stock->id_produit = $produit->id;
       $historique_stock->save();
             session()->flash('message', 'Stock ajouté avec succès.');
             $this->showModal = false; // Fermer le modal après l'ajout
         }
     }



    public function delete($id)
    {
        $produit = produits::find($id);
        if ($produit) {
            $produit->delete();
            session()->flash('info', 'Produit supprimé avec succès');
        }
    }




    public function add_top($id)
    {
        $produit = produits::find($id);
        if ($produit) {
            if ($produit->top == 1) {
                $produit->top = 0;
            } else {
                $produit->top = 1;
            }
            $produit->save();
        }
    }





    public function filtrer()
    {
        //reset page
        $this->resetPage();
    }
}
