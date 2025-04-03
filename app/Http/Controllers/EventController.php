<?php

namespace App\Http\Controllers;

use App\Models\{Event, config};
use App\Http\Requests\StoreEventRequest;
use App\Http\Requests\UpdateEventRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Http\Requests\Front\SearchRequest;
use Illuminate\Support\Facades\Validator;

class EventController extends Controller
{

    public function events()
{
    $events = Event::paginate(10); 
    return view('admin.evenements.list', compact('events') );
}

public function evenements(){
    $events = Event::paginate(10); 
    $lastevents = Event::latest()->take(8)->get();
    return view('front.evenements.index', compact('events', 'lastevents') );
}

public function details($id){
    $event =Event:: findOrFail($id);
    $configs= config::all();
    $lastevents = Event::latest()->take(8)->get();
    return view('front.evenements.details', compact('event','configs','lastevents'));
}

public function recherche(SearchRequest $request)
{
    $search = $request->search;
    $lastevents = Event::latest()->take(8)->get();
  
    $events = Event::where('titre', 'like', '%'.$search.'%')
      ->orWhere('description', 'like', '%'.$search.'%')
        ->paginate(10);
    $titre = __('Actualité nont trouvée avec la recherche: ') . '<strong>' . $search . '</strong>';
 
    return view('front.evenements.index', compact('events', 'titre', 'lastevents'));
}
    public function destroy($id)
    {
     $event=   Event::find($id);

     if ($event) {
        // Supprimer l'image si elle existe
        if($event->image ?? ' '){
            Storage::disk('public')->delete($event->image ?? ' '); 
        }

        // Supprimer le event
        $event->delete();

     
    return redirect()->back()
    ->with('success', 'Event supprimé avec succès, ainsi que son image.');
    } else {
        return redirect()->back()('error', 'event non trouvé.');
    }
    }

    
    public function event_update($id){

        $event = Event::find($id);
       if (!$event) {
            $message = "Actualité non disponible !";
            abort(404, $message);
        } 
        
     //  dd($event);
        return view('admin.evenements.update', compact('event'));
    }

      
    public function update(Request $request, $id)
    {
        // Validation des données
        $validator = Validator::make($request->all(), [
           // 'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
           'image' => 'nullable|image|max:4048',
            'titre' => 'required|string|max:255',
            

            
        ], [
           'image.mimes' => 'Le format de l\'image doit être jpeg, png, jpg ou gif.',
           'image.max' => 'La taille de l\'image ne doit pas dépasser 2MB.',
           'titre.required' => 'Le titre est requis.',
           'titre.max' => 'Le titre ne doit pas dépasser 255 caractères.',
        
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Trouver le sponsor
        $sponsor = Event::findOrFail($id);

        // Traitement de l'image
        if ($request->hasFile('image')) {
            // Supprimer l'ancienne image si nécessaire
            if($sponsor->image ?? ' '){
                Storage::disk('public')->delete($sponsor->image ?? ' '); 
            }

           
            $path = $request->file('image')->store('actualites', 'public');
            $sponsor->image = $path;
        }

        
        $sponsor->titre = $request->input('titre');
        $sponsor->description = $request->input('description');

      
        $sponsor->save();

        return redirect()->back()->with('success', 'Actualité mise à jour avec succès !');
    
    }

}



