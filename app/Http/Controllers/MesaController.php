<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mesa;

class MesaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //Presentación de las mesaes
        $mesas = Mesa::all();
        return view('Administrador.mesa',compact('mesas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
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

        // Crea una nueva mesa
        $mesa = new Mesa();
        $mesa->nombre = $request->name;

        $mesa->save();

        return redirect()->route('mesa');
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
    public function edit(Mesa $mesa)
    {
        return view('Administrador.editar_mesa', compact('mesa'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Mesa $mesa)
    {
        // Actualizar los demás campos de la mesa
        $mesa->nombre = $request->name;
        // Guardar los cambios en la base de datos
        $mesa->save();

        return redirect()->route('mesa')->with('success', '¡La mesa se ha actualizado correctamente!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Mesa $mesa)
    {
        $mesa->delete();

        return redirect()->route('mesa')->with('success', '¡La mesa se ha eliminado correctamente!');
    }
}
