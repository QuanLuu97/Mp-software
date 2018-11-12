<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//Back_End MPsoftware
Route::get('admin', [ 'as' => 'home', 'uses' => 'backEnd\AdminController@home' ]);

Route::get('admin/news', ['as' => 'indexNews', 'uses' => 'backEnd\AdminController@index']);
Route::get('admin/news/add', ['as' => 'addNews', 'uses' => 'backEnd\AdminController@add']);
Route::post('admin/news/getData', ['as' => 'getData', 'uses' => 'backEnd\AdminController@getData']);
Route::post('admin/news/store', ['as' => 'storeNews', 'uses' => 'backEnd\AdminController@store']);
Route::get('admin/news/edit/{id}', ['as' => 'editNews', 'uses' => 'backEnd\AdminController@edit']);
Route::post('admin/news/update/{id}', ['as' => 'updateNews', 'uses' =>'backEnd\AdminController@update']);
Route::get('admin/news/delete/{id}', ['as' => 'deleteNews', 'uses' => 'backEnd\AdminController@delete']);

route::get('admin/categories', ['as' => 'indexCat', 'uses' => 'backEnd\CategoryController@index']);
Route::get('admin/categories/add', ['as' => 'addCat', 'uses' => 'backEnd\CategoryController@add']);
Route::post('admin/categories/store', ['as' => 'storeCat', 'uses' => 'backEnd\CategoryController@store']);
Route::post('admin/categories/getData', ['as' => 'getDataCat', 'uses' => 'backEnd\CategoryController@getDataCat']);
Route::get('admin/categories/edit/{id}', ['as' => 'editCat', 'uses' =>'backEnd\CategoryController@edit']);
Route::post('admin/categories/update/{id}', ['as' => 'updateCat', 'uses' =>'backEnd\CategoryController@update']);
Route::get('admin/categories/delete/{id}', ['as' => 'deleteCat', 'uses' => 'backEnd\CategoryController@delete']);

Route::get('admin/menu', ['as' => 'indexMenu', 'uses' => 'backEnd\MenuController@index']);
Route::get('admin/menu/add', ['as' => 'addMenu', 'uses' => 'backEnd\MenuController@add']);
Route::post('admin/menu/add', ['as' => 'addMenu', 'uses' => 'backEnd\MenuController@add']);
Route::get('admin/menu/edit/{id}', ['as' => 'editMenu', 'uses' => 'backEnd\MenuController@edit']);
Route::post('admin/menu/update/{id}', ['as' => 'updateMenu', 'uses' =>'backEnd\MenuController@update']);
Route::get('admin/menu/delete/{id}', ['as' => 'deleteMenu', 'uses' => 'backEnd\MenuController@delete']);

Route::get('admin/home/add', ['as' => 'addHome', 'uses' => 'backEnd\HomeController@add']);
Route::post('admin/home/add', ['as' => 'addHome', 'uses' => 'backEnd\HomeController@add']);

//Front-End MPsoftware
Route::get('index',['as' => 'index', 'uses' => 'frontEnd\MPController@index']);
Route::get('about',['as' => 'about', 'uses' => 'frontEnd\MPController@about']);

Route::get('case-studies',['as' => 'case_studies', 'uses' => 'frontEnd\MPController@case_studies']);
Route::get('case-studies/1/{slug}',['as' => 'case_studies/crm', 'uses' => 'frontEnd\MPController@case_studies_crm']);
Route::get('case-studies/2/{slug}',['as' => 'case_studies/dream-home', 'uses' => 'frontEnd\MPController@case_studies_dream_home']);
Route::get('case-studies/3/{slug}',['as' => 'case_studies/mpcc', 'uses' => 'frontEnd\MPController@case_studies_mpcc']);
Route::get('case-studies/4/{slug}',['as' => 'case_studies/school-link', 'uses' => 'frontEnd\MPController@case_studies_school_link']);
Route::get('case-studies/5/{slug}',['as' => 'case_studies/sv-jobs', 'uses' => 'frontEnd\MPController@case_studies_sv_jobs']);
Route::get('case-studies/6/{slug}',['as' => 'case_studies/procurement', 'uses' => 'frontEnd\MPController@case_studies_procurement']);

Route::get('client',['as' => 'client', 'uses' => 'frontEnd\MPController@client']);

Route::get('service', ['as' => 'service', 'uses' => 'frontEnd\MPController@service']);
Route::get('service/1/{slug}', ['as' => 'service/testing-and-qa-services', 'uses' => 'frontEnd\MPController@service_test']);
Route::get('service/2/{slug}', ['as' => 'service/mobility', 'uses' => 'frontEnd\MPController@service_mobile']);
Route::get('service/3/{slug}', ['as' => 'service/application-development', 'uses' => 'frontEnd\MPController@service_application']);
Route::get('service/4/{slug}', ['as' => 'service/web-solutions', 'uses' => 'frontEnd\MPController@service_web']);
Route::get('service/5/{slug}', ['as' => 'service/design', 'uses' => 'frontEnd\MPController@service_design']);
Route::get('service/6/{slug}', ['as' => 'service/enterprise-solution', 'uses' => 'frontEnd\MPController@service_enterprise']);

Route::get('contact',['as' =>'contact', 'uses' => 'frontEnd\ContactController@contact']);
Route::post('contact', ['as' => 'add', 'uses' => 'frontEnd\ContactController@add']);
Route::get('contact/list',['as' => 'list', 'uses' => 'frontEnd\ContactController@list']);
Route::get('contact/edit/{id}',['as' => 'edit', 'uses' => 'frontEnd\ContactController@edit']);
Route::post('contact/update/{id}', ['as' => 'update', 'uses' => 'frontEnd\ContactController@update']);
Route::get('contact/delete/{id}', ['as' => 'delete', 'uses' => 'frontEnd\ContactController@delete']);

Route::get('news',['as' => 'news', 'uses' => 'frontEnd\NewsController@indexNews']);
// view ra cac bai viet thuoc category
Route::get('news/category/{slug}.html', ['as' => 'news/category', 'uses' => 'frontEnd\NewsController@newsByCategory']); 
// view ra các bài viết thuộc tag
Route::get('news/tags/{tag}', ['as' => 'news/tags', 'uses' => 'frontEnd\NewsController@newsByTag']);
// view ra bài viết
Route::get('news/{slug}.html', ['as' => 'detailNews', 'uses' => 'frontEnd\NewsController@detailNews']);
Route::get('news/{cate_slug}/{slug}', ['as' => 'news/', 'uses' => 'frontEnd\NewsController@detail']);



Auth::routes();
Route::get('/', 'LoginController@index')->name('login');
Route::get('import', ['as' => 'importFile', 'uses' => 'ExcelController@importFile']);
Route::post('postImport', ['as' => 'postImport', 'uses' => 'ExcelController@postImport']);