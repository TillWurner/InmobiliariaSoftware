<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asesor extends Model
{
    use HasFactory;

    protected $table = 'asesores';

    protected $fillable = [
        'nombre',
        'correo',
        'telefono',
        'carnet',
        'codigo'
    ];
}
