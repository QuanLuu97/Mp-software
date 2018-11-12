<!DOCTYPE html>
<html>
<head>
	<title>importFile</title>
</head>
<body>
	<form action="postImport" method="post" enctype="mutilpart/form-dât">
		<label for="importFile">Upload File</label>
		<input type="file" name="importFile">
		<input type="submit" value="UpLoad">
		{{ csrf_field() }}
	</form>
</body>
</html>