@extends('admin.admin')
@section('content')
<div>

    <div wire:ignore.self  class="modal fade" id="DiplomeModel" tabindex="-1" aria-labelledby="DiplomeModellLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="DiplomeModellLabel">Livraison</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <h5>Etre vous sure de vouloir livré ?</h5>
                </div>
                    <form  wire:submit.prevent="effectuerremise">
                        <div class="modal-footer">

                            <button type="submit" class="btn btn-primary" data-bs-dismiss="modal">oui</button>

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
    <small><div class="alert alert-succes text-white bg-danger">{{ session('message')  }} </div></small>
    @endif


<h6>Resultat de la Recheche    - {{ $etudiant->codeEtudiant }}  - {{ $etudiant->nom }} {{ $etudiant->prenom }}

    <a href="{{ url('admin/diplome') }}" class="btn btn-close  float-end "></a>
</h6>
</div>

<div class="card-body">

    <form  action="{{ url('admin/etudiant/'.$etudiant->codeEtudiant) }}" method="POST" enctype="multipart/form-data">

        @csrf
        @method('PUT')
        <div class="row">

            <div class="col-md-6 nb-3">
               <h6>Code de l'etudiant   :</h6>
                <p>{{ $etudiant->codeEtudiant }}</p>


            </div>

            <div class="col-md-6 nb-3">

                <h6>Sexe   :</h6>
                <p>{{ $etudiant->sexe}}</p>
            </div>


            <div class="col-md-6 nb-3">

                <h6>Nom   :</h6>
                <p>{{ $etudiant->nom }}</p>

            </div>

            <div class="col-md-6 nb-3">
                <h6>Prenom   :</h6>
                <p>{{ $etudiant->prenom }}</p>
            </div>

            <h6>FACULTE - OPTION/PROGRAME</h6>
            <hr>


            <div class="col-md-3 nb-3">
           <h6>Faculte</h6>
           @foreach ($etudiant->diplomes as $diplome)
           <p>{{$diplome->programme->codeFaculte  }}</p>
           @endforeach
            </div>

            <div class="col-md-5 nb-3">

                <h6>Programme / Option </h6>
                @foreach ($etudiant->diplomes as $diplome)
                <p>{{ $diplome->programme->nomProgramme }}  /  {{ $diplome->programme->option }}</p>
                @endforeach
            </div>
            <div class="col-md-2 nb-2">

                <h6>type</h6>
                @foreach ($etudiant->diplomes as $diplome)
                <p>{{ $diplome->categorie->nomCategorie}}</p>
                @endforeach
            </div>
            <div class="col-md-2 nb-3">

                <h6>Regime</h6>
                @foreach ($etudiant->Programmes as $programme)
                <p>{{ $programme->pivot->regime}}</p>
                @endforeach




            </div>


          <div class="table-responsive pt-2">

             <h6>DIPLOME (S) <hr> </h6>
                <table class="table ">
                  <thead>
                     <tr>

                          <th>fichier (pdf)</th>
                          <th>type</th>
                          <th>Option</th>
                          <th>No-Uniq</th>
                          <th>Code-MNFP</th>
                          <th>Livré par</th>
                          <th>Recu par </th>
                          <th>Date Emission</th>
                          <th>Date Enregist</th>
                          <th>Date Livraison</th>
                          <th>Etat</th>

                      </tr>
                  </thead>
                  <tbody>
                      @foreach ($etudiant->diplomes as $diplome)
                      <tr>
                          <td> <a target="_new" href="{{ url('/uploads/diplome/'.$diplome->cheminVerfichier.'') }}">{{ $diplome->cheminVerfichier }}</a></td>
                          <td>{{ $diplome->categorie->nomCategorie }}</td>
                          <td>{{ $diplome->programme->option }}</td>
                          <td>{{ $diplome->NumeroEnrUniq }}</td>
                          <td>{{ $diplome->CodeMNFP }}</td>
                          <td>{{ $diplome->user->nom }} {{ $diplome->user->prenom }}</td>
                          <td>{{ $diplome->Receveur}}</td>
                          <td>{{ $diplome->DateEmission }}</td>
                           <td>{{ $diplome->created_at }}</td>
                           <td>{{ $diplome->DateLivraison }}</td>

                            <td>
                                @if ($diplome->etat === 'Livré')
                              {{ $diplome->etat }}
                             @else
                             <a href="{{ url('admin/diplome/recherche/livre/'.$diplome->id)}}">{{ $diplome->etat }} </a>
                            @endif
                            </td>

                      </tr>

                      @endforeach
                  </tbody>
                </table>
              </div>

               <div class="col-md-12 nb-3">
                <br>

                <a href="{{ url('admin/diplome/remise/search/?search='.$etudiant->codeEtudiant.'') }}" class="float-end">attribuer un diplome ou cerrtificat</a>
        </div>


    </form>




</div>


</div>

</div>

</div>
</div>

@endsection
