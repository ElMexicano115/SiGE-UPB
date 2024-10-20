<style>
    #formulario {
        width: 75%;
        border: solid 1px;
        border-radius: 10px;
        background-color: white;
        margin-bottom: 9%;
    }

    #contenido {
        margin: 6%;
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
            <div class="col">
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
            @if( $infoAdicional->Valor == "activado")
            <div class="col-md-5">
                <!-- Columna 1 -->
                @if( $contacto_link->Valor == "activado")
                    @livewire("contacto-link")
                    <br /><br />
                @endif


                <!-- Columna 2  -->
                @if( $taller_link->Valor == "activado")
                    @livewire("taller-link")
                    <br /><br />
                @endif
                

                <!-- Columna 3 -->
                @if( $redes_link->Valor == "activado")
                    @livewire("redes-link")
                    <br /><br />
                @endif
            </div>
            @endif
        </div>
    </div>
</div>
