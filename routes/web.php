<?php

use Illuminate\Support\Facades\Route;

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

Route::get('admin', function () {
    return view('admin');
})->middleware('usertype');
Route::get('user', function () {
    return view('user');
})->middleware('auth');

Route::post('/storeItem', 'MainController@storeItem');
Route::get('/getItems', 'MainController@getItems');
Route::post('/deleteItem/{iid}', 'MainController@deleteItem');

Route::post('/storeItemUser', 'MainController@storeItemUser');
Route::get('/getItemsUser', 'MainController@getItemsUser');

Route::post('/storeItemEc', 'MainController@storeItemEc');
Route::get('/getItemsEc', 'MainController@getItemsEc');

Auth::routes();

/*Route::get('/home', 'HomeController@index')->name('home');*/


