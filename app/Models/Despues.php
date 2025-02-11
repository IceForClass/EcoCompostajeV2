<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Despues extends Model
{
    /** @use HasFactory<\Database\Factories\DespuesFactory> */
    use HasFactory;
    protected $fillable = ['registro_id', 'nivel_llenado', 'foto', 'observaciones'];

    public function registro(){
        return $this->belongsTo(Registro::class,'registro_id');
    }
}
