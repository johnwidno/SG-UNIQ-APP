<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\DiplomeFormRequest;
use App\Models\Diplome;
use App\Models\Etudiant;
use App\Models\Faculte;
use App\Models\Programme;
use App\Models\User;
use DateTime;
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
        return view('admin.diplome.index',compact('facultes'));
    }
    public function remisepage(){

        $facultes= Faculte::all('*');
        $programmes= Programme::all('*');
        $diplomes= Diplome::all('*');
        $etudiant = new Etudiant;
        return view('admin.diplome.remisediplome',compact('facultes','programmes','diplomes','etudiant'));
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

        $diplome->categorie = $request->input('categorie');
        $diplome->DateEmission = $request->input('DateEmission');
        $diplome->NumeroEnrUniq = $request->input('NumeroEnrUniq');
        $diplome->CodeMNFP = $request->input('NumeroEnrUniq');
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



    public function selectall(Diplome $diplome) {

        return view('admin.diplome.index',compact('diplome'));


    }




   public function effectuerremisefunction(DiplomeFormRequest $request){

         $diplome =new  Diplome;
         try{
            $diplome->codeEtudiant = $request->input('codeEtudiant');
            $file=$request->file('fichier');

                if($request->hasFile('fichier')){
                    $ext=$file->getClientOriginalExtension();
                    $filename=$request->codeEtudiant.'-'.time().'.'.$ext;

                    $diplome->cheminVerfichier= $filename ;
                }

            $diplome->categorie = $request->input('categorie');
            $diplome->DateEmission = $request->input('DateEmission');
            $diplome->NumeroEnrUniq = $request->input('NumeroEnrUniq');
            $diplome->CodeMNFP = $request->input('NumeroEnrUniq');
            $diplome->receveur = $request->input('receveur');
            $diplome->description = $request->input('description');
            $diplome->user_id =$request->input('user_id');
            $diplome->save();
            $file->move('uploads/diplome',$filename);


            return redirect('admin/diplome')->with('message',"Operation effectué avec succès. Assurez vous de livrer le fichier a son propriétaire.");
        } catch (\Exception $e) {

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



            return view('admin.diplome.remisediplome',compact('etudiant','diplome','facultes','programmes'));
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
    $etudiant= Etudiant::with('diplomes')->where('codeEtudiant','=',''.$request->search.'')->first('*');
    $diplomes=$etudiant->diplomes;

          if($etudiant){
            $facultes=Faculte::all('*');
            $programmes=Programme::all('*');

            return view('admin.etudiant.Rechecheretudiant',compact('etudiant','diplomes','facultes','programmes'));
        }else{
            return  redirect('admin/diplome')->with('message',"Etudiant non trouvé.");

        }

        }else{

        }

   }


}
