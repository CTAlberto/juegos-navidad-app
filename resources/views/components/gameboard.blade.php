<?php
$board = session('board');
$grinchPositionX = session('grinchPosition_x');
$grinchPositionY = session('grinchPosition_y');
?>
<div class="grid gap-1 w-full h-full" style="grid-template-columns: repeat(<?= count($board) ?>, 25%);">
    @foreach($board as $row)
        @foreach($row as $index => $color)
            <div id="cell-{{$loop->parent->index}}-{{$index}}" 
                 class="color-cell w-full h-full p-4" 
                 style="background-color: <?= $color['hex'] ?>;"
                 onclick="checkCell({{ $loop->parent->index }}, {{ $index }})">
            </div>
        @endforeach
    @endforeach
</div>

<script>
    // Pasamos la posición del Grinch desde PHP a JavaScript
    const grinchPositionX = <?= json_encode($grinchPositionX) ?>;
    const grinchPositionY = <?= json_encode($grinchPositionY) ?>;

    function checkCell(row, col) {
        // Comparamos la posición clicada con la posición del Grinch
        if (row === grinchPositionX && col === grinchPositionY) {
            alert('¡Encontraste al Grinch! 🎉');
        } else {
            alert("¡No has encontrado al Grinch! Intenta de nuevo.");
        }
    }
</script>
