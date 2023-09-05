<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EtudiantFaculte extends Model
{
    use HasFactory;
    protected $table='etudiantfacultes';


    protected $fillable = [
        'codeFaculte',
        'codeEtudiant',
        ];


        public function diplomes(){
            return $this->hasMany(Diplome::class);
        }
        public function faculte(){
            return $this->belongsTo(Faculte::class);
        }


}
