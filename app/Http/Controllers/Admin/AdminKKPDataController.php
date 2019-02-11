<?php namespace App\Http\Controllers\Admin;

use App\PropertyModel;
use Illuminate\Http\Request;
use APp\USer;
use App\Http\Controllers\Controller;

class AdminKKPDataController extends Controller
{

    var $user;

    public function __construct() {


        $this->middleware('auth');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getCompanyListTable() {
        $user = User::groupby(['company', 'id'])->paginate(10);

        $content = ['accounts' => $user];

        return view('admin/kkpdata/index', $content);
    }

    /**
     * Get Orders for a given company
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getCompanyOrdersTable($id) {
        $properties = PropertyModel::where('user_id', $id)->paginate(10);

        $content    = [
            'properties' => $properties
        ];

        return view('admin/kkpdata/orders', $content);
    }












































    public function editSurvey() { }


    public function onUpdateSurvey() { }


    public function confirmDeleteSurvey() { }


    public function deleteSurvey() { }

}
