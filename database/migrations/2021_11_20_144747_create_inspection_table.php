<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInspectionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inspection', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable(false);
            $table->string('inspection_type')->nullable(false);
            $table->string('inspector_id')->nullable(true);
            $table->date('inspection_date')->default(date('Y-m-d'))->nullable(false);
            $table->time('inspection_time')->default(date('H:m:s'))->nullable(false);
            $table->foreignId('property_id')->nullable(true);
            $table->foreignId('unit_id')->nullable(true);
            $table->text('notes')->nullable(true);
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
        Schema::dropIfExists('inspection');
    }
}
