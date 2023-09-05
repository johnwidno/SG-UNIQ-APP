@extends('admin.admin')
@section('content')

<div class="row">
<div class="col-md-12">
<div class="card">
<div class="card-header">
<h6>Resultat de la Recheche    - {{ $etudiant->codeEtudiant }}  - {{ $etudiant->nom }} {{ $etudiant->prenom }}

    <a href="{{ url('admin/etudiant') }}" class="btn btn-close  float-end "></a>
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
                <p>{{ $etudiant->nom }}</p>

            </div>


            <h6>FACULTE - OPTION/PROGRAME</h6>
            <hr>


            <div class="col-md-6 nb-3">
           <h6>Faculte</h6>

                <select readonly name="faculte" class="form-select ">
                   @foreach ($facultes as $faculte)

                    <option value="{{ $faculte->codeFaculte}}">{{ $faculte->codeFaculte }}</option>
                    @endforeach
                </selecT>
                @error('faculte')
                <div class="error  text-danger">{{ $message }}</div>
             @enderror

            </div>
            <div class="col-md-6 nb-3">

                <h6>Programme - Option </h6>

                <select readonly name="faculte" class="form-select ">
                    <option value=""></option>
                   @foreach ($programmes as $programme)

                    <option value="{{ $programme->codeProgramme}}">{{ $programme->option }}</option>
                    @endforeach
                </selecT>
                @error('faculte')
                <div class="error  text-danger">{{ $message }}</div>
             @enderror

            </div>


          <div class="table-responsive pt-5">

             <h6>DIPLOME (S) <hr> </h6>
                <table class="table ">
                  <thead>
                     <tr>

                          <th>fichier (pdf)</th>
                          <th>categorie</th>
                          <th>No-Uniq</th>
                          <th>Code-MNFP</th>
                          <th>Etat</th>
                          <th>Livré par</th>
                          <th>Recu par </th>
                          <th>Date Emission</th>
                          <th>Date Livré</th>

                      </tr>
                  </thead>
                  <tbody>
                      @foreach ($diplomes as $diplome)
                      <tr>
                          <td> <a target="_new" href="{{ url('/uploads/diplome/'.$diplome->cheminVerfichier.'') }}">{{ $diplome->cheminVerfichier }}</a></td>
                          <td>{{ $diplome->categorie }}</td>
                          <td>{{ $diplome->NumeroEnrUniq }}</td>
                          <td>{{ $diplome->CodeMNFP }}</td>
                          <td>{{ $diplome->etat }}</td>
                          <td>{{ $diplome->user->name }}</td>
                          <td>{{ $diplome->receveur}}</td>
                          <td>{{ $diplome->DateEmission }}</td>

                          <td>{{ $diplome->created_at }}</td>
                      </tr>

                      @endforeach
                  </tbody>
                </table>
              </div>












               <div class="col-md-12 nb-3">
                <br>
        </div>


    </form>




</div>


</div>

</div>

</div>

@endsection
