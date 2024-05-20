<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAccueilformationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accueilformations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('section');
            $table->string('title');
            $table->text('text')->nullable();
            $table->string('boutontitre')->nullable();
            $table->string('boutonlien')->nullable();
            $table->string('imagetitle')->nullable();
            $table->string('image')->nullable();

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
        Schema::dropIfExists('accueilformations');
    }
}
