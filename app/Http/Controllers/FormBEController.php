<?php

namespace App\Http\Controllers;
use App\Models\Config;

use Illuminate\Http\Request;

class FormBEController extends Controller
{ 
    public function formControl(){
        $conf = Config::find(1);
        return view('Formularios.registro', compact('conf'));
    }
    public function showConfig(){
        $conf = Config::first();
        return view('Administrador.editForm', compact('conf'));
    }
    public function update(Request $request){
        $conf = Config::first();
        $conf->Valor = $request->color;
        $conf->save();

        return redirect()->route('actualizar.formulario')->with('success', '¡El color se ha actualizado correctamente!');
    }
}
