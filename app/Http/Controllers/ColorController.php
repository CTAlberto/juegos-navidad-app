<?php

namespace App\Http\Controllers;
use App\Models\Color;
use Illuminate\Http\Request;

class ColorController
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

    public function getRandomColor($num)
    {
        // Obtener un número limitado de colores de la base de datos
        $colors = Color::limit($num+1)->get()->toArray();

        // Seleccionar un color aleatorio de la lista
        $randomColor = $colors[array_rand($colors)];

        // Crear un array con el valor hexadecimal del color seleccionado
        $color =['hex' => $randomColor['hex_value']];

        return $color;

    }
    public function setBlackColor()
    {
        return ['hex' => '#000000'];

}

}
