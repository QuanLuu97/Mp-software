<?php

namespace App\Http\Controllers\backEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\News;
use App\Models\Tags;
use App\Models\TagObj;
use Validator;
use App\Models\Categories;
use App\Models\CategoryObj;
use Carbon\Carbon;

class AdminController extends Controller
{   
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function home() {

        return view('index');
    }

    public function index(){
    	$newss = News::all();
    	$categories = Categories::all();
    	return view('news.index', compact('newss','categories'));
    	// $cat = CategoryObj::select('categories_id')->where('news_id',2)->get();  	
    	// $categories = Categories::whereIn('id',$cat)->get();
    	// foreach ($categories as $categories) {
    	// 	echo $categories->name.'<br>';
    	// }
    }

    public function add() {
    	$categories = Categories::all();
    	$tags = Tags::all();
    	return view('news.add', compact('categories', 'tags'));
    }

    public function store(Request $request) {
    	$title = $request->input('title');
    	// lay ra mang các id của categories
    	$categories_id = explode(",", $request->input('categories_id'));
    	// lay ra cac mang tag
    	$listTags = explode(",", $request->input('tag'));
    	$content = $request->input('content');
    	$description = $request->input('description');
    	if($request->input('status') == 'false'){
			$status = 0;
		}
		else{
			$status = 1;
		}
    	$validate = Validator::make( //validate cac truong khac image
    		$request->all(),
    		[
    			'title' => 'required|min:5',
    			'description' => 'required',
    			'content' => 'required'
    			// 'date' => 'required|date'
    		],
    		[
    			'required' => 'không được để trống',
    			'min' => '5 kí tự trở lên'
    			// 'date' => 'sai định dạng ngày'
    		]
		);
    	if(!$validate->fails()) { //neu k loi thi tao ban ghi voi image = null
    		//kiem tra title co bi lap
    		if(News::where('title', $title)->first() != null){
    			return response()->json([
    				'code' => 403,
    				'msg' => 'title bị trùng lặp! Mời nhập title mới'
    			]);
	    	}
    		$arr = [
	    		'title' => $title,
	    		'description' => $description,
	    		'content' => $content,
	    		'status' => $status,
                'created_at' => Carbon::now()
		    	// 'date' => $date
	    	];
	    	$id = News::insertGetId($arr);

	    	$news = News::findOrFail($id);
            $slug = preg_replace('/[!@#$%^&*()?]/', '', $title);
	    	$news->update([
	    		'slug' => str_replace(' ', '-', $slug)
	    	]);
	    	if($request->hasFile('image')) {//neu co file anh thi validate
	    		$image = $request->file('image');
    			$imageName = str_random(10) . '_' . $image->getClientOriginalName(); 	    		
	    		$validate = Validator::make(
		    		$request->all(),
		    		[
		    			'image' => 'image|max:20000',
		    		],
		    		[
		    			'image' => 'không đúng định dạng',
		    			'max' => 'kích thước quá cho phép',
		    		]
	    		);
	    		if(!$validate->fails()) {//neu k loi thi update image tu null sang image
	    			$image->move('image',$imageName); // luu anh vao image thu muc public
		    		$news->update([
		    			'image' => $imageName
		    		]);
		    	}
		    	else{//neu loi thi return
		    		return response()->json([
		    			'code' => 404,
		    			'msg' => 'ảnh k đúng định dạng'
		    		]);
		    	}
	    	}
	    	//tao ban ghi CategoryObj
  			foreach ($categories_id as $category_id) {
                $slug_category = str_replace(' ', '-', preg_replace('/[!@#$%^&*()]/', '', Categories::findOrFail($category_id)->name));
				CategoryObj::insert([
					'category_id' => $category_id,
					'category_name' => Categories::findOrFail($category_id)->name,
                    'category_slug' => $slug_category,
					'news_id' => $news->id,
					'news_title' => $news->title,
                    'news_slug' => $news->slug
				]);		
  			}
  			//tao ban ghi news_tag
  			foreach($listTags as $item) {
  				if($item == 'null') break;
  				$tag = Tags::where('id', $item)->first(); // kiem tra xem tag da co trong db chưa
  				if($tag == null){// nếu chưa
  					$tag_id = Tags::insertGetId([//thi them vao db
  						'name' => $item
  					]);
  					$tag = Tags::findOrFail($tag_id);
  				}	
  				if( $tag->id > 0) {
  					TagObj::insert([
	  					'news_id' => $news->id,
	  					'tag_id' => $tag->id,
	  					'news_title' => $news->title,
	  					'tag_name' => $tag->name
	  				]);
  				}
  				
  			}
    		return response()->json([
    			'code' => 200,
    			'msg' => 'thêm thành công'
    		]);
    	}
    	else {
    		return response()->json([
    			'code' => 404,
    			'msg' => $validate->errors()->first()
    		]);
    	}    	
    }

    public function getData(Request $request) {
    	if ($request->id > 0) {
    		$news = News::where('id', $request->input('id'))->first();
    		$category_id = CategoryObj::select('category_id')->where('news_id', $news->id)->get();
    		if (!empty($news)) {
	    		return response()->json([
		    		'code' => 202,
		    		'data' => $news,
		    		'data2' => $category_id
		    	]);
	    	}
    	}
    	
    	return response()->json([
    		'code' => 404,
    		'data' => null
    	]);
    }
    
    public function edit($id) {

    	$news = News::findOrFail($id);
    	$cat_news = $news->cat_news;
    	//$news_tags = TagObj::where('news_id', $news->id)->get();
		$news_tags = $news->news_tag;
    	$categories = Categories::all();
    	$tags = Tags::all();

    	return view('news.edit', compact('news', 'categories', 'cat_news', 'tags', 'news_tags'));
    }

    public function update(Request $request, $id) {

    	$news = News::findOrFail($id);
    	$content = $request->input('content');
    	$description = $request->input('description');
    	$categories_id = explode(",", $request->input('categories_id')); // lay ra mang cac categories của news

    	$listTags = explode(",", $request->input('tag'));
    	$st = $request->input('status');
    	if($request->input('status') == 'false'){
			$status = 0;
		}
		else{
			$status = 1;
		}
    	// $date = $request->input('date');
    	$title = $request->input('title');
    	$validate = Validator::make(
    		$request->all(),
    		[
    			'title' => 'required|min:5',
    			'content' => 'required|min:5',
    			'description' => 'required'
    			// 'date' => 'required|date'
    		],
    		[
    			'description.required' => 'không được để trống',
    			'title.min' => '5 kí tự trở lên'
    			// 'date' => 'sai định dạng ngày'
    		]
    	);
    	if($validate->fails()) {
    		
    		return response()->json([
    			'code' => 404,
    			'msg' => $validate->errors()->first()
    		]);
    	}
    	else { 	
    			if(News::where([ ['title', $title], ['id', '<>', $id] ])->first() != null){
	    			return response()->json([
	    				'code' => 403,
	    				'msg' => 'title bị trùng lặp! Mời nhập title mới'
	    			]);
		    	}
		    	
    	  		// update ban ghi
    	  		$slug = preg_replace('/[!@#$%^&*()?]/', '', $title);
    	  		
		    	$news->update([
		    		'title' => $title,
		    		'description' => $description,
		    		'content' => $content,
		    		'slug' => str_replace(' ', '-', $slug),
		    		'status' => $status,
                    'updated_at' => Carbon::now()
			    	// 'date' => $date
		    	]);

		    	if($request->hasFile('image')){
    				$image = $request->file('image');
    				$imageName = str_random(10) . '_' . $image->getClientOriginalName();  
    				$validate = Validator::make(
			    		$request->all(),
			    		[	    			
			    			'image' => 'image|max:1048576',
			    		],
			    		[
			    			'image' => 'không đúng định dạng',
			    			'max' => 'kích thước quá cho phép',
			    		]
			    	);
			    	if($validate->fails()) {		
			    		return response()->json([
			    			'code' => 404,
			    			'msg' => $validate->errors()->first()
			    		]);
			    	}
			    	else {
			    		if (file_exists('image/'.$news->image) && $news->image != null){
			    			unlink('image/'.$news->image);
			    		}			    		
			    		$image->move('image', $imageName);
			    		$news->update([
				    		'image' => $imageName
				    	]);

			    	}
    			}

		    	CategoryObj::where('news_id', $news->id)->delete();
		    	foreach ($categories_id as $category_id) {

                    $slug_category = str_replace(' ', '-', preg_replace('/[!@#$%^&*()?]/', '', Categories::findOrFail($category_id)->name));

					CategoryObj::insert([
						'category_id' => $category_id,
						'category_name' => Categories::findOrFail($category_id)->name,
                        'category_slug' => $slug_category,
						'news_id' => $news->id,
						'news_title' => $news->title,
                        'news_slug' => $news->slug
					]);	
					
	  			}
	  			
	  			TagObj::where('news_id', $news->id)->delete();
	  			if($listTags[0] != 'null') {
			    	foreach ($listTags as $item) {

			    		$tag = Tags::where('id', $item)->first(); //kiem tra xem da co tag trong db chưa
		  				if($tag == null){
		  					
			  				$tag_id = Tags::insertGetId([
			  					'name' => $item
			  				]);
			  				$tag = Tags::findOrFail($tag_id);
			  			}
			  			
		  				if( $tag->id > 0) {
		  					TagObj::insert([
			  					'news_id' => $news->id,
			  					'tag_id' => $tag->id,
			  					'news_title' => $news->title,
			  					'tag_name' => $tag->name
			  				]);
		  				}
		  			}
		  		}
		    	return response()->json([
		    		'code' => 200,
		    		'msg' => "thành công"
		    	]);
    		}
    }

    public function delete ($id) {
    
    	try {
    		$news = News::findOrFail($id);
    		$news->delete();
    		TagObj::where('news_id', $id)->delete();
    		CategoryObj::where('news_id', $id)->delete(); 
    		TagObj::where('news_id', $id)->delete();
    		// xoa file ảnh
    		if (file_exists('image/'.$news->image) && $news->image != null){
    			unlink('image/'.$news->image);
    		}
			return response()->json([
	    		'code' => 200,
	    		'msg'  => 'đã xóa bản ghi'
    		]);


    	} catch (\Exception $e) {
    		return response()->json([
	    		'code' => 404,
	    		'msg' => 'Lỗi trong quá trình xử lý dữ liệu'
	    	]);
    	}
    	
    }
    
}
