<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\News;
use Validator;

class AdminController extends Controller
{
	public function home() {
		return view('index');
	}

    public function index(){
    	$newss = News::all();
    	//var_dump($newss);
    	return view('news.index', compact('newss'));
    }

    public function add() {
    	return view('news.add');
    }

    public function store(Request $request) {
    	$title = $request->input('title');
    	$image = $request->file('image')->getClientOriginalName();
    	$content = $request->input('content');
    	$date = $request->input('date');
    	
    	$validate = Validator::make(
    		$request->all(),
    		[
    			'title' => 'required|min:5',
    			'image' => 'image|required|max:20000',
    			'content' => 'required|min:5',
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
    	if($validate->fails()) {
    		return redirect()->back()->withInput()->withErrors($validate);
    	}
    	else {
    		$arr = [
    		'title' => $title,
    		'image' => $image,
    		'content' => $content,
	    	'date' => $date
	    	];
	    	News::insert($arr);
	    	
	    	return redirect()->back()->with('status', 'thành công');
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

    	$title = $request->input('title');
    	
    	$image = $request->file('image')->getClientOriginalName();
    
    	$content = $request->input('content');
    	$date = $request->input('date');


    	$validate = Validator::make(
    		$request->all(),
    		[
    			'title' => 'required|min:5',
    			'image' => 'image|required|max:10000',
    			'content' => 'required|min:5',
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
    	if($validate->fails()) {
    		die('1');
    		return response()->ison([
    			'code' => 404,
    			'msg' => 'errors'
    		]);

    	}
    	else {
    		$arr = [
    		'title' => $title,
    		'image' => $image,
    		'content' => $content,
	    	'date' => $date
	    	];
	    	$news->update($arr);
	    
	    	return response()->json([
	    		'code' => 202,
	    		'msg' => 'thành công'
	    	]);
    	}
    }
    
}
