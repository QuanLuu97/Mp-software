@extends('template.master')
@section('content')
<div class="mpsw-about-title mpsw-jp-service bg-case-studies">
  <div class="container">
    <div class="content-page-title">
      <p class="sub-title"><a href="{{ route('index') }}">Home</a> / <a href="#">Services</a> / <a href="#">{{ $service4->name }}</a>  </p>
      <h1 class="page-title">SERVICES</h1>
    </div>
  </div>
</div>
<!-- Ms content -->
<!-- content -->
<div class="mpsw-content">
  <div class="mpsw-content-case">
    <h1 class="mpsw-heading text-center">
      {{ $service4->name }}
    </h1>
    {!! $service4->content !!}
  </div>
</div>
@endsection
