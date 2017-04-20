<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnsToKkpdata extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pre_survey', function (Blueprint $table) {
            for ($i = 4; $i <= 10; $i++) {
                $table->string('building_name' . $i)->nullable();
                $table->string('no_of_floor_plans' . $i)->nullable();
                $table->string('floor_plans' . $i . '_file')->nullable();
            }
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
