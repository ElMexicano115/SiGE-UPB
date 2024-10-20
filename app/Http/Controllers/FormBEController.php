<?php

namespace App\Http\Controllers;
use App\Models\Config;

use Illuminate\Http\Request;

class FormBEController extends Controller
{ 
    public function formControl(){
        $conf = Config::all();
        return view('Formularios.registro', compact('conf'));
    }
    public function showConfig(){
        $configuracion = Config::all();
        return view('Administrador.editForm', compact('configuracion'));
    }
    public function update(Request $request){
        //instanciar las configuraciones
        $configuracion = Config::all();

        // seleccionar el logo
        $logo = $configuracion->where("Apartado", "=", "logo")->first();
        if ($request->hasFile('logo')) {
            $imagenPath = $request->file('logo')->store('public/assets/Formulario');
            $imagenUrl = Storage::url($imagenPath);
            // Guardar la URL de la imagen en la workshop
            $taller->img = $imagenUrl;
        }
        
        //seleccionar el color
        $color = $configuracion->where("Apartado", "=", "color")->first();
        $color->Valor = $request->color;
        $color->save(); // guradar la nueva configuracion

        // activador de talleres
        if($request->talleres == null){
            $talleres =$configuracion->where("Apartado", "=", "talleres")->first();
            $talleres->Valor = "desactivado";
            $talleres->save();
        }else{
            $talleres =$configuracion->where("Apartado", "=", "talleres")->first();
            $talleres->Valor = $request->talleres;
            $talleres->save();
        }

        // verificador de datos
        if($talleres->save() && $color->save()){
            return response()->json('success', '201');
        } else {
            return response()->json('fail', '400');
        }
        
    }
}
