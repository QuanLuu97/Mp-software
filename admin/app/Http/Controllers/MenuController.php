<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Menu;
use Validator;

class MenuController extends Controller
{
    public function index() {
    	$menus = Menu::all();

    	return view('menus.index', compact('menus'));
    }

    public function add(Request $request) {
    	$menus = Menu::all();

	    if ($request->input('btn_add')) {
	    	$validate = Validator::make(
	    		$request->all(),
	    		[
	    			'name' => 'required|min:3',
	    			'sort' => 'integer|required'
	    		],
	    		[
	    			'name.required' => "name không được để trống",
	    			'name.min' => 'name phải hơn 3 kí tự',
	    			'sort.required' => 'sort không được trống',
	    			'sort.integer' => 'sort phải là số nguyên dương' 
	    		]
	    	);
	    	if($validate->fails()){
	    		return redirect()->back()->with('error', $validate->errors()->first());
	    	}
	    	$images = null;
	    	if ($request->hasFile('images')) {
	    		$arr_img = $request->file('images');
	    		$i = 0;
	    		if(!empty($arr_img)) {
	    			foreach ($arr_img as $key => $value) {
		    			$file = $value;
		    			$img[$i] = $value->getClientOriginalName();
		    			$file->move('uploads/images', $img[$i]);
		    			$i++;
		    		}
		    		$images = json_encode($img);
	    		}
	    		
	    		
	    	}
	    	if(Menu::where('name', $request->input('name'))->first() !=null ){
	            return redirect()->back()->with('error', 'name đã có trong db');
	        }
			if($request->input('status') == 'false'){
				$status = 0;
			}
			else{
				$status = 1;
			}
	        
	        $slug = preg_replace('/[!@#$%^&*()]/', '', $request->input('name'));
	        //chuyen sang chu k co dau
	        $slug = preg_replace('/(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)/', 'a', $slug);
	        $slug = preg_replace('/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)/', 'e', $slug);
	        $slug = preg_replace('/(ì|í|ị|ỉ|ĩ|Ì|Í|Ị|Ỉ|Ĩ)/', 'i', $slug);
	        $slug = preg_replace('/(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)/', 'o', $slug);
	        $slug = preg_replace('/(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)/', 'u', $slug);
	        $slug = preg_replace('/(ỳ|ý|ỵ|ỷ)/', 'y', $slug);
	        $slug = preg_replace('/(đ)/', 'd', $slug);
	        $slug = strtolower($slug); // chuyen sang chu thuong

			Menu::insert([
				'name' => $request->input('name'),
				'parent_id' => $request->input('parent_id'),
				'status' => $status,
	            'description' => $request->input('description'),
	            'content' => $request->input('content'),
	            'content2' => $request->input('content2'),
	            'images' => $images,
	            'sort' => $request->input('sort'),
	            'slug' => str_replace(' ', '-', $slug)
			]);

			return redirect()->back()->with('success', 'thành công');
	    }
      	
    	return view('menus.add', compact('menus'));
    }

    public function edit($id) {
    	$menu = Menu::findOrFail($id);
    	$menus = Menu::all();
    	
    	return view('menus.edit', compact('menu', 'menus'));
    }

    public function update(Request $request, $id) {
    	$menu = Menu::findOrFail($id);
    	$validate = Validator::make(
    		$request->all(),
    		[
    			'name' => 'required|min:3',
    			'sort' => 'required|integer'
    		],
    		[
    			'name.required' => "name không được để trống",
    			'name.min' => 'name phải hơn 3 kí tự',
    			'sort.required' => 'sort không được trống',
    			'sort.integer' => 'sort phải là số nguyên dương' 
    		]
    	);
    	if($validate->fails()){
    		return redirect()->back()->with('error', $validate->errors()->first());
    	}
    	else {

    		if(Menu::where([ ['name', $request->input('name')], ['id', '<>', $id] ])->first() != null) {
	    		return redirect()->back()->with('error', 'name da co trong db');
    		}

	    	$images = null;
	    	if ($request->hasFile('images')) {

	    		$arr_img = $request->file('images');
	    		$i = 0;
	    		if(!empty($arr_img)) {
	    			foreach ($arr_img as $key => $value) {
		    			$file = $value;
		    			$img[$i] = $value->getClientOriginalName();
		    			$file->move('uploads/images', $img[$i]);
		    			$i++;
		    		}
		    		$images = json_encode($img);
	    		}
	    			
	    	}
	    	if($request->input('status') == 'false'){
				$status = 0;
			}
			else{
				$status = 1;
			}
	    	$slug = preg_replace('/[!@#$%^&*()]/', '', $request->input('name'));
		        //chuyen sang chu k co dau
	        $slug = preg_replace('/(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)/', 'a', $slug);
	        $slug = preg_replace('/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)/', 'e', $slug);
	        $slug = preg_replace('/(ì|í|ị|ỉ|ĩ|Ì|Í|Ị|Ỉ|Ĩ)/', 'i', $slug);
	        $slug = preg_replace('/(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)/', 'o', $slug);
	        $slug = preg_replace('/(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)/', 'u', $slug);
	        $slug = preg_replace('/(ỳ|ý|ỵ|ỷ)/', 'y', $slug);
	        $slug = preg_replace('/(đ)/', 'd', $slug);
	        $slug = strtolower($slug); // chuyen sang chu thuong
	        
	    	$menu->update([
	    		'name' => $request->input('name'),
				'parent_id' => $request->input('parent_id'),
				'status' => $status,
	            'description' => $request->input('description'),
	            'content' => $request->input('content'),
	            'content2' => $request->input('content2'),
	            'images' => $images,
	            'sort' => $request->input('sort'),
	            'slug' => str_replace(' ', '-', $slug)
	    	]);
	    	$menu->save();

	    	return redirect()->back()->with('success', 'update thành công!');
    	}
    	
    }
}
