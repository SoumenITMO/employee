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

/* Not in use for now
Route::get('/', function () {
    return view('welcome');
});
*/

Route::get('/',function(){
	return view('index');
});

Route::get('/tasks',function(){
	return view('employee_tasks');
});
