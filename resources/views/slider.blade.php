<section id="slider"><!--slider-->
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<div id="slider-carousel" class="carousel slide" data-ride="carousel">
						<ol class="carousel-indicators">
							<li data-target="#slider-carousel" data-slide-to="0" class="active"></li>
							<li data-target="#slider-carousel" data-slide-to="1"></li>
							<li data-target="#slider-carousel" data-slide-to="2"></li>
						</ol>
						
						<div class="carousel-inner">
								<?php
									 $sliders=DB::table('sliders')
			 						 ->where('publication_status',1)
									 ->get();
									 $flag=1;
										 foreach($sliders as $slider ){
										 if($flag==1){
							   				?>
							   				<div class="item active">
							   				<?php } else{?>
							   				<div class="item">
							   			    <?php }?>
											
										<div class="col-sm-8">
											<img src="{{URL::to($slider->slider_image)}}" class="girl img-responsive" alt="" />
										</div>
							</div>
						<?php  $flag++;} ?>
							
							
							
						</div>
						
						<a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
							<i class="fa fa-angle-left"></i>
						</a>
						<a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
							<i class="fa fa-angle-right"></i>
						</a>
					</div>
					
				</div>
			</div>
		</div>
	</section><!--/slider-->
	