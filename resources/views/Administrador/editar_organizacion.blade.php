@extends('adminlte::page')

@section('content_header')
    <h1>Editar Organizacion</h1>
@stop

@section('content')
<style>
    .main-sidebar{
      background: #0F3759 !important;
    }
  </style>
    <div class="card">
        <div class="card-body">
            <form action="{{ route('actualizar.organizacion', $organizacion->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre:</label>
                    <input type="text" class="form-control" id="nombre" name="name" value="{{ $organizacion->nombre }}">
                </div>
                <button type="submit" class="btn btn-primary">Guardar Cambios</button>
            </form>
        </div>
    </div>
@stop
