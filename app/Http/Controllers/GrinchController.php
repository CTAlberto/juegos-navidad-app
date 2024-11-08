<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GrinchController
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

    public function firstPositionGrinch($size)
    {
        $grinchPosition_y = rand(0, $size - 1);
        $grinchPosition_x = rand(0, $size - 1);

        session(['x' => $grinchPosition_x]);
        session(['y' => $grinchPosition_y]);

        return array('x' => $grinchPosition_x, 'y' => $grinchPosition_y);
    }

    public function moveGrinch123(Request $request)
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
        //Añadir la a la sesión la nueva posicion del grinch
    }

    // TuControlador.php
    public function moveGrinch(Request $request)
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
    }


    public function checkGrinch($board, $playerGuess)
    {
        if ($board->grinch_position_x == $playerGuess['x'] && $board->grinch_position_y == $playerGuess['y']) {
            return true;
        }
        return false;
    }
    public function traceGrinch($board)
    {
        $trace = array();
        $trace['x'] = $board->grinch_position_x;
        $trace['y'] = $board->grinch_position_y;
        return $trace;
    }
}
