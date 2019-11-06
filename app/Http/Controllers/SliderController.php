<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use DB;
use App\Http\Requests;
use Session;
session_start();


class SliderController extends Controller
{
    public function index(){
    	return view('admin/addslider');
    }



     public function saveslider(Request $request)
    {
        $this->AdminAuthCheck();
        $slider=array();
       
        $slider["publication_status"]=$request->publication_status;
        $image=$request->file("slider_image");
        if($image){
            $image_name=str_random(20);
            $ext=strtolower($image->getClientOriginalExtension());
            $image_full_name=$image_name.'.'.$ext;
            $upload_path='slider/';
            $image_url=$upload_path.$image_full_name;
            $success=$image->move($upload_path,$image_full_name);
            if($success){
                $slider['slider_image']=$image_url;
                DB::table('sliders')->insert($slider);
                Session::put('messege','Slider inserted successfully!!!!');
                return Redirect::to('/admin/addslider');
            }
        }
        
    }


     public function allslider(){
        $this->AdminAuthCheck();
     	$sliders=DB::table('sliders')->get();
    	return view('admin.allslider')->with('sliders',$sliders);
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

     public function deactiveslider($id){
        
                DB::table('sliders')
                ->where('slider_id',$id)
                ->update(['publication_status'=>0]);
                Session::put('messege','Slider deactivated successfully!!!!');
                return Redirect::to('/admin/allslider');
                
    
    }

    public function activeslider($id){
        
                DB::table('sliders')
                ->where('slider_id',$id)
                ->update(['publication_status'=>1]);
                Session::put('messege','Sliders activated successfully!!!!');
                return Redirect::to('/admin/allslider');
                
    
    }
    public function deleteslider($id){
              
        
                $sliderinfo=DB::table('sliders')
                ->where('slider_id',$id)
                ->delete();
                
                Session::put('messege','Slider Deleted successfully!!!!');
                return Redirect::to('/admin/allslider');
                
    
    }

}
