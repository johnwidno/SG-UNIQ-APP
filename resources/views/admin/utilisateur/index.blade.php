@extends('admin.admin')

@section('content')

<div>


    <div class="card">
        <div class="card-header">
            <div class="row">
                @if(session('message'))
                 <small>
                 <div id="displayindeuxseconde" class="alert alert-succes text-white bg-success">{{ session('message')  }}
                     <a href="" class="float-end text-white">refresh</a>
                 </div>

                 </small>
             @endif
                <div class="col-md-4">
                    <h6>Gestion des utilisateurs</h6>
                </div>
                <div class="col-md-8">
                   <a class="float-end border-0 bg-primary btn text-white" href="{{ url('admin/utilisateur/add') }}">Nouveau utilisateur</a>
                </div>
            </div>
        </div>

        <div class="card-body">
            <div class="table-responsive pt-1">
                <table class="table " id= "resultTable">
                  <thead>
                     <tr>


                        <th>Nom </th>
                        <th>Prenom</th>
                        <th>telephone</th>
                        <th>email</th>
                        <th>poste</th>
                        <th>role</th>
                         <th>date de creation</th>
                        <th>Action</th>
                    </tr>

                  </thead>
                  <tbody>
                        @foreach ($users as $user)
                      <tr>
                         <td>{{ $user->nom }} </td>
                         <td>{{ $user->prenom }} </td>
                         <td>{{ $user->telephone }} </td>
                         <td>{{ $user->email }} </td>
                         <td>{{ $user->poste }} </td>
                         <td>{{ $user->role_as }} </td>
                         <td>{{ $user->created_at }} </td>
                         <td> <a href="{{ url('admin/utilisateur/edit/'.$user->id)}}">edit</a></td>

                       </tr>
                       @endforeach

                  </tbody>
                </table>
              </div>
        </div>
    </div>
</div>


@endsection
