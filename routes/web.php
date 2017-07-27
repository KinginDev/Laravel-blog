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

Auth::routes();
//Authentication routes
Route::get('auth/login','Auth\LoginController@ShowLoginForm');
Route::post('auth/login','Auth\LoginController@login');
Route::get('auth/logout','Auth\LoginController@logout');

Auth::routes();
//Registration routes
Route::get('auth/register', 'Auth\RegisterController@showRegistrationForm');
Route::post('auth/register', 'Auth\RegisterController@register');
#Single Blog Route
Route::get('blog/{slug}', ['as' => 'blog.single', 'uses' => 'BlogController@getSingle'])->where('slug', '[|\w\d\-\_]+');
Route::get('blog' , ['uses' => 'BlogController@getIndex', 'as' => 'blog.index']);
Route::get('contact', 'PagesController@getContact');
Route::get('about', 'PagesController@getAbout');
Route::get('/', 'PagesController@getIndex');
Route::resource('post', 'PostController');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
