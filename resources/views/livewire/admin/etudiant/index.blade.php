
<div>

<div wire:ignore.self  class="modal fade" id="DelModel" tabindex="-1" aria-labelledby="DelModellLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
            <div class="modal-header">

                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-danger">
                <h5>Etre vous sure de vouloir supprimer ?</h5>
                <small>NB: En supprimant cet étudiant, vous risquez de perdre toutes les informations associées à cet étudiant.</small>
            </div>
                <form  wire:submit.prevent="destroyEtudiant">
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-danger" data-bs-dismiss="modal">Supprimer</button>

                    </div>
                </form>


      </div>
    </div>
</div>




<div class="row">
<div class="col-md-12">
<div class="card">
<div class="card-header">





  <br>



  @if(session('message'))
    <small>
       <div id="displayindeuxseconde" class="alert alert-succes text-white bg-success">{{ session('message')  }}
        <a href="" class="float-end text-white">refresh</a>
    </div>

    </small>
@endif

  @if(session('messagenotrouve'))
    <small>
       <div id="displayindeuxseconde" class="alert alert-succes text-white bg-danger">{{ session('messagenotrouve')  }}
        <a href="" class="float-end text-white">refresh</a>
    </div>

    </small>
@endif

<div class="row">
    <div class="col-md-2">

        <h5 class="">Etudiants  </h5>

    </div>
    <div class="col-md-8">
        <div>
            <form action="{{ url('admin/etudiant/search') }}" method="GET">


            <span class="input-group-text" id="search">
               <button type="submit" class="border-0"> <i class="mdi mdi-magnify btn"></i></button>
                <input name="search" type="text"  class="form-control" placeholder="saisir le code l'etudiant...">

              </span>
              </form>
       </div>

    </div>

    <div class="col-md-2">
        <a href="{{ url('admin/etudiant/nouveauEtudiant') }}" class="btn btn-primary float-end ">Add etudiant</a>

    </div>
<br>
</div>


</div>

<div class="card-body">

    <div class="card"  wire:scroll="loadMore">

<table class="table table-border  table-hover table-striped ">

  <thead>

    <tr>
        <th> Code  </th>
        <th> Nom </th>
        <th> Prenom </th>
        <th> Sexe </th>
        <th> Editer </th>
        <th> Supprimer </th>
        <th> Voir plus.. </th>
    </tr>
  </thead>

<tbody>
 @foreach ($etudiants as $etudiant)

    <tr class="">
        <td> {{ $etudiant->codeEtudiant }}</td>
        <td> {{ $etudiant->nom }}</td>
        <td> {{ $etudiant->prenom }}</td>
        <td> {{ $etudiant->sexe }}</td>



        <td>
            <a class="btn   bg-success" href="{{ url('admin/etudiant/'.$etudiant->codeEtudiant.'/edit') }}" >
                <i class=" bg-success mdi mdi-pencil-circle text-white"></i>
            </a>
        </td>
            <td>

            <button class="btn  bg-danger " wire:click="deleteEtudiant('{{ $etudiant->codeEtudiant}}')" data-code="{{ $etudiant->codeEtudiant}}" data-bs-toggle="modal" data-bs-target="#DelModel">

           <!-- <button class="btn  bg-danger " wire:click="deleteEtudiant('{{ $etudiant->codeEtudiant }}')"  data-bs-toggle="modal" data-bs-target="#deleteModal">-->
                <i class="mdi mdi-delete-circle  bg-danger text-white"></i>
            </button>
        </td>
            <td>
            <a class="btn  bg-dark " href="{{ url('admin/diplome/recherche/search/?search='. $etudiant->codeEtudiant) }} ">  <i class="mdi mdi-plus-circle text-white bg-dark  text-white"></i></a>
            </td>
   </tr>

@endforeach
</tbody>
</table>
</div>

<div class="row">
    <div class="col-md-9">
        <div> {{ $etudiants->links( ) }}   </div>
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



