<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignsToAccueilmanageritemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('accueilmanageritems', function (Blueprint $table) {
            $table
                ->foreign('accueilmanager_id')
                ->references('id')
                ->on('accueilmanagers')
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('accueilmanageritems', function (Blueprint $table) {
            $table->dropForeign(['accueilmanager_id']);
        });
    }
}
