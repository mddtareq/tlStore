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

// Route::get('/', function () {
//     return view('welcome');
// });

// static routing test

// Route::get('/', function () {
//     return view('pages.index');
// });

Route::get('/', 'PagesController@home');

// Route::get('/about', function () {
//     return view('pages.about');
// });

Route::get('/about', 'PagesController@about');

// Route::get('/services', function () {
//     return view('pages.services');
// });

Route::get('/services', 'PagesController@services');

// dynamic routing test

// Route::get('/profile/{name}', function ($name) {
//     return 'Dynamic ' . $name . '';
// });

Route::get('/profile/{name}', 'PagesController@profile');

// Route::get('/profile/{name}/{id}', function ($name, $id) {
//     return 'Dynamic Name : ' . $name . ' And Id : ' . $id . '';
// });

Route::get('/profile/{name}/{id}', 'PagesController@profile');

Route::get('/show/{id}', 'PagesController@show');

Route::get('/create', 'PagesController@create');

Route::post('/createProduct', 'PagesController@createProduct');

Route::get('/edit/{id}', 'PagesController@editProduct');

Route::post('/update', 'PagesController@updateProduct');
