<div>

    <div class="modal fade" id="deleteproggModal" tabindex="-1"  wire:ignore.self  aria-labelledby="deleteproggModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h1 class="modal-title fs-5" id="deleteproggModal">Suppression</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
               <h5>Etre vous sure de vouloir supprimer ?</h5>
              </div>
              <form  wire:submit.prevent="destroyEtudiant">
                <div class="modal-footer">
                    <button  class="btn btn-secondary" >Fermer</button>
                    <button type="submit" class="btn btn-primary" data-bs-dismiss="modal">Supprimer</button>

                </div>
              </form>
            </div>
        </div>
    </div>



   <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    @if(session('message'))
                        <br>
                        <small><div class="alert alert-succes text-white bg-danger">{{ session('message')  }}
                            <a href="" class="float-end text-white">refresh</a>
                        </div></small>

                        @endif
                    <h4> </h5>Programmes</h5>
                     <a href="programme/addprogramme" class="float-end btn bg-primary text-white" >Ajouter une faculte</a>
                    </h4>

                </div>

                <div class="card-body">
                    <table class="table table-border table-striped">
                        <thead>
                            <tr>
                                <th>Code programe</th>
                                <th>Nom Programme</th>
                                <th>OPtion</th>
                                <th>Editer</th>
                                <th>Supprimer</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($programmes as $programme)
                            <tr>
                                <td> {{ $programme->codeProgramme }}</td>
                                <td> {{ $programme->nomProgramme }}</td>
                                <td> {{ $programme->option }}</td>
                                <td>
                                    <a class="btn   bg-success" href="{{ url('admin/programme/'.$programme->codeProgramme.'/editerpage') }}" >
                                      <i class=" bg-success mdi mdi-pencil-circle text-white"></i>
                                    </a>
                                </td>

                                <td>
                                    <button class="btn  bg-danger " wire:click="deleteprogramme('{{ $programme->codeProgramme }}')" data-code="{{ $programme->codeProgramme}}" data-bs-toggle="modal" data-bs-target="#deleteproggModal">
                                    <i class="mdi mdi-delete-circle  bg-danger text-white"></i>
                                    </button>
                                </td>
                           </tr>
                        @endforeach

                        </tbody>
                    </table>
                    <div class="row">
                        <div class="col-md-12">
                          <div>{{ $programmes->links() }} <p class="float-end">Total:{{ $dataCountprogramme }}</p></div>
                       </div>
                   </div>
                </div>



            </div>
        </div>
    </div>
</div>
