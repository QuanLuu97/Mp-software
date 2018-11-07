@extends('template.master')

@section('content')
<div class="mpsw-about-title mpsw-jp-service bg-case-studies">
  <div class="container">
    <div class="content-page-title">
      <p class="sub-title"><a href="{{ route('index') }}">Home</a> / <a href="{{ route('news') }}">News</a></p>
      <h1 class="page-title">NEWS</h1>
    </div>
  </div>
</div>
<!-- Ms content -->
<!-- content -->
<div class="mpsw-content">
  <div class="mpsw-new m-b-100">
    <div class="container">
      <h1 class="mpsw-heading">Bài Viết mới nhất</h1>
      <div class="sep sep-style2"></div>
      <div class="row">
        <div class="col-md-8 new-left">
          @if (isset($news))
            @foreach ($news as $key => $new)
              <div class="content-new">
                <h3 class="txt-first">{{$new->title}}</h3>
                <span>{{(!empty($new->created_at)) ? date('d/m/Y', strtotime($new->created_at)) : ''}}</span>
                <div class="cover-img"><img src="/image/{{$new->image}}" alt="image"></div>
                {!!$new->description!!}
                <a title="{{$new->news_title}}" href="/news/{{$new->slug}}.html" style="color: white;"><button class="btn btn-read-more">
                READ MORE</button></a>
              </div>
              <hr>
            @endforeach
          @endif
          
          <div class="cover-paging">
            {!!  $news->appends(Request::all())->links() !!}
            
          </div>
        </div>
        <div class="col-md-4 new-right">
          <form action="#" class="search-new">
            <input type="text" placeholder="Enter Keywords" name="search">
            <button type="submit" class="btn btn-search-new"></button>
          </form>
          <h3>CATEGORIES</h3>
          <ul class="new-list">
            @if (isset($categories_same))
              @if (!empty($categories_same))
                @foreach ($categories_same as $cate)
                  <a href="/news/category/{{$cate->slug}}.html"><li>{{$cate->name}}</li></a>
                @endforeach
              @endif
            @endif
          </ul>
          <h3 class="m-t-45">POPULAR POSTS</h3>
          @if(isset($news_popular))
            @if (!empty($news_popular))
            <ul class="new-list">
              @foreach($news_popular as $new_s => $newss)
                <div class="list-bv">
                  <div class="cover-img"><img src="/image/{{$newss->image}}" alt="">
                  </div>
                  <div class="content-img">
                    <a href="/news/{{$newss->cate_p_slug.'/'.$newss->slug}}"><p>{{$newss->title}}</p></a>
                    <span>{!! ($newss->created_at != '') ? date('d/m/Y',strtotime($newss->created_at)) : '' !!}</span>
                  </div>
                </div>
              @endforeach
            </ul>
            @endif
          @endif
          <h3>TAGS</h3>
          <div class="new-tag">
            @foreach($tags as $tag)
                <a href="/news/tags/{{ $tag->name }}" class="btn">{{ $tag->name }}</a>
            @endforeach
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection