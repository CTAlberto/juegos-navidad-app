<?php

namespace App\Http\Controllers;
use App\Models\Score;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ScoreController
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
    public function create($points)
    {
        return Score::create([
            'points' => $points,
        ]);
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

    public function leaderboard(){

        $results = DB::table('scores')
        ->join('users', 'scores.id', '=', 'users.score_id')
        ->select('scores.*', 'users.*')
        ->orderBy('points', 'desc')->limit(10)
        ->get();

        return $results;
        
    }
}
