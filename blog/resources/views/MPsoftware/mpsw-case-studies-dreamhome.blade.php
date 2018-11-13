@extends('template.master')
@section('content')

<div class="mpsw-about-title bg-case-studies">
  <div class="container">
    <div class="content-page-title">
      <p class="sub-title"><a href="#">Home</a> /<a href="#">Case studies</a>  /<a href="#">{{ $case_studies2->name }}</a> </p>
      <h1 class="page-title">CASE STUDIES</h1>
    </div>
  </div>
</div>
<!-- Ms content -->
<!-- content -->
<div class="mpsw-content">
  <div class="mpsw-content-case mpsw-case-studies-crm dream-home">
    <div class="container">
      <h1 class="mpsw-heading text-center">
       {{ $case_studies2->name }}
      </h1>
      <div class="sep"></div>
      <div class="content-crm">
            <div class="content-crm content-dream-home">
              <div class="row">
                <div class="col-md-6 col-sm-6">
                  <div class="box-img-dream">
                    <img src="/uploads/images/{{ json_decode($case_studies2->images)[0] }}" alt="{{ $case_studies2->images }}">
                  </div>
                </div>
                <div class="col-md-6 col-sm-6">
                  <div class="requirement">
                    {!! $case_studies2->content !!}
                  </div>
                </div>
              </div>
            </div>
      </div>
    </div>
  </div>
</div>
@endsection
