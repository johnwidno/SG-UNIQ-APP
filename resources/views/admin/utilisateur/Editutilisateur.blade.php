@extends('admin.admin')
@section('content')

<div class="row">
<div class="col-md-12">
<div class="card">
<div class="card-header">

    @if(session('messagenotrouve'))
<br>
<small><div id="displayindeuxseconde" class="alert alert-succes text-white bg-danger">{{ session('messagenotrouve')  }} </div></small>
@endif

<h5>Edit utilisateur

    <a href="{{ url('admin/utilisateur') }}" class="btn  float-end bg-danger text-white">Retour</a>
</h5>
</div>

<div class="card-body">

    <form  action="{{ url('admin/utilisateur/edit/update/'.$user->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row ">
            <div class="col-md-6 nb-3 pt-2">
                <label for="">nom</label>
                <input value="{{ $user->nom}}" type="text" name='nom' class="form-control">

                @error('nom')
                <div class="error  text-danger">{{ $message }}</div>
            @enderror
            </div>
            <div class="col-md-6 nb-3 pt-2">
                <label for="">Prenom</label>
                <input value="{{ $user->prenom }}" type="text" name= 'prenom' class="form-control">

                @error('prenom')
                <div class="error  text-danger">{{ $message }}</div>
            @enderror
            </div>



            <div class="col-md-6 nb-3 pt-2">
                <label for="">Poste</label>
                <input value="{{ $user->poste }}" type="text" name= 'poste' class="form-control">

                @error('poste')
                <div class="error  text-danger">{{ $message }}</div>
            @enderror
            </div>


            <div class="col-md-6 nb-3 pt-2">
                <label for="">Telephone</label>
                <input value="{{ $user->telephone }}" type="text" name= 'telephone' class="form-control">

                @error('telephone')
                <div class="error  text-danger">{{ $message }}</div>
            @enderror
            </div>




            <div class="col-md-12 nb-3 pt-2">
                <label for="">Email</label>
                <input value="{{ $user->email }}" type="email" name= 'email' class="form-control">

                @error('email')
                <div class="error  text-danger">{{ $message }}</div>
             @enderror

            </div>

            <div class="col-md-6 nb-3 pt-2">
                <label for="">Mot de passe</label>
                <input value="" type="password" name= 'passwordedit' class="form-control">

                @error('password')
                <div class="error  text-danger">{{ $message }}</div>
             @enderror

            </div>

            <div class="col-md-6 nb-3 pt-2">
                <label for="">Confirmer le mot de passe</label>
                <input  type="password" name= 'comfirmpasswordedit' class="form-control">

                @error('confirmpassword')
                <div class="error  text-danger">{{ $message }}</div>
             @enderror

            </div>


            <div class="col-md-12 nb-3 pt-2">
                <label for="">Attribuer un Role:</label>
                <select name="role" class="form-select">
                    <option value="{{ $user->role_as }}" selected>{{ $user->role_as }}</option>
                    <option value="1">super administrateur</option>
                    <option value="2">administrateur</option>
                    <option value="3">employes</option>
                    <option value="0">utilisateur</option>
                </select>
                @error('role')
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
