<?php

use App\Http\Controllers\GameBoardController;
use App\Http\Controllers\UserController;
use App\Models\User;
use App\Models\Score;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Ruta GET para la página de inicio (landing page)
Route::get('/', [UserController::class, 'index']);

// Ruta POST para procesar el formulario y luego redirigir al juego
Route::post('/game', [UserController::class, 'index']); // Manejamos tanto GET como POST en la misma función
Route::post('/game', [GameBoardController::class, 'game']); // Para la lógica del juego


/*
Route::get('/check-ip', [UserController::class, 'checkIp']);


Route::get('/ip', function (Request $request) {
    $user = User::where('ip_adress', $request->ip())->first();
    if ($user) {
        return $user;
    } else {
        $score = Score::create([
            'points' => 0,
        ]);
        $user = User::create([
            'ip_adress' => $request->ip(),
            'date' => (new DateTime())->format('Y-m-d H:i:s'),
            'name' => 'Anónimo',
            'score_id' => $score->id,
        ]);
        return $user;
    }
});

//Route que se encarga de crear un usuario
Route::get('createUser', function () {
    $user = new User;
    $user->name = 'Pollanko';
    $user->score_id = 20000;
    $user->email = 'asd@asd.vom';
    $user->date = new DateTime();
    $user->save();
    return $user;
});

//Route que se encarga de mostrar la vista del juego
Route::get('game', function () {
    return view('game');
});

//Route que se encarga de mostrar todos los usuarios
Route::get('users', function () {
    return User::all();
});

//Route que se encarga de mostrar un usuario
Route::get('users/{id}', function ($id) {
    return User::find($id);
});

//Route que se encarga de eliminar un usuario
Route::get('users/{id}/delete', function ($id) {
    $user = User::find($id);
    $user->delete();
    return view();
});

//Route que se encarga de actualizar el score de un usuario
Route::get('users/{id}/{score}/update', function ($id, $score) {
    $user = User::find($id);
    $user->score_id = $score;
    $user->save();
    return $user;
});

//Route que se encargar de mostrar los 10 records mas altos de la tabla scores
Route::get('scores', function () {
    $lista = User::join('scores', 'users.score_id', '=', 'scores.id')
        ->orderBy('scores.points', 'desc')
        ->select('users.name', 'scores.points')
        ->take(10)
        ->get();

    return $lista;
});*/
