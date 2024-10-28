<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Evento</title>
    <link rel="stylesheet" href="assets/Formulario/formularioRegistro.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</head>
<body id="cuerpo" style="background-color: {{ $configuracion->where("Apartado", "=", "colorFondo")->first()->Valor }}">
    <div id="navbar" style="background-color: {{ $configuracion->where("Apartado", "=", "colorLogo")->first()->Valor }}">
        <img src="{{ asset('/assets/Formulario/'.$configuracion->where("Apartado", "=", "logo")->first()->Valor) }}" alt="banner" id="banner">
    </div>
    <main>
        @if( $configuracion->where("Apartado", "=", "registro")->first()->Valor == 'activado')
            @livewire("registro")
        @elseif( $configuracion->where("Apartado", "=", "registro")->first()->Valor == 'mantenimiento')
            <div style="text-align: center">
                <img src="/assets/Formulario/mantenimiento.png" alt="Regresa_luego" style="width: 20%"><br><br>
                <h1>Lo sentimos, la pagina se encuentra en mantenimiento <br> intentelo de nuevo en unos minutos</h1>
            </div>
        @else
            <div style="text-align: center">
                <img src="/assets/Formulario/gracias.png" alt="Regresa_luego" style="width: 40%"><br><br>
                <h1>El tiempo para los registros ha terminado <br> Le agradecemos su participacion</h1>
            </div>
        @endif
    </main>
    <!-- Pie de página -->
    <footer class="footer" style="background-color: {{ $configuracion->where('Apartado', '=', 'colorFooter')->first()->Valor }}; color:{{ $configuracion->where('Apartado', '=', 'colorTextoFooter')->first()->Valor }}; padding: 30px; width: 100%;">
        <div class="container">
            <div class="row">
                <div class="container text-center">
                    {{ $configuracion->where('Apartado', '=', 'textoFooter')->first()->Valor }}
                    <span id="fecha"></span>
                </div>
                <!-- JavaScript to display the current year 
                <script>
                    var fecha = new Date();
                    document.getElementById("fecha").innerHTML = fecha.getFullYear();
                </script>
                -->
            </div>
        </div>
    </footer>
    <script src="assets/Formulario/formularioRegistro.js"></script>
</body>
</html>