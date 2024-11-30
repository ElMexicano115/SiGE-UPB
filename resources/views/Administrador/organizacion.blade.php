@extends('adminlte::page')

@section('content_header')
    <h1>Organizaciones Registradas</h1>
@stop

@section('content')
<style>
    .main-sidebar {
        background: #a6174b !important;
    }
</style>
    <table class="table">
        <!-- Encabezados de la tabla -->
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <!-- Cuerpo de la tabla -->
        <tbody>
            <!-- Iteración sobre las organizaciones -->
            @foreach($organizaciones as $organizacion)
            <tr>
                <td>{{ $organizacion->nombre }}</td>
                <td>
                    <!-- Mostrar botones solo si el administrador tiene admin = 1 -->
                    @if(Auth::check() && Auth::user()->admin == 1)
                        <!-- Botón para editar -->
                        <a href="{{ route('editar.organizacion', $organizacion->id) }}" class="btn btn-primary">Editar</a>
                        <!-- Formulario para borrar -->
                        <form action="{{ route('borrar.organizacion', $organizacion->id) }}" method="POST" style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Borrar</button>
                        </form>
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@stop
