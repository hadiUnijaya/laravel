<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Http;

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


/*
Route::get('/hello', function () {
    return '<h1>Hello World</h1>' ;
});

Route::get('/users/{id}/{name}', function($id, $name){
    return 'This is user '.$name.' with the id of '.$id;
});
*/

Route::get('/', 'PagesController@index');
Route::get('/about', 'PagesController@about');
Route::get('/services', 'PagesController@services');
Route::get('get_data', 'ScrapeController@get_data');


Route::resource('posts','PostController');


Auth::routes();

Route::get('/dashboard', 'DashboardController@index');
Route::get('/import_excel', 'importController@index');
Route::post('/import_excel/import', 'importController@import');


Route::get('/json/{page?}', 'ClientController@getAllPosts');
Route::get('/json/user/{id}', 'ClientController@getPostById');
Route::get('/json/create', 'ClientController@create');
Route::get('/json/register', function () {
    return view('frontend.register');
   });
Route::get('/json/store', 'ClientController@store');
Route::get('/json/edit/{id}', 'ClientController@editPost');
Route::post('/json/update', 'ClientController@update');
Route::delete('/json/delete/{id}', 'ClientController@delete');