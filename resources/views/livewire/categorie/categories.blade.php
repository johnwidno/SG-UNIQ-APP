
@extends('admin.admin')
@section('content')
<div>

    <div wire:ignore.self  class="modal fade" id="categorieModel" tabindex="-1" aria-labelledby="DiplomeModellLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="DiplomeModellLabel">Supression de diplome</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <h5>Etre vous sure de vouloir supprimer ?</h5>
                </div>
                    <form  wire:submit.prevent="destroycategorie">
                        <div class="modal-footer">
                            <button  class="btn btn-secondary" >Fermer</button>
                            <button type="submit" class="btn btn-primary" data-bs-dismiss="modal">Supprimer</button>

                        </div>
                    </form>


          </div>
        </div>
    </div>



@include('livewire.categorie.FormAddCategorie')

<div class="card">
    <div class="card-header">
        @if(session('message'))
        <br>
        <small><div id="displayindeuxseconde" class="alert alert-succes text-white bg-danger">{{ session('message')  }}
            <a href="" class="float-end text-white">refresh</a>
        </div></small>

        @endif
        <div class="row">
            <div class="col-md-6 pt-2">

                <h5>Categorie...</h5>
            </div>
            <div class="col-md-6 pt-2">
                <button  class="float-end btn bg-primary text-white"  data-bs-toggle="modal" data-bs-target="#Categoriemodel">Ajouter une categorie</button>
            </div>

        </div>
    </div>
    <div class="card-body pt-3">
        <div class="row">
            <div class="col-md-12">
                <table class="table table-border  table-hover table-striped ">

                    <thead>

                    <tr>
                        <th>No </th>
                        <th> Nom Catégorie </th>
                        <th> descriptiption </th>
                        <th> Editer </th>
                        <th> Supprimer </th>
                   </tr>
                    </thead>

                  <tbody>
                    @foreach ($categories as $categorie)
                    <tr>
                        <td> {{$categorie->id  }} </td>
                        <td> {{ $categorie->nomCategorie }} </td>
                         <td>{{ $categorie->description }}</td>
                         <td><a href=" {{ url('admin/categorie/'.$categorie->id.'/edit') }}"> <i class="mdi mdi-pencil-circle btn  bg-dark text-white"></i> </a></td>
                         <td><a href=" {{ url('admin/categorie/'.$categorie->id.'/delete') }}"> <i class="mdi mdi-pencil-circle btn  bg-danger text-white"></i> </a></td>



                    </tr>
                    @endforeach
                  </tbody>
                </table>

            </div>
        </div>
    </div>

</div>

</div>
@endsection
