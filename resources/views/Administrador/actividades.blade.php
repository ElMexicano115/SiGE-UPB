@extends('adminlte::page')

@section('content_header')
    <h1>Actividades</h1>
@stop

@section('content')
<style>
    .main-sidebar{
      background: #0F3759 !important;
    }
  </style>
    <table class="table">
        <!-- Encabezados de la tabla -->
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Tipo</th>
                <th>Descripcion</th>
                <th>Capacidad</th>
                <th>Imagen</th>
                <th>Acciones</th> 
            </tr>
        </thead>
        <!-- Cuerpo de la tabla -->
        <tbody>
            <!-- Iteración sobre los libros -->
            @foreach($actividades as $actividad)
            <tr>
                <td>{{ $actividad->nombre }}</td>
                <td>{{ $actividad->tipo  }}</td>
                <td>{{ $actividad->descripcion }}</td>
                <td>{{ $actividad->capacidad  }}</td>
                <td><img src="{{ $actividad->img }}" alt="Portada" width="100"></td>
                <td>
                    <!-- Botón para editar -->
                    <a href="" class="btn btn-primary">Editar</a>
                    <!-- Formulario para borrar -->
                    <form action="" method="POST" style="display: inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Borrar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@stop

@section('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
    <script> console.log("Hi, I'm using the Laravel-AdminLTE package!"); </script>
@stop 