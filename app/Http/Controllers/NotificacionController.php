<?php

namespace App\Http\Controllers;

use App\Models\Inmueble;
use App\Models\Notificacion;
use App\Models\User;
use Illuminate\Http\Request;

class NotificacionController extends Controller
{
    public function notificacion($idAsesor)
    {
        $cantidad_notificaciones = Notificacion::where('id_asesor', $idAsesor)->count();
        $notificaciones = Notificacion::where('id_asesor', $idAsesor)->get();

        if ($notificaciones->isNotEmpty()) {
            $mensaje = '<p>Buenas noticias!</p><p>Te asignaron nuevos inmuebles</p><hr>';
            foreach ($notificaciones as $item) {
                $mensaje .= '<a href="' . route('inmueble', ['id' => $item->id_inmueble, 'idNotificacion' => $item->id]) . '">' . $item->mensaje . '</a><hr>';
            }
        } else {
            $mensaje = 'No hay nada nuevo!';
        }

        $data = [
            'cantidad_notificaciones' => $cantidad_notificaciones,
            'mensaje' => $mensaje,
        ];

        return response()->json($data);
    }
}
