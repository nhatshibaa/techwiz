@extends('layout.master')

@section('content')
	<div class="inner-header">
		<div class="container">

			<div class="pull-left">
				<div class="beta-breadcrumb">
					<a href="{{route('home')}}">Home Page</a> / <span>Order</span>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
	@if(Session::has('success'))
	<div class="aler alert-success">
		{{Session::get('success')}}
	</div>
	@endif
	<div class="container">

		<div id="content">

			@if(Session::has('flag'))
			<div class="aler alert-danger">
				{{Session::get('flag')}}
			</div>
			@endif
			<form action="{{route('post.checkout')}}" method="post" class="beta-form-checkout">
				@csrf
				<div class="row">
					<div class="col-sm-6">
						<h4>Order</h4>
						<div class="space20">&nbsp;</div>

						<div class="form-block">
							<label for="name">Full Name*</label>
							<input type="text" name="fullname" id="name" placeholder="fullname" required value="{{get_data_user('web','name')}}">
						</div>
						<div class="form-block">
							<label>Gender </label>
							<input id="gender" type="radio" class="input-radio" name="gender" value="nam" checked="checked" style="width: 10%"><span style="margin-right: 10%">male</span>
							<input id="gender" type="radio" class="input-radio" name="gender" value="nữ" style="width: 10%"><span>Female</span>

						</div>

						<div class="form-block">
							<label for="email">Email*</label>
							<input type="email" name="email" id="email" required placeholder="expample@gmail.com" value="{{get_data_user('web','email')}}">
						</div>

						<div class="form-block">
							<label for="adress">Address*</label>
							<input type="text" name="address" id="adress"value="{{get_data_user('web','address')}}"  placeholder="address" required>
						</div>


						<div class="form-block">
							<label for="phone">Phone*</label>
							<input type="text" value="{{get_data_user('web','phone')}}" name="phone" id="phone" required placeholder="Phone">
						</div>

						<div class="form-block">
							<label for="notes">Notes</label>
							<textarea id="notes" name="notes" placeholder="Import..."></textarea>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="your-order">
							<div class="your-order-head"><h5>Your order</h5></div>
							<div class="your-order-body" style="padding: 0px 10px">
								<!-- {{dump(get_data_user('web','name'))}} -->
								<div class="your-order-item">
									@foreach($products as $pr)
									<div>
									<!--  one item	 -->


										<div class="media">
											<img width="25%" src="frontend/image/product/{{$pr->options->image}}" alt="" width="250px" height="150px" class="pull-left">
											<div class="media-body">
												<p class="font-large">{{$pr->name}}</p>
												<span class="color-gray your-order-info">Color: Red</span>
												<span class="color-gray your-order-info">Amount: {{$pr->qty}}</span>
											</div>
										</div>

									<!-- end one item -->
									</div>
									<div class="clearfix"></div>
									@endforeach
								</div>
								<div class="your-order-item">
									<div class="pull-left"><p class="your-order-f18">Total money:</p></div>
									<div class="pull-right"><h5 class="color-black">{{Cart::subtotal()}}</h5></div>
									<div class="clearfix"></div>
								</div>
							</div>
							<div class="your-order-head"><h5>Payments</h5></div>

							<div class="your-order-body">
								<ul class="payment_methods methods">
									<li class="payment_method_bacs">
										<input id="payment_method_bacs" type="radio" class="input-radio" name="payment_method" value="COD" checked="checked" data-order_button_text="">
										<label for="payment_method_bacs">Payment on delivery </label>
										<div class="payment_box payment_method_bacs" style="display: block;">
                                            The store will send the goods to your address, you check the goods and pay the delivery staff
										</div>
									</li>

									<li class="payment_method_cheque">
										<input id="payment_method_cheque" type="radio" class="input-radio" name="payment_method" value="ATM" data-order_button_text="">
										<label for="payment_method_cheque">Transfer </label>
										<div class="payment_box payment_method_cheque" style="display: none;">
                                            Transfer money to the following account:
											<br>- Account number: 100868352899.
											<br>- Account bank: TRAN ANH DUC.
											<br>- Vietinbank.
										</div>
									</li>

								</ul>
							</div>

							<div class="text-center"><button type="submit" class="beta-btn primary" href="#" >Order <i class="fa fa-chevron-right"></i></button>
						</div> <!-- .your-order -->
					</div>
				</div>
			</form>
		</div> <!-- #content -->
	</div> <!-- .container -->
@endsection

@section('script')
<script type="text/javascript" src="js/jquery.colorbox-min.js"></script>
<script type="text/javascript" src="js/dug.js"></script>
<script type="text/javascript" src="js/scripts.min.js"></script>
@endsection
