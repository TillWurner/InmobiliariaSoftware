<?php

namespace App\Http\Controllers;

use App\Models\Propietario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PropietarioController extends Controller
{
    public function propietarios()
    {
        $propietarios = Propietario::all();
        return view('propietario.index', ['propietarios' => $propietarios]);
    }

    public function registrarPropietario(Request $request)
    {
        $nombre = $request->input('nombre');
        $carnet = $request->input('carnet');
        $telefono = $request->input('telefono');

        if ($request->hasFile('foto')) {
            $foto = $request->file('foto');
            $fotoNombre = $foto->getClientOriginalName();
            $foto->move(public_path('fotos/fotos-propietarios'), $fotoNombre);
        } else {
            $fotoNombre = null;
        }

        $propietario = new Propietario();
        $propietario->nombre = $nombre;
        $propietario->carnet = $carnet;
        $propietario->telefono = $telefono;
        $propietario->foto = $fotoNombre;
        $propietario->save();

        return back();
    }

    public function modificarPropietario(Request $request, $id)
    {
        $propietario = Propietario::find($id);

        $propietario->nombre = $request->input('nombre');
        $propietario->carnet = $request->input('carnet');
        $propietario->telefono = $request->input('telefono');

        if ($request->hasFile('foto')) {
            // Obtener la foto anterior del gerente
            $fotoAnterior = $propietario->foto;

            // Guardar la nueva foto
            $foto = $request->file('foto');
            $fotoNombre = $foto->getClientOriginalName();
            $foto->move(public_path('fotos/fotos-propietarios'), $fotoNombre);
            // Actualizar el campo 'foto' del gerente con el nombre de la nueva foto
            $propietario->foto = $fotoNombre;

            // Eliminar la foto anterior si existe
            if ($fotoAnterior) {
                Storage::delete('public/fotos-propietarios/' . $fotoAnterior);
            }
        }


        $propietario->update();

        return back();
    }

    public function eliminarPropietario($id)
    {
        $propietario = Propietario::findOrFail($id);
        Storage::delete('fotos/fotos-propietarios/' . $propietario->foto);
        $propietario->delete();
        return back();
    }

    public function buscarPropietarios(Request $request)
    {
        $searchTerm = $request->input('search');

        $propietarios = Propietario::where('nombre', 'LIKE', '%' . $searchTerm . '%')->get();

        return response()->json($propietarios);
    }

    public function json()
    {
        $propietarios = Propietario::all();
        return response()->json($propietarios);
    }
}
