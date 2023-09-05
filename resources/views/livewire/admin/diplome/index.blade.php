<div>

<!-- Modal -->
<div wire:ignore.self  class="modal fade" id="DiplomeModel" tabindex="-1" aria-labelledby="DiplomeModellLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="DiplomeModellLabel">Supression de diplome</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <h5>Etre vous sure de vouloir supprimer ?</h5>
            </div>
                <form  wire:submit.prevent="destroyDiplomeremis">
                    <div class="modal-footer">
                        <button  class="btn btn-secondary" >Fermer</button>
                        <button type="submit" class="btn btn-primary" data-bs-dismiss="modal">Supprimer</button>

                    </div>
                </form>


      </div>
    </div>
</div>





@include('admin.diplome.RechercherEtudiant')





  <div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">


             @if(session('message'))
                 <small>
                 <div id="displayindeuxseconde" class="alert alert-succes text-white bg-success">{{ session('message')  }}
                     <a href="" class="float-end text-white">refresh</a>
                 </div>

                 </small>
             @endif
             <div class="row">
                     <div class="col-md-6">
                         <h6 class="">Diplomes</h6>
                         <br>
                     </div>

                 <div class="col-md-6">
                     <a href="" class="btn btn-primary float-end "  data-bs-toggle="modal" data-bs-target="#Rechechermodel">Effectuer une remise </a>

                 </div>

             </div>

             <div class="row">

               <br>
               <div class="col-md-4">
                    <span class="input-group input-group-text" id="search">
                    <select name="codeFaculte" class="form-select ">
                        <option selected>Tous les facultes</option>
                        @foreach ($facultes as $faculte)

                        <option value="{{ $faculte->codeFaculte}}">{{ $faculte->codeFaculte }}  -  {{ $faculte->nom }} </option>
                        @endforeach
                   </selecT>
                     </span>
                </div>

                <div class="col-md-4">
                <!--------------------------- betwen facult and option --->
                    </div>

                <div class="col-md-4">
                    <span class="input-group input-group-text" id="search">
                        <select onclick="idu" name="codeFaculte" class="form-select"  >
                            <option selected>Tous le Programe </option>
                            @foreach ($programmes as $programme)

                            <option value="{{ $programme->option}}">{{ $programme->option }}  -  {{ $programme->nomProgramme }} </option>
                            @endforeach
                       </selecT>
                         </span>
                    </div>
            </div>



            <div class="card-body">
                       <div class="row">
                        <div class="col-md-6"> <p>Table des Diplomes</p></div>
                        <div class="col-md-6">
                            <a href="" class="float-end"> import file  </a>
                            <a href="" class="float-end">export file - </a>
                        </div>
                       </div>
                        <div class="table-responsive pt-1">
                          <table class="table ">
                            <thead>
                               <tr>
                                    <th>No</th>
                                    <th>Code Etudiant</th>
                                    <th>Nom Et Prenom</th>
                                    <th>fichier</th>
                                    <th>categorie</th>
                                    <th>Date Emission</th>
                                    <th>No Enr. Uniq</th>
                                    <th>Code MNFP</th>
                                    <th>Etat</th>
                                    <th>user</th>
                                    <th>Date ceation</th>
                                    <th>edite</th>
                                    <th>supprimer</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($diplomes as $diplome)
                                <tr>
                                    <td>{{ $diplome->id }}</td>
                                    <td>{{ $diplome->codeEtudiant }}</td>
                                    <td>john pierre-widno Dorcy</td>
                                    <td> <a target="_new" href="{{ url('/uploads/diplome/'.$diplome->cheminVerfichier.'') }}">{{ $diplome->cheminVerfichier }}</a></td>
                                    <td>{{ $diplome->categorie }}</td>
                                    <td>{{ $diplome->DateEmission }}</td>
                                    <td>{{ $diplome->NumeroEnrUniq }}</td>
                                    <td>{{ $diplome->CodeMNFP }}</td>
                                    <td>{{ $diplome->status }}</td>
                                    <td>{{ $diplome->user_id }}</td>
                                    <td>{{ $diplome->created_at }}</td>
                                    <td><a href=" {{ url('admin/diplome/'.$diplome->id.'/'.$diplome->codeEtudiant.'/edit') }}"> <i class="mdi mdi-pencil-circle btn  bg-dark text-white"></i> </a></td>
                                    <td>
                                        <button class="btn  bg-danger " wire:click="deleteremise('{{ $diplome->id }}')" data-code="{{ $diplome->id }}" data-bs-toggle="modal" data-bs-target="#DiplomeModel">
                                            <i class="mdi mdi-delete-circle  bg-danger text-white"></i>
                                        </button>
                                    </td>




                                </tr>
                                @endforeach
                            </tbody>
                          </table>
                        </div>



                    <div class="row">
                      <div class="col-md-9">
                          <div> {{ $diplomes->links( ) }}   </div>
                      </div>
                      <div class="col-md-3">
                          <div><p class="float-end">Total: {{ $dataCount }}</p></div>
                      </div>
                    </div>





            </div>


        </div>
    </div>
</div>
</div>
