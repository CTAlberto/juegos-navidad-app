<?php

use App\Http\Controllers\GameBoardController;
use App\Http\Controllers\UserController;
use App\Models\User;
use App\Models\Score;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Ruta GET para la página de inicio (landing page)
Route::get('/', [UserController::class, 'start']);
Route::post('/check', [UserController::class, 'index']);
Route::match(['get', 'post'], '/game', [GameBoardController::class, 'game']);



