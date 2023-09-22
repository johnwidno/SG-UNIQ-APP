@extends('admin.admin')
@section('content')

<div class="row">
<div class="col-md-12">
<div class="card">
<div class="card-header">

<h6>Editer Remise      No : {{  $diplome->id  }}

    <a href="{{ url('admin/diplome') }}" class="btn  float-end bg-danger text-white">Retour</a>
</h6>
@if(session('message'))
<br>
<small><div class="alert alert-succes text-white bg-danger">{{ session('message')  }} </div></small>
@endif
</div>

<div class="card-body">

    <form  action="{{ url('admin/diplome/'.$diplome->id) }}" method="GET" enctype="multipart/form-data">
        @csrf

        <h6 >A propos  de l'etudiant :</h6><hr>
        <div class="row">
            <div class="col-md-6 nb-3">
                <label for="">Code de l'etudiant</label>
                <input readonly type="text"  value="{{ $diplome->codeEtudiant }}" name= 'codeEtudiant' class="form-control" >

                @error('codeEtudiant')
                <div class="error  text-danger">{{ $message }}</div>
            @enderror
            </div>

            <div class="col-md-6 nb-3">
                <label for="sexe">Sexe:</label>
                <select readonly value="{{ $etudiant->sexe}}" name="sexe" class="form-control" >
                    <option value="{{ $etudiant->sexe}}" selected>{{ $etudiant->sexe}}</option>
                    <option value="homme">Homme</option>
                    <option value="femme">Femme</option>
                </select>
                @error('sexe')
                <div class="error  text-danger">{{ $message }}</div>
            @enderror
            </div>


            <div class="col-md-6 nb-3">
                <label for="">Nom</label>

                <input  readonly type="text" value="{{ $etudiant->nom }}" name= 'nom' class="form-control"  >
                @error('nom')
                    <div class="error  text-danger">{{ $message }}</div>
                @enderror

            </div>

            <div class="col-md-6 nb-3">
                <label for="">prenom</label>
                <input readonly type="text"  value="{{ $etudiant->prenom }}"  name= 'prenom' class="form-control" >
                @error('prenom')
                <div class="error  text-danger">{{ $message }}</div>
            @enderror
            </div>



            <div class="col-md-4 nb-3">
                <label  for="">Faculte</label>

                <select readonly name="faculte" class="form-select ">
                    <option value="{{ $diplome->programme->codeFaculte }}" selected>{{ $diplome->programme->codeFaculte  }}</option>
                   @foreach ($facultes as $faculte)
                    <option value="{{ $faculte->codeFaculte}}">{{ $faculte->codeFaculte }}</option>
                    @endforeach
                </selecT>
                @error('faculte')
                <div class="error  text-danger">{{ $message }}</div>
             @enderror

            </div>



            <div class="col-md-5 nb-3">
                <label  for="">Option</label>

                <select  name="option" class="form-select">
                    <option value="{{$diplome->programme->codeProgramme}}" selected>{{$diplome->programme->option }}</option>

                    @foreach ($programmes as $programme)
                    <option value="{{ $programme->codeProgramme}}">{{ $programme->option }}</option>
                    @endforeach
                </selecT>

            </div>

            <div class="col-md-3 nb-3 ">
                <label for="">Regime</label>
                <select name="regime" class="form-select" >
                    @foreach ($etudiant->programmes as $programme)
                    <option value="{{  $programme->pivot->regime  }}" selected>{{  $programme->pivot->regime  }}</option>
                     @endforeach

                    <option value="Temps Plein">Temps Plein</option>
                    <option value="Temps Libre<">Temps Libre</option>
                    </selecT>

                @error('regime')
                <div class="error  text-danger">{{ $message }}</div>
            @enderror
            <br>
            </div>
            <h6>A PROPOS DU DIPLOME </h6>
            <hr>
               <div class="col-md-4 nb-3">
                    <label for="sexe">Categorie</label>
                    <select name="categorie_id" class="form-control enable">
                        <option value="{{ $diplome->categorie->id }}" selected>{{ $diplome->categorie->nomCategorie }}</option>

                        <option class="disable" value="Gestion des affaire adminstrative">Gestion des affaire adminstrative</option>
                        <option value="Science economique">Science economique</option>
                      </selecT>
                    @error('categorie_id')
                    <div class="error  text-danger">{{ $message }}</div>
                    @enderror
                </div>

               <div class="col-md-4 nb-3">
                    <label for="sexe">No Enreistrement a l'uniq:</label>
                    <input  type="text" value="{{ $diplome->NumeroEnrUniq }}" name= 'NumeroEnrUniq' class="form-control">
                    @error('NumeroEnrUniq')
                    <div class="error  text-danger">{{ $message }}</div>
                    @enderror
                </div>

               <div class="col-md-4 nb-3">
                    <label for="sexe">Code du Ministere MNFP</label>
                    <input type="text" value="{{ $diplome->CodeMNFP }}" name= 'mnfpCode' class="form-control">
                    @error('mnfpCode')
                    <div class="error  text-danger">{{ $message }}</div>
                    @enderror
                </div>
               <div class="col-md-6 nb-3">
                    <label for="sexe">Importer le scanner fichier (pdf)</label>
                    <input type="file" name='fichier' multiple class="form-control">
                    <a id="fichier" href="{{ asset('uploads/diplome/'.$diplome->cheminVerfichier)}}" target="_new" >Voir le fichier</a>


                    @error('fichier')
                    <div class="error  text-danger">{{ $message }}</div>
                    @enderror
                </div>
               <div class="col-md-6 nb-3">
                    <label for="sexe">DateEmission</label>
                    <input type="date" value="{{ $diplome->DateEmission }}" name='DateEmission' class="form-control">
                    @error('DateEmission')
                    <div class="error  text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6 nb-3 pt-3">
                    <label for="">Etat</label>
                       <select name="etat" class="form-select" >
                        <option value="{{ $diplome->etat }}">{{ $diplome->etat }}</option>
                        <option value="Livré">Livré</option>
                        <option value="Non-livré">Non-livré</option>
                        </selecT>
                    @error('etat')
                    <div class="error  text-danger">{{ $message }}</div>
                    @enderror
                </div>

               <div class="col-md-6 nb-3 pt-3">
                    <label for="">receveur </label>
                    <input value="{{ $diplome->Receveur }}" type="text" name= 'receveur' class="form-control">
                    @error('receveur')
                    <div class="error  text-danger">{{ $message }}</div>
                    @enderror
                </div>



               <div class="col-md-12 nb-3">    <br>
                    <textarea name="description" class="form-control" placeholder="Ajouter une description ici"  style="height: 50px"></textarea>
                      @error('description')
                    <div class="error  text-danger">{{ $message }}</div>
                    @enderror
                </div>

                 <input type="text" value="{{ Auth::user()->id }}" name="user_id" hidden>
               <div class="col-md-12 nb-3">
                <br>

               <button type="submit" class="btn btn-primary  float-end"> Editer </button>
            </div>

        </div>


    </form>




</div>


</div>

</div>

</div>

@endsection
