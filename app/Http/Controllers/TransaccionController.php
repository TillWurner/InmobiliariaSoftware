<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TransaccionController extends Controller
{
    public function transacciones()
    {
        return view('transaccion.index');
    }
}
