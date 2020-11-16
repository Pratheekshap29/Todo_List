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
    return view('welcome');
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::resource('todo', 'TodoController');
Route::get('fetch', 'TodoController@fetchTodo');

//fullcalender
 Route::get('fullcalendar','FullCalendarController@index');
 Route::post('fullcalendar/create','FullCalendarController@create');
 Route::post('fullcalendar/update','FullCalendarController@update');
 Route::post('fullcalendar/delete','FullCalendarController@destroy');
// Route::resource('fullcalendar', 'FullCalendarController');

