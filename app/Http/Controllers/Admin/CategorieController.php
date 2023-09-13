<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategorieFormRequest;
use App\Models\Categorie;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class CategorieController extends Controller
{
    public function index(){
        $categories= Categorie::all('*');

        return view('livewire.categorie.categories',compact('categories'));
    }

    public function editercategoriepage(Categorie $categorie){

        return view('livewire.categorie.Editcategories',compact('categorie'));

        }




        public function UpdateCategorie(CategorieFormRequest $request, $categorie_id)
        {

            $categorie = Categorie::find($categorie_id);

            if ($categorie) {
               $categorie->nomCategorie=$request->input('nomCategorie');
                $categorie->description=$request->input('description');
                $categorie->save();

                return  redirect('admin/categorie')->with('message',"Categorie modifié.");
            } else {
                return  redirect('admin/categorie')->with('message',"Categorie non trouvé.");
            }



        }










    public function nouveaucategorie(CategorieFormRequest $request){

        try{
            $categorie= new Categorie();
            $categorie->nomCategorie= $request->input('nomCategorie');
            $categorie->description = $request->input('description');

            $categoresxist= Categorie::where('nomCategorie',$request->input('nomCategorie'))->first();
            if($categoresxist){
                return  redirect('admin/categorie')->with('message',"Desolé impossible cette categorie existe déja.");

            }else{
            $categorie->save();

            Session()-> flash('message','Categorie ajouté avec succès');
            return  redirect('admin/categorie')->with('message',"Categorie ajouté avec succès.");
        }
       }catch(QueryException $exception){

        return redirect('admin/categorie')->with('message',"Erreur de duplication ou de fausse données");
       };
    }







    public function destroycategorie($categorie_id){

        $categorie =Categorie::where('id', $categorie_id)->first();

        if ($categorie) {
            $categorie->delete();
            return  redirect('admin/categorie')->with('message',"Categorie suprimé.");
        }else{

            return  redirect('admin/categorie')->with('message',"Categorie non trouvé: ");
        }



  }



}
