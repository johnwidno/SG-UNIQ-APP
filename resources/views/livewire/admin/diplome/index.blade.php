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
@include('admin.diplome.voirall')






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
                    <form class="d-flex" action="{{url('admin/diplome/etudiants_par_faculte/liste') }}" method="GET">
                        <select required class="form-select " name="faculte" id="programmeSelect" onchange="redirectToController()">
                            <option value="" disabled selected>Sélectionnez une faculté</option>
                            @foreach ($facultes as $faculte)
                                <option value="{{ $faculte->codeFaculte }}">{{ $faculte->codeFaculte }}</option>
                            @endforeach
                        </select>
                        <button type="submit" class="border-0">Liste par faculte</button>
                    </form>
                     </span>
                </div>

                <div class="col-md-2">
                <!--------------------------- betwen facult and option --->



                    </div>





                <div class="col-md-6">
                    <span class="input-group input-group-text" id="search">
                        <form class="d-flex" action="{{url('admin/diplome/etudiants_par_programme/liste') }}" method="GET">
                            <select required class="form-select " name="codeprogramme" id="programmeSelect" onchange="redirectToController()">
                                <option value="" disabled selected>Sélectionnez une option </option>
                                @foreach ($programmes as $programme)
                                    <option value="{{ $programme->codeProgramme }}">{{ $programme->option }}</option>
                                @endforeach
                            </select>
                            <button type="submit" class="border-0">List par option</button>
                        </form>
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
                          <table class="table " id= "resultTable">
                            <thead>
                               <tr>

                                    <th>Code Etudiant</th>
                                    <th>Prenom</th>
                                    <th>catégorie</th>
                                    <th>fichier</th>
                                    <th>programme</th>
                                    <th>faculté</th>
                                    <th>Date Emission</th>
                                    <th>No Enr. Uniq</th>
                                    <th>Code MNFP</th>
                                     <th>Etat</th>
                                    <th>Livré par </th>
                                    <th>Date livraison</th>
                                    <th>fichier pdf </th>
                                     <th>edite</th>
                                    <th>supprimer</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($diplomes as $diplome)

                                <tr>
                                    <td>{{ $diplome->etudiant->codeEtudiant }}</td>
                                    <td>{{ $diplome->etudiant->nom }}</td>
                                    <td>{{ $diplome->etudiant->prenom }}</td>
                                    <td>{{ $diplome->categorie->nomCategorie }}</td>
                                    <td>{{ $diplome->programme->nomProgramme }}</td>
                                    <td>{{ $diplome->programme->codeFaculte }}</td>
                                    <td>{{ $diplome->DateEmission }}</td>
                                    <td>{{ $diplome->NumeroEnrUniq }}</td>
                                    <td>{{ $diplome->CodeMNFP }}</td>
                                    <td>{{ $diplome->etat }}</td>
                                    <td>{{ $diplome->user->nom }} {{ $diplome->user->prenom }}</td>
                                    <td>{{ $diplome->DateLivraison }}</td>
                                    <td><a target="_new" href="{{ url('/uploads/diplome/'.$diplome->cheminVerfichier.'') }}">{{ $diplome->cheminVerfichier }}</a></td>
               

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
                       <div>  {{ $diplomes->links( ) }}
                        <a class="f" href="/diplome/fullscreen" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            Voir en plein d'ecran
                        </a>

                    </div>
                      </div>
                      <div class="col-md-3">

                          <div><p class="float-end">Total: {{ $dataCount }}</p>

                        </div>
                      </div>
                    </div>





            </div>


        </div>
    </div>
</div>
</div>



