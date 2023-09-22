<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Categorie;
use App\Models\Diplome;
use App\Models\Etudiant;
use App\Models\Etudiant_Programme;
use App\Models\Faculte;
use App\Models\Programme;
use Illuminate\Http\Request;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

class DashboardController extends Controller
{

public $totalparfacs;

    public function index(){




        $facultes = Faculte::all();

        $facultyStudentCounts = [];
        foreach ($facultes as $faculte) {
            $studentCount = Etudiant_Programme::whereHas('programme', function($query) use ($faculte) {
                $query->where('codeFaculte', $faculte->codeFaculte);
            })->count();
            $facultyStudentCounts[$faculte->codeFaculte] = $studentCount;
        }


       $etudiants =Etudiant::all('*');
        $categories =Categorie::all('*');
        $etudiantpros = Etudiant_Programme::all('*');

       /* $programmes = Programme::select('programmes.codeFaculte')
        ->join('Etudiant__Programme','programmes.codeProgramme', '=', 'Etudiant__Programme.codeProgramme')
        ->groupBy('programmes.codeFaculte') // Assurez-vous d'inclure toutes les colonnes ici
        ->get();
*/



        $programmes=Programme::all('*');

        $diplomesParCategorie = Diplome::selectRaw('categorie_id, COUNT(*) as quantite')
            ->groupBy('categorie_id')
            ->get();

        $diplomesParetats = Diplome::selectRaw('etat, COUNT(*) as quantite')
            ->groupBy('etat')
            ->get();

            $totaletudiant=Etudiant::count('*');
            $totalprograme=Programme::count('*');


        return view('admin.dashboard',
        compact('facultes','facultyStudentCounts','etudiants','totaletudiant','totalprograme','programmes','etudiantpros','diplomesParCategorie','diplomesParetats','categories'));

        }






}
