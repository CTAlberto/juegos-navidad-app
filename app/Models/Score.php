<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Score extends Model
{
    use HasFactory;

    // Define the table name (optional if it matches the default 'scores')
    protected $table = 'scores';

    // Mass assignable attributes
    protected $fillable = [
        'user_id',
        'game_board_id',
        'score'
    ];

    /**
     * Get the user associated with the score.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the game board associated with the score.
     */
    public function gameBoard()
    {
        return $this->belongsTo(GameBoard::class);
    }
}
