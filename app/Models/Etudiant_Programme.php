<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Etudiant_Programme extends Model
{
    use HasFactory;
    protected $table='etudiant__programme';
    protected $fillable = [
        'codeEtudiant',
        'codeProgramme',
        'regime',
        ];

}
