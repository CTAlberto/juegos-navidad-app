<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;

class UserController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
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
    public function checkIp(Request $request, $name)
    {
        // Obtener la IP del usuario
        $ipAddress = $request->ip();

        // Comprobar si hay un usuario con esta IP
        $user = User::where('ip_address', $ipAddress)->first();

        if ($user) {
            // Si se encuentra un usuario con esa IP, devolver el nombre
            return response()->json(['name' => $user->name, 'ip' => $ipAddress]);
        } else {
            // Si no se encuentra, crear un nuevo usuario con esa IP
            // Puedes dejar el nombre en blanco o definirlo como quieras
            User::create([
                'ip_address' => $ipAddress,
                'name' => $name ?? 'user'// O un valor por defecto, si lo prefieres
            ])->save();

            return response()->json(['name' => '']);
        }
    }
}
