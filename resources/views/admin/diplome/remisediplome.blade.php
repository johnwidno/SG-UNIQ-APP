@extends('admin.admin')
@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">


                <div class="row">

                    <div class="col-md-3">  <h6>Effectuer une remise de diplome</h6></div>
                        <div class="col-md-6">

                        <!-- Search -->


                    </div>

                    <div class="col-md-3">
                        <a href="{{ url('admin/diplome') }}" class="btn  float-end bg-danger text-white">Retour</a>
                    </div>

                </div>


            @if(session('message'))
            <br>
           <h6><div id="displayindeuxseconde" class="alert alert-succes text-white bg-danger">{{ session('message')  }} </div></h6>
            @endif
            </div>


            <div class="card-body">

            <form  action="{{ url('admin/diplome') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <h6>A propos  De l'etudiant    -   {{ $etudiant->codeEtudiant }} </h6><hr>
                <div class="row">
                    <div class="col-md-6 nb-3">
                        <label for="">Code de l'etudiant </label>
                        <input  readonly value="{{ $etudiant->codeEtudiant }}" type="text" name= 'codeEtudiant' class="form-control" >

                        @error('codeEtudiant')
                        <div class="error  text-danger">{{ $message }}</div>
                    @enderror
                    </div>

                    <div class="col-md-6 nb-3">
                        <label for="sexe">Sexe:</label>
                        <select name="sexe" class="form-select" readonly>
                            <option value="{{ $etudiant->sexe  }}">{{ $etudiant->sexe  }}</option>
                            <option value="homme">Homme</option>
                            <option value="femme">Femme</option>
                        </select>
                        @error('sexe')
                        <div class="error  text-danger">{{ $message }}</div>
                    @enderror
                    </div>


                    <div class="col-md-6 nb-3">
                        <label for="">Nom</label>

                        <input readonly value="{{ $etudiant->nom }}" type="text" name= 'nom' class="form-control" >
                        @error('nom')
                            <div class="error  text-danger">{{ $message }}</div>
                        @enderror

                    </div>

                    <div class="col-md-6 nb-3">
                        <label for="">prenom</label>
                        <input readonly type="text" value="{{ $etudiant->prenom }}" name= 'prenom' class="form-control" >
                        @error('prenom')
                        <div class="error  text-danger">{{ $message }}</div>
                    @enderror
                    </div>

                    <div class="col-md-12 pt-2">
                        <h6>Faculté (s) et option (s) </h6>
                    </div>

                    <div class="col-md-3 nb-3">
                        <label for="">Faculte</label>

                       <select name="faculte" class="form-select ">
                        @foreach ($etudiant->Programmes as $programme)
                        <option selected>{{ $programme->codeFaculte }}</option>
                        @endforeach

                            @foreach ($facultes as $faculte)
                            <option value="{{ $faculte->codeFaculte}}">{{ $faculte->codeFaculte }}</option>
                            @endforeach
                        </selecT>
                        @error('faculte')
                        <div class="error  text-danger">{{ $message }}</div>
                    @enderror

                    </div>






                    <div class="col-md-6 nb-3">
                        <label  for="">Option</label>
                        <select name="option" class="form-select">
                            @foreach ($etudiant->programmes as $programme)
                            <option value="{{ $programme->codeProgramme}}" selected> {{ $programme->option }}- {{ $programme->nomProgramme }} - {{ $programme->codeFaculte }}</option>
                            @endforeach

                            @foreach ($programmes as $programme)
                            <option value="{{ $programme->codeProgramme}}"> {{ $programme->option }}</option>
                            @endforeach
                        </selecT>
                        @error('option')
                        <div class="error  text-danger">{{ $message }}</div>
                    @enderror

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
                    </div>



                    <h6 class="pt-3">A PROPOS DU DIPLOME </h6>
                    <hr>

                    <div class="col-md-3 nb-3 pt-2">
                        <label for="categorie">Type</label>
                        <select name="categorie_id" id="categorie_id" class="form-select enable">
                            <option value=""></option>
                          @foreach($categories as $categorie)
                          <option value="{{$categorie->id }}">{{ $categorie->nomCategorie }}</option>
                          @endforeach
                        </select>
                        @error('categorie_id')
                        <div class="error text-danger">{{ $message }}</div>
                        @enderror
                    </div>


                    <div class="col-md-5 nb-3 pt-2">
                            <label for="sexe">No Enreistrement a l'uniq:</label>
                            <input type="text" name= 'NumeroEnrUniq' class="form-control">
                            @error('NumeroEnrUniq')
                            <div class="error  text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                    <div class="col-md-4 nb-3 pt-2">
                            <label for="sexe">Code du ministère MNFP</label>
                            <input type="text" name= 'mnfpCode' class="form-control">
                            @error('mnfpCode')
                            <div class="error  text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                    <div class="col-md-3 nb-3 pt-3">
                            <label for="sexe">Date Emission</label>
                            <input type="date" name= 'DateEmission' class="form-control">
                            @error('DateEmission')
                            <div class="error  text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-9 nb-3 pt-3">
                            <label for="fichier">Importer le fichier (pdf)</label>
                            <input id="fichier" type="file"  maxlength="5000000" name='fichier' multiple class="form-control" accept=".pdf" required >
                            @error('fichier')
                            <div class="error  text-danger">{{ $message }}</div>
                            @enderror
                        </div>


                        <div class="col-md-3 nb-3 pt-3">

                            <label for="">Etat</label>
                               <select name="etat" class="form-select" >
                                <option value=""></option>
                                <option value="Livré">Livré</option>
                                <option value="non-livré">Non-livré</option>
                                </selecT>
                            @error('etat')
                            <div class="error  text-danger">{{ $message }}</div>
                            @enderror
                        </div>



                    <div class="col-md-5 nb-3 pt-3">
                        <label for="sexe">receveur </label>
                        <input type="text" name= 'receveur' class="form-control">
                        @error('receveur')
                        <div class="error  text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-4 nb-2 pt-3">
                            <label for="sexe">Date Livraison</label>
                            <input type="date" name= 'DateLivraison' class="form-control">
                            @error('DateEmission')
                            <div class="error  text-danger">{{ $message }}</div>
                            @enderror
                        </div>




                        <div class="col-md-12 nb-6">    <br>
                            <textarea class="form-control" name="description" placeholder="Ajouter une description ici. ( Optionnel ) "  style="height: 50px"></textarea>
                            @error('desc')
                            <div class="error  text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    <div class="col-md-1 nb-3">

                        </div>

                        <input type="text" value="{{ Auth::user()->id }}" name="user_id" hidden>
                    <div class="col-md-12 nb-3">
                        <br>

                    <button type="submit" class="btn btn-primary  float-end"> Effectuer la livraison </button>
                    </div>

                </div>


            </form>




            </div>


        </div>

    </div>

</div>

@endsection
