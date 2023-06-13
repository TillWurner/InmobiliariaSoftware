<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InmuebleController extends Controller
{
    public function inmuebles()
    {
        return view('inmueble.index');
    }
}
