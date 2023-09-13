<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\EtudiantFormRequest;
use App\Http\Requests\EtudiantforRequest;
use App\Models\Diplome;
use App\Models\Etudiant;
use App\Models\Etudiant_Programme;
use App\Models\EtudiantFaculte;
use App\Models\Faculte;
use App\Models\Programme;
use Dotenv\Validator;
use GuzzleHttp\Psr7\Message;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Catch_;

class EtudiantController extends Controller
{
   public function index(){
    return view('admin.etudiant.index');

   }

   public function nouveauEtudiant(){

    $facultes= Faculte::all('*');
    $programmes= Programme::all('*');
    return view('admin.etudiant.nouveauetudiant',compact('facultes', 'programmes'));
   }








public function insertEtudiant(EtudiantFormRequest $request)
{

  try{
    $etudiant = new Etudiant();
    $etudiantProgramme = new Etudiant_Programme();

    $etudiant->codeEtudiant = $request->input('code');
    $etudiant->nom = $request->input('nom');
    $etudiant->prenom = $request->input('prenom');
    $etudiant->sexe = $request->input('sexe');


     $faculte = Faculte::find($request->input('faculte'));
     $programeOption = Programme::find($request->input('option'));

     $Prog = Programme::where('codeProgramme','=',''. $programeOption->codeProgramme.'')->first();
     if($Prog){
        if($Prog->codeFaculte != $request->input('faculte') ){

            return  back()->with('messagenotrouve',"option et programme ne marche pas.");
        }else{
            $etudiant->save();
            // Attach the Faculte to the Etudiant in the pivot table
            $etudiant->facultes()->attach($faculte->codeFaculte);
          // $etudiant->Programmes()->attach($programeOption ->codeProgramme);

           $etudiantProgramme->codeEtudiant= $request->input('code');
           $etudiantProgramme->codeProgramme=$programeOption ->codeProgramme;
           $etudiantProgramme->regime=$request->input('regime');
           $etudiantProgramme->save();
        return  redirect('admin/etudiant')->with('message',"Etudiant Enregistré avec  succès.");
        }

     }else{
        return  back('admin/etudiant/nouveauEtudiant')->with('messagenotrouve',"progamme introuvable.");

 }
} catch (QueryException $exception) {



   return redirect('admin/etudiant/nouveauEtudiant')->with(['messagenotrouve' => 'Desolé!!!,Cet etudiant existe déja'.$exception->getMessage()] );



}

}






public function editer(Etudiant $etudiant){
    return view('admin.etudiant.EditerEtudiant',compact('etudiant'));



}
public function rechercheUnEtudiant(Request $request){

    if($request->search){
    $etudiant = Etudiant::where('codeEtudiant','=',''.$request->search.'')->first();
    if($etudiant ){
        $facultes=Faculte::all('*');
        $programmes=Programme::all('*');
        return view('admin.etudiant.Rechecheretudiant',compact('etudiant','facultes','programmes'));
    }else{
        return  redirect('admin/etudiant')->with('messagenotrouve',"Etudiant non trouvé.");

    }

    }else{

        return  redirect('admin/etudiant')->with('messagenotrouve',"Etudiant non trouvé.");
    }

}

public function UpdateEtudiant( EtudiantFormRequest $request ,$codeEtudiant)
{

    $etudiant = Etudiant::find($codeEtudiant);
    $etudiantfaculte = EtudiantFaculte::where('codeEtudiant','=',''.$codeEtudiant.'')->first();

    if ($etudiant) {
        $etudiant->nom = $request->input('nom');
        $etudiant->prenom = $request->input('prenom');
        $etudiant->sexe = $request->input('sexe');
        $etudiantfaculte->codeEtudiant=request()->input('code');
        $etudiantfaculte->codeFaculte=request()->input('faculte');

        $etudiant->save();
        $etudiantfaculte->save();
        return  redirect('admin/etudiant')->with('message',"Etudiant updated successfully.");
    } else {
        return  redirect('admin/etudiant')->with('message',"Etudiant non trouvé.");
    }

}









}



