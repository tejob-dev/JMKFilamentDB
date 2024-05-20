<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAccueilmanagersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accueilmanagers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('section');
            $table->string('title');
            $table->text('text')->nullable();
            $table->string('boutontitre')->nullable();
            $table->string('boutonlien')->nullable();
            $table->string('image')->nullable();
            $table->string('imagetitle')->nullable();
            $table->text('textentreprise')->nullable();

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
        Schema::dropIfExists('accueilmanagers');
    }
}
