<?php

use App\Http\Controllers\GameBoardController;
use App\Http\Controllers\GrinchController;
use App\Http\Controllers\UserController;
use App\Models\User;
use App\Models\Score;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Ruta GET para la página de inicio (landing page)
Route::get('/', [UserController::class, 'start']);
Route::get('/check', [UserController::class, 'index']);
Route::match(['post', 'get'], 'game', [GameBoardController::class, 'game']);
Route::get('changeBoard/{id}', [GameBoardController::class, 'game']);
Route::get('check-cell', [GameBoardController::class, 'checkCell']);
//Route::get('game/mover-grinch', [GrinchController::class, 'moveGrinch']);
Route::get('game/mover-grinch', function ()
{
    $x = session('x');
    $y = session('y');
    $size = session('size');
    $ok = true;

    do {
        $dx = rand(-1, 1);
        $dy = rand(-1, 1);

        if ($dx === 0 && $dy === 0 || $dx !== 0 && $dy !== 0) {
            continue;
        }

        $newX = $x + $dx;
        $newY = $y + $dy;

        if ($newX >= 0 && $newX < $size && $newY >= 0 && $newY < $size) {
            $x = $newX;
            $y = $newY;
            $ok = false;
            break;
        }
    } while ($ok);

    // Añadir la nueva posición a la sesión
    session(['x' => $x, 'y' => $y]);

    // Devuelve la nueva posición como JSON
    return response()->json([
        'x' => $x,
        'y' => $y
    ]);
});

