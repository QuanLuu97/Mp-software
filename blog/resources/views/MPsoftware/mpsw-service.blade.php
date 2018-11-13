@extends('template.master')
@section('content')
<div class="mpsw-about-title mpsw-jp-service bg-case-studies">
  <div class="container">
    <div class="content-page-title">
      <p class="sub-title"><a href="#">Home</a> / <a href="#">{{ $service->name }}</a></p>
      <h1 class="page-title">SERVICES</h1>
    </div>
  </div>
</div>
<!-- Ms content -->
<!-- content -->
<div class="mpsw-content">
  <div class="mpsw-content-case">
    <div class="container">
      <h1 class="mpsw-heading text-center">
        {{ $service->name }}
      </h1>
      <div class="sep"></div>
    </div>
  </div>
  <div class="mpsw-our-company">
    <div class="container">
      <div class="content-left col-sm-12 col-md-6 wow slideInLeft" data-wow-delay="0" style="visibility: visible; animation-name: slideInLeft;     margin-bottom: 36px">
        {!! $service->content !!}
      </div>
      
      <div class="content-right col-sm-12 col-md-6 wow fadeIn" data-wow-delay="0" style="visibility: visible; animation-name: fadeIn;">
        <img src="/uploads/images/{{ json_decode($service->images)[0] }}" alt="Services">
      </div>

    </div>
  </div>
  <div class="mpsw-service">
    <div class="container">
      <h1 class="have-bg mpsw-heading text-center">
        {{ $service->name }}
      </h1>
      <div class="sep"></div>
      <div class="list-services row">
        {!! $service->content2 !!}
      </div>
    </div>
  </div>
</div>
@endsection