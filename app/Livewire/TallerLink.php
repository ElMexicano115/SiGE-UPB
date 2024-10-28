<?php

namespace App\Livewire;
use App\Models\Config;

use Livewire\Component;

class TallerLink extends Component
{
    public function render()
    {
        $configuracion = Config::all();
        return view('livewire.taller-link', compact('configuracion'));
    }
}
