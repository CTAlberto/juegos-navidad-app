<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGrinchesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('grinches', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->foreignId('game_board_id')->constrained()->onDelete('cascade'); // Foreign key to game_boards
            $table->integer('position_x'); // Current X position of the monster
            $table->integer('position_y'); // Current Y position of the monster
            $table->timestamps(); // Created at and updated at timestamps
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('grinches');
    }
}

