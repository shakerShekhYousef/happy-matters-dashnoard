<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMaintenancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('maintenances', function (Blueprint $table) {
            $table->id();
            $table->string('maintenance_category')->nullable(false);
            $table->string('responsible_person')->nullable(false);
            $table->string('title')->nullable(false);
            $table->text('details')->nullable(true);
            $table->foreignId('property_id')->nullable(false);
            $table->foreignId('unit_id')->nullable(false);
            $table->date('available_date')->default(date('Y-m-d'))->nullable(true);
            $table->time('time_slot')->default(date('H:m:s'))->nullable(true);
            $table->string('priority')->nullable(true);
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
        Schema::dropIfExists('maintenances');
    }
}
