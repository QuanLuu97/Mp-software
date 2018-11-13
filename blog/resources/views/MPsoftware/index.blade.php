@extends('template.master')

@section('content')
<div class="mpsw-page-title" style="background-image: url(/uploads/images/{{ json_decode($home1->images)[0]  }}) !important;">
  <div class="container">
    <div class="content-page-title" >
      <p class="sub-title">{{ $home1->title }}
      </p>
        {!! $home1->description !!}
    </div>
  </div>
</div>
  <!-- Ms content -->
  <!-- content -->
  <div class="mpsw-content">
    <!--who are you-->
    <div class="mpsw-jp-who m-b-100">
      <div class="container">
        <h1 class="mpsw-heading text-center">
          {{ $home2->title }}
        </h1>
        <div class="sep"></div>
        <div class="box-common">
          <div class="box-left"><img src="/uploads/images/{{ json_decode($home2->images)[0] }}" alt=""></div>
          <div class="box-right" style="color:white">
            {!! $home2->content !!}
          </div>
        </div>
      </div>
    </div>
    <!--Service-->
    <div class="mpsw-service" style="background-image: url(/uploads/images/{{ json_decode($home6->images)[0] }})!important;">
      <div class="container">
        <h1 class="have-bg mpsw-heading text-center">
        {{ $home6->title }}
        </h1>
        <div class="sep"></div>
        <div class="list-services row">
          {!! $home6->content !!}
        </div>
      </div>
    </div>
    <!--core-->
    <div class="mpsw-jp-core">
      <div class="container">
        <h1 class="mpsw-heading text-center">
          {{ $home3->title }}
        </h1>
        <div class="sep"></div>
        <div class="cover-txt">
          {!! $home3->description !!}
          {!! $home3->content !!}
        </div>
      </div>
    </div>
    
    <!--slider-->
    <div class="mpsw-jp-slider" style="background-color: gainsboro!important;">
      <div class="container">
        <div class="slider-jp-img">
          <div class="cover-img"><img src="/dist/images/i-slider1.png" alt=""></div>
          <div class="cover-img"><img src="/dist/images/i-slider2.png" alt=""></div>
          <div class="cover-img"><img src="/dist/images/i-slider3.png" alt=""></div>
          <div class="cover-img"><img src="/dist/images/i-slider4.png" alt=""></div>
          <div class="cover-img"><img src="/dist/images/i-slider5.png" alt=""></div>
          <div class="cover-img"><img src="/dist/images/i-slider6.png" alt=""></div>
          <div class="cover-img"><img src="/dist/images/i-slider4.png" alt=""></div>
          <div class="cover-img"><img src="/dist/images/i-slider5.png" alt=""></div>
          <div class="cover-img"><img src="/dist/images/i-slider6.png" alt=""></div>
        </div>
      </div>
    </div>
    <!--Case study-->
    <div class="mpsw-jp-case mpsw-whowa">
      <div class="container">
        <div class="content-whowa row">
          <div class="content-right col-md-6 wow pulse" data-wow-delay="0.1s" style="visibility: visible; animation-delay: 0.1s; animation-name: pulse;">
            <div class="cover-img">
              <img src="/uploads/images/{{ json_decode($home4->images)[0] }}" alt="">
            </div>
          </div>
          <div class="content-left col-md-6 wow fadeInUp" data-wow-delay="0.5s" style="visibility: visible; animation-delay: 0.5s; animation-name: fadeInUp;">
            <h1 class="mpsw-heading">
              {{ $home4->title }}
            </h1>
            <div class="sep sep-style2"></div>
            <div class="text-content">
              {!! $home4->content !!}
            </div>
          </div>
        </div>
      </div>

    </div>
    <!--News-->
    <div class="mpsw-jp-new">
      <div class="container">
        <h1 class="mpsw-heading text-center">
          {{ $home5->title }}
        </h1>
        <div class="sep"></div>
        <div class="row">
          @foreach($news as $news_item)
            <div class="item-pro col-sm-6 col-md-4">
              <a href="{{ route('detailNews', $news_item->slug) }}">
                <img src="/image/{{ $news_item->image }}" style="width: 360px;height:240px " alt="" class="thumbnail">
                <div class="new-body">
                  <small>{{ $news_item->updated_at }}</small>
                  <h4>{!! $news_item->description  !!}</h4>
                  <!-- <p>{!! $news_item->content !!}</p> -->
                </div>
              </a>
          </div> 
          @endforeach         
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
