<?php

namespace App\Livewire\Admin\Programme;

use App\Models\Programme;
use Livewire\Component;
use Livewire\WithPagination;
class Index extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $dataCountprogramme;
    public function mount()
    {
        $this->dataCountprogramme = Programme::count();
    }


    public function render()
    {
        $programme = Programme::orderBy('codeProgramme','ASC')->paginate(5);
        return view('livewire.admin.programme.index',['programmes'=> $programme]);
    }

    public $codeprogrammeToDelete;

    public function  deleteprogramme($codeprograme)
    {
     $this -> codeprogrammeToDelete = $codeprograme;
     //dd($codeEtudiant);

    }

    public function destroyprogramme()
    {
        $programme = Programme::where('codeProgramme', $this->codeprogrammeToDelete)->first();

        if ($programme) {
            $programme->delete();
            return  redirect('admin/programme')->with('message',"programme supprimé avec succès.");
        }else{
            return  back()->with('message','Programme non trouvé');

        }
}
}
