<?php

namespace App\Http\Controllers;

use App\Http\Controllers\ScoreController;
use Illuminate\Http\Request;
use App\Http\Controllers\ColorController;
use App\Http\Controllers\GrinchController;

class GameBoardController
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

    public function game(Request $request)
    {
        $difficulty = $request->input('difficulty', 4); // valor predeterminado: 'medium'


        // Crear el tablero con el tamaño correspondiente
        $scoreController = new ScoreController();
        $scores = $scoreController->leaderboard();
        $board = $this->createBoard($difficulty);

        session(['scores' => $scores]);
        return view('game');
    }



    public function createBoard($size = 4)
    {
        $color = new ColorController();
        $grinchController = new GrinchController();

        if ($size < 3) {
            $size = 3;
        }
        $grinch = $grinchController->firstPositionGrinch($size);
        $board = array();

        for ($i = 0; $i < $size; $i++) {
            $board[$i] = array();
            for ($j = 0; $j < $size; $j++) {
                if ($grinch['x'] == $j && $grinch['y'] == $i) {
                    $board[$i][$j] = $color->setBlackColor();
                    continue;
                }
                $board[$i][$j] = $color->getRandomColor($size);
            }
        }
        session(['board' => $board]);
        session('size', $size);
        return 200;
    }
}
