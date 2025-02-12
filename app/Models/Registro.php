<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Orion\Concerns\DisableAuthorization;

class Registro extends Model
{
    /** @use HasFactory<\Database\Factories\RegistroFactory> */
    use HasFactory, DisableAuthorization;

    protected $fillable = ['user_id', 'ciclo_id', 'compostera_id', 'fecha'];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function bolo(){
        return $this->belongsTo(Bolo::class);
    }

    public function compostera(){
        return $this->belongsTo(Compostera::class);
    }

    public function antes(){
        return $this->hasMany(Antes::class);
    }

    public function durante(){
        return $this->hasMany(Durante::class);
    }

    public function despues(){
        return $this->hasMany(Despues::class);
    }
}