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

Auth::routes();

Route::get('/', 'CalendarController@show')->name('root');

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/holiday_setting', 'Calendar\HolidaySettingController@form')
    ->name("holiday_setting");

Route::post('/holiday_setting', 'Calendar\HolidaySettingController@update')
    ->name("update_holiday_setting");

Route::get('/extra_holiday_setting', 
    'Calendar\ExtraHolidaySettingController@form')
    ->name("extra_holiday_setting");
    
Route::post('/extra_holiday_setting',
    'Calendar\ExtraHolidaySettingController@update')
    ->name("update_extra_holiday_setting");

Route::post('/review', 'ReviewController@send')->name("review");


Route::get('/review', 'ReviewController@list')->name("reviewList");
