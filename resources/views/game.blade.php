<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

    <style>
        /* Generación de la animación de los puntos que se mueven */
        .snowflake {
            position: absolute;
            background-color: white;
            border-radius: 50%;
            opacity: 0.8;
            animation: move-snowflakes linear infinite;
        }

        /* Animación de los puntos moviéndose aleatoriamente */
        @keyframes move-snowflakes {
            0% {
                transform: translate(var(--random-x), -100%);
            }
            100% {
                transform: translate(var(--random-x), 100vh);
            }
        }
    </style>
</head>
<body class="min-h-screen bg-gradient-to-r from-purple-500 via-purple-600 to-purple-700 relative overflow-hidden">

    <!-- Fondo animado de puntos que se mueven, ahora se coloca por encima de otros contenidos -->
    <div id="snow-container" class="absolute inset-0 z-20 pointer-events-none"></div>

    <p class="text-center mt-4 text-white z-10 relative">{{ session('user_name') }}</p>
    
    <!-- Botón para abrir el pop-up -->
    <button onclick="openPopup()" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 block mx-auto mt-8 z-10 relative">
        Indicaciones
    </button>

    <!-- Contenedor del Pop-Up -->
    <div id="popup" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 hidden z-30 relative">
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

        // Función para generar nieve (puntos aleatorios)
        function createSnowflakes() {
            const container = document.getElementById("snow-container");
            const numberOfSnowflakes = 100; // Número de puntos de nieve

            for (let i = 0; i < numberOfSnowflakes; i++) {
                const snowflake = document.createElement("div");
                snowflake.classList.add("snowflake");

                // Tamaño aleatorio de cada "nieve"
                const size = Math.random() * 5 + 2; // Tamaño entre 2px y 7px
                snowflake.style.width = `${size}px`;
                snowflake.style.height = `${size}px`;

                // Posición inicial aleatoria en la parte superior
                snowflake.style.top = `-${Math.random() * 20}px`; // Comienza un poco por encima del contenedor
                snowflake.style.left = `${Math.random() * 100}vw`;

                // Variación aleatoria en el movimiento (movimiento aleatorio en el eje X)
                snowflake.style.setProperty('--random-x', `${Math.random() * 100 - 50}vw`);

                // Asignar la animación de movimiento
                snowflake.style.animationDuration = `${Math.random() * 5 + 5}s`; // Duración aleatoria entre 5 y 10 segundos
                snowflake.style.animationDelay = `${Math.random() * 5}s`; // Retraso aleatorio entre 0 y 5 segundos

                container.appendChild(snowflake);
            }
        }

        // Crear la nieve al cargar la página
        window.onload = createSnowflakes;
    </script>

    <!-- Contenedor para Gameboard y Leaderboard (dos columnas) -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mt-8 px-4 mb-10 z-10 relative">
        <!-- Gameboard en la izquierda -->
        <div class="gameboard-container w-full h-full m-0 p-0">
            <x-gameboard />
        </div>

        <!-- Leaderboard en la derecha -->
        <div class="leaderboard-container">
            <x-leaderboard />
        </div>
    </div>

</body>
</html>
