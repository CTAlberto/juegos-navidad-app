<?php
$title = 'XMas Game';
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body>
    <h1>RAFA MARICOOOOOOOOOOOOOOOOOOOOOOOOOON!!!</h1>
<div id="app">
<form id="nameForm" name="nameForm" method="GET" action="{{ url('/check') }}">
    @csrf
    <label for="name">Nombre:</label>
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <input type="text" name="name" id="name" value="" placeholder="{{ session('user_name') }}" autocomplete="on">
    <button type="submit">Vamo a jugal</button>
</form>



</div>
<div></div>
<!-- Asegúrate de cargar jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    
</script>
<footer>
    @include('footer')
</footer>
</body>

</html>