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

Route::group(['prefix' => 'v1'], function () {
    Route::post('login', 'Api\AuthController@Login');
    Route::post('buku', 'Api\BukuController@store');
    Route::get('buku', 'Api\BukuController@index');
    Route::put('buku', 'Api\BukuController@update');
    Route::delete('buku', 'Api\BukuController@destroy');
    Route::get('pinjam', 'Api\BukuController@pinjam');
});

// Auth route
Route::group(['prefix' => 'v1', 'middleware' => ['jwt']], function () {
    Route::get('logout', 'Api\AuthController@Logout');
});
