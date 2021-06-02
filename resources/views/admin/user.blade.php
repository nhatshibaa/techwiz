@extends('back-end.layouts.master')

@section('content')
	<div class="table-responsive">
		<table class="table table-bordered table-hover text-center">
			<thead>
				<tr>
					<th colspan="2">Staff information</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>Full name</td>
					<td>{!!Auth::guard('admin')->user()->name !!}</td>
				</tr>
				<tr>
					<td>E-mail</td>
					<td>{!!Auth::guard('admin')->user()->email !!}</td>
				</tr>
				<tr>
					<td>Permission</td>
					<td>{!!Auth::guard('admin')->user()->level !!}</td>
				</tr>
				<tr>
					<td>Registration Date</td>
					<td>{!!Auth::guard('admin')->user()->created_at !!}</td>
				</tr>
			</tbody>
		</table>
	</div>
@endsection
