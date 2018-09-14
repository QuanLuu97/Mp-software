@extends('master')

@section('content')
	<div class="col-md-7">
		<table class="table table-hover table-bordered">
			<tr>
				<th>id</th>
				<th>name</th>
				<th>address</th>
				<th>age</th>
			</tr>
			@foreach($people as $person)
				<tr>
					<td>{{ $person->id }}</td>
					<td>{{ $person->name }}</td>
					<td>{{ $person->address }}</td>
					<td>{{ $person->age }}</td>
				</tr>
			@endforeach
		</table>
		<div class="row">
			<a href="{{ route('sapxep') }}" class="btn btn-success">Sắp Xếp</a>
			<a href="{{ route('them') }}" class="btn btn-success">Thêm</a>
		</div>
	</div>
	
@endsection