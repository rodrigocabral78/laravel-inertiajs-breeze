<?php

// GET|HEAD        users  users.index › UserController@index ⇂ web
// POST            users  users.store › UserController@store ⇂ web
// GET|HEAD        users/create  users.create › UserController@create ⇂ web
// GET|HEAD        users/{user}  users.show › UserController@show ⇂ web
// PUT|PATCH       users/{user}  users.update › UserController@update ⇂ web
// DELETE          users/{user}  users.destroy › UserController@destroy ⇂ web
// GET|HEAD        users/{user}/edit . users.edit › UserController@edit ⇂ web

use Illuminate\Support\Facades\Route;

// Route::resource('users', UserController::class);

Route::group([
    'namespace'  => 'App\Http\Controllers',
    'middleware' => 'auth',
    'prefix'     => 'users',
    'as'         => 'users.',
    // 'sufix' => 'is',
], function () {
    Route::get('', [
        'uses'   => 'UserController@index',
        'as'     => 'index',
    ]);
    Route::get('create', [
        'uses'   => 'UserController@create',
        'as'     => 'create',
    ]);
    Route::post('', [
        'uses'   => 'UserController@store',
        'as'     => 'store',
    ]);

    //
    Route::get('{user:uuid}', [
        'uses'      => 'UserController@show',
        'as'        => 'show',
        'whereUuid' => 'id',
    ]);
    Route::get('{user:uuid}/edit', [
        'uses'      => 'UserController@edit',
        'as'        => 'edit',
        'whereUuid' => 'id',
    ]);
    Route::match([
        'put',
        'patch'
    ], '{user:uuid}', [
        'uses'      => 'UserController@update',
        'as'        => 'update',
        'whereUuid' => 'id',
    ]);
    Route::delete('{user:uuid}', [
        'uses'      => 'UserController@destroy',
        'as'        => 'destroy',
        'whereUuid' => 'id',
    ]);
});
