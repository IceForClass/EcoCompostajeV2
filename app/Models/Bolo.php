<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Orion\Concerns\DisableAuthorization;

class Bolo extends Model
{
    /** @use HasFactory<\Database\Factories\BoloFactory> */
    use HasFactory, DisableAuthorization;
    protected $fillable = ['nombre', 'descripcion', 'ciclos'];

    public function ciclos(){
        return $this->hasMany(Ciclo::class);
    }
    
    public function registros()
{
    return $this->hasManyThrough(
        Registro::class,  // Modelo final (Registros)
        Ciclo::class,     // Modelo intermedio (Ciclo)
        "bolo_id",        // Clave foránea en la tabla intermedia (Ciclo)
        "ciclo_id",       // Clave foránea en la tabla final (Registro)
        "id",             // Clave primaria en la tabla principal (Bolo)
        "id"              // Clave primaria en la tabla intermedia (Ciclo)
    );

    
}

public function antes()
{
    return $this->hasManyThrough(Antes::class, Registro::class, 'ciclo_id', 'registro_id');
}


}
