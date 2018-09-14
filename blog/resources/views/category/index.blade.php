<!DOCTYPE html>
<html>
<head>
	<title>listForms</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body> 

	<div class="col-md-12 justify-content-center row mt-5">
		<div class="col-md-7">
            @if(session('status'))
                <div class="alert alert-success">{{ session('status') }}</div>
            @endif
        </div>
		<div class="col-md-10 ">
			<h1>List Categories</h1>
			<table class="table">
				<tr>
					<th>name</th>
					<th>type</th>
					<th>edit</th>
					<th>delete</th>
				</tr>
				@foreach($categories as $category)
					<tr>
						<td>{{ $category->name }}</td>
						<td>{{ $category->catalog->name }}</td>
						<td><a href="#">edit</a></td>
						<td><a href="#">delete</a></td>
					</tr>
				@endforeach
			</table>
			<div>
				<a href="{{ route('addCategory') }}" class="btn btn-success">ADD</a>
			</div>
		</div>
		
	</div>


</body>
</html>