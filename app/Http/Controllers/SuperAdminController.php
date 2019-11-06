<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use DB;
use App\Http\Requests;
use Session;
session_start();

class SuperAdminController extends Controller
{
    public function logout(){
    	
    	Session::flush();
    	return Redirect::to('/admin');

    }

    public function dashboard(){
    	$this->AdminAuthCheck();
        return view('admin.dashboard');
    }

    public function AdminAuthCheck(){
    	$admin=Session::get('id');
    	if($admin){

    	 	return;
    	}
    	else{
    		return Redirect::to('/admin')->send();
    	}
    }
}
