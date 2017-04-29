<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePreSurveyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
    	Schema::create('pre_survey', function (Blueprint $table) {
    		$table->increments('id');

    		// Step 1 - Background Information
    		$table->string('facility');
    		$table->string('main_phone');
    		$table->string('your_name');
    		$table->string('your_title');
    		$table->string('your_phone');
    		$table->boolean('is_point_of_contact')->default(0);
    		$table->string('point_of_contact_name')->nullable();
    		$table->string('point_of_contact_phone')->nullable();
    		
    		// Step 2 - STAFF INFORMATION
    		$table->string('manager')->nullable();
    		$table->string('director')->nullable();
    		$table->string('operation_manager')->nullable();
    		$table->string('hr_manager')->nullable();
   
    		// Step 3 - FACILITY INFORMATION
    		$table->text('type_of_operation')->nullable();
    		$table->text('business_hrs')->nullable();
    		$table->text('assets_of_greatest_concern')->nullable();
    		$table->text('employee_schedules')->nullable();
    		$table->text('pharmacy_onsite')->nullable();
    		
    		// Step 4 - Security Threat Concerns
    		$table->text('trespass_concerns')->nullable();
    		$table->text('vandalism_concerns')->nullable();
    		$table->text('theft_concerns')->nullable();
    		$table->text('threatening_employee')->nullable();
    		$table->text('violence')->nullable();
    		$table->text('special_concerns')->nullable();
    		
    		// Step 5 - Local Emergency Responders and Jurisdictions
    		$table->text('police_jurisdiction')->nullable();
    		$table->text('local_police_response_time')->nullable();
    		$table->text('local_ambulance_jurisdiction')->nullable();
    		
    		// Step 6 -  Infrastructure
    		$table->text('public_address_system')->nullable();
    		$table->boolean('employ_electronic_access_control')->default(0)->nullable();
            $table->text('type_of_system')->nullable();
            $table->text('system_enrollment')->nullable();

            // Step 7 -  Alarm System
            $table->text('alarm_systems')->nullable();
            $table->text('alarm_system_monitored')->nullable();
            $table->text('penalties_to_false_alarms')->nullable();
            $table->text('history_of_nuisance')->nullable();
            $table->boolean('has_panic_alarms')->default(0);
            $table->text('panic_alarm_activated')->nullable();
            $table->text('panic_alarm_investigated')->nullable();

            // Step 8 - CCTV
            $table->text('onsite_cctv')->nullable();
            $table->text('where_monitors_located')->nullable();

            // Step 9 - MEDICAL
            $table->boolean('has_medical_clinic')->default(0);
            $table->text('medical_clinic_description')->nullable();
            $table->boolean('medical_staff_trained')->default(0);
            $table->text('emergency_medical_kits_located')->nullable();
            $table->text('aeds_located')->nullable();

            // Step 10 - HVAC
            $table->text('trained_hvac_system_employees')->nullable();
            $table->text('hvac_system_shutdown')->nullable();
            $table->text('hvac_controls_located')->nullable();

            // Step 11 - EMERGENCY POWER
            $table->text('systems_powered_by_generator')->nullable();
            $table->text('power_generator_fueled')->nullable();
            $table->text('backup_power_systems_tested')->nullable();

            // Step 12 - JANITORIAL
            $table->string('janitorial_service')->nullable();
            $table->string('contracted_janitorial_service')->nullable();

            // Step 13 - Security Policies and Documentation
            $table->string('employees_subjected_to_background_checks')->nullable();
            $table->text('describe_estbc')->nullable();
            $table->boolean('employees_criminal_history')->default(0);
            $table->boolean('previous_employer_verifications')->default(0);
            $table->boolean('guidelines_for_termination')->default(0);
            $table->string('guidelines_for_termination_file')->nullable();

            // Step 14 - Access Control and Visitors
            $table->boolean('has_visitor_procedures')->default(0);
            $table->string('visitor_procedures_access_file')->nullable();
            $table->boolean('has_employee_access')->default(0);
            $table->string('employee_access_file')->nullable();
            $table->boolean('has_contractor_access')->default(0);
            $table->string('contractor_access_file')->nullable();
            $table->boolean('has_electronic_access_control_systems')->default(0);
            $table->string('electronic_access_control_file')->nullable();
            $table->boolean('has_written_key_control_policy')->default(0);
            $table->string('written_key_control_policy_file')->nullable();
            $table->string('facility_key_control_manager')->nullable();

            // Step 15 - Security and Safety Reporting
            $table->boolean('has_formally_documenting_security')->default(0);
            $table->string('formally_documented_stored')->nullable();

            // Step 16 - Workplace Violence Policy
            $table->boolean('has_threatening_behavior_policy')->default(0);
            $table->string('threatening_behavior_policy_file')->nullable();
            $table->boolean('has_assessment_and_management_plan')->default(0);
            $table->string('assessment_and_management_plan_file')->nullable();

            // Step 17 - Operations
            $table->boolean('has_on_site_security_force')->default(0);
            $table->text('on_site_security_force_shift')->nullable();
            $table->text('duties_of_officers')->nullable();
            $table->text('dispatched_during_emergencies')->nullable();
            $table->string('level_of_confidence_management')->nullable();
            $table->string('level_of_confidence_employees')->nullable();
            $table->text('specific_concerns_security_force')->nullable();
            $table->text('in_charge_officer_deployment')->nullable();

            // Step 17 - Emergency Preparations
    		$table->boolean('has_emergency_response_management_plan')->default(0);
    		$table->text('responsible_for_authoring_employees')->nullable();
    		$table->string('responsible_for_authoring_employees_file')->nullable();
    		$table->boolean('has_floor_captain_warden_system')->default(0);
    		$table->text('types_of_emergency_drills')->nullable();
    		
    		
    		
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
         Schema::dropIfExists('pre_survey');
    }
}
