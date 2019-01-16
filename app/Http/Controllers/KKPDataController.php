<?php

namespace App\Http\Controllers;

use App\PropertyModel;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\KKPDataModel;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Auth;

class KKPDataController extends Controller
{

    var $uploadDir = 'uploads/kkpdata/';

    public function __construct() {
    	ini_set('memory_limit','256M');
        $this->middleware('auth');
    }
    
    /**
     * @desc: Displays the Table view
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index() {

        $user = Auth::user();

        if($user->hasRole('Manager')) {
            return redirect('kkpdata/home');
        }

        $data['properties'] = PropertyModel::where('user_id', $user->id)->get();


        $data['account']    = $user;
        $data['section']    = null;

        return view('kkpdata/index', $data);
    }

    public function beginSurvey() {

        return redirect('kkpdata/survey/background');
    }

    /**
     * @desc: Display The Background Form
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function surveyBackground() {
        $user = Auth::user();

        $property = null;
        $property_id = Request()->segment(4);
        if($property_id < 1) { } else {
            $property = PropertyModel::where('id', $property_id)->get()->first();
        }

        $data['account']    = $user;
        $data['property'] = $property;
        $data['section']    = Request()->segment(3);

        return view('kkpdata/survey/index', $data);
    }

    /**
     * @desc: Display The Property Form
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function surveyProperty() {
        $user = Auth::user();

        $property_id = Request()->segment(4);
        if($property_id < 1) {
            return Redirect()->to('/survey/background');
        } else {
            $property = PropertyModel::where('id', $property_id)->get()->first();
        }

        $data['account']    = $user;
        $data['property']   = $property;
        $data['section']    = Request()->segment(3);

        return view('kkpdata/survey/index', $data);
    }

    /**
     * @desc: Display The Environmental Form
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function surveyEnvironmental() {
        $user = Auth::user();

        $property_id = Request()->segment(4);
        if($property_id < 1) {
            return Redirect()->to('/survey/background');
        } else {
            $property = PropertyModel::where('id', $property_id)->get()->first();
        }

        $data['account']    = $user;
        $data['property']   = $property;
        $data['section']    = Request()->segment(3);

        return view('kkpdata/survey/index', $data);
    }

    /**
     * @desc: Display The Documents Form
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function surveyDocuments() {
        $user = Auth::user();

        $property_id = Request()->segment(4);
        if($property_id < 1) {
            return Redirect()->to('/survey/background');
        } else {
            $property = PropertyModel::where('id', $property_id)->get()->first();
        }

        $data['account']    = $user;
        $data['property']   = $property;
        $data['section']    = Request()->segment(3);

        return view('kkpdata/survey/index', $data);
    }


/*********************************************************
 * PROCESSES
**/

    /**
     * Process a New Property
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function process_step1(Request $request) {
        $user = Auth::user();

        $property = new PropertyModel();

        $property->user_id          = $user->id;
        $property->property_name    = $request->property_name;
        $property->address          = $request->address;
        $property->address2         = $request->address2;
        $property->city             = $request->city;
        $property->state            = $request->state;
        $property->postal           = $request->postal;
        $property->phone            = $request->phone;
        $property->website          = $request->website;
        $property->manager_name     = $request->manager_name;
        $property->manager_phone    = $request->manager_phone;
        $property->manager_email    = $request->manager_email;

        $property->save();

        \Session::flash('success-msg', 'Data was save successfully');
        return redirect()->to('kkpdata/survey/property/' . $property->id);
    }

    /**
     * Process a New Property
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function process_edit_step1(Request $request) {
        $user = Auth::user();

        $property = PropertyModel::where('id', $request->property_id)->get()->first();

        $property->property_name                    = $request->property_name;
        $property->address                          = $request->address;
        $property->address2                         = $request->address2;
        $property->city                             = $request->city;
        $property->state                            = $request->state;
        $property->postal                           = $request->postal;
        $property->phone                            = $request->phone;
        $property->website                          = $request->website;
        $property->manager_name                     = $request->manager_name;
        $property->manager_phone                    = $request->manager_phone;
        $property->manager_email                    = $request->manager_email;
        $property->demographic_composition          = $request->demographic_composition;
        $property->level_of_unemployment            = $request->level_of_unemployment;
        $property->police_jurisdiction              = $request->police_jurisdiction;
        $property->district_zone                    = $request->district_zone;
        $property->police_crime_prevention_officers = $request->police_crime_prevention_officers;
        $property->crime_free_housing_certification = $request->crime_free_housing_certification;
        $property->tax_credit                       = $request->tax_credit;

        $property->save();

        \Session::flash('success-msg', 'Data was save successfully');
        return redirect()->to('kkpdata/survey/property/' . $property->id);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function process_step2(Request $request) {

        $property = PropertyModel::where('id', $request->id)->get()->first();

        $property->num_of_units         = $request->num_of_units;
        $property->num_of_residents     = $request->num_of_residents;
        $property->excepts_hud          = $request->excepts_hud;
        $property->turnover_rate        = $request->turnover_rate;
        $property->rental_fee_start     = $request->rental_fee_start;
        $property->rental_fee_end       = $request->rental_fee_end;

        $property->save();

        \Session::flash('success-msg', 'Data was save successfully');
        return redirect()->to('kkpdata/survey/environmental/' . $request->id);

    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function process_step3(Request $request) {

        $property = PropertyModel::where('id', $request->id)->get()->first();

        $property->incidents_not_reported           = $request->incidents_not_reported;
        $property->violent_sexual_encounters        = $request->violent_sexual_encounters;
        $property->reports_majority_of_crimes       = $request->reports_majority_of_crimes;
        $property->reports_suspicious_behavior      = $request->reports_suspicious_behavior;
        $property->reports_drugs                    = $request->reports_drugs;
        $property->reports_high_male_traffic        = $request->reports_high_male_traffic;
        $property->history_of_stolen_cars           = $request->history_of_stolen_cars;
        $property->pizza_deliveries                 = $request->pizza_deliveries;
        $property->taxi_services_nights             = $request->taxi_services_nights;
        $property->known_gangs_on_property          = $request->known_gangs_on_property;
        $property->gangs_name                       = $request->gangs_name;
        $property->apartment_suspicious_activity    = $request->apartment_suspicious_activity;
        $property->five_crime_concerns              = $request->five_crime_concerns;

        $property->save();

        \Session::flash('success-msg', 'Data was save successfully');
        return redirect()->to('kkpdata/survey/documents/' . $request->id);
    }

    public function process_step4(Request $request) {

        $property = PropertyModel::where('id', $request->id)->get()->first();

        if ($request->file('upload_file_1')) {
            $destinationPath = public_path('uploads/kkpdata/property_management/' . $request->id);
            $file = $request->file('upload_file_1');
            $extension = $file->getClientOriginalExtension();
            $name = uniqid() . '_id_' . $request->id . '.' . $extension;
            $file->move($destinationPath, $name);
            $property->upload_file_1 = $name;
        }

        if ($request->file('upload_file_2')) {
            $destinationPath = public_path('uploads/kkpdata/property_management/' . $request->id);
            $file = $request->file('upload_file_2');
            $extension = $file->getClientOriginalExtension();
            $name = uniqid() . '_id_' . $request->id . '.' . $extension;
            $file->move($destinationPath, $name);
            $property->upload_file_2 = $name;
        }

        if ($request->file('upload_file_3')) {
            $destinationPath = public_path('uploads/kkpdata/property_management/' . $request->id);
            $file = $request->file('upload_file_3');
            $extension = $file->getClientOriginalExtension();
            $name = uniqid() . '_id_' . $request->id . '.' . $extension;
            $file->move($destinationPath, $name);
            $property->upload_file_3 = $name;
        }

        if ($request->file('upload_file_4')) {
            $destinationPath = public_path('uploads/kkpdata/property_management/' . $request->id);
            $file = $request->file('upload_file_4');
            $extension = $file->getClientOriginalExtension();
            $name = uniqid() . '_id_' . $request->id . '.' . $extension;
            $file->move($destinationPath, $name);
            $property->upload_file_4 = $name;
        }

        if ($request->file('upload_file_5')) {
            $destinationPath = public_path('uploads/kkpdata/property_management/' . $request->id);
            $file = $request->file('upload_file_5');
            $extension = $file->getClientOriginalExtension();
            $name = uniqid() . '_id_' . $request->id . '.' . $extension;
            $file->move($destinationPath, $name);
            $property->upload_file_5 = $name;
        }

        $property->save();

        \Session::flash('success-msg', 'Data was save successfully');
        return redirect()->to('kkpdata/survey/complete_overview/' . $request->id);
    }

    public function overview()
    {

        $id = Request()->segment(4);
        $property = PropertyModel::where('id', id)->get()->first();

        return view('kkpdata/survey/overview', compact('property'));
    }


    /**
     * @desc: Deletes file form section
     * @param $id
     * @param $section
     * @param $file
     * @return \Illuminate\Http\RedirectResponse
     */
    public function removeFile() {
        $id     = Request()->segment(4);
        $file   = Request()->segment(5);

        $property = PropertyModel::where('id', $id)->get()->first();

        // get the file name base off id and file name
        if(!empty($property->$file)) {
            // if id does delete it
            $destinationPath = public_path('uploads/kkpdata/property_management/' . $id);
            if(file_exists($destinationPath . '/' . $property->$file)) {
                Storage::delete($destinationPath . '/' . $property->$file);
            }
            $property->$file = null;
            $property->save();
        }
        return redirect()->to('kkpdata/survey/documents/' . $id);
    }





































}
