<?php

namespace App\Http\Controllers\frontEnd;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\Home;
use App\Models\News;

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
        //menu con service
        $service = Menu::findOrFail(18);
        $response['services'] = $service->menus;
        //menu con case-study
        $case_study = Menu::findOrFail(27);
        $response['case_studies'] = $case_study->menus;
        $response['news'] = News::where([ ['status' , 1], ['is_deleted', 0] ])->orderBy('views_count', 'DESC')->limit(3)->get();
        
    	return view('MPsoftware.index', $response);
    }

    public function about ()
    {
        $service = Menu::findOrFail(18);
        $response['services'] = $service->menus;
        //menu con case-study
        $case_study = Menu::findOrFail(27);
        $response['case_studies'] = $case_study->menus;

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
        //menu con case-study
        $case_study = Menu::findOrFail(27);
        $response['case_studies'] = $case_study->menus;

        $response['services'] = $service->menus;

        return view('MPsoftware.mpsw-service', $response);
    }

    public function service_item($slug) {
        $service = Menu::findOrFail(18);
        $case_study = Menu::findOrFail(27);
        $response['case_studies'] = $case_study->menus;
        $response['services'] = $service->menus;
        $response['service_item'] = Menu::where([ ['slug', $slug], ['status', 1] ])->first();

        return view('MPsoftware.mpsw-service-item', $response);
    }

    public function client ()
    {
        $response['client']  = Menu::where([ ['id', 26], ['status', 1] ])->first();
        // foreach (json_decode($client->images) as $image => $value) {
        //     echo $image .' ' . $value . '<br>';
        // }die;
        $service = Menu::findOrFail(18);
        $response['services'] = $service->menus;
        //menu con case-study
        $case_study = Menu::findOrFail(27);
        $response['case_studies'] = $case_study->menus;

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
        //menu con case-study
        $case_study = Menu::findOrFail(27);
        $response['case_studies'] = $case_study->menus;
        //$response['case_studies'] = Menu::where([ ['parent_id', 27], ['status', 1] ])->orderBy('sort','ASC')->get();
        $response['case_study'] = Menu::where([ ['id', 27], ['status', 1] ])->first();

    	return view('MPsoftware.mpsw-casestudy', $response);
    }

    public function case_studies_item($slug) {
        $response = [];
        $response['case_study_item'] = Menu::where([ ['slug', $slug], ['status', 1]])->first();
        $service = Menu::findOrFail(18);
        $response['services'] = $service->menus;
        //menu con case-study
        $case_study = Menu::findOrFail(27);
        $response['case_studies'] = $case_study->menus;


        return view('MPsoftware.mpsw-case-studies-item', $response);
    }

}
