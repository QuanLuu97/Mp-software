<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\News;
use Validator;
use Confirm;
use App\Category;
use App\Cat_News;

class AdminController extends Controller
{
	public function home() {
		return view('index');
	}

    public function index(){
		
		
    	$newss = News::where('is_deleted',0)->get();
    	$categories = Category::all();
    	//var_dump($newss);
    	return view('news.index', compact('newss','categories'));
    	// $cat = Cat_News::select('category_id')->where('news_id',35)->get();
    	
    	// $categories = Category::whereIn('id',$cat)->get();
    	// foreach ($categories as $category) {
    	// 	echo $category->name.'<br>';
    	// }
    }

    public function add() {
    	$categories = Category::all();
    	return view('news.add', compact('categories'));
    }

    public function store(Request $request) {
    	$title = $request->input('title');
    	// lay ra mang các id của categories
    	//$categories_id = explode(",", $request->input('categories_id'));
    	$categories_id = $request->input('categories_id');
    	var_dump($categories_id); die;
    	$content = $request->input('content');
    	$date = $request->input('date');
	
    	if($request->hasFile('image')) {
    		$image = $request->file('image')->getClientOriginalName();
    		$validate = Validator::make(
	    		$request->all(),
	    		[
	    			'title' => 'required|min:5',
	    			'image' => 'image|max:20000',
	    			'content' => 'required',
	    			'date' => 'required|date'
	    		],
	    		[
	    			'required' => 'không được để trống',
	    			'min' => '5 kí tự trở lên',
	    			'image' => 'không đúng định dạng',
	    			'max' => 'kích thước quá cho phép',
	    			'date' => 'sai định dạng ngày'
	    		]
    		);

    	}
    	else {
    		$image = null;
    		$validate = Validator::make(
	    		$request->all(),
	    		[
	    			'title' => 'required|min:5',
	    			'content' => 'required',
	    			'date' => 'required|date'
	    		],
	    		[
	    			'required' => 'không được để trống',
	    			'min' => '5 kí tự trở lên',
	    			'date' => 'sai định dạng ngày'
	    		]
    		);
    	}
    	if(!$validate->fails()) {
    		$arr = [
    		'title' => $title,
    		'image' => $image,
    		'content' => $content,
	    	'date' => $date
	    	];
	    	News::insert($arr);
	    	$news = News::all()->last();
  			foreach ($categories_id as $category_id) {
				Cat_News::insert([
					'category_id' => $category_id,
					'category_name' => Category::findOrFail($category_id)->name,
					'news_id' => $news->id,
					'news_title' => $news->title
				]);		
  			}
    		return response()->json([
    			'code' => 200,
    			'msg' => 'thêm thành công'
    		]);
    	}
    	else {
    		return response()->json([
    			'code' => 404,
    			'msg' => 'không thành công'
    		]);
    	}
    	
    }

    public function getData(Request $request) {
    	if ($request->id > 0) {
    		$news = News::where('id', $request->input('id'))->first();
    		$categories_id = Cat_News::select('category_id')->where('news_id', $news->id)->get();
    		if (!empty($news)) {
	    		return response()->json([
		    		'code' => 202,
		    		'data' => $news,
		    		'data2' => $categories_id
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
    	$cat_news = Cat_News::where('news_id', $news->id)->get();
    	$categories = Category::all();

    	return view('news.edit', compact('news', 'categories', 'cat_news'));
    }

    public function update(Request $request, $id) {

    	$news = News::findOrFail($id);
    	$content = $request->input('content');
    	$categories_id = explode(",", $request->input('categories_id')); // lay ra mang cac categories của news
    	$date = $request->input('date');
    	$title = $request->input('title');

    	if($request->hasFile('image')){
    		$image = $request->file('image')->getClientOriginalName();

    		$validate = Validator::make(
	    		$request->all(),
	    		[
	    			'title' => 'required|min:5',
	    			'image' => 'image|max:1048576',
	    			'content' => 'required|min:5',
	    			'date' => 'required|date'
	    		],
	    		[
	    			'required' => 'không được để trống',
	    			'title.min' => '5 kí tự trở lên',
	    			'image' => 'không đúng định dạng',
	    			'max' => 'kích thước quá cho phép',
	    			'date' => 'sai định dạng ngày'
	    		]
	    	);

	    	if($validate->fails()) {
	    		
	    		return response()->json([
	    			'code' => 404,
	    			'msg' => 'không thành công'
	    		]);

	    	}
	    	else {
	    		
		    	$news->update([
		    		'title' => $title,
		    		'image' => $image,
		    		'content' => $content,
			    	'date' => $date
		    	]);
		    	Cat_News::where('news_id', $news->id)->delete();

		    	foreach ($categories_id as $category_id) {
					Cat_News::insert([
						'category_id' => $category_id,
						'category_name' => Category::findOrFail($category_id)->name,
						'news_id' => $news->id,
						'news_title' => $news->title
					]);	

	  			}
		    	
		    	return response()->json([
		    		'code' => 202,
		    		'msg' => 'thành công'
		    	]);
    		}
    	}
    	else {
    		$validate = Validator::make(
	    		$request->all(),
	    		[
	    			'title' => 'required|min:5',
	    			'content' => 'required|min:5',
	    			'date' => 'required|date'
	    		],
	    		[
	    			'required' => 'không được để trống',
	    			'title.min' => '5 kí tự trở lên',
	    			'date' => 'sai định dạng ngày'
	    		]
	    	);
	    	if($validate->fails()) {
	    		
	    		return response()->json([
	    			'code' => 404,
	    			'msg' => 'không thành công'
	    		]);

	    	}
	    	else {
	    		
		    	$news->update([
		    		'title' => $title,
		    		'content' => $content,
			    	'date' => $date
		    	]);  
		    	Cat_News::where('news_id', $news->id)->delete();

		    	foreach ($categories_id as $category_id) {
					Cat_News::insert([
						'category_id' => $category_id,
						'category_name' => Category::findOrFail($category_id)->name,
						'news_id' => $news->id,
						'news_title' => $news->title
					]);	
	  			}
		    	return response()->json([
		    		'code' => 200,
		    		'msg' => 'thành công'
		    	]);
    		}
    	}
    }

    public function delete ($id) {
    	try {
    		$news = News::findOrFail($id);
    		$news->is_deleted = 1;
    		$record = $news->save();
    		if (!empty($record)) {
    			return response()->json([
		    		'code' => 200,
		    		'msg'  => 'đã xóa bản ghi'
	    		]);
    		}
	    	return response()->json([
	    		'code' => 404,
	    		'msg' => 'Lỗi trong quá trình xử lý dữ liệu'
	    	]);
    	} catch (\Exception $e) {
    		return response()->json([
	    		'code' => 404,
	    		'msg' => 'Lỗi trong quá trình xử lý dữ liệu'
	    	]);
    	}
    	
    }
    
}
