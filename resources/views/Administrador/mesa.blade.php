@extends('adminlte::page')

@section('content_header')
    <h1>mesas registradas</h1>
@stop

@section('content')
<style>
    .main-sidebar{
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
            <!-- Iteración sobre las mesas -->
            @foreach($mesas as $mesa)
            <tr>
                <td>{{ $mesa->nombre }}</td>
                <td>
                    <!-- Mostrar botones solo si el administrador tiene admin = 1 -->
                    @if(Auth::check() && Auth::user()->admin == 1)
                        <!-- Botón para editar -->
                        <a href="{{ route('editar.mesa', $mesa->id) }}" class="btn btn-primary">Editar</a>
                        <!-- Formulario para borrar -->
                        <form action="{{ route('borrar.mesa', $mesa->id) }}" method="POST" style="display: inline-block;">
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
