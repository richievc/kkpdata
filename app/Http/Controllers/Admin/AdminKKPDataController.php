<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\KKPDataModel;

class AdminKKPDataController extends Controller
{



    public function index() {

        $data['accounts'] = array();

        return view('admin/kkpdata/index', $data);
    }

    public function create_step1() {

        $data['account'] = array();

        return view('admin/kkpdata/create_step1', $data);

    }

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
        $id = $data->save();

        \Session::flash('success-msg', 'Data was save successfully');
        return redirect()->to('admin/kkpdata/step2/' . $id);
    }


    public function step2($id) {

        $data['account'] = array('id'=>$id);

        return view('admin/kkpdata/create_step2', $data);

    }

    public function process_step2(Request $request, $id) {

        $data = KKPDataModel::find($id);

        $data->manager 		            = $request->manager;
        $data->director 		        = $request->director;
        $data->operation_manager 	    = $request->operation_manager;
        $data->hr_manager 	            = $request->hr_manager;
        $data->save();

        \Session::flash('success-msg', 'Data was save successfully');
        return redirect()->to('admin/kkpdata/step3/' . $id);
    }


    public function step3($id) {

        $data['account'] = array('id'=>$id);

        return view('admin/kkpdata/create_step3', $data);
    }

    public function process_step3(Request $request, $id) {

        $data = KKPDataModel::find($id);

        $data->type_of_operation 	        = $request->type_of_operation;
        $data->business_hrs 		        = $request->business_hrs;
        $data->assets_of_greatest_concern   = $request->assets_of_greatest_concern;
        $data->employee_schedules 	        = $request->employee_schedules;
        $data->pharmacy_onsite 	            = $request->pharmacy_onsite == 'yes' ? 1 : 0;
        $data->save();

        \Session::flash('success-msg', 'Data was save successfully');
        return redirect()->to('admin/kkpdata/step4/' . $id);
    }

    public function step4($id) {

        $data['account'] = array('id'=>$id);

        return view('admin/kkpdata/create_step4', $data);
    }

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
        return redirect()->to('admin/kkpdata/step5/' . $id);
    }


    public function step5($id) {

        $data['account'] = array('id'=>$id);

        return view('admin/kkpdata/create_step5', $data);
    }

    public function process_step5(Request $request, $id) {

        $data = KKPDataModel::find($id);

        $data->police_jurisdiction 	            = $request->police_jurisdiction;
        $data->local_police_response_time       = $request->local_police_response_time;
        $data->local_ambulance_jurisdiction     = $request->local_ambulance_jurisdiction;

        $data->save();

        \Session::flash('success-msg', 'Data was save successfully');
        return redirect()->to('admin/kkpdata/step6/' . $id);
    }

    public function step6($id) {

        $data['account'] = array('id'=>$id);

        return view('admin/kkpdata/create_step6', $data);
    }

    public function process_step6(Request $request, $id) {

        $data = KKPDataModel::find($id);

        // Infrastructure

        // Alarm System
        $table->text('alarm_systems')->nullable();
        $table->text('alarm_system_monitored')->nullable();
        $table->text('penalties_to_false_alarms')->nullable();
        $table->text('history_of_nuisance')->nullable();
        $table->boolean('has_panic_alarms')->default(0);
        $table->text('panic_alarm_activated')->nullable();
        $table->text('panic_alarm_investigated')->nullable();

        // CCTV
        $table->text('onsite_cctv')->nullable();
        $table->text('where_monitors_located')->nullable();


        $data->public_address_system 	        = $request->public_address_system;
        $data->employ_electronic_access_control = $request->employ_electronic_access_control;
        $data->type_of_system                   = $request->type_of_system;
        $data->system_enrollment                = $request->system_enrollment;
        $data->alarm_systems                    = $request->alarm_systems;
        $data->alarm_system_monitored           = $request->alarm_system_monitored;
        $data->penalties_to_false_alarms        = $request->penalties_to_false_alarms;
        $data->history_of_nuisance              = $request->history_of_nuisance;



        $data->save();

        \Session::flash('success-msg', 'Data was save successfully');
        return redirect()->to('admin/kkpdata/step7/' . $id);
    }
















































}
