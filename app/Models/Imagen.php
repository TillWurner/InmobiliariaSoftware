<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Imagen extends Model
{
    use HasFactory;

    protected $table = 'imagenes';
    protected $primaryKey = 'id';

    protected $fillable = [
        'id',
        'imagen',
        'descripcion',
        'destacado',
        'inmueble_id',
    ];

    public function inmueble()
    {
        return $this->belongsTo(Inmueble::class, 'inmueble_id');
    }
}
