<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use DB;
use App\Http\Requests;
use Session;
 session_start();


class ManufactureController extends Controller
{
    public function index(){
    	return view('admin/addmanufacture');
    }

    public function allmanufacture(){
     	$manufactures=DB::table('manufactures')->get();
    	return view('admin.allmanufacture')->with('manufactures',$manufactures);
    }


    public function savemanufacture(Request $request){
      	$manufacture=array();
      	$manufacture['manufacture_name']=$request->manufacture_name;
      	$manufacture['manufacture_description']=$request->manufacture_description;
      	$manufacture['publication_status']=$request->publication_status;
      	DB::table('manufactures')->insert($manufacture);
      	Session::put('messege','Manufacture inserted successfully!!!!');
    	return Redirect::to('/admin/addmanufacture');
    }

     public function deletemanufacture($id){
              
        
                DB::table('manufactures')
                ->where('manufacture_id',$id)
                ->delete();
                
                Session::put('messege','Manufacture Deleted successfully!!!!');
                return Redirect::to('/admin/allmanufacture');
                
    
    }


    public function deactivemanufacture($id){
    	
     			DB::table('manufactures')
     			->where('manufacture_id',$id)
     			->update(['publication_status'=>0]);
     			Session::put('messege',' deactivated successfully!!!!');
     			return Redirect::to('/admin/allmanufacture');
     			
    
    }

    public function activemanufacture($id){
    	
     			DB::table('manufactures')
     			->where('manufacture_id',$id)
     			->update(['publication_status'=>1]);
     			Session::put('messege','manufacture activated successfully!!!!');
     			return Redirect::to('/admin/allmanufacture');
     			
    
    }

    public function editmanufacture($id){
    	
     			$manuinfo=DB::table('manufactures')
     			->where('manufacture_id',$id)
     			->first();
     			return view('admin\editmanufacture')->with('manufacture',$manuinfo);
     			
    
    }

    public function updatemanufacture(Request $request,$id){
                $manufacture=array();
                $manufacture['manufacture_name']=$request->manufacture_name;
                $manufacture['manufacture_description']=$request->manufacture_description;
        
                $manuinfo=DB::table('manufactures')
                ->where('manufacture_id',$id)
                ->update($manufacture);
                
                Session::put('messege','Manufacture updated successfully!!!!');
                return Redirect::to('/admin/allmanufacture');
                
    
    }
}
