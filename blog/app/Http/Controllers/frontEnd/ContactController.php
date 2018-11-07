<?php

namespace App\Http\Controllers\frontEnd;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;
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
    public function add(Request $request) 
    {

    		$name = $request->input('name');
	    	$email = $request->input('email');
	    	$subject = $request->input('subject');
	    	$message = $request->input('message');
	    	
	    	$validate = Validator::make(
	    		$request->all(),
	    		[
					'name' => 'required|min:5',
					'email' => 'required|email',
					'subject' => 'required',
					'message' => 'required'	    			
	    		],
	    		[
	    			'name.required' => 'name không được để trống',
	    			'name.min' => 'name phải ít nhất 5 ksi tự',
	    			'email.required' => 'email k được để trống',
	    			'email.email' => 'nhập đúng định dạng email',
	    			'subject.required' => 'subject không được để trống',
	    			'message.required' => 'message không được để trống'
	    		]
	    	);

	    	if(!$validate->fails()) {
	    		Contact::insert([
	    			'name' => $name,
	    			'email' => $email,
	    			'subject' => $subject,
	    			'message' => $message
	    		]);

	    		return response()->json([
	    			'code' => 200,
	    			'msg' => 'gửi thành công'
	    		]);
	    	}
	    	else {
	    		
	    		return response()->json([
	    			'code' => 404,
	    			'msg' => $validate->errors()->first()
	    		]);
	    	}
    }

    public function list(){
    	$contacts = Contact::all();

    	return view('MPsoftware.listContact', compact('contacts'));
    }

    public function edit($id) {
    	$response = [];
    	if($id > 0){

    		$form = Contact::where('id', '=', $id)->first();
    		if(!empty($form)) {
    			$response = ['formData' => $form];
    		}
    	}

    	return view('MPsoftware.editContact', compact('response'));
    }

    public function update(Request $request, $id) {

    		$form = Contact::findOrFail($id);
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
		    			'message' => $message
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
   		$form = Contact::findOrFail($id);
   		$form->delete();
   		return redirect()->back()->with('status', 'Xoá thành công');
   	}
}
