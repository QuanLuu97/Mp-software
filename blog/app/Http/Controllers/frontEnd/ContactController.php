<?php

namespace App\Http\Controllers\frontEnd;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Form;
use Validator;
use App\Models\Menu;

class ContactController extends Controller
{	
	public function contact(){
		$service = Menu::findOrFail(18);
        $response['services'] = $service->menus;
        //menu con case-study
        $case_study = Menu::findOrFail(27);
        $response['case_studies'] = $case_study->menus;
		return view('MPsoftware.mpsw-contact', $response);
	}
    public function add(request $request) 
    {

    		$name = $request->input('name');
	    	$email = $request->input('email');
	    	$subject = $request->input('subject');
	    	$message = $request->input('message');
	    	
	    	$err = [];
	    	if($name!= null && $email != null && $subject != null && $message != null) {
	    		$arr = [
	    			'name' => $name,
	    			'email' => $email,
	    			'subject' => $subject,
	    			'mess' => $message
	    		];
	    		$query = Form::insertGetId($arr);
	    		if($query > 0) {
	    			return response()->json([
				   		'code' => 200,
				   		'msg'  => 'gửi thành công'
				   	]);
	    		}
	    		else{
	    			return response()->json([
				   		'code' => 403,
				   		'msg'  => 'dữ liệu gửi lên không đúng định dạng'
				   	]);
	    			
	    		}
	    		
	    	}
    		return response()->json([
			   		'code' => 404,
			   		'msg'  => 'mời nhập đủ thông tin'
			   	]);
    }

    public function list(){
    	$forms = Form::all();

    	return view('MPsoftware.listContact', compact('forms'));
    }

    public function edit($id) {
    	$response = [];
    	if($id > 0){

    		$form = Form::where('id', '=', $id)->first();
    		if(!empty($form)) {
    			$response = ['formData' => $form];
    		}
    	}

    	return view('MPsoftware.editContact', compact('response'));
    }

    public function update(Request $request, $id) {

    		$form = Form::findOrFail($id);
	    	$name = $request->input('name');
	    	$email = $request->input('email');
	    	$subject = $request->input('subject');
	    	$message = $request->input('message');
	    	$response = [];
	    	$errors = [];
	    	if($name!= null && $email != null && $subject != null && $message != null) {	    	
		    	$arr = [
		    			'name' => $name,
		    			'email' => $email,
		    			'subject' => $subject,
		    			'mess' => $message
		    	];
		    	$query = $form->update($arr);
		    	$response = ['formData' => $form];

		    	if($query){		    				    		
		    		return redirect()->back()->with('status','update thành công');
		    	}
		    	else {
		    		$errors = ['không update được dữ liệu'];
		    		return redirect()->back()->withError($errors);
		    	}
	    	}
	    	else {
	    		$errors = ['không đủ dữ liệu để update'];
	    		return redirect()->back()->withErrors($errors);
	    	}
   	}

   	public function delete($id) {
   		$form = Form::findOrFail($id);
   		$form->delete();
   		return redirect()->back()->with('status', 'Xoá thành công');
   	}
}
