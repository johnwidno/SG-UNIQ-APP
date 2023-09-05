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
  



}
