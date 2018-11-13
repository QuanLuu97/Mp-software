@extends('template.master')

@section('content')
<div class="mpsw-about-title">
  <div class="container">
    <div class="content-page-title">
      <p class="sub-title"><a href="#">Home</a> / <a href="#">About Us</a></p>
      <h1 class="page-title">{{ $menu1->name }}</h1>
    </div>
  </div>
</div>
  <!-- Ms content -->
  <!-- content -->
  <div class="mpsw-content">
    <!--who are you-->
    <div class="mpsw-jp-who">
      <div class="container">
        <h1 class="mpsw-heading text-center">
          Our company
        </h1>
        <div class="sep"></div>
        <div class="box-common">
          <div class="box-left"><img src="/uploads/images/{{ json_decode($menu2->images)[0] }}" alt=""></div>
          <div class="box-right" style="color: white">
            {!! $menu2->content !!}
          </div>
        </div>
      </div>
    </div>
    <div class="mpsw-jp-people">
      <div class="container">
        <div class="content-whowa row">
          <div class="content-left col-md-6 wow fadeInUp" data-wow-delay="0.5s" style="visibility: visible; animation-delay: 0.5s; animation-name: fadeInUp;margin-bottom: 25px;">
            <h1 class="mpsw-heading">
              Our people
            </h1>
            <div class="sep sep-style2"></div>
            <div class="text-content">
              {!! $menu3->content !!}
            </div>
          </div>
        </div>
      </div>
      <div class="cover-img">
      </div>
    </div>
    <div class="mpsw-process2">
      <h1 class="mpsw-heading text-center">Our Business Process</h1>
      <div class="sep"></div>
      <div class="container">
        {!! $menu4->content !!}
      </div>
    </div>
    <ul class="list-item-img">
      @foreach(json_decode($menu1->images) as $image)
        <li><img src="/uploads/images/{{ $image }}" alt="{{ $image }}" /><div class="mark"></div></li>
      @endforeach
      
    </ul>

    <div class="modal fade modal-common" id="myModal1" role="dialog">
      <div class="cover-modal">
        <a class="left carousel-control" href="#myCarousel" data-slide="prev">
          <span class=" glyphicon-chevron-left"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#myCarousel" data-slide="next">
          <span class=" glyphicon-chevron-right"></span>
          <span class="sr-only">Next</span>
        </a>
        <div class="modal-dialog">
          <!-- Modal content-->
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <div class="modal-content">
            <div class="modal-body">
              <div id="myCarousel" class="carousel slide" data-ride="carousel" style="height: 100%">
                <!-- Indicators -->
                <!-- Wrapper for slides -->
                <div class="carousel-inner" style="height: 100%">
                  <div class="item active" >
                    <img src="dist/images/img-modal.jpg" alt="">
                  </div>

                  <div class="item">
                    <img src="dist/images/img-modal.jpg" alt="">
                  </div>
                </div>

              </div>
            </div>
          </div>
          <!-- Left and right controls -->
        </div>
      </div>

    </div>

  </div>
@endsection