<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePropertiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('properties', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable(false);
            $table->string('tags')->nullable(true);
            $table->double('sale_value')->default(0);
            $table->string('type')->nullable(true);
            $table->integer('floors')->default(0);
            $table->integer('area')->default(0);
            $table->string('plot')->nullable(true);
            $table->string('makani_number')->nullable(true);
            $table->string('permit_number')->nullable(true);
            $table->string('community')->nullable(true);
            $table->string('sub_community')->nullable(true);
            $table->string('notes')->nullable(true);
            $table->string('address1')->nullable(false);
            $table->string('address2')->nullable(false);
            $table->string('city')->nullable(true);
            $table->string('state')->nullable(false);
            $table->foreignId('country_id')->nullable(false);
            $table->string('postcode')->nullable(true);
            $table->boolean('maintenance_active')->default(false);
            $table->string('alert_message')->nullable(true);
            $table->foreignId('landlord_id')->nullable(false);
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
        Schema::dropIfExists('properties');
    }
}
