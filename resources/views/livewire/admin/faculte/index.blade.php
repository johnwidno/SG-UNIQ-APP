
<div>


@include('admin.faculte.modelFormeFaculte')





   <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    @if(session('message'))
                        <br>
                        <small><div id="displayindeuxseconde" class="alert alert-succes text-white bg-danger">{{ session('message')  }}
                            <a href="" class="float-end text-white">refresh</a>
                        </div></small>

                        @endif
                    <h4> </h5>Facultés</h5>
                    <a href="" class="float-end btn bg-primary text-white"  data-bs-toggle="modal" data-bs-target="#FaculteModel">Ajouter une faculte</a>
                </h4>






<br><hr>
                <div class="card-body">
                    <table class="table table-hover table-striped">
                        <thead>
                            <tr >
                                <th >Code Faculte</th>
                                <th>Nom Faculte</th>
                                <th>Editer</th>
                                <th>Supprimer</th>
                            </tr>
                        </thead>

                        <tbody>

                                @foreach ($facultes as $faculte)
                                <tr>
                                    <td> {{ $faculte->codeFaculte }}</td>
                                    <td> {{ $faculte->nom }}</td>
                                    <td>
                                        <a class="btn   bg-success" href="{{ url('admin/facultes/'.$faculte->codeFaculte.'/editepage') }}" >
                                          <i class=" bg-success mdi mdi-pencil-circle text-white"></i>
                                        </a>
                                    </td>

                                    <td>
                                        <button class="btn  bg-danger " wire:click="deleteFAcultet('{{ $faculte->codeFaculte }}')" data-code="{{ $faculte->codeFaculte}}" data-bs-toggle="modal" data-bs-target="#deleteModal">
                                        <i class="mdi mdi-delete-circle  bg-danger text-white"></i>
                                        </button>
                                    </td>
                               </tr>
                            @endforeach
                        </tbody>

                    </table>

                    <div class="row">
                        <div class="col-md-12">
                          <div>{{ $facultes->links() }} <p class="float-end">Total:{{ $dataCountFaculte }}</p></div>
                       </div>
                   </div>
                </div>
                </div>



            </div>

        </div>
   </div>
</div>

