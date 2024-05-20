<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignsToAccueilserviceitemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('accueilserviceitems', function (Blueprint $table) {
            $table
                ->foreign('accueilservice_id')
                ->references('id')
                ->on('accueilservices')
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
        Schema::table('accueilserviceitems', function (Blueprint $table) {
            $table->dropForeign(['accueilservice_id']);
        });
    }
}
