<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\Activity;

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

    public function showAsistencias()
    {
        $asistencias = Asistencia::all();
        $workshops = Taller::all();
        $mesas = Mesa::all();
        return view('asistencias', compact('asistencias','workshops','mesas'));
    }

    public function showUsers()
    {
        $workshops = Taller::all();
        $mesas = Mesa::all();
        $usuarios = User::all();
        $badges = Badge::all();
        $roles = EventRole::all();
        $universidades = University::all();
        return view('usuarios', compact('workshops','mesas','usuarios','badges','roles','universidades'));
    }

    public function dashboard()
    {
        // Obtener el conteo de usuarios por universidad
        $userCounts = User::select('university_id', DB::raw('count(*) as total'))
        ->groupBy('university_id')
        ->get();

        $data = [];
        $labels = [];
        $colors = [];
        $universidades = [];

        foreach ($userCounts as $userCount) {
            $university = University::find($userCount->university_id);
            if ($university) {
                $labels[] = $university->name;
                $data[] = $userCount->total;
                $colors[] = sprintf('#%06X', mt_rand(0, 0xFFFFFF)); // Generar color aleatorio
                $universidades[] = $university; // Guardar la universidad
            }
        }

        $workshops = Taller::all();
        $mesas = Mesa::all();
        $usuarios = User::all();

        $totalUsers = User::count();
        $totalWorkshops = Taller::count();
        $totalMesas = Mesa::count();
        $totalAsistencias = Asistencia::count();
        $totalUniversidades = University::count();

        return view('dashboard', compact('data', 'labels', 'colors','workshops','totalWorkshops','mesas','totalMesas','usuarios','totalUsers','universidades','totalUniversidades','totalAsistencias'));
    }

    public function showExcel()
    {
        $workshops = Taller::all();
        $mesas = Mesa::all();
        $usuarios = User::all();
        $badges = Badge::all();
        $roles = EventRole::all();
        $universidades = University::all();
        return view('excel', compact('workshops','mesas','usuarios','badges','roles','universidades'));
    }
    */
}
