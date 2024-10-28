<div style="background-color: {{ $configuracion->where("Apartado", "=", "colorFondoContacto")->first()->Valor }}; color: {{ $configuracion->where("Apartado", "=", "colorTextoContacto")->first()->Valor }}; padding: 20px; border-radius: 10px; text-align: center; overflow: hidden; /* To ensure the iframe doesn't overflow */ text-align:left; ">
    <!-- Contenido columna 1 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <h4 style="background: {{ $configuracion->where("Apartado", "=", "colorTituloContacto")->first()->Valor }};color: {{ $configuracion->where("Apartado", "=", "colorTextoTituloContacto")->first()->Valor }}; margin-left:-20px;  margin-right:-20px; margin-top:-20px; padding-top: 15px; padding-bottom: 7px; padding-left: 20px; ">
        ¿Necesita más información? Contáctenos:
    </h4><br>
    <a href="https://maps.app.goo.gl/59iMvCGkqFVKUtpi6">
        <i class="fa-solid fa-location-dot" style="color: {{ $configuracion->where("Apartado", "=", "colorIconoContacto")->first()->Valor }};text-decoration: none;"></i>
    </a>
    <span style="vertical-align: middle">{ Direccion }</span>
    <br /><br />
    <a href="tel:9831281591" style="color: {{ $configuracion->where("Apartado", "=", "colorTextoContacto")->first()->Valor }};text-decoration: none;">
        <i class="fa-solid fa-phone" style="color: {{ $configuracion->where("Apartado", "=", "colorIconoContacto")->first()->Valor }};text-decoration: none;"></i>
        <span style="vertical-align: middle">{ Numero telefonico }</span>
    </a>
    <br /><br />
    <i class="fa-solid fa-envelope" style="color: {{ $configuracion->where("Apartado", "=", "colorIconoContacto")->first()->Valor }};text-decoration: none;"></i>
    <span style="vertical-align: middle">{ Correo de contacto }</span>
</div>
