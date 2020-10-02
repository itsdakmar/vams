<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVehiclesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehicles', function (Blueprint $table) {
            $table->id();
            $table->string('no_siri_b');
            $table->string('no_enjin');
            $table->string('no_casis');
            $table->string('tarikh_pendaftaran');
            $table->string('tarikh_perolehan');
            $table->string('no_kenderaan')->unique();
            $table->string('model');
            $table->string('jenis');
            $table->unsignedBigInteger('office_id');
            $table->string('no_fail');
            $table->timestamps();
            $table->foreign('office_id')->references('id')->on('offices')->onDelete('restrict');

        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vehicles');
    }
}
