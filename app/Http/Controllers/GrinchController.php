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

    public function firstPositionGrinch($board){
        
        $board = session('board');
        $board->grinch_position_x = rand(0, $board->size_x - 1);
        $board->grinch_position_y = rand(0, $board->size_y - 1);
        $board->save();

    }

}
