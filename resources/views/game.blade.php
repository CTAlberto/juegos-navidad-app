<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        /* Puedes agregar más personalización si es necesario */
    </style>
</head>
<body class="bg-gray-100">
    <h1 class="text-center text-3xl mt-8">ESTAMOS EN EL GAME</h1>
    <p class="text-center mt-4">{{ session('user_name') }}</p>
    
    <!-- Botón para abrir el pop-up -->
    <button onclick="openPopup()" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 block mx-auto mt-8">
        Indicaciones
    </button>

    <!-- Contenedor del Pop-Up -->
    <div id="popup" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 hidden">
        <div class="bg-white p-8 rounded shadow-lg w-1/3">
            <h2 class="text-2xl font-semibold mb-4">¡¡¡El Grinch quiere arruinar la navidad!!!!</h2>
            <p class="mb-6">¡¡¡El Grinch quiere arruinar la navidad!!!!</p>
            <button onclick="closePopup()" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600">
                Cerrar
            </button>
        </div>
    </div>

    <!-- Script JavaScript para manejar el Pop-Up -->
    <script>
        function openPopup() {
            document.getElementById('popup').classList.remove('hidden');
        }

        function closePopup() {
            document.getElementById('popup').classList.add('hidden');
        }
    </script>

    <!-- Contenedor para Gameboard y Leaderboard (dos columnas) -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mt-8 px-4">
        <!-- Gameboard en la izquierda -->
        <div class="gameboard-container">
            <x-gameboard />
        </div>

        <!-- Leaderboard en la derecha -->
        <div class="leaderboard-container">
            <x-leaderboard />
        </div>
    </div>

</body>
</html>
