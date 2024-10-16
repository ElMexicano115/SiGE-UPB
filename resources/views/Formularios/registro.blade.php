<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Evento</title>
    <link rel="stylesheet" href="assets/Formulario/formularioRegistro.css">
</head>
<body id="cuerpo">
    <div id="navbar">
        <img src="{{ asset('/assets/Formulario/logo.png') }}" alt="banner" id="banner">
    </div>
    <main>
        @livewire("registro")
    </main>
    <script src="assets/Formulario/formularioRegistro.js"></script>
</body>
</html>