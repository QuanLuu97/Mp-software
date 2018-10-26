<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categories;
use Validator;

class CategoryController extends Controller
{
    public function index() {
    	$categories = Categories::whereNotNull('categories_id')->get();
    	// $categories = Categories::find(1)->categories;
    	// foreach($categories as $category) {
    	// 	echo $category->name;
    	// }die;
    	return view('category.index', compact('categories'));
    }

    public function add() {
    	$categories = Categories::where('categories_id',null)->get();
    	
    	//$category = Categories::find(1)categories()

    	return view('category.add', compact('categories'));
    }

    public function store(Request $request) {

    	$validate = Validator::make(
            $request->all(),

            //$pattern
            [
                'name' => 'required|min:3|max:10', // độ dài từ 3-10
                'check' =>'required|integer|min:3|max:10', //gia tri tu 3-10
                'phoneNumber' => [
                    'required',
                    'regex: /^(0)[0-9]{9,10}$/' // sdt phải bắt đâu bằng số 0 và phải có 10-11 số
                ]
            ],
            //$mesages
            [
               // 'name' => [
                //     'required' => 'name không được để trống',
                //     'min' => 'phải từ 3 kí tự trở lên',
                //     'max' => '10 kí tự trở xuống'
                // ],
                // 'check' => [
                //     'required' => 'không được để trống',
                //     'integer' => ' phải là số',
                //     'min' => 'giá trị phải lớn hơn 3'
                // ],
                // 'phoneNumber' => [
                //     'required' => 'điện thoại trống à',
                //     'regex' => 'error regex'
                // ]
                'name.required' =>'name không được để trống',
                'name.min' => 'phải từ 3 kí tự trở lên',
                'name.max' => '10 kí tự trở xuống',
                'check.required' => 'không được để trống',
                'check.integer' => ' phải là số',
                'check.min' => 'giá trị phải lớn hơn 3',
                'check.max' => 'giá trị phải nhỏ hơn 10',
                'phoneNumber.required' => 'điện thoại trống à',
                'phoneNumber.regex' => 'error regex'
            ]
        );
        //var_dump($validate->errors()->first());die; //hien ra lỗi đầu tiên 
        if(!$validate->fails()){
            Categories::create([
                'name' => $request->input('name'),
                'categories_id' => $request->input('categories_id')
            ]);
            return redirect()->back()->with('status', 'thành công');
            
        }
        else{
           return redirect()->back()->withErrors($validate)->withInput();
        }
    	
    }
}
