<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Faculte extends Model
{
    use HasFactory;
    protected $table='facultes';
    protected $primaryKey="codeFaculte";
    public $incrementing = false;
    protected $fillable = [
        'codeFaculte',
        'nom',
        ];

public function etudiants(){
    $this->hasMany(Etudiant::class,'codeEtudiant');
}

public function Programmes(){
    $this->hasMany(Programme::class,'codeFaculte');
}


    }
