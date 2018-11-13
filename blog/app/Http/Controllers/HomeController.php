<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */

    public function login(Request $request) {

        $data1 = [
            'username' => $request->input('username'), 
            'password' => $request->input('password')
        ];
        $data2 = [
            'email' => $request->input('username'), 
            'password' => $request->input('password')
        ];
        if(auth::attempt($data1)){
            return redirect()->route('home');
        }
        else if(auth::attempt($data2)){
            return redirect()->route('home');
        }
        else return redirect()->back()->with('status', 'tài khoản hoặc mật khẩu không đúng');
    }
    public function logout() {
        auth::logout();
        //return redirect('/login');
        return redirect(\URL::previous());
    }
}
