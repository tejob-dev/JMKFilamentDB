<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignsToAccueilclientitemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('accueilclientitems', function (Blueprint $table) {
            $table
                ->foreign('accueilclient_id')
                ->references('id')
                ->on('accueilclients')
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
        Schema::table('accueilclientitems', function (Blueprint $table) {
            $table->dropForeign(['accueilclient_id']);
        });
    }
}
