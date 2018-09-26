<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\News;
use Validator;
use Confirm;

class AdminController extends Controller
{
	public function home() {
		return view('index');
	}

    public function index(){
    	$newss = News::where('is_deleted',0)->get();
    	//var_dump($newss);
    	return view('news.index', compact('newss'));
    }

    public function add() {
    	return view('news.add');
    }

    public function store(Request $request) {
    	$title = $request->input('title');
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
    		if (!empty($news)) {
	    		return response()->json([
		    		'code' => 202,
		    		'data' => $news
		    	]);
	    	}
    	}
    	
    	return response()->json([
    		'code' => 404,
    		'data' => null
    	]);
    }
    	
    public function update(Request $request, $id) {

    	$news = News::findOrFail($id);
    	$content = $request->input('content');
    	$date = $request->input('date');
    	$title = $request->input('title');
    	if($request->hasFile('image')){
    		$image = $request->file('image')->getClientOriginalName();
    		$validate = Validator::make(
	    		$request->all(),
	    		[
	    			'title' => 'required|min:5',
	    			'image' => 'image|max:10000',
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
		    	return response()->json([
		    		'code' => 202,
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
