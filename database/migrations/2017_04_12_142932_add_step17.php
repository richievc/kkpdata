<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddStep17 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pre_survey', function (Blueprint $table) {

            // Step 3 - FACILITY INFORMATION
            $table->string('building_name1')->nullable();
            $table->string('no_of_floor_plans1')->nullable();
            $table->string('floor_plans1_file')->nullable();

            $table->string('building_name2')->nullable();
            $table->string('no_of_floor_plans2')->nullable();
            $table->string('floor_plans2_file')->nullable();

            $table->string('building_name3')->nullable();
            $table->string('no_of_floor_plans3')->nullable();
            $table->string('floor_plans3_file')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
