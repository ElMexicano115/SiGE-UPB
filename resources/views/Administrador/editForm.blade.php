@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Editar Formulario</h1>
@stop

@section('content')
    <form action="{{ route('actualizar.formulario') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <input type="color" id="color" name="color" value="{{ $conf->Valor }}">
        <button type="submit" class="btn btn-primary">Guardar Cambios</button>
    </form>
@stop

@section('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
    <script>
        console.log("Hi, I'm using the Laravel-AdminLTE package!");
    </script>
@stop
