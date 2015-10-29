<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'WelcomeController@index');

Route::get('home', 'HomeController@index');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

// dashboard
Route::get('admin', 'AdminController@index');
Route::get('nondept', 'NonDeptController@index');
Route::get('dept', 'DeptController@index');

// department
Route::get('department','DepartmentController@index');
Route::get('department/detail/{id}','DepartmentController@detail');
Route::get('department/delete/{id}','DepartmentController@delete');
Route::get('department/create','DepartmentController@create');
Route::post('department/create', array('before' =>'csrf', 'uses' => 'DepartmentController@create'));
Route::get('department/update/{id}','DepartmentController@update');
Route::post('department/update/{id}', array('before' =>'csrf', 'uses' => 'DepartmentController@update'));