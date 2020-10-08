<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGamesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('games', function (Blueprint $table) {
            $table->bigIncrements('gameId');
            $table->string('name');
            $table->string('developer');
    
            $table->unsignedBigInteger('genreId');
            $table->foreign('genreId')->references('genreId')->on('genres');
    
            $table->unsignedBigInteger('consoleId');
            $table->foreign('consoleId')->references('consoleId')->on('consoles');
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
        Schema::dropIfExists('games');
    }
}
