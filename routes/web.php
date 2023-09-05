<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('admin')->middleware('isAdmin')->group(function(){
Route::get('dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index']);




Route::controller(App\Http\Controllers\Admin\EtudiantController::class)->group(function () {
    Route::get('/etudiant', 'index');
    Route::get('/etudiant/nouveauEtudiant', 'nouveauEtudiant');
    Route::post('/etudiant', 'insertEtudiant');
     Route::get('/etudiant/{etudiant}/edit', 'editer');
    Route::put('/etudiant/{etudiant}', 'UpdateEtudiant');
    Route::get('/etudiant/{etudiant}/delete', 'deleteEtudiant');
    Route::get('/etudiant/search', 'rechercheUnEtudiant');
});


Route::get('/facultes',  [App\Http\Controllers\Admin\FaculterController::class,'index']);
Route::post('/facultes',  [App\Http\Controllers\Admin\FaculterController::class,'Ajouterfaculter']);
Route::get('/facultes/{faculte}/editepage',  [App\Http\Controllers\Admin\FaculterController::class,'editpage']);
Route::put('/facultes/{faculte}', [App\Http\Controllers\Admin\FaculterController::class, 'UpdateFaculte']);

/*
Route::get('/programme',  [App\Http\Controllers\Admin\ProgrammeController::class,'index']);
Route::get('/programme/addprogramme',  [App\Http\Controllers\Admin\ProgrammeController::class,'addprogrammepage']);
Route::post('/programme', [App\Http\Controllers\Admin\ProgrammeController::class, 'addprogrammefuntion']);
Route::get('/programme/{programme}/editerpage', [App\Http\Controllers\Admin\ProgrammeController::class, 'editerprogramepage']);
Route::put('/programme/{programme}', [App\Http\Controllers\Admin\ProgrammeController::class, 'UpdateProgramme']);
Route::put('/programme/{programme}/delete', [App\Http\Controllers\Admin\ProgrammeController::class, 'UpdateProgramme']);
*/


Route::controller(App\Http\Controllers\Admin\ProgrammeController::class)->group(function () {
    Route::get('/programme', 'index');
    Route::get('/programme/addprogramme', 'addprogrammepage');
    Route::post('/programme', 'addprogrammefuntion');
    Route::get('programme/{programme}/editerpage', 'editerprogramepage');
    Route::get('/programme/{programme}', 'UpdateProgramme');
    Route::put('/programme/{programme}/delete', 'UpdateProgramme');

});



Route::controller(App\Http\Controllers\Admin\DiplomeController::class)->group(function () {
    Route::get('/diplome', 'index');
    Route::get('/diplome/remise', 'remisepage');
    Route::post('/diplome', 'effectuerremisefunction');
    Route::get('/diplome/{diplome}/{etudiant}/edit', 'editerpagefunction');
    Route::get('/diplome/{diplome}', 'updateremise');
    Route::get('/diplome/remise/search', 'rechercheUnEtudiant');
    Route::get('/diplome/recherche/search', 'EtudiantWithallinfos');
    Route::get('/diplome/remise/livre', 'diplomeparusers');



    //Route::put('/diplome/{diplome}/delete', 'deletRemise');
   // Route::put('/diplome/{diplome}/select', 'selectall');


});





});







Route::get('/admin/remise', function () {
    return view('diplomes.formulaireDiplome');
});
