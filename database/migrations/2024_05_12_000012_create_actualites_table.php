<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateActualitesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('actualites', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('section');
            $table->string('title')->nullable();
            $table->text('text')->nullable();
            $table->string('boutontitre')->nullable();
            $table->string('boutonlien')->nullable();
            $table->string('image')->nullable();
            $table->string('imagetitle')->nullable();
            $table->timestamp('dateactu')->nullable();
            $table->string('managernom')->nullable();
            $table->unsignedBigInteger('typeformation_id')->nullable();
            $table->unsignedBigInteger('accueilactu_id')->nullable();

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
        Schema::dropIfExists('actualites');
    }
}
