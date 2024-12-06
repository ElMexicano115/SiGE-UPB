<?php

namespace App\Http\Controllers;
//Modelo config
use App\Models\Config;
//Modelo para acceder a los roles
use App\Models\Role;
//Modelo para acceder a las organizaciones
use App\Models\Organizacion;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class FormBEController extends Controller
{
    public function formControl()
    {
        $configuracion = Config::all();
        $roles = Role::all();
        $organizaciones = Organizacion::all();
        return view('Formularios.registro', compact('configuracion'));
    }
    public function formTry()
    {
        $roles = Role::all();
        $organizaciones = Organizacion::all();
        return view('formularioTry', compact('roles', 'organizaciones'));
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

        $GafeteTop = $configuracion->where("Apartado", "=", "gafeteTop")->first();
        if ($request->hasFile('gafeteTop')) {
            // Eliminar el archivo antiguo si existe
            if ($GafeteTop->Valor) {
                Storage::disk('assets')->delete('/assets/Gafete/' . $GafeteTop->Valor);
            }
            // Guardar el nuevo archivo
            $nombreGafeteTop = 'custom' . $request->gafeteTop->hashName();
            $request->gafeteTop->storeAs('/assets/Gafete', $nombreGafeteTop, 'assets');
            // Actualizar el valor en la base de datos
            $GafeteTop->Valor = $nombreGafeteTop;
            $GafeteTop->save();
        }

        $GafeteBottom = $configuracion->where("Apartado", "=", "gafeteBottom")->first();
        if ($request->hasFile('gafeteBottom')) {
            // Eliminar el archivo antiguo si existe
            if ($GafeteBottom->Valor) {
                Storage::disk('assets')->delete('/assets/Gafete/' . $GafeteBottom->Valor);
            }
            // Guardar el nuevo archivo
            $nombreGafeteBottom = 'custom' . $request->gafeteBottom->hashName();
            $request->gafeteBottom->storeAs('/assets/Gafete', $nombreGafeteBottom, 'assets');
            // Actualizar el valor en la base de datos
            $GafeteBottom->Valor = $nombreGafeteBottom;
            $GafeteBottom->save();
        }

        function actualizarConfiguracion($configuracion, $apartado, $nuevoValor)
        {
            $item = $configuracion->where("Apartado", "=", $apartado)->first();
            if ($item) {
                $item->Valor = $nuevoValor;
                $item->save();
            }
        }

        $camposConfiguracion = [
            'colorLogo' => $request->colorLogo,
            'colorTituloContacto' => $request->colorTituloContacto,
            'colorTextoTituloContacto' => $request->colorTextoTituloContacto,
            'colorFondoContacto' => $request->colorFondoContacto,
            'colorTextoContacto' => $request->colorTextoContacto,
            'colorIconoContacto' => $request->colorIconoContacto,
            'colorTituloTaller' => $request->colorTituloTaller,
            'colorTextoTituloTaller' => $request->colorTextoTituloTaller,
            'colorFondoTaller' => $request->colorFondoTaller,
            'colorTextoTaller' => $request->colorTextoTaller,
            'colorBotonTaller' => $request->colorBotonTaller,
            'colorBotonTextoTaller' => $request->colorBotonTextoTaller,
            'colorTituloRedes' => $request->colorTituloRedes,
            'colorTextoTituloRedes' => $request->colorTextoTituloRedes,
            'colorFondoRedes' => $request->colorFondoRedes,
            'redesLink' => $request->redesLink,
            'colorFondo' => $request->colorFondo,
            'colorFooter' => $request->colorFooter,
            'colorTextoFooter' => $request->colorTextoFooter,
            'textoFooter' => $request->textoFooter,
            'colorFondoTituloFormulario' => $request->colorFondoTituloFormulario,
            'colorTextoTituloFormulario' => $request->colorTextoTituloFormulario,
            'colorFondoFormulario' => $request->colorFondoFormulario,
            'colorTextoFormulario' => $request->colorTextoFormulario,
            'colorBotonFormulario' => $request->colorBotonFormulario,
            'colorBotonTextoFormulario' => $request->colorBotonTextoFormulario,
        ];

        foreach ($camposConfiguracion as $apartado => $valor) {
            actualizarConfiguracion($configuracion, $apartado, $valor);
        }


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
