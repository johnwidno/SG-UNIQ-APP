@extends('admin.admin')
@section('content')

<div class="row">
<div class="col-md-12">
<div class="card">
<div class="card-header">
<h5>Editer

    <a href="{{ url('admin/etudiant') }}" class="btn  float-end bg-danger text-white">Retour</a>
</h5>
</div>

<div class="card-body">

    <form  action="{{ url('admin/etudiant/'.$etudiant->codeEtudiant) }}" method="POST" enctype="multipart/form-data">

        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-md-6 nb-3">
                <label for="">Code</label>
                <input type="text" name= 'code' value="{{ $etudiant->codeEtudiant }}" class="form-control">

                @error('code')
                <div class="error  text-danger">{{ $message }}</div>
            @enderror
            </div>

            <div class="col-md-6 nb-3">
                <label name="faculte" for="faculte">Faculté</label>
                <select  class="form-control ">
                  <option value="FSGA">FSGA</option>
                  <option value="FSSA">FSSA</option>
                  <option value="FSED">FSED</option>
                  <option value="FSJP">FSJP</option>
                  <option value="FSAE">FSAE</option>
                  <option value="FSEA">FSEA</option>
                </selecT>

            </div>

            <div class="col-md-6 nb-3">
                <label for="">Nom</label>

                <input value="{{ $etudiant->nom }}" type="text" name= 'nom' class="form-control">
                @error('nom')
                    <div class="error  text-danger">{{ $message }}</div>
                @enderror

            </div>

            <div class="col-md-6 nb-3">
                <label for="">prenom</label>
                <input type="text" value="{{ $etudiant->prenom }}" name= 'prenom' class="form-control">
                @error('prenom')
                <div class="error  text-danger">{{ $message }}</div>
            @enderror
            </div>


            <div class="col-md-12 nb-3">
                <label for="sexe">Sexe:</label>
                <select  value="{{ $etudiant->sexe }}" name="sexe" class="form-control">
                    <option value="homme">Homme</option>
                    <option value="femme">Femme</option>
                </select>
                @error('sexe')
                <div class="error  text-danger">{{ $message }}</div>
            @enderror
            </div>


               <div class="col-md-12 nb-3">
                <hr>
               <button type="submit" class="btn btn-primary  float-none"> Editer </button>
            </div>
        </div>


    </form>




</div>


</div>

</div>

</div>

@endsection
