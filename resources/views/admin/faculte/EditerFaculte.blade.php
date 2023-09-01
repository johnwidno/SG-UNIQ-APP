@extends('admin.admin')
@section('content')

<div class="row">
<div class="col-md-12">
<div class="card">
<div class="card-header">
<h5>Editer

    <a href="{{ url('admin/facultes') }}" class="btn  float-end bg-danger text-white">Retour</a>
</h5>
</div>

<div class="card-body">

    <form  action="{{ url('admin/facultes/'.$faculte->codeFaculte ) }}" method="POST" enctype="multipart/form-data">

        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-md-12 nb-3">
                <label for="">Code</label>
                <input value ="{{ $faculte->codeFaculte  }}" type="text" name= 'CodeFaculte' class="form-control">

                @error('code')
                <div class="error  text-danger">{{ $message }}</div>
            @enderror
            </div>



            <div class="col-md-12 nb-3">
                <label for="">Nom</label>

                <input value="{{ $faculte->nom  }}" type="text" name= 'nom' class="form-control">
                @error('nom')
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
