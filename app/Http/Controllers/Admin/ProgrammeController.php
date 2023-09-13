<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProgrammeFormRequest;
use App\Models\Faculte;
use App\Models\Programme;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class ProgrammeController extends Controller
{
    public function index(){
    return view('admin.programme.index');

    }

    public function addprogrammepage(){
        $facultes =Faculte::all('*');
        return view('admin.programme.Ajouterprogramme',compact('facultes'));

        }
    public function editerprogramepage(Programme $programme){
        $facultes =Faculte::all('*');
        return view('admin.programme.Editerprogramme',compact('programme','facultes'));

        }
    public function addprogrammefuntion(ProgrammeFormRequest $request){

       try{
            $programme= new Programme;
            $programme->codeProgramme = $request->input('codeProgramme');
            $programme->nomProgramme = $request->input('nomProgramme');
            $programme->option = $request->input('option');
            $programme->codefaculte = $request->input('faculte');
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
       $programme->codeFaculte = $request->input('faculte');

        $programme->save();

        return  redirect('admin/programme')->with('message',"programme updated successfully.");
    } else {
        return  redirect('admin/programme')->with('message',"faculté non trouvé.");
    }

}
}
