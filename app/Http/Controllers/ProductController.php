<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use DB;
use App\Http\Requests;
use Session;
session_start();


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->AdminAuthCheck();
        return view('/admin/addproduct');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function saveproduct(Request $request)
    {
        $this->AdminAuthCheck();
        $product=array();
        $product['category_id']=$request->category_id;
        $product['manufacture_id']=$request->manufacture_id;
        $product["product_name"]=$request->product_name;
        $product["product_short_description"]=$request->product_short_description;
        $product["product_long_description"]=$request->product_long_description;
        $product["product_price"]=$request->product_price;
        $product["product_size"]=$request->product_size;
        $product["product_color"]=$request->product_color;
        $product["publication_status"]=$request->publication_status;
        $image=$request->file("product_image");
        if($image){
            $image_name=str_random(20);
            $ext=strtolower($image->getClientOriginalExtension());
            $image_full_name=$image_name.'.'.$ext;
            $upload_path='image/';
            $image_url=$upload_path.$image_full_name;
            $success=$image->move($upload_path,$image_full_name);
            if($success){
                $product['product_image']=$image_url;
                DB::table('products')->insert($product);
                Session::put('messege','Product inserted successfully!!!!');
                return Redirect::to('/admin/addproduct');
            }
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function allproduct()
    {
        $this->AdminAuthCheck();
        $products=DB::table('products')
                 ->join('categories','products.category_id','=','categories.id')
                 ->join('manufactures','products.manufacture_id','=','manufactures.manufacture_id')
                 ->select('products.*','categories.category_name','manufactures.manufacture_name')
                 ->get();
        return view('admin.allproduct')->with('products',$products);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function deleteproduct($id){
              
        
                $productinfo=DB::table('products')
                ->where('product_id',$id)
                ->delete();
                
                Session::put('messege','Product Deleteed successfully!!!!');
                return Redirect::to('/admin/allproduct');
                
    
    }

    public function deactiveproduct($id){
        
                DB::table('products')
                ->where('product_id',$id)
                ->update(['publication_status'=>0]);
                Session::put('messege','Product deactivated successfully!!!!');
                return Redirect::to('/admin/allproduct');
                
    
    }

    public function activeproduct($id){
        
                DB::table('products')
                ->where('product_id',$id)
                ->update(['publication_status'=>1]);
                Session::put('messege','Products activated successfully!!!!');
                return Redirect::to('/admin/allproduct');
                
    
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
