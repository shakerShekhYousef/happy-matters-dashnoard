<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeyToInspectionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('inspection', function (Blueprint $table) {
            $table->foreign('property_id')->references('id')->on('properties')->onUpdate('no action')->onDelete('no action');
            $table->foreign('unit_id')->references('id')->on('units')->onUpdate('no action')->onDelete('no action');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('inspection', function (Blueprint $table) {
            //
        });
    }
}
