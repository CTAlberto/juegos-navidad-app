<?php

namespace App\Http\Controllers;
use DateTime;
use App\Http\Controllers\ScoreController;
use App\Models\User;
use Illuminate\Http\Request;

class UserController
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
{
    // Verificar si se ha enviado un nombre en el formulario
    $name = $request->input('name'); // Recibe el nombre desde el formulario

    // Buscar al usuario por IP
    $user = User::where('ip_adress', $request->ip())->first();
    
    if($user){
        session(['user_name' => $user->name, 'user_id' => $user->id]);
        return view('landing');
    }
    if ($user && $name) {
        // Si el usuario existe, actualizamos el nombre
        $user->update(['name' => $name]);

        // Actualizamos la sesión con el nuevo nombre
        session(['user_name' => $user->name, 'user_id' => $user->id]);

        // Redirigir al juego
        return redirect('/game');
    } else {
        // Si el usuario no existe, crear un nuevo registro de usuario y sesión
        $scoreController = new ScoreController();
        $score = $scoreController->create(0);

        // Crear al nuevo usuario
        $user = User::create([
            'ip_adress' => $request->ip(),
            'date' => (new DateTime())->format('Y-m-d H:i:s'),
            'name' => $name ?: 'Anónimo', // Usar el nombre enviado o 'Anónimo'
            'score_id' => $score->id,
        ]);

        // Establecer la sesión con el ID del nuevo usuario
        session(['user_name' => $user->name, 'user_id' => $user->id]);

        // Redirigir al juego
        return redirect('/game');
    }
}



    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
    /*
    public function ipSeeker(Request $request)
    {
        $ip = $request->ip();
        $ipJson = response()->json(['ip' => $ip]);
        echo $ipJson;
        return view('landing');
    }*/
}
