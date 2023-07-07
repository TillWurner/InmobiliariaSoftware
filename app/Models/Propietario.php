<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Propietario extends Model
{
    use HasFactory;

    protected $table = 'propietarios';

    protected $fillable = [
        'foto',
        'nombre',
        'carnet',
        'telefono',
    ];

    public function inmueble()
    {
        return $this->hasMany(Inmueble::class);
    }
}
