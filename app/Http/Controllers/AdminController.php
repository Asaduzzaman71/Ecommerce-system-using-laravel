<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use DB;
use App\Http\Requests;
use Session;
 session_start();

class AdminController extends Controller
{
    public function login(){
    	return view("admin.login");
    }

    

    

     public function checkadmin(Request $request){
     	
     	$admin_email=$request->admin_email;
     	$admin_password=md5($request->admin_password);
     	$admin=DB::table("admins")
     			->where('email',$admin_email)
     			->where('password',$admin_password)
     			->first();
     		
     	if($admin){
     		session::put('name',$admin->name);
     		session::put('id',$admin->id);
     		return Redirect::to('/admin/dashboard');
     	}
     	else{
     		session::put('messege','email or password Invalid');
     		return Redirect::to("admin");


     	}
    	
    }
}
