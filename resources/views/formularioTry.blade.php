<h1>Prueba de Organizaciones y Roles</h1>
<ul>
    @foreach($organizaciones as $organizacion)
        <li>{{ $organizacion->nombre ?? 'sin nombre' }}</li>
    @endforeach
</ul>
<ul>
    @foreach($roles as $rol)
        <li>{{ $rol->nombre ?? 'sin nombre' }}</li>
    @endforeach
</ul>