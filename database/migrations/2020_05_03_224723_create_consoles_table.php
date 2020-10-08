<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConsolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('consoles', function (Blueprint $table) {
            $table->bigIncrements('consoleId');
            $table->string('name');
            $table->string('company');
            $table->timestamps();
        });

        DB::table('consoles')->insert([
            ['name' => 'PC', 'company' => '--'],
            ['name' => 'Xbox One', 'company' => 'Microsoft'],
            ['name' => 'Nintendo Switch', 'company' => 'Nintendo'],
            ['name' => 'Playstation 4', 'company' => 'Sony']
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('consoles');
    }
}
