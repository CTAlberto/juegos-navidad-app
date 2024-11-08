<div>
    <header class="bg-gray-800 text-white">
        <div class="container mx-auto flex justify-between items-center py-4 px-8">
            <p class="text-2xl font-bold">Grinch huntinng</p>

            <span id="chances" class="bg-gray-700 text-white px-3 py-1 rounded mr-4"></span>

            <div id="timer" class="bg-gray-700 text-white px-4 py-2 rounded text-lg">
                <span id="time-display">00:00</span>
            </div>

            <!-- Botón de pausa -->
            <button id="pause-button" onclick="togglePause()" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 ml-4">
                Pausar
            </button>
            <form action="{{ url('game') }}" method="POST">
                @csrf
                <select name="difficulty" id="difficulty" class="bg-gray-700 text-white px-4 py-2 rounded" onchange="this.form.submit()">
                    <option value="">Selecciona la dificultad</option>
                    <option value="3">Fácil</option>
                    <option value="4">Medio</option>
                    <option value="5">Difícil</option>
                </select>
            </form>

        </div>
    </header>
</div>

<script>
    let timer; // Variable para el intervalo del cronómetro
    let minutes = 0;
    let seconds = 0;
    let isPaused = false; // Para controlar si el cronómetro está pausado o no

    // Función para actualizar el cronómetro
    function updateTimer() {
        seconds++;
        if (seconds >= 60) {
            seconds = 0;
            minutes++;
        }

        // Formateamos el tiempo para mostrarlo siempre con dos dígitos
        const formattedMinutes = minutes < 10 ? '0' + minutes : minutes;
        const formattedSeconds = seconds < 10 ? '0' + seconds : seconds;

        document.getElementById('time-display').textContent = `${formattedMinutes}:${formattedSeconds}`;
    }

    // Función para iniciar el cronómetro
    function startTimer() {
        timer = setInterval(updateTimer, 1000); // Actualiza cada segundo
    }

    // Función para pausar o reanudar el cronómetro
    function togglePause() {
        if (isPaused) {
            // Si está pausado, reanudar el cronómetro
            startTimer();
            document.getElementById('pause-button').textContent = 'Pausar';
        } else {
            // Si no está pausado, detener el cronómetro
            clearInterval(timer);
            document.getElementById('pause-button').textContent = 'Reanudar';
        }
        isPaused = !isPaused; // Cambiar el estado de la pausa
    }

    // Iniciar el cronómetro al cargar la página
    window.onload = startTimer;
</script>
