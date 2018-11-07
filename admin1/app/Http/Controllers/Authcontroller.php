<?php
	namespace App\Http\Controllers;
	use App\Models\demoModel;
	use Illuminate\Http\Request;
	use Illuminate\Http\Response;
	use Illuminate\Support\Facades\Auth;
	use App\Http\Requests;

	class Authcontroller extends Controller
	{
	    public function login(Request $request)
	    {
	   		
	    	$username = $request->username;
	    	$password = $request->password;
	    	if(Auth::attempt( [['name' => $username],
	    					   ['password' => $password]
	    					] ))
	    	{
	    		return view('thanhcong');
	    	}
	    	else
	    	{
	    		return view('dangnhap',['error' => 'login fail!']);
	    	}
	    }
	}
?>