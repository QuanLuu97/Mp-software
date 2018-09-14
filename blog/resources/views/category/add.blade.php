<!DOCTYPE html>
<html>
<head>
	<title>create</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
	<div class="col-md-12 justify-content-center row mt-5">

		<div class="col-md-6">
			@if (session('status'))
				<div class="alert alert-success">{{ session('status') }}</div>
			@endif
			<div class="card">
				<div class="card-header">Add Category</div>
				<div class="card-body">
					<form action="{{ route('storeCategory') }}" method="post" id="form-addCategory">
						<div class="form-group">
							<label for="name">name</label>
							<input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}">
							@if($errors->has('name'))
								<div class="alert alert-danger">{{ $errors->first('name') }}</div>
							@endif
						</div>
						<div class="form-group">
							<label for="check">check</label>
							<input type="text" name="check" id="check" class="form-control col-md-3" value="{{ old('check') }}">
							@if($errors->has('check'))
								<div class="alert alert-danger">{{ $errors->first('check') }}</div>
							@endif
						</div>
						<div class="form-group">
							<label for="phoneNumber">phoneNumber</label>
							<input type="text" name="phoneNumber" id="phoneNumber" class="form-control col-md-3" value="{{ old('phoneNumber') }}">
							@if($errors->has('phoneNumber'))
								<div class="alert alert-danger">{{ $errors->first('phoneNumber') }}</div>
							@endif
						</div>
						<div class="form-group col-md-6">
							<label for="categories_id">categories_id</label>
							<select id="categories_id" class="form-control" name="categories_id">
								<option value="">--Categories_id--</option>
								@foreach($categories as $category)
									<option value="{{ $category->id }}">{{ $category->name }}</option>		
								@endforeach
							</select>
						</div>
						<div class="form-group">
							<input type="submit" value="Add" class="btn btn-success">
						</div>
						{{ csrf_field() }}
					</form>
				</div>
			</div>
		</div>
	</div>
</body>
</html>