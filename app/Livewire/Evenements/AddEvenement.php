<?php

namespace App\Livewire\Evenements;

use App\Models\Event;
use Livewire\WithFileUploads;
use Livewire\Component;

class AddEvenement extends Component
{
    use WithFileUploads;

    public $titre, $description, $email, $image, $image2,
           $meta_description, $autre_description;
    public $updateMode = false;  // Nouvelle variable pour le mode mise à jour
    public $event;  // Ajout d'une variable pour stocker l'événement

    // Mount method to load event details for editing
    public function mount($event = null)
    {
        if ($event) {
            $this->updateMode = true;
            $this->event = $event;
            $this->titre = $event->titre;
            $this->description = $event->description;
            $this->image2 = $event->image;
            $this->meta_description = $event->meta_description;
            $this->autre_description = $event->autre_description;
        }
    }

    // Reset input fields after saving or canceling
    private function resetInputFields()
    {
        $this->titre = '';
        $this->description = '';
        $this->image = '';
        $this->image2 = '';
        $this->meta_description = '';
        $this->autre_description = '';
    }

    // Create or update event
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
            $event = Event::find($this->event->id);
        } else {
            // Création d'un nouvel événement
            $event = new Event();
        }

        // Assignation des données
        $event->titre = $this->titre;
        $event->description = $this->description;
        $event->meta_description = $this->meta_description;
        $event->autre_description = $this->autre_description;

        // Gérer l'image si elle est présente
        if ($this->image) {
            // Si l'événement existe déjà, supprimer l'ancienne image
            if ($this->updateMode && $this->event->image) {
                Storage::disk('public')->delete($this->event->image);
            }
            $event->image = $this->image->store('actualites', 'public');
        }

        // Sauvegarder l'événement
        $event->save();

        // Réinitialiser les champs et afficher le message de succès
        $this->resetInputFields();
        session()->flash('success', $this->updateMode ? 'Événement mis à jour avec succès' : 'Événement ajouté avec succès');

        // Rediriger ou fermer le modal si nécessaire
       // $this->emit('closeModal');  // Si vous utilisez un modal
    }

    // Render the view
    public function render()
    {
        return view('livewire.evenements.add-evenement');
    }
}
