<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProgrammeFormRequest;
use App\Models\Programme;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class ProgrammeController extends Controller
{
    public function index(){
    return view('admin.programme.index');

    }

    public function addprogrammepage(){
        return view('admin.programme.Ajouterprogramme');

        }
    public function editerprogramepage(Programme $programme){
        return view('admin.programme.Editerprogramme',compact('programme'));

        }
    public function addprogrammefuntion(ProgrammeFormRequest $request){

       try{
            $programme= new Programme;
            $programme->codeProgramme = $request->input('codeProgramme');
            $programme->nomProgramme = $request->input('nomProgramme');
            $programme->option = $request->input('option');
            $programme->save();


            return  redirect('admin/programme')->with('message',"programme inserted successfully.");

      }catch(QueryException $exception){

        return redirect('admin/programme')->with('message',"Erreur de duplication ou de fausse données");
       };
        }




        public function UpdateProgramme( ProgrammeFormRequest $request ,$codeProgramme)
{

    $programme = Programme::find($codeProgramme);

    if ($programme) {
        $programme->codeProgramme= $request->input('codeProgramme');
        $programme->nomProgramme = $request->input('nomProgramme');
        $programme->option = $request->input('option');

        $programme->save();

        return  redirect('admin/programme')->with('message',"programme updated successfully.");
    } else {
        return  redirect('admin/programme')->with('message',"faculté non trouvé.");
    }

}
}
