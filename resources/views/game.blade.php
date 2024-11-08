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

<body class="min-h-screen bg-gradient-to-r from-purple-500 via-purple-600 to-purple-700 relative overflow-auto">
    <x-header />
    <!-- Fondo animado de puntos que se mueven -->
    <div id="snow-container" class="absolute inset-0 z-20 pointer-events-none"></div>
    <!-- Botón para abrir el pop-up del leaderboard -->
    <button onclick="openLeaderboardPopup()" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 block mx-auto mt-8 z-10 relative">
        Ver Leaderboard
    </button>
    <!-- Botón para abrir el pop-up -->
    <button onclick="openPopup()" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 block mx-auto mt-8 z-10 relative">
        Indicaciones
    </button>
    <!-- Contenedor del Pop-Up -->
    <div id="popup" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-[-1] hidden">
        <div class="bg-white p-8 rounded shadow-lg w-1/3">
            <h2 class="text-2xl font-semibold mb-4">¡¡¡El Grinch quiere arruinar la navidad!!!!</h2>
            <p class="mb-6">¡¡¡El Grinch quiere arruinar la navidad!!!!</p>
            <button onclick="closePopup()" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600">
                Cerrar
            </button>
        </div>
    </div>

    <!-- Contenedor del Pop-Up de Leaderboard -->
    <div id="leaderboard-popup" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-[-1] hidden">
        <div class="bg-inherit p-8 rounded shadow-lg w-1/3">
            <div id="leaderboard-content">
                <!-- Aquí puedes incluir el contenido del leaderboard -->
                <x-leaderboard />
            </div>
            <button onclick="closeLeaderboardPopup()" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600">
                Cerrar
            </button>
        </div>
    </div>

    <!-- Script JavaScript para manejar el Pop-Up -->
    <script>




        function openPopup() {
        const popup = document.getElementById('popup');
        popup.classList.remove('hidden');  // Muestra el popup
        popup.classList.add('z-50');       // Cambia el z-index a un valor más alto para estar sobre otros elementos
    }

    function closePopup() {
        const popup = document.getElementById('popup');
        popup.classList.add('hidden');     // Oculta el popup nuevamente
        popup.classList.remove('z-50');    // Remueve el z-index alto para restaurar su estado inicial
}
        popup.classList.remove('z-50');    // Remueve el z-index alto para restaurar su estado inicial}
        function openLeaderboardPopup() {
            const popup = document.getElementById('leaderboard-popup');
            popup.classList.remove('hidden'); // Muestra el popup
            popup.classList.add('z-50'); // Cambia el z-index para estar sobre otros elementos
        }

        function closeLeaderboardPopup() {
            const popup = document.getElementById('leaderboard-popup');
            popup.classList.add('hidden'); // Oculta el popup nuevamente
            popup.classList.remove('z-50'); // Remueve el z-index alto para restaurar su estado inicial
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

    <!-- Contenedor para Gameboard que ocupe el 75% de la pantalla y esté centrado -->
    <div class="flex justify-center items-center h-screen">
        <div class="gameboard-container w-3/5 h-3/5">
            <x-gameboard />
        </div>
    </div>

</body>
</html>
