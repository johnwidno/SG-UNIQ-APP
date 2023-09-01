
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">


             @if(session('message'))
                 <small>
                 <div class="alert alert-succes text-white bg-success">{{ session('message')  }}
                     <a href="" class="float-end text-white">refresh</a>
                 </div>

                 </small>
             @endif
             <div class="row">
                     <div class="col-md-6">
                         <h6 class="">Tous Les Diplomes</h6>
                         <br>
                     </div>

                 <div class="col-md-6">
                     <a href="{{ url('admin/diplome/remise') }}" class="btn btn-primary float-end ">Effectuer une remise</a>

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
                         <span class="input-group input-group-text" id="search">
                             <input wire:model="searchQuery" type="text"  class="form-control " placeholder="saisir le code l'etudiant...">
                             <i class="mdi mdi-magnify btn"></i>
                           </span>
                    </div>
                <div class="col-md-4">
                    <span class="input-group input-group-text" id="search">
                        <select name="codeFaculte" class="form-select ">
                            <option selected>Tous le Programe </option>
                            @foreach ($programmes as $programme)

                            <option value="{{ $programme->option}}">{{ $programme->option }}  -  {{ $faculte->nom }} </option>
                            @endforeach
                       </selecT>
                         </span>
                    </div>
            </div>



            <div class="card-body">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-tab-pane" type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true">Diplome</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile-tab-pane" type="button" role="tab" aria-controls="profile-tab-pane" aria-selected="false">FAculte</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact-tab-pane" type="button" role="tab" aria-controls="contact-tab-pane" aria-selected="false">En cours de traitement</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="disabled-tab" data-bs-toggle="tab" data-bs-target="#disabled-tab-pane" type="button" role="tab" aria-controls="disabled-tab-pane" aria-selected="false" disabled>all</button>
                            </li>
                        </ul>



                            <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
                                    <table class="table table-hover">

                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Code Etudiant</th>
                                                <th>fichier</th>
                                                <th>categorie</th>
                                                <th>Date Emission</th>
                                                <th>No Enr. Uniq</th>
                                                <th>Code MNFP</th>
                                                <th>Etat</th>
                                                <th>utilisateur</th>
                                                <th>Date ceation</th>
                                                <th>action</th>

                                            </tr>
                                            </thead>
                                            <tbody>

                                                @foreach ($diplomes as $diplome)
                                                <tr>
                                                    <td>{{ $diplome->id }}</td>
                                                    <td>{{ $diplome->codeEtudiant }}</td>
                                                    <td> <a target="_new" href="{{ url('/uploads/diplome/'.$diplome->cheminVerfichier.'') }}">{{ $diplome->cheminVerfichier }}</a></td>
                                                    <td>{{ $diplome->categorie }}</td>
                                                    <td>{{ $diplome->DateEmission }}</td>
                                                    <td>{{ $diplome->NumeroEnrUniq }}</td>
                                                    <td>{{ $diplome->CodeMNFP }}</td>
                                                    <td>{{ $diplome->status }}</td>
                                                    <td>{{ $diplome->user_id }}</td>
                                                    <td>{{ $diplome->created_at }}</td>
                                                    <td>
                                                        <td><a href=" {{ url('admin/diplome/'.$diplome->id.'/'.$diplome->codeEtudiant.'/edit') }}"> <i class="mdi mdi-pencil-circle btn  bg-dark text-white"></i> </a><td>
                                                    <td><a href=""> <i class="mdi mdi-delete-circle ng-4 btn bg-danger text-white" ></i></</a>
                                                    <td>
                                                </tr>
                                                @endforeach
                                        </tbody>

                                    </table>

                                <div class="row">
                                    <div class="col-md-9">
                                        <div> {{ $diplomes->links( ) }}   </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div><p class="float-end">Total: {{ $dataCount }}</p></div>
                                    </div>
                            </div>
                 

                            <!--     deuxiem table -->

                       <div class="tab-pane fade" id="profile-tab-pane" role="tabpanel" aria-labelledby="profile-tab" tabindex="0">
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
                                <table class="table table-hover">

                                    <thead>
                                        <tr>
                                           <th>No</th>
                                            <th>Code Etudiant</th>
                                            <th>Nom</th>
                                            <th>Prenom</th>
                                            <th>fichier</th>
                                            <th>Code MNFP</th>
                                            <th>No Enr. Uniq</th>
                                            <th>Etat</th>
                                            <th>utilisateur</th>
                                            <th>action</th>
                                            <th>plus</th>
                                        </tr>
                                      </thead>
                                      <tbody>

                                         @foreach ($diplomes as $diplome)
                                         <tr>
                                             <td>{{ $diplome->id }}</td>
                                             <td>{{ $diplome->codeEtudiant }}</td>
                                              <td> <a target="_new" href="{{ url('/uploads/diplome/'.$diplome->cheminVerfichier.'') }}">{{ $diplome->cheminVerfichier }}</a></td>
                                             <td>{{ $diplome->categorie }}</td>
                                             <td>{{ $diplome->DateEmission }}</td>
                                             <td>{{ $diplome->NumeroEnrUniq }}</td>
                                             <td>{{ $diplome->CodeMNFP }}</td>
                                             <td>{{ $diplome->status }}</td>
                                             <td>{{ $diplome->created_at }}</td>
                                             <td> <a href=" {{ url('admin/diplome/'.$diplome->id.'/'.$diplome->codeEtudiant.'/edit') }}"> <i class="mdi mdi-pencil-circle btn  bg-dark text-white"></i> </a><td>
                                             <td><a href=""> <i class="mdi mdi-delete-circle ng-4 btn bg-danger text-white" ></i></</a> <td>
                                         </tr>
                                         @endforeach
                                    </tbody>

                                </table>

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


                        <div class="tab-pane fade" id="contact-tab-pane" role="tabpanel" aria-labelledby="contact-tab" tabindex="0">...</div>
                        <div class="tab-pane fade" id="disabled-tab-pane" role="tabpanel" aria-labelledby="disabled-tab" tabindex="0">...</div>




            </div>
             <!--     fin body cqr table -->

        </div>
    </div>
</div>
