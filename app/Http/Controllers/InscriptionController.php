<?php

namespace App\Http\Controllers;
use App\Mail\ConfirmationMail;
use Illuminate\Support\Facades\Mail;

use App\Models\Inscription;
use App\Http\Requests\StoreInscriptionRequest;
use App\Http\Requests\UpdateInscriptionRequest;
use Illuminate\Http\Request;

class InscriptionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    public function store(Request $request)
{
    try {
        $request->validate([
            'formation_id' => 'required|exists:formations,id',
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'ville' => 'required|string|max:255',
            'telephone' => 'required|string|max:20',
            'addresse' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:inscriptions,email',
            'message' => 'nullable|string'
        ]);

    $inscription=    Inscription::create($request->all());
     //   Mail::to($inscription->email)->send(new ConfirmationMail($inscription->nom, $inscription->prenom, $inscription->email));


        return response()->json(['success' => true, 'message' => 'Inscription réussie !']);
    } catch (\Exception $e) {
        return response()->json(['success' => false, 'message' => $e->getMessage()], 500);
    }
}


    /**
     * Display the specified resource.
     */
    public function show(Inscription $inscription)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Inscription $inscription)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateInscriptionRequest $request, Inscription $inscription)
    {
        //
    }


       
  public function destroy($id)
  {
   $formation=   Inscription::find($id);

   if ($formation) {
      

      // Supprimer le formation
      $formation->delete();

   
  return redirect()->back()
  ->with('success', 'Inscription supprimée avec succès.');
  } else {
      return redirect()->back()('error', 'formation non trouvé.');
  }
  }
    
}
