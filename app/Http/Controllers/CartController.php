<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use DB;
use Cart;

class CartController extends Controller
{
    public function addtocart(Request $request){
    	$qty=$request->quantity;
    	$product=DB::table('products')
    	         ->where('product_id',$request->product_id)
    	         ->first();
    	$cart_data=array();
    	$cart_data['qty']=$qty;
    	$cart_data['id']=$product->product_id;
    	$cart_data['name']=$product->product_name;
    	$cart_data['price']=$product->product_price;
    	$cart_data['options']['image']=$product->product_image;
    	Cart::add($cart_data);
    	return Redirect::to('/show_cart_items');



    }

    public function showcart(){
    	$categories=DB::table('categories')
    				->where('publication_status',1)
    				->get();
    	return view('pages/add_to_cart')->with('categories',$categories);


    }

    public function deletecart($rowId){
    	Cart::update($rowId,0);
    	return Redirect::to('/show_cart_items');

    }

     public function updatecart(REQUEST $request){
     	$qty=$request->qty;
     	$rowId=$request->rowId;
    	Cart::update($rowId,$qty);
    	return Redirect::to('/show_cart_items');

    }
}
