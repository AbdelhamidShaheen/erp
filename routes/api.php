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







Route::prefix('auth')->group(function () {
Route::post('/signin',"api\authController@login" );
Route::get('/authme', "api\authController@userProfile");
Route::post('/token-refresh', "api\authController@refresh");
Route::post('/signout', "api\authController@logout");
});