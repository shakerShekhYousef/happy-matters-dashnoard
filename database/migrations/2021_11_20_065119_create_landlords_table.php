<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLandlordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('landlords', function (Blueprint $table) {
            $table->id();
            $table->string('email')->nullable(false);
            $table->string('fname')->nullable(false);
            $table->string('lname')->nullable(false);
            $table->string('tax_registration')->nullable(true);
            $table->string('mobile')->nullable(false);
            $table->string('national_id')->nullable(true);
            $table->date('national_id_expiry')->nullable(true);
            $table->string('passport_no')->nullable(true);
            $table->date('passport_expiry')->nullable(true);
            $table->string('visa_state')->nullable(true);
            $table->string('name_on_contract')->nullable(true);
            $table->string('email_on_contract')->nullable(true);
            $table->string('phone_on_contract')->nullable(true);
            $table->string('bank_name')->nullable(true);
            $table->string('bank_address')->nullable(true);
            $table->string('iban')->nullable(true);
            $table->string('swift')->nullable(true);
            $table->string('options')->nullable(true);
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
        Schema::dropIfExists('landlords');
    }
}
