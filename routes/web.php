<?php

use App\Http\Controllers\GameBoardController;
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
    
