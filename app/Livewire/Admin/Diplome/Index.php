<?php

namespace App\Livewire\Admin\Diplome;

use App\Models\Diplome;
use App\Models\Etudiant;
use App\Models\Etudiant_Programme;
use App\Models\EtudiantFaculte;
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

   $facultes= Faculte::all('*');
    $programmes= Programme::all('*');
    $diplomes= Diplome::with('etudiant')->orderBy('codeEtudiant','ASC')->paginate(7);

      return view('livewire.admin.diplome.index',compact('facultes','programmes','diplomes'));
    }

    public $iddiplome;

    public function  deleteremise($Diplome_id)
    {
     $this -> iddiplome = $Diplome_id;

    }

    public function  destroyDiplomeremis()
    {
        $diplome = Diplome::where('id', $this->iddiplome)->first();
        $etudiant_Programme = Etudiant_Programme::where('codeProgramme', $diplome->codeProgramme )->first();

        $etudiantfaculte = EtudiantFaculte::where('codeEtudiant', $diplome->codeEtudiant)
        ->where('codeFaculte', $diplome->Programme->codeFaculte)
        ->first();

        $path='uploads/diplome/'.$diplome->cheminVerfichier;


            try {

                $diplome->delete();
                if(File::exists($path)){

                    if ($diplome) {

                        $diplome->delete();
                        $etudiant_Programme->delete();
                     
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
