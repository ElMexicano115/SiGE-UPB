<?php

namespace App\Livewire;

use App\Models\Config;

use Livewire\Component;

class Registro extends Component
{
    public function render()
    {
        $infoAdicional = Config::find(5);
        $taller_link = Config::find(2);
        $redes_link = Config::find(3);
        $contacto_link = Config::find(4);
        $configuracion = Config::all();
        return view('livewire.registro', compact('taller_link', 'redes_link', 'contacto_link', 'infoAdicional', 'configuracion'));
    }
}
