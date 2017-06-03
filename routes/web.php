<?php

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::group(['middleware' => 'auth'], function () {
    Route::get('/dashboard', 'DashboardController@index')->name('dashboard');

    Route::get('/employees', 'UserController@index')->name('employeesIndex');
    Route::get('/employees/create', 'UserController@create')->name('employeesCreate');
    Route::get('/employees/{user}', 'UserController@show')->name('employeesShow');
    Route::get('/employees/{user}/edit', 'UserController@edit')->name('employeesEdit');
    Route::post('/employees', 'UserController@store')->name('employeesStore');
    Route::delete('/employees/{user}', 'UserController@destroy')->name('employeesDestroy');
    Route::patch('/employees/{user}', 'UserController@update')->name('employeesUpdate');

    Route::get('/pay-periods', 'PayPeriodController@index')->name('payPeriodsIndex');
    Route::post('/pay-periods', 'PayPeriodController@store')->name('payPeriodsStore');

    Route::get('/schedules', 'ScheduleController@index')->name('schedulesIndex');
    Route::get('/schedules/create', 'ScheduleController@create')->name('schedulesCreate');
    Route::get('/schedules/{schedule}/edit', 'ScheduleController@edit')->name('schedulesEdit');
    Route::patch('/schedules/{schedule}', 'ScheduleController@update')->name('schedulesUpdate');
    Route::post('/schedules', 'ScheduleController@store')->name('schedulesPost');
});
