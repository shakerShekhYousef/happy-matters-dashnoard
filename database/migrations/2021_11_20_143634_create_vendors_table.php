<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVendorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vendors', function (Blueprint $table) {
            $table->id();
            $table->string('email')->nullable(false);
            $table->string('password')->nullable(false);
            $table->string('company_name')->nullable(false);
            $table->string('contact_name')->nullable(false);
            $table->string('category')->nullable(false);
            $table->string('tax_registration')->nullable(false);
            $table->string('mobile')->nullable(false);
            $table->foreignId('country_id')->nullable(false);
            $table->string('address1')->nullable(true);
            $table->string('address2')->nullable(true);
            $table->string('city')->nullable(true);
            $table->string('state')->nullable(true);
            $table->string('postcode')->nullable(true);
            $table->text('notes')->nullable(true);
            $table->boolean('auto_assigned')->default(false);
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
        Schema::dropIfExists('vendors');
    }
}
