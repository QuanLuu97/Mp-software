<header class="mpsw-jp-header mpsw-header" style="top: 0px;">
  <div class="container">
    <nav class="navbar navbar-default mpsw-nav">
      <div class="navbar-header">
        <button type="button" data-target="#navbarCollapse" data-toggle="collapse" class="navbar-toggle collapsed"
                aria-expanded="false">
          <div class="toggle-icon"> <span></span></div>
        </button>
        <a href="http://mpsoftware.com.vn" class="navbar-brand"><img
                src=" http://mpsoftware.com.vn/public/uploads/images/2018/04/19/d29f0a1e64cf359a8f1a251a3805a50d.png"
                alt="brand logo"></a>
      </div>
      <div id="navbarCollapse" class="navbar-collapse collapse" aria-expanded="false" style="height: 1px;">
        <ul class="nav navbar-nav navbar-right navbar-main">
          <li><a href="{{ route('index') }}"> HOME</a></li>
          <li class="has-child "><a href="{{ route('about') }}">ABOUT US </a></li>
          <li class="has-child"><a href="{{ route('service') }}">SERVICES<span class="btn-submenu"><i class="fa fa-angle-down" aria-hidden="true"></i></span></a>
            <ul class="sub-menu">
              <li><a href="#">Our company</a></li>
              <li><a href="#"> Our people </a></li>
              <li><a href="#"> Our business process</a></li>
              <li><a href="#"> Our Activities</a></li>
            </ul>
          </li>
          <li class="has-child"><a href="{{ route('case_studies') }}">CASE STUDIES<span class="btn-submenu"><i class="fa fa-angle-down" aria-hidden="true"></i></span></a>
            <ul class="sub-menu">
              <li><a href="#">Our company</a></li>
              <li><a href="#"> Our people </a></li>
              <li><a href="#"> Our business process</a></li>
              <li><a href="#"> Our Activities</a></li>
            </ul>
          </li>
          <li><a href="{{ route('client') }}"> CLIENTS</a></li>
          <li><a href="{{ route('news') }}">NEWS</a></li>
          <li><a href="{{ route('contact') }}"> CONTACT US </a></li>
        </ul>
      </div>
    </nav>
  </div>
</header>
<style type="text/css">
  .pagination>li.active>span {
    color: white !important;
    margin-top:0px !important;
    padding: 10px 20px !important;
    background-color: #ff9801 !important;
    border-color: #ff9801 !important;
  }
  body .mpsw-new .new-left span {
    margin-top: 0px !important;
    padding: 10px 20px !important;
  }
</style>