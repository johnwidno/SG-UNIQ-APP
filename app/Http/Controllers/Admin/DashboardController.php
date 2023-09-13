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



    public function index(){
        $facultes =Faculte::all('*');
        $etudiants =Etudiant::all('*');

        $programmes =Programme::all('*');
        $categories =Categorie::all('*');
        $etudiantpros = Etudiant_Programme::all('*');


        $diplomesParCategorie = Diplome::selectRaw('categorie_id, COUNT(*) as quantite')
            ->groupBy('categorie_id')
            ->get();

        $diplomesParetats = Diplome::selectRaw('etat, COUNT(*) as quantite')
            ->groupBy('etat')
            ->get();

            $totaletudiant=Etudiant::count('*');
            $totalprograme=Programme::count('*');



        return view('admin.dashboard',
        compact('facultes','etudiants','totaletudiant','totalprograme','programmes','etudiantpros','diplomesParCategorie','diplomesParetats','categories'));

        }






}
