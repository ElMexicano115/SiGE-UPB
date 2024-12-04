<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Gafetes</title>
  <style>
/* Estilos generales */
*{
padding: 0;
margin: 0;
font-family: Arial, Helvetica, sans-serif;
}


header {
    background-image: url(imgGafete/encabezado_img.png);
    background-size: cover;
    background-position: center;
    height: 60px; /* Ajusta la altura según sea necesario */
}


.logo{
    width: 90%;
}

.tamañoimg{
    width: 100px;
    margin: 0 auto;
}

hr{
    color: rgb(89, 2, 18);
    background-color: rgb(89, 2, 18);
    height: 2px;
}

footer {
    background-image: url(imgGafete/footer_foro.png);
    color: white; /* Color del texto */
    background-size: cover;
    background-position: center;
    height: 48px; /* Ajusta la altura según sea necesario */
    text-align: center; /* Centra el texto */
    line-height: 48px; /* Alinea verticalmente el texto en el centro */
}


.upb{
    width: 20%;
}

.gafete{
    width: 10cm;
    height: 13.5cm;
    padding: 10px; /* Agregado para separar el contenido del borde */
    box-sizing: border-box; /* Incluye padding en el ancho y alto */
    display: flex;
    flex-direction: column;
    justify-content: space-between;
}

.user-info {
    flex-grow: 1; /* Hace que esta sección ocupe el espacio restante */
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    text-align: center; /* Centra el texto */
}

.user-info h4, .user-info p {
    margin: 0; /* Elimina el margen de los elementos h4 y p */
}

.user-info img {
    max-width: 100%;
    max-height: 100%;
    margin: 0 auto; /* Centra la imagen horizontalmente */
}

.border{
    border: 1px solid;
}

.margen{
    margin-left: 160px;
}

#frente{
        border-style: solid;
        border-width: 2px;
        width: 333px;
        height: 435px;
        text-align: center;
        max-height: 435px;
    }

    #atras{
        border-style: solid;
        border-width: 2px;
        width: 333px;
        height: 435px;
        text-align: center;
        max-height: 435px;
    }
  </style>
</head>

<body>
    <table class="justify-content-center" style="margin-left: 55px; margin-top: 50px;">
            <tr>
                <td id="frente">
                    <img src="assets/Gafete/{{ $configuracion->where('Apartado', '=', 'gafeteTop')->first()->Valor }}" alt="top" style="width: 327px; height:116px; padding: 3px;">
                    <br>
                    <h3 style="font-size: 1rem; position: relative;  margin-top: 5px; margin-bottom: 5px;"> <center>Organizacion</center></h3>
                    <br>
                    <img src="assets/Gafete/user.png" alt="User" style="height: 4cm; witdh: 3.5cm;">
                    <p style="margin: 0 auto;  margin-top: 5px; margin-bottom: 3px;">John Doe</p>
                    <p style="margin: 0 auto; font-size: 14px; color: #ff0040;">Rol</p>
                    <br>
                    <br>
                    <img src="assets/Gafete/{{ $configuracion->where('Apartado', '=', 'gafeteBottom')->first()->Valor }}" alt="bottom" style="width: 327px; height:70px; padding: 3px;">
                </td>
                <td id="atras">
                    <img src="assets/Gafete/{{ $configuracion->where('Apartado', '=', 'gafeteTop')->first()->Valor }}" alt="top" style="width: 327px; height:116px; padding: 3px;">
                    <h3 style="font-size: 1rem; position: relative;  margin-top: 5px; margin-bottom: 5px;"> <center>organizacion</center></h3>
                    <img src="assets/Gafete/qr.png" alt="" class="tamañoimg" height="200">
                    <p><center>Folio</p>
                    <br>
                    <br>
                    <img src="assets/Gafete/{{ $configuracion->where('Apartado', '=', 'gafeteBottom')->first()->Valor }}" alt="bottom" style="width: 327px; height:70px; padding: 3px;">
                </td>
            </tr>
        </table>
        <center><a href="downloadGafete">descargar</a><center>
 </body>
</html>
