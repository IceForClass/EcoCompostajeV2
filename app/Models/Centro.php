<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Centro extends Model
{
    /** @use HasFactory<\Database\Factories\CentroFactory> */
    use HasFactory, HasApiTokens, Notifiable;

    protected $fillable = ['nombre', 'direccion', 'codigo','tipo','personaResponsable'];

    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function registros()
    {
        return $this->hasManyThrough(
            Registro::class,Compostera::class,
            'centro_id','compostera_id',  
            'id','id'                   
        );
    }

    public function composteras()
    {
        return $this->hasMany(Compostera::class);
    }
    
}