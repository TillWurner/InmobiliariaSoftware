<?php

namespace App\Http\Controllers;

use App\Models\Gerente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class GerenteController extends Controller
{
    public function gerentes()
    {
        //return view('Gerente.index');
        $gerentes = Gerente::all();
        return view('Gerente.index', ['gerentes' => $gerentes]);
    }

    public function perfil(){

        return view('Gerente.profile');
    }

    public function modificarGerente(Request $request)
    {

        $id = $request->route('id'); // Obtener el ID del asesor de la ruta
        $gerente = Gerente::find($id);

        $gerente->nombre = $request->input('nombre');
        $gerente->telefono = $request->input('telefono');
        $gerente->correo = $request->input('correo');
        $gerente->carnet = $request->input('carnet');

        if ($request->hasFile('foto')) {
            // Obtener la foto anterior del gerente
            $fotoAnterior = $gerente->foto;

            // Guardar la nueva foto
            $foto = $request->file('foto');
            $fotoNombre = $foto->getClientOriginalName();
            $foto->move(public_path('fotos/fotos-gerentes'), $fotoNombre);
            // Actualizar el campo 'foto' del gerente con el nombre de la nueva foto
            $gerente->foto = $fotoNombre;

            // Eliminar la foto anterior si existe
            if ($fotoAnterior) {
                Storage::delete('public/fotos-gerentes/' . $fotoAnterior);
            }
        }

        $gerente->save();

        return back();
    }
    public function registrarGerente(Request $request)
    {
        $nombre = $request->input('nombre');
        $telefono = $request->input('telefono');
        $correo = $request->input('correo');
        $carnet = $request->input('carnet');
        $password = $request->input('contrasena');

        if ($request->hasFile('foto')) {
            $foto = $request->file('foto');
            $fotoNombre = $foto->getClientOriginalName();
            $foto->move(public_path('fotos/fotos-gerentes'), $fotoNombre);
        } else {
            $fotoNombre = null;
        }

        $gerente = new Gerente();
        $gerente->nombre = $nombre;
        $gerente->telefono = $telefono;
        $gerente->correo = $correo;
        $gerente->carnet = $carnet;
        $gerente->password = $password;
        $gerente->foto = $fotoNombre;
        $gerente->save();

        return back();
    }

    public function eliminarGerente($id)
    {
        $gerente = Gerente::findOrFail($id);
        Storage::delete('fotos/fotos-gerentes/' . $gerente->foto);
        $gerente->delete();
        return back();
    }

    public function json()
    {
        $gerentes = Gerente::all();
        return response()->json($gerentes);
    }

}
