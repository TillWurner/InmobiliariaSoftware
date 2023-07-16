<?php

namespace App\Http\Controllers;

use App\Models\Imagen;
use Illuminate\Http\Request;

class ImagenController extends Controller
{
    public function imagenes($id)
    {
        $imagenes = Imagen::where('inmueble_id', $id)->get();

        return view('imagen.index', ['imagenes' => $imagenes, 'id' => $id]);
    }

    public function registrarImagen(Request $request, $id)
    {
        if (Imagen::count() !== 0) {
            $descripcion = $request->input('descripcion');
            $inmueble_id = $id;
            if ($request->hasFile('foto')) {
                $foto = $request->file('foto');
                $fotoNombre = $foto->getClientOriginalName();
                $foto->move(public_path('fotos/fotos-inmuebles'), $fotoNombre);
            } else {
                $fotoNombre = null;
            }

            $imagen = new Imagen();
            $imagen->imagen = $fotoNombre;
            $imagen->descripcion = $descripcion;
            $imagen->inmueble_id = $inmueble_id;
            $imagen->save();

            return back();
        } else {
            $descripcion = $request->input('descripcion');
            $inmueble_id = $id;
            if ($request->hasFile('foto')) {
                $foto = $request->file('foto');
                $fotoNombre = $foto->getClientOriginalName();
                $foto->move(public_path('fotos/fotos-inmuebles'), $fotoNombre);
            } else {
                $fotoNombre = null;
            }

            $imagen = new Imagen();
            $imagen->imagen = $fotoNombre;
            $imagen->descripcion = $descripcion;
            $imagen->destacado = true;
            $imagen->inmueble_id = $inmueble_id;
            $imagen->save();

            return back();
        }
    }

    public function modificarImagen(Request $request, $id)
    {
        $imagen = Imagen::find($id);
        $imagen->descripcion = $request->input('descripcion');
        $imagen->save();

        return back();
    }

    public function eliminarImagen($id)
    {
        $imagen = Imagen::findOrFail($id);
        $imagen->delete();
        return back();
    }

    public function destacarImagen($id, $idInmueble)
    {
        $imagen = Imagen::where('inmueble_id', $idInmueble)->where('destacado', true)->first();
        $imagen->destacado = false;
        $imagen->update();

        $imagen = Imagen::findOrFail($id);
        $imagen->destacado = true;
        $imagen->update();
        return back();
    }
}
