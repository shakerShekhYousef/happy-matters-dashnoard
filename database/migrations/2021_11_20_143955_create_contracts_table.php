<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContractsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contracts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tenant_id')->nullable(false);
            $table->foreignId('property_id')->nullable(false);
            $table->foreignId('unit_id')->nullable(false);
            $table->boolean('is_short_term_contract')->default(false);
            $table->date('start_date')->default(date('Y-m-d'))->nullable(false);
            $table->date('end_date')->default(date('Y-m-d'))->nullable(false);
            $table->double('total_rent')->nullable(false);
            $table->double('deposit')->nullable(false);
            $table->string('no_of_rent_payments')->nullable(true);
            $table->string('money_held_by')->nullable(true);
            $table->string('additional_terms')->nullable(true);
            $table->string('remarks')->nullable(true);
            $table->string('registered_tenancy_contract')->nullable(true);
            $table->string('tenancy_contract')->nullable(true);
            $table->string('description')->nullable(true);

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
        Schema::dropIfExists('contracts');
    }
}
