<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use Validator;

class CategoryController extends Controller
{
    public function index () {
    	$categories = Category::all();
    	
    	return view('categories.index', compact('categories')); 
    } 

    public function add() {
		$categories = Category::all();

    	return view('categories.add', compact('categories'));
    }

    public function store(Request $request) {
		
    	$validate = Validator::make(
    		$request->all(),
    		[
    			'name' => 'required|min:3'
    		],
    		[
    			'name.required' => 'không được để trống',
    			'name.min' => 'lớn hơn 3 kí tự'
    		]
    	);
    	if($validate->fails()){
    		return response()->json([
    			'code' => 404,
    			'msg' => 'không thành công'
    		]);
    	}
    	else {

    		if($request->input('status') == 'false'){
    			$status = 0;
    		}
    		else{
    			$status = 1;
    		}
    		Category::insert([
    			'name' => $request->input('name'),
    			'parent_id' => $request->input('parent_id'),
    			'status' => $status

    		]);
    		return response()->json([
    			'code' => 200,
    			'msg' => 'thành công'
    		]);
    	}
    }

    public function getDataCat(Request $request) {
    	if($request->input('id') > 0) {
    		$category = Category::where('id', $request->input('id'))->first();
    		return response()->json([
    			'code' => 200,
    			'msg' => $category
    		]);
    	}
    	return response()->json([
    		'code' => 404,
    		'msg' => 'thất bại'
    	]);
    }

    public function update(Request $request, $id) {
    	$category = Category::findOrFail($id);

    	$validate = Validator::make(
    		$request->all(),
    		[
    			'name' => 'required|min:3'
    		],
    		[
    			'name.required' => 'không được để trống',
    			'name.min' => 'lớn hơn 3 kí tự'
    		]
    	);
    	if($validate->fails()){
    		return response()->json([
    			'code' => 404,
    			'msg' => 'không thành công'
    		]);
    	}
    	else {

    		if($request->input('status') == 'false'){
    			$status = 0;
    		}
    		else{
    			$status = 1;
    		}
    		$category->update([
    			'name' => $request->input('name'),
    			'parent_id' => $request->input('parent_id'),
    			'status' => $status

    		]);
    		return response()->json([
    			'code' => 200,
    			'msg' => 'thành công'
    		]);
    	}
    }
    public function delete($id) {
    	try {
    		$category = Category::findOrFail($id);
    		// lay catalog la cha cua category
    		$catalog = $category->catalog;
    		// lay categories la con cua category
    		$categories = $category->categories;
    		
    		foreach ($categories as $cat) {
    			$cat->parent_id = $catalog->id;
    			$cat->save();
    		}
    		$category->delete();

    		return response()->json([
    			'code' => 200,
    			'msg' => 'Muốn gì được lấy!!'
    		]);
    	} catch (Exception $e) {
    		return response()->json([
    			'code' => 404,
    			'msg' => 'không thành công'
    		]);
    	}

    }
}
