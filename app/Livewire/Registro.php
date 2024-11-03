<?php

namespace App\Livewire;

use App\Models\Config;
use Livewire\Component;
use App\Models\Organizacion;
use App\Models\Role;

class Registro extends Component
{
    public $configuracion;
    public $organizaciones;
    public $roles;
    public $taller_link;
    public $redes_link;
    public $contacto_link;
    public $infoAdicional;

    public function mount()
    {
        $this->configuracion = Config::all();
        $this->organizaciones = Organizacion::all();
        $this->roles = Role::all();
        $this->infoAdicional = Config::find(5);
        $this->taller_link = Config::find(2);
        $this->redes_link = Config::find(3);
        $this->contacto_link = Config::find(4);
    }

    public function render()
    {
        return view('livewire.registro');
    }
}