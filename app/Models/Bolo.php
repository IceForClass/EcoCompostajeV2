<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Bolo extends Model
{
    /** @use HasFactory<\Database\Factories\BoloFactory> */
    use HasFactory ;
    protected $fillable = ['nombre', 'descripcion', 'terminado','final'];

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
    return $this->hasManyThrough(
        Antes::class,   // Modelo final (Antes)
        Registro::class, // Modelo intermedio (Registros)
        'ciclo_id',      // Clave foránea en registros que apunta a ciclos
        'registro_id',   // Clave foránea en antes que apunta a registros
        'id',            // Clave primaria en bolos
        'id'             // Clave primaria en ciclos
    );
}

public function durantes()
{
    return $this->hasManyThrough(Durante::class, Registro::class, 'ciclo_id', 'registro_id');
}


}