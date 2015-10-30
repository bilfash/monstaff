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

Route::filter('admin', function()
{
    if (Auth::id() != 1)
    {
        return Redirect::to('/');
    }
});

Route::get('/', 'WelcomeController@index');

Route::get('home', 'HomeController@index');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

//Admin Controller
Route::group(['middleware' => 'auth','before' => 'admin'], function () {

	// dashboard
	Route::get('admin', 'AdminController@index');

	// department
	Route::get('department','DepartmentController@index');
	Route::get('department/detail/{id}','DepartmentController@detail');
	Route::get('department/delete/{id}','DepartmentController@delete');
	Route::get('department/create','DepartmentController@create');
	Route::post('department/create', array('before' =>'csrf', 'uses' => 'DepartmentController@create'));
	Route::get('department/update/{id}','DepartmentController@update');
	Route::post('department/update/{id}', array('before' =>'csrf', 'uses' => 'DepartmentController@update'));

	// position
	Route::get('position','PositionController@index');
	Route::get('position/detail/{id}','PositionController@detail');
	Route::get('position/delete/{id}','PositionController@delete');
	Route::get('position/create','PositionController@create');
	Route::post('position/create', array('before' =>'csrf', 'uses' => 'PositionController@create'));
	Route::get('position/update/{id}','PositionController@update');
	Route::post('position/update/{id}', array('before' =>'csrf', 'uses' => 'PositionController@update'));

	// user
	Route::get('user','UserController@index');
	Route::get('user/detail/{id}','UserController@detail');
	Route::get('user/delete/{id}','UserController@delete');
	Route::get('user/create','UserController@create');
	Route::post('user/create', array('before' =>'csrf', 'uses' => 'UserController@create'));
	Route::get('user/update/{id}','UserController@update');
	Route::post('user/update/{id}', array('before' =>'csrf', 'uses' => 'UserController@update'));

});

//Admin Controller
Route::group(['middleware' => 'auth','before' => 'nondep'], function () {

    Route::get('nondept', 'NonDeptController@index');

    Route::get('event','EventController@index');
    Route::get('event/detail/{id}','EventController@detail');
    Route::get('event/delete/{id}','EventController@delete');
    Route::get('event/create','EventController@create');
    Route::post('event/create', array('before' =>'csrf', 'uses' => 'EventController@create'));
    Route::get('event/update/{id}','EventController@update');
    Route::post('event/update/{id}', array('before' =>'csrf', 'uses' => 'EventController@update'));


    Route::get('question','QuestionController@index');
    Route::get('question/detail/{id}','QuestionController@detail');
    Route::get('question/delete/{id}','QuestionController@delete');
    Route::get('question/create','QuestionController@create');
    Route::post('question/create', array('before' =>'csrf', 'uses' => 'QuestionController@create'));
    Route::get('question/update/{id}','QuestionController@update');
    Route::post('question/update/{id}', array('before' =>'csrf', 'uses' => 'QuestionController@update'));
});
