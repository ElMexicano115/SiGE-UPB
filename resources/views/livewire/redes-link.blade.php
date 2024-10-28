<div style="background-color: {{ $configuracion->where('Apartado', '=', 'colorFondoRedes')->first()->Valor }}; padding: 20px; border-radius: 10px; text-align: center; overflow: hidden; /* To ensure the iframe doesn't overflow */">
    <!-- Contenido columna 1 -->
    <h4 style="background: {{ $configuracion->where('Apartado', '=', 'colorTituloRedes')->first()->Valor }};color: {{ $configuracion->where('Apartado', '=', 'colorTextoTituloRedes')->first()->Valor }}; margin-left:-20px;  margin-right:-20px; margin-top:-20px; padding-top: 15px; padding-bottom: 7px; padding-left: 20px">
        Siga el evento en nuestras redes sociales:
    </h4>
    <br />
    <div id="fb-root"></div>
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/es_ES/sdk.js#xfbml=1&version=v21.0"></script>
    <div style="max-width: 100%; overflow: hidden;">
        <iframe src="{{ $configuracion->where('Apartado', '=', 'redesLink')->first()->Valor }}" width="0" height="0" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowfullscreen="true" allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share"></iframe>
    </div>
    <br />
</div>
