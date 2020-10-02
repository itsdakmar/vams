<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServiceHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('service_histories', function (Blueprint $table) {
            $table->id();
            $table->string('tarikh');
            $table->unsignedBigInteger('vehicle_id');
            $table->string('servis')->nullable();
            $table->string('enjin')->nullable();
            $table->string('brek')->nullable();
            $table->string('transmisi')->nullable();
            $table->string('steering')->nullable();
            $table->string('suspension')->nullable();
            $table->string('casis')->nullable();
            $table->string('pam_jentera')->nullable();
            $table->string('kos')->nullable();
            $table->timestamps();
            $table->foreign('vehicle_id')->references('id')->on('vehicles')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('service_histories');
    }
}
