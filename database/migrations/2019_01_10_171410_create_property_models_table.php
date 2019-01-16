<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePropertyModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('properties', function (Blueprint $table) {

            /**
             * Main Property Information
             */
            $table->increments('id');
            $table->integer('user_id')->index()->nullable();
            $table->string('property_name', 200)->nullable();
            $table->string('address', 200)->nullable();
            $table->string('address2', 200)->nullable();
            $table->string('city', 200)->nullable();
            $table->string('state', 10)->nullable();
            $table->string('postal', 20)->nullable();
            $table->string('phone', 20)->nullable();
            $table->string('website', 255)->nullable();
            $table->string('manager_name', 255)->nullable();
            $table->string('manager_phone', 255)->nullable();
            $table->string('manager_email', 255)->nullable();

            /**
             * Property Detail
             */
            $table->integer('num_of_units')->nullable();
            $table->integer('num_of_residents')->nullable();
            $table->boolean('excepts_hud')->nullable();
            $table->boolean('tax_credit')->nullable();
            $table->string('turnover_rate')->nullable();
            $table->string('rental_fee_start')->nullable();
            $table->string('rental_fee_end')->nullable();
            $table->text('demographic_composition')->nullable();
            $table->string('level_of_unemployment',150)->nullable();
            $table->string('police_jurisdiction',75)->nullable();
            $table->string('crime_free_housing_certification',75)->nullable();
            $table->string('district_zone',75)->nullable();
            $table->text('police_crime_prevention_officers')->nullable();

            /**
             * Environmental Risk Concerns
             */
            $table->boolean('incidents_not_reported')->nullable();
            $table->boolean('violent_sexual_encounters')->nullable();
            $table->string('reports_majority_of_crimes')->nullable();
            $table->boolean('reports_suspicious_behavior')->nullable();
            $table->boolean('reports_drugs')->nullable();
            $table->boolean('reports_high_male_traffic')->nullable();
            $table->boolean('history_of_stolen_cars')->nullable();
            $table->boolean('pizza_deliveries')->nullable();
            $table->boolean('taxi_services_nights')->nullable();
            $table->boolean('known_gangs_on_property')->nullable();
            $table->string('gangs_name')->nullable();
            $table->string('apartment_suspicious_activity')->nullable();
            $table->text('five_crime_concerns')->nullable();

            /**
             * Upload Fields
             */
            $table->string('upload_file_1')->nullable();
            $table->string('upload_file_2')->nullable();
            $table->string('upload_file_3')->nullable();
            $table->string('upload_file_4')->nullable();
            $table->string('upload_file_5')->nullable();


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
        Schema::dropIfExists('properties');
    }
}
