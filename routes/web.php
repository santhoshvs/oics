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

Route::group(['namespace' => 'App\Http\Controllers'], function()
{   
    /**
     * Home Routes
     */
    Route::get('/home', 'HomeController@index')->name('home.index');
	
	Route::get('employee', 'HomeController@index');
	Route::get('employee/add', 'HomeController@create');
	Route::post('employee/store', 'HomeController@store');
	Route::get('employee/edit/{id}', 'HomeController@edit');
	Route::post('employee/update/{id}', 'HomeController@update');
	Route::get('employee/delete/{id}', 'HomeController@destroy');
	
	Route::get('task', 'HomeController@task')->name('task.index');
	Route::get('task/add', 'HomeController@createtask');
	Route::post('task/store', 'HomeController@storetask');
	Route::get('task/edit/{id}', 'HomeController@edittask');
	Route::post('task/update/{id}', 'HomeController@updatetask');
	Route::get('task/delete/{id}', 'HomeController@destroytask');
	Route::get('task/status/{id}', 'HomeController@status');
	Route::post('task/statusform/{id}', 'HomeController@statusform');
	
    Route::group(['middleware' => ['guest']], function() {
        /**
         * Register Routes
         */
        Route::get('/register', 'RegisterController@show')->name('register.show');
        Route::post('/register', 'RegisterController@register')->name('register.perform');

        /**
         * Login Routes
         */
        Route::get('/login', 'LoginController@show')->name('login.show');
		Route::get('/', 'LoginController@show')->name('login.show');
        Route::post('/login', 'LoginController@login')->name('login.perform');

    });

    Route::group(['middleware' => ['auth']], function() {
        /**
         * Logout Routes
         */
        Route::get('/logout', 'LogoutController@perform')->name('logout.perform');
    });
});