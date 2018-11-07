@extends('template.master')
@section('content')

<div class="mpsw-about-title bg-case-studies">
  <div class="container">
    <div class="content-page-title">
      <p class="sub-title"><a href="{{ route('index') }}">Home</a> /<a href="#"> Case studies</a> / <a href="#">{{ $case_studies6->name }}</a></p>
      <h1 class="page-title">CASE STUDIES</h1>
    </div>
  </div>
</div>
<!-- Ms content -->
<!-- content -->
<div class="mpsw-content">
  <div class="mpsw-content-case mpsw-case-studies-crm procurement">
    <div class="container">
      <h1 class="mpsw-heading text-center">
        {{ $case_studies6->name }}
      </h1>
      <div class="sep"></div>
          <div class="content-crm content-dream-home">
            <div class="row">
              <div class="col-md-5 col-sm-5">
                <div class="box-img-pro">
                  <img src="/uploads/images/{{ json_decode($case_studies6->images)[0] }}">
                </div>
              </div>
              <div class="col-md-7 col-sm-7">
                {!! $case_studies6->content !!}
              </div>
            </div>
          </div>

    </div>
  </div>
</div>
@endsection
