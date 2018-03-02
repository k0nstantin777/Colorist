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

Route::get('/login', 'Auth\LoginController@login')->name('login');
Route::post('/login', 'Auth\LoginController@loginPost')->name('loginPost'); 
Route::get('/logout', 'Auth\LoginController@logout')->name('logout');

Route::get('/', 'HomeController@index')->name('home');


Route::get('/sitemap.xml', 'HomeController@sitemap');


Route::get('/{page}', 'HomeController@pages')
    ->name('page')
    ->where('slug', '[a-zA-Z0-9-]+');