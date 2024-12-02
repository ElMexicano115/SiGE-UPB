<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class panelController extends Controller
{
    public function index()
    {
        //Presentación de las organizaciones
        return view('Administrador.adminPanel');
    }
}
