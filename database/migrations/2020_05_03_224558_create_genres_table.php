<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGenresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('genres', function (Blueprint $table) {
            $table->bigIncrements('genreId');
            $table->string('name');
            $table->string('description');
            $table->timestamps();
        });

        DB::table('genres')->insert([
            ['name' => 'First-Person Shooter', 'description' => 'Featuring 3D environments centered around weapon-based combat in the first-person perspective.'],
            ['name' => 'MMO', 'description' => 'Featuring persistent open worlds that can be experienced with thousands of other real-time users.'],
            ['name' => 'Simulation', 'description' => 'Simulate aspects of real (or fictional) reality.'],
            ['name' => 'Action-Adventure', 'description' => 'A hybrid genre featuring long-term obstacles typical of adventure games combined with core elements of action games.'],
            ['name' => 'Role-Playing Game', 'description' => 'Control the actions of a character in a fantasy world.'],
            ['name' => 'Strategy', 'description' => 'Collect resources, defeat enemies, and strategize to win.'],
            ['name' => 'Fighting', 'description' => 'Compete against other characters or players in combat.'],
            ['name' => 'Sports', 'description' => 'Emulate playing traditional sports in a fictional environment.'],
            ['name' => 'Puzzle', 'description' => 'Featuring logic puzzles, mazes, and more.'],
            ['name' => 'Platformer', 'description' => 'Featuring gameplay involving jumping and climbing to navigate a character around its environment.'],
            ['name' => 'Racing', 'description' => 'Featuring the ability to operate and race a virtual vehicle to compete against other players.']
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('genres');
    }
}
