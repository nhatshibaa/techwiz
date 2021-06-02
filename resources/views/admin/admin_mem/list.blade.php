@extends('admin.layouts.master')
@section('content')
<!-- main content -->
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
				<li class="active">Administrator</li>
			</ol>
		</div><!--/.row-->
		<div class="row">
			<div class="col-lg-12">
				<div class="panel-heading">
					List Of Administrators
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
										<th>ID</th>
										<th>Name Admin</th>
										<th>Email</th>
										<th>Permission</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>

										<tr>
											<td>{{$data->id}} </td>
											<td>{{$data->name}} </td>
											<td>{{$data->email}}</td>
											<td>
												@if($data->level==100)
													<span style="color:#d35400;">System Management</span>
												@else
													<span style="color:#27ae60;">Administrator</span>
												@endif
											</td>
											<td>
												<a href="" title="Chi tiết">Update</a> &nbsp;

												<a href=""  title="Xóa" onclick="return confirm('Xóa danh mục này ?')">Delete</a>

											</td>
										</tr>

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
