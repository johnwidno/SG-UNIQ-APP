
<div class="modal fade" id="displayerror" tabindex="-1"  wire:ignore.self  aria-labelledby="dRechechermodelLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="Rechechermodel">Recherche</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <small id="displayerror"><div class="alert alert-succes text-white bg-danger"   data-bs-toggle="modal" data-bs-target="#displayerror">{{ session('message')  }} </div></small>


          </div>

        </div>
    </div>
</div>
