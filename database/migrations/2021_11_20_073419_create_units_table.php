<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUnitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('units', function (Blueprint $table) {
            $table->id();
            $table->integer('unit_number')->nullable(false);
            $table->string('unit_type')->nullable(false);
            $table->string('size')->nullable(false);
            $table->string('service_charges_per_sqft')->nullable(false);
            $table->double('rent')->nullable(false);
            $table->double('deposit')->nullable(false);
            $table->string('beds')->nullable(true);
            $table->string('baths')->nullable(true);
            $table->string('electricity_no')->nullable(true);
            $table->string('municipality_no')->nullable(true);
            $table->string('gas_no')->nullable(true);
            $table->integer('no_of_parkings')->nullable(true);
            $table->string('parking_no')->nullable(true);
            $table->string('unit_status')->nullable(true);
            $table->string('unit_category')->nullable(true);
            $table->string('compound_no')->nullable(true);
            $table->string('floor')->nullable(true);
            $table->string('management_fee_type')->nullable(true);
            $table->double('management_fee')->nullable(true);
            $table->text('options')->nullable(true);
            $table->text('marketing_title')->nullable(true);
            $table->text('marketing_description')->nullable(true);
            $table->text('property_photo')->nullable(false);
            $table->foreignId('property_id')->nullable(false);
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
        Schema::dropIfExists('units');
    }
}
