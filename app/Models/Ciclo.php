<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ciclo extends Model
{
    /** @use HasFactory<\Database\Factories\CicloFactory> */
    use HasFactory;

    protected $fillable = ['bolo_id', 'compostera_id', 'final', 'terminado'];


    public function registros(){
        return $this->hasMany(Registro::class);
    }

    public function bolo(){
        return $this->belongsTo(Bolo::class, 'bolo_id');
    }
    
    public function compostera()
    {
        return $this->belongsTo(Compostera::class);
    }

    public function antes()
    {
        return $this->hasOne(Antes::class, 'registro_id', 'registro_id');
    }

    
}
