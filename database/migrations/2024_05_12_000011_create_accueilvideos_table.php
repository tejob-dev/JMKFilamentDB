<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAccueilvideosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accueilvideos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('section');
            $table->string('title');
            $table->text('text')->nullable();
            $table->string('image')->nullable();
            $table->string('videolien')->nullable();

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
        Schema::dropIfExists('accueilvideos');
    }
}
