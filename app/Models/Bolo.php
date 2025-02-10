<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bolo extends Model
{
    /** @use HasFactory<\Database\Factories\BoloFactory> */
    use HasFactory;
    protected $fillable = ['nombre', 'descripcion', 'ciclos'];

    public function ciclos(){
        return $this->hasMany(Ciclo::class);
    }
}
