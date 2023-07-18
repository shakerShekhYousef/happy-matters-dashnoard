<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTenantGuestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tenant_guests', function (Blueprint $table) {
            $table->id();
            $table->string('guest_type')->nullable(false);
            $table->string('name')->nullable(false);
            $table->string('age')->nullable(false);
            $table->string('nationality')->nullable(false);
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
        Schema::dropIfExists('tenant_guests');
    }
}
