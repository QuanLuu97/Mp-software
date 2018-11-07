<!DOCTYPE html>
<html>
<head>
	<title>listcontacts</title>
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
			<h1>List message Contact</h1>
			<table class="table">
				<tr>
					<th>name</th>
					<th>email</th>
					<th>subject</th>
					<th>message</th>
					<th>edit</th>
					<th>delete</th>
				</tr>
				@foreach($contacts as $contact)
					<tr>
						<td>{{ $contact->name }}</td>
						<td>{{ $contact->email }}</td>
						<td>{{ $contact->subject }}</td>
						<td>{{ $contact->message }}</td>
						<td><a href="{{ route('edit', $contact->id) }}">edit</a></td>
						<td><a href="{{ route('delete', $contact->id) }}">delete</a></td>
					</tr>
				@endforeach
			</table>
			<div>
				<a href="{{ route('contact') }}" class="btn btn-success">ADD</a>
			</div>
		</div>
		
	</div>


</body>
</html>