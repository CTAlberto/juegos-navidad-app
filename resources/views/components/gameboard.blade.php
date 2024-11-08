<?php
$board = session('board');
$grinchPositionX = session('grinch_position_x');
$grinchPositionY = session('grinch_position_y');
$chances = 10;

?>
<div id="gameboard" class="grid gap-1 w-full h-full" style="grid-template-columns: repeat(<?= count($board) ?>, 25%);">
    @foreach ($board as $row)
        @foreach ($row as $index => $color)
            <div id="cell-{{ $loop->parent->index }}-{{ $index }}" class="color-cell w-full h-full p-4"
                style="background-color: <?= $color['hex'] ?>;"
                onclick="checkCell({{ $loop->parent->index }}, {{ $index }})">
            </div>
        @endforeach
    @endforeach
</div>

<script>
    let chances = {{ $chances }};
    document.getElementById('chances').textContent = chances;
    // Pasamos la posición del Grinch desde PHP a JavaScript
    let grinchPositionX = {{ $grinchPositionX }};
    let grinchPositionY = {{ $grinchPositionY }};

    function checkCell(row, col) {
    // Comparamos la posición clicada con la posición del Grinch
    if (row == grinchPositionY && col == grinchPositionX) {
        alert('¡Encontraste al Grinch! 🎉' + row + " " + col);
        // Aquí si toca "Servidor"
    } else {
        alert("¡No has encontrado al Grinch! Intenta de nuevo." + row + " " + col);
        chances--;
        document.getElementById('chances').textContent = chances;
        console.log(chances);
        moverGrinch();
        if (chances <= 0) {
            alert('¡Perdiste! 😢');
        }
    }
}

function moverGrinch() {
    fetch('{{ url('/mover-grinch') }}', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content') // Token CSRF
        }
    })
    .then(response => response.json())
    .then(data => {
        console.log('Nueva posición del Grinch:', data);

        // Remover el color especial de la posición anterior del Grinch
        const prevGrinchCell = document.getElementById(`cell-${grinchPositionY}-${grinchPositionX}`);
        if (prevGrinchCell) {
            prevGrinchCell.style.outline = 'none';
        }

        // Actualizar las variables de posición del Grinch con los nuevos valores
        grinchPositionX = data.x;
        grinchPositionY = data.y;

        // Agregar un color especial a la nueva posición del Grinch
        const newGrinchCell = document.getElementById(`cell-${grinchPositionY}-${grinchPositionX}`);
        if (newGrinchCell) {
            newGrinchCell.style.outline = '3px solid red';
        }
    })
    .catch(error => console.error('Error al mover el Grinch:', error));
}



</script>
