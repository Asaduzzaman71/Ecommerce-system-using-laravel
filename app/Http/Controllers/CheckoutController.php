<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use DB;
use App\Http\Requests;
use Cart;

use Session;
 session_start();

class CheckoutController extends Controller
{
    public function logincustomer(){

    	return view('pages.login');

    }

    public function customerregistration(REQUEST $request){
    	$customer=array();
    	$customer['customer_name']=$request->customer_name;
    	$customer['customer_email']=$request->customer_email;
    	$customer['customer_mobile']=$request->customer_mobile;
    	$customer['customer_password']=md5($request->customer_password);
    	$customer_id=DB::table('customers')
    				->insertGetId($customer);

       Session::put('customer_id',$customer_id);
       Session::put('customer_name',$request->customer_name);

       return Redirect('/checkout');

   

    }

    public function checkout(){
    	return view('pages.checkout');

    }
    public function saveShippingDetails(REQUEST $request){
        $shipping=array();
        $shipping['shipping_first_name']=$request->shipping_first_name ;
        $shipping['shipping_last_name']=$request->shipping_last_name ;
        $shipping['shipping_email']=$request->shipping_email ;
        $shipping['shipping_mobile_number']=$request->shipping_mobile_number;
        $shipping['shipping_address']=$request->shipping_address ;
        $shipping['shipping_city']=$request->shipping_city ;
        $shipping_id=DB::table('shippings')
                    ->insertGetId($shipping);
          Session::put('shipping_id',$shipping_id);
          return Redirect::to('/payment');


    }

    /*public function logoutcustomer($customer_id){
          session()->flash("customer_id",NULL);
          return Redirect::to('/');

    }*/
     public function logoutcustomer(){
          Session::flush();
          return Redirect::to('/');

    }
     public function payment(){
        
          return view('pages.payment');

    }

    public function checkCustomerLogin(REQUEST $request){
        $result=DB::table('customers')
            ->where('customer_email',$request->customer_email)
            ->where('customer_password',md5($request->customer_password))
            ->first();

        
        if($result){
            $customerId=$result->customer_id;
            $customerName=$result->customer_name;
            Session::put('customer_id',$customerId);
            Session::put('customer_name',$customerName);
            return Redirect::to('/checkout');
        }
        else{
             Session::put('messege','User email or password does not match');
            return Redirect::to('/login_customer');
        }

    }

    public function orderplace(REQUEST $request){
         $payment_method=$request->payment_method;
         $payment=array();
         $payment['payment_method']=$payment_method;
         $payment['payment_status']='pending';
         $payment_id=DB::table('payments')
         ->insertGetId($payment);

         $order=array();
         $order['payment_id']=$payment_id;
         $order['customer_id']=Session::get('customer_id');
         $order['shipping_id']=Session::get('shipping_id');
         $order['order_total']=Cart::total();
         $order['order_status']='pending';

         $order_id=DB::table('orders')
         ->insertGetId($order);

         $contents=Cart::content();
         $order_details=array();
         foreach($contents as $content){
            $order_details['order_id']=$order_id;
              $order_details['product_id']=$content->id;
              $order_details['product_name']=$content->name;
               $order_details['product_quantity']=$content->qty;
               $order_details['product_price']=$content->price;
               DB::table('order_details')
               ->insert($order_details);

         }

         if($payment_method=='Handcash'){
             Cart::destroy();
           return view('pages.handcash');
          
         }
         elseif($payment_method=='Card'){
            echo'successfully done by Debit card';

         }
         elseif($payment_method=='Paypal'){
            echo'successfully done by Paypal';

         }
         else{
             echo'not selected';
         }

    }

    public function manageOrder(){

        $orders=DB::table('orders')
                 ->join('customers','orders.customer_id','=','customers.customer_id')
                 ->select('orders.*','customers.customer_name')
                 ->get();
        return view('admin.managerOrder')->with('orders',$orders);

    }

    public function viewOrder($order_id){
        $order_by_id=DB::table('orders')
           ->join('customers','orders.customer_id','=','customers.customer_id')
           ->join('order_details','orders.order_id','=','order_details.order_id')
           ->join('shippings','orders.shipping_id','=','shippings.shipping_id')
           ->select('orders.*','order_details.*','customers.*','shippings.*')
           ->where('orders.order_id',$order_id)
           ->get();
        return view('admin.viewOrder')->with('order_by_id',$order_by_id);

    }
}
