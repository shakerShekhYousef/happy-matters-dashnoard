<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeyToMaintenanceMediaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('maintenance_media', function (Blueprint $table) {
            $table->foreign('maintenance_id')->references('id')->on('maintenances')->onUpdate('no action')->onDelete('no action');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('maintenance_media', function (Blueprint $table) {
            //
        });
    }
}
