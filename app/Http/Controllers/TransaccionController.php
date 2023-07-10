<?php

namespace App\Http\Controllers;

use App\Models\Transaccion;
use Carbon\Carbon;
use Illuminate\Http\Request;

class TransaccionController extends Controller
{
    public function transacciones()
    {
        $transacciones = Transaccion::all();
        return view('transaccion.index', ['transacciones' => $transacciones]);
    }

    public function registrarTransaccion(Request $request)
    {
        $interesado = $request->input('interesado');
        $fecha = Carbon::now();
        $id_inmueble = $request->input('id_inmueble');

        $transaccion = new Transaccion();
        $transaccion->interesado = $interesado;
        $transaccion->fecha = $fecha;
        $transaccion->inmueble_id = $id_inmueble;
        $transaccion->save();

        return redirect()->route('transacciones');
    }

    public function modificarTransaccion(Request $request, $id)
    {
        $transaccion = Transaccion::find($id);

        $transaccion->interesado = $request->input('interesado');
        $transaccion->update();

        return back();
    }

    public function eliminarTransaccion($id)
    {
        $transaccion = Transaccion::findOrFail($id);
        $transaccion->delete();
        return back();
    }

    public function json()
    {
        $transacciones = Transaccion::all();
        return response()->json($transacciones);
    }

}
