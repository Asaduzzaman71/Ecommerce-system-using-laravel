<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;

class HomeController extends Controller
{
    public function home(){


        $products=DB::table('products')
                 ->join('categories','products.category_id','=','categories.id')
                 ->join('manufactures','products.manufacture_id','=','manufactures.manufacture_id')
                 ->select('products.*','categories.category_name','manufactures.manufacture_name')
                 ->where('products.publication_status',1)
                 ->limit(6)
                 ->get();
       
    	return view('pages.index')->with('products',$products);
    }


    public function show_products_by_category($id){
        $products_by_category=DB::table('products')
        ->join('categories','products.category_id','=','categories.id')
        ->select('products.*','categories.category_name')
        ->where('products.category_id',$id)
        ->where('products.publication_status',1)
        ->limit(6)
        ->get();

        return view('pages.product_by_category')->with('products',$products_by_category);
    }

     public function show_products_by_manufacture($id){
        $products_by_manufacture=DB::table('products')
        ->join('manufactures','products.manufacture_id','=','manufactures.manufacture_id')
        ->select('products.*','manufactures.manufacture_name')
        ->where('products.manufacture_id',$id)
        ->where('products.publication_status',1)
        ->limit(6)
        ->get();

        return view('pages.product_by_manufacture')->with('products',$products_by_manufacture);
    }

    public function productdetails($id){


        $product=DB::table('products')
                 ->join('categories','products.category_id','=','categories.id')
                 ->join('manufactures','products.manufacture_id','=','manufactures.manufacture_id')
                 ->select('products.*','categories.category_name','manufactures.manufacture_name')
                 ->where('products.product_id',$id)
                 ->where('products.publication_status',1)
                 ->first();
       
        return view('pages.product_details')->with('product',$product);
    }


}
