<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Antes extends Model
{
    /** @use HasFactory<\Database\Factories\AntesFactory> */
    use HasFactory;

    protected $fillable = ['registro_id', 'temp_ambiente', 'temp_compostera', 'nivel_llenado', 'olor', 'animales', 'tipo_animal', 'humedad', 'foto', 'observaciones'];

    public function registro(){
        return $this->belongsTo(Registro::class,'registro_id');
    }
}