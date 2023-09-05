@extends('admin.admin')
@section('content')

<div class="row">
<div class="col-md-12">
<div class="card">
<div class="card-header">


<div class="row">

    <div class="col-md-3">  <h6>Effectuer une remise de diplome</h6></div>
        <div class="col-md-6">
            
            <!-- Form  Recherche -->
            @include('admin.diplome.baserecher')
          
       </div>

       <div class="col-md-3">
        <a href="{{ url('admin/diplome') }}" class="btn  float-end bg-danger text-white">Retour</a>
       </div>

</div>


@if(session('message'))
<br>
<small><div class="alert alert-succes text-white bg-danger">{{ session('message')  }} </div></small>
@endif
</div>

<div class="card-body">

    <form  action="{{ url('admin/diplome') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <h6>A propos  de l'etudiant :</h6><hr>
        <div class="row">
            <div class="col-md-6 nb-3">
                <label for="">Code de l'etudiant</label>
                <input value="{{ $etudiant->codeEtudiant }}" type="text" name= 'codeEtudiant' class="form-control" >

                @error('codeEtudiant')
                <div class="error  text-danger">{{ $message }}</div>
            @enderror
            </div>

            <div class="col-md-6 nb-3">
                <label for="sexe">Sexe:</label>
                <select name="sexe" class="form-select" >
                    <option value="homme">Homme</option>
                    <option value="femme">Femme</option>
                </select>
                @error('sexe')
                <div class="error  text-danger">{{ $message }}</div>
            @enderror
            </div>


            <div class="col-md-6 nb-3">
                <label for="">Nom</label>

                <input value="{{ $etudiant->nom }}" type="text" name= 'nom' class="form-control" >
                @error('nom')
                    <div class="error  text-danger">{{ $message }}</div>
                @enderror

            </div>

            <div class="col-md-6 nb-3">
                <label for="">prenom</label>
                <input type="text" name= 'prenom' class="form-control" >
                @error('prenom')
                <div class="error  text-danger">{{ $message }}</div>
            @enderror
            </div>



            <div class="col-md-6 nb-3">
                <label for="">Faculte</label>

                <select name="faculte" class="form-select ">
                    <option selected></option>
                
                    <option value=""></option>
                 
                </selecT>
                @error('faculte')
                <div class="error  text-danger">{{ $message }}</div>
             

            </div>

            <div class="col-md-6 nb-3">
                <label  for="">OPtion</label>

                <select name="option" class="form-select">
                    <option selected></option>
                    @foreach ($programmes as $programme)

                    <option value="{{ $programme->codeProgramme}}">{{ $programme->option }}</option>
                    @endforeach
                </selecT>
                @error('option')
                <div class="error  text-danger">{{ $message }}</div>
             @enderror
             <br>
            </div>
            <h6>A PROPOS DU DIPLOME </h6>
            <hr>
               <div class="col-md-4 nb-3">
                    <label for="sexe">Categorie</label>
                    <select name="categorie" class="form-select enable">
                        <option value=""></option>
                        <option value="Certificat">Certificat</option>
                        <option value="Diplome">Diplome</option>
                        <option value="Liscence">Liscence</option>
                        <option value="Maitrise">Maitrise</option>
                        <option value="Attestation">Attestation</option>

                      </selecT>
                    @error('categorie')
                    <div class="error  text-danger">{{ $message }}</div>
                    @enderror
                </div>

               <div class="col-md-4 nb-3">
                    <label for="sexe">No Enreistrement a l'uniq:</label>
                    <input type="text" name= 'NumeroEnrUniq' class="form-control">
                    @error('NumeroEnrUniq')
                    <div class="error  text-danger">{{ $message }}</div>
                    @enderror
                </div>

               <div class="col-md-4 nb-3">
                    <label for="sexe">Code du Ministere MNFP</label>
                    <input type="text" name= 'mnfpCode' class="form-control">
                    @error('mnfpCode')
                    <div class="error  text-danger">{{ $message }}</div>
                    @enderror
                </div>
               <div class="col-md-4 nb-3">
                    <label for="sexe">Importer le scanner fichier (pdf)</label>
                    <input type="file" name='fichier' multiple class="form-control" required >
                    @error('fichier')
                    <div class="error  text-danger">{{ $message }}</div>
                    @enderror
                </div>
               <div class="col-md-4 nb-3">
                    <label for="sexe">DateEmission</label>
                    <input type="date" name= 'DateEmission' class="form-control">
                    @error('DateEmission')
                    <div class="error  text-danger">{{ $message }}</div>
                    @enderror
                </div>
               <div class="col-md-4 nb-3">
                    <label for="sexe">receveur </label>
                    <input type="text" name= 'receveur' class="form-control">
                    @error('receveur')
                    <div class="error  text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-3 nb-3">
                    <label for="">Etat</label>
                    <select name="etat" class="form-select" >
                        <option value=""></option>
                        <option value="1">Livré</option>
                        <option value="0">Non-livré</option>
                        <option value="2">En cour de traitement</option>
                        <option value="3">a traite</option>
                    </selecT>
                    @error('etat')
                    <div class="error  text-danger">{{ $message }}</div>
                    @enderror
                </div>

               <div class="col-md-8 nb-3">    <br>
                    <textarea class="form-control" placeholder="Ajouter une description ici. ( Optionnel ) "  style="height: 50px"></textarea>
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
