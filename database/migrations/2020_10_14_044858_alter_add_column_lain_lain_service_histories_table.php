<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterAddColumnLainLainServiceHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('service_histories', function (Blueprint $table) {
            $table->string('lain_lain')->nullable()->after('pam_jentera');
            $table->string('lain_remark')->nullable()->after('lain_lain');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('service_histories', function (Blueprint $table) {
            //
        });
    }
}
