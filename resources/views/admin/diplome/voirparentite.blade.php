@extends('admin.admin')
@section('content')


<div style="justify-content: center;" class="row">
    <hr>
    <div class="col-md-4">
       <div style="justify-content:center;" class="" id="titrelibele"> LISTE DIPLOMES :   {{$optionrechere }}
       {{   $faculteprog }}
        </div>



    </div>



    <div class="col-md-2">
        <span class="input-group input-group-text" id="search">
            <form class="d-flex" action="{{url('admin/diplome/etudiants_par_faculte/liste') }}" method="GET">
                <select required class="form-select " name="faculte" id="programmeSelect" onchange="redirectToController()">
                    <option value="" disabled selected>Sélectionnez une faculté</option>
                    
                    @foreach ($facultes as $faculte)
                        <option value="{{ $faculte->codeFaculte }}">{{ $faculte->codeFaculte }}</option>
                    @endforeach
                </select>
                <button type="submit" class="border-0">faculté</button>
            </form>
             </span>
        </div>





        <div class="col-md-2">
            <span class="input-group input-group-text" id="search">
                <form class="d-flex" action="{{url('admin/diplome/etudiants_par_programme/liste') }}" method="GET">
                    <select required class="form-select " name="codeprogramme" id="programmeSelect" onchange="redirectToController()">
                        <option value="" disabled selected>Sélectionnez un programme</option>
                        @foreach ($programmes as $programme)
                            <option value="{{ $programme->codeProgramme }}">{{ $programme->option }}</option>
                        @endforeach
                    </select>
                    <button  type="submit" class="border-0">option</button>
                </form>
                 </span>
            </div>
        <div class="col-md-2">
            <span class="input-group input-group-text" id="search">
                <form class="d-flex" action="{{url('admin/diplome/etudiants_par_datelivraison/liste') }}" method="GET">
                    <select required class="form-select " name="DateLivraison" id="programmeSelect" onchange="redirectToController()">
                        <option value="" disabled selected>Sélectionnez une date</option>
                        @foreach ($diplomesdatesLivraison as $diplome)
                            <option value="{{  $diplome->DateLivraison }}">{{ $diplome->DateLivraison }}</option>
                        @endforeach
                    </select>
                    <button  type="submit" class="border-0">par date</button>
                </form>
                 </span>
            </div>




    <div class="col-md-1">
        <span class="input-group input-group-text" style="justify-content: center" id="search">
            <button onclick="printTable()" class="float border-0 "><i class=" mdi mdi-printer" ></i></button>
        </span>
    </div>

    <div class="col-md-1">
        <span style="justify-content: center" class="input-group input-group-text" id="">
        <a href="{{ url('admin/diplome') }}"  class="btn-close "></a>
    </span>
    </div>
    <hr>
</div>

<div class="table-responsive pt-0">

<table class="table " id="tableId">
  <thead>
     <tr>

         <th>Code </th>
          <th>Nom</th>
          <th>Prenom</th>
          <th>Sexe</th>
          <th>Faculté</th>
          <th>Option</th>
          <th>categorie</th>
           <th>Date Emission</th>
          <th>No Enr. Uniq</th>
          <th>Code MNFP</th>
           <th>Etat</th>
           <th>Fichier</th>
           <th>Reçu par</th>
          <th>Livré par </th>
          <th>Date livraison</th>

          </tr>
  </thead>
  <tbody>

@foreach ($etudiants as $etudiant)







<tr>
    <td>{{ $etudiant->codeEtudiant }}</td>
    <td>{{ $etudiant->nom }}</td>
    <td>{{ $etudiant->prenom }}</td>
    <td>{{ $etudiant->sexe }}</td>  
    <td>{{ $etudiant->programme->codeFaculte }}</td>
    <td>{{ $etudiant->programme->option }}</td>
    <td>{{ $etudiant->diplome->categorie_id }}</td>
    <td>{{ $etudiant->diplome->DateEmission }}</td>
    <td>{{ $etudiant->diplome->NumeroEnrUniq }}</td>
    <td>{{ $etudiant->diplome->CodeMNFP }}</td>
    <td>{{ $etudiant->diplome->etat }}</td>
    <td><a target="_new" href="{{ url('/uploads/diplome/'.$etudiant->diplome->cheminVerfichier.'') }}">{{ $etudiant->diplome->cheminVerfichier }}</a></td>
    <td>{{ $etudiant->diplome->Receveur }}</td>
    <td>{{ $etudiant->diplome->user->nom }} {{ $etudiant->diplome->user->prenom }}</td>
    <td>{{ $etudiant->diplome->DateLivraison }}</td>
 




  </tr>







@endforeach

  </tbody>
</table>

<div>
  <p class="float-end">  {{ $Quantitediplome}}</p>
</div>
</div>
@endsection
