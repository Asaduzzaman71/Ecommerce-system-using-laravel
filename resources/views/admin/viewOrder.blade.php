@extends('admin_layout')
@section('content')
		
			<ul class="breadcrumb">
				<li>
					<i class="icon-home"></i>
					<a href="index.html">Home</a> 
					<i class="icon-angle-right"></i>
				</li>
				<li><a href="#">View Order details</a></li>
			</ul>

			<div class="row-fluid sortable">		
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon user"></i><span class="break"></span>Customer details</h2>
						
					</div>
					
					<div class="box-content">
						<table class="table table-striped table-bordered">
						  <thead>
							  <tr>
							
								  <th>Customer name</th>
								  <th>Customer Mobile</th>
								    
							  </tr>
						  </thead>   
						  <tbody>
					
						 
							<tr>
							  	@foreach($order_by_id as $v_order)
							  	@endforeach	
								<td class="center">{{$v_order->customer_name}}</td>
								<td class="center">{{$v_order->customer_mobile}}</td>
							</tr>
						
						
						  </tbody>
					  </table>            
					</div>
				</div><!--/span-->
			
			</div><!--/row-->


			<div class="row-fluid sortable">		
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon user"></i><span class="break"></span>Shipping details</h2>
						
					</div>
					
					<div class="box-content">
						<table class="table table-striped table-bordered">
						  <thead>
							  <tr>
							
								  <th>Username</th>
								  <th>Adress</th>
								  <th>Mobile</th>
								  <th>Email</th>
								    
							  </tr>
						  </thead>   
						  <tbody>
			               	@foreach($order_by_id as $v_order)
							<tr>
									
								<td class="center">{{$v_order->shipping_first_name}}</td>
								<td class="center">{{$v_order->shipping_address}}</td>
								<td class="center">{{$v_order->shipping_mobile_number}}</td>
								<td class="center">{{$v_order->shipping_email}}</td>
									
							</tr>
							@endforeach
				
								
						  </tbody>
					  </table>            
					</div>
				</div><!--/span-->
			
			</div><!--/row-->


			<div class="row-fluid sortable">		
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon user"></i><span class="break"></span>Order details</h2>
						
					</div>
					
					<div class="box-content">
						<table class="table table-striped table-bordered">
						  <thead>
							  <tr>
							
								  <th>Order id</th>
								  <th>product name</th>
								  <th>product price</th>
								  <th>Product quantity</th>
								  <th>Product sub total</th>
								    
							  </tr>
						  </thead>   
						  <tbody>
					
						  @foreach($order_by_id as $v_order)
							<tr>
							
								<td class="center">{{$v_order->order_id}}</td>
								<td class="center">{{$v_order->product_name}}</td>
								<td class="center">{{$v_order->product_price}}</td>
								<td class="center">{{$v_order->product_quantity}}</td>
								<td class="center">{{$v_order->product_quantity*$v_order->product_price}}</td>
							</tr>
						 @endforeach
					
						
						  </tbody>
					  </table>            
					</div>
				</div><!--/span-->
			
			</div><!--/row-->



@endsection