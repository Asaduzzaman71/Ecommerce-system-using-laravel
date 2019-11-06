@extends('admin_layout')
@section('content')

			
			
			<ul class="breadcrumb">
				<li>
					<i class="icon-home"></i>
					<a href="index.html">Home</a>
					<i class="icon-angle-right"></i> 
				</li>
				<li>
					<i class="icon-edit"></i>
					<a href="#">Forms</a>
				</li>
			</ul>
			
			<div class="row-fluid sortable">
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2>
						  <i class="halflings-icon edit"></i>
						  <span class="break">Edit manufacture</span>
					    </h2>
						
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
			
						<form class="form-horizontal" action="{{url('update_manufacture',$manufacture->manufacture_id)}}" method="post">
							{{ csrf_field() }}
						  <fieldset>
						
							<div class="control-group">
							  <label class="control-label" for="date01">Manufacture Name</label>
							  <div class="controls">
								<input type="text" class="input-xlarge" name="manufacture_name" value="{{$manufacture->manufacture_name}}">
							  </div>
							</div>

							        
							<div class="control-group hidden-phone">
							  <label class="control-label"  for="textarea2">Manufacture Description</label>
							  <div class="controls">
								<textarea  class="cleditor"  name="manufacture_description" row="3">
									{{$manufacture->manufacture_description}}
								</textarea>
							  </div>
							</div>

							

							<div class="form-actions">
							  <button type="submit" class="btn btn-primary">Update manufacture</button>
								
							</div>
						  </fieldset>
						</form>   

					</div>
				</div><!--/span-->

			</div><!--/row-->

		@endsection