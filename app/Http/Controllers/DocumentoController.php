<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DocumentoController extends Controller
{
    public function documentos()
    {
        return view('documento.index');
    }

    public function misdocumentos()
    {
        return view('documento.documento');
    }

}
