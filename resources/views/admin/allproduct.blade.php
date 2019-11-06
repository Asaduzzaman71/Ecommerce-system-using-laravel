@extends('admin_layout')
@section('content')
		
			<ul class="breadcrumb">
				<li>
					<i class="icon-home"></i>
					<a href="index.html">Home</a> 
					<i class="icon-angle-right"></i>
				</li>
				<li><a href="#">Tables</a></li>
			</ul>

			<div class="row-fluid sortable">		
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon user"></i><span class="break"></span>Category list</h2>
						
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
								  <th>Product id</th>
								  <th>Product name</th>
								  <th>Product image</th>
								  <th>Product price</th>
								  <th>Category </th>
								  <th>Manufacture</th>
								  <th>Status</th>
								  <th>Action</th>

							  </tr>
						  </thead>   
						  <tbody>
						  	@foreach($products as $product)
							<tr>
								<td>{{$product->product_id}}</td>
								<td class="center">{{$product->product_name}}</td>
								<td><img src="{{URL::to($product->product_image)}}"  height="82" width="82"></td>
								<td class="center">{{$product->product_price}}</td>
								<td class="center">{{$product->category_name}}</td>
								<td class="center">{{$product->manufacture_name}}</td>
								
								<td class="center">
									@if($product->publication_status==1)
										<span class="label label-success">Active
										</span>
									
									@else
									<span class="label label-danger">
										Deactive
										</span>

								
								@endif
									
								</td>
								<td class="center">
									@if($product->publication_status==1)
									<a class="btn btn-danger" href="{{URL::to('/deactive_product/'.$product->product_id)}}">
										<i class="halflings-icon white thumbs-down"></i>  
									</a>
									
									@else
									<a class="btn btn-success" href="{{URL::to('/active_product/'.$product->product_id)}}">
										<i class="halflings-icon white thumbs-up"></i>  
									</a>
								
									@endif


									<a class="btn btn-info" href="{{URL::to('/edit_product/'.$product->product_id)}}">
										<i class="halflings-icon white edit"></i>  
									</a>
									<a class="btn btn-danger" onclick="return confirm('Are you sure to delete!')" href="{{URL::to('/delete_product/'.$product->product_id)}}">
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