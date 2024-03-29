@extends('admin.layouts.master')
@section('content')
<!-- main content - noi dung chinh trong chu -->
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
				<li class="active">Order details</li>
			</ol>
		</div><!--/.row-->
		<div class="row">
			<div class="col-lg-12">
				<form action="" method="POST" role="form">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
					<div class="panel panel-default">
						@if (count($errors) > 0)
						    <div class="alert alert-danger">
						        <ul>
						            @foreach ($errors->all() as $error)
						                <li>{{ $error }}</li>
						            @endforeach
						        </ul>
						    </div>
						    @elseif (Session()->has('flash_level'))
						    	<div class="alert alert-success">
							        <ul>
							            {!! Session::get('flash_massage') !!}
							        </ul>
							    </div>
						 	@elseif (Session()->has('danger'))
							    <div class="alert alert-danger">
							    	<ul>
							    		{!! Session::get('danger') !!}
							    	</ul>
							    </div>
							@endif
							<div class="table-responsive">
								<table class="table table-hover">
									<thead>
										<tr>
                                            <th> ID </th>
                                            <th> Customer's full name </th>
                                            <th> Address </th>
                                            <th> Phone </th>
                                            <th> Email </th>
                                            <th> Date set </th>
                                            <th> Total amount </th>
                                        </tr>
									</thead>
									<tbody>
										<tr>
											<td>{{$oders->id}}</td>
											<td>{{$oders->user->name}}</td>
											<td>{{$oders->user->address}}</td>
											<td>{{$oders->user->phone}}</td>
											<td>{{$oders->user->email}}</td>
											<td>{{$oders->date_order}}</td>
											<td>{{number_format($oders->total)}} USD</td>
										</tr>
									</tbody>
								</table>
							</div>
						<div class="panel-heading">
                            Product details in the order
						</div>
						<div class="panel-body" style="font-size: 12px;">
							<div class="table-responsive">
								<table class="table table-hover">
									<thead>
										<tr>
                                            <th> ID </th>
                                            <th> Image </th>
                                            <th> Product name </th>
                                            <th> Selling price </th>
                                            <th> Quantity </th>
                                            <th> Amount </th>
                                            <th> Status </th>
                                            <th> Action </th>
										</tr>
									</thead>
									<tbody>
										@foreach($data as $row)
											<tr>
												<td>{{$row->product->id}}</td>
												<td> <img src="{!!url('frontend/image/product/'.$row->product->image)!!}" alt="iphone" width="50" height="40"></td>
												<td>{{$row->product->name}}</td>
												<td>{{number_format($row->unit_price)}} USD</td>
												<td> {{$row->quantity}}</td>
												<td>{{number_format($row->unit_price * $row->quantity )}} USD</td>
												<td>
													@if($row->bill->status==0)
														<span style="color:blue;">All right</span>
													@else
														<span style="color:#27ae60;">Stocking</span>
													@endif
												</td>
												<td>
												    <a href=""  title="Xóa" onclick="return xacnhan('Delete this category ?')"><span class="glyphicon glyphicon-remove">remove</span> </a>
												</td>
											</tr>
										@endforeach
									</tbody>
								</table>
							</div>
						</div>
					</div>
					<button type="submit" onclick="return xacnhan('Xác nhận đơn hàng này ?')"  class="btn btn-danger"> Xác nhận đơn hàng </button>
				</form>
			</div>
		</div><!--/.row-->
	</div>	<!--/.main-->
<!-- =====================================main content - noi dung chinh trong chu -->
@endsection
