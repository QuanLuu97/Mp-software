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
Route::get('admin', [ 'as' => 'home', 'uses' => 'AdminController@home' ]);

Route::get('news/index', ['as' => 'indexNews', 'uses' => 'AdminController@index']);
Route::get('news/add', ['as' => 'addNews', 'uses' => 'AdminController@add']);
Route::post('news/getData', ['as' => 'getData', 'uses' => 'AdminController@getData']);
Route::post('news/store', ['as' => 'storeNews', 'uses' => 'AdminController@store']);

//Route::post('news/update', ['as' => 'updateNews', 'uses' =>'AdminController@update']);
Route::get('news/edit/{id}', ['as' => 'editNews', 'uses' => 'AdminController@edit']);
Route::post('news/update/{id}', ['as' => 'updateNews', 'uses' =>'AdminController@update']);
Route::get('news/delete/{id}', ['as' => 'deleteNews', 'uses' => 'AdminController@delete']);

route::get('categories/index', ['as' => 'indexCat', 'uses' => 'CategoryController@index']);
Route::get('categories/add', ['as' => 'addCat', 'uses' => 'CategoryController@add']);
Route::post('categories/store', ['as' => 'storeCat', 'uses' => 'CategoryController@store']);
Route::post('categories/getData', ['as' => 'getDataCat', 'uses' => 'CategoryController@getDataCat']);
Route::post('categories/update/{id}', ['as' => 'updateCat', 'uses' =>'CategoryController@update']);
Route::get('categories/delete/{id}', ['as' => 'deleteCat', 'uses' => 'CategoryController@delete']);