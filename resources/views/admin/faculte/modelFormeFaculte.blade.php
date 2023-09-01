<div wire:ignore.self class="modal fade" id="FaculteModel" tabindex="-1" aria-labelledby="FaculteModelLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="FaculteModelLabel">Ajouter une faculté</h1>


          @if(session('message'))
          <br>
          <small><div class="alert alert-succes text-white bg-danger">{{ session('message')  }}

          </div></small>

          @endif

          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form  action="{{ url('admin/facultes') }}" method="POST" enctype="multipart/form-data">
            @csrf
        <div class="modal-body">
            <div class="mb-3">
                <label for="">Sigle /Code Facule</label>
                <input name='CodeFaculte'  wire:model.defer='CodeFaculte' type="text" class="form-control">
                @error('CodeFaculte')
                <div class="error  text-danger">{{ $message }}</div>
            @enderror

            </div>

            <div class="mb-3">
                <label for="">Nom</label>
                <input name="nom" wire:model.defer='nom' type="text" class="form-control">
                @error('nom')
                <div class="error  text-danger">{{ $message }}</div>
            @enderror
            </div>


       </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
          <button type="submit" class="btn btn-primary">Ajouter</button>
        </div>
        </form>
      </div>
    </div>
</div>
