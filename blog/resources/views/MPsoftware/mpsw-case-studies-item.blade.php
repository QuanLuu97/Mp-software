@extends('template.master')
@section('content')

<div class="mpsw-about-title bg-case-studies">
  <div class="container">
    <div class="content-page-title">
      <p class="sub-title"><a href="#">Home</a> /<a href="#">Case studies</a>  /<a href="#">{{ $case_study_item->name }}</a> </p>
      <h1 class="page-title">CASE STUDIES</h1>
    </div>
  </div>
</div>
<!-- Ms content -->
<!-- content -->
<div class="mpsw-content">
  <div class="mpsw-content-case mpsw-case-studies-crm">
    <div class="container">
      <h1 class="mpsw-heading text-center">
       {{ $case_study_item->name }}
      </h1>
      <div class="sep"></div>
      <div class="content-crm">
        <div class="row">
          @if ($case_study_item->slug != 'mpcc')
          <div class="col-md-6 col-sm-6">
            {!! $case_study_item->content !!}
          </div>
          <div class="col-md-6 col-sm-6">
            <div class="box-img-crm">
              <img src="/uploads/images/{{ json_decode($case_study_item->images)[0] }}">
            </div>
          </div>
          @endif
          @if($case_study_item->slug == 'mpcc')  
            {!! $case_study_item->content !!}
          @endif
        </div>
      </div>
    </div>
  </div>
</div>

@endsection
