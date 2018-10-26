<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;
use App\Models\Tags;
use App\Models\TagObj;
use App\Models\CategoryObj;
use App\Models\Categories;
use DB;
use Cookie;

class NewsController extends Controller
{
	public function indexNews() {
		$response = [];
		$news = News::where([ ['status', 1], ['is_deleted', 0] ])->orderBy('created_at', 'DESC')->limit(5)->paginate(5);
		$response['news'] = $news;
		$response['news_popular'] = News::select('news.*','categories.slug AS cate_p_slug','categories_object_news.category_id', 'categories_object_news.news_id', 'categories_object_news.category_id')
			->leftJoin('categories_object_news','categories_object_news.news_id','=','news.id')
			->leftJoin('categories','categories_object_news.category_id','=','categories.id')
			->where('categories.status',1)
			->where('categories.is_deleted',0)
	    	->where('news.is_deleted',0)
	    	->where('news.status',1)
	    	->groupBy('categories_object_news.news_id')
	    	->limit(6)->orderBy('views_count','DESC')->get();
	    $response['tags'] = Tags::all();	
		return view('news.indexNews',$response);
	}
    public function newsByCategory($slug) {
    	$category = Categories::where('slug',$slug)->where('is_deleted',0)->where('status',1)->first();

    	if (!empty($category)) {
    		$response['categories_same'] = Categories::where('parent_id',$category->id)
    										->where('is_deleted',0)->where('status',1)->get();
	    	$news = CategoryObj::select('categories_object_news.news_id','news.image','categories_object_news.news_title','news.slug AS slug','news.description','news.created_at')
	    	->leftJoin('news','categories_object_news.news_id','=','news.id')
	    	->where('categories_object_news.category_id',$category->id)
	    	->where('news.is_deleted',0)
	    	->where('status',1)
	    	->paginate(5);
	    	$response['news'] = $news;
	    	$response['category'] = $category;
	    	$response['tags'] = Tags::all();
	    	$response['news_popular'] = News::select('news.*','categories.slug AS cate_p_slug','categories_object_news.category_id', 'categories_object_news.news_id', 'categories_object_news.category_id')
			->leftJoin('categories_object_news','categories_object_news.news_id','=','news.id')
			->leftJoin('categories','categories_object_news.category_id','=','categories.id')
			->where('categories.status',1)
			->where('categories.is_deleted',0)
	    	->where('news.is_deleted',0)
	    	->where('news.status',1)
	    	->groupBy('categories_object_news.news_id')
	    	->limit(6)->orderBy('views_count','DESC')->get();
								    	// print_r($response['news_popular']); die;
    	} else return redirect('/');
							    	// print_r($response['news_popular']);die;
							    	
    	return view('news.newsCategory',$response);
    }
    
    public function detail($cate_slug,$slug, Request $request) {
    	$response = [];
    	$cookie = null;
    	// dd($request->cookie('view7'));
    	// die();
    	if ($slug != '') {
    		$new 	    = News::where('slug',$slug)->where('status',1)->where('is_deleted',0)->first();
    		$category   = Categories::where('slug',$cate_slug)->where('status',1)->where('is_deleted',0)->first();
    		$response['category'] = $category;
    		if (!empty($new) && !empty($category)) {
    			$response['new']   = $new;
    			$tags = [];
    			$cate = [];
    			$id = (int)$new->id;
    			
    			if (!$request->cookie('view'.$id, false)) {
					$cookie = Cookie::queue('view'.$id, 12321, 5);
					$new->increment('views_count');
				}// lay ra cac danh muc chua $new
				$categories_related = CategoryObj::select('categories_object_news.category_id AS category_id','categories_object_news.category_name AS category_name')
					->leftJoin('categories','categories_object_news.category_id','=','categories.id')
					->where('categories_object_news.news_id',$id)
					->where('categories.is_deleted',0)
					->where('categories.status',1)
					->groupBy('categories_object_news.category_id')->get();
					if (!empty($categories_related)) {
						$response['categories_new'] = $categories_related; 
						foreach ($categories_related as $key => $categories_s) {
			    			$cate[] = $categories_s->category_id;
			    		}
			    		// lay ra cac tin nam trong cac danh muc tren
			    		$news_same_cate = CategoryObj::select('categories_object_news.category_id','categories_object_news.news_id AS new_id','categories_object_news.news_title','news.slug AS slug_news','news.image AS image','categories.slug AS slug_cate')
			    			->leftJoin('news','categories_object_news.news_id','=','news.id')
			    			->leftJoin('categories','categories_object_news.category_id','=','categories.id')
			    			->where('categories.status',1)
    						->where('categories.is_deleted',0)
			    			->where('categories_object_news.news_id','!=',$id)
			    			->where('news.status',1)
			    			->where('news.is_deleted',0)
			    			->whereIn('categories_object_news.category_id',$cate)
			    			->groupBy('new_id')->orderBy('news.created_at','desc')->limit(5)->get();
			    			
			    		
					} else {
						$news_same_cate = CategoryObj::select('categories_object_news.category_id','categories_object_news.news_id AS new_id','categories_object_news.news_title','news.slug AS slug_news_cate','news.image AS image')
			    			->leftJoin('news','categories_object_news.news_id','=','news.id')
			    			->leftJoin('categories','categories_object_news.category_id','=','categories.id')
			    			->where('categories.status',1)
    						->where('categories.is_deleted',0)
			    			->where('news.status',1)
			    			->where('news.is_deleted',0)
			    			->whereIn('categories_object_news.category_id',$category->id)
			    			->groupBy('new_id')->orderBy('news.created_at','desc')->limit(5)->get();
					}
    			
    			// $tags_id = TagObj::select('tag_id','tag_name')->where('news_id',$id)->groupBy('tag_id')->get();
    			// foreach ($tags_id as $key => $tag) {
    			// 	$tags[] = $tag->tag_id;
    			// }
    			// $new_same_tag  = TagObj::select('tags_object_news.tag_id','tags_object_news.news_id AS new_id','tags_object_news.tag_name','tags_object_news.news_title','news.slug AS slug_news_tag')
    			// ->leftJoin('news','tags_object_news.news_id','=','news.id')
    			// ->where('tags_object_news.news_id','!=',$id)
    			// ->whereIn('tags_object_news.tag_id',$tags)
    			// ->where('news.status',1)
    			// ->where('news.is_deleted',0)
    			// ->groupBy('new_id')->get();
    			
    			// $response['new_same_tag']   = $new_same_tag;
				$response['new_same_cate']      = $news_same_cate;
    			$response['tags'] 				= TagObj::select('tag_id','tag_name')->where('news_id',$id)->groupBy('tag_id')->get();
    			$response['news_popular']   	= News::select('news.*','categories.slug AS cate_p_slug','categories_object_news.category_id')
    								->leftJoin('categories_object_news','categories_object_news.news_id','=','news.id')
    								->leftJoin('categories','categories_object_news.category_id','=','categories.id')
    								->where('categories.status',1)
    								->where('categories.is_deleted',0)
							    	->where('news.is_deleted',0)
							    	->where('news.status',1)
							    	->where('news.id','!=',$id)
							    	->groupBy('categories_object_news.news_id')
							    	->limit(6)->orderBy('views_count','DESC')->get();
    			
    			
    		} else return redirect('/');
    	
    	} else return redirect('/');
    	
    	return view('news.detail',$response);
    }

    public function newsByTag($tag) {
    	$response = [];
    	$tag = Tags::where('name', $tag)->first();

    	$response['tag'] = $tag;
    	$response['tags'] = Tags::all();
    	if(!empty($tag)) {
    		$news = News::select('news.title', 'news.image', 'news.slug', 'news.id', 'news.description', 'news.created_at')->leftJoin('tags_object_news', 'tags_object_news.news_id', '=', 'news.id')
    		->where('tags_object_news.tag_id', $tag->id)
    		->where('tags_object_news.news_id', '<>', null)
    		->where('news.status', 1)
    		->where('news.is_deleted', 0)
    		->paginate(5);
    		$response['news'] = $news;

    		$news_popular = News::select('news.*', 'categories_object_news.category_id', 'categories_object_news.category_slug AS cate_p_slug')
    		->leftJoin('categories_object_news', 'categories_object_news.news_id', '=', 'news.id')
    		->leftJoin('categories', 'categories_object_news.category_id', '=', 'categories.id')
    		->where('categories.status',1)
			->where('categories.is_deleted',0)
	    	->where('news.is_deleted',0)
	    	->where('news.status',1)
	    	->groupBy('categories_object_news.news_id')
	    	->limit(6)->orderBy('views_count','DESC')->get();
    		$response['news_popular'] = $news_popular;
    	}else return redirect('/');

    	return view('news.newsTag',$response);
    }
    public function detailNews($slug, Request $request) {
    	$response = [];
    	$cookie = null;
    	// dd($request->cookie('view7'));
    	// die();
    	if ($slug != '') {
    		$new 	    = News::where('slug',$slug)->where('status',1)->where('is_deleted',0)->first();
    		//$category   = Categories::where('slug',$cate_slug)->where('status',1)->where('is_deleted',0)->first();
    		//$response['category'] = $category;
    		if (!empty($new) ) {
    			$response['title'] = $new->title;
    			$response['new']   = $new;
    			$tags = [];
    			$cate = [];
    			$id = (int)$new->id;
    			
    			if (!$request->cookie('view'.$id, false)) {
					$cookie = Cookie::queue('view'.$id, 12321, 5);
					$new->increment('views_count');
				}
				$categories_related = CategoryObj::select('categories_object_news.category_id AS category_id','categories_object_news.category_name AS category_name')
					->leftJoin('categories','categories_object_news.category_id','=','categories.id')
					->where('categories_object_news.news_id',$id)
					->where('categories.is_deleted',0)
					->where('categories.status',1)
					->groupBy('categories_object_news.category_id')->get();
					if (!empty($categories_related)) {
						$response['categories_new'] = $categories_related;
						foreach ($categories_related as $key => $categories_s) {
			    			$cate[] = $categories_s->category_id;
			    		}
			    		$news_same_cate = CategoryObj::select('categories_object_news.category_id','categories_object_news.news_id AS new_id','categories_object_news.news_title','news.slug AS slug_news','news.image AS image','categories.slug AS slug_cate')
			    			->leftJoin('news','categories_object_news.news_id','=','news.id')
			    			->leftJoin('categories','categories_object_news.category_id','=','categories.id')
			    			->where('categories.status',1)
    						->where('categories.is_deleted',0)
			    			->where('categories_object_news.news_id','!=',$id)
			    			->where('news.status',1)
			    			->where('news.is_deleted',0)
			    			->whereIn('categories_object_news.category_id',$cate)
			    			->groupBy('new_id')->orderBy('news.created_at','desc')->limit(5)->get();
			    			
			    		
					} else {
						$news_same_cate = CategoryObj::select('categories_object_news.category_id','categories_object_news.news_id AS new_id','categories_object_news.news_title','news.slug AS slug_news_cate','news.image AS image')
			    			->leftJoin('news','categories_object_news.news_id','=','news.id')
			    			->leftJoin('categories','categories_object_news.category_id','=','categories.id')
			    			->where('categories.status',1)
    						->where('categories.is_deleted',0)
			    			->where('news.status',1)
			    			->where('news.is_deleted',0)
			    			->whereIn('categories_object_news.category_id',$category->id)
			    			->groupBy('new_id')->orderBy('news.created_at','desc')->limit(5)->get();
					}
				$response['new_same_cate'] = $news_same_cate;
    			$response['tags'] = TagObj::select('tag_id','tag_name')->where('news_id',$id)->groupBy('tag_id')->get();
    			$response['news_popular'] = News::select('news.*','categories.slug AS cate_p_slug','categories_object_news.category_id')
    								->leftJoin('categories_object_news','categories_object_news.news_id','=','news.id')
    								->leftJoin('categories','categories_object_news.category_id','=','categories.id')
    								->where('categories.status',1)
    								->where('categories.is_deleted',0)
							    	->where('news.is_deleted',0)
							    	->where('news.status',1)
							    	->where('news.id','!=',$id)
							    	->groupBy('categories_object_news.news_id')
							    	->limit(6)->orderBy('views_count','DESC')->get();
    			
    			
    		} else return redirect('/');
    	
    	} else return redirect('/');
    	
    	return view('news.detail',$response);
    }
}
