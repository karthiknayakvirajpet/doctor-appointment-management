<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TimeAvailabilityTableAlterTimeColumns extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('time_availability', function (Blueprint $table) {
            $table->time('start_time')->default('00:00:00')->change();
            $table->time('end_time')->default('00:00:00')->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('time_availability', function (Blueprint $table) {
            //
        });
    }
}
