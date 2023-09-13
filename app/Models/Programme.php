<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Programme extends Model
{
    use HasFactory;
    protected $table='programmes';
    protected $primaryKey="codeProgramme";
    public $incrementing = false;
    protected $fillable = [
        'codeProgramme',
        'nomProgramme',
        'option',
        'codefaculte',
        ];



public function etudiants()
{
    return $this->belongsToMany(Etudiant::class, 'etudiant__programme', 'codeProgramme', 'codeEtudiant');
}
public function faculte()
    {
        return $this->belongsTo(Faculte::class,'codeFaculte');
    }


    public function diplome()
    {
        return $this->belongsTo(Programme::class,'codePrograme');
    }


}
