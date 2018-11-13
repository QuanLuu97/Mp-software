@extends('template.master')

@section('content')

<div class="mpsw-about-title mpsw-jp-service bg-case-studies">
  <div class="container">
    <div class="content-page-title">
      <p class="sub-title"><a href="#">Home</a> / <a href="#">{{ $client->name }}</a></p>
      <h1 class="page-title">CLIENTS</h1>
    </div>
  </div>
</div>
<!-- Ms content -->
<!-- content -->
<div class="mpsw-content">
  <div class="mpsw-jp-client">
    <div class="container">
      <h1 class="mpsw-heading text-center">
        {{ $client->name }}
      </h1>
      <div class="sep"></div>
       {!! $client->description !!}

    </div>
  </div>
  <div class="mpsw-technologies clients">
    <div class="container">
      <ul class="technologies-list">
        @foreach( json_decode($client->images) as $image )
        <li>
          <a href="#">
            <img src="/uploads/images/{{ $image }}" style="width: 100px; height: 60px;"  alt="{{ $image }}">
          </a>
        </li>
        @endforeach
      </ul>
    </div>
  </div>
</div>
@endsection