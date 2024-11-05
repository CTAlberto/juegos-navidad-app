<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;
    protected $table = 'users';

    // Método para establecer la relación con la tabla de scores
    public function scores()
    {
        return $this->hasMany(Score::class);
    }

    // Método para establecer la relación con la tabla de game boards
    public function gameBoards()
    {
        return $this->hasMany(GameBoard::class);
    }
    
}
