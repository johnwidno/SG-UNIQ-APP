<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\FaculteFormRequest;
use App\Models\Faculte;
use GuzzleHttp\Psr7\Message;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class FaculterController extends Controller
{
    public function index(){
        return view('admin.faculte.index');

       }


public function editpage(Faculte $faculte){

return view('admin.faculte.EditerFaculte', compact('faculte'));


}



public function UpdateFaculte( FaculteFormRequest $request ,$codeFaculte)
{

    $faculte = Faculte::find($codeFaculte);

    if ($faculte) {
        $faculte->nom = $request->input('nom');
        $faculte->codeFaculte = $request->input('CodeFaculte');
        $faculte->save();

        return  redirect('admin/facultes')->with('message',"faculté updated successfully.");
    } else {
        return  redirect('admin/facultes')->with('message',"faculté non trouvé.");
    }

}
       public function Ajouterfaculter( FaculteFormRequest $request){


        try{
            $faculte= new Faculte;
            $faculte->codeFaculte = $request->input('CodeFaculte');
            $faculte->nom = $request->input('nom');
            $faculte->save();
            
            Session()-> flash('message','faculte ajouter avec success');
            return  redirect('admin/facultes')->with('message',"fuculté inserted successfully.");

       }catch(QueryException $exception){

        return redirect('admin/facultes')->with('message',"Erreur de duplication ou de fausse données");
       };
        }
}
