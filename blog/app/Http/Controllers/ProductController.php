<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categories;
use App\Products;

class ProductController extends Controller
{
    public function add() {
    	$categories = Categories::whereNull('categories_id')->get();
    	
    	return view('products.add', compact('categories'));
    }

    public function show(Request $request) {
    	// nếu catalog không được chọn
    	if($request->input('catalog') == null)
    	
    		return response()->json(null);
    	else{ // nếu catalog được chọn
    		$categories = Categories::find($request->input('catalog'))->categories; //tim tất cả categories có categories = catalog->id
    	
    		return response()->json($categories);
    	}
    } 

    public function store(Request $request) {	
    	$name = $request->input('name');
    	$price = $request->input('price');
    	$categories_id = $request->input('categories');

    	if($name != null && $price > 0 && $categories_id != null) {
    		$arr = [
    			'name' => $name,
    			'price' => $price,
    			'categories_id' => $categories_id,
    		];
    		$query =  Products::insert($arr);
    		if($query){
    			return response()->json([
    				'code' => 200,
    				'msg' => ' thêm thành công'
    			]);
    		}
    	}
    	return response()->json([
    		'code' => 404,
    		'msg' => 'điền dầy đủ thông tin vào đê'
    	]);
    }


    public function index(Request $request) {
    	// $catalog_id = $request->get('catalog');
    	$categories_id = $request->input('categories');

    	$catalogs = Categories::whereNull('categories_id')->get();
    	$categories = Categories::whereNotNull('categories_id')->get();
    	if(!empty($categories_id)){
    		if(Categories::find($categories_id)->categories_id != null) {
    			$products = Categories::find($categories_id)->products;
    		
    			return view('products.index', compact('products', 'catalogs', 'categories'));
    		}
    		else {
    			$categories2 = Categories::find($categories_id)->categories;
    			$id = [];
    			foreach ($categories2 as $category2) {
    				array_push($id, $category2->id);
    			}
    			$products = Products::whereIn('categories_id', $id)->get();

    			return view('products.index', compact('products', 'catalogs', 'categories'));
    		}
    		
    	}

    	else{
			$products = Products::all();
		
			return view('products.index', compact('products', 'catalogs', 'categories'));
    	}
    }
}
