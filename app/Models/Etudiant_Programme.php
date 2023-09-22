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
        public function etudiant()
        {
            return $this->belongsTo('App\Models\Etudiant', 'codeEtudiant');
        }

        public function programme()
        {
             return $this->belongsTo('App\Models\Programme', 'codeProgramme');
        }


}
