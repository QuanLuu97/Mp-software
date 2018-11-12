<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>ImportFile</title>
</head>
<body>
    <form action="{{ route('postImport') }}" enctype="multipart/form-data" method="POST">
        {{ csrf_field() }}
        <input type="text" name="a" id="a">
        <input type="file" name="filesTest" required="true" multiple="multiple">
        <br/>
        <input type="submit" value="upload">
    </form>
</body>
</html>