<?php

namespace App\Http\Controllers;

use App\Models\Asesor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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

        if ($request->hasFile('foto')) {
            $foto = $request->file('foto');
            $fotoNombre = $foto->getClientOriginalName();
            $foto->move(public_path('fotos/fotos-asesores'), $fotoNombre);
        } else {
            $fotoNombre = null;
        }

        $asesor = new Asesor();
        $asesor->nombre = $nombre;
        $asesor->correo = $correo;
        $asesor->telefono = $telefono;
        $asesor->carnet = $carnet;
        $asesor->codigo = $codigo;
        $asesor->foto = $fotoNombre;
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

        if ($request->hasFile('foto')) {
            // Obtener la foto anterior del gerente
            $fotoAnterior = $asesor->foto;

            // Guardar la nueva foto
            $foto = $request->file('foto');
            $fotoNombre = $foto->getClientOriginalName();
            $foto->move(public_path('fotos/fotos-asesores'), $fotoNombre);
            // Actualizar el campo 'foto' del gerente con el nombre de la nueva foto
            $asesor->foto = $fotoNombre;

            // Eliminar la foto anterior si existe
            if ($fotoAnterior) {
                Storage::delete('public/fotos-asesores/' . $fotoAnterior);
            }
        }



        $asesor->update();

        return back();
    }

    public function eliminarAsesor($id)
    {
        $asesor = Asesor::findOrFail($id);
        Storage::delete('fotos/fotos-asesores/' . $asesor->foto);
        $asesor->delete();
        return back();
    }

    public function buscarAsesores(Request $request)
    {
        $searchTerm = $request->input('search');

        $asesores = Asesor::where('nombre', 'LIKE', '%' . $searchTerm . '%')->get();

        return response()->json($asesores);
    }
    public function json()
    {
        $asesores = Asesor::all();
        return response()->json($asesores);
    }
}
