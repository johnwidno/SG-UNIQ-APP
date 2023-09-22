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
        'categorie_id',
        'DateEmission',
        'DateLivraison',
        'NumeroEnrUniq',
        'CodeMNFP',
        'etat',
        'codeProgramme',
        'Receveur',
        'description',
        'user_id',

    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function etudiant(){
        return $this->belongsTo(Etudiant::class,'codeEtudiant');
    }


    public function programme()
    {
        return $this->belongsTo(Programme::class,'codeProgramme');
    }


    public function categorie()
{
    return $this->belongsTo(Categorie::class, 'categorie_id');
}


}
