<?php

use App\Http\Controllers\MesaController;
use App\Http\Controllers\OrganizacionController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FormBEController;
use App\Http\Controllers\RegistroController;
use App\Http\Controllers\panelController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DashboardController;

// Livewire
use App\Livewire\Registro;
// Livewire

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/laravel', function () {
    return view('welcome');
});

Route::redirect("/", "/registro");
Route::get('/registro', [FormBEController::class, 'formControl']);
Route::post('/', [RegistroController::class, 'registrarUsuario'])->name('registro.usuario');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
Route::get("/administrador/formulario", [FormBEController::class, 'showConfig']);
Route::put('/administrador/formulario', [FormBEController::class, 'update'])->name('actualizar.formulario');

//Rutas unicamente accesibles a usuarios registrados
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

//Rutas accesibles para cualquier tipo de admin
Route::middleware(['auth', 'is.admin'])->group(function () {
    // Rutas comunes para todos los administradores

    //Listado de las organizaciones y sus opciones
    Route::get('/organizacion', [OrganizacionController::class, 'index'])->name('organizacion');
    Route::get("/administrador/adminPanel", [panelController::class, 'index'])->name('inicio');
    //Lsitado de las mesas y sus opciones
    Route::get('/mesa', [MesaController::class, 'index'])->name('mesa');

    //Listado de actividades y sus opciones
    Route::get('/actividades', [DashboardController::class, 'showActividades'])->name('actividad');
    /*
    //Ruta para mostrar la vista del formulario de edicion de actividades
    Route::get('/actividades/{actividad}/editar', [ActividadController::class, 'edit'])->name('editar.actividad');
    // Ruta para actualizar una actividad especifica
    Route::put('/actividades/{actividad}', [ActividadController::class, 'update'])->name('actualizar.actividad');
    // Ruta para eliminar una actividad especifica
    Route::delete('/actividades/{actividad}', [ActividadController::class, 'destroy'])->name('borrar.actividad');
    */

    Route::get("gafeteTest", [RegistroController::class, 'gafeteTest'])->name('gafeteTest');
    Route::get("downloadGafete", [RegistroController::class, 'downloadgafete'])->name('downloadGafete');
});

// Rutas accesibles solo para administradores de tipo 1
Route::middleware(['auth', 'admin.type:1'])->group(function () {
    //Organizacion ///////////////////////////////////
    //Registrar Organización
    Route::get('/añadir_organizacion', function () {
        return view('Administrador.registrar_organizacion');
    })->name('registro.organizacion');
    Route::post('/añadir_organizacion', [OrganizacionController::class, 'store'])->name('añadir.organizacion');
    //Edición de las organizaciones
    Route::get('/organizacion/{organizacion}/editar', [OrganizacionController::class, 'edit'])->name('editar.organizacion');
    // Ruta para actualizar una universidad específica
    Route::put('/organizacion/{organizacion}', [OrganizacionController::class, 'update'])->name('actualizar.organizacion');
    // Ruta para eliminar una universidad específica
    Route::delete('/organizazcion/{organizacion}', [OrganizacionController::class, 'destroy'])->name('borrar.organizacion');

    //Mesas////////////////////////////////////////
    //Registrar Mesa
    Route::get('/añadir_mesa', function () {
        return view('Administrador.registrar_mesa');
    })->name('registro.mesa');
    Route::post('/añadir_mesa', [MesaController::class, 'store'])->name('añadir.mesa');
    //Ruta para mostrar la vista del formulario de edicion de la mesa
    Route::get('/mesas/{mesa}/editar', [MesaController::class, 'edit'])->name('editar.mesa');
    // Ruta para actualizar una mesa especifico
    Route::put('/mesas/{mesa}', [MesaController::class, 'update'])->name('actualizar.mesa');
    // Ruta para eliminar una mesa especifico
    Route::delete('/mesas/{mesa}', [MesaController::class, 'destroy'])->name('borrar.mesa');

    //Listar admin y opciones extra
    Route::get('/añadir_admin', function () {
        return view('Administrador.registrar_admin');
    })->name('registro.admin');
    Route::post('/admin/register', [AdminController::class, 'registerUser'])->name('admin.register');

     // Ruta para listar administradores
     Route::get('/admins', [AdminController::class, 'index'])->name('admins.index');

     // Ruta para editar un administrador
     Route::get('/admins/{id}/edit', [AdminController::class, 'edit'])->name('editar.admin');
 
     // Ruta para borrar un administrador
     Route::delete('/admins/{id}', [AdminController::class, 'destroy'])->name('borrar.admin');
});

// Rutas accesibles solo para administradores de tipo 2
Route::middleware(['auth', 'admin.type:2'])->group(function () {
    
});

require __DIR__.'/auth.php';
