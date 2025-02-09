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
    
}
