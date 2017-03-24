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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/employees', 'UserController@index')->name('employeesIndex');
Route::get('/employees/create', 'UserController@create')->name('employeesCreate');
Route::get('/employees/{user}', 'UserController@show')->name('employeesShow');
Route::get('/employees/{user}/edit', 'UserController@edit')->name('employeesEdit');
Route::post('/employees', 'UserController@store')->name('employeesStore');
Route::delete('/employees/{user}', 'UserController@destroy')->name('employeesDestroy');
Route::patch('/employees/{user}', 'UserController@update')->name('employeesUpdate');

Auth::routes();
Route::get('/home', 'HomeController@index')->name('dashboard');
