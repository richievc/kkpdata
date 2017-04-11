<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KKPdataModel;

class KKPDataController extends Controller
{

    var $uploadDir = 'uploads/kkpdata/';

    /**
     * @desc: Displays the Table view
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index() {
        $data['accounts'] = KKPDataModel::all();
        return view('kkpdata/index', $data);
    }

    /**
     * @desc: Step 1 - Background Information
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create_step1() {
        $data['account'] = array();
        return view('kkpdata/create_step1', $data);
    }

    /**
     * @desc: Edit Step 1 - Background Information
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit_step1($id) {
        $data['account'] = KKPDataModel::find($id);
        return view('kkpdata/create_step1', $data);
    }

    /**
     * @desc: Process Step 1 - Background Information
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function process_step1(Request $request) {

        $data = new KKPDataModel;

        $data->facility 		        = $request->facility;
        $data->main_phone 		        = $request->main_phone;
        $data->your_name 		        = $request->your_name;
        $data->your_title 		        = $request->your_title;
        $data->your_phone 		        = $request->your_phone;
        $data->is_point_of_contact 	    = $request->is_point_of_contact == 'yes' ? 1 : 0;
        $data->point_of_contact_name    = $request->point_of_contact_name;
        $data->point_of_contact_phone   = $request->point_of_contact_phone;
        $data->save();

        \Session::flash('success-msg', 'Data was save successfully');
        return redirect()->to('kkpdata/step2/' . $data->id);
    }

    public function process_edit_step1(Request $request, $id) {

        $data = KKPDataModel::find($id);

        $data->facility 		        = $request->facility;
        $data->main_phone 		        = $request->main_phone;
        $data->your_name 		        = $request->your_name;
        $data->your_title 		        = $request->your_title;
        $data->your_phone 		        = $request->your_phone;
        $data->is_point_of_contact 	    = $request->is_point_of_contact == 'yes' ? 1 : 0;
        $data->point_of_contact_name    = $request->point_of_contact_name;
        $data->point_of_contact_phone   = $request->point_of_contact_phone;
        $data->save();

        \Session::flash('success-msg', 'Data was save successfully');
        return redirect()->to('kkpdata/step2/' . $data->id);
    }

    /**
     * @desc: Step 2 - STAFF INFORMATION
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function step2($id) {
        $data['account'] = KKPDataModel::find($id);
        return view('kkpdata/create_step2', $data);
    }

    /**
     * @desc: Process Step 2 - STAFF INFORMATION
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function process_step2(Request $request, $id) {

        $data = KKPDataModel::find($id);

        $data->manager 		            = $request->manager;
        $data->director 		        = $request->director;
        $data->operation_manager 	    = $request->operation_manager;
        $data->hr_manager 	            = $request->hr_manager;

        $data->save();

        \Session::flash('success-msg', 'Data was save successfully');
        return redirect()->to('kkpdata/step3/' . $id);
    }

    /**
     * @desc: Step 3 - FACILITY INFORMATION
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function step3($id) {
        $data['account'] = KKPDataModel::find($id);
        return view('kkpdata/create_step3', $data);
    }

    /**
     * @desc: Process Step 3 - FACILITY INFORMATION
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function process_step3(Request $request, $id) {

        $data = KKPDataModel::find($id);

        $data->type_of_operation 	        = $request->type_of_operation;
        $data->business_hrs 		        = $request->business_hrs;
        $data->assets_of_greatest_concern   = $request->assets_of_greatest_concern;
        $data->employee_schedules 	        = $request->employee_schedules;
        $data->pharmacy_onsite 	            = $request->pharmacy_onsite == 'yes' ? 1 : 0;
        $data->save();

        \Session::flash('success-msg', 'Data was save successfully');
        return redirect()->to('kkpdata/step4/' . $id);
    }

    /**
     * @desc: Step 4 - Security Threat Concerns
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function step4($id) {
        $data['account'] = KKPDataModel::find($id);
        return view('kkpdata/create_step4', $data);
    }

    /**
     * @desc: Process Step 4 - Security Threat Concerns
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function process_step4(Request $request, $id) {

        $data = KKPDataModel::find($id);

        $data->trespass_concerns 	        = $request->trespass_concerns;
        $data->vandalism_concerns 	        = $request->vandalism_concerns;
        $data->theft_concerns 	            = $request->theft_concerns;
        $data->threatening_employee 	    = $request->threatening_employee;
        $data->violence 	                = $request->violence;
        $data->special_concerns 	        = $request->special_concerns;

        $data->save();

        \Session::flash('success-msg', 'Data was save successfully');
        return redirect()->to('kkpdata/step5/' . $id);
    }

    /**
     * @desc: Step 5 - Local Emergency Responders and Jurisdictions
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function step5($id) {
        $data['account'] = KKPDataModel::find($id);
        return view('kkpdata/create_step5', $data);
    }

    /**
     * @desc: Process Step 5 - Local Emergency Responders and Jurisdictions
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function process_step5(Request $request, $id) {

        $data = KKPDataModel::find($id);

        $data->police_jurisdiction 	            = $request->police_jurisdiction;
        $data->local_police_response_time       = $request->local_police_response_time;
        $data->local_ambulance_jurisdiction     = $request->local_ambulance_jurisdiction;

        $data->save();

        \Session::flash('success-msg', 'Data was save successfully');
        return redirect()->to('kkpdata/step6/' . $id);
    }

    /**
     * @desc: Step 6 - Infrastructure
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function step6($id) {
        $data['account'] = KKPDataModel::find($id);
        return view('kkpdata/create_step6', $data);
    }


    /**
     * @desc: Process Step 6 - Infrastructure
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function process_step6(Request $request, $id) {

        $data = KKPDataModel::find($id);

        $data->public_address_system 	        = $request->public_address_system;
        $data->employ_electronic_access_control = $request->employ_electronic_access_control == 'yes' ? 1 : 0;;;
        $data->type_of_system                   = $request->type_of_system;
        $data->system_enrollment                = $request->system_enrollment;
        $data->alarm_systems                    = $request->alarm_systems;
        $data->alarm_system_monitored           = $request->alarm_system_monitored;
        $data->penalties_to_false_alarms        = $request->penalties_to_false_alarms;
        $data->history_of_nuisance              = $request->history_of_nuisance;
        $data->has_panic_alarms                 = $request->has_panic_alarms == 'yes' ? 1 : 0;;
        $data->panic_alarm_activated            = $request->panic_alarm_activated;
        $data->onsite_cctv                      = $request->onsite_cctv;
        $data->where_monitors_located           = $request->where_monitors_located;

        $data->save();

        \Session::flash('success-msg', 'Data was save successfully');
        return redirect()->to('kkpdata/step7/' . $id);
    }

    /**
     * @desc: Step 7 - Alarm System
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function step7($id) {
        $data['account'] = KKPDataModel::find($id);
        return view('kkpdata/create_step7', $data);
    }

    /**
     * @desc: Process Step 7 - Alarm System
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function process_step7(Request $request, $id) {

        $data = KKPDataModel::find($id);

        $data->has_medical_clinic 	            = $request->has_medical_clinic == 'yes' ? 1 : 0;
        $data->medical_clinic_description       = $request->medical_clinic_description;
        $data->medical_staff_trained 	        = $request->medical_staff_trained == 'yes' ? 1 : 0;
        $data->emergency_medical_kits_located   = $request->emergency_medical_kits_located;
        $data->aeds_located                     = $request->emergency_medical_kits_located;

        $data->save();

        \Session::flash('success-msg', 'Data was save successfully');
        return redirect()->to('kkpdata/step8/' . $id);
    }

    /**
     * @desc: Step 8 - MEDICAL
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function step8($id) {
        $data['account'] = KKPDataModel::find($id);
        return view('kkpdata/create_step8', $data);
    }


    /**
     * @desc: Process Step 8 - MEDICAL
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function process_step8(Request $request, $id) {

        $data = KKPDataModel::find($id);

        $data->trained_hvac_system_employees    = $request->trained_hvac_system_employees;
        $data->hvac_system_shutdown             = $request->hvac_system_shutdown;
        $data->hvac_controls_located            = $request->hvac_controls_located;

        $data->save();

        \Session::flash('success-msg', 'Data was save successfully');
        return redirect()->to('kkpdata/step9/' . $id);
    }

    /**
     * @desc: Step 9 -  EMERGENCY POWER
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function step9($id) {
        $data['account'] = KKPDataModel::find($id);
        return view('kkpdata/create_step9', $data);
    }

    /**
     * @desc: Process Step 9 -  EMERGENCY POWER
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function process_step9(Request $request, $id) {

        $data = KKPDataModel::find($id);

        $data->systems_powered_by_generator     = $request->systems_powered_by_generator;
        $data->power_generator_fueled           = $request->power_generator_fueled;
        $data->backup_power_systems_tested      = $request->backup_power_systems_tested;

        $data->save();

        \Session::flash('success-msg', 'Data was save successfully');
        return redirect()->to('kkpdata/step10/' . $id);
    }

    /**
     * @desc: Step 10 - JANITORIAL
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function step10($id) {
        $data['account'] = KKPDataModel::find($id);
        return view('kkpdata/create_step10', $data);
    }

    /**
     * @desc: Process Step 10 - JANITORIAL
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function process_step10(Request $request, $id) {

        $data = KKPDataModel::find($id);

        $data->janitorial_service               = $request->janitorial_service;
        $data->contracted_janitorial_service    = $request->contracted_janitorial_service;

        $data->save();

        \Session::flash('success-msg', 'Data was save successfully');
        return redirect()->to('kkpdata/step11/' . $id);
    }


    /**
     * @desc: Step 11 - Security Policies and Documentation
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function step11($id) {
        $data['account'] = KKPDataModel::find($id);
        return view('kkpdata/create_step11', $data);
    }

    /**
     * @desc: Process Step 11 - Security Policies and Documentation
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function process_step11(Request $request, $id)
    {

        $data = KKPDataModel::find($id);

        $data->employees_subjected_to_background_checks = $request->employees_subjected_to_background_checks;
        $data->describe_estbc = $request->describe_estbc;
        $data->employees_criminal_history = $request->employees_criminal_history == 'yes' ? 1 : 0;
        $data->previous_employer_verifications = $request->previous_employer_verifications == 'yes' ? 1 : 0;
        $data->guidelines_for_termination = $request->guidelines_for_termination == 'yes' ? 1 : 0;

        if ($request->file('guidelines_for_termination_file')) {
            $destinationPath = public_path('uploads/kkpdata/'.$id.'/');
            $file = $request->file('guidelines_for_termination_file');
            $extension = $file->getClientOriginalExtension();
            $name = uniqid() . '_id_' . $id . '.' . $extension;
            $file->move($destinationPath, $name);
            $data->guidelines_for_termination_file = $name;
        }

        $data->save();

        \Session::flash('success-msg', 'Data was save successfully');
        return redirect()->to('kkpdata/step12/' . $id);
    }

    public function step12($id) {
        $data['account'] = KKPDataModel::find($id);
        return view('kkpdata/create_step12', $data);
    }

    public function process_step12(Request $request, $id)
    {

        $data = KKPDataModel::find($id);

        $data->has_visitor_procedures = $request->has_visitor_procedures == 'yes' ? 1 : 0;
        if ($request->file('visitor_procedures_access_file')) {
            $destinationPath = public_path('uploads/kkpdata/'.$id.'/');
            $file = $request->file('visitor_procedures_access_file');
            $extension = $file->getClientOriginalExtension();
            $name = uniqid() . '_id_' . $id . '.' . $extension;
            $file->move($destinationPath, $name);
            $data->visitor_procedures_access_file = $name;
        }

        $data->has_employee_access = $request->has_employee_access == 'yes' ? 1 : 0;
        if ($request->file('employee_access_file')) {

            $destinationPath = public_path('uploads/kkpdata/'.$id.'/');
            $file = $request->file('employee_access_file');
            $extension = $file->getClientOriginalExtension();
            $name = uniqid() . '_id_' . $id . '.' . $extension;
            $file->move($destinationPath, $name);
            $data->employee_access_file = $name;
        }

        $data->has_contractor_access = $request->has_contractor_access == 'yes' ? 1 : 0;
        if ($request->file('contractor_access_file')) {

            $destinationPath = public_path('uploads/kkpdata/'.$id.'/');
            $file = $request->file('contractor_access_file');
            $extension = $file->getClientOriginalExtension();
            $name = uniqid() . '_id_' . $id . '.' . $extension;
            $file->move($destinationPath, $name);
            $data->contractor_access_file = $name;
        }

        $data->has_electronic_access_control_systems = $request->has_electronic_access_control_systems == 'yes' ? 1 : 0;
        if ($request->file('electronic_access_control_systems_file')) {

            $destinationPath = public_path('uploads/kkpdata/'.$id.'/');
            $file = $request->file('electronic_access_control_systems_file');
            $extension = $file->getClientOriginalExtension();
            $name = uniqid() . '_id_' . $id . '.' . $extension;
            $file->move($destinationPath, $name);
            $data->electronic_access_control_systems_file = $name;
        }

        $data->has_written_key_control_policy = $request->has_written_key_control_policy == 'yes' ? 1 : 0;
        if ($request->file('written_key_control_policy_file')) {

            $destinationPath = public_path('uploads/kkpdata/'.$id.'/');
            $file = $request->file('written_key_control_policy_file');
            $extension = $file->getClientOriginalExtension();
            $name = uniqid() . '_id_' . $id . '.' . $extension;
            $file->move($destinationPath, $name);
            $data->written_key_control_policy_file = $name;
        }

        $data->facility_key_control_manager = $request->facility_key_control_manager;

        $data->save();

        \Session::flash('success-msg', 'Data was save successfully');
        return redirect()->to('kkpdata/step13/' . $id);
    }



    public function step13($id) {
        $data['account'] = KKPDataModel::find($id);
        return view('kkpdata/create_step13', $data);
    }


    public function process_step13(Request $request, $id)
    {

        $data = KKPDataModel::find($id);

        $data->has_formally_documenting_security    = $request->has_formally_documenting_security == 'yes' ? 1 : 0;
        $data->formally_documented_stored           = $request->formally_documented_stored;

        $data->save();

        \Session::flash('success-msg', 'Data was save successfully');
        return redirect()->to('kkpdata/step14/' . $id);
    }



    public function step14($id) {
        $data['account'] = KKPDataModel::find($id);
        return view('kkpdata/create_step14', $data);
    }


    public function process_step14(Request $request, $id)
    {

        $data = KKPDataModel::find($id);

        $data->has_threatening_behavior_policy = $request->has_threatening_behavior_policy == 'yes' ? 1 : 0;
        if ($request->file('threatening_behavior_policy_file')) {
            $destinationPath = public_path('uploads/kkpdata/' . $id);
            $file = $request->file('threatening_behavior_policy_file');
            $extension = $file->getClientOriginalExtension();
            $name = uniqid() . '_id_' . $id . '.' . $extension;
            $file->move($destinationPath, $name);
            $data->threatening_behavior_policy_file = $name;
        }

        $data->has_assessment_and_management_plan = $request->has_assessment_and_management_plan == 'yes' ? 1 : 0;
        if ($request->file('assessment_and_management_plan_file')) {
            $destinationPath = public_path('uploads/kkpdata/' . $id);
            $file = $request->file('assessment_and_management_plan_file');
            $extension = $file->getClientOriginalExtension();
            $name = uniqid() . '_id_' . $id . '.' . $extension;
            $file->move($destinationPath, $name);
            $data->assessment_and_management_plan_file = $name;
        }

        $data->save();

        \Session::flash('success-msg', 'Data was save successfully');
        return redirect()->to('kkpdata/step15/' . $id);
    }





    public function step15($id) {
        $data['account'] = KKPDataModel::find($id);
        return view('kkpdata/create_step15', $data);
    }


    public function process_step15(Request $request, $id)
    {

        $data = KKPDataModel::find($id);
        //Security Operations

        $data->has_on_site_security_force           = ($request->has_on_site_security_force =='yes' ? 1 : 0);
        $data->on_site_security_force_shift         = $request->on_site_security_force_shift;
        $data->duties_of_officers                   = $request->duties_of_officers;
        $data->dispatched_during_emergencies        = $request->dispatched_during_emergencies;
        $data->level_of_confidence_management       = $request->level_of_confidence_management;
        $data->level_of_confidence_employees        = $request->level_of_confidence_employees;
        $data->specific_concerns_security_force     = $request->specific_concerns_security_force;
        $data->in_charge_officer_deployment     = $request->specific_concerns_security_force;

        $data->save();

        \Session::flash('success-msg', 'Data was save successfully');
        return redirect()->to('kkpdata/step16/' . $id);
    }


    public function step16($id) {
        $data['account'] = KKPDataModel::find($id);
        return view('kkpdata/create_step16', $data);
    }

    public function process_step16(Request $request, $id)
    {

        $data = KKPDataModel::find($id);
        // Emergency Preparations

        $data->has_emergency_response_management_plan           = ($request->has_emergency_response_management_plan =='yes' ? 1 : 0);
        $data->responsible_for_authoring_employees              = $request->responsible_for_authoring_employees;

        if ($request->file('responsible_for_authoring_employees_file')) {
            $destinationPath = public_path('uploads/kkpdata/' . $id);
            $file = $request->file('responsible_for_authoring_employees_file');
            $extension = $file->getClientOriginalExtension();
            $name = uniqid() . '_id_' . $id . '.' . $extension;
            $file->move($destinationPath, $name);
            $data->responsible_for_authoring_employees_file = $name;
        }

        $data->has_floor_captain_warden_system = ($request->has_floor_captain_warden_system =='yes' ? 1 : 0);
        $data->types_of_emergency_drills              = $request->types_of_emergency_drills;

        $data->save();

        \Session::flash('success-msg', 'Data was save successfully');
        return redirect()->to('home');
    }

    /**
     * @desc: Deletes file form section
     * @param $id
     * @param $section
     * @param $file
     * @return \Illuminate\Http\RedirectResponse
     */
    public function deletefile($id, $section, $file) {
        $data = KKPDataModel::find($id);

        // get the file name base off id and file name
        if(!empty($data->$file)) {
            // if id does delete it
            $destinationPath = public_path('uploads/kkpdata/' . $id);
            if(file_exists($destinationPath . '/' . $data->$file)) {
                Storage::delete($destinationPath . '/' . $data->$file);
            }
            $data->$file = null;
            $data->save();
        }
        return redirect()->to('kkpdata/' . $section . '/' . $id);
    }














}
