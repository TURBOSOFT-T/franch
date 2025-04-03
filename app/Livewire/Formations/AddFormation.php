<?php

namespace App\Livewire\Formations;

use App\Models\Formation;
use Livewire\Component;
use Livewire\WithFileUploads;

class AddFormation extends Component
{

    use WithFileUploads;

    public $titre, $description, $email, $image, $image2,
           $meta_description, $autre_description;
    public $updateMode = false;  // Nouvelle variable pour le mode mise à jour
    public $formation;  // Ajout d'une variable pour stocker l'événement



    public function mount($formation = null)
    {
        if ($formation) {
            $this->updateMode = true;
            $this->formation = $formation;
            $this->titre = $formation->titre;
            $this->description = $formation->description;
            $this->image2 = $formation->image;
           // $this->meta_description = $formation->meta_description;
           // $this->autre_description = $formation->autre_description;
        }
    }
    private function resetInputFields()
    {
        $this->titre = '';
        $this->description = '';
        $this->image = '';
        $this->image2 = '';
        $this->meta_description = '';
        $this->autre_description = '';
    }

    // Create or update formation
    public function create()
    {
        // Validation des inputs
        $data = $this->validate([
            'titre' => 'required|string',
            'description' => 'required|string|max:210060',
            'meta_description' => 'nullable|string|max:20255',
            'autre_description' => 'nullable|string|max:1000255',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp',
        ], [
            'titre.required' => 'Le titre est requis',
            'description.required' => 'Veuillez entrer une description',
            'image.mimes' => 'Veuillez choisir une image de type jpg,jpeg,png,webp',
        ]);

        if ($this->updateMode) {
            // Mise à jour de l'événement existant
            $formation = Formation::find($this->formation->id);
        } else {
            // Création d'un nouvel événement
            $formation = new Formation();
        }

        // Assignation des données
        $formation->titre = $this->titre;
        $formation->description = $this->description;
      //  $formation->meta_description = $this->meta_description;
      //  $formation->autre_description = $this->autre_description;

        // Gérer l'image si elle est présente
        if ($this->image) {
            // Si l'événement existe déjà, supprimer l'ancienne image
            if ($this->updateMode && $this->formation->image) {
                Storage::disk('public')->delete($this->formation->image);
            }
            $formation->image = $this->image->store('formations', 'public');
        }

        // Sauvegarder l'événement
        $formation->save();

        // Réinitialiser les champs et afficher le message de succès
        $this->resetInputFields();
        session()->flash('success', $this->updateMode ? 'Événement mis à jour avec succès' : 'Événement ajouté avec succès');

        // Rediriger ou fermer le modal si nécessaire
       // $this->emit('closeModal');  // Si vous utilisez un modal
    }
    public function render()
    {
        return view('livewire.formations.add-formation');
    }
}
