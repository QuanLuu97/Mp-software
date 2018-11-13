<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>upload</title>
</head>
<body>
	<form action="import" method="post" enctype="multipart/form-data">
		<label for="upload" >upload</label>
		<input type="file" name="upload">
		<input type="submit" name="" value="submit">
		{{ csrf_field() }}
	</form>
</body>
</html>