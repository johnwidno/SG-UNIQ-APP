@extends('admin.admin')
@section('content')


<div style="justify-content: center;" class="row">
    <hr>
    <div class="col-md-5">
       <div style="justify-content:center;" class="" id="titrelibele"> LISTE DIPLOMES {{ $etatrecherchere }}
        </div>





    </div>



    <div class="col-md-4">
        <form class="d-flex" action="{{url('/admin/dashbord/etat/') }}" method="GET">
            <select required class="form-select " name="etat" id="programmeSelect" onchange="redirectToController()">

                <option value="" disabled selected>Sélectionnez un etat </option>
                @foreach ($diplomesetats as $dip)
                    <option value="{{  $dip->etat }}">{{ $dip->etat}}</option>
                @endforeach
            </select>
            <button  type="submit" class="border-0">lister</button>
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
        <a href="{{ url('admin/dashboard') }}"  class="btn-close "></a>
    </span>
    </div>
    <hr>
</div>

<div class="table-responsive pt-0">
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
                  <th>catégorie</th>
                   <th>Date Emission</th>
                  <th>No Enr. Uniq</th>
                  <th>Code MNFP</th>
                   <th>Fichier</th>
                  <th>Livré par </th>
                  <th>Date livraison</th>
                  <th>Etat</th>
                  </tr>
          </thead>
          <tbody>

        @foreach ($diplomes as $diplome)
        <tr>
            <td>{{ $diplome->etudiant->codeEtudiant }}</td>
            <td>{{ $diplome->etudiant->nom }}</td>
            <td>{{ $diplome->etudiant->prenom }}</td>
            <td>{{ $diplome->etudiant->sexe }}</td>
            <td>{{ $diplome->programme->codeFaculte }}</td>
            <td>{{ $diplome->programme->option }}</td>
            <td>{{ $diplome->categorie->nomCategorie }}</td>
             <td>{{ $diplome->DateEmission}}</td>
            <td>{{ $diplome->NumeroEnrUniq}}</td>
            <td>{{ $diplome->CodeMNFP}}</td>
            <td><a target="_new" href="{{ url('/uploads/diplome/'.$diplome->cheminVerfichier.'') }}">{{ $diplome->cheminVerfichier }}</a></td>
            <td>{{ $diplome->user->nom }} {{ $diplome->user->prenom }}</td>
            <td>{{ $diplome->DateLivraison}}</td>
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

  </div>





  <p class="float-end"> {{ $diplomes->count() }}</p>
</div>
</div>
@endsection
