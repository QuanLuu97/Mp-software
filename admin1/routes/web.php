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
    return view('templates/admin/index');
});
Route::get('admin', [ 'as' => 'home', 'uses' => 'AdminController@home' ]);

Route::get('news', ['as' => 'indexNews', 'uses' => 'AdminController@index']);
Route::get('news/add', ['as' => 'addNews', 'uses' => 'AdminController@add']);
Route::post('news/getData', ['as' => 'getData', 'uses' => 'AdminController@getData']);
Route::post('news/store', ['as' => 'storeNews', 'uses' => 'AdminController@store']);

//Route::post('news/update', ['as' => 'updateNews', 'uses' =>'AdminController@update']);
Route::get('news/edit/{id}', ['as' => 'editNews', 'uses' => 'AdminController@edit']);
Route::post('news/update/{id}', ['as' => 'updateNews', 'uses' =>'AdminController@update']);
Route::get('news/delete/{id}', ['as' => 'deleteNews', 'uses' => 'AdminController@delete']);

route::get('categories', ['as' => 'indexCat', 'uses' => 'CategoryController@index']);
Route::get('categories/add', ['as' => 'addCat', 'uses' => 'CategoryController@add']);
Route::post('categories/store', ['as' => 'storeCat', 'uses' => 'CategoryController@store']);
Route::post('categories/getData', ['as' => 'getDataCat', 'uses' => 'CategoryController@getDataCat']);
Route::get('categories/edit/{id}', ['as' => 'editCat', 'uses' =>'CategoryController@edit']);
Route::post('categories/update/{id}', ['as' => 'updateCat', 'uses' =>'CategoryController@update']);
Route::get('categories/delete/{id}', ['as' => 'deleteCat', 'uses' => 'CategoryController@delete']);

Route::get('menu', ['as' => 'indexMenu', 'uses' => 'MenuController@index']);
Route::get('menu/add', ['as' => 'addMenu', 'uses' => 'MenuController@add']);
Route::post('menu/add', ['as' => 'addMenu', 'uses' => 'MenuController@add']);
Route::get('menu/edit/{id}', ['as' => 'editMenu', 'uses' => 'MenuController@edit']);
Route::post('menu/update/{id}', ['as' => 'updateMenu', 'uses' =>'MenuController@update']);
Route::get('menu/delete/{id}', ['as' => 'deleteMenu', 'uses' => 'MenuController@delete']);

Route::get('home/add', ['as' => 'addHome', 'uses' => 'HomeController@add']);
Route::post('home/add', ['as' => 'addHome', 'uses' => 'HomeController@add']);

route::get('export', 'ExController@Export');
route::get('upload', 'ExController@upload');
route::post('import', 'ExController@import');