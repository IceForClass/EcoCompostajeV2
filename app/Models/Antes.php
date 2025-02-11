<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Antes extends Model
{
    /** @use HasFactory<\Database\Factories\AntesFactory> */
    use HasFactory;

    protected $fillable = ['registro_id', 'temp_ambiente', 'temp_compostera', 'nivel_llenado', 'olor', 'insectos', 'tipo_insectos', 'humedad', 'fotos', 'observaciones'];

    public function registro(){
        return $this->belongsTo(Registro::class,'registro_id');
    }
}