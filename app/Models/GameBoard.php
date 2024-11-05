<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GameBoard extends Model
{
    protected $table = 'game_boards';
    protected $fillable = ['board'];
    protected $casts = [
        'board' => 'array',
    ];
}
