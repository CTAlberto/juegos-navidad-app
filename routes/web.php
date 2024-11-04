<?php

use App\Models\User;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('createUser', function(){
    $user = new User;
    $user->name = 'Pollino';
    $user->score_id = 2;
    $user->email = 'asd@asd.vom';
    $user->date = new DateTime();
    $user->save();
    return $user;
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