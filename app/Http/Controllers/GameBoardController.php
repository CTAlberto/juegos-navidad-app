<?php

namespace App\Http\Controllers;
use App\Http\Controllers\ScoreController;
use Illuminate\Http\Request;
use App\Http\Controllers\ColorController;

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

    public function game(){
        $scoreController = new ScoreController();
        $scores = $scoreController->leaderboard();
        $board = $this->createBoard();
        session(['scores' => $scores]);
        return view('game');
    }
    public function createBoard ($size = 4)    
    {
        $color = new ColorController();

        if($size < 3){
            $size = 3;
        }
       
        $board = array();
        for ($i = 0; $i < $size; $i++) {
            $board[$i] = array();
            for ($j = 0; $j < $size; $j++) {
                $board[$i][$j] = $color->getRandomColor($size);
            }
        }
      
        session(['board' => $board]);
        return 200;
    }

 
}
