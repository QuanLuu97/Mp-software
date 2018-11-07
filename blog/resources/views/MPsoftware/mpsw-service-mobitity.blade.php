@extends('template.master')
@section('content')

<div class="mpsw-about-title mpsw-jp-service bg-case-studies">
  <div class="container">
    <div class="content-page-title">
      <p class="sub-title"><a href="{{ route('index') }}">Home</a> / <a href="#">Services</a> / <a href="#">{{ $service2->name }}</a></p>
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
        {{ $service2->name }}
      </h1>
      <div class="sep"></div>
    </div>
  </div>
  <div class="mpsw-services-default">
    <div class="container">
      {!! $service2->content !!}
    </div>
  </div>
</div>

@endsection
