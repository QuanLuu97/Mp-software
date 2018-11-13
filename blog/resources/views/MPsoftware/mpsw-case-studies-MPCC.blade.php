@extends('template.master')
@section('content')

<div class="mpsw-about-title bg-case-studies">
  <div class="container">
    <div class="content-page-title">
      <p class="sub-title"><a href="#">Home</a> / <a href="#">Case studies</a> / <a href="#">{{ $case_studies3->name }}</a></p>
      <h1 class="page-title">CASE STUDIES</h1>
    </div>
  </div>
</div>
<!-- Ms content -->
<!-- content -->
<div class="mpsw-content">
  <div class="mpsw-content-case mpsw-case-studies-crm mpcc">
    <div class="container">
      <h1 class="mpsw-heading text-center">
        {{ $case_studies3->name }}
      </h1>
      <div class="sep"></div>
          <div class="content-crm">
            <div class="row">
              {!! $case_studies3->content !!}
            </div>
          </div>

    </div>
  </div>
</div>

@endsection
