<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grinch extends Model
{
    use HasFactory;

    // Define the table name (optional if it matches the default 'grinches')
    protected $table = 'grinches';

    // Mass assignable attributes
    protected $fillable = [
        'game_board_id',
        'position_x',
        'position_y'
    ];

    /**
     * Get the game board associated with the Grinch.
     */
    public function gameBoard()
    {
        return $this->belongsTo(GameBoard::class);
    }
}

/**
 * es solo una prueba
 */
