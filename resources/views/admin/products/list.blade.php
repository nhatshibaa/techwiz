@extends('admin.layouts.master')
@section('content')
<!-- main content - noi dung chinh trong chu -->
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
				<li class="active">Product</li>
			</ol>
		</div><!--/.row-->
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading">
						<div class="row">
							<div class="col-md-10"><div class="form-group">
								<label for="inputLoai" class="col-sm-3 control-label"><strong> List of products </strong></label>
								<div class="col-md-6">
									<select name="sltCate" id="inputLoai" class="form-control">
						      			<option value="0">- Select products by category --</option>

						      		</select>
									<script>
									    document.getElementById("inputLoai").onchange = function() {
									        if (this.selectedIndex!==0) {
									            window.location.href = this.value;
									        }
									    };
									</script>
								</div>
								<div class="col-md-3">
									<input type="search" name="txttk" id="inputTxttk" class="form-control" value="" placeholder="Search..." required="required" title="">
								</div>
							</div>


							</div>
							<div class="col-md-2">

									<a href="{{route('add.product')}}" title=""><button type="button" class="btn btn-primary pull-right">Add Product</button></a>

							</div>
						</div>

					</div>
					@if (count($errors) > 0)
					    <div class="alert alert-danger">
					        <ul>
					            @foreach ($errors->all() as $error)
					                <li>{{ $error }}</li>
					            @endforeach
					        </ul>
					    </div>
					    @elseif (Session()->has('success'))
					    	<div class="alert alert-success">
						        <ul>
						            {!! Session::get('success') !!}
						        </ul>
						    </div>
						@endif
					<div class="panel-body" style="font-size: 12px;">
						<div class="table-responsive">
							<table class="table table-hover">
								<thead>
									<tr>
                                        <th> # </th>
                                        <th> Image </th>
                                        <th> Product name </th>
                                        <th> Function Summary </th>
                                        <th> Trademarks </th>
                                        <th> Selling price </th>
                                        <th> Status </th>
                                        <th> Action </th>
									</tr>
								</thead>
								<tbody>
									@foreach($product as $pr)
										<tr>
											<td>{{$pr->id}}</td>
											<td> <img src="{!!url('frontend/image/product/'.$pr->image)!!}" alt="" width="50" height="40"></td>
											<td>{{$pr->name}}</td>
											<td>{{$pr->description}}</td>
											<td></td>
											<td>{{number_format($pr->unit_price)}} USD</td>
											<td>
												@if($pr->status !=0)
													<span style="color:blue;">Stocking</span>
												@else
                                                    Temporarily out of stock
												@endif
											</td>
											<td>
											    <a href="{{route('edit.product',$pr->id)}}" title="Sửa"><span class="glyphicon glyphicon-edit">edit</span> </a>
											    <a href="{{route('delete.product',$pr->id)}}"  title="Xóa" onclick="return xacnhan('Delete this category ?')"><span class="glyphicon glyphicon-remove">remove</span> </a>
											</td>
										</tr>
									@endforeach
								</tbody>P


							</table>
							<div class="row">{{$product->links()}}</div>
						</div>
					</div>
				</div>
			</div>
		</div><!--/.row-->
	</div>	<!--/.main-->
<!-- =====================================main content - noi dung chinh trong chu -->
@endsection
