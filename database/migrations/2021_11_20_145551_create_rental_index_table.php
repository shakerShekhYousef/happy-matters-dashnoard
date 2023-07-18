<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRentalIndexTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rental_index', function (Blueprint $table) {
            $table->id();
            $table->string('property_type')->nullable(false);
            $table->integer('number_of_beds')->nullable(false);
            $table->string('rental_index')->nullable(false);
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
        Schema::dropIfExists('rental_index');
    }
}
