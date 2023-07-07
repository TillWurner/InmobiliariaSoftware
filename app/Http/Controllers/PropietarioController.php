<?php

namespace App\Http\Controllers;

use App\Models\Propietario;
use Illuminate\Http\Request;

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

        $propietario = new Propietario();
        $propietario->nombre = $nombre;
        $propietario->carnet = $carnet;
        $propietario->telefono = $telefono;
        $propietario->save();

        return back();
    }

    public function modificarPropietario(Request $request, $id)
    {
        $propietario = Propietario::find($id);

        $propietario->nombre = $request->input('nombre');
        $propietario->carnet = $request->input('carnet');
        $propietario->telefono = $request->input('telefono');
        $propietario->update();

        return back();
    }

    public function eliminarPropietario($id)
    {
        $propietario = Propietario::findOrFail($id);
        $propietario->delete();
        return back();
    }

    public function buscarPropietarios(Request $request)
    {
        $searchTerm = $request->input('search');

        $propietarios = Propietario::where('nombre', 'LIKE', '%' . $searchTerm . '%')->get();

        return response()->json($propietarios);
    }
}
