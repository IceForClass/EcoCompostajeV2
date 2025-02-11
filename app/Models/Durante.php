<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Durante extends Model
{
    /** @use HasFactory<\Database\Factories\DuranteFactory> */
    use HasFactory;

    protected $fillable = ['registro_id', 'riego', 'remover', 'aporte_verde', 'cantidad_aporteV', 'tipo_aporteV', 'aporte_seco', 'cantidad_aporteS', 'tipo_aporteS', 'foto', 'observaciones'];

    public function registros(){
        return $this->morphMany(Registro::class, "registroable");
    }
}
