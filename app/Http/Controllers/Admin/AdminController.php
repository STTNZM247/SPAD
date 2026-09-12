<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function testDatabase()
    {
        // Consultamos la tabla usuario que acabamos de ver en tu captura
        $usuarios = DB::table('usuario')->get();

        // Pasamos la variable a la vista
        return view('admin.test-db', compact('usuarios'));
    }
}