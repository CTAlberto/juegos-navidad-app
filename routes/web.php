<?php

use App\Http\Controllers\UserController;
use App\Models\User;
use App\Models\Score;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', function(){return view('landing');});
Route::get('/check-ip', [UserController::class, 'checkIp']);


Route::get('/ip', function(Request $request){
    $user = User::where('ip_adress', $request->ip())->first();
    if($user){
        return $user;
    }else{
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
Route::get('createUser', function(){
    $user = new User;
    $user->name = 'Pollanko';
    $user->score_id = 20000;
    $user->email = 'asd@asd.vom';
    $user->date = new DateTime();
    $user->save();
    return $user;
});

Route::get('game', function(){
    return view('game');
});

Route::get('users', function(){
    return User::all();
});

Route::get('users/{id}', function($id){
    return User::find($id);
});

Route::get('users/{id}/delete', function($id){
    $user = User::find($id);
    $user->delete();
    return view();
});

Route::get('users/{id}/{score}/update', function($id, $score){
    $user = User::find($id);
    $user->score_id = $score;
    $user->save();
    return $user;
});

Route::get('users/scores', function(){
    $lista = User::where('score_id', '>', 1)->orderBy('score_id', 'desc')->get();
    return $lista;
});


?>

