@extends('admin.layouts.master')
@section('content')
<!-- main content - noi dung chinh trong chu -->
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
				<li class="active">Customer</li>
			</ol>
		</div><!--/.row-->
		<div class="row">
			<div class="col-lg-12">
				<div class="panel-heading">
                    List of customers
				</div>
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
						@endif
					<div class="panel-body" style="font-size: 13px;">
						<div class="table-responsive">
							<table class="table table-hover">
								<thead>
									<tr>
                                        <th> ID </th>
                                        <th> Client name </th>
                                        <th> Address </th>
                                        <th> Phone </th>
                                        <th> Email </th>
                                        <th> Date of registration </th>
                                        <th> Status </th>
                                        <th> Action </th>
									</tr>
								</thead>
								<tbody>
									@foreach($users as $user)
										<tr>
											<td>{{$user->id}}</td>
											<td>{{$user->name}} </td>
											<td>{{$user->address}} </td>
											<td>{{$user->phone}} </td>
											<td>{{$user->email}} </td>
											<td></td>
											<td>
												@if($user->email_verified_at == Null)
													<span style="color:#d35400;">Unconfimred</span>
												@else
													<span style="color:#27ae60;">Confirmed</span>
												@endif
											</td>
											<td>
											    <a href="" title="Chi tiết">Update</a> &nbsp;
											    <a href=""  title="Xóa" onclick="return xacnhan('Delete this category ?')">Delete</a>
											</td>
										</tr>
									@endforeach
								</tbody>
							</table>
						</div>

					</div>
				</div>
			</div>
		</div><!--/.row-->
	</div>	<!--/.main-->
<!-- =====================================main content - noi dung chinh trong chu -->
@endsection
