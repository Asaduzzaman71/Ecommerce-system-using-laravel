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
						  <span class="break">Add product</span>
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
			


						<form class="form-horizontal" action="{{url('admin/saveproduct')}}" method="post" enctype="multipart/form-data">
							{{ csrf_field() }}
						  <fieldset>
						
							<div class="control-group">
							  <label class="control-label" for="date01">Product Name</label>
							  <div class="controls">
								<input type="text" class="input-xlarge" name="product_name">
							  </div>
							</div>

							<div class="control-group">
							<label class="control-label" for="selectError3">Product Category</label>
							<?php
							 $categories=DB::table('categories')
							 ->where('publication_status',1)
							 ->get();

							?>

							<div class="controls">
								  <select id="selectError3" name="category_id">
								  	 <option >Select category</option>
								  	 @foreach($categories as $category)

									<option value="{{$category->id}}">{{$category->category_name}}</option>
									@endforeach
									
									
								  </select>
								</div>
							</div>


							<div class="control-group">
							<label class="control-label" for="selectError3">Manufacture Name</label>
							<?php
							 $manufactures=DB::table('manufactures')
							 ->where('publication_status',1)
							 ->get();
							 ?>
							
							<div class="controls">
								  <select id="selectError3" name="manufacture_id">
								  	 <option>Select manufacture</option>
						   			 @foreach($manufactures as $manufacture)
						   			
									<option value="{{$manufacture->manufacture_id}}">{{$manufacture->manufacture_name}}</option>
									@endforeach
									
							
								  </select>
								</div>
							</div>

							        
						<div class="control-group hidden-phone">
							 <label class="control-label" for="textarea2">Product Short Description</label>
							  <div class="controls">
								<textarea class="cleditor" name="product_short_description" row="3">
								</textarea>
							  </div>
						</div>


						<div class="control-group hidden-phone">
							 <label class="control-label" for="textarea2">Product Long Description</label>
							  <div class="controls">
								<textarea class="cleditor" name="product_long_description" row="3">
								</textarea>
							  </div>
						</div>

						<div class="control-group">
							  <label class="control-label" for="date01">Product Price</label>
							  <div class="controls">
								<input type="text" class="input-xlarge" name="product_price">
							  </div>
						</div>

						<div class="control-group">
							  <label class="control-label" for="fileInput">Image</label>
							  <div class="controls">
								<input class="input-file uniform_on" name="product_image" id="fileInput" type="file">
							  </div>
							</div>  


						<div class="control-group">
							  <label class="control-label" for="date01">Product Size</label>
							  <div class="controls">
								<input type="text" class="input-xlarge" name="product_size">
							  </div>
						</div>


						<div class="control-group">
							  <label class="control-label" for="date01">Product Color</label>
							  <div class="controls">
								<input type="text" class="input-xlarge" name="product_color">
							  </div>
						</div>


						<div class="control-group hidden-phone">
							  <label class="control-label" for="textarea2">Publication status</label>
							  <div class="controls">
								<input type="checkbox"  name="publication_status" value="1">
							  </div>
						</div>

							<div class="form-actions">
							  <button type="submit" class="btn btn-primary">Add Product</button>
								
							</div>
						  </fieldset>
						</form>   

					</div>
				</div><!--/span-->

			</div><!--/row-->

		@endsection