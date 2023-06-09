<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Propietario extends Model
{
    use HasFactory;

    protected $table = 'propietarios';

    protected $fillable = [
        'nombre',
        'foto',
        'carnet',
        'telefono',
    ];

    public function inmuebles()
    {
        return $this->hasMany(Inmueble::class, 'id_propietario');
    }
}
