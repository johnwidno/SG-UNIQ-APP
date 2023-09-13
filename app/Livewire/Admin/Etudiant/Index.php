<?php

namespace App\Livewire\Admin\Etudiant;

use App\Models\Etudiant;
use App\Models\EtudiantFaculte;
use App\Models\Faculte;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Item;

class Index extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $codeEtudiantToDelete ='';
    public function  deleteEtudiant($Etudiant_codeEtudiant)
    {
     $this -> codeEtudiantToDelete = $Etudiant_codeEtudiant;
     //dd($codeEtudiant);

    }




    public function destroyEtudiant()
    {
        $etudiant = Etudiant::where('codeEtudiant', $this->codeEtudiantToDelete)->first();

        if ($etudiant) {
            $etudiant->delete();
            return  redirect('admin/etudiant')->with('message',"Etudiant suprimé.");
        }else{

            return  redirect('admin/etudiant')->with('message',"Etudiant non trouvé: ".$this->codeEtudiantToDelete);
        }



  }
  public $dataCount;

  public function mount()
  {
      $this->dataCount = Etudiant::count();
  }

    public function render()
    {
        $etudiants = Etudiant::orderBy('created_at', 'desc')->paginate(5);

        return view('livewire.admin.etudiant.index', compact('etudiants'));
      // return view('livewire.admin.etudiant.index',compact('etudiants'));

    }
public $facultescode ;

public $page = 1;
public function loadMore()
{
    $this->page++;
}

}



