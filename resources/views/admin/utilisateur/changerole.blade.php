@extends('admin.admin')
@section('content')
<div >
    <div>
        <h5>Changer le role de : {{  $user->name}}</h5>

       <hr>
    </div>
    <form  action="{{ url('admin/utilisateur/change/'.$user->id.'/change') }}" method="GET" enctype="multipart/form-data">
        @csrf
        <label for="">Ajouter comme  :</label>
        <select name="etat" id="" class="form-select">
        <option value="1">super ADM</option>
                <option value="2">Adm</option>
                <option value="3">emplo</option>
             </select>
           </span>
<br>
           <div class="row">
            <h6>ou changer le mot passe</h6>
            <div class="col-md-6 nb-3 pt-2">
                <label for="">Mot de passe</label>
                <input view type="password" name= 'password' class="form-control">

                @error('password')
                <div class="error  text-danger">{{ $message }}</div>
             @enderror

            </div>

            <div class="col-md-6 nb-3 pt-2">
                <label for="">Confirmer le mot de passe</label>
                <input view type="password" name= 'confirmpassword' class="form-control">

                @error('confirmpassword')
                <div class="error  text-danger">{{ $message }}</div>
             @enderror

            </div>

           </div>
            <br>
            <button type="submit" class="btn btn-primary  float-end"> Changer </button>


      </form>
</div>
@endsection
