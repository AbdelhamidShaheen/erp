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
Route::get('/', function () {

    return redirect()->route('dashboard');
});

Route::prefix('erp')->group(function () {
    /**
     * Auth
     */
    Route::get('/login', "website\authController@Login")->name("login");
    Route::post('/login', "website\authController@PostLogin")->name("PostLogin");

    /**
     * Resource
     */
    Route::middleware(['auth'])->group(function () {

        Route::resource('admins', "website\adminsController");
        Route::resource('companies', "website\companiesController");
        Route::resource('employees', "website\\employeesController");
        Route::resource('roles', "website\\rolesController");
        Route::get('dashboard', "website\dashboardController@index")->name("dashboard");

/**
 * LogOut
 */
        Route::get('/logout', "website\authController@Logout")->name("logout");

    });
});