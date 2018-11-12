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
    public function service_test($slug) {
        $response['service1'] = Menu::where([ ['slug', $slug], ['status', 1] ])->first();
        $service = Menu::findOrFail(18);
        //menu con case-study
        $case_study = Menu::findOrFail(27);
        $response['case_studies'] = $case_study->menus;

        $response['services'] = $service->menus;

        return view('MPsoftware.mpsw-service-testing-qa', $response);
    }
    public function service_mobile($slug) {
        $response['service2'] = Menu::where([ ['slug', $slug], ['status', 1] ])->first();
        $service = Menu::findOrFail(18);
        $response['services'] = $service->menus;
        //menu con case-study
        $case_study = Menu::findOrFail(27);
        $response['case_studies'] = $case_study->menus;

        return view('MPsoftware.mpsw-service-mobitity', $response);
    }
    public function service_application($slug) {
        $response['service3'] = Menu::where([ ['slug', $slug], ['status', 1] ])->first();
        $service = Menu::findOrFail(18);
        $response['services'] = $service->menus;
        //menu con case-study
        $case_study = Menu::findOrFail(27);
        $response['case_studies'] = $case_study->menus;

        return view('MPsoftware.mpsw-service-application-develop', $response);
    }
    public function service_web($slug) {
        $response['service4'] = Menu::where([ ['slug', $slug], ['status', 1] ])->first();
        $service = Menu::findOrFail(18);
        //menu con case-study
        $case_study = Menu::findOrFail(27);
        $response['case_studies'] = $case_study->menus;

        $response['services'] = $service->menus;

         return view('MPsoftware.mpsw-service-web-solution', $response);
    }
    public function service_design($slug) {
        $response['service5'] = Menu::where([ ['slug', $slug], ['status', 1] ])->first();
        $service = Menu::findOrFail(18);
        //menu con case-study
        $case_study = Menu::findOrFail(27);
        $response['case_studies'] = $case_study->menus;

        $response['services'] = $service->menus;

        return view('MPsoftware.mpsw-service-design', $response);
    }
    public function service_enterprise($slug) {
        $response['service6'] = Menu::where([ ['slug', $slug], ['status', 1] ])->first();
        $service = Menu::findOrFail(18);
        //menu con case-study
        $case_study = Menu::findOrFail(27);
        $response['case_studies'] = $case_study->menus;

        $response['services'] = $service->menus;

        return view('MPsoftware.mpsw-service-enterprise-solution', $response);
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
        $response['case_study'] = Menu::where([ ['id', 27], ['status', 1] ])->first();

    	return view('MPsoftware.mpsw-casestudy', $response);
    }

    public function case_studies_crm($slug) {
        $service = Menu::findOrFail(18);
        $response['services'] = $service->menus;
        //menu con case-study
        $case_study = Menu::findOrFail(27);
        $response['case_studies'] = $case_study->menus;
        $response['case_studies1'] = Menu::where([ ['slug', $slug], ['status', 1] ])->first();

        return view('MPsoftware.mpsw-case-studies-crm', $response);
    }

    public function case_studies_dream_home($slug) {
        $service = Menu::findOrFail(18);
        $response['services'] = $service->menus;
        //menu con case-study
        $case_study = Menu::findOrFail(27);
        $response['case_studies'] = $case_study->menus;
        $response['case_studies2'] = Menu::where([ ['slug', $slug], ['status', 1] ])->first();

        return view('MPsoftware.mpsw-case-studies-dreamhome', $response);
    }
    public function case_studies_mpcc($slug) {
        $service = Menu::findOrFail(18);
        $response['services'] = $service->menus;
        //menu con case-study
        $case_study = Menu::findOrFail(27);
        $response['case_studies'] = $case_study->menus;
        $response['case_studies3'] = Menu::where([ ['slug', $slug], ['status', 1] ])->first();

        return view('MPsoftware.mpsw-case-studies-MPCC', $response);
    }

    public function case_studies_school_link($slug) {
        $service = Menu::findOrFail(18);
        $response['services'] = $service->menus;
        //menu con case-study
        $case_study = Menu::findOrFail(27);
        $response['case_studies'] = $case_study->menus;
        $response['case_studies4'] = Menu::where([ ['slug', $slug], ['status', 1] ])->first();

        return view('MPsoftware.mpsw-case-studies-schoollink', $response);
    }

    public function case_studies_sv_jobs($slug) {
        $service = Menu::findOrFail(18);
        $response['services'] = $service->menus;
        //menu con case-study
        $case_study = Menu::findOrFail(27);
        $response['case_studies'] = $case_study->menus;
        $response['case_studies5'] = Menu::where([ ['slug', $slug], ['status', 1] ])->first();

        return view('MPsoftware.mpsw-case-studies-vsjob', $response);
    }

    public function case_studies_procurement($slug) {
        $service = Menu::findOrFail(18);
        $response['services'] = $service->menus;
        //menu con case-study
        $case_study = Menu::findOrFail(27);
        $response['case_studies'] = $case_study->menus;
        $response['case_studies6'] = Menu::where([ ['slug', $slug], ['status', 1] ])->first();

        return view('MPsoftware.mpsw-case-studies-procurement', $response);
    }

}
