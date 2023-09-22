@extends('admin.admin')
@section('content')

<div class="row">
<div class="col-md-12">
<div class="card">
<div class="card-header">
<h5>Editer

    @if(session('messagenotrouve'))
    <small>
    <div id="displayindeuxseconde" class="alert alert-succes text-white bg-danger">{{ session('messagenotrouve')  }}
        <a href="" class="float-end text-white">refresh</a>
    </div>

    </small>
@endif
    <a href="{{ url('admin/etudiant') }}" class="btn  float-end bg-danger text-white">Retour</a>
</h5>
</div>

<div class="card-body">

    <form  action="{{ url('admin/etudiant/'.$etudiant->codeEtudiant) }}" method="POST" enctype="multipart/form-data">

        @csrf
        @method('PUT')
        <div class="row ">
            <div class="col-md-4 nb-3 pt-2">
                <label for="">Code</label>
                <input readonly value="{{ $etudiant->codeEtudiant }}" type="text" name= 'code' class="form-control">

                @error('code')
                <div class="error  text-danger">{{ $message }}</div>
            @enderror
            </div>


            <div class="col-md-6 nb-3 pt-2">
                <label for="">Option</label>

                <select name="option" class="form-select" >
                    @foreach ($etudiant->programmes as $programm)
                    <option selected value="{{$programm->codeProgramme}}">{{ $programm->option }} </option>
                    @endforeach
                    @foreach ($programmes as $programme)
                    <option value="{{ $programme->codeProgramme}}">{{ $programme->option }}</option>
                    @endforeach
                </selecT>
                @error('option')
                <div class="error  text-danger">{{ $message }}</div>
             @enderror

            </div>

            <div class="col-md-2 nb-3 pt-2 ">
                <label for="">Regime</label>
                <select name="regime" class="form-select" >
                   @foreach ($etudiant->programmes as $programme)
                    <option value="{{$programme->pivot->regime  }}" selected>{{  $programme->pivot->regime  }}</option>
                     @endforeach
                    <option value="Temps Plein">Temps Plein</option>
                    <option value="Temps Libre<">Temps Libre</option>
                    <option value="Autre"> Autre </option>
                </selecT>
                @error('regime')
                <div class="error  text-danger">{{ $message }}</div>
             @enderror

            </div>

            <div class="col-md-12 nb-12 pt-2">
                <label for="">Faculte</label>


                <select name="faculte" class="form-select" >
                    @foreach ($etudiant->programmes as $programm)
                    <option selected value="{{ $programm->codeFaculte }}" aria-placeholder="selectionner une option">{{ $programm->codeFaculte }}</option>
                    @endforeach
                 @foreach ($facultes as $faculte)
                    <option value="{{ $faculte->codeFaculte}}">{{ $faculte->codeFaculte }}</option>
                    @endforeach
                </selecT>
                @error('faculte')
                <div class="error  text-danger">{{ $message }}</div>
             @enderror
            </div>



            <div class="col-md-6 nb-3 pt-2">
                <label for="">Nom</label>
                <input type="text" value=" {{ $etudiant->nom }}" name= 'nom' class="form-control">
                @error('nom')
                    <div class="error  text-danger">{{ $message }}</div>
                @enderror

            </div>

            <div class="col-md-6 nb-3 pt-2">
                <label for="">prenom</label>
                <input value="{{ $etudiant->prenom }}" type="text" name= 'prenom' class="form-control">
                @error('prenom')
                <div class="error  text-danger">{{ $message }}</div>
            @enderror
            </div>


            <div class="col-md-12 nb-3 pt-2">
                <label for="sexe">Sexe:</label>
                <select name="sexe" class="form-select">
                    <option value="{{ $etudiant->sexe }}" selected> {{ $etudiant->sexe }}</option>
                    <option value="homme">Homme</option>
                    <option value="femme">Femme</option>
                </select>
                @error('sexe')
                <div class="error  text-danger">{{ $message }}</div>
            @enderror
            </div>


               <div class="col-md-12 nb-3 pt-2">
                <hr>
               <button type="submit" class="btn btn-primary  float-none"> save </button>
            </div>
        </div>


    </form>




</div>


</div>

</div>

</div>

@endsection
