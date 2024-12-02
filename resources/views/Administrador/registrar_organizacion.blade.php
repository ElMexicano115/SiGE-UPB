@extends('adminlte::page')

@section('content_header')
    <h1>Añadir Organizacion</h1>
@stop

@section('content')
<style>
    .main-sidebar{
      background: #0F3759 !important;
    }
  </style>
    <form action="{{ route('añadir.organizacion') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Nombre</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <button type="submit" class="btn btn-primary">Añadir organizacion</button>
    </form>
@stop

@section('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
    <script> console.log("Hi, I'm using the Laravel-AdminLTE package!"); </script>
@stop 