<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notificacion extends Model
{
    use HasFactory;

    protected $table = 'notificaciones';

    protected $fillable = ['mensaje', 'id_asesor'];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_asesor');
    }
}
