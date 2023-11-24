<?php

use Illuminate\Support\Facades\Route;

Route::group([
    'namespace'  => 'App\Http\Controllers',
    'middleware' => 'auth',
    'as'         => 'users.',
    'prefix'     => 'users',
    // 'sufix' => 'is',
], function () {
    // Route::resource('users', UserController::class);

    Route::get('', [
        'as'     => 'index',
        'uses'   => 'UserController@index',
    ]);
    Route::get('create', [
        'as'     => 'create',
        'uses'   => 'UserController@create',
    ]);
    Route::post('', [
        'as'     => 'store',
        'uses'   => 'UserController@store',
    ]);

    // Required Parameters
    Route::get('{user:uuid}', [
        'as'        => 'show',
        'uses'      => 'UserController@show',
        'whereUuid' => 'id',
    ]);
    Route::get('{user:uuid}/edit', [
        'as'        => 'edit',
        'uses'      => 'UserController@edit',
        'whereUuid' => 'id',
    ]);
    // Route::put('{user:uuid}', [
    //     'as'        => 'update',
    //     'uses'      => 'UserController@update',
    //     'whereUuid' => 'id',
    // ]);
    // Route::patch('{user:uuid}', [
    //     'as'        => 'update',
    //     'uses'      => 'UserController@update',
    //     'whereUuid' => 'id',
    // ]);
    Route::match([
        'put',
        'patch'
    ], '{user:uuid}', [
        'as'        => 'update',
        'uses'      => 'UserController@update',
        'whereUuid' => 'id',
    ]);
    Route::delete('{user:uuid}', [
        'as'        => 'destroy',
        'uses'      => 'UserController@destroy',
        'whereUuid' => 'id',
    ]);
});
