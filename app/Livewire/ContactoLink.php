<?php

namespace App\Livewire;
use app\Models\Config;

use Livewire\Component;

class ContactoLink extends Component
{
    public function render()
    {
        $configuracion = Config::all();
        return view('livewire.contacto-link', compact('configuracion'));
    }
}
