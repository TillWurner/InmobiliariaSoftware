<?php

namespace App\Http\Controllers;

use App\Models\Gerente;
use Illuminate\Http\Request;

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

    public function modificarGerente(Request $request, $id)
    {
        $gerente = Gerente::find($id);

        $gerente->nombre = $request->input('nombre');
        $gerente->telefono = $request->input('telefono');
        $gerente->correo = $request->input('correo');
        $gerente->carnet = $request->input('carnet');
        $gerente->update();

        return back();
    }
    public function registrarGerente(Request $request)
    {
        $nombre = $request->input('nombre');
        $telefono = $request->input('telefono');
        $correo = $request->input('correo');
        $carnet = $request->input('carnet');
        $password = $request->input('contrasena');

        $gerente = new Gerente();
        $gerente->nombre = $nombre;
        $gerente->telefono = $telefono;
        $gerente->correo = $correo;
        $gerente->carnet = $carnet;
        $gerente->password = $password;
        $gerente->save();

        return back();
    }

    public function eliminarGerente($id)
    {
        $gerente = Gerente::findOrFail($id);
        $gerente->delete();
        return back();
    }


}
