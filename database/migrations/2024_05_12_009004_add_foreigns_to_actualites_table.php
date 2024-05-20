<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignsToActualitesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('actualites', function (Blueprint $table) {
            $table
                ->foreign('typeformation_id')
                ->references('id')
                ->on('typeformations')
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');

            $table
                ->foreign('accueilactu_id')
                ->references('id')
                ->on('accueilactus')
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
        Schema::table('actualites', function (Blueprint $table) {
            $table->dropForeign(['typeformation_id']);
            $table->dropForeign(['accueilactu_id']);
        });
    }
}
