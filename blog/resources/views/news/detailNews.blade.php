@extends('template.master')

@section('content')

<div class="mpsw-about-title mpsw-jp-service bg-case-studies">
  <div class="container">
    <div class="content-page-title">
      <p class="sub-title"><a>Home</a> / <a>News</a></p>
      <h1 class="page-title">NEWS</h1>
    </div>
  </div>
</div>
<!-- Ms content -->
<!-- content -->
<div class="mpsw-content">
  <div class="mpsw-new m-b-100">
    <div class="container">
      <h1 class="mpsw-heading">News</h1>
      <div class="sep sep-style2"></div>
      <div class="row">
        <div class="col-md-8 new-left">
          @if (isset($new))
            @if (!empty($new))
                <div class="content-new">
                  <h3 class="txt-first">{{$new->title}}</h3>
                  <span>{{ ($new->created_at != '') ? date('d/m/Y',strtotime($new->created_at)) : '' }}</span>
                  <div class="cover-img"><img src="http://admin.m/image/{{$new->image}}" alt="image"></div>
                  {!!$new->content!!}
                </div>
            @endif
          @endif 
          <div class="share">
            <div class="social-right text-right">
              <span>Chia sẻ:</span>
              <ul class="social-footer">
                <li><span>1</span><a href="javscript:void(0);"><i class="fa fa-facebook"></i></a> </li>
                <li><span>0</span><a href="javscript:void(0);"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
                <li><span>0</span><a href="javscript:void(0);"><i class="fa fa-twitter"></i></a></li>
                <li><span>0</span><a href="javscript:void(0);">in</a></li>
              </ul>
            </div>
          </div>
        </div>
        <div class="col-md-4 new-right">
          <form action="#" class="search-new">
            <input type="text" placeholder="Enter Keywords" name="search">
            <button type="submit" class="btn btn-search-new"></button>
          </form>
          <h3>CATEGORIES</h3>
          @if(isset($categories_new))
            @if (!empty($categories_new))
            <ul class="new-list">

              @foreach($categories_new as $cat => $cate)
                <li><a href="/news/category/{{ $cate->slug }}"><?php echo $cate->category_name; ?></a></li>
              @endforeach
            </ul>
            @endif
          @endif
          <h3 class="m-t-45">RELATED POSTS</h3>
          @if(isset($new_same_cate))
            @if (!empty($new_same_cate))
            <ul class="new-list">
              @foreach($new_same_cate as $news => $new_cate)
                <div class="list-bv">
                  <div class="cover-img"><img src="http://admin.m/image/{{$new_cate->image}}" alt="">
                  </div>
                  <div class="content-img">
                    <p></p><a href="/news/{{$new_cate->slug_cate.'/'.$new_cate->slug_news}}"><p>{{$new_cate->news_title}}</p></a>
                    <span>{!! ($new_cate->created_at != '') ? date('d/m/Y',strtotime($new_cate->created_at)) : '' !!}</span>
                  </div>
                </div>
              @endforeach
            </ul>
            @endif
          @endif
          <h3 class="m-t-45">POPULAR POSTS</h3>
          @if(isset($news_popular))
            @if (!empty($news_popular))
            <ul class="new-list">
              @foreach($news_popular as $new_s => $newss)
                <div class="list-bv">
                  <div class="cover-img"><img src="http://admin.m/image/{{$newss->image}}" alt="">
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
            @if (isset($tags))
              @if(!empty($tags))
                @foreach ($tags as $tags => $tag)
                  <a href="/news/tags/{{ $tag->name }}" class="btn">{{ $tag->tag_name }}</a>
                @endforeach
              @endif
            @endif
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
