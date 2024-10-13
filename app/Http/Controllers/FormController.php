<?php

namespace App\Http\Controllers;
use App\Models\Evento;
use FontLib\Table\Type\name;
use Illuminate\Http\Request;

class FormController extends Controller
{
    public function showData(){
        if(Evento::first() != null){
            $evento = Evento::first()->name;
        }else{
            $evento = "Eventos UPB";
        }

        return view("Formularios/registro", compact('evento'));
    }

}
