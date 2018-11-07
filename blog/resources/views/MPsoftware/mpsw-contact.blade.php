@extends('template.master')

@section('content')
<div class="mpsw-about-title mpsw-jp-service bg-case-studies">
  <div class="container">
    <div class="content-page-title">
      <p class="sub-title"><a href="#">Home</a> / <a href="#">Contact Us</a></p>
      <h1 class="page-title">CONTACT US</h1>
    </div>
  </div>
</div>
<!-- Ms content -->
<!-- content -->
<style type="text/css">
    .error {
        color: red !important;
    }
</style>
<div class="mpsw-content">
  <div class="mpsw-jp-contact m-b-100">
    <div class="container">
        <h1 class="mpsw-heading text-center">
        Get in touch
        </h1>
      <div class="sep"></div>     
      <p class="txt-center">If you have any questions or comments, or would just like to say hello, please feel free to contact our company</p>
      <div class="col-md-10 col-md-offset-1">
          <p style="color: red" class="txt-center" id="result"></p>
      </div>
      <div class="row form-contact">
        <div class="col-md-10 col-md-offset-1">

          <form action="#" id="form-message" role="form" method="post">
            <div class="col-sm-6">
              <div class="form-group">
                <input type="text" class="form-control" id="name" name="name" placeholder="Your name...">
                <span id="name_error"></span>
              </div>
            </div>
            <div class="col-sm-6">
              <div class="form-group">
                <input type="email" class="form-control" id="email" name="email" placeholder="Your email...">
                <span id="email_error"></span>
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-group">
                <input type="text" class="form-control" id="subject" name="subject" placeholder="Your subject...">
                <span id="subject_error"></span>
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-group">
                <textarea rows="4" id="message" name="message" placeholder="Your message..."></textarea>
                <span id="message_error"></span>
              </div>
            </div>
            <div>
              <span id="submit" name="submit" class="btn btn-send">SEND MESSAGE</span> 
            </div>
            <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
           
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

  
@endsection
