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
use App\Property;

Route::get('/', function () {
    $properties = Property::orderBy('id')->paginate(6);
    return view('welcome', compact('properties'));
});

Route::resource('homes', 'PropertyController');
Route::resource('callery', 'CalleryController');
Route::resource('mail', 'MailController');
Route::get('/homes/Apartment/{type}', 'PropertyController@apartment');
Route::get('/homes/Cottage/{type}', 'PropertyController@cottage');
Route::post('/homes/search', 'PropertyController@search');

Auth::routes();

Route::resource('users', 'UserController');
Route::get('/home', 'HomeController@index')->name('home');
Route::post('/homes/update{id}', 'PropertyController@update');
