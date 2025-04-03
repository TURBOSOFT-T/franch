<div>
    @if (session()->has('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <!-- Formulaire de création et de mise à jour d'événement -->
    <form wire:submit.prevent="{{ $updateMode ? 'update' : 'create' }}">
        <!-- Titre -->
        <div class="form-group">
            <label for="titre">Titre</label>
            <input type="text" id="titre" wire:model="titre" class="form-control" placeholder="Entrer le titre">
            @error('titre') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <!-- Description -->
        <div class="form-group">
            <label for="description">Description</label>
            <textarea id="description" wire:model="description" class="form-control" rows="4" placeholder="Entrer la description"></textarea>
            @error('description') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <!-- Meta Description -->
        <div class="form-group">
            <label for="meta_description">Meta Description</label>
            <input type="text" id="meta_description" wire:model="meta_description" class="form-control" placeholder="Entrer la meta description">
            @error('meta_description') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <!-- Autre Description -->
        <div class="form-group">
            <label for="autre_description">Autre Description</label>
            <textarea id="autre_description" wire:model="autre_description" class="form-control" rows="4" placeholder="Entrer une autre description"></textarea>
            @error('autre_description') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <!-- Image -->
        <div class="form-group">
            <label for="image">Image</label>
            <input type="file" id="image" wire:model="image" class="form-control">
            @error('image') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        @if ($image2)
            <div class="form-group">
                <label for="image2">Image actuelle</label>
                <img src="{{ Storage::url('events/' . $image2) }}" alt="Image actuelle" width="150">
            </div>
        @endif

        <!-- Boutons de soumission -->
        <div class="form-group">
            <button type="submit" class="btn btn-primary">{{ $updateMode ? 'Mettre à jour' : 'Ajouter' }}</button>
            <button type="button" wire:click="resetInputFields" class="btn btn-secondary">Annuler</button>
        </div>
    </form>
</div>
