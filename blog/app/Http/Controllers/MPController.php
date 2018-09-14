<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\form;

class MPController extends Controller
{
    public function index ()
    {
    	return view('MPsoftware.index');
    }

    public function about ()
    {
    	return view('MPsoftware.mpsw_about');
    }

    public function client ()
    {
    	return view('MPsoftware.mpsw-client');
    }

    public function news ()
    {
    	return view('MPsoftware.mpsw-new');
    }

    // public function contact ()
    // {
    // 	return view('MPsoftware.mpsw-contact');
    // }

    public function case_studies ()
    {
    	return view('MPsoftware.mpsw_casestudy');
    }

    public function service ()
    {
    	return view('MPsoftware.mpsw-service');
    }
    // public function form(Request $request) {
    //     form::create($request);

    //     return redirect()->back();
    // }
}
