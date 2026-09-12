<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function productos()
    {
        // Por ahora enviamos una colección vacía o datos de prueba para la plantilla
        return view('client.productos');
    }
}