<?php namespace App\Http\Controllers\Admin;

use DB;
use App\User;
use Illuminate\Http\File;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class AdminKKPDataController extends Controller
{

    var $uploadDir = 'uploads/kkpdata/';

    /**
     * @desc: Displays the Table view
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index() {

        $users = DB::table('users')->paginate(10);

        $data['accounts'] = $users;
        return view('admin/kkpdata/index', $data);
    }




















}