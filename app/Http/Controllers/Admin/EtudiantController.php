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

            return  back()->with('messagenotrouve',"L'Option choisi ne corespond pas au faculté.");
        }else{
            $etudiant->save();
            // Attach the Faculte to the Etudiant in the pivot table
            //$etudiant->facultes()->attach($faculte->codeFaculte);
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
    $programmes=Programme::all('*');
    $facultes=Faculte::all('*');


    return view('admin.etudiant.EditerEtudiant',compact('etudiant','programmes','facultes'));



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

    try{
        $etudiant = Etudiant::find($codeEtudiant);
        if($etudiant ){

            //$etudiant->codeEtudiant=$request->input('codeEtudiant');
            $etudiant->nom=$request->input('nom');
            $etudiant->prenom=$request->input('prenom');
            $etudiant->sexe=$request->input('sexe');

            $programme = Programme::find($request->input('option'));
            $faculte = Faculte::find($request->input('faculte'));
            $progdife=$programme::where('codeProgramme', $programme->codeProgramme)->first();

            if($progdife){
                if($programme->codeFaculte!=$faculte->codeFaculte){
                    return  back()->with('messagenotrouve',"L'option choisi ne corespond pas au faculté.");
                    }else{
                        $etudiant->save();
                        $etudiant->Programmes()->sync($request->input('codeEtudiant'));
                        $etudiant->Programmes()->sync($request->input('option'));
                        $etudiant->Programmes()->sync([$progdife->codeProgramme => ['regime' => $request->input('regime')]]);


                        return  redirect('admin/etudiant')->with('message',"Modification effectué avec  succès.");

 }

            }else{

                return 'option non trouvable';
             }}
             else{
                return 'etudian introuvable';
             }



    } catch (QueryException $exception) {



       return redirect('admin/etudiant/nouveauEtudiant')->with(['messagenotrouve' => 'Desolé!!!,Cet etudiant existe déja'.$exception->getMessage()] );



    }

}




}



