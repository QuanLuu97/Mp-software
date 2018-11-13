@extends('template.master')
@section('content')

<div class="mpsw-about-title bg-case-studies">
  <div class="container">
    <div class="content-page-title">
      <p class="sub-title"><a href="#">Home</a> / <a href="#">Case studies</a> / <a href="#">{{ $case_studies4->name }}</a></p>
      <h1 class="page-title">CASE STUDIES</h1>
    </div>
  </div>
</div>
<!-- Ms content -->
<!-- content -->
<div class="mpsw-content">
  <div class="mpsw-content-case mpsw-case-studies-crm schoollink">
    <div class="container">
      <h1 class="mpsw-heading text-center">
       {{ $case_studies4->name }}
      </h1>
      <div class="sep"></div>
          <div class="content-crm">
            <div class="row">
              <div class="col-md-6">
                {!! $case_studies4->content !!}
              </div>
              <div class="col-md-6">
                <div class="box-img-crm">
                  <img src="/uploads/images/{{ json_decode($case_studies4->images)[0] }}" >
                </div>
              </div>
            </div>
          </div>

    </div>
  </div>
</div>
@endsection
