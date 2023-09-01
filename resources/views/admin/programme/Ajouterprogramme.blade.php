@extends('admin.admin')
@section('content')

<div class="row">
<div class="col-md-12">
<div class="card">
<div class="card-header">

<h5>Ajouter Un programme

    <a href="{{ url('admin/programme') }}" class="btn  float-end bg-danger text-white">Retour</a>
</h5>
@if(session('message'))
<br>
<small><div class="alert alert-succes text-white bg-danger">{{ session('message')  }} </div></small>
@endif
</div>

<div class="card-body">

    <form  action="{{ url('admin/programme') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-md-12 nb-3">
                <label for="">Code Programme</label>
                <input type="text" name='codeProgramme' class="form-control">

                @error('codeProgramme')
                <div class="error  text-danger">{{ $message }}</div>
            @enderror
            </div>


            <div class="col-md-12 nb-3">
                <label for="">Nom programme </label>

                <input type="text" name= 'nomProgramme' class="form-control">
                @error('nomProgramme')
                    <div class="error  text-danger">{{ $message }}</div>
                @enderror

            </div>

            <div class="col-md-12 nb-3">
                <label for="">Option</label>
                <input type="text" name= 'option' class="form-control">
                @error('option')
                <div class="error  text-danger">{{ $message }}</div>
            @enderror
            </div>




               <div class="col-md-12 nb-3">
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
