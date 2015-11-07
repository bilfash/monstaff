<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Auth;

//pivotnya sek

class NonDeptController extends Controller {


	public function index()
	{

		return view('pages.nondept.dashboard');
	}



}
