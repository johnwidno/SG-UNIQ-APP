<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Diplome extends Model
{
    use HasFactory;

    protected $table='diplomes';
    protected $fillable=[
        'codeEtudiant',
        'cheminVerfichier',
        'categorie',
        'DateEmission',
        'NumeroEnrUniq',
        'CodeMNFP',
        'status',
        'description',
        'user_id',

    ];

 

}
