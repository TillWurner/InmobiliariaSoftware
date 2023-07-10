<?php

namespace App\Http\Controllers;

use App\Models\Documento;
use App\Models\Inmueble;
use Illuminate\Http\Request;

class DocumentoController extends Controller
{
    public function documents()
    {
        $documentos = Documento::all();
        return view('documento.index', ['documentos' => $documentos]);
    }

    public function misdocumentos($id)
    {
        $inmueble = Inmueble::find($id);
        $documentos = Documento::where('id_inmueble', $inmueble->id)->get();
        return view('documento.documento', compact('documentos', 'inmueble'));
    }

    public function registrarDocumento(Request $request)
    {
        if ($request->hasFile('archivo')) {
            $archivo = $request->file('archivo');
            $nombreArchivo = uniqid() . '.' . $archivo->getClientOriginalExtension();
            $archivo->storeAs('public/documentos', $nombreArchivo);
    
            // Guardar el nombre del archivo en la base de datos
            $documento = new Documento;
            $documento->descripcion = $request->input('descripcion');
            $documento->archivo = $nombreArchivo;
            $documento->fecha = $request->input('fecha');
            $documento->id_inmueble = $request->input('id_inmueble');
            $documento->save();
    
        return back();
        }
    }
    
    public function eliminarDocumento($id)
    {
        $documento = Documento::findOrFail($id);
        $documento->delete();
        return back();
    }

    public function json()
    {
        $documentos = Documento::all();
        return response()->json($documentos);
    }


}
