<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Etudiant extends Model
{
    use HasFactory;

    protected $table ='etudiants';
    protected $primaryKey = 'codeEtudiant';
    public $incrementing = false;
    protected $fillable = [
        'codeEtudiant',
        'nom',
        'prenom',
        'sexe',
    ];



   public  function diplomes(){
    return $this->hasMany(Diplome::class, 'codeEtudiant');
   }

   public function facultes()
   {
       return $this->belongsToMany(Faculte::class, 'etudiant_faculte', 'codeEtudiant', 'codeFaculte');
   }
   public function Programmes()
   {
       return $this->belongsToMany(Programme::class, 'etudiant__programme', 'codeEtudiant', 'codeProgramme')->withPivot('regime');
   }

   // Student.php (assuming this is your Student model)
public function programme()
{
    return $this->belongsTo(Programme::class, 'codeProgramme'); // Assuming 'programme_id' is the foreign key in the students table
}/*
public function diplome()
{
    return $this->belongsTo(Diplome::class, 'codeEtudiant'); // Assuming 'programme_id' is the foreign key in the students table
}*/

public function diplome()
{
    return $this->hasOne(Diplome::class, 'codeEtudiant', 'codeEtudiant');
}



}
