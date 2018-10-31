<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Menu;

class MPController extends Controller
{
    public function index ()
    {
    	return view('MPsoftware.index');
    }

    public function about ()
    {
        // $menus = Menu::all();
        // foreach ($menus as $menu) {
        //     echo $menu->name.'<br>';
        // }die;
        $response['menu1'] = Menu::where([ ['id', 1], ['status', 1] ])->first();
        $response['menu2'] = Menu::where([ ['id', 14], ['status', 1] ])->first();
        $response['menu3'] = Menu::where([ ['id', 15], ['status', 1] ])->first();
        $response['menu4'] = Menu::where([ ['id', 16], ['status', 1] ])->first();   
        return view('MPsoftware.mpsw_about', $response);
    }

    public function client ()
    {
    	return view('MPsoftware.mpsw-client');
    }

    public function news ()
    {
    	return view('MPsoftware.mpsw-new');
    }

    public function contact ()
    {
    	return view('MPsoftware.mpsw-contact');
    }

    public function case_studies ()
    {
    	return view('MPsoftware.mpsw_casestudy');
    }

    
    // public function form(Request $request) {
    //     form::create($request);

    //     return redirect()->back();
    // }
}
