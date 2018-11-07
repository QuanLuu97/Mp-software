<!DOCTYPE html>
<html>
    <head>
        <title>Send Message </title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="{{ asset('js/jquery.validate.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/validate.js') }}"></script>
        <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
        <style>
            .error{
                color: red;
            }
        </style>
    </head>
    <body>
        <div class="col-md-12 justify-content-center row mt-5">
            <div class="col-md-6">              
                <form action=""  id="form-mess" role="form">
                    <legend>SEND MESSAGE</legend>
                
                    <div class="form-group">
                        <label for="name">name</label>
                        <input type="text" name="name" class="form-control" id="name" class="form-control" placeholder="name">
                    </div>
                    <div class="form-group">
                        <label for="email">email</label>
                        <input type="email" name="email" class="form-control" id="email" class="form-control" placeholder="email">
                    </div>
                    <div class="form-group">
                        <label for="subject">subject</label>
                        <input type="text" name="subject" class="form-control" id="subject" class="form-control" placeholder="subject">
                    </div>
                    <div class="form-group">
                        <label for="">message</label>
                        <textarea name="message" id="message" class="form-control ckeditor"></textarea>
                    </div>
                    <button id="buttonForm" class="btn btn-primary">Submit</button>
                    <input type="hidden" name="_token" id="token" value="token_csrf()">
                </form>
            </div>
        </div>
    </body>
</html>