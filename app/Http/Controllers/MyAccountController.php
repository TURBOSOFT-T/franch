<?php

namespace App\Http\Controllers;

use App\Models\commandes;
use App\Models\config;
use App\Models\historiques_connexion;
use App\Models\{produits, Category, favoris as ModelsFavoris, Review as ModelsReview};
use App\Models\User;
use App\Models\views;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ExportUser;
use App\Http\Traits\ListGouvernorats;
use App\Models\clients;
use App\Models\contenu_commande;
use App\Models\domaines;
use App\Models\notifications;
use App\Models\templates;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use App\Mail\{OrderChangeStatuts, ChangeStatut};
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Notification;

class MyAccountController extends Controller
{
    use ListGouvernorats;




     public function comptes(){

        $commandes= commandes::where('user_id', auth()->id() )->get();
        return view('front.comptes.commandes' , compact('commandes'));
     }

     public function favories(){
        
        return view('front.comptes.favories');
     }
     
public function profile(){
    return view('front.comptes.profile');
}

public function account(){

    //$commandes= commandes::where('user_id', auth()->id() )->get();
    $commandes = commandes::where('user_id', auth()->id())->latest()->paginate(10);
    $favoris = ModelsFavoris::where('id_user', auth()->id())->latest()->paginate(10);
    $reviews =  ModelsReview::where('user_id', auth()->id())->latest()->paginate(10);
   // $totalCommand = $commandes->count();
    $totalCommand = commandes::where('user_id', auth()->id())
    ->WhereIn('statut',[ 'livrée', 'payée'])
    ->count();
    $totalFavoris = ModelsFavoris::where('id_user', auth()->id())->count();
    $totalAvis = ModelsReview::where('user_id', auth()->id())->count();
    $commandesEnCours = commandes::where('user_id', auth()->id())
    ->whereIn('statut', ['attente' ,'traitement', 'En cours livraison','planification'])
    ->count();

    

    return view('front.comptes.account', compact('commandes', 'totalCommand','totalFavoris','favoris','commandesEnCours', 'totalAvis', 'reviews'));

}





    public function add_note(Request $request)
    {
        $id_commande = $request->input('id_commande');
        $note = $request->input("note");

        $commande = commandes::find($id_commande);
        $commande->note = $note;
        if (!$commande) {
            return redirect()
                ->route("commandes")
                ->with("error", "Commande introuvable!");
        }
        $commande->save();
        return redirect()
            ->route("commandes")
            ->with("success", "La note a été ajouté a la commande.");
    }





    public function produits_update($id)
    {
        $produit = produits::find($id);
        if (!$produit) {
            $message = "Produit non disponible !";
            abort(404, $message);
        }
        return view('admin.produits.update', compact('produit'));
    }


    public function historique($id)
    {
        $produit = produits::find($id);
        if (!$produit) {
            $message = "Produit non disponible !";
            abort(404, $message);
        }
        return view('admin.produits.historique', compact('produit'));
    }



    public function commandes()
    {
        return view('comptes.commandes.list');
    }

    public function parametres()
    {
        $connexions = historiques_connexion::Orderby("id", "Desc")
            ->where('user_id', Auth::id())
            ->get();

        $ipAddress = request()->ip();
        return view('admin.parametres.index', compact('connexions'));
    }



    public function details_commande($id)
    {
        $commande = commandes::find($id);
        if (!$commande) {
            $message = "Commande introuvable !";
            abort(404, $message);
        }
        return view('admin.commandes.details', compact('commande'));
    }



    public function promotions($id = null)
    {
        if ($id !== null) {
            $produit = Produits::find($id);
            if (!$produit) {
                abort(404);
            }
        } else {
            $produit = null;
        }
        return view('admin.promotions.index', compact('produit'));
    }


    public function clients()
    {
        return view('admin.clients.list');
    }



    public function contact_admin()
    {
        return view('admin.parametres.contact');
    }

    public function delete_personnel($id)
    {
        $user = User::where("id", '=', $id)->first();
        if ($user) {
            $user->delete();
            return redirect()->back()->with('success', 'Personnel supprimé avec succès!');
        }
    }


    public function update_permission(Request $request)
    {

        $selectedPermissions = $request->input('permissions', []);
        $user = User::findOrFail($request->input('id'));
        $user->syncPermissions($selectedPermissions);
        return redirect()
            ->back()
            ->with('success', 'Permissions mises à jour avec succès.');
    }
}
