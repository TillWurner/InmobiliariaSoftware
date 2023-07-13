<?php

namespace App\Http\Controllers;

use App\Models\Inmueble;
use App\Models\Notificacion;
use App\Models\Propietario;
use App\Models\User;
use Illuminate\Http\Request;

class InmuebleController extends Controller
{
    public function inmuebles()
    {
        $inmuebles = Inmueble::all();
        $asesores = User::where('tipo', 'Asesor')->get();
        return view('inmueble.index', ['inmuebles' => $inmuebles, 'asesores' => $asesores]);
    }

    public function registrarInmueble(Request $request)
    {
        $id_propietario = $request->input('id_propietario');
        $direccion = $request->input('direccion');
        $tamano = $request->input('tamano');
        $precio = $request->input('precio');
        $razon = $request->input('razon');
        $descripcion = $request->input('descripcion');
        $coordenada = $request->input('coordenada');

        $inmueble = new Inmueble();
        $inmueble->id_propietario = $id_propietario;
        $inmueble->direccion = $direccion;
        $inmueble->tamano = $tamano;
        $inmueble->precio = $precio;
        $inmueble->razon = $razon;
        $inmueble->descripcion = $descripcion;
        $inmueble->coordenada = $coordenada;
        $inmueble->save();

        return back();
    }

    public function modificarInmueble(Request $request, $id)
    {
        $inmueble = Inmueble::find($id);

        $inmueble->direccion = $request->input('direccion');
        $inmueble->tamano = $request->input('tamano');
        $inmueble->precio = $request->input('precio');
        $inmueble->razon = $request->input('razon');
        $inmueble->descripcion = $request->input('descripcion');
        $inmueble->update();

        return back();
    }

    public function eliminarInmueble($id)
    {
        $inmueble = Inmueble::findOrFail($id);
        $inmueble->delete();
        return back();
    }

    public function asignarAsesor(Request $request, $id_inmueble)
    {
        $id_asesor = $request->input('id_asesor');

        $inmueble = Inmueble::find($id_inmueble);
        $inmueble->id_asesor = $id_asesor;
        $inmueble->update();

        $id_inmueble = $request->input('id_inmueble');
        $mensaje = "Inmueble Asignado -> ID: " . $id_inmueble;

        $notificacion = new Notificacion();
        $notificacion->mensaje = $mensaje;
        $notificacion->id_asesor = $id_asesor;
        $notificacion->id_inmueble = $id_inmueble;
        $notificacion->save();
    }

    public function asignar(Request $request)
    {
        $id_inmueble = $request->input('id_inmueble');
        return $id_inmueble;
    }

    public function json()
    {
        $inmuebles = Inmueble::all();
        return response()->json($inmuebles);
    }

    public function inmueble($id = null, $idNotificacion = null)
    {
        $inmueble = null;
        $inmuebles = null;

        if ($id !== null) {
            $inmueble = Inmueble::findOrFail($id);
            $notificacion = Notificacion::findOrFail($idNotificacion);
            $notificacion->delete();
        } else {
            $inmuebles = Inmueble::all();
        }

        // return view('inmueble.inmueblesAsesor', ['inmueble' => $inmueble, 'inmuebles' => $inmuebles]);
        return back();
    }
}
