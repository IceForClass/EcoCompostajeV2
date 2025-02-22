<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Durante extends Model
{
    /** @use HasFactory<\Database\Factories\DuranteFactory> */
    use HasFactory;

    protected $fillable = ['registro_id', 'riego', 'remover', 'aporte_verde','aporte_seco', 'cantidad_aporteVLitros', 'cantidad_aporteVKilos','tipo_aporteV','cantidad_aporteSLitros', 'cantidad_aporteSKilos','tipo_aporteS', 'foto', 'observaciones'];

    public function registro(){
        return $this->belongsTo(Registro::class,'registro_id');
    }
}