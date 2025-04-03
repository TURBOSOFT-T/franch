<div>
    <div>

        @if (session()->has('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <form wire:submit.prevent="create">
            <div class="modal-body">
                  @include('components.alert') 
                <div class="row">
                    <div class="col-sm-6">
                        <div class="mb-3">
                            <label for="name" class="form-label">
                                Titre  *
                            </label>
                            <input type="text" id="titre" wire:model="titre" class="form-control">
                            @error('titre')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

{{-- 
                    <div class="col-sm-6">
                        <div class="mb-3">
                            <label for="description">Meta Description</label>
                            <textarea id="meta_description" wire:model="meta_description" class="form-control"></textarea>
                            @error('meta_description')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
 --}}


                    <div class="col-sm-6">
                        <div class="mb-3">
                            <label for="description">Description</label>
                            <textarea id="description" wire:model="description" class="form-control"></textarea>
                            @error('description')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    {{-- <div class="col-sm-6">
                        <div class="mb-3">
                            <label for="description"> Autre Description</label>
                            <textarea id="description" wire:model="autre_description" class="form-control"></textarea>
                            @error('autre_description')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div> --}}


                    <div class="col-sm-6">
                        <div class="mb-3">
                            <label for="name" class="form-label">
                                Image
                            </label>
                            <input type="file" class="form-control" wire:model="image">
                            @error('image')
                                <span class="text-danger small"> {{ $message }} </span>
                            @enderror
                        </div>

                        @if ($image)
                        <div class="mt-2">
                            <strong>Image prévisualisée :</strong>
                            <img src="{{ $image->temporaryUrl() }}" width="100" height="100" alt="Image prévisualisée">
                        </div>
                    @endif
                    </div>

                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-sm btn-primary">
                    <span wire:loading>
                        <img src="https://i.gifer.com/ZKZg.gif" height="15" alt="" srcset="">
                    </span>
                    Enregistrer
                </button>
            </div>
        </form>



    </div>


</div>
