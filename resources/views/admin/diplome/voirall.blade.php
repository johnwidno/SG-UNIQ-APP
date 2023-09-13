<!-- Button trigger modal -->



<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">

  <div class="modal-dialog modal-fullscreen">
    <div class="modal-content">
      <div class="modal-header">

        <h1 class="modal-title fs-4" id="exampleModalFullscreenLabel">Affichage en plein d'ecran

        </h1>
        <i class="mdi mdi-export me-7 icon-md text-danger"></i>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        

      </div>
      <div class="modal-body">


        <div class="table-responsive pt-1">
            <table class="table ">
              <thead>
                 <tr>

                      <th>Code </th>
                      <th>Nom</th>
                      <th>Prenom</th>
                      <th>Sexe</th>
                      <th>Faculte</th>
                      <th>Option</th>
                      <th>categorie</th>
                      <th>Fichier</th>
                      <th>Date Emission</th>
                      <th>No Enr. Uniq</th>
                      <th>Code MNFP</th>
                       <th>Etat</th>
                      <th>Livré par </th>
                      <th>Date livraison</th>
                      <th>Description</th>
                      </tr>
              </thead>
              <tbody>
            @foreach ($etudiants as $etudiant)
            @foreach ($etudiant->programmes as $programme)
            @foreach ($etudiant->diplomes as $diplome)
            <tr>
                <td>{{ $etudiant->codeEtudiant }}</td>
                <td>{{ $etudiant->nom }}</td>
                <td>{{ $etudiant->prenom }}</td>
                <td>{{ $etudiant->sexe }}</td>
                <td>{{ $programme->codeFaculte }}</td>
                <td>{{ $programme->option }}</td>
                <td>{{ $diplome->categorie->nomCategorie }}</td>
                <td><a target="_new" href="{{ url('/uploads/diplome/'.$diplome->cheminVerfichier.'') }}">{{ $diplome->cheminVerfichier }}</a></td>
                <td>{{ $diplome->DateEmission}}</td>
                <td>{{ $diplome->NumeroEnrUniq}}</td>
                <td>{{ $diplome->CodeMNFP}}</td>
                <td>{{ $diplome->etat}}</td>
                <td>{{ $diplome->user->name}}</td>
                <td>{{ $diplome->DateLivraison}}</td>
                <td>{{ $diplome->description}}</td>


              </tr>

            @endforeach
            @endforeach
            @endforeach

              </tbody>
            </table>
          </div>

      </div>
      <div class="modal-footer">
        <i class="mdi mdi-export me-7 icon-md text-danger"></i>
        <button type="button" class="btn btn-danger" style="margin:5px;" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
  </div>


