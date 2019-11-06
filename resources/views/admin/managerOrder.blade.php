@extends('admin_layout')
@section('content')
		
			<ul class="breadcrumb">
				<li>
					<i class="icon-home"></i>
					<a href="index.html">Home</a> 
					<i class="icon-angle-right"></i>
				</li>
				<li><a href="#">Orders</a></li>
			</ul>

			<div class="row-fluid sortable">		
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon user"></i><span class="break"></span>Order list</h2>
						
					</div>
					<P class="alert-success">

					<?php
					$messege=Session::get('messege');
					if($messege){
						echo $messege;
						Session::put('messege',NULL);
						}
					?>	
				</P>
					<div class="box-content">
						<table class="table table-striped table-bordered bootstrap-datatable datatable">
						  <thead>
							  <tr>
								  <th>Order id</th>
								  <th>Customer name</th>
								  <th>Order Total</th>
								  <th>Status</th>
								  <th>Actions</th>
							  </tr>
						  </thead>   
						  <tbody>
						  	@foreach($orders as $order)
							<tr>
								<td>{{$order->order_id}}</td>
								<td class="center">{{$order->customer_name}}</td>
								<td class="center">{{$order->order_total}}</td>
								
								<td class="center">
									@if($order->order_status=='pending')
										<span class="label label-success">pending
										</span>
									
									@else
									<span class="label label-danger">
										Shifted
										</span>

								
								@endif
									
								</td>
							
								<td class="center">
								
									<a class="btn btn-danger" href="{{URL::to('/shifted_order/'.$order->order_id)}}">
										<i class="halflings-icon white thumbs-down"></i>  
									</a>
									
								
									


									<a class="btn btn-info" href="{{URL::to('/view_order/'.$order->order_id)}}">
										<i class="halflings-icon white edit"></i>  
									</a>
									<a class="btn btn-danger" onclick="return confirm('Are you sure to delete!')" href="{{URL::to('/delete_category/'.$order->order_id)}}">
										<i class="halflings-icon white trash"></i> 
									</a>
								</td>
							</tr>
							@endforeach
						  </tbody>
					  </table>            
					</div>
				</div><!--/span-->
			
			</div><!--/row-->
@endsection