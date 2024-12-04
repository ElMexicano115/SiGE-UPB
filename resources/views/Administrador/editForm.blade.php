@extends('adminlte::page')

@section('title', 'Formulario')

@section('content_header')
    <h1>Editar Formulario</h1>
@stop

@section('content')
    <style>
        .main-sidebar {
            background: #0F3759 !important;
        }

        .main-header {
            background: #36BBD9 !important;
        }
    </style>
    <div id="respuesta"></div>
    <meta name="cstf-token" content="{{ csrf_token() }}">
    <!-- por si no funciona ajax usa: {{ url('/administrador/formulario') }}-->
    <form action="{{ url('/administrador/formulario') }}" id="formularioEdit" method="POST" enctype="multipart/form-data">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        @csrf
        @method('PUT')
        <div id="estado" class="card p-3">
            <p style="font-size: 20px; font-weight: bold;">Registro</p>
            <div class="container">
                <p style="font-weight: bold; color:red;">¡Atencion! aqui se cambia el estado del formulario</p>
                <div class="row text-center">
                    <div class="form-check col">
                        <input type="radio" class="form-check-input" id="radio1" name="registro" value="activado"
                            @if ($configuracion->where('Apartado', '=', 'registro')->first()->Valor == 'activado') checked @endif>Activado
                        <label class="form-check-label" for="radio1"></label>
                    </div>
                    <div class="form-check col">
                        <input type="radio" class="form-check-input" id="radio1" name="registro" value="desactivado"
                            @if ($configuracion->where('Apartado', '=', 'registro')->first()->Valor == 'desactivado') checked @endif>Desactivado
                        <label class="form-check-label" for="radio1"></label>
                    </div>
                    <div class="form-check col">
                        <input type="radio" class="form-check-input" id="radio1" name="registro"
                            value="mantenimiento"@if ($configuracion->where('Apartado', '=', 'registro')->first()->Valor == 'mantenimiento') checked @endif>Mantenimiento
                        <label class="form-check-label" for="radio1"></label>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div id="logo" class="card p-3 col ml-2 mr-1" style="width: 48%; max-height: 600px;">
                <p style="font-size: 20px; font-weight: bold;">Logo</p>
                El logo actualmente en uso es: <br>
                <div class="text-center">
                    <img src="/assets/Formulario/{{ $configuracion->where('Apartado', '=', 'logo')->first()->Valor }}"
                        alt="logo" style="height: 200px; width:100%" id="mostrar-logo"> <br>
                </div>
                <br>
                <div class="input-group mb-3">
                    <label class="input-group-text" for="subir-logo">Subir logo</label>
                    <input type="file" class="form-control" id="subir-logo" name="logo">
                </div><br>
                <label for="colorLogo" class="form-label">
                    El color de fondo del logo actualmente en uso es:
                </label>
                <input type="color" id="colorLogo" name="colorLogo" class="m-auto form-control form-control-color"
                    value="{{ $configuracion->where('Apartado', '=', 'colorLogo')->first()->Valor }}">
            </div>
            <div class="card p-3 col" style="width: 48%; max-height: 600px;">
                <p style="font-size: 20px; font-weight: bold;">Fondo</p>
                <label for="colorFondo" class="form-label">
                    El color del fondo actualmente en uso es:
                </label>
                <input type="color" id="colorFOndo" name="colorFondo" class="m-auto form-control form-control-color"
                    value="{{ $configuracion->where('Apartado', '=', 'colorFondo')->first()->Valor }}">
            </div>
        </div>
        <div class="row">
            <div id="Pie-de-pagina" class="card p-3 col ml-2 mr-1" style="width: 48%; max-height: 600px;">
                <p style="font-size: 20px; font-weight: bold;">Pie de pagina</p>
                <label for="colorFooter" class="form-label">
                    El color del pie de pagina actualmente en uso es:
                </label>
                <input type="color" id="colorFooter" name="colorFooter" class="m-auto form-control form-control-color"
                    value="{{ $configuracion->where('Apartado', '=', 'colorFooter')->first()->Valor }}"> <br>
                <label for="colorTextoFooter" class="form-label">
                    El color del texto del pie de pagina actualmente en uso es:
                </label>
                <input type="color" id="colorTextoFooter" name="colorTextoFooter"
                    class="m-auto form-control form-control-color"
                    value="{{ $configuracion->where('Apartado', '=', 'colorTextoFooter')->first()->Valor }}">
                <div class="mb-3">
                    <label for="textoFooter" class="form-label">El texto en uso del pie de pagina es:</label>
                    <textarea class="form-control" id="textoFooter" rows="1" name="textoFooter">{{ $configuracion->where('Apartado', '=', 'textoFooter')->first()->Valor }}</textarea>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col card p-3">
                <p style="font-size: 20px; font-weight: bold;">Formulario</p>
                <label for="colorFondoTituloFormulario" class="form-label">
                    El color de fondo del titulo del formulario actualmente en uso es:
                </label>
                <input type="color" id="colorFondoTituloFormulario" name="colorFondoTituloFormulario"
                    class="ml-auto mr-auto form-control form-control-color"
                    value="{{ $configuracion->where('Apartado', '=', 'colorFondoTituloFormulario')->first()->Valor }}">
                <label for="colorTextoTituloFormulario" class="form-label">
                    El color del texto del titulo del formulario actualmente en uso es:
                </label>
                <input type="color" id="colorTextoTituloFormulario" name="colorTextoTituloFormulario"
                    class="ml-auto mr-auto form-control form-control-color"
                    value="{{ $configuracion->where('Apartado', '=', 'colorTextoTituloFormulario')->first()->Valor }}">

                <label for="colorFondoFormulario" class="form-label">
                    El color del fondo del formulario actualmente en uso es:
                </label>
                <input type="color" id="colorFondoFormulario" name="colorFondoFormulario"
                    class="ml-auto mr-auto form-control form-control-color"
                    value="{{ $configuracion->where('Apartado', '=', 'colorFondoFormulario')->first()->Valor }}">

                <label for="colorTextoFormulario" class="form-label">
                    El color del texto del formulario actualmente en uso es:
                </label>
                <input type="color" id="colorTextoFormulario" name="colorTextoFormulario"
                    class="ml-auto mr-auto form-control form-control-color"
                    value="{{ $configuracion->where('Apartado', '=', 'colorTextoFormulario')->first()->Valor }}">

                <label for="colorBotonFormulario" class="form-label">
                    El color del boton del formulario actualmente en uso es:
                </label>
                <input type="color" id="colorBotonFormulario" name="colorBotonFormulario"
                    class="ml-auto mr-auto form-control form-control-color"
                    value="{{ $configuracion->where('Apartado', '=', 'colorBotonFormulario')->first()->Valor }}">

                <label for="colorBotonTextoFormulario" class="form-label">
                    El color del texto del boton del formulario actualmente en uso es:
                </label>
                <input type="color" id="colorBotonTextoFormulario" name="colorBotonTextoFormulario"
                    class="ml-auto mr-auto form-control form-control-color"
                    value="{{ $configuracion->where('Apartado', '=', 'colorBotonTextoFormulario')->first()->Valor }}">
            </div>
            <div id="informacion" class="card p-3 col-3 ml-2 mr-1" style="width: 48%;">
                <p style="font-size: 20px; font-weight: bold;">Informacion</p>
                Mostrar mas informacion:
                <div class="form-check check-inline">
                    <input class="form-check-input" type="radio" name="infoAdicional" id="infoAdicionalActivado"
                        value="activado" @if ($configuracion->where('Apartado', '=', 'infoAdicional')->first()->Valor == 'activado') checked @endif>
                    <label class="form-check-label" for="tallerActivado" style="margin-right: 20%">
                        Activado
                    </label>
                    <input class="form-check-input" type="radio" name="infoAdicional" id="infoAdicionalDesactivado"
                        value="desactivado" @if ($configuracion->where('Apartado', '=', 'infoAdicional')->first()->Valor == 'desactivado') checked @endif>
                    <label class="form-check-label" for="tallerDesactivado">
                        Desactivado
                    </label>
                </div>
                <hr><br>
                Mostrar informacion de contacto:
                <div class="form-check check-inline">
                    <input class="form-check-input" type="radio" name="contacto" id="contactoActivado"
                        value="activado" @if ($configuracion->where('Apartado', '=', 'contacto')->first()->Valor == 'activado') checked @endif>
                    <label class="form-check-label" for="conatctoActivado" style="margin-right: 20%">
                        Activado
                    </label>
                    <input class="form-check-input" type="radio" name="contacto" id="contactoDesactivado"
                        value="desactivado" @if ($configuracion->where('Apartado', '=', 'contacto')->first()->Valor == 'desactivado') checked @endif>
                    <label class="form-check-label" for="contactoDesactivado">
                        Desactivado
                    </label>
                </div>
                <label for="colorTituloContacto" class="form-label">
                    El color del titulo de contacto es actualmente en uso es:
                </label>
                <input type="color" id="colorTituloContacto" name="colorTituloContacto"
                    class="m-auto form-control form-control-color"
                    value="{{ $configuracion->where('Apartado', '=', 'colorTituloContacto')->first()->Valor }}"> <br>
                <label for="colorTextoTituloContacto" class="form-label">
                    El color del texto del titulo de contacto es actualmente en uso es:
                </label>
                <input type="color" id="colorTextoTituloContacto" name="colorTextoTituloContacto"
                    class="m-auto form-control form-control-color"
                    value="{{ $configuracion->where('Apartado', '=', 'colorTextoTituloContacto')->first()->Valor }}"> <br>
                <label for="colorTextoTituloContacto" class="form-label">
                    El color de fondo de contacto es actualmente en uso es:
                </label>
                <input type="color" id="colorFondoContacto" name="colorFondoContacto"
                    class="m-auto form-control form-control-color"
                    value="{{ $configuracion->where('Apartado', '=', 'colorFondoContacto')->first()->Valor }}"> <br>
                <label for="colorTextoTituloContacto" class="form-label">
                    El color del texto de contacto es actualmente en uso es:
                </label>
                <input type="color" id="colorTextoContacto" name="colorTextoContacto"
                    class="m-auto form-control form-control-color"
                    value="{{ $configuracion->where('Apartado', '=', 'colorTextoContacto')->first()->Valor }}"> <br>
                <label for="colorIconoContacto" class="form-label">
                    El color de los iconos de contacto es actualmente en uso es:
                </label>
                <input type="color" id="colorIconoContacto" name="colorIconoContacto"
                    class="m-auto form-control form-control-color"
                    value="{{ $configuracion->where('Apartado', '=', 'colorIconoContacto')->first()->Valor }}"> <br>
                <div>
                    <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">Direccion</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="2"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">Link de google maps</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="2"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">Telefono</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="1"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">Correo</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="1"></textarea>
                    </div>
                </div>
                <hr><br>
                Mostrar el link de talleres:
                <div class="form-check check-inline">
                    <input class="form-check-input" type="radio" name="talleres" id="tallerActivado" value="activado"
                        @if ($configuracion->where('Apartado', '=', 'talleres')->first()->Valor == 'activado') checked @endif>
                    <label class="form-check-label" for="tallerActivado" style="margin-right: 20%">
                        Activado
                    </label>
                    <input class="form-check-input" type="radio" name="talleres" id="tallerDesactivado"
                        value="desactivado" @if ($configuracion->where('Apartado', '=', 'talleres')->first()->Valor == 'desactivado') checked @endif>
                    <label class="form-check-label" for="tallerDesactivado">
                        Desactivado
                    </label>
                </div>

                <label for="colorTituloTaller" class="form-label">
                    El color del titulo de talleres es actualmente en uso es:
                </label>
                <input type="color" id="colorTituloTaller" name="colorTituloTaller"
                    class="m-auto form-control form-control-color"
                    value="{{ $configuracion->where('Apartado', '=', 'colorTituloTaller')->first()->Valor }}"> <br>
                <label for="colorTextoTituloTaller" class="form-label">
                    El color del texto del titulo de talleres es actualmente en uso es:
                </label>
                <input type="color" id="colorTextoTituloTaller" name="colorTextoTituloTaller"
                    class="m-auto form-control form-control-color"
                    value="{{ $configuracion->where('Apartado', '=', 'colorTextoTituloTaller')->first()->Valor }}"> <br>
                <label for="colorFondoTaller" class="form-label">
                    El color de fondo de talleres es actualmente en uso es:
                </label>
                <input type="color" id="colorFondoTaller" name="colorFondoTaller"
                    class="m-auto form-control form-control-color"
                    value="{{ $configuracion->where('Apartado', '=', 'colorFondoTaller')->first()->Valor }}"> <br>
                <label for="colorTextoTaller" class="form-label">
                    El color del texto de talleres es actualmente en uso es:
                </label>
                <input type="color" id="colorTextoTaller" name="colorTextoTaller"
                    class="m-auto form-control form-control-color"
                    value="{{ $configuracion->where('Apartado', '=', 'colorTextoTaller')->first()->Valor }}"> <br>
                <label for="colorBotonTaller" class="form-label">
                    El color del boton talleres es actualmente en uso es:
                </label>
                <input type="color" id="colorBotonTaller" name="colorBotonTaller"
                    class="m-auto form-control form-control-color"
                    value="{{ $configuracion->where('Apartado', '=', 'colorBotonTaller')->first()->Valor }}"> <br>
                <label for="colorBotonTextoTaller" class="form-label">
                    El color del texto del boton talleres es actualmente en uso es:
                </label>
                <input type="color" id="colorBotonTextoTaller" name="colorBotonTextoTaller"
                    class="m-auto form-control form-control-color"
                    value="{{ $configuracion->where('Apartado', '=', 'colorBotonTextoTaller')->first()->Valor }}"> <br>
                <hr><br>

                Mostrar la seccion de redes sociales:
                <div class="form-check check-inline">
                    <input class="form-check-input" type="radio" name="redes" id="redesActivado" value="activado"
                        @if ($configuracion->where('Apartado', '=', 'redes')->first()->Valor == 'activado') checked @endif>
                    <label class="form-check-label" for="tallerActivado" style="margin-right: 20%">
                        Activado
                    </label>
                    <input class="form-check-input" type="radio" name="redes" id="redesDesactivado"
                        value="desactivado" @if ($configuracion->where('Apartado', '=', 'redes')->first()->Valor == 'desactivado') checked @endif>
                    <label class="form-check-label" for="redesDesactivado">
                        Desactivado
                    </label>
                </div>
                <label for="colorTituloRedes" class="form-label">
                    El color del titulo de Redes sociales es actualmente en uso es:
                </label>
                <input type="color" id="colorTituloRedes" name="colorTituloRedes"
                    class="m-auto form-control form-control-color"
                    value="{{ $configuracion->where('Apartado', '=', 'colorTituloRedes')->first()->Valor }}"> <br>
                <label for="ColorTextoTituloRedes" class="form-label">
                    El color del texto del titulo de Redes sociales es actualmente en uso es:
                </label>
                <input type="color" id="colorTextoTituloRedes" name="colorTextoTituloRedes"
                    class="m-auto form-control form-control-color"
                    value="{{ $configuracion->where('Apartado', '=', 'colorTextoTituloRedes')->first()->Valor }}"> <br>
                <label for="colorFondoRedes" class="form-label">
                    El color de fondo de Redes sociales es actualmente en uso es:
                </label>
                <input type="color" id="colorFondoRedes" name="colorFondoRedes"
                    class="m-auto form-control form-control-color"
                    value="{{ $configuracion->where('Apartado', '=', 'colorFondoRedes')->first()->Valor }}"> <br>
                <div>
                    <div class="mb-3">
                        <label for="redesLink" class="form-label">Link</label>
                        <textarea class="form-control" id="redesLink" rows="2" name="redesLink">{{ $configuracion->where('Apartado', '=', 'redesLink')->first()->Valor }}</textarea>
                    </div>
                </div>
                <br>
            </div>
        </div>
        <div class="row">
            <div class="col card p-3">
                <p style="font-size: 20px; font-weight: bold;">Gafete</p>
                La parte superior del gafete actualmente en uso es: <br>
                <div class="text-center">
                    <img src="/assets/Gafete/{{ $configuracion->where('Apartado', '=', 'gafeteTop')->first()->Valor }}"
                        alt="gafete-top" style="height: 200px; width:50%" id="mostrar-gafete-top"> <br>
                </div>
                <br>
                <div class="input-group mb-3">
                    <label class="input-group-text" for="subir-gafete-top">Subir imagen superiror del gafete</label>
                    <input type="file" class="form-control" id="subir-gafete-top" name="gafete-top">
                </div>
                <br>
                La parte inferior del gafete actualmente en uso es: <br>
                <div class="text-center">
                    <img src="/assets/Gafete/{{ $configuracion->where('Apartado', '=', 'gafeteBottom')->first()->Valor }}"
                        alt="gafete-bottom" style="height: 200px; width:50%" id="mostrar-gafete-bottom"> <br>
                </div>
                <br>
                <div class="input-group mb-3">
                    <label class="input-group-text" for="subir-gafete-bottom">Subir imagen superiror del gafete</label>
                    <input type="file" class="form-control" id="subir-gafete-bottom" name="gafete-bottom">
                </div>
                <br>
                <br>
                <style>
                    #frente {
                        border-style: solid;
                        border-width: 2px;
                        width: 333px;
                        height: 435px;
                        text-align: center;
                        max-height: 435px;
                    }

                    #atras {
                        border-style: solid;
                        border-width: 2px;
                        width: 333px;
                        height: 435px;
                        text-align: center;
                        max-height: 435px;
                    }
                </style>
                <h2>Este es un aproximado de como se vera el gafete, para observar mejor el resultado final puede <a
                        href="downloadGafete">descargar el gafete</a></h2>
                <table class="justify-content-center" style="margin-left: 55px; margin-top: 50px;">
                    <tr>
                        <td id="frente">
                            <img src="/assets/Gafete/{{ $configuracion->where('Apartado', '=', 'gafeteTop')->first()->Valor }}"
                                alt="top" style="width: 327px; height:116px; padding: 3px;">
                            <br>
                            <h3 style="font-size: 1rem; position: relative;  margin-top: 5px; margin-bottom: 5px;">
                                <center>Organizacion</center>
                            </h3>
                            <br>
                            <img src="/assets/Gafete/user.png" alt="User" style="height: 4cm; witdh: 3.5cm;">
                            <p style="margin: 0 auto;  margin-top: 5px; margin-bottom: 3px;">John Doe</p>
                            <p style="margin: 0 auto; font-size: 14px; color: #ff0040;">Rol</p>
                            <br>
                            <br>
                            <img src="/assets/Gafete/{{ $configuracion->where('Apartado', '=', 'gafeteBottom')->first()->Valor }}"
                                alt="bottom" style="width: 327px; height:70px; padding: 3px;">
                        </td>
                        <td id="atras">
                            <img src="/assets/Gafete/{{ $configuracion->where('Apartado', '=', 'gafeteTop')->first()->Valor }}"
                                alt="top" style="width: 327px; height:116px; padding: 3px;">
                            <h3 style="font-size: 1rem; position: relative;  margin-top: 5px; margin-bottom: 5px;">
                                <center>organizacion</center>
                            </h3>
                            <img src="/assets/Gafete/qr.png" alt="" class="tamañoimg" height="200">
                            <p>
                                <center>Folio
                            </p>
                            <br>
                            <br>
                            <img src="/assets/Gafete/{{ $configuracion->where('Apartado', '=', 'gafeteBottom')->first()->Valor }}"
                                alt="bottom" style="width: 327px; height:70px; padding: 3px;">
                        </td>
                    </tr>
                </table>
            </div>
        </div>
        <hr><br><br><br>

        <button type="submit" class="btn btn-primary" id="guardar">Guardar Cambios</button>
    </form>
@stop

@section('css')
    <style>
        #guardar {
            right: 35%;
            position: fixed;
            /* Fixed/sticky position */
            bottom: 20px;
            /* Place the button 30px from the right */
            z-index: 99;
            /* Make sure it does not overlap */
            cursor: pointer;
            /* Add a mouse pointer on hover */
            padding: 15px;
            /* Some padding */
            border-radius: 10px;
            /* Rounded corners */
            font-size: 18px;
            /* Increase font size */
        }
    </style>
@stop

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
        crossorigin="anonymous"></script>
    <script>
        /* ajax
                                                                                                $(function(){
                                                                                                    $('#formularioEdit').on('submit', function(e){
                                                                                                        e.preventDefault();

                                                                                                        var form = this;
                                                                                                        $.ajax({
                                                                                                            url:$(form).attr('action'),
                                                                                                            method:$(form).attr('method'),
                                                                                                            data: new FormData(form),
                                                                                                            processData:false,
                                                                                                            dataType:'json',
                                                                                                            contentType:false,
                                                                                                            success:function(data){
                                                                                                                document.getElementById("respuesta").innerHTML = 'Pagina editada con exito';
                                                                                                                document.getElementById("mostrar-logo").src="/assets/Formulario/"+@json($configuracion->where('Apartado', '=', 'logo')->first()->Valor);
                                                                                                            }
                                                                                                        });
                                                                                                    });
                                                                                                });
                                                                                                /*
                                                                                                $(document).ready(function () {
                                                                                                    $('#formularioEdit').on('submit',function() {
                                                                                                        $.ajaxSetup({
                                                                                                            headers:{
                                                                                                                'C-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                                                                                            }
                                                                                                        });
                                                                                                        $.ajax({
                                                                                                            url: '{{ route('actualizar.formulario') }}',
                                                                                                            type: 'POST',
                                                                                                            contentType: false,
                                                                                                            cache: false,
                                                                                                            processData:false,
                                                                                                            data: new FormData(this),
                                                                                                            success: function(response){
                                                                                                                document.getElementById("respuesta").innerHTML = 'Pagina editada con exito';
                                                                                                            }
                                                                                                        })
                                                                                                    });
                                                                                                });
                                                                                                */
    </script>
@stop
