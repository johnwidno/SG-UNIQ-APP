
@extends('admin.admin')
@section('content')
<div>
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
              
                <h5>Editer...</h5>
            </div>
            <div class="col-md-6 pt-2">
                <button  class="float-end btn bg-primary text-white"  data-bs-toggle="modal" data-bs-target="#Categoriemodel">Retour </button>
            </div>

        </div>
    </div>
    <div class="card-body pt-3">
        <div class="row">
            <div class="col-md-12">

                <form  action="{{ url('admin/categorie/'.$categorie->id ) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                @method('PUT')
               
                    <div class="mb-3">
                        <label for="nomCategorie">Nom de la Categorie</label>
                        <input value="{{$categorie->nomCategorie }}" name='nomCategorie'  type="text" class="form-control">
                        @error('nomCategorie')
                        <div class="error  text-danger">{{ $message }}</div>
                    @enderror
        
                    </div>
        
                    <div class="mb-3">
                        <label for="">Description</label>
                        <input value="{{ $categorie->description }}" name="description"  type="text" class="form-control">
                        @error('description')
                        <div class="error  text-danger">{{ $message }}</div>
                    @enderror
                    </div>
        
        
               
                 <button type="submit" class="btn btn-primary">Editer</button>
               
                </form>
                

            </div>
        </div>
    </div>

</div>

</div>
@endsection
