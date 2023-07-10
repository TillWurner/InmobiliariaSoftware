<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Propietario;


class MapaController extends Controller
{
    public function mapas()
    {
        return view('mapa.index');
    }
}
