<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nom_site');
            $table->string('logo_site');
            $table->string('contact_site')->nullable();
            $table->string('email_site')->nullable();
            $table
                ->string('defaut_lang')
                ->default('fr')
                ->nullable();
            $table->string('position_site')->nullable();
            $table->string('list_social')->nullable();
            $table->string('lien_contact')->nullable();

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
        Schema::dropIfExists('settings');
    }
}
