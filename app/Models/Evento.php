<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    use HasFactory;
    // Campos que se pueden asignar masivamente
    protected $fillable = [
        'nombre',
        'fechaInicio',
        'horaInicio',
        'fechaFin',
        'horaFin',
    ];
    
    public function roles()
    {
        return $this->hasMany(Role::class);
    }
}
