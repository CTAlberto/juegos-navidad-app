<?php
$board = session('board');
?>
<div class="grid gap-1" style="grid-template-columns: repeat(<?=count($board)?>, 50px);">
        @foreach($board as $row)
            @foreach($row as $color)
                <div class="color-cell" style="background-color: <?=$color['hex']?>"></div>
            @endforeach
        @endforeach
</div>