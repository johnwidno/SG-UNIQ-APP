<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\DiplomeFormRequest;
use App\Livewire\Categories;
use App\Models\Categorie;
use App\Models\Diplome;
use App\Models\Etudiant;
use App\Models\Etudiant_Programme;
use App\Models\EtudiantFaculte;
use App\Models\Faculte;
use App\Models\Programme;
use App\Models\User;
use DateTime;
use GuzzleHttp\Psr7\Message;
use Illuminate\Auth\Events\Validated;
use Illuminate\Database\DBAL\TimestampType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use NunoMaduro\Collision\Adapters\Phpunit\Style;

class DiplomeController extends Controller
{
    public function index(){
        $facultes= Faculte::all('*');
        $categories= Categorie::all("*");
        return view('admin.diplome.index',compact('facultes','categories'));
    }

    public function remisepage(){

        $facultes= Faculte::all('*');
        $programmes= Programme::all('*');
        $diplomes= Diplome::all('*');
        $etudiant= new Etudiant();
        $categories=Categorie::all('*');
       return view('admin.diplome.remisediplome',compact('categories','etudiant','facultes','programmes','diplomes'));
    }
    public function editerpagefunction(Diplome $diplome  ,Etudiant $etudiant) {
        $programmes= Programme::all('*');
        $facultes= Faculte::all('*');
       return view('admin.diplome.Editerremisediplome',compact('facultes','programmes','diplome', 'etudiant'));
    }


    public function updateremise( DiplomeFormRequest $request , $id) {

        $diplome = Diplome::find($id);
        try{

        if ($diplome) {

            $diplome->codeEtudiant = $request->input('codeEtudiant');

            if($request->hasFile('fichier')){
                $path='uploads/diplome/'.$diplome->cheminVerfichier;

                if(File::exists($path)){
                    File::delete($path);
                }

                $file=$request->file('fichier');
                $ext=$file->getClientOriginalExtension();
                $filename=$request->codeEtudiant.'-'.time().'.'.$ext;
                $file->move('uploads/diplome',$filename);

                $diplome->cheminVerfichier= $filename ;
            }

        $diplome->categorie_id = $request->input('categorie_id');
        $diplome->DateEmission = $request->input('DateEmission');
        $diplome->DateLivraison = $request->input('DateLivraison');
        $diplome->NumeroEnrUniq = $request->input('NumeroEnrUniq');
        $diplome->CodeMNFP = $request->input('NumeroEnrUniq');
        $diplome->etat = $request->input('etat');
        $diplome->user_id =$request->input('user_id');
        $diplome->description =$request->input('description');
        $diplome->update();
        $programeOption = Programme::find($request->input('option'));
        $etudiant = Etudiant::find($request->input('codeEtudiant'));
        $etudiant->Programmes()->sync($programeOption->codeEtudiant);
        $etudiant->Programmes()->sync($programeOption ->codeProgramme);
        $etudiant->Programmes()->sync([$programeOption->codeProgramme => ['regime' => $request->input('regime')]]);




            return  redirect('admin/diplome')->with('message',"Etudiant updated successfully.");
        } else {
            return  redirect('admin/diplome')->with('message',"Etudiant non trouvé.");
        }

    } catch (\Exception $e) {
        return  redirect('admin/diplome')->with('message',"Impossible de modifier : ".$e->getMessage());
    }



    }



    public function selectall(Diplome $diplome) {

        return view('admin.diplome.index',compact('diplome'));


    }









    public function effectuerremisefunction(DiplomeFormRequest $request){

        $diplome =new  Diplome;
        $etudiant =new  Etudiant;
        $faculte =new  Faculte;



        try {

            $diplome->codeEtudiant = $request->input('codeEtudiant');
            $file=$request->file('fichier');
            ///verifier si le input a un fichier puis le modifie lenom pour enregistrement.

                if($request->hasFile('fichier')){
                    $ext=$file->getClientOriginalExtension();
                    $filename=$request->codeEtudiant.'-'.time().'.'.$ext;

                    $diplome->cheminVerfichier= $filename ;
                }

                ////prepare les infos pour insetion .////

                $diplome->DateEmission = $request->input('DateEmission');
                $diplome->DateLivraison = $request->input('DateLivraison');
                $diplome->NumeroEnrUniq = $request->input('NumeroEnrUniq');
                $diplome->categorie_id = $request->input('categorie_id');
                $diplome->CodeMNFP = $request->input('mnfpCode');
                $diplome->etat = $request->input('etat');
                $diplome->receveur= $request->input('receveur');
                $diplome->codeProgramme = $request->input('option');
                $diplome->description = $request->input('description');
                $diplome->user_id =$request->input('user_id');
                    ///*Verifier si le dipolme a ete deja atribuer exist. si oui annuler l'enregistreme
                    $diplomeexist = Diplome::where('codeEtudiant', $request->input('codeEtudiant'))
                    ->where('codeProgramme', $request->input('option'))
                    ->first();

                    if($diplomeexist){

                         return back()->with('message',"desolé !!!Ce diplome a été deja attribué depuis le -  '  choisir une autre option ou dicipline ");
                    }else{
                        ////** verifier si etudiant exist deja dans la table etudiantprogamme mais diplome non atribué si oui enregistre
                        $EtudiantEnreprogrammeNonDiplome = Etudiant_Programme::where('codeProgramme', $request->input('option'))
                        ->where('codeEtudiant', $request->input('codeEtudiant'))
                        ->first();

                        if($EtudiantEnreprogrammeNonDiplome){

                                ///*** verifier si code programe et faculte marche ensemble si non annuler.
                                $rechorchecodeoptionchoisi = Programme::find($request->input('option')); ///--> selectionner tous le facultes pour les compare//
                              $sicodeprogapartientafacult= Programme::where('codeProgramme','=',''. $request->input('option').'')->first();
                                if( $sicodeprogapartientafacult){
                                    if($rechorchecodeoptionchoisi->codeFaculte!=$request->input('faculte')){
                                    return  back()->with('message'," Cette faculté n'a pas cette option");
                                     }else{

                                        $diplome->save();
                                         $programeOption = Programme::find($request->input('option'));
                                         $etudiant = Etudiant::find($request->input('codeEtudiant'));
                                         $etudiant->Programmes()->sync($programeOption->codeEtudiant);
                                         $etudiant->Programmes()->sync($programeOption ->codeProgramme);
                                         $etudiant->Programmes()->sync([$programeOption->codeProgramme => ['regime' => $request->input('regime')]]);
                                         $file->move('uploads/diplome',$filename);





                                        return redirect('admin/diplome')->with('message',"Operation effectué avec succès. Assurez vous de livrer le fichier a son propriétaire.");

                                 }
                                }else{
                                    return  $rechorchecodeoptionchoisi."non Trouve";
                                }




                            //return redirect('admin/diplome')->with('message',"Operation effectué avec succès. Assurez vous de livrer le fichier a son propriétaire.");
                        }else{
                            $diplome->save();
                            $etudiantProgramme = new Etudiant_Programme();
                            $etudiantProgramme->codeEtudiant=$request->input('codeEtudiant');
                            $etudiantProgramme->codeProgramme=$request->input('option');
                            $etudiantProgramme->regime=$request->input('regime');
                            $etudiantProgramme->save();
                            $file->move('uploads/diplome',$filename);
                            return redirect('admin/diplome')->with('message',"Operation effectué avec succès.  Etudiant diplome enregistre pour un nouveau programe, Assurez vous de livrer le fichier a son propriétaire.");


                        }    ////** verifier si etudiant exist deja dans la table etudiantprogamme mais diplome non atribué si oui enregistre





                    }///* fin Verifier si le dipolme a ete deja atribuer exist. si oui annuler l'enregistreme



        }   catch (\Exception $e) {
            if ($e->getCode()== 23000) {


                return  redirect('admin/diplome/remise')->with('message',"Erreur!!!  Etudiant introuvable , assurez vous  qu'il soit enregistré dans votre base");



            } else {

                return  redirect('admin/diplome/remise')->with('message',"Impossible d'effectuer cette operation, Veuiller verifier l'integrite des informations'.$e=>getmesages(). ");

             }

        }

    }



       public function rechercheUnEtudiant(Request $request){

        if($request->search){
        $etudiant = Etudiant::where('codeEtudiant','=',''.$request->search.'')->first();
        $diplome = Diplome::where('codeEtudiant','=',''.$request->search.'');

        if($etudiant ){
            $facultes=Faculte::all('*');
            $programmes=Programme::all('*');
            $categories=Categorie::all('*');




            return view('admin.diplome.remisediplome',compact('etudiant','diplome','facultes','programmes','categories'));
        }else{
            return  redirect('admin/diplome')->with('message',"Etudiant non trouvé.");

        }

        }else{

        }

    }


  public function rechercheparfaculte(){

    return 1;
   }


   public function diplomeparusers(){
    /*$user = User::find(1);
    $diplomes = $user->diplomes;
    foreach($diplomes as $diplome)

    return $diplome->cheminVerfichier . $user->nom;*/

    $user = User::with('diplomes')->where('id','=','1')->first('id'); // Replace 1 with the user ID you want to retrieve

    $username = $user->name; // Access the username
    $diplomes = $user->diplomes;


    return  $username.  $diplomes;

   }



   public function EtudiantWithallinfos(Request $request){

    if($request->search){
    $etudiant= Etudiant::with('diplomes','facultes','programmes')->where('codeEtudiant','=',''.$request->search.'')->first('*');

          if($etudiant){

            return view('admin.etudiant.Rechecheretudiant',compact('etudiant'));
        }else{
            return  redirect('admin/etudiant')->with('messagenotrouve',"Etudiant non trouvé.");

        }

        }else{
            return  redirect('admin/etudiant')->with('messagenotrouve',"Etudiant non trouvé.");


        }

   }



   public function etudiantfaculte(){

    $etudiantsAvecFacultes = Etudiant::with('facultes')->get();

    foreach ($etudiantsAvecFacultes as $etudiant) {
          echo $etudiant->nom;
             foreach ($etudiant->facultes as $faculte) {

        echo $faculte->nom;
    }
}
   }



   public function Makeaslivre( DiplomeFormRequest $request , $id) {

    $diplome = Diplome::find($id);
    try{

    if ($diplome) {



    $diplome->etat = $request->input('etal');
    $diplome->DateEmission = $request->input('DateEmission');
    $diplome->Receveur = $request->input('receveur');
    $diplome->user_id =$request->input('user_id');

    $diplome->update();



        return  redirect('admin/diplome')->with('message',"Etudiant updated successfully.");
    } else {
        return  redirect('admin/diplome')->with('message',"Etudiant non trouvé.");
    }

} catch (\Exception $e) {
    return  redirect('admin/diplome')->with('message',"Impossible de modifier : ".$e->getMessage());
}



}



public function voirall(){

    $etudiants=Etudiant::all('*');
    return view('admin.diplome.voirall',compact('etudiants'));


}


}
