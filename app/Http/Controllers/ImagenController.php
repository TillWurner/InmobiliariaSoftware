<?php

namespace App\Http\Controllers;

use App\Models\Imagen;
use Illuminate\Http\Request;

class ImagenController extends Controller
{
    public function imagenes($id)
    {
        $imagenes = Imagen::where('id_inmueble', $id)->get();

        return view('imagen.index', ['imagenes' => $imagenes, 'id' => $id]);
    }

    public function registrarImagen(Request $request, $id)
    {
        $descripcion = $request->input('descripcion');
        $id_inmueble = $id;

        $imagen = new Imagen();
        $imagen->descripcion = $descripcion;
        $imagen->id_inmueble = $id_inmueble;
        $imagen->save();

        return back();
    }

    public function modificarImagen(Request $request, $id)
    {
        $imagen = Imagen::find($id);

        $imagen->descripcion = $request->input('descripcion');
        $imagen->update();

        return back();
    }

    public function eliminarImagen($id)
    {
        $imagen = Imagen::findOrFail($id);
        $imagen->delete();
        return back();
    }
}
