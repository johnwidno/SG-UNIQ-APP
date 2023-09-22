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
    return view('home');
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
    Route::put('/etudiant/{etudiant}','UpdateEtudiant');
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
    //Route::put('/programme/edit/{programme}', 'UpdateProgramme');
    Route::put('/programme/{programme}','UpdateProgramme');
    //Route::put('/programme/{programme}/delete', 'UpdateProgramme');

});



Route::controller(App\Http\Controllers\Admin\DiplomeController::class)->group(function () {
    Route::get('/diplome', 'index');
    Route::get('/diplome/remise', 'remisepage');
    Route::post('/diplome', 'effectuerremisefunction');
    Route::get('/diplome/{diplome}/{etudiant}/edit', 'editerpagefunction');
    Route::get('/diplome/{diplome}', 'updateremise');
    Route::get('/diplome/remise/search', 'rechercheUnEtudiant');
    Route::get('/diplome/recherche/search', 'EtudiantWithallinfos');
    Route::get('/diplome/recherche/livre/{diplome}', 'Makeaslivrepage');
    Route::get('/diplome/recherche/livre/{diplome}/change', 'Makeaslivre');
    Route::get('/diplome/fullscreen', 'voirall');
    Route::get('/diplome/etudiants_par_programme/liste', 'etudiantsParProgramme');
    Route::get('/diplome/etudiants_par_faculte/liste', 'etudiantsParFaculte');
    Route::get('/diplome/etudiants_par_faculte/liste/{faculte}', 'etudiantsParFacultedsashbord');
    Route::get('/diplome/etudiants_par_datelivraison/liste', 'etudiantspadateLivraison');
    Route::get('/dashbord/etat/', 'diplomeetat');



   //Route::put('/diplome/{diplome}/delete', 'deletRemise');
   // Route::put('/diplome/{diplome}/select', 'selectall');


});




Route::controller(App\Http\Controllers\Admin\CategorieController::class)->group(function () {
    Route::get('/categorie', 'index');
    Route::post('/categorie', 'nouveaucategorie');
    Route::get('/categorie/{categorie}/edit', 'editercategoriepage');
    Route::put('/categorie/{categorie}', 'UpdateCategorie');
    Route::get('/categorie/{categorie}/delete', 'destroycategorie');

});

Route::controller(App\Http\Controllers\Admin\UtlisateurController::class)->group(function () {
    Route::get('/utilisateur', 'index');
    Route::get('/utilisateur/add', 'nouveautilisateur');
    Route::post('/utilisateur/add/nouveau', 'insererutiliasteur');
    Route::get('/utilisateur/{utilisateur}', 'changelerolepage');
    Route::get('/utilisateur/edit/{utilisateur}', 'editer');
    Route::put('/utilisateur/edit/update/{utilisateur}', 'update');
    Route::get('/utilisateur/change/{utilisateur}/change', 'changelerolefonction');

  });




});







Route::get('/admin/remise', function () {
    return view('diplomes.formulaireDiplome');
});
