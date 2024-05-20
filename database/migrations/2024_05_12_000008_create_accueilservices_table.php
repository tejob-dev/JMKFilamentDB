<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAccueilservicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accueilservices', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('secton');
            $table->string('title');
            $table->text('text')->nullable();
            $table->string('boutonlien')->nullable();
            $table->string('image')->nullable();
            $table->string('imagetitle')->nullable();

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
        Schema::dropIfExists('accueilservices');
    }
}
