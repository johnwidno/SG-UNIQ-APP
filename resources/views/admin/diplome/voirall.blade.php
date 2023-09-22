<!-- Button trigger modal -->



<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">

  <div class="modal-dialog modal-fullscreen">
    <div class="modal-content">


        <div class="row">
            <hr>
            <div  class="col-md-10">
                <div id="titrelibele"> LISTE DES DIPLOMES</div>

            </div>

            <div class="col-md-1">    <button onclick="printTable()" class="float border-0 "><i class=" mdi mdi-printer" ></i></button>

            </div>

            <div class="col-md-1">
                <button type="button" class="btn-close " data-bs-dismiss="modal" aria-label="Close"></button>

            </div>
            <hr>
        </div>


      <div class="modal-body">
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
                       <th>Etat</th>
                       <th>Fichier</th>
                      <th>Livré par </th>
                      <th>Date livraison</th>
                      <th>Description</th>
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
                <td>{{ $diplome->etat}}</td>
                <td><a  target="_new" href="{{ url('/uploads/diplome/'.$diplome->cheminVerfichier.'') }}">{{ $diplome->cheminVerfichier }}</a></td>
                <td>{{ $diplome->user->nom }} {{ $diplome->user->prenom }}</td>
                <td>{{ $diplome->DateLivraison}}</td>
                <td>{{ $diplome->description}}</td>
                
              



              </tr>


            @endforeach

              </tbody>
            </table>
          </div>

      </div>
      <div class="modal-footer">

        <button type="button" class="btn btn-danger" style="margin:5px;" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
  </div>


