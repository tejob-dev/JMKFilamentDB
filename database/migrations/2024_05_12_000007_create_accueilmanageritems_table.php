<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAccueilmanageritemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accueilmanageritems', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->text('text')->nullable();
            $table->string('icone')->nullable();
            $table->string('boutontitre')->nullable();
            $table->string('boutonlien')->nullable();
            $table->unsignedBigInteger('accueilmanager_id')->nullable();

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
        Schema::dropIfExists('accueilmanageritems');
    }
}
