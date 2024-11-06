<?php
$board = session('board');
?>
<div class="grid gap-1" style="grid-template-columns: repeat(<?=count($board)?>, 50px);">
        @foreach($board as $row)
            @foreach($row as $color)
                <div class="color-cell" value="1" style="background-color: <?=$color['hex']?>"><button value="comemela"></div>
            @endforeach
        @endforeach
</div>