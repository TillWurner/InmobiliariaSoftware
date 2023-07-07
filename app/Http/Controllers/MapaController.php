<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MapaController extends Controller
{
    public function mapas()
    {
        return view('mapa.index');
    }
}
