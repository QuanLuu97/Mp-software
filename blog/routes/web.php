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

Route::get('/', function () {
    return view('welcome');
});
//demo MPsoftware
Route::get('index',['as' => 'index', 'uses' => 'MPController@index']);
Route::get('about',['as' => 'about', 'uses' => 'MPController@about']);
Route::get('service', ['as' => 'service', 'uses' => 'MPController@service']);
Route::get('case-studies',['as' => 'case_studies', 'uses' => 'MPController@case_studies']);
Route::get('client',['as' => 'client', 'uses' => 'MPController@client']);
Route::get('news',['as' => 'news', 'uses' => 'MPController@news']);

Route::get('contact',['as' =>'contact', 'uses' => 'ContactController@contact']);
Route::post('contact', ['as' => 'add', 'uses' => 'ContactController@add']);
Route::get('contact/list',['as' => 'list', 'uses' => 'ContactController@list']);
Route::get('contact/edit/{id}',['as' => 'edit', 'uses' => 'ContactController@edit']);
Route::post('contact/update/{id}', ['as' => 'update', 'uses' => 'ContactController@update']);
Route::get('contact/delete/{id}', ['as' => 'delete', 'uses' => 'ContactController@delete']);

Route::get('categories', ['as' => 'indexCategory', 'uses' => 'CategoryController@index']);
Route::get('categories/add', ['as' => 'addCategory', 'uses' => 'CategoryController@add']);
Route::post('categories/store', ['as' => 'storeCategory', 'uses' => 'CategoryController@store']);

Route::get('products/add', ['as' => 'addProduct', 'uses' => 'ProductController@add']);
Route::post('products/show', ['as' => 'showProduct', 'uses' => 'ProductController@show']);
Route::post('products/store', ['as' => 'storeProduct', 'uses' => 'ProductController@store']);
Route::get('products/index',['as' => 'indexProduct', 'uses' => 'ProductController@index']);
Route::post('products/index', ['as' => 'indexProduct', 'uses' => 'ProductController@index']);

Route::get('news/index', ['as' => 'indexNews', 'uses' => 'NewsController@index']);

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
