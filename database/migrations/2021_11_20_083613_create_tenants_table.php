<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTenantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tenants', function (Blueprint $table) {
            $table->id();
            $table->string('email')->nullable(false);
            $table->string('password')->nullable(false);
            $table->string('fname')->nullable(false);
            $table->string('mname')->nullable(true);
            $table->string('lname')->nullable(false);
            $table->boolean('is_company')->default(false);
            $table->string('company_name')->nullable(true);
            $table->string('trade_license')->nullable(true);
            $table->string('tax_registration')->nullable(true);
            $table->date('trade_license_expiry')->default(date('Y-m-d'))->nullable(true);
            $table->date('dob')->default(date('Y-m-d'))->nullable(false);
            $table->string('phone')->nullable(true);
            $table->string('additional_phone1')->nullable(true);
            $table->string('additional_phone2')->nullable(true);
            $table->string('gender')->nullable(true);
            $table->string('marital_status')->nullable(true);
            $table->string('national_id')->nullable(true);
            $table->date('national_id_expiry')->default(date('Y-m-d'))->nullable(true);
            $table->string('passport')->nullable(true);
            $table->date('passport_expiry')->default(date('Y-m-d'))->nullable(true);
            $table->string('visa_state')->nullable(true);
            $table->foreignId('home_country_id')->nullable(true);
            $table->foreignId('country_id')->nullable(true);
            $table->string('address1')->nullable(true);
            $table->string('address2')->nullable(true);
            $table->string('city')->nullable(true);
            $table->string('state')->nullable(true);
            $table->string('postcode')->nullable(true);
            $table->text('notes')->nullable(true);
            $table->string('visa_page')->nullable(true);
            $table->string('national_id_photo')->nullable(true);
            $table->string('passport_photo')->nullable(true);
            $table->string('visa_photo')->nullable(true);
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
        Schema::dropIfExists('tenants');
    }
}
