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
        'option'
        ];

        public function Faculte(){
            $this->belongsTo(Faculte::class,);
        }

}
