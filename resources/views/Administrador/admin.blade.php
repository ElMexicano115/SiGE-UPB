@extends('adminlte::page')

@section('content_header')
    <h1>Administradores Registrados</h1>
@stop

@section('content')
<style>
    .main-sidebar {
        background: #0F3759 !important;
    }
</style>
<div class="container">
    <table class="table">
        <!-- Encabezados de la tabla -->
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Correo Electrónico</th>
                <th>Nivel de Administrador</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <!-- Cuerpo de la tabla -->
        <tbody>
            <!-- Iteración sobre los administradores -->
            @foreach($admins as $admin)
            <tr>
                <td>{{ $admin->name }}</td>
                <td>{{ $admin->email }}</td>
                <td>
                    @if($admin->admin == 1)
                        Administrador Principal
                    @elseif($admin->admin == 2)
                        Administrador Secundario
                    @else
                        Desconocido
                    @endif
                </td>
                <td>
                    <!-- Mostrar botones solo si el administrador actual tiene admin = 1 -->
                    @if(Auth::check() && Auth::user()->admin == 1)
                        <!-- Botón para editar -->
                         
                        <!-- <a href="{{ route('editar.admin', $admin->id) }}" class="btn btn-primary">Editar</a> -->
                        
                        <!-- Formulario para borrar -->
                        <form action="{{ route('borrar.admin', $admin->id) }}" method="POST" style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Borrar</button>
                        </form>
                    @else
                        <span class="text-muted">Sin permisos</span>
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@stop
