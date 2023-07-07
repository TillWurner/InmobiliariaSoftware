<?php

namespace App\Http\Controllers;

use App\Models\Documento;
use App\Models\Inmueble;
use Illuminate\Http\Request;

class DocumentoController extends Controller
{
    public function documentos()
    {
        return view('documento.index');
    }

    public function misdocumentos($id)
    {
        $inmueble = Inmueble::find($id);
        $documentos = Documento::where('id_inmueble', $inmueble->id)->get();
        return view('documento.documento', compact('documentos', 'inmueble'));
    }

    public function registrarDocumento(Request $request)
    {
        $descripcion = $request->input('descripcion');
        $archivo = $request->input('archivo');
        $fecha = $request->input('fecha');
        $id_inmueble = $request->input('id_inmueble');
    
        $documento = new Documento();
        $documento->descripcion = $descripcion;
        $documento->archivo = $archivo;
        $documento->fecha = $fecha;
        $documento->id_inmueble = $id_inmueble;
        $documento->save();
    
        return back();
    }
    
    public function eliminarDocumento($id)
    {
        $documento = Documento::findOrFail($id);
        $documento->delete();
        return back();
    }


}
