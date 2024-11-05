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
    <form id="nameForm" name="nameForm">
        <input type="text" name="name" id="name" placeholder="Nombre">
        <button type="submit">Introduzca Nombre</button>
    </form>
</div>

<!-- Asegúrate de cargar jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        // Hacer la solicitud AJAX cuando se cargue la página
        $.ajax({
            url: '/check-ip',
            type: 'GET',
            success: function(response) {
                console.log(response);
                // Si el nombre existe, actualizar el placeholder
                if (response.name) {
                    $('#name').attr('placeholder', response.name);
                }
            },
            error: function(xhr) {
                console.error("Error al comprobar la IP:", xhr.responseText);
            }
        });
    });
</script>
</body>

</html>