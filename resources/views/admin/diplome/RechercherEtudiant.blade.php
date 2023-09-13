
<div class="modal fade" id="Rechechermodel" tabindex="-1"  wire:ignore.self  aria-labelledby="dRechechermodelLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="Rechechermodel">Recherche</h1>
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


<div class="modal fade" id="makeaslivre" tabindex="-1"  wire:ignore.self  aria-labelledby="makeaslivremodelLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title fs-5" id="makeaslivre">Changer l'etat du diplome</h4>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>

          <form action="{{ url('admin/diplome/recherche/livre/search') }}" method="GET">
            <span class="input-group-text" id="search">

                 <select name="" id="" class="form-select">livre
                    <option value="">livre</option>
                    <option value="">nomlivre</option>
                    <option value="">livre</option>

                 </select>
               </span>


            <div class="modal-footer">
                <button type="submit" class="btn btn-primary" data-bs-dismiss="modal">changer</button>

            </div>
          </form>
        </div>
    </div>
</div>

