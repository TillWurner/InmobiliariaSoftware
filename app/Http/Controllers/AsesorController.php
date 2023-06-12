<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AsesorController extends Controller
{
    public function asesores()
    {
        return view('asesor.index');
    }
}
