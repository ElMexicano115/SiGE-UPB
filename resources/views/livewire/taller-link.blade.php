<div style="background-color: {{ $configuracion->where('Apartado', '=', 'colorFondoTaller')->first()->Valor }}; color: {{ $configuracion->where('Apartado', '=', 'colorTextoTaller')->first()->Valor }};padding: 20px; border-radius: 10px; text-align: center; overflow: hidden; /* To ensure the iframe doesn't overflow */">
    <!-- Contenido columna 1 -->
    <h4
        style="background: {{ $configuracion->where('Apartado', '=', 'colorTituloTaller')->first()->Valor }}; color: {{ $configuracion->where('Apartado', '=', 'colorTextoTituloTaller')->first()->Valor }};margin-left:-20px;  margin-right:-20px; margin-top:-20px; padding-top: 15px; padding-bottom: 7px; padding-left: 20px">
        ¿Ya te registraste en los talleres?
    </h4>
    <p style="font-size: 100%;">Una vez registrado, podrás ingresar tu folio para registrarte en los
        talleres.</p>
    <hr>
    <div style="max-width: 100%; overflow: hidden;">

        <a href="/validar-folio" class="iconnn"
            style="display: inline-block; width: 200px; background-color: {{ $configuracion->where('Apartado', '=', 'colorBotonTaller')->first()->Valor }}; color: {{ $configuracion->where('Apartado', '=', 'colorBotonTextoTaller')->first()->Valor }}; text-align: center; text-decoration: none; padding: 10px; border-radius: 10px;">
            Registrarme
        </a>
    </div>
    <br />
</div>

