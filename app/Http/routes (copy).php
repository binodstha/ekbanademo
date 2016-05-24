<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'EkbanaCurd@index');
Route::get('/index/{error?}', 'EkbanaCurd@index');
Route::get('/addinfo/{error?}', 'EkbanaCurd@addinfo');
Route::post('/addinfo', 'EkbanaCurd@verifyinfo');
Route::get('/info/{id?}', 'EkbanaCurd@info');
Route::post('/edit', 'EkbanaCurd@edit');
Route::post('/editinfo', 'EkbanaCurd@editinfo');
Route::post('/deleteinfo', 'EkbanaCurd@deleteinfo');
Route::post('/search', 'EkbanaCurd@search');
Route::get('/login', 'EkbanaCurd@login');
Route::get('/adduser', 'EkbanaCurd@adduser');
Route::post('/verifyuser', 'EkbanaCurd@verifyuser');

Route::auth();
Route::get('/home', 'HomeController@index');
