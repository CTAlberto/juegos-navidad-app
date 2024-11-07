<?php
$board = session('board');
$grinchPositionX = session('grinch_position_x');
$grinchPositionY = session('grinch_position_y');
echo $grinchPositionX;
echo $grinchPositionY;
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
    let grinchPositionX = {{ $grinchPositionX }};
    let grinchPositionY = {{ $grinchPositionY }};
    console.log(grinchPositionX, grinchPositionY);
    console.log(typeof grinchPositionX, typeof grinchPositionY);
    function checkCell(row, col) {

        // Comparamos la posición clicada con la posición del Grinch
        if (row == grinchPositionY && col == grinchPositionX) {
            alert('¡Encontraste al Grinch! 🎉' + row + " " + col);
        } else {
            alert("¡No has encontrado al Grinch! Intenta de nuevo." + row + " " + col);
        }
    }
</script>
