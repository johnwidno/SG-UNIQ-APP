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



/*
public function Programmes(){
    $this->hasMany(Programme::class,'codeFaculte');
}*/

public function programmes()
{
    return $this->hasMany(Programme::class, 'codeFaculte', 'codeFaculte');
}

public function etudiants()
{
    return $this->belongsToMany(Etudiant::class, 'etudiant_faculte', 'codeFaculte', 'codeEtudiant');
}



public function getEtudiantsCountAttribute()
{
    return $this->etudiants()->count();
}

}
