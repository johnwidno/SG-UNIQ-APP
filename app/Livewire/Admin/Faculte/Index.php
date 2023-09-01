<?php

namespace App\Livewire\Admin\Faculte;

use App\Models\Faculte;
use Illuminate\Contracts\Session\Session;
use Illuminate\Contracts\Support\ValidatedData;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $codefaculte, $nom;
public function rules(){
    return ['CodeFaculte'=>'required|string',
            'nom'=>'required|string',
        ];


}




public $dataCountFaculte;

public function mount()
{
    $this->dataCountFaculte = Faculte::count();
}


    public function render()
    {
        $faculte = Faculte::orderBy('nom','ASC')->paginate(4);
        return view('livewire.admin.faculte.index',['facultes'=> $faculte]);

    }
}
