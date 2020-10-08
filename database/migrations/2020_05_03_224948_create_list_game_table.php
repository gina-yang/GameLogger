<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateListGameTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('list_game', function (Blueprint $table) {
            $table->unsignedBigInteger('listId');
            $table->foreign('listId')->references('listId')->on('lists');
    
            $table->unsignedBigInteger('gameId');
            $table->foreign('gameId')->references('gameId')->on('games');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('list_game');
    }
}
