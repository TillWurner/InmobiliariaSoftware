<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inmueble extends Model
{
    use HasFactory;

    protected $table = 'inmuebles';

    protected $fillable = [
        'coordenada',
        'tamano',
        'direccion',
        'precio',
        'razon',
        'descripcion',
        'id_propietario',
        'id_asesor',
    ];

    public function propietario()
    {
        return $this->belongsTo(Propietario::class, 'id_propietario');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id_asesor');
    }

    public function asesor()
    {
        return $this->belongsTo(Asesor::class, 'id_asesor');
    }

    public function transaccion()
    {
        return $this->hasMany(Transaccion::class);
    }

    public function imagen()
    {
        return $this->hasMany(Transaccion::class);
    }
}
