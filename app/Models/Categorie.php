<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categorie extends Model
{
    use HasFactory;

    protected $table ='categories';

    protected $fillable = [
        'nomCategorie',
        'description',
    ];

    public function diplomes()
{
    return $this->hasMany(Diplome::class, 'categorie_id');
}
}
