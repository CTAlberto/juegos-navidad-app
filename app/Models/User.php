<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;
    protected $table = 'users';
    protected $fillable = ['name', 'score_id', 'email', 'created_at', 'ip_adress', 'date'];

    // Método para establecer la relación con la tabla de scores
    public function scores()
    {
        return $this->hasMany(Score::class);
    }

    // Método para establecer la relación con la tabla de scores
    public function score()
    {
        return $this->belongsTo(Score::class, 'score_id', 'id');
    }

    // Método para establecer la relación con la tabla de game boards
    public function gameBoards()
    {
        return $this->hasMany(GameBoard::class);
    }
    
}
