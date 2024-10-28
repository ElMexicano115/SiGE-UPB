<?php

namespace App\Http\Controllers;
use App\Models\Config;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class FormBEController extends Controller
{
    public function formControl()
    {
        $configuracion = Config::all();
        return view('Formularios.registro', compact('configuracion'));
    }
    public function showConfig()
    {
        $configuracion = Config::all();
        return view('Administrador.editForm', compact('configuracion'));
    }
    public function update(Request $request)
    {
        //instanciar las configuraciones
        $configuracion = Config::all();

        // cambiar el estado del formulario
        $estadoFormulario = $configuracion->where("Apartado", "=", "registro")->first();
        $estadoFormulario->Valor = $request->registro;
        $estadoFormulario->save();

        // seleccionar el logo
        $logo = $configuracion->where("Apartado", "=", "logo")->first();
        if ($request->hasFile('logo')) {
            Storage::disk('assets')->delete('/assets/Formulario/' . $logo->Valor);
            $nombreLogo = $request->logo->hashName();
            $path = $request->logo->storeAs('/assets/Formulario', 'custom' . $nombreLogo, 'assets');
            $logo->Valor = 'custom' . $nombreLogo;
            $logo->save();
        }
        // seleccionar el color del logo
        $colorLogo = $configuracion->where("Apartado", "=", "colorLogo")->first();
        $colorLogo->Valor = $request->colorLogo;
        $colorLogo->save();

        //seccion de contacto
        $colorTituloContacto = $configuracion->where('Apartado', '=', 'colorTituloContacto')->first();
        $colorTituloContacto->Valor = $request->colorTituloContacto;
        $colorTituloContacto->save();
        $colorTextoTituloContacto = $configuracion->where('Apartado', '=', 'colorTextoTituloContacto')->first();
        $colorTextoTituloContacto->Valor = $request->colorTextoTituloContacto;
        $colorTextoTituloContacto->save();
        $colorFondoContacto = $configuracion->where('Apartado', '=', 'colorFondoContacto')->first();
        $colorFondoContacto->Valor = $request->colorFondoContacto;
        $colorFondoContacto->save();
        $colorTextoContacto = $configuracion->where('Apartado', '=', 'colorTextoContacto')->first();
        $colorTextoContacto->Valor = $request->colorTextoContacto;
        $colorTextoContacto->save();
        $colorIconoContacto = $configuracion->where('Apartado', '=', 'colorIconoContacto')->first();
        $colorIconoContacto->Valor = $request->colorIconoContacto;
        $colorIconoContacto->save();

        //seccion de talleres
        $colorTituloTaller = $configuracion->where('Apartado', '=', 'colorTituloTaller')->first();
        $colorTituloTaller->Valor = $request->colorTituloTaller;
        $colorTituloTaller->save();
        $colorTextoTituloTaller = $configuracion->where('Apartado', '=', 'colorTextoTituloTaller')->first();
        $colorTextoTituloTaller->Valor = $request->colorTextoTituloTaller;
        $colorTextoTituloTaller->save();
        $colorFondoTaller = $configuracion->where('Apartado', '=', 'colorFondoTaller')->first();
        $colorFondoTaller->Valor = $request->colorFondoTaller;
        $colorFondoTaller->save();
        $colorTextoTaller = $configuracion->where('Apartado', '=', 'colorTextoTaller')->first();
        $colorTextoTaller->Valor = $request->colorTextoTaller;
        $colorTextoTaller->save();
        $colorBotonTaller = $configuracion->where('Apartado', '=', 'colorBotonTaller')->first();
        $colorBotonTaller->Valor = $request->colorBotonTaller;
        $colorBotonTaller->save();
        $colorBotonTextoTaller = $configuracion->where('Apartado', '=', 'colorBotonTextoTaller')->first();
        $colorBotonTextoTaller->Valor = $request->colorBotonTextoTaller;
        $colorBotonTextoTaller->save();

        //seccion de redes sociales
        $colorTituloRedes = $configuracion->where('Apartado', '=', 'colorTituloRedes')->first();
        $colorTituloRedes->Valor = $request->colorTituloRedes;
        $colorTituloRedes->save();
        $colorTextoTituloRedes = $configuracion->where('Apartado', '=', 'colorTextoTituloRedes')->first();
        $colorTextoTituloRedes->Valor = $request->colorTextoTituloRedes;
        $colorTextoTituloRedes->save();
        $colorFondoRedes = $configuracion->where('Apartado', '=', 'colorFondoRedes')->first();
        $colorFondoRedes->Valor = $request->colorFondoRedes;
        $colorFondoRedes->save();
        $redesLink = $configuracion->where('Apartado', '=', 'redesLink')->first();
        $redesLink->Valor = $request->redesLink;
        $redesLink->save();

        //color del fondo
        $colorFondo = $configuracion->where("Apartado", "=", "colorFondo")->first();
        $colorFondo->Valor = $request->colorFondo;
        $colorFondo->save();

        //color del fondo del footer
        $colorFooter = $configuracion->where('Apartado', '=', 'colorFooter')->first();
        $colorFooter->Valor = $request->colorFooter;
        $colorFooter->save();
        //color del texto del footer
        $colorTextoFooter = $configuracion->where('Apartado', '=', 'colorTextoFooter')->first();
        $colorTextoFooter->Valor = $request->colorTextoFooter;
        $colorTextoFooter->save();
        // texto del footer
        $textoFooter = $configuracion->where('Apartado', '=', 'textoFooter')->first();
        $textoFooter->Valor = $request->textoFooter;
        $textoFooter->save();

        //formulario
        $colorFondoTituloFormulario = $configuracion->where('Apartado', '=', 'colorFondoTituloFormulario')->first();
        $colorFondoTituloFormulario->Valor = $request->colorFondoTituloFormulario;
        $colorFondoTituloFormulario->save();
        $colorTextoTituloFormulario = $configuracion->where('Apartado', '=', 'colorTextoTituloFormulario')->first();
        $colorTextoTituloFormulario->Valor = $request->colorTextoTituloFormulario;
        $colorTextoTituloFormulario->save();
        $colorFondoFormulario = $configuracion->where('Apartado', '=', 'colorFondoFormulario')->first();
        $colorFondoFormulario->Valor = $request->colorFondoFormulario;
        $colorFondoFormulario->save();
        $colorTextoFormulario = $configuracion->where('Apartado', '=', 'colorTextoFormulario')->first();
        $colorTextoFormulario->Valor = $request->colorTextoFormulario;
        $colorTextoFormulario->save();
        $colorBotonFormulario = $configuracion->where('Apartado', '=', 'colorBotonFormulario')->first();
        $colorBotonFormulario->Valor = $request->colorBotonFormulario;
        $colorBotonFormulario->save();
        $colorBotonTextoFormulario = $configuracion->where('Apartado', '=', 'colorBotonTextoFormulario')->first();
        $colorBotonTextoFormulario->Valor = $request->colorBotonTextoFormulario;
        $colorBotonTextoFormulario->save();

        // activador de seccion de mas informacion
        if ($request->infoAdicional == null) {
            $infoAdicional = $configuracion->where("Apartado", "=", "infoAdicional")->first();
            $infoAdicional->Valor = "desactivado";
            $infoAdicional->save();
        } else {
            $infoAdicional = $configuracion->where("Apartado", "=", "infoAdicional")->first();
            $infoAdicional->Valor = $request->infoAdicional;
            $infoAdicional->save();
        }
        // activador de contacto
        if ($request->contacto == null) {
            $contacto = $configuracion->where("Apartado", "=", "contacto")->first();
            $contacto->Valor = "desactivado";
            $contacto->save();
        } else {
            $contacto = $configuracion->where("Apartado", "=", "contacto")->first();
            $contacto->Valor = $request->contacto;
            $contacto->save();
        }
        // activador de talleres
        if ($request->talleres == null) {
            $talleres = $configuracion->where("Apartado", "=", "talleres")->first();
            $talleres->Valor = "desactivado";
            $talleres->save();
        } else {
            $talleres = $configuracion->where("Apartado", "=", "talleres")->first();
            $talleres->Valor = $request->talleres;
            $talleres->save();
        }
        // activador de redes
        if ($request->redes == null) {
            $redes = $configuracion->where("Apartado", "=", "redes")->first();
            $redes->Valor = "desactivado";
            $redes->save();
        } else {
            $redes = $configuracion->where("Apartado", "=", "redes")->first();
            $redes->Valor = $request->redes;
            $redes->save();
        }

        /* verificador de datos
        if($talleres->save() && $color->save() && $logo->save()){
            return response()->json('success', '201');
        } else {
            return response()->json('fail', '400');
        }
            */
        return redirect()->route('actualizar.formulario')->with('success', '¡La workshop se ha actualizado correctamente!');

    }
}
