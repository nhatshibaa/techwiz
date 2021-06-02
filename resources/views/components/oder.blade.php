@if($oders)
<table class="table table-hover">
	<thead>
		<tr>
			<th>ID</th>
			<th>Image</th>
			<th>Name product</th>
			<th>Price</th>
			<th>Amount</th>
			<th>Total price</th>
			<th>Action</th>
		</tr>
	</thead>
	<tbody>
		<?php $i=1  ?>
		@foreach($oders as $key=> $oder)
		<tr>
			<td>#{{$i}}</td>
			<td> <img src="{!!url('uploads/products/'.$row->images)!!}" alt="iphone" width="50" height="40"></td>
			<td>{!!$oder->name!!}</td>
			<td></td>
			<td> </td>
			<td> USD</td>
			<td>
				<a href=""  title="Xóa" onclick="return xacnhan('Delete category ?')"><span class="glyphicon glyphicon-remove">remove</span> </a>
			</td>
		</tr>
		@endforeach

	</tbody>
</table>
@endif
