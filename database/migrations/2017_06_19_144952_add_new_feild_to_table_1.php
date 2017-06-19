<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddNewFeildToTable1 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
  		Schema::table('pre_survey', function (Blueprint $table) {
			$table->string('facility_emergency_power_by_generator')->nullable();
   		});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
         Schema::table('pre_survey', function ($table) {
            $table->dropColumn('facility_emergency_power_by_generator');
        });
    }
}
