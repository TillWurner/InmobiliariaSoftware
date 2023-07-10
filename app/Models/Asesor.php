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
        'foto',
        'correo',
        'telefono',
        'carnet',
        'codigo'
    ];

    public function inmueble()
    {
        return $this->hasMany(Inmueble::class);
    }
}
