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
				<h1 class="page-header"><small>Add product: </small></h1>
			</div>
		</div><!--/.row-->
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-body" style="background-color: #ecf0f1; color:#27ae60;">
					@if (count($errors) > 0)
				    	<div class="alert alert-danger">
					        <ul>
					            @foreach ($errors->all() as $error)
					                <li>{{ $error }}</li>
					            @endforeach
					        </ul>
				    </div>
				    @elseif (Session::has('success'))
				    	<div class="alert alert-success">
					        <ul>
					           {{Session::get('success')}}
					        </ul>
					    </div>
					@endif
					@if (Session::has('danger'))
				    	<div class="alert alert-danger">
					        <ul>
					           {{Session::get('danger')}}
					        </ul>
					    </div>
					@endif
						<form action="" method="POST" role="form" enctype="multipart/form-data">
				      		@csrf
				      		<div class="form-group">
					      		<label for="input-id">Choose a categoryc</label>
					      		<select name="cate" id="cate" required class="form-control">

					      			@foreach($cate as $ct)
					      				<option value="{{$ct->id}}" >{{$ct->name}}</option>
					      			@endforeach
					      		</select>
				      		</div>
				      		<div class="form-group">
					      		<label for="input-id">ID Category</label>
					      		<select name="soidtu" id="soidtu" required class="form-control">

					      			@foreach($cate as $ct)
					      				<option value="{{$ct->id}}" >{{$ct->id}}</option>
					      			@endforeach
					      		</select>
				      		</div>
				      		<div class="form-group">
				      			<label for="input-id">Product Name</label>
				      			<input type="text" name="name" id="inputTxtname" class="form-control" value=""  >
				      		</div>



				      		<div class="form-group">
				      			<div class="row">
					      			<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
					      				Hình ảnh : <input type="file" name="image"  value="" class="form-control" required="required">
					      			</div>
					      			<div class="col-xs-12 col-sm-2 col-md-2 col-lg-2">
					      				Giá bán : <input type="number" name="unit_price" id="inputtxtprice" class="form-control" value="" required="required">
					      			</div>
					      			<div class="col-xs-12 col-sm-2 col-md-2 col-lg-2">
					      				Giá khuyễn mãi : <input type="number" name="promo_price" id="inputtag" value="" class="form-control">
					      			</div>
					      		</div>
				      		</div>

				      		<div class="form-group">
				      			<div class="row">

					      			<div class="col-xs-12 col-sm-2 col-md-2 col-lg-4">
					      				Sản phẩm mới :
					      				<select name="new" id="inputSltCate" required class="form-control">
                                            <option value = ""> - Select the Product Type- </option>
                                            <option value = "1"> New product </option>
                                            <option value = "0"> Common products </option>

					      				</select>
					      			</div>
					      			<div class="col-xs-12 col-sm-2 col-md-2 col-lg-4">
					      				Sản phẩm Hot :
					      				<select name="hot" id="inputSltCate" required class="form-control">
                                            <option value = ""> - Select-- </option>
                                            <option value = "1"> Hot products </option>
                                            <option value = "0"> Common products </option>

					      				</select>

					      			</div>
					      		</div>
				      		</div>
				      		<div class="form-group">
				      			<div class="row">

					      			<div class="col-xs-12 col-sm-2 col-md-2 col-lg-4">
					      				Trạng thái :
					      				<select name="status" id="inputSltCate" required class="form-control">
                                            <option value = ""> - Select Status- </option>
                                            <option value = "1"> In Stock </option>
                                            <option value = "0"> The row has been temporarily out </option>

					      				</select>
					      			</div>

					      		</div>
				      		</div>

				      		<div class="form-group">
				      			<label for="input-id">Detailed product reviews</label>
				      			<div class="row">
					      			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
					      				<label for="input-id">Detailed reviews</label>
					      				<textarea name="txtReview" id="inputtxtReview" class="form-control" rows="4" value="" required="required"></textarea>
					      				<script type="text/javascript">
											var editor = CKEDITOR.replace('txtReview',{
												language:'vi',
												filebrowserImageBrowseUrl : '../../plugin/ckfinder/ckfinder.html?Type=Images',
												filebrowserFlashBrowseUrl : '../../plugin/ckfinder/ckfinder.html?Type=Flash',
												filebrowserImageUploadUrl : '../../plugin/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
												filebrowserFlashUploadUrl : '../../plugin/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash',
											});
										</script>
					      			</div>
					      		</div>
				      		</div>

				      		<input type="submit" name="btnCateAdd" class="btn btn-primary" value="Add product" class="button" />
				      	</form>
					</div>
				</div>
			</div>
		</div><!--/.row-->
	</div>	<!--/.main-->
<!-- =====================================main content - noi dung chinh trong chu -->
@endsection

@section('script')
	<script>
		$(document).ready(function(){

			$("#cate").change(function(){
				var iddanhmuc= $(this).val();
				alert(iddanhmuc);
				$.get("admin/ajax/soidtu/"+iddanhmuc,function(data){
					alert(data);
					/*$("#type").html(data);*/
				});
			});
		});
	</script>
@endsection
