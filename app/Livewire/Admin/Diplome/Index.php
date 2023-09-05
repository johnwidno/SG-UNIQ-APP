<?php

namespace App\Livewire\Admin\Diplome;

use App\Models\Diplome;
use App\Models\Faculte;
use App\Models\Programme;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $dataCount;
    public function render()
    {

    $diplomes = Diplome::orderBy('id','ASC')->paginate(7);
    $facultes= Faculte::all('*');
    $programmes= Programme::all('*');

      return view('livewire.admin.diplome.index',compact('diplomes','facultes','programmes'));
    }

    public $iddiplome;

    public function  deleteremise($Diplome_id)
    {
     $this -> iddiplome = $Diplome_id;

    }

    public function  destroyDiplomeremis()
    {
        $diplome = Diplome::where('id', $this->iddiplome)->first();

         $path='uploads/diplome/'.$diplome->cheminVerfichier;


            try {


                if(File::exists($path)){

                    if ($diplome) {

                        $diplome->delete();
                        File::delete($path);
                        return  redirect('admin/diplome')->with('message',"remise suprimé.");
                    }else{

                        return  redirect('admin/diplome')->with('message',"diplome non trouvé: ".$this->codeEtudiantToDelete);
                    }


                }

            } catch (\Exception $e) {
                return  redirect('admin/diplome')->with('message',"ereur dans la supression de fichier".$e->getMessage());
            }





    }



  

    public function mount()
    {
        $this->dataCount = Diplome::count();
    }
}
