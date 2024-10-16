<style>
    #formulario {
        width: 75%;
        border: solid 1px;
        border-radius: 10px;
        background-color: white;
    }

    #contenido {
        margin: 6%
    }

    /* Si la pantalla del dispositivo es menor a 600 pixeles se ocupa toda la pantalla*/
    @media only screen and (max-width: 600px) {
        #formulario {
            width: 100%;
        }

        #contenido {
            margin: 2%
        }
    }
</style>
<div id="formulario">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <div id="contenido">
        <div style="background-color: #4287f5; display:flex; justify-content:center; color:white">
            <div>
                <h1>Formulario de registro</h1><!-- Esta seccion sera ajustable mediante una variable-->
            </div>
        </div>
        <br>
        <div style="text-align: left; font-family: 'Roboto', sans-serif;">
            <h3>
                Por favor, complete el siguiente formulario con la información
                solicitada:
            </h3>
            <br />
        </div>

        <div class="row">
            <!-- Formulario -->
            <div class="col-md-7">
                <div class="container" style="background:#a7e9ff; border-radius: 10px;">
                    <form id="registroForm" action="{{ url('/') }}" method="post" enctype="multipart/form-data"
                        style="text-align: left; ">
                        @csrf
                        <!-- Seccion para el nombre-->
                        <br>
                        <div class="mb-3">
                            <label for="nombre" class="form-label fw-bold">Nombre:*</label>
                            <input type="text" class="form-control" id="nombre" name="nombre"
                                placeholder="Nombre" required />
                        </div>
                        <!-- Seccion para los apellidos-->
                        <div class="mb-3">
                            <label for="apellido-p" class="form-label fw-bold">Apellido paterno:*</label>
                            <input type="text" class="form-control" id="apellido-p" name="apellido_p"
                                placeholder="Apellido Paterno" required />
                        </div>
                        <div class="mb-3">
                            <label for="apellido-m" class="form-label fw-bold">Apellido materno:*</label>
                            <input type="text" class="form-control" id="apellido-m" name="apellido_m"
                                placeholder="Apellido Materno" required />
                        </div>
                        <!-- Seccion para las universidades-->
                        <div class="mb-3">
                            <label for="universidad" class="fw-bold">Universidad de procedencia:*</label>
                            <select class="form-select mb-3" aria-label="Default select example" name="universidad"
                                required>
                                <option selected>- Seleccione una universidad -</option>
                                <!-- lista de universidades generada dinamicamente
                                
                                -->
                            </select>
                        </div>

                        <!-- Seccion para el tipo de participante -->
                        <label for="tipo-de-participante" class="fw-bold">Tipo de participante:*</label><br />

                        <br />

                        <div id="ponenteField" style="display: none">
                            <label for="nombre-ponencia" class="form-label fw-bold">Nombre de la ponencia:*</label>
                            <input type="text" class="form-control" id="nombre-ponencia" placeholder="Ponencia"
                                name="topic" />
                        </div>

                        <div id="expositorField" style="display: none">
                            <label for="mesa-participacion" class="fw-bold">Seleccione la mesa de
                                participacion:*</label>
                            <select class="form-select mb-3" aria-label="Default select example" name="mesa">
                                <option selected>--selecione una mesa--</option>
                                <!-- listado de las mesas
                                
                                -->
                            </select>
                        </div>

                        <!-- Seccion para la foto del participante -->
                        <div class="mb-3">
                            <label for="formFile" class="form-label fw-bold" required>Ingrese su fotografía para su
                                gafete
                                del
                                evento</label>
                            <input class="form-control-file" type="file" id="formFile" name="foto" />
                            <!-- Button trigger modal -->
                            <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                <img src="{{ asset('storage/assets/imgForm/interrogatorio.png') }}" alt=""
                                    style="height: 30px" />
                            </button>
                            <div class="form-text">
                                * Importante, esta imagen aparecerá en su gafete y servirá
                                para identificarlo. Intente que la imagen sea lo más clara
                                posible.
                            </div>
                        </div>
                        <!-- Seccion para el correo-->
                        <div class="mb-3">
                            <label for="correo" class="form-label fw-bold">Correo electronico:*</label>
                            <input type="email" class="form-control" id="correo" name="correo"
                                aria-describedby="emailHelp" placeholder="ejemplo@gmail.com" required />
                            <div id="emailHelp" class="form-text">
                                Este correo servirá para contactarlo en caso necesario.
                            </div>
                        </div>
                        <div>
                            <label for="numero" class="form-label fw-bold">Número telefónico</label>
                            <input type="text" name="numero" id="numero" name="numero" class="form-control"
                                placeholder="+52 983 123 4567" />
                            <div id="numero" class="form-text">
                                Este numero servirá para contactarlo en caso necesario.
                            </div>
                        </div>
                        <br />
                        <button type="submit" class="btn btn-primary iconnn" style="background-color: #4287f5"
                            onclick="limpiarCampos()">
                            Registrarse
                        </button>
                        <br><br>
                    </form>
                </div>
            </div>
            <!-- Información adicional -->
            <div class="col-md-5">
                <!-- Columna 1 -->
                <div
                    style="
            background-color: #a7e9ff;
          padding: 20px;
          border-radius: 10px;
          text-align: center;
          overflow: hidden; /* To ensure the iframe doesn't overflow */
          text-align:left;
          ">
                    <!-- Contenido columna 1 -->
                    <h4
                        style="background: #6cd6fa; margin-left:-20px;  margin-right:-20px; margin-top:-20px; padding-top: 15px; padding-bottom: 7px; padding-left: 20px; ">
                        ¿Necesita más información? Contáctenos:
                    </h4><br>
                    <a href="https://maps.app.goo.gl/59iMvCGkqFVKUtpi6">
                        <img src="{{ asset('storage/assets/imgForm/marcador.png') }}" alt=""
                            style="height: 50px" class="icon" />
                    </a>
                    <span style="vertical-align: middle">{ Direccion }</span>
                    <br /><br />
                    <a href="tel:9831281591" style="color: #000; text-decoration: none;">
                        <img src="{{ asset('storage/assets/imgForm/llamada-telefonica (1).png') }}" alt=""
                            style="height: 50px" class="icon" />
                        <span style="vertical-align: middle">{ Numero telefonico }</span>
                    </a>
                    <br /><br />
                    <img src="{{ asset('storage/assets/imgForm/sobre.png') }}" alt="" style="height: 50px"
                        onclick="copyEmail()" class="icon" />
                    <span style="vertical-align: middle">{ Correo de contacto }</span>
                </div>
                <br /><br />


                <!-- Columna 2 -->
                <div style="background-color: #a7e9ff; padding: 20px; border-radius: 10px; text-align: center; overflow: hidden; /* To ensure the iframe doesn't overflow */">
                    <!-- Contenido columna 1 -->
                    <h4
                        style="background: #6cd6fa; margin-left:-20px;  margin-right:-20px; margin-top:-20px; padding-top: 15px; padding-bottom: 7px; padding-left: 20px">
                        ¿Ya te registraste en los talleres?
                    </h4>
                    <p style="font-size: 100%;">Una vez registrado, podrás ingresar tu folio para registrarte en los
                        talleres.</p>
                    <hr>
                    <div style="max-width: 100%; overflow: hidden;">

                        <a href="/validar-folio" class="iconnn"
                            style="display: inline-block; width: 200px; background: #4287f5; color: white; text-align: center; text-decoration: none; padding: 10px; border-radius: 10px;">
                            Registrarme
                        </a>
                    </div>
                    <br />
                </div>
                <br /><br />

                <!-- Columna 2 -->
                <div
                    style="
      background-color: #a7e9ff;
      padding: 20px;
      border-radius: 10px;
      text-align: center;
      overflow: hidden; /* To ensure the iframe doesn't overflow */
    ">
                    <!-- Contenido columna 1 -->
                    <h4 style="background: #6cd6fa; margin-left:-20px;  margin-right:-20px; margin-top:-20px; padding-top: 15px; padding-bottom: 7px; padding-left: 20px">
                        Siga el evento en nuestras redes sociales:
                    </h4>
                    <br />
                    <div style="max-width: 100%; overflow: hidden;">
                        <img src="assets/Formulario/link.png" alt="Facebook" style="height:410">
                    </div>
                    <br />
                </div>
                <br /><br />
            </div>
        </div>
    </div>
</div>
