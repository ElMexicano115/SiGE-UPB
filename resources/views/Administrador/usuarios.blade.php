@extends('adminlte::page')

@section('content_header')
    <h1>users</h1>
@stop

@section('content')
    <style>
        .main-sidebar {
            background: #0F3759 !important;
        }
    </style>
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
        crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.dataTables.css" />
    <script src="https://cdn.datatables.net/2.1.8/js/dataTables.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <style>
        @tailwind base;
        @tailwind components;
        @tailwind utilities;
    </style>


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
                        <th></th>
                        <th></th>
                        <th></th>
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
                            <td><button ><i class="fas fa-eye" style="color: #41ee61;"></i></button></td>
                            <td><button><i class="fas fa-edit" style="color: #74C0FC;"></i></i></button></td>
                            <!--<td><button onclick="Livewire.dispatch('openModal', { component: 'user-data', arguments: { user: {{ $user->id }} }})"><i class="fas fa-eye" style="color: #41ee61;"></i></button></td>
                            <td><button onclick="Livewire.dispatch('openModal', { component: 'edit-user', arguments: { user: {{ $user->id }} }})"><i class="fas fa-edit" style="color: #74C0FC;"></i></i></button></td>-->
                            <td>
                                <!--<form action="" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"><i class="fas fa-trash" style="color: #ee1b1b;"></i></button>
                                </form>
                            -->
                            <button><i class="fas fa-trash" style="color: #ee1b1b;"></i></button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

@stop

@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <script src="https://cdn.datatables.net/2.0.3/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.0.3/js/dataTables.bootstrap5.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        $('#myTable').DataTable({
            language: {
                processing: "",
                search: "Buscar&nbsp;:",
                lengthMenu: "Mostrar _MENU_ registros",
                info: "Mostrando _START_ a _END_ de _TOTAL_ entradas",
                infoEmpty: "Mostrando 0 a 0 de 0 entradas",
                infoFiltered: "(filtrado de _MAX_ entradas)",
                infoPostFix: "",
                loadingRecords: "Cargando...",
                zeroRecords: "No se encontro el user",
                emptyTable: "La&nbsp;tabla&nbsp;esta&nbsp;vacia",
                paginate: {
                    first: "Primero",
                    previous: "Anterior",
                    next: "Siguiente",
                    last: "Ultimo"
                },
                aria: {
                    sortAscending: ": organizar de forma ascendente",
                    sortDescending: ": organizar de forma descendente"
                }
            }
        });
    </script>
@stop
