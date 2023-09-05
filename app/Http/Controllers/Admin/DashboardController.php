<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Diplome;
use App\Models\Faculte;
use App\Models\Programme;
use Illuminate\Http\Request;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

class DashboardController extends Controller
{



    public function index(){
        $facultes =Faculte::all('*');
        $progammes =Programme::all('*');
        return view('admin.dashboard',compact('facultes','progammes'));

    }




}
