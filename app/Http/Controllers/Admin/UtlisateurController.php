<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UtlisateurRequest;
use App\Livewire\Admin\Diplome\Index;
use App\Models\User;
use Illuminate\Http\Request;

class UtlisateurController extends Controller
{
    public function index(){
        $users=  User::all('*');
        return view('admin.utilisateur.index',compact('users'));
    }
    public function nouveautilisateur(){
        return view('admin.utilisateur.nouveauUtilisateur');
    }
    public function insererutiliasteur(UtlisateurRequest $request){
   try {
    $user = new User();
    $user->nom=$request->input('nom');
    $user->prenom=$request->input('prenom');
    $user->email=$request->input('email');
    $user->poste=$request->input('poste');
    $user->telephone=$request->input('telephone');
    $user->role_as=$request->input('role');
    $user->password=$request->input('confirmpassword');
    if($request->input('confirmpassword') != $request->input('password')){
       return back()->with('messagenotrouve','desolé mot de passe different...');

    }else{


        $user->save();
    return redirect('admin/utilisateur')->with('message','Utilisateur ajouté avec succès...');
    }
   } catch (\Throwable $th) {

    if ($th->getCode()== 23000) {


        return   back()->with('messagenotrouve',"Erreur!! , ce email est deja utilisé...");



    }else{

        return   back()->with('messagenotrouve',"Erreur!! , Impossible d'ajouter cet utilisateur".$th->getMessage());

    }
   }

    }



    public function changelerolepage(User $user){

        return view ('admin.utilisateur.changerole',compact('user'));
    }
    public function editer($user){
     $user = User::find($user);
    return view ('admin.utilisateur.EditUtilisateur',compact('user'));
    }
    public function update(UtlisateurRequest $request, $id){
        $user = User::find($id);

        $user->nom =$request->input('nom');
        $user->prenom=$request->input('prenom');
        $user->email=$request->input('email');
        $user->telephone=$request->input('telephone');
        $user->poste=$request->input('poste');
        $user->role_as=$request->input('role');


 if($request->input('comfirmpasswordedit')==''){
            $user->save();
            return redirect('admin/utilisateur',)->with('message','Utlisateur modifié , pwsd');

        }else{
            if($request->input('comfirmpasswordedit')!=$request->input('passwordedit')){
             return back()->with('messagenotrouve','Mot de passe non identique..');

            }else{
                $user->password=$request->input('passwordedit');
                $user->save();
                $users= User::all('*');

                return redirect('admin/utilisateur',)->with('message','Utlisateur modifié');

            }


 }





}
    public function changelerolefonction($user){
        return 1;
    }
}
