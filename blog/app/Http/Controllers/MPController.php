<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Menu;
use App\Home;
use App\News;

class MPController extends Controller
{
    public function index ()
    {
        $home = Home::where('status', 1)->get();
        $response['home1'] = Home::where([ ['id', 1], ['status', 1] ])->first();
        $response['home2'] = Home::where([ ['id', 2], ['status', 1] ])->first();
        $response['home3'] = Home::where([ ['id', 3], ['status', 1] ])->first();
        $response['home4'] = Home::where([ ['id', 4], ['status', 1] ])->first();
        $response['home5'] = Home::where([ ['id', 5], ['status', 1] ])->first();
        $response['home6'] = Home::where([ ['id', 6], ['status', 1] ])->first();
        $service = Menu::findOrFail(18);
        $response['services'] = $service->menus;
        $response['news'] = News::where([ ['status' , 1], ['is_deleted', 0] ])->orderBy('views_count', 'DESC')->limit(3)->get();
        
    	return view('MPsoftware.index', $response);
    }

    public function about ()
    {
        $service = Menu::findOrFail(18);
        $response['services'] = $service->menus;
        $response['menu1'] = Menu::where([ ['id', 1], ['status', 1] ])->first();
        $response['menu2'] = Menu::where([ ['id', 14], ['status', 1] ])->first();
        $response['menu3'] = Menu::where([ ['id', 15], ['status', 1] ])->first();
        $response['menu4'] = Menu::where([ ['id', 16], ['status', 1] ])->first();   
        return view('MPsoftware.mpsw_about', $response);
    }
    public function service()
    {
        $response['service'] = Menu::where([ ['id', 18], ['status', 1] ])->first();
        $service = Menu::findOrFail(18);
        $response['services'] = $service->menus;

        return view('MPsoftware.mpsw-service', $response);
    }
    public function service_test($slug) {
        $response['service1'] = Menu::where([ ['slug', $slug], ['status', 1] ])->first();
        $service = Menu::findOrFail(18);
        $response['services'] = $service->menus;

        return view('MPsoftware.mpsw-service-testing-qa', $response);
    }
    public function service_mobile($slug) {
        $response['service2'] = Menu::where([ ['slug', $slug], ['status', 1] ])->first();
        $service = Menu::findOrFail(18);
        $response['services'] = $service->menus;

        return view('MPsoftware.mpsw-service-mobitity', $response);
    }
    public function service_application($slug) {
        $response['service3'] = Menu::where([ ['slug', $slug], ['status', 1] ])->first();
        $service = Menu::findOrFail(18);
        $response['services'] = $service->menus;

        return view('MPsoftware.mpsw-service-application-develop', $response);
    }
    public function service_web($slug) {
        $response['service4'] = Menu::where([ ['slug', $slug], ['status', 1] ])->first();
        $service = Menu::findOrFail(18);
        $response['services'] = $service->menus;

         return view('MPsoftware.mpsw-service-web-solution', $response);
    }
    public function service_design($slug) {
        $response['service5'] = Menu::where([ ['slug', $slug], ['status', 1] ])->first();
        $service = Menu::findOrFail(18);
        $response['services'] = $service->menus;

        return view('MPsoftware.mpsw-service-design', $response);
    }
    public function service_enterprise($slug) {
        $response['service6'] = Menu::where([ ['slug', $slug], ['status', 1] ])->first();
        $service = Menu::findOrFail(18);
        $response['services'] = $service->menus;

        return view('MPsoftware.mpsw-service-enterprise-solution', $response);
    }
    public function client ()
    {
        $service = Menu::findOrFail(18);
        $response['services'] = $service->menus;

    	return view('MPsoftware.mpsw-client', $response);
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
        $service = Menu::findOrFail(18);
        $response['services'] = $service->menus;

    	return view('MPsoftware.mpsw-casestudy', $response);
    }

}
