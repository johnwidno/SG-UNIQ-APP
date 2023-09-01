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
}
