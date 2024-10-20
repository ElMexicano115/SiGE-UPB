@extends('adminlte::page')

@section('title', 'Formulario')

@section('content_header')
    <h1>Editar Formulario</h1>
@stop

@section('content')
    @vite(['resources/css/app.css'])
    @vite(['resources/js/app.js'])
    <div id="respuesta"></div>
    <meta name="cstf-token" content="{{ csrf_token() }}">
    <form action="javascript:void(0)" id="formularioEdit" method="POST" enctype="multipart/form-data">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

        @csrf
        @method('PUT')
        <div id="logo" class="card p-3" style="width: 49%">
            <p style="font-size: 20px; font-weight: bold;">Logo</p>
            El logo actualmente en uso es: <br>
            <img src="/assets/Formulario/{{ $configuracion->where('Apartado', '=', 'logo')->first()->Valor }}" alt="logo" style="width: 100%"> <br>
            <div class="input-group mb-3">
                <label class="input-group-text" for="subir-logo">Subir logo</label>
                <input type="file" class="form-control" id="subir-logo">
            </div>
        </div>

        {{ $configuracion->where('Apartado', '=', 'color')->first()->Valor }}
        <input type="color" id="color" name="color"
            value="{{ $configuracion->where('Apartado', '=', 'color')->first()->Valor }}"><br>

        <div>
            Mostrar el link de talleres: <br>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="talleres" id="flexRadioDefault2" value="activado"
                    @if ($configuracion->where('Apartado', '=', 'talleres')->first()->Valor == 'activado') checked @endif>
                <label class="form-check-label" for="flexRadioDefault2">
                    Activado
                </label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="talleres" id="flexRadioDefault1" value="desactivado"
                    @if ($configuracion->where('Apartado', '=', 'talleres')->first()->Valor == 'desactivado') checked @endif>
                <label class="form-check-label" for="flexRadioDefault1">
                    Desactivado
                </label>
            </div>
        </div>

        <button type="submit" class="btn btn-primary" id="guardar">Guardar Cambios</button>
    </form>
@stop

@section('css')

@stop

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <script>
        $(document).ready(function () {
            $('#guardar').on('click', function() {
                $.ajaxSetup({
                    headers:{
                        'C-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url: '{{ route("actualizar.formulario") }}',
                    type: 'POST',
                    data: $('#formularioEdit').serialize(),
                    success: function(response){
                        document.getElementById("respuesta").innerHTML = 'Pagina editada con exito';
                    }
                })
            });
        });
    </script>
@stop
