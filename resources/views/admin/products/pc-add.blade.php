@extends('back-end.layouts.master')
@section('content')
<!-- main content - noi dung chinh trong chu -->
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
				<li class="active">Products</li>
			</ol>
		</div><!--/.row-->

		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header"><small>Add new product: {!!$loai!!}</small></h1>
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
				    @elseif (Session()->has('flash_level'))
				    	<div class="alert alert-success">
					        <ul>
					            {!! Session::get('flash_massage') !!}
					        </ul>
					    </div>
					@endif
						<form action="" method="POST" role="form" enctype="multipart/form-data">
				      		{{ csrf_field() }}
				      		<div class="form-group">
					      		<label for="input-id">Choose a category</label>
					      		<select name="sltCate" id="inputSltCate" required class="form-control">
					      			<option value="">--Choose a brand--</option>
					      			@foreach($cat as $dt)
					      				<option value="{!!$dt->id!!}" >{!!'--|--|'.$dt->name!!}</option>
					      			@endforeach
					      		</select>
				      		</div>
				      		<div class="form-group">
				      			<label for="input-id">Product's name</label>
				      			<input type="text" name="txtname" id="inputTxtname" class="form-control" value="{{ old('txtname') }}"  >
				      		</div>
				      		<div class="form-group">
				      			<label for="input-id">Highlights</label>
				      			<input type="text" name="txtintro" id="inputTxtintro" class="form-control" value="{{ old('txtintro') }}" required="required">
				      		</div>
				      		<div class="form-group">
				      			<label for="input-id">Include : </label>
				      			<input type="text" name="txtpacket" id="inputtxtpacket" value="{{ old('txtpacket') }}" class="form-control" >
				      		</div>
				      		<div class="form-group">
				      			<label for="input-id">Discount (up to 3 items)</label>
				      			<div class="row">
					      			<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                                        promotions 1 : <input type="text" name="txtpromo1" id="inputtxtpromo1" value="{{ old('txtpromo1') }}" class="form-control" >
					      			</div>
					      			<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                                        promotions 2 : <input type="text" name="txtpromo2" id="inputtxtpromo2" value="{{ old('txtpromo2') }}" class="form-control" >
					      			</div>
					      			<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                                        promotions 3 : <input type="text" name="txtpromo3" id="inputtxtpromo3" value="{{ old('txtpromo3') }}" class="form-control" >
					      			</div>
					      		</div>
				      		</div>
				      		<div class="form-group">
				      			<div class="row">
					      			<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
					      				Image : <input type="file" name="txtimg" accept="image/png" id="inputtxtimg" value="{{ old('txtimg') }}" class="form-control" required="required">
					      			</div>
					      			<div class="col-xs-12 col-sm-2 col-md-2 col-lg-2">
					      				Price : <input type="number" name="txtprice" id="inputtxtprice" class="form-control" value="{{ old('txtprice') }}" required="required">
					      			</div>
					      			<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
					      				Tag : <input type="text" name="txttag" id="inputtag" value="{{ old('txttag') }}" class="form-control">
					      			</div>
					      		</div>
				      		</div>
				      		<div class="form-group">
				      			<label for="input-id"> Product configuration details</label>
				      			<div class="row">
				      				<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
					      				Mainboard : <input type="text" name="txtScreen" id="inputtxtscreen" value="{{ old('txtScreen') }}" class="form-control" >
					      			</div>
					      			<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
					      				Cpu : <input type="text" name="txtCpu" id="inputtxtCpu" value="{{ old('txtCpu') }}" class="form-control" >
					      			</div>

					      		</div>
					      		<div class="row">
					      			<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
					      				RAM : <input type="text" name="txtRam" id="inputtxtRam" value="{{ old('txtRam') }}" class="form-control" >
					      			</div>
					      			<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
					      				VGA : <input type="text" name="txtVga" id="inputtxtVga" value="{{ old('txtVga') }}" class="form-control">
					      			</div>
					      		</div>
					      		<div class="row">
					      			<div class="col-xs-12 col-sm-3 col-md-4 col-lg-4">
                                        Storage (HDD) : <input type="text" name="txtStorage" id="inputtxtStorage" value="{{ old('txtStorage') }}" class="form-control" >
					      			</div>
					      			<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                                        FAN - Heat dissipation <input type="text" name="txtCam1" id="inputtxtCam1" value="{{ old('txtCam1') }}" class="form-control" >
					      			</div>
					      			<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                                        Source (PSU) <input type="text" name="txtCam2" id="inputtxtCam2" value="{{ old('txtCam2') }}" class="form-control" >
					      			</div>
					      		</div>
					      		<div class="row">
					      			<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                        Connect : <input type="text" name="txtConnect" id="inputtxtConnect" value="{{ old('txtConnect') }}" class="form-control">
					      			</div>
					      			<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
					      				CASE : <input type="text" name="txtCase" id="inputtxtCase" value="{{ old('txtCase') }}" class="form-control" >
					      			</div>
					      			<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
                                        Operating system : <input type="text" name="txtOs" id="inputtxtOs" value="{{ old('txtOs') }}" class="form-control" >
					      			</div>
					      		</div>
				      		</div>
				      		<div class="form-group">
				      			<label for="input-id">Detailed product reviews</label>
				      			<div class="row">
					      			@for( $i=1; $i<=12; $i++)
					      			<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
					      				Hình ảnh {!!$i!!} : <input type="file" name="txtdetail_img[]" value="{{ old('txtdetail_img[]') }}" accept="image/png" id="inputtxtdetail_img" class="form-control">
					      			</div>
					      			@endfor
					      		</div>
				      		</div>
				      		<div class="form-group">
				      			<label for="input-id">Detailed product reviews</label>
				      			<div class="row">
					      			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
					      				<label for="input-id">Summary review</label>
					      				<textarea name="txtre_Intro" id="inputTxtre_Intro" class="form-control" value="{{ old('txtre_Intro') }}" rows="2" required="required"></textarea>
					      				<script type="text/javascript">
											var editor = CKEDITOR.replace('txtre_Intro',{
												language:'vi',
												filebrowserImageBrowseUrl : '../../plugin/ckfinder/ckfinder.html?Type=Images',
												filebrowserFlashBrowseUrl : '../../plugin/ckfinder/ckfinder.html?Type=Flash',
												filebrowserImageUploadUrl : '../../plugin/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
												filebrowserFlashUploadUrl : '../../plugin/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash',
											});
										</script>
					      			</div>
					      			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
					      				<label for="input-id">Detailed reviews</label>
					      				<textarea name="txtReview" id="inputtxtReview" class="form-control" rows="4" value="{{ old('txtReview') }}" required="required"></textarea>
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

				      		<input type="submit" name="btnCateAdd" class="btn btn-primary" value="Add Product" class="button" />
				      	</form>
					</div>
				</div>
			</div>
		</div><!--/.row-->
	</div>	<!--/.main-->
<!-- =====================================main content - noi dung chinh trong chu -->
@endsection
