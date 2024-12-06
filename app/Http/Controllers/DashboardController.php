<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\Activity;
use App\Models\Registro;
use App\Models\Organizacion;
use App\Models\Mesa;
use App\Models\Role;

class DashboardController extends Controller
{
    /*
    public function showUniversity()
    {
        $universidades = University::all();
        return view('universidad',compact('universidades'));
    }
    */
    public function showActividades()
    {
        $actividades = Activity::all();
        return view('administrador.actividades', compact('actividades'));
    }
    /*
    public function showMesas()
    {
        $mesas = Mesa::all();
        return view('mesa', compact('mesas'));
    }
    */
    public function showAsistencias()
    {
        return view('administrador.asistencias');
    }

    
    public function showUsers()
    {
        $users = Registro::all();
        $actividades = Activity::all();
        $mesas = Mesa::all();
        $roles = Role::all();
        $organizaciones = Organizacion::all();
        return view('administrador.usuarios', compact('users', 'actividades', 'mesas', 'roles', 'organizaciones'));
    }

    public function adminPanel()
    {
        // Obtener el conteo de usuarios por universidad
        $userCounts = Registro::select('organizacion', DB::raw('count(*) as total'))
        ->groupBy('organizacion')
        ->get();

        $data = [];
        $labels = [];
        $colors = [];
        $organizaciones = [];

        foreach ($userCounts as $userCount) {
            $organizacion = Organizacion::find($userCount->organizacion);
            if ($organizacion) {
                $labels[] = $organizacion->nombre;
                $data[] = $userCount->total;
                $colors[] = sprintf('#%06X', mt_rand(0, 0xFFFFFF)); // Generar color aleatorio
                $organizaciones[] = $organizacion; // Guardar la universidad
            }
        }

        $actividades = Activity::all();
        $mesas = Mesa::all();
        $usuarios = Registro::all();

        $totalUsers = Registro::count();
        $totalActivities = Activity::count();
        $totalMesas = Mesa::count();
        $totalOrganizaciones = Organizacion::count();

        return view('administrador.adminPanel', compact('data', 'labels', 'colors','actividades','totalActivities','mesas','totalMesas','usuarios','totalUsers','organizaciones','totalOrganizaciones'));
    }
    /*
    public function showExcel()
    {
        $users = Registro::all();
        $actividades = Activity::all();
        $mesas = Mesa::all();
        $roles = Role::all();
        $organizaciones = Organizacion::all();
        return view('administrador.excel', compact('users', 'actividades', 'mesas', 'roles', 'organizaciones'));
    }
        */
}
