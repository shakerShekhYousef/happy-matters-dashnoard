<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTenantVehiclesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tenant_vehicles', function (Blueprint $table) {
            $table->id();
            $table->string('vehicle_type')->nullable(false);
            $table->string('make')->nullable(false);
            $table->string('model')->nullable(false);
            $table->string('year')->nullable(false);
            $table->string('color')->nullable(false);
            $table->string('plate_no')->nullable(false);
            $table->foreignId('tenant_id')->nullable(false);
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
        Schema::dropIfExists('tenant_vehicles');
    }
}
