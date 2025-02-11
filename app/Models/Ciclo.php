<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ciclo extends Model
{
    /** @use HasFactory<\Database\Factories\CicloFactory> */
    use HasFactory;

    protected $fillable = ['bolo_id', 'final', 'terminado'];

    public function registros(){
        return $this->hasMany(Registro::class);
    }

    public function bolo(){
        return $this->belongsTo(Bolo::class);
    }
}
