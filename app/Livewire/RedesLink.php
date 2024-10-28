<?php

namespace App\Livewire;
Use App\Models\Config;

use Livewire\Component;

class RedesLink extends Component
{
    public function render()
    {
        $configuracion = Config::all();
        return view('livewire.redes-link', compact('configuracion'));
    }
}
