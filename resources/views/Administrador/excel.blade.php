@extends('adminlte::page')

@section('content_header')
    <h1>Reporte</h1>
@stop

@section('content')
<style>
    .main-sidebar{
      background: #0F3759 !important;
    }
  </style>
    <h1 style="font-weight: 900">Descargar reporte</h1>
    <a href="/" style="color: rgb(58, 24, 211); font-weight:bold;">-> Exportar</a>
    <br>
    <br>
    <h2>Resumen de los usuarios</h2>
    <div class="card">
        <div class="card-body">
            <table id="myTable" class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Apellido paterno</th>
                        <th>Apellido materno</th>
                        <th>Organizacion</th>
                        <th>Rol</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td>{{ $user->folio }}</td>
                            <td>{{ $user->nombre }}</td>
                            <td>{{ $user->apellidoPaterno }}</td>
                            <td>{{ $user->apellidoMaterno }}</td>
                            @foreach ($organizaciones as $organizacion)
                                @if ($organizacion->id == $user->organizacion)
                                    <td>{{ $organizacion->nombre }}</td>
                                @endif
                            @endforeach
                            <td>{{ $user->rol }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
@stop

@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/2.0.3/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.0.3/js/dataTables.bootstrap5.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        $('#example').DataTable( {
            language: {
                processing:     "",
                search:         "Buscar&nbsp;:",
                lengthMenu:    "Mostrar _MENU_ registros",
                info:           "Mostrando _START_ a _END_ de _TOTAL_ entradas",
                infoEmpty:      "Mostrando 0 a 0 de 0 entradas",
                infoFiltered:   "(filtrado de _MAX_ entradas)",
                infoPostFix:    "",
                loadingRecords: "Cargando...",
                zeroRecords:    "No se encontro el usuario",
                emptyTable:     "La&nbsp;tabla&nbsp;esta&nbsp;vacia",
                paginate: {
                    first:      "Primero",
                    previous:   "Anterior",
                    next:       "Siguiente",
                    last:       "Ultimo"
                },
                aria: {
                    sortAscending:  ": organizar de forma ascendente",
                    sortDescending: ": organizar de forma descendente"
                }
            }
        } );
    </script>
@stop