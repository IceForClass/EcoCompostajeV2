<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Orion\Concerns\DisableAuthorization;
use \Znck\Eloquent\Traits\BelongsToThrough;

class Registro extends Model
{
    /** @use HasFactory<\Database\Factories\RegistroFactory> */
    use HasFactory, DisableAuthorization;

    protected $fillable = ['user_id', 'ciclo_id', 'compostera_id', 'fecha'];

    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }

    public function bolo()
{
    
    return $this->belongsToThrough(Bolo::class, Ciclo::class)
                ->select('bolos.nombre');
}

    public function compostera(){
        return $this->belongsTo(Compostera::class,'compostera_id');
    }

    public function antes(){
        return $this->hasMany(Antes::class);
    }

    public function durante(){
        return $this->hasMany(Durante::class, 'registro_id', 'id');
    }

    public function despues(){
        return $this->hasMany(Despues::class);
    }

    public function ciclo(){
        return $this->belongsTo(Ciclo::class, 'ciclo_id');
    }
}