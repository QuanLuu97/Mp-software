<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Menu;
use App\Home;

class MPController extends Controller
{
    public function index ()
    {
        $home = Home::where('status', 1)->get();
        $i = 1;
        foreach ($home as $item) {
            $response['home'.$i] = $item;
            echo $item->title.'<br>';
        }
        echo $response['home2']->title; die;
    	return view('MPsoftware.index');
    }

    public function about ()
    {
        $response['menu1'] = Menu::where([ ['id', 1], ['status', 1] ])->first();
        $response['menu2'] = Menu::where([ ['id', 14], ['status', 1] ])->first();
        $response['menu3'] = Menu::where([ ['id', 15], ['status', 1] ])->first();
        $response['menu4'] = Menu::where([ ['id', 16], ['status', 1] ])->first();   
        return view('MPsoftware.mpsw_about', $response);
    }
    public function service()
    {
        $response['service'] = Menu::where([ ['id', 18], ['status', 1] ])->first();
        return view('MPsoftware.mpsw-service', $response);
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
    	return view('MPsoftware.mpsw-casestudy');
    }

}
