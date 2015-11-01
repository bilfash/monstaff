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

Route::filter('nondep', function()
{
    if (Auth::user()->department->name != 'Non Departemen')
    {
        return Redirect::to('/');
    }
});

Route::filter('staff', function()
{
    if (Auth::user()->position->name != 'Staff')
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
	Route::get('user/delete/{id}','UserController@delete');
	Route::get('user/create','UserController@create');
	Route::post('user/create', array('before' =>'csrf', 'uses' => 'UserController@create'));
	Route::get('user/update/{id}','UserController@update');
	Route::post('user/update/{id}', array('before' =>'csrf', 'uses' => 'UserController@update'));

});

//Nondep Controller
Route::group(['middleware' => 'auth','before' => 'nondep'], function () {

	//dashboard
    Route::get('nondept', 'NonDeptController@index');

    //feedback
    Route::get('feedback', 'FeedbackController@index');
    Route::get('feedback/delete/{id}', 'FeedbackController@delete');

    //event
    Route::get('event','EventController@index');
    Route::get('event/detail/{id}','EventController@detail');
    Route::get('event/delete/{id}','EventController@delete');
    Route::get('event/create','EventController@create');
    Route::post('event/create', array('before' =>'csrf', 'uses' => 'EventController@create'));
    Route::get('event/update/{id}','EventController@update');
    Route::post('event/update/{id}', array('before' =>'csrf', 'uses' => 'EventController@update'));
    Route::get('event/detail/{id}/score','EventController@score');
    Route::post('event/detail/{id}/score', array('before' =>'csrf', 'uses' => 'EventController@score'));
    Route::get('event/detail/{id}/question','EventController@question');
    Route::post('event/detail/{id}/question', array('before' =>'csrf', 'uses' => 'EventController@question'));

    //mark
    Route::get('mark','MarkController@index');
    Route::get('mark/detail/{id}','MarkController@index');
    Route::get('score','ScoreController@index');

    //question
    Route::get('question','QuestionController@index');
    Route::get('question/detail/{id}','QuestionController@detail');
    Route::get('question/delete/{id}','QuestionController@delete');
    Route::get('question/create','QuestionController@create');
    Route::post('question/create', array('before' =>'csrf', 'uses' => 'QuestionController@create'));
    Route::get('question/update/{id}','QuestionController@update');
    Route::post('question/update/{id}', array('before' =>'csrf', 'uses' => 'QuestionController@update'));

});

//Nondep Controller
Route::group(['middleware' => 'auth','before' => 'staff'], function () {

	//dashboard
    Route::get('dept', 'DeptController@index');

    
    Route::get('question/update/{id}','QuestionController@update');
    Route::post('question/update/{id}', array('before' =>'csrf', 'uses' => 'QuestionController@update'));
});
