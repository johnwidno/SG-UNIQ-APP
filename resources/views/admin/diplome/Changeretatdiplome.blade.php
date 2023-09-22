@extends('admin.admin')
@section('content')
<div >
    <div>
        <h5>Modifier l'etat du diplome : {{  $diplome->id}}</h5>
        <p>Code de l' etudiant  : {{ $diplome->codeEtudiant }}</p>
        <p>Option : {{ $diplome->programme->codefaculte }} - {{ $diplome->programme->option }} </p>
        <hr>
    </div>
    <form  action="{{ url('admin/diplome/recherche/livre/'.$diplome->id.'/change') }}" method="GET" enctype="multipart/form-data">
        @csrf
        <label for="">Mettre comme </label>
        <select name="etat" id="" class="form-select">
                <option value="{{ $diplome->etat }}">{{ $diplome->etat }}</option>
                <option value="Livré">Livré</option>
                <option value="Non-livré">Non-livré</option>
             </select>
           </span>


            <br>
            <button type="submit" class="btn btn-primary  float-end"> Editer </button>


      </form>
</div>
@endsection
