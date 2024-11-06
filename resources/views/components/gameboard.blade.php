<?php
$board = session('board');
?>
<div class="grid gap-1 w-full h-full" style="grid-template-columns: repeat(<?=count($board)?>, 25%);">
        @foreach($board as $row)
            @foreach($row as $color)
                <div class="color-cell w-full h-full p-4" style="background-color: <?=$color['hex']?>"></div>

                  
            @endforeach
        @endforeach
</div>