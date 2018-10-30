<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Cat_News;
use App\News;
use Validator;

class CategoryController extends Controller
{
    public function index () {
    	$categories = Category::where('is_deleted', 0)->get();
    	
    	return view('categories.index', compact('categories')); 
    } 

    public function add() {
		$categories = Category::where([ ['status', 1], ['is_deleted', 0] ])->get();

    	return view('categories.add', compact('categories'));
    }

    public function store(Request $request) {
    	$validate1 = Validator::make(
    		$request->all(),
    		[
    			'name' => 'required|min:3'
    		],
    		[
    			'name.required' => 'không được để trống',
    			'name.min' => 'lớn hơn 3 kí tự'
    		]
    	);
        // neu type la menu thi kiem tra description va content
        if( $request->input('type' == 'menu')) {
            $validate2 =  Validator::make(
                $request->all(),
                [
                    'description' => 'required',
                    'content' => 'required',
                    'stt' => 'required'
                ],
                [
                    'required' => 'không được để trống trường'
                ]
            );
        }
    	if($validate1->fails()){
    		return response()->json([
    			'code' => 404,
    			'msg' => 'không thành công'
    		]);
    	}

        if(isset($validate2)){
            if($validate2->fails()){
                return response()->json([
                    'code' => 404,
                    'msg' => 'không thành công'
                ]);
            }
        }
    	
        if(Category::where('name', $request->input('name'))->first() !=null ){
            return response()->json([
                'code' => 403,
                'msg' => 'name không được trùng!'
            ]);
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

		Category::insert([
			'name' => $request->input('name'),
			'parent_id' => $request->input('parent_id'),
			'status' => $status,
            'type' => $request->input('type'),
            'description' => $request->input('description'),
            'content' => $request->input('content'),
            'stt' => $request->input('stt'),
            'slug' => str_replace(' ', '-', $slug)
		]);
        
		return response()->json([
			'code' => 200,
			'msg' => 'thành công'
		]);
    	
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
    public function edit($id) {
        $category = Category::findOrFail($id);
        $categories = Category::where([ ['status', 1], ['is_deleted', 0] ])->get();
        return view('categories.edit', compact('category', 'categories'));
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
    			'msg' => $validate->errors()->first()
    		]);
    	}
    	else {
            //kiểm tra xem name có bị trùng với các bản ghi khac hay  chưa
            if(Category::where([ ['name', $request->input('name') ], ['id', '<>', $id] ])->first() !=null ){
                return response()->json([
                    'code' => 403,
                    'msg' => 'name không được trùng!'
                ]);
            }
    		if($request->input('status') == 'false'){
    			$status = 0;             
    		}
    		else{
    			$status = 1;
    		}           
            //$arr_categories = array();
            // lay ra cac categories con            
            $listCategories = $category->categories;
            foreach ($listCategories as $itemCategory) {
                $itemCategory->status = $status;
                $itemCategory->save();
                //tao mang luu cac id categories con
                //array_push($arr_categories,$itemCategory->id);
            }
            // unactive cac bai viet theo category

            // array_push($arr_categories,$category->id);           
            // $query_update_status = News::leftJoin('categories_object_news','categories_object_news.news_id','=','news.id')
            // ->whereIn('categories_object_news.category_id',$arr_categories)->update(['news.status' => $status]);
            // if (!$query_update_status) {
            //     return response()->json([
            //         'code' => 404,
            //         'msg' => 'không cập nhật được trạng thái'
            //     ]); 
            // }

            $slug = preg_replace('/[!@#$%^&*()]/', '', $request->input('name')); // loai bo tat ca cac ki tu dac biet trừ kí tự '-'
    		$query_update_category = $category->update([
    			'name' => $request->input('name'),
    			'parent_id' => $request->input('parent_id'),
    			'status' => $status,
                'slug' => slug_replace(' ', '-', $slug)
    		]);
            if (!$query_update_category) {
                return response()->json([
                    'code' => 404,
                    'msg' => 'không cập nhật được category'
                ]);
            }
            // update trong bang object category new
            Cat_News::where('category_id', $id)->update([
                'category_name' => $category->name,
                'category_slug' => $category->slug
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
    		//$catalog = $category->catalog;
    		// lay categories la con cua category
    		$categories = $category->categories;
    		
    		foreach ($categories as $cat) {
    			$cat->is_deleted = 1 ;
    			$cat->save();
    		}
    		$category->update([
                'is_deleted' => 1
            ]);

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
