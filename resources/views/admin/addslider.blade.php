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
						  <span class="break">Add slider</span>
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
			


					<form class="form-horizontal" action="{{url('admin/saveslider')}}" method="post" enctype="multipart/form-data">
							{{ csrf_field() }}
					 <fieldset>
						
						<div class="control-group">
							  <label class="control-label" for="fileInput">Slider Image
							  </label>
							  <div class="controls">
								<input class="input-file uniform_on" name="slider_image" id="fileInput" type="file">
							  </div>
							</div>  



						<div class="control-group hidden-phone">
							  <label class="control-label" for="textarea2">Publication status</label>
							  <div class="controls">
								<input type="checkbox"  name="publication_status" value="1">
							  </div>
						</div>

							<div class="form-actions">
							  <button type="submit" class="btn btn-primary">Add Slider</button>
								
							</div>
						  </fieldset>
					</form>   

				</div>
				</div><!--/span-->

			</div><!--/row-->

		@endsection