<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use DB;
use App\Http\Requests;
use Session;
 session_start();

class CategoryController extends Controller
{
    public function index(){
        $this->AdminAuthCheck();
    	return view('admin/addcategory');
    }

    public function allcategory(){
        $this->AdminAuthCheck();
     	$categories=DB::table('categories')->get();
    	return view('admin.allcategory')->with('categories',$categories);
    }

    public function showcategory(){

       
        return view('/layout')->with('categories',$categories);
    }
    public function savecategory(Request $request){
      	$category=array();
      	$category['category_name']=$request->category_name;
      	$category['category_description']=$request->category_description;
      	$category['publication_status']=$request->publication_status;
      	DB::table('categories')->insert($category);
      	Session::put('messege','Category inserted successfully!!!!');
    	return Redirect::to('/admin/addcategory');
    }

    public function deactivecategory($id){
    	
     			DB::table('categories')
     			->where('id',$id)
     			->update(['publication_status'=>0]);
     			Session::put('messege','Category deactivated successfully!!!!');
     			return Redirect::to('/admin/allcategory');
     			
    
    }

    public function activecategory($id){
    	
     			DB::table('categories')
     			->where('id',$id)
     			->update(['publication_status'=>1]);
     			Session::put('messege','Category activated successfully!!!!');
     			return Redirect::to('/admin/allcategory');
     			
    
    }

    public function editcategory($id){

                $this->AdminAuthCheck();
    	
     			$catinfo=DB::table('categories')
     			->where('id',$id)
     			->first();
     			return view('admin\editcategory')->with('category',$catinfo);
     			
    
    }

    public function updatecategory(Request $request,$id){
                $category=array();
                $category['category_name']=$request->category_name;
                $category['category_description']=$request->category_description;
        
                $catinfo=DB::table('categories')
                ->where('id',$id)
                ->update($category);
                
                Session::put('messege','Category updated successfully!!!!');
                return Redirect::to('/admin/allcategory');
                
    
    }

     public function deletecategory($id){
              
        
                $catinfo=DB::table('categories')
                ->where('id',$id)
                ->delete();
                
                Session::put('messege','Category Delete successfully!!!!');
                return Redirect::to('/admin/allcategory');
                
    
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
