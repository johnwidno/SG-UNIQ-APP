<div>

<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body dashboard-tabs p-0">
          <ul class="nav nav-tabs px-4" role="tablist">
            <li class="nav-item">
              <a class="nav-link active" id="overview-tab" data-bs-toggle="tab" href="#overview" role="tab" aria-controls="overview" aria-selected="true">Facultés </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="sales-tab" data-bs-toggle="tab" href="#sales" role="tab" aria-controls="sales" aria-selected="false">Programmes</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="purchases-tab" data-bs-toggle="tab" href="#purchases" role="tab" aria-controls="purchases" aria-selected="false">options</a>
            </li>
          </ul>





          <div class="tab-content py- px-0">
            <div class="tab-pane fade show active" id="overview" role="tabpanel" aria-labelledby="overview-tab">
              <div class="d-flex flex-wrap justify-content-xl-between">

                @foreach ($facultes as $faculte)



                <div class="d-none d-xl-flex border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">



                 <div class="d-flex flex-column justify-content-around" >

                    <div class="dropdown "  >
                      <a class="btn btn-secondary dropdown-toggle p-0 bg-transparent border-0 text-dark shadow-none font-weight-medium" href="#" role="button" id="dropdownMenuLinkA" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="mdi mdi-school me-1 mb-1 icon-md text-danger"></i>
                        <strong class="mb-2 text-muted">{{ $faculte->codeFaculte}}</strong>
                     </a>
                     <div>
                        <p>{{ $faculte->programmes->count() }} : programmes</p>
                        <p>{{ $facultyStudentCounts[$faculte->codeFaculte] ?? 0 }} : Etudiants</p>
                        </div>





                      <div  class="dropdown-menu " style="width: 350px; text-transform: uppercase; padding: 5px " aria-labelledby="dropdownMenuLinkA">
                        <a class="text-muted" style="text-decoration: none;" href="{{ url('admin/diplome/etudiants_par_faculte/liste/'.$faculte->codeFaculte .'') }}"><p class="text ">{{ $faculte->nom}}</p></a>


                        </div>
                    </div>
                  </div>
                </div>


                @endforeach

              </div>
            </div>





           <div class="tab-pane fade" id="sales" role="tabpanel" aria-labelledby="sales-tab">
            <div class="row" style="margin:5px;">
                <div class="col-md-6"> <h6>programmes</h6> </div>
                <div class="col-md-6"><h6>Total : </h6></div>
                <hr>

            </div>
                @foreach ($programmes as $programme)
                            <div class="row" style="margin:5px;">
                                <div class="col-md-6">
                                    <p >{{ $programme->nomProgramme}} </p></div>
                                <div class="col-md-6">
                                     <p > {{$programme->etudiants->count() }}</p></div>

                            </div>

               @endforeach
              </div>

            <div class="tab-pane fade" id="purchases" role="tabpanel" aria-labelledby="purchases-tab">
                <div class="row" style="margin:5px;">
                    <div class="col-md-6"> <h6>Options / Diciplines</h6> </div>
                    <div class="col-md-6"><h6>Total : </h6></div>
                    <hr>

                </div>


                    @foreach ($programmes as $programme)

                    <div class="row " style="margin:5px;">
                        <div class="col-md-6"> <p >{{$programme->option}} </p></div>
                        <div class="col-md-5"> <p > {{ $programme->etudiants->count() }}</p></div>
                        <div class="col-md-1">
                            <form class="d-flex" action="{{url('admin/diplome/etudiants_par_programme/liste') }}" method="GET">
                           
                                        <input name="codeprogramme" hidden value="{{ $programme->codeProgramme }}"></option>
                             
                                <button  type="submit" class="border-0 float-end ">Voir liste</button>
                            </form>
                        </div>

                    </div>
                     @endforeach

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>





  <div class="row">
    <div class="col-md-7 grid-margin   stretch-card">
      <div class="card">
        <div class="card-body">
          <p class="card-title">Rapports</p>


          <div class="card-body">
            <div class="row">
                <h6>Catégories</h6>
                @foreach ($categories as $categorie)
                <div class="col-md-6">  <p>{{ $categorie->nomCategorie}}</p></div>
                <div class="col-md-6">  <p>{{ $categorie->diplomes->count()}}</p></div>

                <hr>
                @endforeach


                <div class="col-md-3">  <p>Total Etudiant :</p></div>
                <div class="col-md-4"><h6>{{ $totaletudiant }}</h6></div>

                <div class="col-md-4">  <p>Nombre Programme :</p></div>
                <div class="col-md-1"><h6>{{ $totalprograme }}</h6></div>

            </div>
          </div>

        </div>
      </div>
    </div>

    <div class="col-md-5 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
            <p class="card-title ">Rapports sur les livraisons
            <button type="button" class="btn btn-light bg-light btn-icon me-3  mt-2 mt-xl-0 ">
                <i class="mdi mdi-plus-circle text-muted"></i>
              </button>
            </p>



          <div class="row">

            @foreach ($diplomesParetats as $etat)
            <div class="col-md-6"> <p> Total : {{ $etat->etat}}</p> </div>
            <div class="col-md-6"><h6>{{ $etat->quantite}}</h6></div>
            <hr>
            @endforeach

            <form class="d-flex" action="{{url('/admin/dashbord/etat/') }}" method="GET">
                <select required class="form-select " name="etat" id="programmeSelect" onchange="redirectToController()">

                    <option value="" disabled selected>Sélectionnez un etat des diplomes </option>
                    @foreach ($diplomesParetats as $etat)
                        <option value="{{  $etat->etat }}">{{ $etat->etat }}</option>
                    @endforeach
                </select>
                <button  type="submit" class="border-0">Lister</button>
            </form>
             </span>



        </div>

        </div>

      </div>
    </div>
  </div>

</div>
