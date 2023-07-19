<?php

namespace App\Http\Controllers;

use App\Models\Inmueble;
use App\Models\Notificacion;
use App\Models\Propietario;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InmuebleController extends Controller
{
    public function inmuebles()
    {
        $inmuebles = Inmueble::with('imagenes')->orderBy('id')->get();
        $inmueblesA = Inmueble::with('imagenes')
            ->orWhere('id_asesor', Auth::user()->id)->orderBy('id')
            ->get();
        $asesores = User::where('tipo', 'Asesor')->get();
        $inmuebleBase = 'https://static.wixstatic.com/media/63b041_e98452ee67e3450eb6936162bd357726~mv2_d_8333_5729_s_4_2.jpg/v1/fill/w_1000,h_688,al_c,q_85,usm_0.66_1.00_0.01/63b041_e98452ee67e3450eb6936162bd357726~mv2_d_8333_5729_s_4_2.jpg';
        return view('inmueble.index', ['inmuebles' => $inmuebles, 'asesores' => $asesores, 'inmuebleBase' => $inmuebleBase, 'inmueblesA' => $inmueblesA]);
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
        $inmueble->save();

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
            $inmueble = Inmueble::with('imagenes')->findOrFail($id);
            $notificacion = Notificacion::findOrFail($idNotificacion);
            $notificacion->delete();
        } else {
            $inmuebles = Inmueble::all();
        }

        return view('inmueble.inmueblesAsesor', ['inmueble' => $inmueble, 'inmuebles' => $inmuebles]);
        // return back();
    }


    // public function obtenerInmueblesConCoordenadas()
    // {
    //     $inmuebles = Inmueble::select('id', 'coordenada')->get();
    //     return response()->json($inmuebles);
    // }
}
