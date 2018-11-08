<!DOCTYPE html>
<html>
<head>
    <title>editForm</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <script src="{{ asset('dist/js/jquery-3.3.1.min.js') }}"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
    <div class="col-md-12 justify-content-center row mt-5">
        <div class="col-md-7">
            @if(session('status'))
                <div class="alert alert-success">{{ session('status') }}</div>
            @endif
            @if($errors->all())
                @foreach($errors->all() as $error)
                    <div class="alert alert-danger">{{ $error }}</div>
                @endforeach
            @endif
        </div>
        <div class="col-md-6">
            <form action="{{ route('update', $response['formData']->id) }}" id="form-message" method="POST" role="form">
                <div class="row">
                     <legend>Edit Message</legend>
                </div>

                <div class="form-group">
                    <div class="row">
                        <label for="name">name</label>
                        <input type="text" class="form-control" name="name" id="name" value="{{ $response['formData']->name }}" placeholder="name">
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <label for="email">email</label>
                        <input type="email" class="form-control" name="email" id="email" value="{{ $response['formData']->email }}" placeholder="email">
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <label for="subject">subject</label>
                        <input type="text" class="form-control" name="subject" id="subject" value="{{ $response['formData']->subject }}"  placeholder="subject">
                    </div>    
                </div>
                <div class="form-group">
                    <div class="row">
                        <label for="">message</label>
                    </div>
                    <div class="row">
                        <textarea name="message" class="form-control" id="message">{{ $response['formData']->message }}</textarea>
                    </div>  
                </div>
                <div class="form-group">
                    <div class="row">
                        <button type="submit" name="submit" class="btn btn-primary mr-2">Submit</button>
                        <a href="{{ route('list') }}" class="btn btn-success">cancel</a>
                    </div>
                </div>
                
                {!! csrf_field() !!}
            </form>
        </div>
    </div>
    
    <script type="text/javascript" src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.13.1/jquery.validate.min.js"></script>
    <script type="text/javascript" src="{{ asset('js/contact.js') }}"></script>
    <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
    <script> CKEDITOR.replace( 'editor1', {
        filebrowserBrowseUrl: '{{ asset('ckfinder/ckfinder.html') }}',
        filebrowserImageBrowseUrl: '{{ asset('ckfinder/ckfinder.html?type=Images') }}',
        filebrowserFlashBrowseUrl: '{{ asset('ckfinder/ckfinder.html?type=Flash') }}',
        filebrowserUploadUrl: '{{ asset('ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files') }}',
        filebrowserImageUploadUrl: '{{ asset('ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images') }}',
        filebrowserFlashUploadUrl: '{{ asset('ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash') }}'
        } ); 
    </script>
</body>
</html>