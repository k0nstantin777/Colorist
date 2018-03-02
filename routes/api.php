<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});

Route::post('/order', 'AjaxController@order');
Route::post('/feedback/send', 'AjaxController@feedbackSend');
Route::post('/review/send', 'AjaxController@reviewSend');

/* ---ADMIN ROUTE ---*/
Route::post('/admin/block/edit/', 'AjaxController@blockEditPost');

Route::post('/admin/img/albums/edit/', 'AjaxController@imgAlbumsEditPost');
Route::post('/admin/img/upload/', 'AjaxController@uploadImage')
     ->name('upload');

Route::post('/admin/images/', 'AjaxController@getImagesAll');
Route::post('/admin/images/woalbum', 'AjaxController@getImagesWoAlbum');
Route::post('/admin/album/create', 'AjaxController@albumCreate');

Route::post('/admin/slider/img/get', 'AjaxController@sliderImgGet');
Route::post('/admin/image/sort', 'AjaxController@imgSort');

//upload profile image
Route::post('/admin/upload/image/profile', 'UploadController@imgProfileUpload');
//page edit form
Route::post('/admin/page/edit/', 'PageController@pageEditPost');
//сортировка блоков на странице
Route::post('/admin/block/sort', 'PageController@blockSort');
//сортировка слайдов в большом слайдере
Route::post('/admin/block/slider/sort', 'BlockController@sliderSort');
//сортировка элементов
Route::post('/admin/block/element/sort', 'BlockController@elementSort');
//сортировка изображений фотогаллереи
Route::post('/admin/element/image/sort', 'BlockController@imageSort');
//сортировка отзывов
Route::post('/admin/block/review/sort', 'BlockController@reviewSort');
//сортировка контактов
Route::post('/admin/element/contact/sort', 'BlockController@contactSort');
//сортировка позиций прайслиста
Route::post('/admin/element/price/sort', 'BlockController@priceSort');
//сортировка страниц
Route::post('/admin/page/sort', 'PageController@sort');