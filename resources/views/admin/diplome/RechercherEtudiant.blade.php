
<div class="modal fade" id="Rechechermodel" tabindex="-1"  wire:ignore.self  aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="deleteModal">Recherche</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">

          </div>
          <form action="{{ url('admin/diplome/remise/search') }}" method="GET">

            <span class="input-group-text" id="search">
                <i class="mdi mdi-magnify btn"></i>
                 <input name="search" type="text"  class="form-control" placeholder="saisir le code l'etudiant...">

               </span>


            <div class="modal-footer">
                <button  class="btn btn-secondary" >Fermer</button>
                <button type="submit" class="btn btn-primary" data-bs-dismiss="modal">Rechercher</button>

            </div>
          </form>
        </div>
    </div>
</div>
