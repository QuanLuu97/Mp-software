@extends('template.master')

@section('content')
<div class="mpsw-about-title bg-case-studies">
  <div class="container">
    <div class="content-page-title">
      <p class="sub-title"><a href="#">Home</a> / <a href="#">{{ $case_study->name }}</a></p>
      <h1 class="page-title">CASE STUDIES</h1>
    </div>
  </div>
</div>
  <!-- Ms content -->
  <!-- content -->
  <div class="mpsw-content">
    <div class="mpsw-content-case">
      <div class="container">
        <h1 class="mpsw-heading text-center">
         {{ $case_study->name }}
        </h1>
        <div class="sep"></div>
        {!! $case_study->description !!}
        <div class="mpsw-case-studies">
          <div class="container">
            <ul class="list-case">
              @foreach($case_studies as $case_study)
                <li>
                <div class="cover-case">
                  <div class="content-text">
                    <h2 class="case-title">
                      <a href="{{ route('case_studies/item', $case_study->slug) }}">{{ $case_study->name }}</a>
                    </h2>
                    {!! $case_study->description !!}
                  </div>
                  <div class="content-img">
                    <a href="{{ route('case_studies/item', $case_study->slug) }}">
                      <img src="/uploads/images/{{ json_decode($case_study->images)[0] }}" style="width: 360px; height: 222px;" alt="crm">
                    </a>
                  </div>
                  <div class="content-button">
                    <a href="{{ route('case_studies/item', $case_study->slug) }}" class="read-more">
                      Read more
                    </a>
                  </div>
                </div>
              </li>
              @endforeach
              
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
