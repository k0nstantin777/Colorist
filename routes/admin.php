<?php

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| 
|
*/

Route::get('/', 'MainController@index')
        ->name('admin.home');

/*Messages*/
Route::get('/messages/', 'MessageController@index')
        ->name('admin.message.index');
Route::get('/message/{id}', 'MessageController@show')
        ->name('admin.message.show')
        ->where('id', '[0-9]+');
Route::get('/message/delete/{id}', 'MessageController@delete')
        ->name('admin.message.delete')
        ->where('id', '[0-9]+');

/* Settings */ 
Route::get('/settings/', 'SettingController@edit')
        ->name('admin.setting.edit');
Route::post('/settings/update', 'SettingController@update')
        ->name('admin.setting.update');

/*Pages*/
Route::get('/pages/{page}/activate', 'ContentController@activate')
        ->name('admin.page.activate');
Route::get('/pages/{page}/child/create', 'PageController@childCreate')
    ->name('admin.page.child.create');
Route::post('/pages/child/store', 'PageController@childStore')
    ->name('admin.page.child.store');

Route::resource('pages', 'PageController', [
        'names' => [
            'index' => 'admin.page.index', //get
            'create' => 'admin.page.create', //get
            'store' => 'admin.page.store', //post
            'show' => 'admin.page.show', //get
            'edit' => 'admin.page.edit', //get
            'update' => 'admin.page.update', //put
            'destroy' => 'admin.page.destroy' //delete
        ], 
]);

/*Blocks*/
Route::get('/blocks/{block}/activate', 'ContentController@activate')
        ->name('admin.block.activate');
Route::post('/blocks/{block}/content/create', 'ContentController@create')
        ->name('admin.block.content.create');
Route::post('/blocks/{block}/content/delete', 'ContentController@delete')
    ->name('admin.block.content.delete');
Route::post('/blocks/content/update', 'ContentController@update')
        ->name('admin.block.content.update');

Route::get('/{page_slug}/block/create', 'BlockController@create')
    ->name('admin.block.page.create')
    ->where('page_slug', '[a-z-]+');

Route::resource('blocks', 'BlockController', [
        'names' => [
            'index' => 'admin.block.index', //get
            //'create' => 'admin.block.create', //get
            'store' => 'admin.block.store', //post
            'show' => 'admin.block.show', //get
            'edit' => 'admin.block.edit', //get
            'update' => 'admin.block.update', //put
            'destroy' => 'admin.block.destroy' //delete
        ], 
]);

/* Elements */
Route::get('/elements/{element}/activate', 'ContentController@activate')
    ->name('admin.element.activate');
Route::post('/elements/{element}/content/create', 'ContentController@create')
    ->name('admin.element.content.create');
Route::post('/elements/{element}/content/delete', 'ContentController@delete')
    ->name('admin.element.content.delete');
Route::post('/elements/content/update', 'ContentController@update')
    ->name('admin.element.content.update');

Route::get('/{block_slug}/element/create', 'ElementController@create')
    ->name('admin.element.create')
    ->where('block_slug', '[a-z-]+');

Route::resource('elements', 'ElementController', [
    'names' => [
        'index' => 'admin.element.index', //get
        //'create' => 'admin.element.create', //get
        'store' => 'admin.element.store', //post
        'show' => 'admin.element.show', //get
        'edit' => 'admin.element.edit', //get
        'update' => 'admin.element.update', //put
        'destroy' => 'admin.element.destroy' //delete
    ],
]);


/*Prives*/
Route::post('/prives/roles/update', 'PriveController@rolesUpdate')
        ->name('admin.prive.role.update');

Route::resource('prives', 'PriveController', [
        'names' => [
            'index' => 'admin.prive.index', //get
            'create' => 'admin.prive.create', //get
            'store' => 'admin.prive.store', //post
            'show' => 'admin.prive.show', //get
            'edit' => 'admin.prive.edit', //get
            'update' => 'admin.prive.update', //put
            'destroy' => 'admin.prive.destroy' //delete
        ], 
]);

/*Users*/
Route::get('/users/{user}/activate', 'ContentController@activate')
        ->name('admin.user.activate');

Route::resource('users', 'UserController', [
        'names' => [
            'index' => 'admin.user.index', //get
            'create' => 'admin.user.create', //get
            'store' => 'admin.user.store', //post
            'show' => 'admin.user.show', //get
            'edit' => 'admin.user.edit', //get
            'update' => 'admin.user.update', //put
            'destroy' => 'admin.user.destroy' //delete
        ], 
        
]);

/*Review*/
Route::get('/reviews/{review}/activate', 'ContentController@activate')
    ->name('admin.review.activate');
Route::post('/reviews/{review}/detach', 'ReviewController@blockDetach')
    ->name('admin.review.detach');
Route::post('/reviews/attach', 'ReviewController@blockAttach')
    ->name('admin.review.attach');

Route::resource('reviews', 'ReviewController', [
    'names' => [
        'index' => 'admin.review.index', //get
        'create' => 'admin.review.create', //get
        'store' => 'admin.review.store', //post
        'show' => 'admin.review.show', //get
        'edit' => 'admin.review.edit', //get
        'update' => 'admin.review.update', //put
        'destroy' => 'admin.review.destroy' //delete
    ],
]);

/* Image */
Route::get('/image/delete/{id}', 'ImageController@delete')
    ->name('admin.image.delete')
    ->where('id', '[0-9]+');