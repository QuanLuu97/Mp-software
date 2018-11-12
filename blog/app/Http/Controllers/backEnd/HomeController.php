<?php

namespace App\Http\Controllers\backEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Home;
use Validator;

class HomeController extends Controller
{
    public function add(Request $request) {
    	if ($request->input('btn_add')) {
    		$validate = Validator::make(
	    		$request->all(),
	    		[
	    			'title' => 'required|min:3'
	    		],
	    		[
	    			'title.required' => "title không được để trống",
	    			'title.min' => 'title phải hơn 3 kí tự'
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
	    	if(Home::where('title', $request->input('title'))->first() !=null ){
	            return redirect()->back()->with('error', 'title đã có trong db');
	        }
			if($request->input('status') == 'false'){
				$status = 0;
			}
			else{
				$status = 1;
			}
			Home::insert([
				'title' => $request->input('title'),
				'status' => $status,
	            'description' => $request->input('description'),
	            'content' => $request->input('content'),
	            'images' => $images
			]);

			return redirect()->back()->with('success', 'thành công');	
    	}
    	
    	return view('home.add');
    }


}
