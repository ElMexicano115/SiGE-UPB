<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Organizacion;

class OrganizacionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //Presentación de las organizaciones
        $organizaciones = Organizacion::all();
        return view('Administrador.organizacion',compact('organizaciones'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Valida los datos del formulario
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        // Crea una nueva organizacion
        $organizacion = new Organizacion();
        $organizacion->nombre = $request->name;

        $organizacion->save();

        return redirect()->route('organizacion');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Organizacion $organizacion)
    {
        return view('Administrador.editar_organizacion', compact('organizacion'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Organizacion $organizacion)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        // Actualizar los demás campos de la Organizacion
        $organizacion->nombre = $request->name;

        // Guardar los cambios en la base de datos
        $organizacion->save();

        return redirect()->route('organizacion')->with('success', '¡La Organizacion se ha actualizado correctamente!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Organizacion $organizacion)
    {
        $organizacion->delete();

        return redirect()->route('organizacion')->with('success', '¡La organizacion se ha eliminado correctamente!');
    }
}
