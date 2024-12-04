<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User; // Modelo de usuario
use Illuminate\Support\Facades\Hash; // Para encriptar contraseñas

class AdminController extends Controller
{
    // Mostrar el formulario de registro
    public function showRegisterForm()
    {
        return view('admin.register');
    }

    // Registrar un nuevo usuario
    public function registerUser(Request $request)
    {
       
        // Validación de los datos
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|confirmed|min:8',
            'admin' => 'required|integer|in:1,2',
        ]);

        // Crear el administrador
        $admin = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'admin' => $request->admin, // Asignación de nivel de administrador
        ]);

        return redirect()->route('registro.admin')->with('success', 'Administrador registrado exitosamente.');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Obtener todos los usuarios con roles de administrador
        $admins = User::where('admin', '>', 0)->get();

        // Retornar la vista con los datos
        return view('Administrador.admin', compact('admins'));
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
        //
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $admin = User::findOrFail($id);

        // Prevenir que el administrador principal (admin = 1) sea eliminado
        if ($admin->admin == 1) {
            return redirect()->route('admins.index')->with('error', 'No puedes eliminar al administrador principal.');
        }

        $admin->delete();
        return redirect()->route('admins.index')->with('success', 'Administrador eliminado exitosamente.');
    }
}
