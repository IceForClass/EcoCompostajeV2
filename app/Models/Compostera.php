<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Compostera extends Model
{
    /** @use HasFactory<\Database\Factories\ComposteraFactory> */
    use HasFactory;
    protected $fillable = ['ocupada','tipo','centro_id'];

    public function centro()
    {
        return $this->belongsTo(Centro::class, 'centro_id', 'id');
    }

    public function registros()
    {
        return $this->hasMany(Registro::class, 'compostera_id', 'id');
    }
    
    public function ciclos(){
        return $this->hasMany(Ciclo::class, 'compostera_id' , 'id');
    }
}
