<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>MP Software</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="{{ asset('dist/css/bootstrap.min.css') }}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('dist/css/font-awesome.min.css') }}">
  <!-- Owl carousel -->
  <link rel="stylesheet" href="{{ asset('dist/css/owl.carousel.min.css') }}">
  <!-- Custom style -->
  <link rel="stylesheet" href="{{ asset('dist/css/animate.css') }}">
  <link rel="stylesheet" href="{{ asset('dist/css/slick.css') }}">
  <link rel="stylesheet" href="{{ asset('dist/css/slick-theme.css') }}">
  <!-- Custom style -->
  <link rel="stylesheet" href="{{ asset('dist/css/style.css') }}">
  <!-- Responsive style -->
  <link rel="stylesheet" href="{{ asset('dist/css/responsive.css') }}">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> 
</head>
<body>
  @include('template.header')

  @yield('content')

  @include('template.footer')

<script type="text/javascript" src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.13.1/jquery.validate.min.js"></script>
<script src="{{ asset('dist/js/slick.js') }}" type="text/javascript"></script>
<script src="{{ asset('dist/js/owl.carousel.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('dist/js/wow.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('dist/js/main.js') }}" type="text/javascript"></script>
<script type="text/javascript" src="{{ asset('js/contact.js') }}"></script>

<script>
    $(document).ready(function(){
        $(".navbar-toggle").click(function(){
            $(this).toggleClass("active");
        });
    });
</script>
</body>
</html>
