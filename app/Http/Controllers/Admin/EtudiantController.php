<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\EtudiantFormRequest;
use App\Http\Requests\EtudiantforRequest;

use App\Models\Etudiant;
use App\Models\Faculte;
use App\Models\Programme;
use Dotenv\Validator;
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
    $etudiant->codeEtudiant = $request->input('code');
    $etudiant->nom = $request->input('nom');
    $etudiant->prenom = $request->input('prenom');
    $etudiant->sexe = $request->input('sexe');
    $etudiant->save();


   return  redirect('admin/etudiant')->with('message',"Etudiant inserted successfully.");

} catch (QueryException $exception) {

   return redirect('admin/etudiant/nouveauEtudiant')->with(['message' => 'Desolé!!!,Cet etudiant existe déja']);



  }

}

public function editer(Etudiant $etudiant){


}

public function UpdateEtudiant( EtudiantFormRequest $request ,$codeEtudiant)
{

    $etudiant = Etudiant::find($codeEtudiant);

    if ($etudiant) {
        $etudiant->nom = $request->input('nom');
        $etudiant->prenom = $request->input('prenom');
        $etudiant->sexe = $request->input('sexe');
        $etudiant->save();

        return  redirect('admin/etudiant')->with('message',"Etudiant updated successfully.");
    } else {
        return  redirect('admin/etudiant')->with('message',"Etudiant non trouvé.");
    }



  /*  $etudiant = Etudiant:: findOrFail($etudiant);



$etudiant = new Etudiant();
$etudiant->codeEtudiant = $request->input('code');
$etudiant->nom = $request->input('nom');
$etudiant->prenom = $request->input('prenom');
$etudiant->sexe = $request->input('sexe');
$etudiant->update();


return  redirect('admin/etudiant')->with('message',"Etudiant updated successfully.");

*/
}









}



