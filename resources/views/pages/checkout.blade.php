@extends('layout')
@section('content')

<section id="cart_items">
		<div class="container">
			<div class="register-req">
				<p style="color:red">Please Fill up the form bellow</p>
			</div><!--/register-req-->

			<div class="shopper-informations">
				<div class="row">
					
					<div class="col-sm-12 clearfix">
						<div class="bill-to">
							<p>Shipping details</p>
							<div class="form-one">
								<form action="{{URL::to('/save_shipping_details')}}" method="post">
									{{csrf_field()}}
									<input type="text" placeholder="First Name *" name="shipping_first_name" required="">
									<input type="text" placeholder="Last Name *" name="shipping_last_name" required="">
									<input type="text" placeholder="Email *" name="shipping_email" required="">
									<input type="text" placeholder="Mobile Number *" name="shipping_mobile_number" required="">
									<input type="text" placeholder="Address *" name="shipping_address" required="">
									<input type="text" placeholder="City *" name="shipping_city" required="">
									<input type="submit" class="btn btn-default" value="submit" required="">
								</form>
							</div>
							
						</div>
					</div>
									
				</div>
			</div>
			
			</div>
			
	</section> <!--/#cart_items-->
	@endsection
