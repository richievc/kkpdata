<?php

namespace App\Http\Controllers;


use App\User;
use Illuminate\Http\Request;

class AdminProfileController extends Controller
{
   
	public $data = []; 
	
    /**
     * 
     */
	public function show() {
		$user = User::where('id', '=', \Session::get('user_id'));
		
		return view('admin/profile/show', $this->data);
	}
	
	
	
}
