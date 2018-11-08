<?php

namespace App\Http\Controllers\frontEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\News;
use App\Models\Tags;
use App\Models\TagObj;
use App\Models\CategoryObj;
use App\Models\Categories;
use App\Models\Menu;
use DB;
use Cookie;

class NewsController extends Controller
{
	//
	public function indexNews() {
		$response = [];
		// cac menu con cua service
    	$service = Menu::findOrFail(18);
		$response['services'] = $service->menus;
		//menu con case-study
        $case_study = Menu::findOrFail(27);
        $response['case_studies'] = $case_study->menus;

		$news = News::where([ ['status', 1], ['is_deleted', 0] ])->orderBy('created_at', 'DESC')->limit(5)->paginate(5);
		$response['news'] = $news;
		$response['news_popular'] = News::select('news.*','categories.slug AS cate_p_slug','categories_object_news.category_id', 'categories_object_news.news_id', 'categories_object_news.category_id')
			->leftJoin('categories_object_news','categories_object_news.news_id','=','news.id')
			->leftJoin('categories','categories_object_news.category_id','=','categories.id')
			->where('categories.status',1)
			->where('categories.is_deleted',0)
			->where('categories.type', 'news')
	    	->where('news.is_deleted',0)
	    	->where('news.status',1)
	    	->groupBy('categories_object_news.news_id')
	    	->limit(6)->orderBy('views_count','DESC')->get();
	    $response['tags'] = Tags::all();	
	    $response['categories_same'] = Categories::where([ ['parent_id', 0], ['status', 1], ['is_deleted', 0], ['type', 'news'] ])->get();
		return view('MPsoftware.news.indexNews',$response);
	}
    public function newsByCategory($slug) {
    	// cac menu con cua service
    	$service = Menu::findOrFail(18);
		$response['services'] = $service->menus;
		//menu con case-study
        $case_study = Menu::findOrFail(27);
        $response['case_studies'] = $case_study->menus;
    	$category = Categories::where('slug',$slug)->where('is_deleted',0)->where('status',1)->where('type', 'news')->first();

    	if (!empty($category)) {

    		//bai toán đầu vào là id của category cha
    		//result là id của tất cả các category là con của nó
    		$categories_id = []; //khoi tao mang
    		$i = 0;
    		function list_id (&$categories_id, $id, $i) {
    			array_push($categories_id, $id);
    			$cates = Categories::where([ ['parent_id', $id], ['status', 1], ['is_deleted', 0] ])->get();
    			if (!empty($cates)) {
    				foreach ($cates as $cate) {
    					list_id($categories_id, $cate->id, $i);
    				}
    			}
    		}   		
    		list_id($categories_id, $category->id, $i);
    		

    		$categories_same = Categories::where('parent_id',$category->id)->where('type', 'news')
    										->where('is_deleted',0)->where('status',1)->get();
    		$response['categories_same'] = $categories_same;
    		
    		
	    	$news = CategoryObj::select('categories_object_news.news_id','news.image','categories_object_news.news_title','news.slug AS slug','news.description','news.created_at')
	    	->leftJoin('news','categories_object_news.news_id','=', 'news.id')
	    	->whereIn('categories_object_news.category_id', $categories_id)
	    	->where('news.is_deleted',0)
	    	->where('status',1)
	    	->distinct() // cac bản tin không trùng lặp nhau
	    	->paginate(5);

	    	$response['news'] = $news;
	    	$response['category'] = $category;
	    	$response['tags'] = Tags::all();
	    	$response['news_popular'] = News::select('news.*','categories.slug AS cate_p_slug','categories_object_news.category_id', 'categories_object_news.news_id', 'categories_object_news.category_id')
			->leftJoin('categories_object_news','categories_object_news.news_id','=','news.id')
			->leftJoin('categories','categories_object_news.category_id','=','categories.id')
			->where('categories.status',1)
			->where('categories.is_deleted',0)
			->where('categories.type', 'news')
	    	->where('news.is_deleted',0)
	    	->where('news.status',1)
	    	->groupBy('categories_object_news.news_id')
	    	->limit(6)->orderBy('views_count','DESC')->get();
								    	// print_r($response['news_popular']); die;
								    	 
    	} else return redirect('/');
							    	// print_r($response['news_popular']);die;
							    	
    	return view('MPsoftware.news.newsCategory',$response);
    }
    
    public function detail($cate_slug,$slug, Request $request) {
    	$response = [];
    	// cac menu con cua service
    	$service = Menu::findOrFail(18);
		$response['services'] = $service->menus;
		//menu con case-study
        $case_study = Menu::findOrFail(27);
        $response['case_studies'] = $case_study->menus;
    	$cookie = null;
    	if ($slug != '') {
    		$new 	    = News::where('slug',$slug)->where('status',1)->where('is_deleted',0)->first();
    		$category   = Categories::where('slug',$cate_slug)->where('status',1)->where('is_deleted',0)->where('type', 'news')->first();
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
					->where('categories.type', 'news')
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
    						->where('categories.type', 'news')
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
    						->where('categories.type', 'news')
			    			->where('news.status',1)
			    			->where('news.is_deleted',0)
			    			->whereIn('categories_object_news.category_id',$category->id)
			    			->groupBy('new_id')->orderBy('news.created_at','desc')->limit(5)->get();
					}
				$response['new_same_cate']      = $news_same_cate;
    			$response['tags'] 				= TagObj::select('tag_id','tag_name')->where('news_id',$id)->groupBy('tag_id')->get();
    			$response['news_popular']   	= News::select('news.*','categories.slug AS cate_p_slug','categories_object_news.category_id')
    								->leftJoin('categories_object_news','categories_object_news.news_id','=','news.id')
    								->leftJoin('categories','categories_object_news.category_id','=','categories.id')
    								->where('categories.status',1)
    								->where('categories.is_deleted',0)
    								->where('categories.type', 'news')
							    	->where('news.is_deleted',0)
							    	->where('news.status',1)
							    	->where('news.id','!=',$id)
							    	->groupBy('categories_object_news.news_id')
							    	->limit(6)->orderBy('views_count','DESC')->get();
    			
    			
    		} else return redirect('/');
    	
    	} else return redirect('/');
    	
    	return view('MPsoftware.news.detail',$response);
    }

    public function newsByTag($tag) {
    	$response = [];
    	// cac menu con cua service
    	$service = Menu::findOrFail(18);
    	//menu con case-study
        $case_study = Menu::findOrFail(27);
        $response['case_studies'] = $case_study->menus;
		$response['services'] = $service->menus;
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
			->where('categories.type', 'news')
	    	->where('news.is_deleted',0)
	    	->where('news.status',1)
	    	->groupBy('categories_object_news.news_id')
	    	->limit(6)->orderBy('views_count','DESC')->get();
    		$response['news_popular'] = $news_popular;
    	}else return redirect('/');

    	return view('MPsoftware.news.newsTag',$response);
    }
    public function detailNews($slug, Request $request) {
    	$response = [];
    	// cac menu con cua service
    	$service = Menu::findOrFail(18);
		$response['services'] = $service->menus;
		//menu con case-study
        $case_study = Menu::findOrFail(27);
        $response['case_studies'] = $case_study->menus;
    	$cookie = null;
    	if ($slug != '') {
    		$new 	    = News::where('slug',$slug)->where('status',1)->where('is_deleted',0)->first();
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
				$categories_related = CategoryObj::select('categories_object_news.category_id AS category_id','categories_object_news.category_name AS category_name', 'categories.slug')
					->leftJoin('categories','categories_object_news.category_id','=','categories.id')
					->where('categories_object_news.news_id',$id)
					->where('categories.is_deleted',0)
					->where('categories.status',1)
					->where('categories.type', 'news')
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
    						->where('categories.type', 'news')
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
    						->where('categories.type', 'news')
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
    								->where('categories.type', 'news')
							    	->where('news.is_deleted',0)
							    	->where('news.status',1)
							    	->where('news.id','!=',$id)
							    	->groupBy('categories_object_news.news_id')
							    	->limit(6)->orderBy('views_count','DESC')->get();
    			
    			
    		} else return redirect('/');
    	
    	} else return redirect('/');
    	
    	return view('MPsoftware.news.detail',$response);
    }
}
