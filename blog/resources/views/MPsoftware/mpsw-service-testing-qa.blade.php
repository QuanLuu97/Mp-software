@extends('template.master')
@section('content')

<div class="mpsw-about-title mpsw-jp-service bg-case-studies">
  <div class="container">
    <div class="content-page-title">
      <p class="sub-title"><a href="#">Home</a> / <a href="#">{{ $service1->name }}</a></p>
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
        {{ $service1->name }}
      </h1>
      <div class="sep"></div>
      <div class="mpsw-services-default">
          {!! $service1->content !!}
      </div>
    </div>
  </div>
</div>
@endsection
