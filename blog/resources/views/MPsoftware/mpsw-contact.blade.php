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
              <input  id="submit" value ="SEND MESSAGE" name="submit" class="btn btn-send">
            </div>
            <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
           
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<footer class="mpsw-footer">
  <div class="main-footer container">
    <div class="footer-middle">
      <div class="footer-block head-office">
        <h3 class="address-title">
          Head office
        </h3>
        <p>
          10 Floor, HH3 Building, My Dinh Me Tri,Tu Liem, Hanoi, Vietnam
        </p>
        <ul class="icon-box">
          <li><i class="fa fa-phone"></i>+84-4-35771608 ext 1801</li>
          <li><i class="fa fa-print"></i>+84-4-37878212</li>
          <li><i class="fa fa-envelope"></i>sales@mpsoftware.com.vn</li>
        </ul>
      </div>
      <div class="footer-block branch">
        <div class="adress-block">
          <h3 class="address-title">
            Branch
          </h3>
          <p>
            <strong>Da Nang:</strong> 6 Tran Phu Str, Thach Thang, Hai Chau District, Da Nang City, Vietnam
          </p>
          <p>
            <strong>Ho Chi Minh:</strong> 36-38A Tran Van Du, Ward 13, Tan Binh, Ho Chi Minh City, Vietnam
          </p>
          <p class="white-space">
            <strong>Japan:</strong> Minh Phuc Telecom Join-stock Company, Japan2F B01 Building, 13-7 ODOMIBridge, Tokyo City
          </p>
        </div>
      </div>
    </div>
  </div>
  <div class="buttom-footer">
    <div class="container">
      <div class="row">
        <div class="col-sm-6">
          <p>
            © 2018 MP Software. All rights reserved.
          </p>
        </div>
        <div class="col-sm-6 social-right text-right">
          <span>Join us on</span>
          <ul class="social-footer">
            <li><a href="javscript:void(0);"><i class="fa fa-facebook"></i></a></li>
            <li><a href="javscript:void(0);"><i class="fa fa-twitter"></i></a></li>
            <li><a href="javscript:void(0);"><i class="fa fa-google-plus"></i></a></li>
            <li><a href="javscript:void(0);"><i class="fa fa-youtube"></i></a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  
@endsection
