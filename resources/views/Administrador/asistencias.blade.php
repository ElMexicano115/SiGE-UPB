@extends('adminlte::page')

@section('content_header')
    <style>
        .main-sidebar {
            background: #0F3759 !important;
        }
    </style>
    <style>
        @tailwind base;
        @tailwind components;
        @tailwind utilities;
    </style>
    <h1>Registro de asistencias</h1>
@stop

@section('content')
    <div id="Datos-usuario"></div>
    <table>
        <tr>
            <th>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="inputGroup-sizing-default">Seleccione el dia de asistencia:</span>
                    <select wire:model="day" class="form-select">
                        <option disabled value="" selected>Seleccione</option>
                        <option value="1">Dia 1</option>
                        <option value="2">Dia 2</option>
                        <option value="3">Dia 3</option>
                    </select>
                </div>
            </th>
            <th>&nbsp;</th>
        </tr>
    </table>
    <div class="input-group mb-3">
        <span class="input-group-text" id="inputGroup-sizing-default">Ingrese el folio del usuario:</span>
        <input type="text" class="form-control" wire:model="folio" wire:keydown.enter="search">
    </div>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
@stop
