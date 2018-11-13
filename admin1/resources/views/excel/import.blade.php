<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>import</title>
</head>
<body>
	<h1>List table from Excel</h1>
	<table>
		@foreach($results as $result) 
			<tr>
				<td>{{ $result->a }}</td>
				<td>{{ $result->b }}</td>
				<td>{{ $result->c }}</td>
				<td>{{ $result->d }}</td>
			</tr>
		@endforeach 
	</table>
</body>
</html>