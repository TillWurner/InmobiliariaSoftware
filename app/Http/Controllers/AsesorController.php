<?php

namespace App\Http\Controllers;

use App\Models\Asesor;
use Illuminate\Http\Request;

class AsesorController extends Controller
{
    public function asesores()
    {
        $asesores = Asesor::all();
        return view('asesor.index', ['asesores' => $asesores]);
    }

    public function registrarAsesor(Request $request)
    {
        $nombre = $request->input('nombre');
        $correo = $request->input('correo');
        $telefono = $request->input('telefono');
        $carnet = $request->input('carnet');
        $codigo = $request->input('codigo');

        $asesor = new Asesor();
        $asesor->nombre = $nombre;
        $asesor->correo = $correo;
        $asesor->telefono = $telefono;
        $asesor->carnet = $carnet;
        $asesor->codigo = $codigo;
        $asesor->save();

        return back();
    }

    public function modificarAsesor(Request $request, $id)
    {
        $asesor = Asesor::find($id);

        $asesor->nombre = $request->input('nombre');
        $asesor->correo = $request->input('correo');
        $asesor->telefono = $request->input('telefono');
        $asesor->carnet = $request->input('carnet');
        $asesor->codigo = $request->input('codigo');
        $asesor->update();

        return back();
    }

    public function eliminarAsesor($id)
    {
        $asesor = Asesor::findOrFail($id);
        $asesor->delete();
        return back();
    }

    public function buscarAsesores(Request $request)
    {
        $searchTerm = $request->input('search');

        $asesores = Asesor::where('nombre', 'LIKE', '%' . $searchTerm . '%')->get();

        return response()->json($asesores);
    }
}
