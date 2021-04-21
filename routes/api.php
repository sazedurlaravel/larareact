<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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
Route::get('/task','App\Http\Controllers\TaskController@index');
// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });
// Route::get('/task','App\Http\Controllers\TaskController@index');
// Route::get('/task/create','App\Http\Controllers\TaskController@create');
// Route::get('/task/edit/{id}','App\Http\Controllers\TaskController@edit');
// Route::post('/task/store','App\Http\Controllers\TaskController@store');
// Route::post('/task/update/{id}','App\Http\Controllers\TaskController@update');
// Route::get('/task/delete/{id}','App\Http\Controllers\TaskController@delete');


//jwt route here
Route::group(
    [
        'middleware' => 'api',
        'namespace'  => 'App\Http\Controllers',
        'prefix'     => 'auth',
    ],
    function ($router) {
        Route::post('login', 'AuthController@login')->name('login');
        Route::post('register', 'AuthController@register');
        Route::post('logout', 'AuthController@logout');
        Route::get('profile', 'AuthController@profile');
        Route::post('refresh', 'AuthController@refresh');
    }
);
// To do route
Route::group(
    [
        'middleware' => 'api',
        'namespace'  => 'App\Http\Controllers',
    ],
    function ($router) {
        // Route::resource('todos', 'TodoController');
        
        Route::get('/task/create','TaskController@create');
        Route::get('/task/edit/{id}','TaskController@edit');
        Route::post('/task/store','TaskController@store');
        Route::post('/task/update/{id}','TaskController@update');
        Route::get('/task/delete/{id}','TaskController@delete');

    }

);
