<?php

namespace App\Livewire\Admin\Diplome;

use App\Models\Diplome;
use App\Models\Faculte;
use App\Models\Programme;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $dataCount;
    public function render()
    {

    $diplomes = Diplome::orderBy('codeEtudiant','ASC')->paginate(10);
    $facultes= Faculte::all('*');
    $programmes= Programme::all('*');

      return view('livewire.admin.diplome.index',compact('diplomes','facultes','programmes'));
    }



    public function mount()
    {
        $this->dataCount = Diplome::count();
    }
}
