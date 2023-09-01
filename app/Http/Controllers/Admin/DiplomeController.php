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
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

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
        return view('admin.diplome.remisediplome',compact('facultes','programmes','diplomes'));
    }
    public function editerpagefunction(Diplome $diplome  ,Etudiant $etudiant) {
        $programmes= Programme::all('*');
        $facultes= Faculte::all('*');
        return view('admin.diplome.Editerremisediplome',compact('facultes','programmes','diplome', 'etudiant'));
    }
    public function updateremise( DiplomeFormRequest $request , $id) {

        $diplome = Diplome::find($id);

        if ($diplome) {

            $diplome->codeEtudiant = $request->input('codeEtudiant');

            if($request->hasFile('fichier')){
                $path='uploads/diplome'.$diplome->cheminVerfichier;

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





    }
    public function deletRemise(Diplome $diplome) {



        return $diplome->id.'dddddddddd';

    }


    public function selectall(Diplome $diplome) {

        return view('admin.diplome.index',compact('diplome'));


    }



/*
    public function effectuerremisefunction(DiplomeFormRequest $request){
        $validateData = $request -> validated();
        $users= User::findOrfail($validateData['user_id']);
       $diplome= $users->diplomes()->create([
       ' codeEtudiant'=>$validateData['codeEtudiant'],
       ' cheminVerfichier'=>$validateData['fichier'],
       ' categorie'=>$validateData['categorie'],
       ' DateEmission'=>$validateData['DateEmission'],
       ' NumeroEnrUni'=>$validateData['NumeroEnrUni'],
       ' user_id'=>$validateData['codeEtudiant'],

        ]);
        return  redirect('admin/diplome')->with('message',"ce diplome vient d'etre emis aujourd'hui.". $diplome->id);





    }*/



   public function effectuerremisefunction(DiplomeFormRequest $request){

         $diplome =new  Diplome;
            $diplome->codeEtudiant = $request->input('codeEtudiant');

                if($request->hasFile('fichier')){
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
            $diplome->save();


            return redirect('admin/diplome')->with('message',"ce diplome vient d'etre emis aujourd'hui.");


       }







}
